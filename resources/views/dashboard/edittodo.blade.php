@extends('layout')
@section('content')
<div class="bg-1">
    <div class="kosong" style="width: 100%; height: 80px;"></div>
<div class="container content">
    <form method="POST" action="/update/{{ $todo['id'] }}" id="create-form">
        
        @csrf
        {{-- karena di route nya pake method patch --}}
        @method('PATCH')
        <h3 style="text-align: center">Edit Todo</h3>
        @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <fieldset>
            {{-- atribut value fungsinya untuk memasukkan data ke input --}}
            {{-- kenapa datanya harus disimpan di input? karena ini kan fitur edit. Kalau fitur edit belum tentu  semua dta column diubah. jadi untuk mengantisipasi hal itu, tampilin dulu semua data di inputnya baru nantinya pengguna yang menentukan data input mana yg mau diubah --}}
            <label for="">Title</label>
            <input placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
        </fieldset>
        <fieldset>
            <label for="">Target Date</label>
            <input placeholder="Target Date" type="date" name="date"  value="{{ $todo['date'] }}">
        </fieldset>
        <fieldset>
            <label for="">Description</label>
            {{-- karena textarea tidak termasuk tag input, untuk enampilkan value nya di pertengahan (sebelum penutup tag </textarea>) --}}
            <textarea placeholder="Type your descriptions here..." tabindex="5" name="description" >{{ $todo['description'] }}</textarea>
        </fieldset>
        <fieldset>
            <button type="submit" id="contactus-submit" class="custom-btn btn-submit">Submit</button>
        </fieldset>
        <fieldset>
            <button href="/dashboard/todolist" class="mt-2 custom-btn btn-cancel">Cancel</button>
        </fieldset>

    </form>
</div>

@endsection
</div>