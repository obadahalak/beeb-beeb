@extends('layouts.adminlayout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>


@endif


<form action="{{ route('updateOwner' , $owner->id) }}" method="POST">

    @csrf


      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">First name</label>
        <input name="fname" type="text" id="disabledTextInput" class="form-control" placeholder="First name">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Last name</label>
        <input name="lname" type="text" id="disabledTextInput" class="form-control" placeholder="Last name">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Email</label>
        <input name="email" type="text" id="disabledTextInput" class="form-control" placeholder="Email">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Password</label>
        <input name="password" type="text" id="disabledTextInput" class="form-control" placeholder="Password">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Phone number</label>
        <input name="phone" type="text" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>




      <button type="submit" class="btn btn-primary col-1">Submit</button>

  </form>


@endsection
