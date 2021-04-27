$(function(){

  function nettotalfind(){
        var sum = 0;
          $('.total').each(function()
          {
              sum += parseFloat($(this).val());
          });
          /*alert(sum);*/
            $('#net').val(sum);

      }

        $(document).on("keyup", ".qty", function(arg){

            var id=$(this).attr('id');
            var number=id.split('qty')[1];

            var quantity=$('#qty'+number).val();
            var price=$('#price'+number).val();
            var total=Number(quantity) * Number(price);
            $('#total'+number).val(total);
            nettotalfind();


        });
    $(document).on("keyup", ".price", function(arg){

        var id=$(this).attr('id');
        var number=id.split('price')[1];

        var quantity=$('#qty'+number).val();
        var price=$('#price'+number).val();
        var total=Number(quantity) * Number(price);
        $('#total'+number).val(total);
          nettotalfind();
    });



  $("#expense-us-form").on("submit", function(e) {
    /*alert('okk');*/
    e.preventDefault();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

    $('#saveExpense').html('Sending..');

      $.ajax({
        url: '/expense/add',
        type: "POST",
        data: $('#expense-us-form').serialize(),
        success: (response) => {

            location.reload();
            this.reset();
            $("#expense-us-form")[0].reset();
            $('#saveExpense').html('Submit');
            rowCount = $('#mainbody tr').length;
            $('#mainbody').find("tr:gt(0)").remove();
        },
      });

});//end of add submit

/*---------delete data-----------*/
$(document).on("click", "#deleteExpenseId", function(arg){

  var x = confirm("Are you sure you want to delete?");
  if (x==true) {

  arg.preventDefault();
  var id = $(this).data("id");
  var url = '/expense/delete/';

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




//add new input field, and remove input field
$(document).ready(function(){
  var i = 0;
$('#add_new').click(function(){
  ++i;

  $('#mainbody').append('<tr><td><input type="text" name="addmore['+i+'][item]" required></td>' +
      '<td><input class="qty" type="number" name="addmore['+i+'][qty]" id="qty'+i+'" required></td>' +
      '<td><input class="price" type="number" name="addmore['+i+'][price]"  id="price'+i+'" required></td>' +
      '<td><input  type="number" name="addmore['+i+'][total]" id="total'+i+'" readonly class="total"></td>' +
      '<td><button type="button" name="remove" id="remove" value="remove" class="btn btn-sm btn-danger">-</button></td></tr>');

  $('#mainbody').on('click', '#remove', function(){
      $(this).closest('tr').remove();
      nettotalfind();
  });

});

});

















        /*-------------another way---------------*/
        $('#AddToList').click(function () {
        var ItemId = $('#ItemId').val();
        var ItemName = $("#ItemId :selected").text();
        var price = $('#price').val();
        var GroupID = $('#GroupID').val();
        var GroupName = $("#GroupID :selected").text();

        var ClassID = $('#ClassID').val();
        var ClassName = $("#ClassID :selected").text();


        $("#tblDetails tbody").append("<tr><td class='ItemId'><input></td><td class='ItemId'><input></td><td class='GroupID'><input></td><td class='ClassID'><input></td><td><button class='btn btn-danger btn-xs btn-delete'>remove</button></td></tr>");

        });

        $("body").on("click", ".btn-delete", function () {
            $(this).parents("tr").remove();
        });
        /*---------- end another-----------*/







});


