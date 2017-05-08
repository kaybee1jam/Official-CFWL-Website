// When the user clicks on <span> (x), close the modal
$('.close').on('click', function(){
  $('.modal').css('display', 'none');
})

/***********************************
*SHOW AND HIDE MODAL ON GALLERY PAGE
***********************************/
// When the user clicks on the image, open the modal
$('#img01').on('click', function(){
  $('#myModal01').css('display', 'block');
});
$('#img02').on('click', function(){
  $('#myModal02').css('display', 'block');
});
$('#img03').on('click', function(){
  $('#myModal03').css('display', 'block');
});
$('#img04').on('click', function(){
  $('#myModal04').css('display', 'block');
});
$('#img05').on('click', function(){
  $('#myModal05').css('display', 'block');
});
$('#img06').on('click', function(){
  $('#myModal06').css('display', 'block');
});
$('#img07').on('click', function(){
  $('#myModal07').css('display', 'block');
});
$('#img08').on('click', function(){
  $('#myModal08').css('display', 'block');
});

/***********************************
*TOGGLE HAMBURGER MENU
***********************************/
$('#menu-icon').on('click', function(){
  $("#nav-bar").slideToggle("fast", function(){});
});
