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
        alert("editar imagem");
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