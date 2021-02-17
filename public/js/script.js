

function mostrarForm(){
    const btn = document.getElementById('botaoPlus');
    const formulario = document.getElementById('formulario');

    btn.classList.add('esconder');
    formulario.classList.remove('esconder');
}

function arquivar(){
    alert("estamos aqui");
    // location.href = '../../tarefa_controle.php?acao=arquivar&id='+id;
}

function excluir(){
    alert("estamos aqui- excluir");
    // location.href = '../../tarefa_controle.php?acao=excluir&id='+id;
}