#!/usr/bin/env python

from HorribleDownloader import Parser, ConfigManager
import json
import subprocess
import mysql.connector
import os 
import time


def GetEpisodes(showName):
    episodes = p.get_episodes(showName)
    print(episodes[len(episodes)-1]['episode'])
    episodeNumbers = [];
    for episode in episodes:
        episodeNumbers.append(episode['episode']);
    return episodeNumbers[::-1];

def GetVideoDirAndConvert(showName, episode):

    result = subprocess.run(['ls', 'Downloads/'+showName],stdout=subprocess.PIPE)
    resultS = "Downloads/'"+showName+"'/"+(str(result.stdout).strip('b').replace("\\n",''));
    print(resultS);
    resultS = './single.sh '+resultS;
    print(resultS)
    os.system(resultS);
    vName = "S: "+showName +" E: "+episode+"";
    print(vName);
    rename = "mv out storage/'"+vName+"'";
    os.system(rename);
    os.system("rm -rf Downloads/'"+showName+"'")
    return vName;
    
def SaveToDatabase(SeriesID, showName, episode, cursor, fileName, Database):
    sql = "INSERT INTO episodes (SeriesID, EpisodeCount, Ename, reference) VALUES (%s, %s, %s ,%s)"
    val = (SeriesID, episode, episode, fileName)
    cursor.execute(sql, val)
    Database.commit();

def DownloadShow(seriesID ,showName, cursor, Database):
    episodes = GetEpisodes(showName);
    print(episodes);

    c = 0
    for episode in episodes:
        
        print("Episode: "+episode)
        sql = "Select * From episodes WHERE SeriesID ='%s' AND EpisodeCount =%s"
        val = (seriesID,episode);
        cursor.execute(sql,val);
        cursor.fetchone();
        print(cursor.rowcount)
       
        if cursor.rowcount == -1: 
            c += 1;   
            #subprocess.check_call('horrible-downloader','-d',str(showName),'-e',str(episode));
            passValues = [];
            passValues.append("horrible-downloader");
            passValues.append("-d");
            passValues.append('"{0}"'.format(showName));
            passValues.append("-e");
            passValues.append(str(episode));
            #passValues.append("-o")
            #passValues.append("~"+os.path.dirname(os.path.realpath(__file__))+"/Downloads")
            print(passValues);
            subprocess.check_call(passValues); # don't forget to uncomment!
            print("Download Completed !")
            Video = GetVideoDirAndConvert(showName, str(episode));
            SaveToDatabase(seriesID, showName, episode, cursor, Video, Database);
            





while True:

    Database = mysql.connector.connect(
        host="127.0.0.1",
        user="pythonUser",
        passwd="python",
        database="streaming"
    );

    p = Parser()
    config = ConfigManager()
    cursor = Database.cursor();
    cursor.execute("Select * FROM DownloadList")
    results = cursor.fetchall();

    for result in results:
        print(result[1]);
        Id = (result[1],);
        sql = "Select * FROM series WHERE id = '%s'";
        cursor.execute(sql, Id);
        Series = cursor.fetchone();
        DownloadShow(Series[0],Series[1], cursor, Database);

        if Series[4] == "Finished Airing":
            sql = "DELETE FROM DownloadList WHERE SeriesID ='%s'"
            cursor.execute(sql, Id)
            Database.commit();
            print(cursor.rowcount, "record(s) deleted")
    
    time.sleep(60);


#episodes = p.get_episodes("Hibike! Euphonium")
#print(episodes[len(episodes)-1]['episode'])