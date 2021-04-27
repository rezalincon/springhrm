<div class="card-body">

    <div class="form-group">
        <label for="category_id">Select User</label>
        <select class="form-control" name="user_id" id="user_id">
            <option value="category_id">Select User</option>
            @foreach($users as $user)

                <option value="{{$user->id}}">{{$user->name}}</option>

            @endforeach
        </select>

        @error('category_id')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="name">File Title</label>
        <input type="text" name="title" class="form-control" id="title" value="" placeholder="Enter File Title">
        @error('title')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description" value="" placeholder="Enter Description">
        @error('description')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group" >
        <label for="image">File</label>
        <input type="file" name="file" class="form-control" id="file" value="" placeholder="Upload File ">
        @error('file')<i class="text-danger">{{$message}}</i>@enderror
    </div>

        <img src="" width="150px;">

</div>
<!-- /.card-body -->
