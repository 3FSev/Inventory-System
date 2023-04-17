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
                        <th>WIV Number</th>
                        <th>Date</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wiv as $wiv)
                    <tr>
                        <th>{{$wiv->id}}</th>
                        <th>{{$wiv->wiv_date}}</th>
                        <td>
                            <ul>
                                @foreach ($pending->items as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($pending->items as $item)
                                    <li>{{$item->description}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @foreach($wiv->items as $item)
                            {{($item->category->name)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($wiv->items as $item)
                            {{($item->pivot->quantity)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($wiv->items as $item)
                            {{ number_format($item->pivot->price, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($wiv->items as $item)
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')