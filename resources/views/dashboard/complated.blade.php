@extends('layout')
@section('content')
<div class="kosong" style="width: 100%; height: 80px;"></div>
@if (Session::get('successAdd'))
<div class="alert alert-success">
    {{ Session::get('successAdd') }}
</div>
@endif
@if (session('successUpdate'))
<div class="alert alert-success">
    {{ session('successUpdate') }}
</div>
@endif
@if (session('successDelete'))
<div class="alert alert-success">
    {{ session('successDelete') }}
</div>
@endif
<div class="bg-1">



    <div class="wrapper ">
        {{-- <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                <div class="h5 text-align-center">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="/dashboard/createtodo" class="text-success">Create</a>
                    <a href="">Complated</a>
                </span>
            </div>
        </div> --}}
        <div class="headlinetodo d-flex px-5" style="justify-content: space-between;">
            <div class="kiri">
                <h4 class="text-center">Todo's Complated</h5>
                    <div>
                        <div class="text-muted pr-5">{{ $todos->count(); }} todos</div>
                    </div>
                </div>
            <div class="kanan d-flex">
                <div class="d-flex justify-content-center ml-4">
                    <a href="/dashboard/todolist" class="text-success">My Todo's</a>
                </div>
            </div>

        </div>
        <hr style="width: 95%">
        {{-- looping data-data dari compact 'todos' agar dapat ditambilkan per baris datanya --}}
        <div class="box-list">


            @foreach ($todos as $item)
            <div id="comments" class=" padding">
                <div class="comment d-flex px-3">
                    <div class="mr-2">
                        <form action="/todo/complated/{{ $item['id'] }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="fas fa-circle-check btn"></button>
                        </form>
                    </div>
                    <div class="d-flex flex-column ">
                        {{-- menampilkan dat dinamis/data yang diambil dari db pada blade harus menggunakan {{ }} --}}
                        <a class=" title-todo">
                            {{ $item['title'] }}
                        </a>
                        <p style="color: rgb(85, 85, 85); font-size: 16px;">{{ $item['description'] }}</p>
                        {{-- konsep ternary : if colum status baris ini isinya 1 bakal munculin teks 'Complated' selain
                        dari itu akan menampilkan teks 'On-Proccess' --}}
                        <p class="text-muted">{{ $item['status'] == 1 ? 'Complated' : 'On-Proccess'}}
                            <br>
                            <span class="date">{{ \Carbon\Carbon::parse($item['date'])->format('j F, Y') }}</span>
                            {{-- Carbon itu ackage laravel untuk mengelola yang berhubngan dengan data. Tadinya value
                            column data di db kan bentuknya format 2022-11-22 nah kita pengen ubah bentuk formatnya jadi
                            22 November, 2022 --}}
                        </p>
                    </div>
                    <div class="ml-auto  atur">
                        <a href="/edit/{{ $item['id'] }}"><span class="fas fa-pen btn"
                                style="color:rgb(255, 172, 95)"></span> </a>
                        <form action="{{ route('delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fas fa-trash pt-2 sampah" style="color:rgb(255, 86, 80); border:0; background: none;"></button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
</div>