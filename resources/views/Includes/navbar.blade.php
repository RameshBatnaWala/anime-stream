<nav class="navbar navbar-dark bg-dark backColor navbar-expand-lg" style="background-color:gray">
  <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i>多-アニメ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-center">
      <li class="nav-item">
        <a class="nav-link" href="{{url('Schedule')}}"> <i class="fa fa-calendar"></i> Schedule</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('All')}}"> <i class="fa fa-list"></i> All Shows</a>
      </li>

      @guest  
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#modalLoginForm"><i class="fa fa-sign-in"></i> login</a>
      </li>
      @endguest

      @auth    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-center" style="color: lightgray" href="{{url('User')}}">home</a>
          <a class="dropdown-item text-center" style="color: lightgray" href="{{url('Settings')}}">settings</a>
          <a class="dropdown-item text-center" style="color: lightgray" href="{{ route('logout') }}">logout</a>
         <!-- <div class="dropdown-divider"></div> -->
        </div>
      </li>
      @endauth

    </ul>
   <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search Anime" aria-label="Search" required>
      <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Search</button>
    </form>

    -->
  </div>
</nav>



@guest

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content colorB">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="login" method="POST" action="{{route('login')}}">
       @csrf
        <div class="login">
          <label class="loginInput" for="email">Email</label>
          <input name="email"  id="email" class="loginInput" type="text" placeholder="email" required>
          <label class="loginInput" for="password">Password</label> 
          <input name="password" id="password" class="loginInput" type="password" placeholder="password" required>
          <br>
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label class="form-check-label" for="remember">
            Remember Me
          </label>
          
          <div class="centerSub">
            <input type="submit" class="loginSub" value="login">      
          </div>
        </div>
      </form>
      <div class="login">
        <a href="{{url('register')}}"><button class="loginSub" >or Sign Up</button> </a>
      </div>
    </div>
  </div>
</div>

@endguest


<hr class="navSeb" />