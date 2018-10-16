$(function(){
  //efectos wow.js
  new WOW().init();

  //flecha abajo
  $(".flecha-abajo a").on('click', function(event) {
    event.preventDefault();
    var hash = this.hash;//obtiene la ruta #..
    $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 900, function(){
        window.location.hash = hash;
    });
  });

  //botón servicios -->#link-servicios
  $(".navbar-nav li a").on('click', function(event) {
    // event.preventDefault();-------------------------------Esto me generaba el error de que no me cambia de pagina xD
    var hash = this.hash;//obtiene la ruta #..
    $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 900, function(){
        window.location.hash = hash;
    });
  });

  var scroll = ScrollReveal();
  // scroll.reveal('.row',{duration: 3000});









});
