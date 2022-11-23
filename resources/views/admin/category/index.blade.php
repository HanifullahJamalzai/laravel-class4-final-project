@extends('admin.layout.index')
@section('content')

@include('common.alert')

<div class="pagetitle">
    <h1>Blank Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      
        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title">Table with hoverable rows</h5>
                  <div class="icon">
                    <a href="{{ route('category.create') }}">
                        <i class="bi bi-plus-lg" style="cursor: pointer; font-size: 2em;"></i>
                    </a>
                  </div>
              </div>


              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $item)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $item->name }}</td>
                      <td>EDIT | DELETE</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>


    </div>
  </section>


@endsection