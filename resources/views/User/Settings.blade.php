<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/user.css" rel="stylesheet">
        <link href="/css/Settings.css" rel="stylesheet">
        <link href="/css/SettingsCheckbox.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/navbar')

       <div class="backgroundimage" style="background-image:  linear-gradient(to bottom, rgba(255,255,255, 0) 0%, #06090f 99%),url('{{url('uploads/'.$user->Banner)}}')" id="image">
            <div class="userName">
                <h1 class="userName">Settings</h1>
            </div>
        </div>



        <div class="Settings">
            <form  action="{{ url('Settings') }}" enctype="multipart/form-data" method="POST" class="Settings">
                {{ csrf_field() }}
                <div class ="upload">
                    <button class="upload">Change Banner</button>
                    <input type="file" id="imgInp" name="myfile">
                </div>
                <div class="radio" name="info">
                    <label class="b-contain">
                    <span>Automatically add watched videos to watch-List</span>
                    <input name="WatchList" type="checkbox"  @if($user->AutoWatch == 1) checked @endif>
                    <div class="b-input"></div>
                    </label>
                </div>
                <div class="Submit">
                    <input class="submit" type="submit" value="Save Settings">
                </div>
            </form>
        </div>




    <script>
    document.getElementById('imgInp').addEventListener('change', readURL, true);
    function readURL(){
        var file = document.getElementById("imgInp").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            document.getElementById('image').style.backgroundImage = "linear-gradient(to bottom, rgba(255,255,255, 0) 0%, #06090f 99%),url("+reader.result+")";        
        }
        if(file){
            reader.readAsDataURL(file);
        }else{
        }
    }
    </script>

    </body>
</html>