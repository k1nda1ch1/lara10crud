<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">アルデータ</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    
    @if(auth()->user()->role == "1")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users') }}">
          <i class="fas fa-users"></i>
          <span>User</span></a>
      </li>
    @endif

    <li class="nav-item">
      <a class="nav-link" href="{{ route('books') }}">
        <i class="fas fa-book"></i>
        <span>Books</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile') }}">
        <i class="fas fa-user"></i>
        <span>Profile</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    
  </ul>