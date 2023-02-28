@include('theme.head')
@include('theme.topbar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Edit Item</h4>
        </div>
        <a href="../items" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
        <div class="card-body">

            <form role="form" method="POST" action="{{$item->item_id}}">
                @csrf
                <input type="hidden" name="id" value="" />
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Item Code:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="item_id"
                            value="{{$item->item_id}}" readonly>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Item Name:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="item_name" value="{{$item->item_name}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Quantity:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="quantity" value="{{$item->quantity}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Price:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="prodname" value="{{$item->price}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Description:
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Description"
                            name="description">{{$item->description}}</textarea>
                    </div>
                </div>
                <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
</center>
@include('theme.footer')
