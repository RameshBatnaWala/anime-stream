<!doctype html> 
    <head>
        @include('Includes/CssIncludes')
        <link href="/css/error.css" rel="stylesheet">
    </head>
    <body>
        @include('Includes/errornav')
        <div class="error">
            <h1 class="error">Oops ...</h1>
            <h2 class="error"> We got a 401 or 403 error here </h2>
            <hr class="error">
            <p class="error">You shouldn't be here please just go back and we will forget this incident</p>
        </div>
    </body>
</html>