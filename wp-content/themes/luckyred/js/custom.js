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
}
$(document).foundation();
init();