@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h4 class="m-2 font-weight-bold text-primary">MRT Request</h4>
        <a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-modal">
         Create MRT
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Amount</th>
                        <th>Action</th>
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
                                {{$item->category->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->pivot->quantity)}} {{($item->unit)}}<br>
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
                        <td>
                            <a href="{{ route('returned.mrtForm', $mrt->id) }}"
                                class="btn btn-info btn-sm">Review</a>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@include('theme.footer')
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
                        <label for="employee" class="col-sm-2 col-form-label">Employee</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-12">
                                    <select name="user" id="user" class="form-control user-mrt" required>
                                        @foreach ($users->sortBy('name') as $user)
                                        <option hidden></option>
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
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
