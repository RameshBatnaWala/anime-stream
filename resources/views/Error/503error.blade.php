<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/error.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/errornav')
        <div class="error">
            <h1 class="error">Oops ...</h1>
            <h2 class="error"> We got a 503 error here </h2>
            <hr class="error">
            <p class="error">You expected a working website, but it was me "503 error" ! <br> 
            This site might currently be under maintenance, if you come back in a few hours it will probably be back up.</p>
        </div>
    </body>
</html>