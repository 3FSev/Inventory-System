@include('theme.sidebar')
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Issuance&nbsp;<a href="#" data-toggle="modal" data-target="#aModal"
                type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i
                    class="fas fa-fw fa-plus"></i></a></h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                          <th>WIV #</th>
                          <th>Employee #</th>
                          <th>Item #</th>
                        </tr>
                     </thead>
                    <tbody>
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
              <h5 class="modal-title" id="exampleModalLabel">Create Issuance</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <form role="form" method="POST" action="/items">
                  @csrf
                  <div class="form-group">
                      <input class="form-control" placeholder="WIV Code" name="wiv_id" required>
                  </div>
                  <div class="form-group">
                      <select class="form-control" name="category" required>

                      </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="category" required>

                    </select>
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