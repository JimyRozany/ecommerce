<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="{{ route('all.users') }}" class="nav-link">
            <i class="fa-regular fa-user pr-3"></i>
            <p class="">Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('all.sellers') }}" class="nav-link">
              <i class="fa-solid fa-store"></i>
            <p class="">Sellers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('all.orders') }}" class="nav-link">
            <i class="fa-solid fa-list-check pr-3"></i>
            <p class="">Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('all.products') }}" class="nav-link">
              <i class="fa-brands fa-product-hunt"></i>
            <p class="">products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="logout" class="nav-link">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <p class="">Logout</p>
          </a>
        </li>

       </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
