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
      <!-- Tables Buttons -->
      <li class="nav-item">
        <a class="nav-link" href="employee">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="items">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventory</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="issuance">
          <i class="fas fa-fw fa-table"></i>
          <span>Issuance</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="returned">
          <i class="fas fa-fw fa-table"></i>
          <span>MRT</span>
        </a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        
      </div>
    </ul>
  </div>
    <!-- End of Sidebar -->
@include('theme.topbar')
@include('flash-message')