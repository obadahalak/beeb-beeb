@extends('layouts.adminlayout')
@section('content')

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
                          <th scope="col">Name</th>
                          <th scope="col">phone</th>
                          <th scope="col">address</th>
                          <th scope="col">description</th>
                          <th scope="col">status</th>
                          <th scope="col">edit</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($rests as $rest)
                          <tr>
                              <td>{{ $rest->name }}</td>
                              <td>{{ $rest->phone }}</td>
                              <td>{{ $rest->address }}</td>
                              <td>{{ $rest->description }}</td>
                              <td>{{ $rest->status }}</td>
                              <td><a href="{{ route('editRest') }}" > Edit </a></td>
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
