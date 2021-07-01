$(document).ready(function () {

    $("#btnAddImagem").click(() => {
        $('#uploadImagem').trigger('click');
    });

    $('#uploadImagem').on('change', function () {
        var file_data = $('#uploadImagem').prop('files')[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var base64Img = e.target.result;
            $("#imgFotoPost").attr("src", base64Img);
            $("#imgFotoPost").attr("value", base64Img);
            $("#addImageIcon").removeClass("fas fa-plus").addClass("far fa-edit");
        }

        reader.readAsDataURL(file_data);
    });

    $("#addPost").click(function () {
        var form_data = new FormData();
        form_data.append('idUsuario', $("#idUsuario").val());
        form_data.append('idEmpresa', $("#idEmpresa").val());
        form_data.append('txtTitulo', $("#txtTitulo").val());
        form_data.append('txtDescricao', $("#txtDescricao").val());
        form_data.append('imgFotoPost', $("#imgFotoPost").val());

        $.ajax({
            url: 'http://localhost:81/greenbook/src/controller/AddPost.php', // point to server-side controller method
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {

                // window.location = response;
                //console.log("upload success (?)", response);
                $("#error").html(response);
                // alert(response); // display success response from the server
            },
            error: function (response) {
                // console.log("upload failed (?)", response);
                // alert(response); // display error response from the server
            }
        });
    });
});

function compraLoja(idTitulo, valorTitulo, saldo,idUsuario) {
    if (saldo < valorTitulo) {
        alert("Você não possui saldo para comprar esse item.");
    }
    else {
        $.ajax
            ({
                //Configurações
                type: 'POST',//Método que está sendo utilizado.
                dataType: 'json',//É o tipo de dado que a página vai retornar.
                url: '../controller/CompraTitulo.php',//Indica a página que está sendo solicitada.
                data: { idTitulo: idTitulo, idUsuario: idUsuario },//Dados para consulta
                //função que será executada quando a solicitação for finalizada.
                success: function (msg) {

                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alert(errorMessage);
                }
            });
        var ajax = new XMLHttpRequest();
        ajax.open('POST', 'http://localhost/greenbook/src/controller/CompraTitulo.php');
        var data = new FormData();
        data.append('idTitulo', idTitulo);
        data.append('idUsuario', idUsuario);
        ajax.send(data);
        window.location = "../view/postagens.php";
    }
}
