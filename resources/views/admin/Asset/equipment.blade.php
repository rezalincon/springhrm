@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Equipment List</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%; margin-bottom: 20px;">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_equipment_modal" style="float: right;">Add new Equipment</a>
                    </div>
                    <div style="width: 100%">
                        <table class="table table-bordered " id="equipmentDT" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Equipment Name</th>
                                <th>Type Name</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    <div id="add_equipment_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Equipment</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="equipment_name" class="form-control" type="text" placeholder="Equipment Name">
                        </div>
                        <div class="form-group">
                            <label for="">Asset Type</label>
                            <select name="asset_type" id="asset_typeEquipment" class="form-control">
                                <option>-select-</option>
                                @foreach($all_asset as $asset)
                                <option value="{{ $asset->asset_type}}">{{ $asset->asset_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="model" class="form-control" type="text" placeholder="Model">
                        </div>
                        <div class="form-group">
                            <input name="quantity" class="form-control" type="number" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <input name="price" class="form-control" type="number" placeholder="price">
                        </div>

                        <div class="form-group">
                            <input id="addEquipment" class="btn btn-block btn-info" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -fluid -->
<div id="delete_equipment_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Equipment</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form id="ss" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="equipmentID">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteEquipment" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- /.Edit Asset type -->

   <div id="edit_equipment_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit equipment</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Equipment Name</label>
                        <input type="hidden" name="equipmentID">
                        <input name="equipment_name" class="form-control" type="text" placeholder="Equipment Name">
                    </div>
                    <div class="form-group">
                        <label for="">Asset Type</label>
                        <select name="asset_type" id="asset_typeEquipmentEdit" class="form-control">
                            <option>-select-</option>
                            @foreach($all_asset as $asset)
                            <option value="{{ $asset->asset_type}}">{{ $asset->asset_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Model</label>
                        <input name="model" class="form-control" type="text" placeholder="Model">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input name="quantity" class="form-control" type="number" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input name="price" class="form-control" type="number" placeholder="price">
                    </div>

                    <div class="form-group">
                        <input id="editEquipment" class="btn btn-block btn-info" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


