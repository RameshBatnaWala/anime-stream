import json
import subprocess
import mysql.connector
import os 
import time


def getSupPos(resultS, result):
    result = os.popen("mkvmerge -i "+resultS).read()
    x = result.split('\n');
    r = -1;
    for y in x:
        if y.find("subtitles") != -1:
            return r;
        r = r+1;
    return 2;

def GetFolderName():
    result = subprocess.run(['ls', 'Downloads'], stdout=subprocess.PIPE);
    #print(result.stdout);
    r = str(result.stdout).strip('b').replace("\\n",'').strip("'");
    print(r)
    return r;



result = subprocess.run(['ls', 'Downloads/'+GetFolderName()],stdout=subprocess.PIPE)
resultS = "'Downloads/"+GetFolderName()+"/"+(str(result.stdout).strip('b').replace("\\n",'')).strip("'")+"'";
sub = getSupPos(resultS, result);
print(resultS);
resultS = './single.sh '+resultS + ' ' + str(sub);
print(resultS)
os.system(resultS);