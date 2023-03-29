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
                                <div class="card mt-5">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>WIV Number</th>
                                                            <th>Date</th>
                                                            <th>Item Name</th>
                                                            <th>Category</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($mrt as $mrt)
                                                        <tr>
                                                            <td>{{ $mrt->users->name }}</td>
                                                            <td>{{ $mrt->users->department->name }}</td>
                                                            <td>
                                                                <ul>
                                                                    @foreach($mrt->items as $item)
                                                                    <li>
                                                                        {{($item->name)}}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                @foreach($mrt->items as $item)
                                                                {{($item->pivot->quantity)}}<br>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($mrt->items as $item)
                                                                {{($item->unit)}}<br>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($mrt->items as $item)
                                                                {{ number_format($item->price, 2, '.', ',') }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($mrt->items as $item)
                                                                {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </table>
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
                                    <div class="card-header py-3">
                                        <h4 class="m-2 font-weight-bold text-primary">MRT&nbsp;<a href="#"
                                                data-toggle="modal" data-target="#aModal" type="button"
                                                class="btn btn-primary bg-gradient-primary"
                                                style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Returned By</th>
                                                        <th>Department</th>
                                                        <th>Item Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pending as $pending)
                                                    <tr>
                                                        <td>{{ $pending->users->name }}</td>
                                                        <td>{{ $pending->users->department->name }}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach($pending->items as $item)
                                                                <li>
                                                                    {{($item->name)}}
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            @foreach($pending->items as $item)
                                                            {{($item->pivot->quantity)}}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($pending->items as $item)
                                                            {{($item->unit)}}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($pending->items as $item)
                                                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <form method="POST"
                                                                action="{{route('admin.users.destroy', $mrt->id)}}">
                                                                @csrf
                                                                <a href="{{route('returned.mrtForm', $mrt->id)}}"
                                                                    class="btn btn-info btn-sm">review</a>
                                                                <input onclick="return confirm('Are you sure?')"
                                                                    type="submit" class="btn btn-danger btn-sm"
                                                                    value="Delete" />
                                                            </form>
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
    </div>
    <!-- main content area end -->
    @include('theme.footer')
</body>
<!-- Issuance Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Return Item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('returned.store')}}" class="container-fluid" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">Employee:</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <select name="user" id="user" class="form-control user-mrt" required>
                                    @foreach ($users as $user)
                                    <option hidden></option>
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="items-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-row">
                                    <td class="table-cell">
                                        <select name="item[]" class="form-control" required>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="quantity[]" required>
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
