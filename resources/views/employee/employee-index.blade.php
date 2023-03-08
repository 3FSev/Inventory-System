@include('theme.head')
@include('theme.topbar')
<body>
    <!-- main content area start -->
    <div class="main-content">
        <div class="main-content-inner">
            <!--  Nav area start -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true"><b><i class="fa-solid fa-user"></i>
                                    PROFILE
                                </b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true"><b><i class="fa-solid fa-table"></i>
                                    MANAGE ACCOUNTABILITY
                                </b>
                            </a>
                        </li>
                    </ul>
                    <!-- additional content area start -->
                    <div class="tab-content mt-3" id="myTabContent">
                        <!-- DATA TABLE -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="card mt-5">
                                    <h4 class="header-title" style="font-size:30px;">My profile</h4>
                                    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                                        <div class="upload">
                                            <img class="image" src="" width=125 height=125 title="">
                                            <div class="round">
                                                <input type="hidden" name="id" value="">
                                                <input type="hidden" name="name" value="">
                                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                                <i class="fa fa-camera" style="color: #fff;"></i>
                                            </div>
                                        </div>
                                    </form>
                                    <script type="text/javascript">
                                        document.getElementById("image").onchange = function () {
                                            document.getElementById("form").submit();
                                        };

                                    </script>
                                    <br>
                                    <br>

                                    <!--- Personal Information Page Start---->
                                    <div class="col-md-8 col-lg-6">
                                        <div class="tabs">
                                            <ul class="nav nav-tabs tabs-primary">
                                                <li class="active">
                                                    <a href="#overview" data-toggle="tab" style="font-size:20px;"><i
                                                            class="fa-solid fa-address-card"></i> Personal
                                                        Information</a>
                                                </li>
                                                <li>
                                                    <a href="#edit" data-toggle="tab" class="edit"
                                                        style="padding-left:25px;color:#A85CF9;font-size:20px;"><i
                                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="overview" class="tab-pane active">
                                                    <section class="simple-compose-box mb-xlg">
                                                        <form method="get" action=""><br>
                                                            <label class="control-label" for="profileFirstName"
                                                                style="font-size:20px;"><b>Full
                                                                    Name:</b></label><br>
                                                            <label class="control-label" for="profileFirstName"
                                                                style="font-size:20px;"><b>Address :</b></label><br>
                                                            <label class="control-label" for="profileFirstName"
                                                                style="font-size:20px;"><b>Contact Number
                                                                    :</b></label><br>
                                                            <label class="control-label" for="profileFirstName"
                                                                style="font-size:20px;"><b>Birth Date :</b></label>
                                                        </form>
                                                    </section>
                                                </div>

                                                <!--- Edit/Update Information---->
                                                <div id="edit" class="tab-pane">
                                                    <form class="form-horizontal" method="post" action="">
                                                        <br>
                                                        <h4 class="mb-md">Edit Information :</h4><br>
                                                        <fieldset>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="stud_id"
                                                                    id="profile_id" value="" hidden>
                                                                <label class="col-md-3 control-label"
                                                                    for="profileFirstName">Full Name
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="stud_name" id="profileFirstName" value=""
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                    for="profileAddress">Address</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="stud_address" id="profileAddress"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                    for="profileCompany">Contact Number</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="stud_contact" id="profileCompany"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                    for="profileCompany">Birthdate</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="stud_birthdate" id="profileCompany"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="panel-footer">
                                                            <div class="row">
                                                                <div class="col-md-9 col-md-offset-3"></a>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="update_stud"><i
                                                                            class="fa-solid fa-pen-to-square"></i>
                                                                        Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                    <!--- Change Password ---->
                                                    <hr class="dotted tall">
                                                    <form method="post" action="">
                                                        <h4 class="mb-xlg">Change Password</h4>
                                                        <fieldset class="mb-xl">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                    for="profileNewPassword">New Password</label>
                                                                <input type="text" class="form-control" name="stud_id"
                                                                    value="" id="profileNewPassword" hidden>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="stud_password" id="profileNewPassword">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                    for="profileNewPasswordRepeat">Repeat New
                                                                    Password</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        id="profileNewPasswordRepeat"
                                                                        name="stud_repassword">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="panel-footer">
                                                            <div class="row">
                                                                <div class="col-md-9 col-md-offset-3">
                                                                    <button type="reset" name="reset"
                                                                        class="btn btn-default"> <i
                                                                            class="fa-solid fa-ban"></i>
                                                                        Clear</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="change_pass"><i
                                                                            class="fa-solid fa-key"></i> Change
                                                                        Password</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- Personal Information Page End---->

                        <!--- Accountability Page Start---->
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="tab-content mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title"></h4>
                                        <div class="additional-content">
                                            <div class="alert alert-primary" role="alert"
                                                style="background-color:#C5BDDC;">
                                                <div class="data-tables datatable-primary">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active " id="profile-tab"
                                                                        data-toggle="tab" href="#profile" role="tab"
                                                                        aria-controls="profile"
                                                                        aria-selected="true"><b><i
                                                                                class="fa-solid fa-user"></i>
                                                                            PROFILE
                                                                        </b>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" id="home-tab" data-toggle="tab"
                                                                        href="#home" role="tab" aria-controls="home"
                                                                        aria-selected="true"><b><i
                                                                                class="fa-solid fa-table"></i>
                                                                            MANAGE ACCOUNTABILITY
                                                                        </b>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
    @include('theme.footer')

</body>

</html>
