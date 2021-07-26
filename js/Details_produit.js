$(document).ready(function(){
$(document).on('click','#details_produits', function(e){
e.preventDefault();
var empid = $(this).data('id');
$.ajax({
url: '../page/fetch_produit.php',
type: 'POST',
data: 'empid='+empid,
dataType: 'json',
cache: false
})
.done(function(data){

$('#Title').html(data.date_analyse);
$('#Artist').html(data.Code_Labo);
$('#Country').html(data.code_site);
})
.fail(function(){
$('#modal_edit6').html('Error, Please try again...');
});
});
});
