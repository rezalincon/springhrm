$(function(){

  $("#income-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveIncome').html('Sending..');

      $.ajax({
        url: '/income/insert',
        type: "POST",
        data: $('#income-us-form').serialize(),
        success: (response) => {
            location.reload();
            this.reset();
            $("#income-us-form")[0].reset();
            $('#saveIncome').html('Submit');
        },
      });

});//end of add submit

/*---Income start---*/
$(document).on("keyup", "#qty", function(arg){
          var quantity=$('#qty').val();
          var price=$("#price").val();
            var total=Number(quantity) * Number(price);
          $('#total').val(total);

        });

$(document).on("keyup", "#price", function(arg){
          var price=$("#price").val();
          var quantity=$("#qty").val();

          var total=Number(quantity) * Number(price);
          $('#total').val(total);

        });
/*--end expense--*/
/*---------delete data-----------*/
$(document).on("click", "#delIncomeId", function(arg){
 var x = confirm("Are you sure you want to delete?");
  if (x==true) {
arg.preventDefault();
  var id = $(this).data("id");
  var url = '/income/deleted/';

  $.ajax({
    url: url,
    type: "GET",
    data: {id:id},

    dataType: "JSON",
    success(response){
        location.reload()
      swal("Deleted", "Data has been Deleted Successfully", "success");
      ;
    }
  });
}

});
/*-----end of delete--------*/


/*---------------View Data-----------------------*/
 $(document).on("click", "#viewId", function(e){
   e.preventDefault();



  var id = $(this).data("id");
  var url = $(this).attr("href");

  $.ajax({
    url: url,
    data: {id:id},
    type: "GET",
    dataType: "JSON",
    success: function(response){
      if($.isEmptyObject(response) != null){
          $("#viewModal").modal("show");

          $("#Clientname").text(response.client_name + "'s Data");
          /*$("#Sid").text("Id: " + response.id);*/
          $(".Ititle").text("Title: " + response.title);
          $(".Ifile_book_holder").text("File Book Holder: " + response.file_book_holder);
          $(".Imemo_no").text("Memo No: " + response.memo_no);
          $(".Iclient_name").text("Client Name: " + response.client_name);
          $(".Iclient_type").text("Client Type: " + response.client_type);
          $(".Ipayment_by").text("Payment By: " + response.payment_by);
          $(".Itransection_id").text("Transection Id: " + response.transection_id);
          $(".Idate").text("Date: " + response.date);
          $(".Iquantity").text("Quantity: " + response.quantity);
          $(".Iprice").text("Price: " + response.price);
          $(".Itotal_price").text("Total Price: " + response.total_price);
          $(".Ireceived_by").text("Received By: " + response.received_by);

      }else{
        console.log("errors");
      }
    }
  });
 });


/*---------delete data-----------*/
$(document).on("click", "#deleteId", function(arg){

  var x = confirm("Are you sure you want to delete?");
  if (x==true) {

  arg.preventDefault();
  var id = $(this).data("id");
  var url = 'delet';

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


