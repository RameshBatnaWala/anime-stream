<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/SeriesPage.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/navbar')
        <h1 class="Title white"> {{$show->seriesName}} <i title="Favorite" class="heart fa @if($Favourite == null) fa-heart-o @else fa-heart @endif"></i></h1>
        
        @auth

            <div class="text-center"><button class="status" id="StatusButton" data-toggle="collapse" data-target="#collapseExample" >{{$statName}}</button> </div>
            <div class="collapse" id="collapseExample">
                <div class="collapseForm text-center">
                    <form id="Status" action="/ChangeStatus" >
                    <div class="radio">
                    <input type="hidden" name="SeriesID" value="{{$show->id}}"/>
                    <input type="radio" id="status" name="status" value="Watching" @if($status != null && $status->Status == 0)checked="checked" @endif> Watching</input><br>
                    <input type="radio" id="status" name="status" value="Completed" @if($status != null && $status->Status == 1)checked="checked" @endif> Completed</input><br>
                    <input type="radio" id="status" name="status" value="On-hold" @if($status != null && $status->Status == 2)checked="checked" @endif> On-hold</input><br>
                    <input type="radio" id="status" name="status" value="Dropped" @if($status != null && $status->Status == 3)checked="checked" @endif> Dropped</input><br>
                    <input type="radio" id="status" name="status" value="Plan-to-watch" @if($status != null && $status->Status == 4)checked="checked" @endif> Plan-to-watch</input><br>
                    <input type="radio" id="status" name="status" value="None" @if($status == null)checked="checked" @endif> None</input><br>
                    </div>
                    <input type="submit" class="submit" value="Submit">
                    </form> 
                </div>
            </div>

            @if($show->InDownloadList == 1)
            <br>
            <div class="text-center"><button class="status None" style="color: red; border-color: red;"data-toggle="modal" data-target="#modal" >delete Show</button> </div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content colorB">
                            <div class="modal-header">
                                <h4 class="t">remove show</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="info">
                                <form action="{{url('RemoveVideo/'.$show->id)}}">
                                    <p class="addShow">Do you want to remove this show to your Download list?<p>
                                    <button type="submit" class="addShow">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($show->InDownloadList != 1)


                <br>
                <div class="text-center"><button class="status None" data-toggle="modal" data-target="#modal" >add to Download</button> </div>
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content colorB">
                            <div class="modal-header">
                                <h4 class="t">add show</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="info">
                                <form action="{{url('addVideo/'.$show->id)}}">
                                    <p class="addShow">Do you want to add this show to your Download list?<p>
                                    <button type="submit" class="addShow">Accept</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
        <div class="row">
            <div class="column side white"> 
               @if($show->trailer != null) <a target="_blank" rel="noopener noreferrer" href="{{$show->trailer}}"> @endif()
                    <div style="background-image: url('{{$show->LargeImageURL}}');" class="image"> </div>  
                @if($show->trailer != null)  </a>   @endif
                </div>
                <div class="column middle white">
                    <p>
                        {{$show->Description}}
                    </p>
                    
                </div>

                <div class="column side sideRight white">       
                    <ul class="infoList">
                        <li>Type: {{$show->type}}</li>
                        <li>Status: {{$show->seriesStatus}}</li>
                        @if($show->aired != null) <li>Aired: {{$show->aired}}</li> @endif
                        <li>Episode Length: {{$show->duration}}</li>
                        <li>Episodes: {{$show->episodeCount}}</li>
                        <li>Japanese: {{$show->JapaneseName}}</li>
                        <li>Genres:</li>
                        @foreach ($genres as $genre)
                            @if($genre != null)
                                <button class="genres">{{$genre}}</button> 
                            @endif
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>





        <div class="Episodes"> 
            <p class="Episodes">Episodes</p> 
        </div> 



         <div class="episodeSelect text-center"> 
            <!-- <button class="episodeList watched">Episode </button> <br> -->
            @if(count($episodes) != 0)
                @foreach ($episodes as $episode)
                @php
                    $check = false;
                    if($watched != null)
                    {
                        foreach ($watched as $w)
                        {
                            if($w->EpisodeID == $episode->id)
                            {
                                $check = true;
                                break;
                            }
                            
                        }
                    }
                @endphp
                    <a href="{{url('episode/'.$episode->id)}}"> 
                        <button class="episodeList @if($check == true)watched @endif">Episode {{$episode->EpisodeCount}}</button>
                    </a> <br>
                @endforeach  
            @else
                <div class="NoEpisodes">
                    <p class="NoEpisodes">There are currently no Episodes</p>
                </div>
            @endif
        </div>  x

       <!-- <script src="{{ asset('js/FavouriteButton.js') }}"></script> -->
       <script src="{{asset('js/Status.js')}}"></script>

        <script>

            // sorry that have to put this this here
            $(".heart.fa").click(function() {


                var url = "{{url('Favourite/'.$show->id)}}";
                // Create a new AJAX request object
                var request = new XMLHttpRequest();
                console.log('got here?');
                // Open a connection to the server
                request.open('GET', url);
                request.send();
                $(this).toggleClass("fa-heart fa-heart-o");

                
            });
        </script>
    </body>
</html>