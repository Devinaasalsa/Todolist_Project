@extends('layout')
@section('content')
<div class="bg-1">
    <div class="kosong" style="width: 100%; height: 80px;"></div>
<div class="container content" style="">
    <form method="POST" action="{{route ('store') }}" id="create-form">
        
        @csrf
        <h3 style="text-align: center">Create Todo</h3>
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
            <label for="">Title</label>
            <input placeholder="title of todo" type="text" name="title">
        </fieldset>
        <fieldset>
            <label for="">Target Date</label>
            <input placeholder="Target Date" type="date" name="date">
        </fieldset>
        <fieldset>
            <label for="">Description</label>
            <textarea placeholder="Type your descriptions here..." tabindex="5" name="description"></textarea>
        </fieldset>
        <fieldset>
            <button type="submit" id="contactus-submit" class="custom-btn btn-submit">Submit</button>
        </fieldset>
        <fieldset>
            <button href="/dashboard/createtodo" class="mt-2 custom-btn btn-cancel">Cancel</button>
        </fieldset>
        {{-- <div class="cont">  
<button class="btn"><span>Submit</span><img src="https://i.cloudup.com/2ZAX3hVsBE-3000x3000.png" height="20" width="20"></button>
  
    
</div> --}}

        
        {{-- <div class="row  align-items-center">
            <div class="col-auto">
              <label for="inputPassword6" class="col-form-label">Password</label>
            </div>
            <div class="col-auto">
              <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            
          </div> --}}

    </form>
</div>

@endsection
</div>