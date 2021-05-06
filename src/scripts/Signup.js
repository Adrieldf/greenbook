
function validateForm() {
    if ($("#txtRepitaSenha").val() == "" || $("#txtRepitaSenha").val() != $("#txtSenha").val()) {
        alert("Senhas digitadas não coincidem! Verifique e tente novamente!");
        return false;
    }

    return true;
}