@include('theme.sidebar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Equipmen's Detail</h4>
        </div>
        <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i
                class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
        <div class="card-body">
            <!--Insert Data here-->
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Item Code<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Item Name<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                      <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Description<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                      <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Price<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                      <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Category<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                      <br>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</center>
@include('theme.footer')
