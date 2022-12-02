@extends('layout')
@section('content')
<div class="kosong" style="width: 100%; height: 80px;"></div>
<div class="alertdanger mx-auto" style="width: 90%;">
    @if (Session::get('notAllowed'))
<div class="alert alert-danger">
    {{ Session::get('notAllowed') }}
</div>
@endif
</div>
<div class="bg-1">
    

<div class="home">
    <div class="imagetodo d-flex justify-content-center align-items-center mt-5">
        <img src="{{ asset('assets/image/todo.png') }}" alt="">
    </div>
    <div class="texthome text-center">
        <h3>
            Todo App
        </h3>
        <p>Click the button below to add to your activity list!
            <br>
            You can see a list of your activities at the top (breadcrumb)
        </p>
    </div>
    <a href="/dashboard/createtodo" class="d-flex justify-content-center align-items-center text-decoration-none ">
        <button type="submit" class=" text-white col-2 mt-2 btn btn-register btn-user btn-block"
            style="background-color: rgb(248, 118, 140) !important;">
            Create Todo
        </button>
    </a>
</div>
</body>
@endsection
</div>