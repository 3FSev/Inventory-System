@include('theme.topbar')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Items&nbsp;</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>WIV#</th>
                        <th>Date</th>
                        <th>JV#</th>
                        <th>Date</th>
                        <th>PARTICULARS</th>
                        <th>QTY. Unit</th>
                        <th>Unit Cost</th>
                        <th>Amount</th>
                        <th>MRT</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')