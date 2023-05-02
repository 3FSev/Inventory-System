@include('theme.admin-sidebar')
<!-- UNREGISTERED USER -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h4 class="m-2 font-weight-bold text-primary">Verified Users</h4>
        <a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-modal">
          <i class="fas fa-fw fa-plus"></i> Add User
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_list as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->role->name}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.users.destroy', $row->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('admin.users.edit', $row->id)}}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-pencil-alt"></i></a>
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                    class="btn btn-danger btn-sm">
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
<!-- Issuance Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('admin.users.store')}}" class="container-fluid" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <select name="department" class="form-control" value="">
                            @foreach ($department as $dept)
                            <option value="{{$dept->id}}">{{$dept->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
