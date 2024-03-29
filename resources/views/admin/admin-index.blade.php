@include('theme.admin-sidebar')
<div class="row show-grid">
    <!-- Items ROW -->
    <div class="col-md-3">
        <!-- Items record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="ver" style="text-decoration: none">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Accounts</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                {{$verCount}} Account(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Employee ROW -->
    <div class="col-md-3">
        <!-- Employee record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <a href="unv" style="text-decoration: none">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-0">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Unregistered Accounts</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    {{$unvCount}} Account(s)
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@include('theme.footer')
