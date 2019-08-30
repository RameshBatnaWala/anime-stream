<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/Schedule.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/navbar')

        <!--
         If you see this while viewing the source in your browser, keep in mind that 
         the real code doesn't look that ugly.
        -->

        <h1 class="ScheduleTitle">Schedule</h1>

        @php
            $lastDay = "";
        @endphp
        @foreach ($schedule as $day)

            @if($lastDay != $day->AirDay)
                
                <!-- I know it is ugly but what should i do ?-->
                @if($lastDay != "")
                    </div>
                @endif


                <div class="DaySeperator">
                    <p class="Day">{{ucwords($day->AirDay)}}</p>
                </div>
                <div class="shows">
                @php 
                    $lastDay = $day->AirDay
                @endphp
            @endif

            
                <a href="{{url("Show/".$day->SeriesID)}}">
                    <p class="shows">{{$day->SeriesName}}</p>
                </a>
            
        @endforeach

        

        

    </body>
</html>