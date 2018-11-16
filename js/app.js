$(function () {

  const host = "localhost";

  jQuery(document).ready(function ($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function () {
      $("#preloader").fadeOut("slow", function () {
        $(this).remove();
      });
    });
  });

  (function (w, d, v3) { w.chaportConfig = { appId: '5babec7cb3796d1c348a5cd1' }; if (w.chaport) return; v3 = w.chaport = {}; v3._q = []; v3._l = {}; v3.q = function () { v3._q.push(arguments) }; v3.on = function (e, fn) { if (!v3._l[e]) v3._l[e] = []; v3._l[e].push(fn) }; var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = 'https://app.chaport.com/javascripts/insert.js'; var ss = d.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss) })(window, document);


  //flecha abajo
  $(".flecha-abajo a").on("click", function (event) {
    event.preventDefault();
    var hash = this.hash; //obtiene la ruta #..
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top
      },
      900,
      function () {
        window.location.hash = hash;
      }
    );
  });

  //botón servicios -->#link-servicios
  $(".navbar-nav li a").on("click", function (event) {
    // event.preventDefault();-------------------------------Esto me generaba el error de que no me cambia de pagina xD
    var hash = this.hash; //obtiene la ruta #..
    $("html, body").animate(
      {
        scrollTop: $(hash).offset().top
      },
      900,
      function () {
        window.location.hash = hash;
      }
    );
  });


 /* ADMINISTRADOR */
 myDataTable("myTable");

 

 /**WYSiWYG */

 /**Wysiwyg */


 /**Registrar noticia */

 $(document).on("submit", "#form-noticia", function (e) {
   e.preventDefault();
   $.ajax({
     type: "POST",
     url: "../services/registrarNoticia.php",
     data: new FormData(this),
     contentType: false,
     cache: false,
     processData:false,
     dataType: "JSON",
     beforeSend: function(){
       $('#sbmButton').attr("disabled","disabled");
       $('#form-noticia').css("opacity",".5");
     },
     success: function (response) {
       $('#form-noticia').css("opacity","");
       if(response.rpta == true){
         alert("Registro exitoso");
         location.href ="http://"+host+"/fserver.github.io/admin/noticias.php";
       }else
       if(response.rpta == false){
         alert("No se pudo registrar");
       }
       if(response.rpta === "err"){
         location.href ="http://"+host+"/fserver.github.io/autenticacion.php";
       }
     }
   });
 });

 /**Editar noticia */
 $(document).on("submit", "#form-editar-noticia", function (e) {
   e.preventDefault();
   var data = new FormData(this);
   var fileImage = $("#fileImage").val();
   var bandera;
   if(fileImage != ""){
     bandera = "true";
   }else{
     bandera = "false";
   }
   data.append("bandera", bandera);

   $.ajax({
     type: "POST",
     url: "../services/editarNoticia.php",
     data: data,
     contentType: false,
     cache: false,
     processData:false,
     dataType: "JSON",
     beforeSend: function(){
       $('#sbmButton').attr("disabled","disabled");
       $('#form-editar-noticia').css("opacity",".5");
     },
     success: function (response) {
       $('#form-editar-noticia').css("opacity","");
       $('#sbmButton').attr("disabled",false);
       if(response.rpta == true){
         alert("Edición exitosa");
         location.href ="http://"+host+"/fserver.github.io/admin/noticias.php";
       }else
       if(response.rpta == false){
         alert("No se pudo editar");
       }
       if(response.rpta === "err"){
         location.href ="http://"+host+"/fserver.github.io/autenticacion.php";
       }
     }
   });
 });

 //file type validation
 $("#fileImage").change(function() {
   var file = this.files[0];
   var imagefile = file.type;
   var match= ["image/jpeg","image/png","image/jpg"];
   if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
     alert('Por favor selecciona un tipo de imagen válido (JPEG/JPG/PNG).');
       $("#fileImage").val('');
       return false;
     }
 });
 
 /**Eliminar noticia */
 $(document).on("click", "#status-noticia", function (e) {
   e.preventDefault();
   var id = $(this).data("noticia");
   var estado = $(this).data("status-noticia");
   data = {
     "id" : id,
     "estado" : estado
   }
   $.ajax({
     type: "POST",
     url: "../services/status-noticia.php",
     data: data,
     dataType: "JSON",
     success: function (response) {
       if(response.rpta == true){
         location.href ="http://"+host+"/fserver.github.io/admin/noticias.php";
       }else
       if(response.rpta == false){
         alert("Ocurrió un error. Comunícate con el administrador del sistema.");
       }
     }
   });
 });
   /* ADMINISTRADOR */



});

function googleTranslateElementInit() {
  new google.translate.TranslateElement({ pageLanguage: 'es', includedLanguages: 'en,fr,pt', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT }, 'google_translate_element');
}

function myDataTable(id){
  $('#'+id+'').DataTable({
    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "TODOS"]],
    "language": {
        "lengthMenu": "Mostrar _MENU_ noticias por página",
        "zeroRecords": "No hay noticias disponibles",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay noticias disponibles",
        "infoFiltered": "(filtro de _MAX_ total de noticias)",
        "search": "Buscar noticias:",
        "paginate": {
           "previous": "Anterior",
            "next": "Siguiente"
        }
    },
});
}