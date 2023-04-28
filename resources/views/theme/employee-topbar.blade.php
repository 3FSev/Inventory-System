<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- dropdown -->
        <div class="custom-dropdown">
            <div class="dropdown-header">
                <span class="selected-value">Accountability</span>
            </div>
            <div class="dropdown-menu">
                <a href="/" style="text-decoration: none;"><div class="dropdown-item">List</div></a>
                <a href="pending-wiv" style="text-decoration: none;"><div class="dropdown-item">Pending</div></a>
            </div>
        </div>

        <div class="custom-dropdown">
            <div class="dropdown-header">
                <span class="selected-value">MRT</span>
            </div>
            <div class="dropdown-menu">
                <a href="mrt-list" style="text-decoration: none;"><div class="dropdown-item">List</div></a>
                <a href="request-mrt" style="text-decoration: none;"><div class="dropdown-item">Request</div></a>
            </div>
        </div>
        <!-- end of dropdown -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Notification Dropdown
                <div class="custom-dropdown">
                    <div class="dropdown-header">
                        <i class="fa-regular fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">10</span>
                    </div>
                    <div class="dropdown-menu">
                        <div class="dropdown-item" data-value="Option 1">List</div>
                        <div class="dropdown-item" data-value="Option 2">Request</div>
                    </div>
                </div> -->


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                        {{ Auth::user()->name }}
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="change-password">
                            <i class=" fas fa-pencil fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
