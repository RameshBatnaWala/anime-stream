#!/usr/bin/env python

# this program is for testing the jikan API.
# It won't be used for the actual programm. It is only for testing purposes.
#mysql pythonUser Password: python


from jikanpy import Jikan
import json

jikan = Jikan()


monday  = jikan.schedule(day="monday");
print(monday["monday"][0]['mal_id']); 

#anime = jikan.schedule('monday');

#print(anime['monday'][0])