<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat || Application</title>
    <link rel="stylesheet" href="{{asset("stylesheets/style.css")}}" />
    <link rel="icon" type="image/png" href="../common.png">
    <link rel="stylesheet" href="{{asset("css/all.min.css")}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS only -->
    <!-- CSS only -->
</head>
<body id="my" >
    <div class="menu">
        @guest
    @else
    <div class="menu-item"><a href="{{route('admin.home')}}">Inbox</a></div>
        <div class="menu-item"><a href="{{ route('admin.user')}}">Users</a></div>
        <div class="menu-item"><a href="{{ route('logout')}}"
         onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
             Logout
         </a>
        </div>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endguest

      </div>
      @yield('content')   
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- JavaScript Bundle with Popper -->
<!-- JavaScript Bundle with Popper -->
