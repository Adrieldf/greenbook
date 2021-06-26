$(document).ready(function () {
    $('#txtCep').mask('00000-000');


    self.editFields(false);
    $("#divSalvarDados").hide();
    $("#btnEditarDados").click(() => {
        $("#divEditarDados").hide();
        $("#divSalvarDados").show();
        self.editFields(true);
    });
    $("#btnCancelar").click(() => {
        $("#divEditarDados").show();
        $("#divSalvarDados").hide();
        self.editFields(false);
    });

    $("#btnEditarTitulo").click(() => {
        alert("editar titulo");
    });
    $("#btnEditarSenha").click(() => {
        $("#txtSenha").removeAttr("disabled");
        $("#divRepitaSenha").show();
    });

    $("#btnEditarImagem").click(() => {
        $('#uploadImagem').trigger('click');
    });

    $('#uploadImagem').on('change', function () {
        var file_data = $('#uploadImagem').prop('files')[0];
        //console.log("File", file_data);
        var form_data = new FormData();
        var reader = new FileReader();
       
        reader.onload = function (e) {
            form_data.append('idUsuario', $("#idUsuario").val());
            form_data.append('fotoPerfil', e.target.result);

            $.ajax({
                url: 'http://localhost:81/greenbook/src/controller/AtualizaFotoPerfil.php', // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    window.location = response;
                    // console.log("upload success (?)", response);
                    //$("#form").html(response);
                    // alert(response); // display success response from the server
                },
                error: function (response) {
                    console.log("upload failed (?)", response);
                    // alert(response); // display error response from the server
                }
            });
        }

        reader.readAsDataURL(file_data);


    });

});

function editFields(enable) {
    if (enable) {
        $("#txtNome").removeAttr("disabled");
        $("#txtEmail").removeAttr("disabled");
        //$("#txtSenha").removeAttr("disabled");
        $("#txtDescricao").removeAttr("disabled");
        $("#txtCep").removeAttr("disabled");
        $("#txtRua").removeAttr("disabled");
        $("#txtNumero").removeAttr("disabled");
        $("#txtComplemento").removeAttr("disabled");
        $("#txtBairro").removeAttr("disabled");
        $("#txtCidade").removeAttr("disabled");
        $("#txtPais").removeAttr("disabled");
        $("#cboEstado").removeAttr("disabled");
        $("#btnEditarTitulo").show();
        $("#btnEditarSenha").show();
        $("#btnEditarImagem").show();
    } else {
        $("#txtNome").attr("disabled", "disabled");
        $("#txtEmail").attr("disabled", "disabled");
        $("#txtSenha").attr("disabled", "disabled");
        $("#txtDescricao").attr("disabled", "disabled");
        $("#txtCep").attr("disabled", "disabled");
        $("#txtRua").attr("disabled", "disabled");
        $("#txtNumero").attr("disabled", "disabled");;
        $("#txtComplemento").attr("disabled", "disabled");
        $("#txtBairro").attr("disabled", "disabled");
        $("#txtCidade").attr("disabled", "disabled");
        $("#txtPais").attr("disabled", "disabled");
        $("#cboEstado").attr("disabled", "disabled");
        $("#btnEditarTitulo").hide();
        $("#btnEditarSenha").hide();
        $("#btnEditarImagem").hide();
        $("#divRepitaSenha").hide();
    }
}


function validateForm() {
    if ($("#senhaAntiga").val() != $("#txtSenha").val() && ($("#txtRepitaSenha").val() == "" || $("#txtRepitaSenha").val() != $("#txtSenha").val())) {
        alert("Senhas digitadas não coincidem! Verifique e tente novamente!");
        return false;
    }

    return true;
}