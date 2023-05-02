@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h4 class="m-2 font-weight-bold text-primary">Issuance</h4>
        <a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-modal">
            <i class="fas fa-fw fa-plus"></i> Create Issuance
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>WIV Number</th>
                        <th>Employee Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Action</th>
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
                        <td>
                            <form method="POST" action="{{route('wiv.delete', $wiv->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('wiv.edit', $wiv->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- main content area end -->
@include('theme.footer')
<!-- Issuance Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Issue Item</h5>
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
                            @foreach ($users->sortBy('name') as $user)
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
                                    <input type="number" name="riv" class="form-control" placeholder="Number">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="rivDate" placeholder="Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">PO:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="po" class="form-control" placeholder="Number">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="poDate" placeholder="Date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riv" class="col-sm-2 col-form-label">RR:</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="rr" class="form-control" placeholder="Number">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control datepicker" name="rrDate" placeholder="Date">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-row">
                                    <td>
                                        <select name="item[]" class="form-control">
                                            @foreach ($items->sortBy('name') as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="quantity[]" min="1" required>
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
