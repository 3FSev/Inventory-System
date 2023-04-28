@include('theme.admin-sidebar')
<!-- UNREGISTERED USER -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Users List to Approve&nbsp;</a></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.users.destroy', $row->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('admin.users.approve', $row->id) }}"
                                    class="btn btn-success btn-sm"><i class="fa-solid fa-user-check"></i></a>
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
