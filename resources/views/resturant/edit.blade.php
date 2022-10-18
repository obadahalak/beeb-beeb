@extends('layouts.adminlayout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>


@endif


<form action="{{ route('storeRest') }}" method="POST">

    @csrf


      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Name</label>
        <input name="name" type="text" id="disabledTextInput" class="form-control" placeholder="Name">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Address</label>
        <input name="address" type="text" id="disabledTextInput" class="form-control" placeholder="address">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">lat</label>
        <input name="lat" type="text" id="disabledTextInput" class="form-control" placeholder="lat">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">long</label>
        <input name="long" type="text" id="disabledTextInput" class="form-control" placeholder="long">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Email</label>
        <input name="description" type="text" id="disabledTextInput" class="form-control" placeholder="description">
      </div>

      <div class="mb-3 col-5">
          <label for="disabledTextInput" class="form-label">the owner</label>

          <select name="owners_id" class="form-label">
              @foreach ($owners as $owner)
              <option value="{{ $owner->id }}"> {{ $owner->fname . ' ' . $owner->lname }} </option>
              @endforeach

        </select>
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Section</label>

        <select name="section_id" class="form-label">
            @foreach ($sections as $section)
              <option value="{{ $section->id }}"> {{ $section->name }} </option>
              @endforeach

        </select>
      </div>


      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Phone number</label>
        <input name="phone" type="text" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Delivary Cost</label>
        <input name="delivery_cost" type="text" id="disabledTextInput" class="form-control" placeholder="Delivery Cost">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Delivery time</label>

        <select name="delivery_date" class="form-label">
            <option value="10"> 10 min </option>
            <option value="20"> 20 min </option>
            <option value="30"> 30 min </option>
            <option value="40"> 40 min </option>
            <option value="50"> 50 min </option>
            <option value="60"> 60 min </option>

        </select>
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">open time</label>
        <input name="time[]" type="time" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">close time</label>
        <input name="time[]" type="time" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>

      {{--  <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">is open</label>

        <select name="is_open" class="form-label">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
        </select>
      </div>  --}}

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">is Active</label>
        {{-- <input name="status" type="text" id="disabledTextInput" class="form-control"> --}}
        <select name="status" class="form-label">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
        </select>
      </div>

      <h2> Add an offer </h2>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">Expire date</label>
        <input name="offer[]" type="text" id="disabledTextInput" class="form-control" placeholder="expire date">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">code</label>
        <input name="offer[]" type="text" id="disabledTextInput" class="form-control" placeholder="code">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">discount</label>
        <input name="offer[]" type="text" id="disabledTextInput" class="form-control" placeholder="discount">
      </div>






      <button type="submit" class="btn btn-primary col-1">Submit</button>

  </form>


@endsection
