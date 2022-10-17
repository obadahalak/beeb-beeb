@extends('layouts.adminlayout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>


@endif


<form action="{{ route('updateRest') }}" method="POST">

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
        <label for="disabledTextInput" class="form-label">open time</label>
        <input name="time[]" type="time" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">close time</label>
        <input name="time[]" type="time" id="disabledTextInput" class="form-control" placeholder="Phone number">
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">is open</label>

        <select name="is_open" class="form-label">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
        </select>
      </div>

      <div class="mb-3 col-5">
        <label for="disabledTextInput" class="form-label">is Active</label>
        {{-- <input name="status" type="text" id="disabledTextInput" class="form-control"> --}}
        <select name="stauts" class="form-label">
            <option value="0"> 0 </option>
            <option value="1"> 1 </option>
        </select>
      </div>




      <button type="submit" class="btn btn-primary col-1">Submit</button>

  </form>


@endsection
