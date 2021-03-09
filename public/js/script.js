

function mostrarForm(){
    const btn = document.getElementById('botaoPlus');
    const formulario = document.getElementById('formulario');

    btn.classList.add('esconder');
    formulario.classList.remove('esconder');
}

function arquivar(id){
    //alert("estamos aqui / ArquivarR"+id);
    location.href = 'tarefa_controle.php?acao=arquivar&id='+id;
}

function concluir(id){
    //alert("estamos aqui / concluir");
    location.href = 'tarefa_controle.php?acao=concluir&id='+id;
}

function excluir(id){
    //alert("estamos aqui- excluir");
    location.href = 'tarefa_controle.php?acao=excluir&id='+id;
}