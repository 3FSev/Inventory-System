@include('theme.head')
@include('theme.employee-topbar')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Returned Item/s &nbsp;
                </a>
            </h4>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>MRT Number</th>
                        <th>Date</th>
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
                        <td>{{$mrt->id}}</td>
                        <td>{{$mrt->mrt_date}}</td>
                        <td>
                            <ul>
                                @foreach ($mrt->items as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->category->name)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->pivot->quantity)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{($item->price)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($mrt->items as $item)
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')