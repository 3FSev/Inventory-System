@include('theme.head')
@include('theme.employee-topbar')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Pending wiv
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending as $pending)
                    <tr>
                        <td>{{$pending->id}}</td>
                        <td>{{$pending->wiv_date}}</td>
                        <td>
                            <ul>
                                @foreach ($pending->items as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @foreach($pending->items as $item)
                            {{($item->category->name)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($pending->items as $item)
                            {{($item->pivot->quantity)}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($pending->items as $item)
                            {{ number_format($item->price, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($pending->items as $item)
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('wiv.approve', $pending->id) }}"
                                class="btn btn-success btn-sm">Accept</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')