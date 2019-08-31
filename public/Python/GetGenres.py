#!/usr/bin/env python3

from jikanpy import Jikan
import json
import mysql.connector



Database = mysql.connector.connect(
    host="127.0.0.1",
    user="pythonUser",
    passwd="python",
    database="streaming"
);
cursor = Database.cursor();
c = 0
jikan = Jikan()
while True:
    c+=1
    g = jikan.genre(type='anime', genre_id=c);
    genre = str(g['mal_url']['name']).replace(" Anime","")
    print(genre);
    sql = "INSERT INTO Genres (name) VALUES (%s)"
    val = (genre,)
    cursor.execute(sql,val);
    Database.commit();

