@include('theme/head')
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="warehouse">
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
      <div class="wrapper">
        <div class="menu" id="menu">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="employee">
                <i class="fas fa-fw fa-user"></i>
                <span>Employee</span>
              </a>
            <li class="nav-item">
              <a class="nav-link" href="items">
                <i class="fas fa-fw fa-box"></i>
                <span>Warehouse</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link with-sub">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage WIV</span>
              </a>
              <ul class="list">
                <li><a href="wivList">WIV List</a></li>
                <li><a href="issuance">Issuance</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link with-sub">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage MRT</span>
              </a>
              <ul class="list">
                <li><a href="returned">View MRT</a></li>
                <li><a href="mrt-ticket">Create/Approve MRT</a></li>
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