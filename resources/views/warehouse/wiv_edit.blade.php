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
            <a href="../issuance" style="float:right;" type="button" class="btn btn-primary"><i
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
                        <th>PARTICULARS</th>
                        <th>DETAILS</th>
                        <th>QTY</th>
                        <th>UNIt</th>
                        <th>UNIT COST</th>
                        <th>AMOUNT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wiv->items as $item)
                    <tr>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td>
                            {{$item->pivot->quantity}}
                        </td>
                        <td>
                            {{$item->unit}}
                        </td>
                        <td>
                            {{ number_format($item->price, 2, '.', ',') }}
                        </td>
                        <td>
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}
                        </td>
                        <td>
                            <form method="POST" action="{{ route('wiv.item.delete', ['wiv_id' => $wiv->id, 'item_id' => $item->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm" value="Delete" />
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
