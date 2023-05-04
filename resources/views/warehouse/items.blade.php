@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h4 class="m-2 font-weight-bold text-primary">Items List</h4>
        <a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-modal">
             Create item
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_list as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->unit}}</td>
                        <td>{{$row->category->name}}</td>
                        <td>
                            <form method="POST" action="{{route('destroy', $row->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('show', $row->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{route('edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
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
@include('theme.footer')

<!-- Item Modal-->
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
                <form role="form" method="POST" action="{{route('items.store')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="Quantity"
                            name="quantity" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Unit Type" name="unit" required>
                    </div>
                    <div class="form-group">
                        {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="Price"
                            name="price" step="any">
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="50" class="form-control" placeholder="Description"
                            name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
