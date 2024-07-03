<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Add your brand logo here -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="..\image\logo.png" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/')}}" class="d-block">nkz</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <h5 class="pt-2 pb-2 font-bold" style="color:white; font-weight: bold;">Menu</h5>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="color: white;">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('layouts.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p style="color: white;">
                List Server
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
