$(document).ready(function(){
$(document).on('click','#getEmployee8', function(e){
e.preventDefault();
var empid = $(this).data('id');
//$('#employee_data-loader').show();
$.ajax({
url: '../page/fetch_produit.php',
type: 'POST',
data: 'empid='+empid,
dataType: 'json',
cache: false
})
.done(function(data){
$('#Title2').val(data.Title);
$('#Artist2').val(data.Artist);
$('#Country2').val(data.Country);
$('#id2').val(data.id);
})
.fail(function(){
$('#modal_edit6').html('Error, Please try again...');
});
});
});
