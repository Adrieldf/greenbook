$(document).ready(function () {

    var isVisible = false;
    $("#ddmPerfil").on('click', function () {
        if(isVisible)
            $("#ddmPerfilItens").hide();
        else
            $("#ddmPerfilItens").show();
        isVisible = !isVisible;
    });
});