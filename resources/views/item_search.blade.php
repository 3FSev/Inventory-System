@include('theme.sidebar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Product's Detail</h4>
        </div>
        <a href="product.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i
                class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
        <div class="card-body">
            <!--Insert Data here-->
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Product Code<br>
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
                        Product Name<br>
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

<div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Inventory</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product Code</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>On Hand</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Date Stock In</th>
                    </tr>
                </thead>
                <tbody>

                    <!--Insert Data here-->

                </tbody>
            </table>
        </div>
    </div>
</div>


@include('theme.footer')
