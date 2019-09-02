#!/usr/bin/env python

from HorribleDownloader import Parser, ConfigManager
import json
import subprocess
import mysql.connector
import os 
import time

result = subprocess.run(['ls', 'Downloads'], stdout=subprocess.PIPE);
#print(result.stdout);
r = (str(result.stdout).strip('b').replace("\\n",'')).strip("'")
result = subprocess.run(['ls', 'Downloads/'+r],stdout=subprocess.PIPE)
print(result.stdout)