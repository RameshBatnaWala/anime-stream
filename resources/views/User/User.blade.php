<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/home.css" rel="stylesheet">
        <link href="/css/user.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/navbar')
        
        <div class="backgroundimage" style="background-image: linear-gradient(to bottom, rgba(255,255,255, 0) 0%, #06090f 99%),url('{{url('uploads/'.$user->Banner)}}')">
            <div class="userName">
                <h1 class="userName">{{$user->name}}</h1>
              <!--  <div class="profileImage" style="background-image: url('https://cdn.myanimelist.net/images/anime/3/80230l.jpg');"></div> -->
            </div>
        </div>

        <div class="UserSeperator">
            <div class="SelectButton" id="parent">
                
                <button onclick="window.location.href='{{url('User/0')}}'" class="SelectButton @if($stat == 0) selected @endif" onclick="filterSelection('watching')">Watching</button>
                <button onclick="window.location.href='{{url('User/1')}}'" class="SelectButton @if($stat == 1) selected @endif" onclick="filterSelection('Completed')">Completed</button>
                <button onclick="window.location.href='{{url('User/2')}}'" class="SelectButton @if($stat == 2) selected @endif" onclick="filterSelection('OnHold')">On-hold</button>
                <button onclick="window.location.href='{{url('User/3')}}'" class="SelectButton @if($stat == 3) selected @endif" onclick="filterSelection('Dropped')">Dropped</button>
                <button onclick="window.location.href='{{url('User/4')}}'" class="SelectButton @if($stat == 4) selected @endif" onclick="filterSelection('PlanTowatch')">Plan To watch</button>
                <button onclick="window.location.href='{{url('User/5')}}'" class="SelectButton @if($stat == 5) selected @endif" onclick="filterSelection('Completed')">All</button>
            </div>
        </div>


        
        <div class="SearchSeries">
            <input class="Input" type="text" onkeyup="myFunction()" id="anime" name="anime" placeholder="Search Anime">
        </div>
        <div class="SelectSeperator"></div>

        <div class="showListUser" id="contentList">

            @foreach ($shows as $show)
                <a href="{{url('Show/'.$show->id)}}" id="animeBox"  name="{{$show->seriesName}}"> 
                    <div class="showListContent" style="background-image: url('{{$show->ImageURL}}');">
                        <div class="ListContentName">
                            <p class="ContentName" id="name" id="name">
                                @if(strlen($show->seriesName) <= 39 ){{$show->seriesName}}
                                @else {{substr($show->seriesName,0,36)}} ...
                                @endif
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>






<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("anime");
    if(input.value != null)
    {
    filter = input.value.toUpperCase();
    ul = document.getElementById("contentList");
    li = ul.getElementsByTagName("a");




        for (i = 0; i < li.length; i++) {
            a = li[i].getAttribute("name");
            if(a != null)
            {
                a = a.toUpperCase();
                if(a.indexOf(filter) !== -1)
                {
                    li[i].style.display ="";
                }
                else
                {
                    li[i].style.display ="none";
                }
            }      
        } 
    }
}
</script>







    </body>
</html>
