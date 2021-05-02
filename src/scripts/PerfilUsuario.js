$(document).ready(function () {
    // $('#txtCep').mask('00000-000');
    // $('#txtTelefone').mask('(00) 00000-0000');


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



});

function editFields(enable) {
    console.log(enable);

    if (enable) {
        $("#txtNome").removeAttr("disabled");
    } else {
        $("#txtNome").attr("disabled", "disabled");
    }
}