@extends('layout')
@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (Session::get('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::get('notAllowed'))
<div class="alert alert-danger">
    {{ Session::get('notAllowed') }}
</div>
@endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11">

                <div class="card card-login o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row2">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Welcome!</h1>
                                        <p>Please Login</p>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login.auth') }}">

                                        @csrf
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control form-control-user" name="username"
                                                placeholder="Enter Your Username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="mt-4 btn btn-register btn-user btn-block"
                                            style="background-color: rgb(248, 118, 140) !important;">Login
                                        </button></a>

                                        <div class="text-center">
                                            <p class="mt-3">Do you have an account?</p>
                                            <a class="mt-2" href="/register">Register</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 image-login d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/image/login.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>

@endsection