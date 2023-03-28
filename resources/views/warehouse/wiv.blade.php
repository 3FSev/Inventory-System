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

<!-- TableExport library -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>



<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.js"></script>
@include('theme.head')
@include('theme.topbar')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h5>ORIENTAL MINDORO ELECTRIC COOPERATIVE, INC</h5>
            <h5>(O R M E C O)</h5>
            <h6>Simaron, Calapan City</h6><br>
        <table class="table table-bordered" id="wivTable" width="100%" cellspacing="0">
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
               @foreach ($wivs as $wiv)
               <tr>
                    <td>
                        {{$wiv->id}}
                    </td>
                    <td>
                        {{$wiv->wiv_date}}
                    </td>
                    <td>
                        {{$wiv->jv}}
                    </td>
                    <td>
                        {{$wiv->jv_date}}
                    </td>
                    <td>
                        <ul>
                            @foreach ($wiv->items as $item)
                                <li>{{$item->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @foreach ($wiv->items as $item)
                            {{$item->pivot->quantity}} {{$item->unit}}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($wiv->items as $item)
                        {{ number_format($item->price, 2, '.', ',') }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($wiv->items as $item)
                        {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                        @endforeach
                    </td>
                    <td>

                    </td>
                    <td>
                        
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
