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
                <div class="dropdown-item" data-value="Option 1">Option 1</div>
                <div class="dropdown-item" data-value="Option 2">Option 2</div>
                <div class="dropdown-item" data-value="Option 3">Option 3</div>
            </div>
        </div>

        <div class="custom-dropdown">
            <div class="dropdown-header">
                <span class="selected-value">MRT</span>
            </div>
            <div class="dropdown-menu">
                <div class="dropdown-item" data-value="Option 1">Option 1</div>
                <div class="dropdown-item" data-value="Option 2">Option 2</div>
                <div class="dropdown-item" data-value="Option 3">Option 3</div>
            </div>
        </div>
        <!-- end of dropdown -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Notification Dropdown -->
                
                <div class="custom-dropdown">
                    <div class="dropdown-header">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                    <div class="dropdown-menu">
                        <div class="dropdown-item" data-value="Option 1">Option 1</div>
                        <div class="dropdown-item" data-value="Option 2">Option 2</div>
                        <div class="dropdown-item" data-value="Option 3">Option 3</div>
                    </div>
                </div>


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
                        <a class="dropdown-item" href="#">
                            <i class=" fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
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