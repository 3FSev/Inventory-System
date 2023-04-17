<style>
    h5 {
        text-align: center;
    }

    h6 {
        text-align: center;
    }

    .mrt-input {
        display: inline-block;
    }

</style>
<!-- Jquery Library-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.js"></script>
@include('theme.head')
@include('theme.topbar')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h5>ORIENTAL MINDORO ELECTRIC COOPERATIVE, INC</h5>
            <h5>(O R M E C O)</h5>
            <h6>Simaron, Calapan City</h6>
            <form method="POST" action="{{$mrt->id}}" class="container-fluid mrtForm" name="mrtForm" id="mrtForm" autocomplete="off">
                @csrf
            <div>
                <label for="mrt">Date:</label>
                <input type="text" class="form-control datepicker col-sm-2" name="mrtDate" placeholder="Date" required
                    style="display:inline-block; width:45%">
                <label for="mrt" style="margin-left: 58.5%">MRT No:</label>
                <input type="number" name="mrtNumber" class="form-control col-sm-2" placeholder="Number" required
                    style="display:inline-block; width:45%">
                <input type="hidden" name="user_id" value="{{ $mrt->users->id }}">
                <input type="hidden" name="mrt_id" value="{{ $mrt->id }}">
            </div>
            <br><h5>MATERIALS RETURNED TICKET</h5><br>
            RETURNED BY: {{$mrt->users->name}}<br>
            DEPT/SECTION: {{$mrt->users->department->name}}
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Materials</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                        <th>Usable</th>
                        <th>Non-Usable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mrt->items as $row)
                    <input type="hidden" name="items[]" value="{{ $row->id }}">
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->category->name}}</td>
                        <td>{{$row->unit}}</td>
                        <td>{{$row->pivot->quantity}}</td>
                        <td>{{$row->price}}</td>
                        <td>{{$row->pivot->amount}}</td>
                        <td>
                            <input type="number" name="usable[]" class="form-control usable-input" value="0" min="0"
                                max="{{ $row->pivot->quantity }}">
                        </td>
                        <td>
                            <input type="number" name="unusable[]" class="form-control non-usable-input" value="0" readonly>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <button type="submit" class="btn btn-success" style="float:right; margin-left: 5px;"><i class="fa fa-check fa-fw"></i>Confirm</button>
                <a href="../mrt-ticket" style="float:right;" type="button" class="btn btn-primary"><i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            </div>
        </form>
        </div>
    </div>
</div>
