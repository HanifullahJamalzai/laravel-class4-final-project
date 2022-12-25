@extends('landing.layout.index')
@section('content')

<section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <div class="post-meta"><span class="date">{{ $post[0]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
            <h1 class="mb-5">{{ $post[0]->title }}</h1>
            <figure class="my-4">
              <img src="{{ $post[0]->photo }}" alt="" class="img-fluid">
            </figure>
            <p>{!! $post[0]->description !!}</p>
          </div><!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
          <div class="comments">
            <h5 class="comment-title py-4">{{ $post[0]->comments->count() }} Comments</h5>
            <div class="comment d-flex mb-4">
              <div class="flex-shrink-0">
                <div class="avatar avatar-sm rounded-circle">
                  <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                </div>
              </div>
              
              <div class="flex-grow-1 ms-2 ms-sm-3">
                
                @foreach ($post[0]->comments as $comment)
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">{{ $comment->user->name }}</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    {{ $comment->description }}
                  </div>
                  

                  @can('commentOwner', $comment)
                  <div class="d-flex" >
                    
                    <form action="{{ route('comment.destroy', ['comment' => $comment]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <a href="{{ route('comment.edit', ['comment' => $comment->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  @endcan
                  <hr>
                @endforeach

                {{-- <div class="comment-replies bg-light p-3 mt-3 rounded">
                  <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                  <div class="reply d-flex mb-4">
                    <div class="flex-shrink-0">
                      <div class="avatar avatar-sm rounded-circle">
                        <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-2 ms-sm-3">
                      <div class="reply-meta d-flex align-items-baseline">
                        <h6 class="mb-0 me-2">Brandon Smith</h6>
                        <span class="text-muted">2d</span>
                      </div>
                      <div class="reply-body">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                      </div>
                    </div>
                  </div>
                  <div class="reply d-flex">
                    <div class="flex-shrink-0">
                      <div class="avatar avatar-sm rounded-circle">
                        <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-2 ms-sm-3">
                      <div class="reply-meta d-flex align-items-baseline">
                        <h6 class="mb-0 me-2">James Parsons</h6>
                        <span class="text-muted">1d</span>
                      </div>
                      <div class="reply-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                      </div>
                    </div>
                  </div>
                </div> --}}

              </div>
            </div>
          </div><!-- End Comments -->

          <!-- ======= Comments Form ======= -->
          <div class="row justify-content-center mt-5">

            <div class="col-lg-12">
              <h5 class="comment-title">Leave a Comment</h5>
              <div class="row">
               
                <form action="
                  @if(isset($isComment))
                    {{ route('comment.update', ['comment' => $isComment->id]) }} 
                  @else 
                    {{ route('comment.store') }} 
                  @endif"
                  method="POST">

                  @csrf
                  @if(isset($isComment))
                    @method('put')
                  @else
                    @method('post')
                  @endif
                  <input type="hidden" name="post_id" value="{{ $post[0]->id }}">
                  
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>

                    <textarea class="form-control" name="description" id="comment-message" placeholder="Enter your name" cols="30" rows="10">@if(isset($isComment)){{$isComment->description}}@endif</textarea>
                  </div>
                  <div class="col-12">
                    @if (isset($isComment))
                      <input type="submit" class="btn btn-success" value="Comment Update">
                    @else
                      <input type="submit" class="btn btn-primary" value="Add Comment">
                    @endif
                </div>
                
              </form>


              </div>
            </div>
          </div><!-- End Comments Form -->

        </div>
        <div class="col-md-3">
          <!-- ======= Sidebar ======= -->
          <div class="aside-block">

            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

              <!-- Popular -->
              <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="#">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>
              </div> <!-- End Popular -->


            </div>
          </div>


          <div class="aside-block">
            <h3 class="aside-title">Categories</h3>
            <ul class="aside-links list-unstyled">
              @foreach ($categories as $category)
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
              @endforeach
            </ul>
          </div><!-- End Categories -->

          <div class="aside-block">
            <h3 class="aside-title">Tags</h3>
            <ul class="aside-tags list-unstyled">
              <li><a href="category.html">Business</a></li>
              <li><a href="category.html">Culture</a></li>
              <li><a href="category.html">Sport</a></li>
              <li><a href="category.html">Food</a></li>
              <li><a href="category.html">Politics</a></li>
              <li><a href="category.html">Celebrity</a></li>
              <li><a href="category.html">Startups</a></li>
              <li><a href="category.html">Travel</a></li>
            </ul>
          </div><!-- End Tags -->

        </div>
      </div>
    </div>
  </section>
@endsection