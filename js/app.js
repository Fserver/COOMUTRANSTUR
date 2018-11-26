$(function () {

  const host = "www.coomutranstur.com";

  jQuery(document).ready(function ($) {
    // site preloader -- also uncomment the div in the header and the css style for #preloader
    $(window).load(function () {
      $("#preloader").fadeOut("slow", function () {
        $(this).remove();
      });
    });
  });

  //flecha abajo
  $(".tarjeta6, .flecha-abajo a").on("click", function (event) {
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
  $(".navbar-nav li a, .btn-contacto").on("click", function (event) {
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

  inView('.galery_container').once('enter', function () {
    $('.lazy').lazy({
      placeholder: "data:img/load.gif;",
      threshold: 0,
      visibleOnly: true
    });
  });
  $('a.gallery').featherlightGallery({
    previousIcon: '«',
    nextIcon: '»',
    galleryFadeIn: 300,

    openSpeed: 300
  });


  /* ADMINISTRADOR */


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
      processData: false,
      dataType: "JSON",
      beforeSend: function () {
        $('#sbmButton').attr("disabled", "disabled");
        $('#form-noticia').css("opacity", ".5");
      },
      success: function (response) {
        $('#form-noticia').css("opacity", "");
        if (response.rpta == true) {
          alert("Registro exitoso");
          location.href = "https://" + host + "/admin/noticias.php";
        } else
          if (response.rpta == false) {
            alert("No se pudo registrar");
          }
        if (response.rpta === "err") {
          location.href = "https://" + host + "/autenticacion.php";
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
    if (fileImage != "") {
      bandera = "true";
    } else {
      bandera = "false";
    }
    data.append("bandera", bandera);

    $.ajax({
      type: "POST",
      url: "../services/editarNoticia.php",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      dataType: "JSON",
      beforeSend: function () {
        $('#sbmButton').attr("disabled", "disabled");
        $('#form-editar-noticia').css("opacity", ".5");
      },
      success: function (response) {
        $('#form-editar-noticia').css("opacity", "");
        $('#sbmButton').attr("disabled", false);
        if (response.rpta == true) {
          alert("Edición exitosa");
          location.href = "https://" + host + "/admin/noticias.php";
        } else
          if (response.rpta == false) {
            alert("No se pudo editar");
          }
        if (response.rpta === "err") {
          location.href = "https://" + host + "/autenticacion.php";
        }
      }
    });
  });

  //file type validation
  $("#fileImage").change(function () {
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
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
      "id": id,
      "estado": estado
    }
    $.ajax({
      type: "POST",
      url: "../services/status-noticia.php",
      data: data,
      dataType: "JSON",
      success: function (response) {
        if (response.rpta == true) {
          location.href = "https://" + host + "/admin/noticias.php";
        } else
          if (response.rpta == false) {
            alert("Ocurrió un error. Comunícate con el administrador del sistema.");
          }
      }
    });
  });
  /* ADMINISTRADOR */

  /**MANAGER */
  /**Registrar administrador */

  $(document).on("submit", "#form-administrador", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../services/registrarAdministrador.php",
      data: data,
      dataType: "JSON",
      beforeSend: function () {
        $('#sbmButton').attr("disabled", "disabled");
        $('#form-administrador').css("opacity", ".5");
      },
      success: function (response) {
        $('#form-administrador').css("opacity", "");
        if (response.rpta == true) {
          alert("Registro exitoso");
          location.href = "https://" + host + "/manager/gestion-administradores.php";
        } else
          if (response.rpta == false) {
            alert("No se pudo registrar");
            $('#sbmButton').attr("disabled", false);
          }
        if (response.rpta === "err") {
          location.href = "https://" + host + "/autenticacion.php";
        }
      }
    });
  });

  $(document).on("submit", "#form-editar-administrador", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../services/editarAdministrador.php",
      data: data,
      dataType: "JSON",
      beforeSend: function () {
        // $('#sbmButton').attr("disabled","disabled");
        // $('#form-administrador').css("opacity",".5");
      },
      success: function (response) {
        console.log(response);
        // $('#form-administrador').css("opacity","");
        // $('#sbmButton').attr("disabled",false);
        if (response.rpta == true) {
          alert("Edición exitosa");
          location.href = "https://" + host + "/manager/gestion-administradores.php";
        } else
          if (response.rpta == false) {
            alert("No se pudo editar");
          }
        if (response.rpta === "err") {
          location.href = "https://" + host + "/autenticacion.php";
        }
      }
    });
  });


  /**MANAGER */


  /**NEWS */

  $(document).on("keyup", "#input-search", function () {
    var suggestions = $("#search-suggestions");
    suggestions.html("");
    var value = $(this).val();
    var data = {
      "search": value
    }
    $.ajax({
      type: "POST",
      url: "../services/api-search-news.php",
      data: data,
      dataType: "JSON",
      success: function (response) {
        if (response.rpta == true) {
          $.each(response, function (i, valor) {
            if (valor.titulo != undefined) {
              suggestions.append('<option label="' + valor.titulo + '" value="' + valor.titulo + '" data-id="' + valor.idnoticia + '">');
            }
          });
        }
      }
    });
  });


  $(document).on("input", "#input-search", function (e) {
    // e.preventDefault();
    var userText = $(this).val();
    $("#search-suggestions").find("option").each(function () {
      if ($(this).val() === userText) {
        if ($(this).val() != "") {
          var id = $(this).data("id");
          location.href = "https://" + host + "/news/noticia.php?id=" + id;
        }
      }
    });

  });


  /**NEWS */

     /**FORMULARIO CONTACTO */


   
     $(document).on('submit', '#form-contacto', function (e) {
      e.preventDefault();
  
      grecaptcha.ready(function() {
        formContacto();
  
      });
  
     });
     /**FORMULARIO CONTACTO */

}); //FIN READY


async function formContacto(){

  const span_msg = $("#rptaContact");

  try{

    await grecaptcha.execute('6LfZ_XwUAAAAAH1B7CAUoVgMcctrgSNqRmbJHoQL', {action: 'homepage'})
    .then(function(token) {
      document.getElementById("g-recaptcha-response").value = token;
    });

    const data = new FormData(document.getElementById('form-contacto'));

    var config = { 
      method: 'POST',
      body: data
    };

    inactivarSubmit();
    let response = await fetch('services/contactform.php', config);
    let res  = await response.json();

    span_msg.html(res.msg);  
    setTimeout(function(){
      span_msg.html("");
    }, 3000);

    // document.getElementById("rptaContact").innerHTML = res.msg;

  }catch(Error){
    console.log("errorr__"+ Error);
    span_msg.html("No se pudo enviar el formulario.");  
  }
  activarSubmit();
}



function activarSubmit(){
  $("#btn-contact").attr('disabled', false);
  $("#btn-contact").addClass('button button-block');
}

function inactivarSubmit(){
  $("#btn-contact").attr('disabled', true);
  $("#btn-contact").removeClass('button button-block');
}






function googleTranslateElementInit() {
  new google.translate.TranslateElement({ pageLanguage: 'es', includedLanguages: 'en,fr,pt', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT }, 'google_translate_element');
}

