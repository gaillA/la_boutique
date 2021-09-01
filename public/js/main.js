$(function(){

  let body = $('body');
  let i = $('nav span');

  if (body.width() <= 768) {
      i.each(function() {
        $(this).hide();
      })
    } else {
      i.each(function() {
        $(this).show();
      })
    }

  $(window).on('resize', function() {
    if (body.width() <= 768) {
      i.each(function() {
        $(this).hide();
      })
    } else {
      i.each(function() {
        $(this).show();
      })
    }
  })
})
