@include('theme.head')
@include('theme.topbar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Edit Item</h4>
        </div>
        <a href="../items" type="button" class="btn btn-primary bg-gradient-primary"><i
            class="fas fa-flip-horizontal fa-fw fa-share"></i>Back</a>
        <div class="card-body">

            <form role="form" method="POST" action="{{$item->id}}">
                @csrf
                <input type="hidden" name="id" value="" />
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Item Code:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="id"
                            value="{{$item->id}}" readonly>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Item Name:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="name" value="{{$item->name}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Category:
                    </div>
                    <div class="col-sm-9">
                        <select name="category" id="category" class="form-control">
                            @foreach ($category as $category)
                                <option value="{{$category->id}}" {{ $category->id == $item->category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
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
                        Unit:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="unit" value="{{$item->unit}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Price:
                    </div>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="price" value="{{$item->price}}" step="any"
                            min="0"required>
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
