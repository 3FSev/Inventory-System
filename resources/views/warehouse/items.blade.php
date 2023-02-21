@include('theme.sidebar')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Items&nbsp;<a href="#" data-toggle="modal" data-target="#aModal"
                type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i
                    class="fas fa-fw fa-plus"></i></a></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item_list as $row)
                    <tr>
                        <th>{{$row->item_id}}</th>
                        <th>{{$row->item_name}}</th>
                        <th>{{$row->quantity}}</th>
                        <th>{{$row->category}}</th>
                        <th>
                            <form method="POST" action="{{route('destroy', $row->item_id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('show', $row->item_id)}}" class="btn btn-info btn-sm">View</a>
                                <a href="{{route('edit', $row->item_id)}}" class="btn btn-warning btn-sm">Edit</a>
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>
                        </th>
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
                <form role="form" method="POST" action="/items">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="item_name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" min="1" max="999999999" class="form-control" placeholder="Quantity"
                            name="quantity" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category" required>
                            <option disabled selected value> -- Select Category -- </option>
                            <option value="IT Equipment">IT Equipment</option>
                            <option value="Communication Equipment">Communication Equipment</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="Price"
                            name="price" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="50" class="form-control" placeholder="Description"
                            name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
