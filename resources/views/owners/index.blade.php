@extends('layouts.adminlayout')
@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>


@endif

<section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
      <div class="mask d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                    <table class="table table-striped mb-0">
                      <thead style="background-color: #002d72;">
                        <tr>
                          <th scope="col">Owner name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">edit</th>
                          <th scope="col">delete</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($owners as $owner)
                          <tr>
                          <td>{{ $owner->fname . ' ' . $owner->lname }}</td>
                          <td>{{ $owner->email }}</td>
                          <td>{{ $owner->phone }}</td>
                          <td><a href="{{ route('editOwner' , $owner->id) }}">edit</a></td>
                          <td><a href="{{ route('deleteOwner' , $owner->id) }}">delete</a></td>




                        </tr>

                          @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
