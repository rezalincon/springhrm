@extends('admin.admin-layouts.master')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4">

            <div class="card-body">

                <div class="row">
                    <div class="card-header" style="width:100%; margin-bottom:20px;">
                        <a class="btn btn-sm btn-info" data-toggle="modal" href="#add_asset_modal" style="float: right;">Add new Asset</a>
                    </div>
                    <div style="width: 100%">
                        <table class="table table-bordered " id="assetTypeDT" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type Name</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody id="assetTypeTable">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

    <div id="add_asset_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Asset Type</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="mess"></div>
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="asset_type" id="asset_type" class="form-control" type="text" placeholder="Asset Type">
                        </div>
                        <div class="form-group">
                            <input id="addAssetType" class="btn btn-block btn-info" type="submit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete -fluid -->
<div id="delete_asset_modal" class="modal fade">
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
                        <input type="hidden" name="assetTypeId">
                        <h4>Are You Sure? </h4>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-info" value="Cancel" data-dismiss="modal">
                        <input id="deleteAssetType" class="btn btn-block btn-info" type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

   <!-- /.Edit Asset type -->

   <div id="edit_asset_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Asset Type</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="mess"></div>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Asset Type Name</label>
                        <input type="hidden" name="assetTypeId">
                        <input name="asset_typeEdit" id="asset_typeEdit" class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                        <input id="editAssetType" class="btn btn-block btn-info" type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

