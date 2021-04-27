<div class="card-body">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{old('name', isset($user)?$user->name:null)}}" placeholder="Enter User Name">
        @error('name')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{old('email', isset($user)?$user->email:null)}}" placeholder="Enter User Email">
        @error('email')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter User password">
        @error('password')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="role">Select Role</label>
        <select class="form-control" name="role" id="role">
            <option value="role">Select Role</option>

            <option  value="admin">admin</option>
            <option  value="employee">employee</option>

        </select>


</div>

<div class="form-group">
    <label for="status">Select Status</label>
    <select class="form-control" name="status"  required>
        <option>Select Status</option>

        <option  value="1">Enabled</option>
        <option  value="0">Disabled</option>

    </select>

@error('status')<i class="text-danger">{{$message}}</i>@enderror
</div>

<!-- /.card-body -->
