@extends('layout')
@section('content')
<div class="kosong" style="width: 100%; height: 80px;"></div>
@if (Session::get('successAdd'))
<div class="alert alert-success">
    {{ Session::get('successAdd') }}
</div>
@endif
@if (session('successUpdate'))
<div class="alert alert-success text-center">
    {{ session('successUpdate') }}
</div>
@endif
@if (session('successDelete'))
<div class="alert alert-success">
    {{ session('successDelete') }}
</div>
@endif
@if (session('done'))
<div class="alert alert-success">
    {{ session('done') }}
</div>
@endif
<div class="bg-1">



    <div class="wrapper ">
        <div class="headlinetodo d-flex px-5" style="justify-content: space-between;">
            <div class="kiri">
                <h4 class="text-center">My Todo's</h5>
                    <div>
                        <div class="text-muted pr-5">{{ $todos->count(); }} todos</div>
                    </div>
            </div>
            <div class="kanan d-flex">
                <div class="work">

                </div>
                <div class="d-flex justify-content-center">
                    <a href="/dashboard/createtodo" class="text-success">Create</a>
                </div>
                <div class="d-flex justify-content-center ml-4">
                    <a href="/dashboard/complated" class="text-success">Completed</a>
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
                        @if($item['status'] == 1)
                        <span class="fas fa-circle-check text-success btn"></span>
                        @else
                        <form action="/complated/{{ $item['id'] }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="fas fa-circle-check btn check"></button>
                        </form>
                        @endif
                    </div>
                    <div class="d-flex flex-column ">
                        {{-- menampilkan dat dinamis/data yang diambil dari db pada blade harus menggunakan {{ }} --}}
                        <a class=" title-todo">
                            {{ $item['title'] }}
                        </a>
                        <p style="color: rgb(85, 85, 85); font-size: 16px;">{{ $item['description'] }}</p>
                        {{-- konsep ternary : if colum status baris ini isinya 1 bakal munculin teks 'Completed' selain
                        dari itu akan menampilkan teks 'On-Proccess' --}}
                        <p class="text-muted">{{ $item['status'] ? 'Completed on :' : 'Target Completed :'}}
                            <span class="pl-1 date">
                                {{ $item['status'] ? \Carbon\Carbon::parse($item->done_time)->format('j F, Y'):
                                \Carbon\Carbon::parse($item->date)->format('j F, Y')}} </span>
                            {{-- Carbon itu package laravel untuk mengelola yang berhubngan dengan data. Tadinya value
                            column data di db kan bentuknya format 2022-11-22 nah kita pengen ubah bentuk formatnya jadi
                            22 November, 2022 --}}
                        </p>
                    </div>
                    <div class="ml-auto  atur">
                        <a href="/edit/{{ $item['id'] }}"><span class="fas fa-pen btn pen"
                                style="color:rgb(255, 172, 95)"></span> </a>
                        <form action="{{ route('delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fas fa-trash pt-2 sampah"
                                style="color:rgb(255, 86, 80); border:0; background: none;"></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{-- <div class="headlinetodo d-flex px-5" style="justify-content: space-between;">
            <div class="kiri">
                <h4 class="text-center">Todo's Completed</h5>
            </div>
        </div>
        <hr style="width: 95%">
    </div> --}}
</div>
@endsection
</div>