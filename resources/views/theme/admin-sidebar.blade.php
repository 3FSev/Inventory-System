@include('theme/head')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Ormeco Accountability System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables
      </div>
      <!-- Tables Buttons -->
      <div class="wrapper">
        <div class="menu" id="menu">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link with-sub">
                <i class="fas fa-fw fa-user"></i>
                <span>Manage Users</span>
              </a>
              <ul class="list">
                <li><a href="ver">Users List</a></li>
                <li><a href="unv">Unverified Users</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link with-sub">
                <i class="fas fa-fw fa-database"></i>
                <span>Restore Data</span>
              </a>
              <ul class="list">
                <li><a href="deleted-users">Users</a></li>
                <li><a href="deleted-items">Items</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
      </div>

    </ul>
    <!-- End of Sidebar -->
@include('theme.topbar')
@include('flash-message')
