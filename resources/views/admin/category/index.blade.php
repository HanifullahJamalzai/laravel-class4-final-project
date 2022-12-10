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
                  <h5 class="card-title">
                    <form action="{{ route('category.search') }}" method="post">
                      @csrf
                      <input type="text" name="search" id="" placeholder="Search here..."> <button type="submit">Search</button>
                    </form>
                  </h5>
                  
                  <div class="icon">
                    <a href="{{ route('category.trash') }}">
                      <i class="bi bi-trash" style="cursor: pointer; font-size: 2em;"></i>
                    </a>
                  </div>

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
                    @forelse ($categories as $key => $item)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $item->name }}</td>
                      <td class="d-flex">

                        {{-- <a href="{{ route('category.edit', ['category' => $item->id]) }}" class="btn btn-success btn-sm">Edit</a> --}}
                        {{-- <x-edit-button-component route="category.edit" routeName="category" :routeKey="$item->id" /> --}}
                        &nbsp;

                        {{-- <x-delete-btn-component route="category.destroy" routeName="category" :routeKey="$item['id']" /> --}}
{{-- 
                        <form action="{{ route('category.destroy', ['category' => $item->id]) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}
                      </td>
                    </tr>
                    @empty
                      <h1 class="text-danger">No Items Found!</h1>
                    @endforelse
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>


    </div>
  </section>


@endsection