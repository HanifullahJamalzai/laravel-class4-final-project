  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      @can('isAdmin')
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('category.index') }}">
            <i class="bi bi-grid"></i>
            <span>Categories</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('tag.index') }}">
            <i class="bi bi-grid"></i>
            <span>Tags</span>
          </a>
        </li><!-- End Dashboard Nav -->
      @endcan

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('post.index') }}">
          <i class="bi bi-grid"></i>
          <span>Posts</span>
        </a>
      </li><!-- End Dashboard Nav -->

     
    </ul>

  </aside><!-- End Sidebar-->
