
function init() {
  window.addEventListener('scroll', function(e){
    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
    shrinkOn = 90,
    header = $("header");
    if (distanceY > shrinkOn) {
      header.addClass("smaller");
    } else {
      if (header.hasClass("smaller")) {
        header.removeClass("smaller");
      }
    }
  });

  $('.icon-search').click(function(){
    $('.searchform').toggleClass('show');
  });
}

$('.prossimeuscite').click(function() {
  $('html, body').animate({scrollTop: $('#' + $(this).find('a').attr('rel')).offset().top - 80 }, 1000);
  if(window.location.pathname == '/') {
    return false;
  }
})

$('.icon-search').click(function(){
    $('.search-container').toggleClass('show');
  });


$(document).foundation();
init();

$(function() {
    Grid.init();
    });

$('.slider-nextexit .fotorama').on(
    'fotorama:show fotorama:showend',
    function (e, fotorama, extra) {
      $('.cta-page').attr('href', $('.info-wrapper').attr('data-id'));
    }
).fotorama();

