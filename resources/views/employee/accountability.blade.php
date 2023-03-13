@include('theme.head')
@include('theme.topbar')

<body>
    <!-- main content area start -->
    <div class="main-content">
        <div class="main-content-inner">
            <!--  Nav area start -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true"><b><i class="fa-solid fa-table"></i>
                                    ACCOUNTABILITY
                                </b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true"><b><i class="fa-solid fa-table"></i>
                                    PENDING ACCOUNTABILITY
                                </b>
                            </a>
                        </li>
                    </ul>
                    <!-- additional content area start -->
                    <div class="tab-content mt-3" id="myTabContent">
                        <!-- DATA TABLE -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
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
                                                            <th>
                                                                @foreach ($wiv->items as $item)
                                                                - {{$item->name}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($wiv->items as $item)
                                                                {{($item->category->name)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($wiv->items as $item)
                                                                {{($item->pivot->quantity)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($wiv->items as $item)
                                                                {{($item->price)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($wiv->items as $item)
                                                                {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                                                                @endforeach
                                                            </th>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- Personal Information Page End---->

                        <!--- Accountability Page Start---->
                        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-12">
                                <div class="tab-content mt-5">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
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
                                                            <th>{{$pending->id}}</th>
                                                            <th>{{$pending->wiv_date}}</th>
                                                            <th>
                                                                @foreach ($pending->items as $item)
                                                                {{$item->name}}
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($pending->items as $item)
                                                                {{($item->category->name)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($pending->items as $item)
                                                                {{($item->pivot->quantity)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($pending->items as $item)
                                                                {{($item->price)}}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                @foreach($pending->items as $item)
                                                                {{ number_format($item->pivot->amount, 2, '.', ',') }}<br>
                                                                @endforeach
                                                            </th>
                                                            <th>
                                                                <a href="{{ route('wiv.approve', $pending->id) }}"
                                                                    class="btn btn-success btn-sm">Approved</a>
                                                            </th>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
    @include('theme.footer')
</body>

</html>
