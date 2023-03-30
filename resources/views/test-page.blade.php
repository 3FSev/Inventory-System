<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Student Grade Information | ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/icon/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/default-css.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/sb-admin-2.css">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="admin.php"><b>Home</b></a></li>
                                    <li class="active"><a href="admin_manage.php">Manage <b><i>Faculty /
                                                    Students</i></b></a></li>
                                    <li><a href="admin_grading.php">Manage <b><i>Grading Sheet</i></b></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Manage Faculty</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hi !

                                <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <form method="POST">
                                    <button type="submit" name="logout"
                                        class="btn btn-outline-secondary btn-lg btn-block">
                                        <i class="zmdi zmdi-power"></i>&nbsp; Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true"><b>MANAGE FACULTY ACCOUNTS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="home" aria-selected="true"><b>MANAGE STUDENT ACCOUNTS</b></a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">

                            <!-- additional content area start -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <!-- DATA TABLE -->
                                <div class="col-12">
                                    <div class="card mt-5">
                                        <div class="card-body">
                                            <h4 class="header-title">List of Faculty Accounts</h4>
                                            <div class="additional-content">
                                                <div class="alert alert-primary" role="alert">
                                                        <table class="data-tables datatable-primary" id="dataTable" width="100%"
                                                            cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>WIV Number</th>
                                                                    <th>Employee Name</th>
                                                                    <th>Item Name</th>
                                                                    <th>Quantity. Unit</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($approvedWiv as $aWiv)
                                                                <tr>
                                                                    <td>{{$aWiv->id}}</td>
                                                                    <td>{{$aWiv->name}}</td>
                                                                    <td>
                                                                        <ul>
                                                                            @foreach($aWiv->items as $item)
                                                                            <li>
                                                                                {{($item->name)}}
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </td>
                                                                    <td>
                                                                        @foreach($aWiv->items as $item)
                                                                        {{($item->pivot->quantity)}}
                                                                        {{($item->unit)}}<br>
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @foreach($aWiv->items as $item)
                                                                        {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End of DATA TABLE-->

                        </div>
                        <!-- additional content area end -->

                        <!-- Small modal start -->
                        <div class="col-lg-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Large modal -->
                                    <div class="modal fade bd-example-modal-sm">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">EDIT ACCOUNT</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Small modal modal end -->

                        <!-- additional content area start -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">Create Student Account</h4>
                                        <div class="additional-content">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- data table start -->
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">List of Student Accounts</h4>
                                        <div class="additional-content">
                                            <div class="alert alert-success" role="alert">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- data table end -->

                            <!-- Large modal start -->
                            <div class="col-lg-6 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Large modal -->
                                        </button>
                                        <div class="modal fade bd-example-modal-lg">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDIT ACCOUNT</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Large modal modal end -->

                        </div>
                        <!-- additional content area end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2018 . All right reserved</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- all line chart activation -->
    <script src="js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="js/plugins.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
