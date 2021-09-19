$(document).ready(function(){

  $('.start_date').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true
  });
  $('.end_date').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true
  });

});

// function for img-view
function imgView(img){
  let mainImg = img.files[0];
  console.log(mainImg);
}
