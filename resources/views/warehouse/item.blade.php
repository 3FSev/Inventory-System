@include('theme.head')
@include('theme.topbar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Equipment's Detail</h4>
        </div>
        <a href="../items" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i
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
                        {{$item->id}}<br>
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
                        {{$item->name}}<br>
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
                        {{$item->description}}<br>
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
                        {{ number_format($item->price, 2, '.', ',') }}<br><br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Unit Type<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        {{$item->unit}}<br>
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
                        {{$item->category->name}}<br>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Wiv Number</th>
                            <th>Emplpoyee Name</th>
                            <th>Email</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wivs as $wiv)
                        <tr>
                            <td>
                                {{$wiv->id}}
                            </td>
                            <td>
                                {{$wiv->users->name}}
                            </td>
                            <td>
                                {{$wiv->users->email}}
                            </td>
                            <td>
                                {{$wiv->users->department->name}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</center>
@include('theme.footer')
