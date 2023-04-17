@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">WIV List&nbsp;
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>WIV Number</th>
                        <th>Employee Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wiv as $wiv)
                    <tr>
                        <td>{{ $wiv->id }}</td>
                        <td>{{ $wiv->users->name }}</td>
                        <td>
                            <ul>
                                @foreach($wiv->items as $item)
                                <li>
                                    {{($item->name)}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @foreach($wiv->items as $item)
                            {{($item->pivot->quantity)}}<br>
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
<!-- main content area end -->
@include('theme.footer')
