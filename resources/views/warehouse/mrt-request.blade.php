@include('theme.sidebar')
@if ($errors->any())
<div class="alert alert-danger">
    {{ $error }}
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">MRT Request&nbsp;</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>MRT Number</th>
                        <th>User Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Amount</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mrt as $mrt)
                    <tr>
                        <th>{{ $mrt->id }}</th>
                        <th>{{ $mrt->users->name }}</th>
                        <th>
                            <ul>
                                @foreach($mrt->items as $item)
                                <li>
                                    {{($item->name)}}
                                </li>
                                @endforeach
                            </ul>
                        </th>
                        <th>
                            @foreach($mrt->items as $item)
                            {{($item->pivot->quantity)}}<br>
                            @endforeach
                        </th>
                        <th>
                            @foreach($mrt->items as $item)
                            {{($item->pivot->unit)}}<br>
                            @endforeach
                        </th>
                        <th>
                            @foreach($wiv->items as $item)
                            {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                            @endforeach
                        </th>
                        <th>
                            @foreach ($status as $status)
                            <input type="radio" name="status" value="{{ $status->id }}">
                            <label>{{ $status->name }}</label>
                            @endforeach
                        </th>
                        <th>

                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('theme.footer')