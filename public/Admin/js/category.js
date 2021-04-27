$(function(){
  $("#category-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveCategory').html('Sending..');

      $.ajax({
        url: 'save',
        type: "POST",
        data: $('#category-us-form').serialize(),
        success: (response) => {
          location.reload();
            this.reset();
            $("#category-us-form")[0].reset();
            $('#saveCategory').html('Submit');
        },
      });

  });//end of add submit

/*---------delete data-----------*/
$(document).on("click", "#deleteCategoryId", function(arg){

  var x = confirm("Are you sure you want to delete?");
  if (x==true) {
    
  arg.preventDefault();
  var id = $(this).data("id");
  var url = '/hrm/public/category/delete/';

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success(response){
      swal("Deleted", "Data has been Deleted Successfully", "success");
      location.reload();
    }
  });
    
  }
});
/*-----end of delete--------*/



});//all top



/*--test easyly sum--*/
  /*$(document).on("keyup", "#Eweight", function(arg){
    var weight=$(this).val();
    var kg=$("#Eper_kg").val();
      var total=weight*kg;
    $('#Etotal').val(total);
      $("#Earot").val(total+(weight*2));
    

  });

  $(document).on("keyup", "#Eper_kg", function(arg){
  var weight=$("#Eweight").val();
    var kg=$(this).val();
    var total=weight*kg;
    $('#Etotal').val(total);
    $("#Earot").val(total+(weight*2));

  });*/
