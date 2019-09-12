<!doctype html> 
    <head>   
        <link href="/css/signup.css" rel="stylesheet">
        @include('Includes/CssIncludes')
    </head>
    <body>
        @include('Includes/navbar')


        <form class="signup" method="POST" action="{{route('register')}}">
          @csrf  
            <h1 class="signup">Signup</h1>
            <hr class="signup">
            <label for="token">Access-Token</label>
            <input class="USignup"  type="password" name="token" id="token" placeholder=" enter access Toke here"> 
            <label for="name"> Username </label>
            <input class="USignup"  type="text" placeholder="Username" name="name" id="name" required>
            <label for="email">Email</label>
            <input class="USignup" id="email" name="email" type="text" placeholder="Email" required>
            <label for="password"> Password </label>
            <input class="USignup"  type="password" placeholder="Password" name="password" id="password" required>
            <label for="password"> confirm Password </label>
            <input class="USignup"  type="password" placeholder="Password" name="password_confirmation" id="password-confirm" required>
            <input class="submit" type="submit"  value="Create Account">
        </form>



   <!--     <div class="infobox">  
            <p class="info">Terms of Service</p>
            <ul>
                <li>By signing up, you accept our Terms of Service</li>
                <li>If you don't have a Access Token and you think you should have one, ask the site owner for one  </li>
                <li>A single Account is only allowed to use by one Person</li>
                <li>Not following the rules will end in a ban from the service</li>
            </ul>

        </div> -->

    </body>
</html>