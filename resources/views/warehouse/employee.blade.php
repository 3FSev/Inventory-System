@include('theme.sidebar')
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Employee&nbsp;</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                      @foreach ($users as $row)
                    <tr>
                        <th>{{$row->name}}</th>
                        <th>{{$row->email}}</th>
                        <th>
                            <form method="POST" action="">
                                @csrf
                                @method('DELETE')
                                <a href="" class="btn btn-info btn-sm">View</a>
                                <a href="" class="btn btn-warning btn-sm">Edit</a>
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