<div class="card-body">
    <div class="form-group">
        <label for="employee_id">Select Employee</label>
        <select class="form-control" name="employee_id" id="employee_id">
            <option value="employee_id">Select Employee</option>
            @foreach($users as $user)

                <option @if(old('employee_id',isset($user)?$user->employee_id:null)  == $user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>

            @endforeach
        </select>

        @error('employee_id')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" value="" placeholder="Enter File Title">
        @error('title')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter File Description"></textarea>
    </div>

    <div class="form-group" >
        <label for="file">File</label>
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" require>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
        @error('file')<i class="text-danger">{{$message}}</i>@enderror
    </div>

</div>
<!-- /.card-body -->
