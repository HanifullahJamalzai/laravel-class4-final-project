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
              <h5 class="card-title">Post Form</h5>

              <!-- General Form Elements -->
              <form action="@if(isset($post)) {{ route('post.update', ['post' => $post->id]) }} @else {{ route('post.store') }} @endif" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                  @method('put')
                @else
                  @method('post')
                @endif
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" @if (isset($post)) value="{{ $post->title }}" @endif>
                  </div>
                    @error('title')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Post Category</label>
                  <div class="col-sm-10">
                      <select name="category" class="form-control" id="">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                  </div>
                    @error('category')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Post description</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="description" class="tinymce-editor" >@if (isset($post)) {{ $post->description }} @endif</textarea>
                    </div>
                      @error('description')
                          <span style="color: red">{{ $message }}</span>
                      @enderror
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Post title</label>
                    <div class="col-sm-10">
                      <input type="file" name="photo" class="form-control">
                    </div>
                      @error('photo')
                          <span style="color: red">{{ $message }}</span>
                      @enderror
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Post tags</label>
                    <div class="col-sm-10">
                        <select name="tag[]" multiple class="form-control" id="">
                          @foreach ($tags as $tag)
                              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                    </div>
                      @error('tag')
                          <span style="color: red">{{ $message }}</span>
                      @enderror
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    @if (isset($post))
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