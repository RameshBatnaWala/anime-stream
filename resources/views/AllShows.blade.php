<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/AllShows.css" rel="stylesheet">

    </head>
    <body>
        @include('Includes/navbar')

        <h1 class="allShowsTitle">All Shows</h1>
        <p class="showCount">Currently: {{count($shows)}}</p>

        <div class="SearchBar">
            <input class="SearchBar"  type="text" onkeyup="myFunction()" id="anime" name="anime" placeholder="Search Anime">           
            <button class="collapsible">Select Genres </button>
            <div class="content">
                <button class="Unselect" onclick="removeFilters()">X Unselect All</button>
                @foreach ($genres as $genre)
                    <button class="filterButton"  id="{{$genre->name}}"onclick="getFilter(this)">{{$genre->name}}</button>
                @endforeach
            </div>
            <div class="Border">
        </div>



        <ul class="SeriesList" id="SeriesList">

        @foreach ($shows as $show)
            <a class="SeriesList" id="{{$show->seriesName}}" name="{{$show->genres}}" href="{{url('Show/'.$show->id)}}"> <li class="SeriesList">{{$show->seriesName}}</li> </a>
        @endforeach



        <!-- <a class="SeriesList" id="In this corner of the world" name="Drama" href="#"> <li class="SeriesList">In this corner of the world</li> </a>
        --></ul>

        <script src="{{ asset('js/searchShows.js') }}"></script>
    </body>
</html>