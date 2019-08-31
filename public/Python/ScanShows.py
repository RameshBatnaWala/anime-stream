#!/usr/bin/env python3
from jikanpy import Jikan
import json
import subprocess
import mysql.connector
import time



# fetches All Shows on Horrible Subs
def getAllShows():
    allShows = subprocess.check_output(['horrible-downloader', '-l'])
    allShowsS = str(allShows).replace('b"', '').replace('"','');
    allShowsSorted = allShowsS.split("\\n");
    return allShowsSorted;



def getSchedule(cursor, Database):
    days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
    jikan = Jikan();

    for cDay in days:
        dayData = jikan.schedule(day=cDay);

        print(cDay);
        cursor.execute("DELETE FROM Schedule WHERE AirDay=%s",(cDay,))
        Database.commit();
        for show in dayData[cDay]:    
            cursor.execute("SELECT * FROM series WHERE malID=%s",(show["mal_id"],));
            fetch = cursor.fetchone();
            if fetch != None:
                cursor.execute("INSERT INTO Schedule (SeriesID, AirDay, SeriesName) Values(%s,%s,%s)",(fetch[0],cDay,fetch[1]));
                Database.commit();

    
def getIFCheck(fetch):
    if fetch == None:
        return True;
    if fetch[4] == "Currently Airing":
        return True;
    return False;


def GetGenres(anime):
    genres = anime['genres'];
    returnV = "";
    for genre in genres:
        returnV += ";"+genre['name'];
    
    return returnV;

def getInfoFromDatabase(allShows):

    jikan = Jikan()
    Database = mysql.connector.connect(
    host="127.0.0.1",
    user="pythonUser",
    passwd="python",
    database="streaming"
    );

    cursor = Database.cursor(buffered=True);
    c = 0;

    
    for CShows in allShows:
        print("current: "+CShows);
        cursor.execute("SELECT * FROM series WHERE SeriesName=%s",(CShows,))
        fetch = cursor.fetchone();
        if getIFCheck(fetch):
            search_result = jikan.search('anime', CShows);
            try:
                if len(search_result) >= 1:
                
                    Mal_id = str(search_result['results'][0]['mal_id'])    
                    anime = jikan.anime(Mal_id);
                    sql = "";
                    execute = True;
                    val = None;
                    if fetch != None:
                        if anime['status'] == "Currently Airing":
                            execute = False;
                        sql = "UPDATE customers SET seriesStatus = %s WHERE id = %s"
                        val=(anime['status'], fetch[0]);
                        print("Show Updated !");
                    
                    else:
                        sql = "INSERT INTO series (seriesName, JapaneseName, genres, seriesStatus, Description, episodeCount, ImageURL, LargeImageURL, malID, trailer, aired, duration, type ) VALUES (%s, %s, %s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
                        val = (CShows, anime['title_japanese'], GetGenres(anime), anime['status'], anime['synopsis'], anime['episodes'], anime['image_url'], anime['image_url'].replace(".jpg","l.jpg"),Mal_id, anime['trailer_url'], anime['premiered'], anime['duration'], anime['type']);

                    if execute:
                        cursor.execute(sql, val);
                        Database.commit();   
            except:
                print("error at: "+CShows);
    
    getSchedule(cursor, Database);





while True:
    allShowsSorted = getAllShows();
    getInfoFromDatabase(allShowsSorted);
    time.sleep(86400);