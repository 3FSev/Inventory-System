@include('theme.head')
@include('theme.employee-topbar')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Accountability List &nbsp;
            </h4>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>WIV</th>
                        <th>DATE</th>
                        <th>PARTICULARS</th>
                        <th>DETAILS</th>
                        <th>CATEGORY</th>
                        <th>QTY. UNIT</th>
                        <th>UNIT COST</th>
                        <th>AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wiv as $wiv)
                        @foreach ($wiv->items as $item)
                            <tr>
                                <th>{{$wiv->id}}</th>
                                <th>{{$wiv->wiv_date}}</th>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->description}}
                                </td>
                                <td>
                                    {{($item->category->name)}}
                                </td>
                                <td>
                                    {{($item->pivot->quantity)}}
                                </td>
                                <td>
                                    {{ number_format($item->price, 2, '.', ',') }}
                                </td>
                                <td>
                                    {{ number_format($item->pivot->amount, 2, '.', ',') }}
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