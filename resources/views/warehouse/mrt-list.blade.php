@include('theme.sidebar')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">MRT List&nbsp;
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>MRT Number</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mrt as $mrt)
                    <tr>
                        <td>{{ $mrt->mrt_number }}</td>
                        <td>{{ $mrt->users->name }}</td>
                        <td>{{ $mrt->users->department->name }}</td>
                        <td>
                            <ul>
                                @foreach($mrt->items as $item)
                                <li>
                                    {{($item->name)}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->pivot->quantity)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->unit)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{ number_format($item->price, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
<!-- main content area end -->
@include('theme.footer')
</body>
