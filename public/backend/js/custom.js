(function($) {
    $(document).ready(function() {

        /**
         * Asset Type
         */
        $(document).on('click', '#addAssetType', function(e) {
            e.preventDefault();
            let asset_type = $('#asset_type').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/add-assetType',
                method: 'POST',
                data: {
                    'asset_type': asset_type
                },
                dataType: "json",
                success: function(response) {
                    $('#add_asset_modal').modal('hide');
                    tableLoad.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        var tableLoad = $('#assetTypeDT').DataTable({
            ajax: '/admin/assetTypeTable',
            columns: [
                { "data": "id" },
                { "data": "asset_type" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editAssetTypeModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteAssetTypeModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#delete_asset_modal" ></i></a>`];
                    }
                }

            ]
        });

        $(document).on('click', 'a#deleteAssetTypeModal', function(e) {
            e.preventDefault();
            $('#delete_asset_modal').modal('show');
            let assetTypeID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#delete_asset_modal input[name="assetTypeId"]').val(assetTypeID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#deleteAssetType', function(e) {
            e.preventDefault();
            let assetTypeID = $('#delete_asset_modal input[name="assetTypeId"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/delete-assetType/' + assetTypeID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_asset_modal').modal('hide');
                    tableLoad.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        $(document).on('click', 'a#editAssetTypeModal', function(e) {
            e.preventDefault();
            //$('#edit_asset_modal').modal('show');
            let assetTypeID = $(this).attr('data-id');
            $('#edit_asset_modal input[name="assetTypeId"]').val(assetTypeID);
            //alert(assetTypeID);
            $.ajax({
                url: '/admin/edit-assetType/' + assetTypeID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#edit_asset_modal input[name="asset_typeEdit"]').val(data.asset_type);
                    $('#edit_asset_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editAssetType', function(e) {
            e.preventDefault();
            let assetTypeID = $('#edit_asset_modal input[name="assetTypeId"]').val();
            let asset_typeEdit = $('#asset_typeEdit').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/edit-assetType/' + assetTypeID,
                method: 'POST',
                data: {
                    'asset_typeEdit': asset_typeEdit
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_asset_modal').modal('hide');
                    tableLoad.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


        /**
         * Equipment
         */
        var tableLoadEquipment = $('#equipmentDT').DataTable({
            ajax: '/admin/equipmentTable',
            columns: [
                { "data": "id" },
                { "data": "equipment_name" },
                { "data": "asset_type" },
                { "data": "model" },
                { "data": "price" },
                { "data": "quantity" },
                { "data": "total_price" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editEquipmentModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteEquipmentModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });


        $(document).on('click', '#addEquipment', function(e) {
            e.preventDefault();

            let equipment_name = $("input[name=equipment_name]").val();
            let asset_typeEquipment = $('#asset_typeEquipment').val();
            let model = $("input[name=model]").val();
            let price = $("input[name=price]").val();
            let quantity = $("input[name=quantity]").val();
            let total_price = price * quantity;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/add-equipment',
                method: 'POST',
                data: {
                    'equipment_name': equipment_name,
                    'asset_type': asset_typeEquipment,
                    'model': model,
                    'quantity': quantity,
                    'price': price,
                    'total_price': total_price
                },
                dataType: "json",
                success: function(response) {
                    $('#add_equipment_modal').modal('hide');
                    tableLoadEquipment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });


        $(document).on('click', 'a#deleteEquipmentModal', function(e) {
            e.preventDefault();
            $('#delete_equipment_modal').modal('show');
            let equipmentID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#delete_equipment_modal input[name="equipmentID"]').val(equipmentID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#deleteEquipment', function(e) {
            e.preventDefault();
            let equipmentID = $('#delete_equipment_modal input[name="equipmentID"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/delete-equipment/' + equipmentID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_equipment_modal').modal('hide');
                    tableLoadEquipment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });



        $(document).on('click', 'a#editEquipmentModal', function(e) {
            e.preventDefault();
            //$('#edit_asset_modal').modal('show');
            let equipmentID = $(this).attr('data-id');
            $('#edit_equipment_modal input[name="equipmentID"]').val(equipmentID);
            //alert(assetTypeID);
            $.ajax({
                url: '/admin/edit-equipment/' + equipmentID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#edit_equipment_modal input[name="equipment_name"]').val(data.equipment_name);
                    $("#asset_typeEquipmentEdit").val(data.asset_type).change();;
                    $('#edit_equipment_modal input[name="model"]').val(data.model);
                    $('#edit_equipment_modal input[name="quantity"]').val(data.quantity);
                    $('#edit_equipment_modal input[name="price"]').val(data.price);
                    $('#edit_equipment_modal input[name="total_price"]').val(data.total_price);
                    $('#edit_equipment_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editEquipment', function(e) {
            e.preventDefault();
            let equipmentID = $('#edit_equipment_modal input[name="equipmentID"]').val();
            let equipment_name = $("#edit_equipment_modal input[name=equipment_name]").val();
            let asset_typeEquipmentEdit = $('#asset_typeEquipmentEdit').val();
            let model = $("#edit_equipment_modal input[name=model]").val();
            let price = $("#edit_equipment_modal input[name=price]").val();
            let quantity = $("#edit_equipment_modal input[name=quantity]").val();
            let total_price = price * quantity;


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/edit-equipment/' + equipmentID,
                method: 'POST',
                data: {
                    'equipment_name': equipment_name,
                    'asset_typeEquipmentEdit': asset_typeEquipmentEdit,
                    'model': model,
                    'quantity': quantity,
                    'price': price,
                    'total_price': total_price
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_equipment_modal').modal('hide');
                    tableLoadEquipment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    //alert('error');
                    console.log(response);
                }
            });


        });


        /**
         * Department
         */

        var tableLoadDepartment = $('#departmentDT').DataTable({
            ajax: '/admin/departmentTable',
            columns: [
                { "data": "id" },
                { "data": "dept_name" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editDepartmentModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deleteDepartmentModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });


        $(document).on('click', '#addDepartment', function(e) {
            e.preventDefault();

            let dept_name = $("input[name=dept_name]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/add-department',
                method: 'POST',
                data: {
                    'dept_name': dept_name,
                },
                dataType: "json",
                success: function(response) {
                    $('#add_department_modal').modal('hide');
                    tableLoadDepartment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        $(document).on('click', 'a#deleteDepartmentModal', function(e) {
            e.preventDefault();
            $('#delete_department_modal').modal('show');
            let departmentID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#delete_department_modal input[name="departmentID"]').val(departmentID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#deleteDepartment', function(e) {
            e.preventDefault();
            let departmentID = $('#delete_department_modal input[name="departmentID"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/delete-department/' + departmentID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_department_modal').modal('hide');
                    tableLoadDepartment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        $(document).on('click', 'a#editDepartmentModal', function(e) {
            e.preventDefault();
            //$('#edit_asset_modal').modal('show');
            let departmentID = $(this).attr('data-id');
            $('#edit_department_modal input[name="departmentID"]').val(departmentID);
            //alert(assetTypeID);
            $.ajax({
                url: '/admin/edit-department/' + departmentID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#edit_department_modal input[name="dept_nameEdit"]').val(data.dept_name);
                    $('#edit_department_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editDepartment', function(e) {
            e.preventDefault();
            let departmentID = $('#edit_department_modal input[name="departmentID"]').val();
            let dept_name = $("#edit_department_modal input[name=dept_nameEdit]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/edit-department/' + departmentID,
                method: 'POST',
                data: {
                    'dept_name': dept_name,
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_department_modal').modal('hide');
                    tableLoadDepartment.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    //alert('error');
                    console.log(response);
                }
            });


        });

        /**
         * Designation
         */

        var tableLoaddesignation = $('#designationDT').DataTable({
            ajax: '/admin/designationTable',
            columns: [
                { "data": "id" },
                { "data": "designation_name" },
                {
                    "data": null,
                    render: function(data, type, row) {
                        return [`<a id="editdesignationModal" class="btn btn-sm btn-success" data-id="${row.id}"><i class="fa fa-edit" aria-hidden="true" data-toggle="modal" href="#"></i></a>`, `<a class="btn btn-sm btn-danger" data-id="${row.id}" id="deletedesignationModal"><i class="fa fa-times" aria-hidden="true" data-toggle="modal" href="#" ></i></a>`];
                    }
                }

            ]
        });


        $(document).on('click', '#adddesignation', function(e) {
            e.preventDefault();

            let designation_name = $("input[name=designation_name]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/add-designation',
                method: 'POST',
                data: {
                    'designation_name': designation_name,
                },
                dataType: "json",
                success: function(response) {
                    $('#add_designation_modal').modal('hide');
                    tableLoaddesignation.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        $(document).on('click', 'a#deletedesignationModal', function(e) {
            e.preventDefault();
            $('#delete_designation_modal').modal('show');
            let designationID = $(this).attr('data-id');
            //alert(assetTypeID);
            //$('#assetTypeId').val('sdfsdfsdf');
            $('#delete_designation_modal input[name="designationID"]').val(designationID);
            // alert(assetTypeID);

        });

        $(document).on('click', '#deletedesignation', function(e) {
            e.preventDefault();
            let designationID = $('#delete_designation_modal input[name="designationID"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/delete-designation/' + designationID,
                method: 'POST',
                dataType: "json",
                success: function(response) {
                    $('#delete_designation_modal').modal('hide');
                    tableLoaddesignation.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });


        });

        $(document).on('click', 'a#editdesignationModal', function(e) {
            e.preventDefault();
            //$('#edit_asset_modal').modal('show');
            let designationID = $(this).attr('data-id');
            $('#edit_designation_modal input[name="designationID"]').val(designationID);
            //alert(assetTypeID);
            $.ajax({
                url: '/admin/edit-designation/' + designationID,
                method: 'get',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#edit_designation_modal input[name="designation_nameEdit"]').val(data.designation_name);
                    $('#edit_designation_modal').modal('show');
                },
                error: function(data) {
                    alert('error');
                    console.log(data);
                }
            });

        });

        $(document).on('click', '#editdesignation', function(e) {
            e.preventDefault();
            let designationID = $('#edit_designation_modal input[name="designationID"]').val();
            let designation_name = $("#edit_designation_modal input[name=designation_nameEdit]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/edit-designation/' + designationID,
                method: 'POST',
                data: {
                    'designation_name': designation_name,
                },
                success: function(response) {
                    console.log(response);
                    $('#edit_designation_modal').modal('hide');
                    tableLoaddesignation.ajax.reload();
                    //alert(data.id);
                },
                error: function(response) {
                    //alert('error');
                    console.log(response);
                }
            });


        });






    });

})(jQuery)
