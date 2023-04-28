@include('theme.admin-sidebar')
<!-- UNREGISTERED USER -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Deleted Users&nbsp;</a></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Deleted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->department->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->deleted_at}}</td>
                        <td>
                            <a href="{{ route('admin.deletedUsers.recover', $row->id) }}"
                            class="btn btn-success btn-sm"><i class="fa-solid fa-trash-can-arrow-up"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')