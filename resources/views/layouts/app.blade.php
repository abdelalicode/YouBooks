<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouBook</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light shadow-sm py-3">
  <div class="container-fluid">
    <a class="navbar-brand mx-5" href="{{ route('book.index') }}"><span class="material-symbols-outlined" style="color: orange;">
  YOUbook
</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @auth
      <ul class="navbar-nav me-auto  mb-2 mb-lg-0">  
        @if (Auth::user()->role->name == 'bibliothecaire')
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('book.create') }}">ADD BOOKS</a>
        </li>
        @endif

      
        
        <li class="nav-item px-3">
          <a class="nav-link" href="{{ route('book.index') }}">CATEGORIES</a>
        </li>
        
      </ul>
      
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <div class="mx-3 px-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('book.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->lastname}}  {{Auth::user()->firstname}}
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="{{ route('book.index') }}">PROFILE</a></li>
                @if (Auth::user()->role->name == 'etudiant')
                <li><a class="dropdown-item" href="{{ route('reservation.index') }}">MY BOOKS</a></li>
                @endif
                @if (Auth::user()->role->name == 'bibliothecaire')
                  <li><a class="dropdown-item" href="{{ route('users') }}">ASSIGN ROLES</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ route('logout') }}">LOGOUT</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      @endauth
     
    </div>
    @guest
    <div class="float-right mx-5 d-flex gap-3">
      <a href="{{ route('form.signin') }}" ><button type="button" class="btn btn-outline-success">LOGIN</button></a>
      <a href="{{ route('form.signup') }}" ><button type="button" class="btn btn-light ">SIGN UP</button></a>
      
    </div>

@endguest
  </div>
  
</nav>


    @yield('content')

    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>