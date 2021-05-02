function botaoEditarTarefa(desc, nomeTipoTarefa,pontos,moedas,id) {
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
    document.getElementById('txtTarefaUpdate').value = desc;
    document.getElementById('txtTipoTarefaUpdate').value = nomeTipoTarefa;
    document.getElementById('txtPontosUpdate').value = pontos;
    document.getElementById('txtMoedasUpdate').value = moedas;
    document.getElementById('txtIdEdit').value = id;
}

function botaoCancelarTarefa(){
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