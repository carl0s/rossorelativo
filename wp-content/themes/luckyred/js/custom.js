
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

  $('#prossime-uscite').on('click', function() {
    $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top }, 1000);
    return false;
  });
}
$(document).foundation();
init();
