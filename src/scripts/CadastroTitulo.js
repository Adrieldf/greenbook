function botaoEditarTitulo(nome,desc,valor,id) {
    var x = document.getElementById("update");
    if (x.style.display === "none") {
        x.style.display = "block";
    }
    var x = document.getElementById("insert");
    if (x.style.display === "none") {
        //x.style.display = "block";
    } else {
        x.style.display = "none";
    }

    document.getElementById('txtNomeUpdate').value = nome;
    document.getElementById('txtDescricaoUpdate').value = desc;
    document.getElementById('txtValorUpdate').value = valor;
    document.getElementById('txtIdEdit').value = id;

}

function botaoCancelarTitulo() {
    var x = document.getElementById("update");
    if (x.style.display === "none") {
        //x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var x = document.getElementById("insert");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        // x.style.display = "none";
    }
}