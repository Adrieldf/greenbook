function botaoEditarTipoTarefa(nome, id) {
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
    document.getElementById('txtTarefaUpdate').value = nome;
    document.getElementById('txtIdEdit').value = id;

}

function botaoCancelarTipoTarefa() {
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
/******************************************************/
function botaoEditarTarefa(desc, nomeTipoTarefa,pontos,moedas,id) {

}