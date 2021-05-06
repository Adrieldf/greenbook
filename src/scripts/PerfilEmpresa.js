$(document).ready(function () {

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


    $("#btnEditarSenha").click(() => {
        $("#txtSenha").removeAttr("disabled");
        $("#divRepitaSenha").show();
    });

});

function editFields(enable) {
    if (enable) {
        $("#txtRazao").removeAttr("disabled");
        $("#txtFantasia").removeAttr("disabled");
        $("#txtEmail").removeAttr("disabled");
        //$("#txtSenha").removeAttr("disabled");
        $("#btnEditarSenha").show();
        
    } else {
        $("#txtRazao").attr("disabled", "disabled");
        $("#txtFantasia").attr("disabled", "disabled");
        $("#txtEmail").attr("disabled", "disabled");
        $("#txtSenha").attr("disabled", "disabled");
        $("#btnEditarSenha").hide();
        $("#divRepitaSenha").hide();
    }
}