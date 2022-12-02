<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="{{ url('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ url('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Todo App</title>
</head>

<body class="bg-1">
    
    @if (Auth::check())
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                ToDo App
            </a>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="/logout">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>--}}



    {{-- <nav class="breadcrumb-css mx-auto"
        style="background:#bbbbbb --bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item ">
                <img class="home-icon " src="{{ asset('assets/image/home-icon.png') }}" alt="">
                <a style="color: #F9859B;" href="/dashboard/welcome" class="text-decoration-none">Home</a>
            </li>

            <li class="dropdown breadcrumb-item active">
                <a style="color: #757575;" id="navbarDropdown" class="text-decoration-none dropdown-toggle" href="#"
                    role="button" data-toggle="dropdown">
                    ToDo List
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard/todolist">
                        Todo List
                    </a>
                    <a class="dropdown-item" href="">
                        Todo List Complated
                    </a>

                </div>
            </li>
        </ol>
    </nav> --}}

    <div class="navflex">
        <div class="navitem pt-2">
            <div class="logo">
                <h4>TODO LIST APP </h4>
            </div>
            <ol class="d-flex" style="list-style: none; width: 40%;">
                <li>
                    <a href="/dashboard/welcome" class="text-decoration-none">Home</a>
                </li>
                <li class="">
                    <a href="/dashboard/createtodo">
                        Create
                    </a>
                </li>
                <li class="">
                    <a href="/dashboard/todolist">
                        Todo List
                    </a>
                </li>
                    <li class="nav-item dropdown">
                        <i class="fa-solid fa-circle-user" style="font-size: 20px; color:#FFD67C;"></i>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pl-2" href="#" role="button"
                            data-toggle="dropdown">
                            {{ Auth::user()->username }}
                            
                        </a>
                        
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logout">
                                Logout
                            </a>
                        </div>
                    </li>
            </ol>
        </div>
    </div>
    </div>
    @endif
    @yield('content')
</body>

<!-- Bootstrap core JavaScript-->
<script src="{{ url('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
</script> --}}
</body>


<!-- Core plugin JavaScript-->
<script src="{{ url('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('sbadmin/js/sb-admin-2.min.js')}}"></script>

</html>