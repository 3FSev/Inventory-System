@include('theme.admin-sidebar')
<!-- UNREGISTERED USER -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Registered Accounts&nbsp;</h4>
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
                        <th>{{$row->name}}</th>
                        <th>{{$row->email}}</th>
                        <th>{{$row->role}}</th>
                        <th>
                            <form method="POST" action="">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>
                        </th>
                    </tr>
            @endforeach
          </tbody>
        </table>
      </div>
            @include('theme.footer')