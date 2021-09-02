$(function(){

  let body = $('body');
  let i = $('nav span');
  let dropdown = $('.dropdown-content')

  if (body.width() <= 768) {
      i.each(function() {
        $(this).hide();
      });
      dropdown.each(function() {
          $(this).removeClass("mobile");
      });
    } else {
      i.each(function() {
        $(this).show();
      });
      dropdown.each(function() {
          $(this).addClass("mobile");
      });
    }

  $(window).on('resize', function() {
    if (body.width() <= 768) {
      i.each(function() {
        $(this).hide();
      });
      dropdown.each(function() {
          $(this).removeClass("mobile");
      });
    } else {
      i.each(function() {
        $(this).show();
      });
      dropdown.each(function() {
          $(this).addClass("mobile");
      });
    }
  })
})
