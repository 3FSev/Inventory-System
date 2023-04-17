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
@include('theme.head')
@include('theme.topbar')
<div class="card-body">
    <div class="table-responsive">
        <div>
            <button type="submit" class="btn btn-success" style="float:right; margin-left: 5px;"><i
                    class="fa fa-print fa-fw"></i>Print</button>
            <button type="submit" class="btn btn-success" style="float:right; margin-left: 5px;"><i
                    class="fa fa-table fa-fw"></i>Export</button>
            <a href="../employee" style="float:right;" type="button" class="btn btn-primary"><i
                    class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
        </div>
    </div>
</div>
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
                    @foreach ($wiv->items as $item)
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
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->pivot->quantity}} {{$item->unit}}
                        </td>
                        <td>
                            {{ number_format($item->price, 2, '.', ',') }}
                        </td>
                        <td>
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')
