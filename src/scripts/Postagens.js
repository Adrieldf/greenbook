$(document).ready(function () {

    $("#btnAddImagem").click(() => {
        $('#uploadImagem').trigger('click');
    });

    $("#loja-botao-comprar").click(() => {

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

function compraLoja(idTitulo,valorTitulo,saldo){
    if(saldo<valorTitulo){
        alert("Você não possui saldo para comprar esse item.");
    }
}