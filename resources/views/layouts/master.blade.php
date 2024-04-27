<!DOCTYPE html>
<html lang="{{__("strings.lan")}}" dir="{{__("strings.dir")}}">
<head>
  <title> @isset($title)
    {{ $title }} | 
@endisset
{{ config('app.name') }}</title>
<link rel="icon" href="{!! asset('img/companyname.ico') !!}"/>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.css">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/international-telephone-input.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<!-- Top container -->
<nav class="navbar fixed-top bg-dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="/" ><img src="{{asset('img/companyname.png')}}" style="width: 100px"></a>
    <div >
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i style="color: #fff" class="fa fa-language"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align:{{__("strings.left")}};">
          <li><a class="dropdown-item" href="/lang/ar">AR</a></li>
          <li><a class="dropdown-item" href="/lang/en">EN</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i style="color: #fff" class="fa fa-user-o"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align:{{__("strings.left")}};">
          <li><a class="dropdown-item" href="/profile">{{Auth::user()->firstname}}</a></li>
          <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">  {{__("strings.Logout")}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </ul>
      </li> 
      </div>
    </div>
  </div>
</nav>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-{{__("strings.left")}} " style="z-index:3;width:200px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
      <span>{{__("strings.Welcome")}}, <a style="  color: rgb(0, 0, 0);" href="/profile"><strong >{{Auth::user()->firstname}}</strong></a></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>{{__("strings.Dashboard")}}</h5>
  </div>
  <div class="w3-bar-block">
  
    @can('manage users')
       <a href="{{route('admin.showUser')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  {{__("strings.Users")}}</a>
    @endcan
  </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main"  style="margin-{{__("strings.left")}}:200px;margin-top:43px;margin-bottom: 53px;text-align:{{__("strings.left")}};">
  <div class="w3-container">
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/international-telephone-input.js') }}"></script>
  <script src="{{ asset('font/pdfmake.js') }}"></script>
  <script src="{{ asset('font/vfs_fonts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="  https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
  <div>
    @yield('content')
  </div>
    <nav class="fixed-bottom navbar bg-dark">
      <h4 style="color: #fff">FOOTER</h4>
      <p style="color: #fff">{{__("strings.Copy_right_save")}} &copy; 2024 <a href="#">company name</a></p>
    </nav>
</div>
<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}
// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
</body>
</html>
