<div class="card-body">
    <div class="row">
    <div class="form-group col-md-6">
        <label for="client_name">Client Name</label>
        <input type="text" name="client_name" class="form-control" id="client_name" value="{{old('client_name', isset($client)?$client->client_name:null)}}" placeholder="Enter Client Name">
        @error('client_name')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group col-md-6">
        <label for="client_email">Client Email</label>
        <input type="email" name="client_email" class="form-control" id="client_email" value="{{old('client_email', isset($client)?$client->client_email:null)}}" placeholder="Enter Client Email">
        @error('client_email')<i class="text-danger">{{$message}}</i>@enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="client_name">Client Password</label>
        <input type="password" name="client_password" class="form-control"  value="{{old('client_password', isset($client)?$client->client_password:null)}}" placeholder="Enter Password">
        @error('client_name')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group col-md-6">
        <label for="client_mobile">Client Mobile</label>
        <input type="text" name="client_mobile" class="form-control" id="client_mobile" value="{{old('client_mobile', isset($client)?$client->client_mobile:null)}}" placeholder="Enter Client Phone Number">
        @error('client_mobile')<i class="text-danger">{{$message}}</i>@enderror
    </div>
</div>


<div class="row">
    <div class="form-group col-md-6">
        <label for="client_mobile">Client Company</label>
        <input type="text" name="client_company" class="form-control" id="client_company" value="{{old('client_company', isset($client)?$client->client_company:null)}}" placeholder="Enter Client Company Name">
        @error('client_company')<i class="text-danger">{{$message}}</i>@enderror
    </div>

    <div class="form-group col-md-6">
        <label for="client_address">Client Address</label>
        <input type="text" name="client_address" class="form-control" id="client_address" value="{{old('client_address', isset($client)?$client->client_address:null)}}" placeholder="Enter Client Address">
        @error('client_address')<i class="text-danger">{{$message}}</i>@enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="client_website">Client website</label>
        <input type="text" name="client_website" class="form-control" id="client_website" value="{{old('client_website', isset($client)?$client->client_website:null)}}" placeholder="Enter Client Website">
        @error('client_website')<i class="text-danger">{{$message}}</i>@enderror
    </div>


    <div class="form-group col-md-6">
        <label for="client_note">Client Note</label>
        <textarea type="text" name="client_note" class="form-control" id="client_note"  placeholder="Enter Client Note"> {{old('client_note', isset($client)?$client->client_note:null)}}</textarea>
        @error('client_note')<i class="text-danger">{{$message}}</i>@enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label>Meeting Date:</label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="date" name="client_meeting_date" value="{{old('client_meeting_date', isset($client)?$client->client_meeting_date:null)}}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
            @error('client_meeting_date')<i class="text-danger">{{$message}}</i>@enderror
        </div>
    </div>


    <div class="form-group col-md-6">
        <label for="role">Client Priority</label>
        <select class="form-control" name="client_priority" id="client_priority">
            <option value="role">Client Priority</option>

            <option @if(old('client_priority',isset($client)?$client->client_priority:null)  == 'high') selected @endif value="high">high</option>
            <option  @if(old('client_priority',isset($client)?$client->client_priority:null)  == 'middle') selected @endif value="middle">middle</option>
            <option  @if(old('client_priority',isset($client)?$client->client_priority:null)  == 'low') selected @endif  value="low">low</option>

        </select>

        @error('client_priority')<i class="text-danger">{{$message}}</i>@enderror
    </div>
</div>

</div>
<!-- /.card-body -->
