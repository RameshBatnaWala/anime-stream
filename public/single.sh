#!/bin/bash

mkdir out/
cp -r "$1" out/input.mkv
cd out/

# Extract Subtitles
mkvextract input.mkv tracks -c UTF-8 "2:subtitles.ass"

# Remove Subtitles
ffmpeg -i input.mkv -sn -c copy stripped.mkv

# Remove unused mkv
rm -rf input.mkv

# Encode Stripped MKV
#ffmpeg -i stripped.mkv -profile:v baseline -level 3.0 -vcodec libx264 -crf 28 -preset faster -tune animation -start_number 0 -hls_time 10 -hls_list_size 0 -f hls index.m3u8
#ffmpeg -i stripped.mkv -profile:v baseline -level 3.0 -tune animation -start_number 0 -hls_time 10 -hls_list_size 0 -f hls index.m3u8

# No Compression
ffmpeg -i stripped.mkv -profile:v baseline -level 3.0 -start_number 0 -hls_time 10 -hls_list_size 0 -f hls index.m3u8
# create subtitles in vtt format
ffmpeg -i subtitles.ass subtitles.vtt
# Remove unused mkv
rm -rf stripped.mkv
