<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <h2 style="font-size: 30px;font-weight:bold">Dari <span style="color: blue">Shop</span</h2>
    </div>
    <ul class="nav">
    

      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/home')}}">
          <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('add_category')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Add Categories</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="{{url('add_product')}}" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Add product</span>
          
        </a>

      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('all_products')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">All Products </span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('show_orders')}}">
          <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
          </span>
          <span class="menu-title">Show Orders</span>
        </a>
      </li>
      
     
     
     
    </ul>
  </nav>