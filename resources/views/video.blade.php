<!doctype html>    
    <head>
    
    @include('Includes/CssIncludes')
    
        
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <link href="/css/Video.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
    </head>
        <body>

        @include('Includes/navbar')

        <div class="row justify-content-center"><a class="SeriesLink text-center" href="{{url('Show/'.$show->id)}}">{{$show->seriesName}}</a> </div>
        <br>
        <p class="text-center text-light topDist">Episode: {{$currentEpisode->EpisodeCount}}
            <button id="WatchedButton" class="@if($Watched == null)NotWatched @else Watched @endif" onclick="sendData();" title="remove from watch list"><i class="fa fa-check"></i></button>
        </p>
        <div class="row justify-content-center">

            <!--Grid column-->

            <video id=example-video width="818" height="460" class="video-js vjs-big-play-centered" controls>
                <source
                        src="{{url('storage/'.$currentEpisode->reference.'/index.m3u8')}}"
                        type="application/x-mpegURL">
                </source>

                    <track kind="captions" src="{{url('storage/'.$currentEpisode->reference.'/subtitles.vtt')}}" srclang="en" label="English" default>
                    </video>
                    <script>
                    var player = videojs('example-video');
                    player.play();
                </script>
        </div>

        <div class="buttonGroup text-center">
            @foreach ($episodes as $Episode)
                @if($Episode->id == $currentEpisode->id)
                    <a href="{{url('episode/'.$Episode->id)}}"><button type="button" class=" Video current">{{$Episode->EpisodeCount}}</button></a>
                @else
                <a href="{{url('episode/'.$Episode->id)}}"><button type="button" class=" Video ">{{$Episode->EpisodeCount}}</button></a>
                @endif
            @endforeach
            


        </div>
           



           <script>
            function sendData(){
               
                var button = document.getElementById("WatchedButton");
                if(button.className == " Watched " || button.className == "Watched")
                {
                    button.className = "NotWatched";
                }
                else
                {
                    button.className="Watched";
                }



                var url = "{{url('views/'.$currentEpisode->id)}}";
                // Create a new AJAX request object
                var request = new XMLHttpRequest();

                // Open a connection to the server
                request.open('GET', url);

                // Run our handleResponse function when the server responds
                

                // Actually send the request
                request.send();
           }
           </script>
    </body>
</html>
