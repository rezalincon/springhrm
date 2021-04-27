@extends('admin.admin-layouts.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Equiipment</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        
        <form id="ss" action="{{ route('admin.edit-asset',$all_equipment->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Equipment Name</label>
                <input name="equipment_name" class="form-control" type="text" placeholder="" value="{{ $all_equipment->equipment_name	}}">
            </div>
            <div class="form-group">
                <label for="">Asset Type</label>
                <select name="asset_type" id="" class="form-control">
                    <option>-select-</option>
                    @foreach ($all_asset as $asset)
                    <option value="{{ $asset->asset_type}}">{{ $asset->asset_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Model</label>
                <input name="model" class="form-control" type="text" placeholder="Model" value="{{ $all_equipment->model}}">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input name="quantity" class="form-control" type="number" placeholder="" value="{{ $all_equipment->price}}">
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input name="price" class="form-control" type="number" placeholder="" value="{{ $all_equipment->quantity}}">
            </div>

            <div class="form-group">
                <input class="btn btn-block btn-info" type="submit" value="Save">
            </div>
        </form>
    </div>
</div>
<!--container-fluid -->
@endsection