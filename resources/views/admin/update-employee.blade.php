@include('theme.head')
@include('theme.topbar')
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Edit User Information</h4>
        </div>
        <a href="../ver" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
        <div class="card-body">
            <form role="form" method="POST" action="{{$user->id}}">
                @csrf
                <input type="hidden" name="id" value="" />
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Name:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="name"
                            value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Email:
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" name="email" value="{{$user->email}}"
                            required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Department:
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="department">
                            @foreach($department as $dept)
                                <option value="{{ $dept->id }}" {{ $dept->id == $user->dept_id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Role:
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Password:
                    </div>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" value="{{ old('password', '') }}">
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>
            </form>
        </div>
    </div>
</center>
@include('theme.footer')