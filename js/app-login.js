$(function(){

    //LOGIN
    $(document).on("submit", "#frm-login", function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "services/iniciar-sesion.php",
            data: data,
            dataType: "JSON",
            success: function (response) {
                if(response.rpta == true){
                    $("#roles").html('');
                    var roles = response.roles;
                    $.each(roles, function (indexInArray, valueOfElement) { 
                       $("#roles").append('<a href="#" class="opcion-rol" data-rol="'+roles[indexInArray].rol+'" data-idperfil="'+roles[indexInArray].idperfil+'">'+roles[indexInArray].rol+'</a>');
                    });
                    $('#myModal').modal('show');
                }
                if(response.rpta == false){
                    alert("El usuario que intenta ingresar no existe");
                }
            }
        });
    });

    $(document).on("click", ".opcion-rol", function () {
        var rol = $(this).data("rol");
        var perfil = $(this).data("idperfil");
        $("#rol").val(rol);
        $("#perfil").val(perfil);
        $('#redirect').submit();
    });
});
