<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/home.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/navbar')

        <div class="featured" style="background-image: url('https://uploads-ssl.webflow.com/5a62f3145e467c0001480868/5cdc89c9ee894ca775ab05d9_2036_SoundEuphonium_1920x700.jpg');">
            <div class="featuredText">
                <p class="featuredTitle">Sound! Euphonium</p>
                <button onclick="window.location.href='{{url('Show/3912')}}'" class="featuredButton">Watch Now!</button>
            </div>
        </div>


        <div class="Seperator">
        <p class="SeperatorText">Random</p>
        </div>

        <div class="showList">       
            @foreach ($RandomShow as $watch)
                <a href="{{url('Show/'.$watch->id)}}">
                <div class="showListContent" style="background-image: url('{{$watch->ImageURL}}');">
                    <div class=ListContentName>
                        <p class="ContentName">
                        
                        @if(strlen($watch->seriesName) <= 39 ){{$watch->seriesName}}
                        @else {{substr($watch->seriesName,0,36)}} ...
                        @endif
                        
                        </p>
                    </div>
                </div>
            </a>
            @endforeach

        </div>




        <div class="Seperator">
        <p class="SeperatorText">currently airing</p>
        </div>

        <div class="showList">    


            @foreach ($airing as $watch)
                <a href="{{url('Show/'.$watch->id)}}">
                <div class="showListContent" style="background-image: url('{{$watch->ImageURL}}');">
                    <div class=ListContentName>
                        <p class="ContentName">
                        
                        @if(strlen($watch->seriesName) <= 39 ){{$watch->seriesName}}
                        @else {{substr($watch->seriesName,0,36)}} ...
                        @endif
                        
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>



@auth

        <div class="Seperator">
        <p class="SeperatorText">WatchList</p>
        </div>

        <div class="showList">    


            @foreach ($shows as $watch)
                <a href="{{url('Show/'.$watch->id)}}">
                <div class="showListContent" style="background-image: url('{{$watch->ImageURL}}');">
                    <div class=ListContentName>
                        <p class="ContentName">
                        
                        @if(strlen($watch->seriesName) <= 39 ){{$watch->seriesName}}
                        @else {{substr($watch->seriesName,0,36)}} ...
                        @endif
                        
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

@endauth
        
    </body>
</html>