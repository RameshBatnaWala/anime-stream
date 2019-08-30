#!/usr/bin/env python3
from HorribleDownloader import Parser, ConfigManager
import json

print ("Hello World")
p = Parser()
config = ConfigManager()
episodes = p.get_episodes("Hibike! Euphonium")


print(episodes);

#print(episodes[0]);
#s = episodes[0].replace("'", '"')
#y = json.loads[s];
#print(y["episode"]);

#for x in episodes:
#    s = "["+str(x)+"]";
#    s = str.replace("'", '"')
#    y = json.loads(s);
#    print(y["episde"]);
#    print("\n");