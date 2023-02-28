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
                          <th>Department</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                      @foreach ($users as $row)
                    <tr>
                        <th>{{$row->name}}</th>
                        <th>{{$row->email}}</th>
                        <th>{{$row->department}}</th>
                        <th>
                            <a href="" class="btn btn-info btn-sm">View</a>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
@include('theme.footer')