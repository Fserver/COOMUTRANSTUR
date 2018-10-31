// Videotutorial: https://codepen.io/escueladigital/pen/OyLYrW
$(window).on('scroll', parallax);

function parallax() {
  //obtener el nivel de scroll
  var s = $(window).scrollTop();
  // efecto parallax para los fondos
  function parallaxBg(el, t) {
    $(el).css({
      'background-attachment': 'fixed',
      'background-position': 'center ' + -(s * t) + 'px'
    })
  }
  // efecto parallax para los textos
  function parallaxFront(el, t) {
    $(el).css({
      'position': 'relative',
      'top': -(s * t) + 'px'
    })
  }

  parallaxBg('#parallax1', .05);
  // parallaxFront('.page',.4);
}