@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Create MRT Ticket&nbsp;<a href="#"
                data-toggle="modal" data-target="#aModal" type="button"
                class="btn btn-primary bg-gradient-primary"
                style="border-radius: 0px;"><i class="fas fa-fw fa-plus">
                </i>
            </a>
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>MRT Number</th>
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
