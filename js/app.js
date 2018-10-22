$(function() {

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.1&appId=642215239509270&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  AOS.init();


  jQuery(document).ready(function ($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function () {
      $("#preloader").fadeOut("slow", function () {
        $(this).remove();
      });
    });
  });

  (function (w, d, v3) { w.chaportConfig = { appId: '5babec7cb3796d1c348a5cd1' }; if (w.chaport) return; v3 = w.chaport = {}; v3._q = []; v3._l = {}; v3.q = function () { v3._q.push(arguments) }; v3.on = function (e, fn) { if (!v3._l[e]) v3._l[e] = []; v3._l[e].push(fn) }; var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = 'https://app.chaport.com/javascripts/insert.js'; var ss = d.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss) })(window, document); 


  //efectos wow.js
  new WOW().init();

  //flecha abajo
  $(".flecha-abajo a").on("click", function(event) {
    event.preventDefault();
    var hash = this.hash; //obtiene la ruta #..
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top
      },
      900,
      function() {
        window.location.hash = hash;
      }
    );
  });

  //botón servicios -->#link-servicios
  $(".navbar-nav li a").on("click", function(event) {
    // event.preventDefault();-------------------------------Esto me generaba el error de que no me cambia de pagina xD
    var hash = this.hash; //obtiene la ruta #..
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top
      },
      900,
      function() {
        window.location.hash = hash;
      }
    );
  });

  var scroll = ScrollReveal();
  // scroll.reveal('.row',{duration: 3000});
});
