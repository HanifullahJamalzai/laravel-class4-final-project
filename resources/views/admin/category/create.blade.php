@extends('admin.layout.index')
@section('content')

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
              <h5 class="card-title">Category {{ $page }} Form</h5>

              <!-- General Form Elements -->
              <form action="@if(isset($category)) {{ route('category.update', ['category' => $category->id]) }} @else {{ route('category.store') }} @endif" method="POST">
                @csrf
                @if(isset($category))
                  @method('put')
                @else
                  @method('post')
                @endif
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" @if (isset($category)) value="{{ $category->name }}" @endif>
                  </div>
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    @if (isset($category))
                    <button type="submit" class="btn btn-success">Update</button>
                    @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                  </div>
                </div>

              </form>
              <!-- End General Form Elements -->

            </div>
          </div>


    </div>
  </section>


@endsection