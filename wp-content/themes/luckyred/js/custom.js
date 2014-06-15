
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

$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-red',
    radioClass: 'iradio_square-red',
    increaseArea: '20%' // optional
  });

  $('.info-date .share').hover(function() {
    $(this).find('.inner').show();
  });

$('.slider-nextexit .slideshow').on(
    'fotorama:show fotorama:showend',
    function (e, fotorama, extra) {
      $('.cta-page.button').attr('href', $('.slider-nextexit .fotorama__active .info-wrapper').attr('data-film-link'));
    }
).fotorama();

$('.bottone-scuola').click(function(){
    // var heightnow=$(".inner-scuole").height();
    // var heightfull=$(".inner-scuole").css({height:'auto'}).height();

    // $(".inner-scuole").css({height:heightnow}).animate({
    //     height: heightfull
    // }, 500);
    $('.descrizione-scuole').toggleClass('expanded');
});

$('.share .inner .icons').share({
          networks: ['facebook','twitter','googleplus','pinterest']
});

});




