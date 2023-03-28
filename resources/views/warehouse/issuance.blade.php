@include('theme.sidebar')

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
                                aria-controls="profile" aria-selected="true"><b><i class="fa-solid fa-table"></i>
                                    WIV
                                </b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true"><b><i class="fa-solid fa-table"></i>
                                    PENDING/CREATE WIV
                                </b>
                            </a>
                        </li>
                    </ul>
                    <!-- additional content area start -->
                    <div class="tab-content mt-3" id="myTabContent">
                        <!-- DATA TABLE -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="tab-content mt-5">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                        {{($item->pivot->quantity)}}{{($item->unit)}}<br>
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
                        <!--- Personal Information Page End---->

                        <!--- Accountability Page Start---->
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="tab-content mt-5">

                                    <div class="card-header py-3">
                                        <h4 class="m-2 font-weight-bold text-primary">Issuance&nbsp;<a href="#"
                                                data-toggle="modal" data-target="#aModal" type="button"
                                                class="btn btn-primary bg-gradient-primary"
                                                style="border-radius: 0px;"><i class="fas fa-fw fa-plus">
                                                </i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>WIV Number</th>
                                                    <th>Employee Name</th>
                                                    <th>Item Name</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($wiv as $wiv)
                                                <tr>
                                                    <td>{{ $wiv->id }}</td>
                                                    <td>{{ $wiv->users->name }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($wiv->items as $item)
                                                            <li>
                                                                {{($item->name)}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        @foreach($wiv->items as $item)
                                                        {{($item->pivot->quantity)}}<br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($wiv->items as $item)
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
            </div>
        </div>
    </div>
    <!-- main content area end -->
    @include('theme.footer')
</body>
<!-- Issuance Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('issuance.store')}}" class="container-fluid" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="employee">Employee:</label>
                        <select name="user" id="user" class="form-control" required>
                            @foreach ($users as $user)
                            <option hidden></option>
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">WIV:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="wiv" class="form-control" placeholder="Number" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="wivDate" placeholder="Date"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">RIV:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="riv" class="form-control" placeholder="Number" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="rivDate" placeholder="Date"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">PO:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="po" class="form-control" placeholder="Number" required
                                        required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="poDate" placeholder="Date"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">RR:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="rr" class="form-control" placeholder="Number" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="rrDate" placeholder="Date"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="items-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-row">
                                    <td>
                                        <select name="item[]" class="form-control">
                                            @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="quantity[]">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-add-item">Add Item</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
