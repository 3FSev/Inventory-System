@include('theme/head')


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="logo-img">
          <img src="/img/50 logo.png" alt="Ormeco Logo" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">Ormeco Accountability System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="warehouse">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

      <div class="sidebar-heading">
          Tables
        </div>

      <div class="wrapper">
        <div class="menu" id="menu">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-fw fa-user"></i>
                <span>Employee</span>
              </a>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-fw fa-box"></i>
                <span>Warehouse</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                <i class="fas fa-fw fa-table"></i>
                <span>Issuance</span>
              </a>
              <ul class="list">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                <i class="fas fa-fw fa-table"></i>
                <span>MRT</span>
              </a>
              <ul class="list">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        
      </div>
    </ul>
    <!-- End of Sidebar -->
@include('theme.topbar')
@include('flash-message')