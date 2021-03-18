
$(document).ready(listarTarefas);

function listarTarefas() {            
    const controllerURL = "./controller/TarefaController.class.php?_acao=arquivadas";       

    $.ajax({
        url: controllerURL,
        type: "GET",
        dataType: "JSON",
        success: successfullRequest,
        error: errorListRequest
    });
}


/**
 * 
 * @param {Array of objects} response - handles success request
 */
function successfullRequest(response) {    
          
    try {
        // array of objects
        if (Array.isArray(response)) {
            const size = response.length;

            if (size > 0) {
                loadTarefas(response); // carrega as tarefas na tabela
            } else {
                console.log('Opss! Não existem Tarefas cadastradas');
            }                

        } else {
            console.log('Response: Ocorreu um erro ao tentar recuperar as Tarefas.<br>Mensagem: ' + response.message);
        }

    } catch(e) {                    
        console.log('Ocorreu um erro ao tentar listar astarefas.<br>Mensagem: ' + e.message);    
    }   
}

// handles error request
function errorListRequest(xhr, status, error) {                                
    console.log('Ocorreu um erro ao tentar recuperar os produtos.<br>Mensagem: ' + error + '<br>Status ' + xhr.status + ': ' + xhr.statusText);                
}  

/**
 * Carrega os produtos na tabela
*/
function loadTarefas(tarefas) {
    for (let i = 0; i < tarefas.length; i++) {
        //Criação do cabeçalho da tarefa
        const cab = document.createElement('div'); // Cabeçalho do cartao
        const imgCab = document.createElement('img');       // imagem do card
        const textCab = document.createElement('span');  //Texto do cabeçalho


        if(tarefas[i].concluida == 0){
            cab.classList.add("cabCartaoNaoConcluido"); // Cabeçalho do cartao não concluido
            imgCab.src = 'public/assets/unchecked.png'; // imagem do card não concluido
            textCab.innerText = 'Não concluido';   //Texto do cabeçalho nao concluido
        }else if(tarefas[i].concluida == 1){
            cab.classList.add("cabCartaoConcluido"); // Cabeçalho do cartao concluido
            imgCab.src = 'public/assets/checked.png'; // imagem do card concluido
            textCab.innerText = 'Concluido';   //Texto do cabeçalho concluido
        }
        cab.appendChild(imgCab);
        cab.appendChild(textCab);   


        //Criação do corpo (descricao) da tarefa
        
        let textDescricao = document.createElement('div');
        textDescricao.classList.add('textoDescricao');

        if(tarefas[i].arquivada == 0){    
            textDescricao.innerText = tarefas[i].descricao;
        }else if(tarefas[i].arquivada == 1){
            textDescricao.innerText = tarefas[i].descricao;
        }
        
        //criação do rodapé
        const rodape = document.createElement('footer');

        const rodapeAcao = document.createElement('img');
        rodapeAcao.src = "public/assets/archive-color.png";
        //rodapeAcao.onclick="concluir(8)";

        const rodapeLixo = document.createElement('img');
        rodapeLixo.src = "public/assets/trash-gray-scale.png";
        rodapeAcao.onclick='excluir(8)';
        //rodapeLixo.classList.add('lixo');
        //rodape.addEventListener('click', excluir());

        rodape.appendChild(rodapeAcao);
        rodape.appendChild(rodapeLixo);

        //Criação do cartão inteiro
        const cardInteiro = document.createElement('div');
        cardInteiro.classList.add("cartaoConcluido");

        const cor = document.createElement('div');

        if(tarefas[i].cor == '#daf5fa'){
            cor.classList.add("azul");
        }else if(tarefas[i].cor == '#d1fecb'){
            cor.classList.add("verde");
        }else if(tarefas[i].cor == '#f6d0f6'){
            cor.classList.add("rosa");
        }else if(tarefas[i].cor == '#dcd0f3'){
            cor.classList.add("roxo");
        }else if(tarefas[i].cor == '#fcfccb'){
            cor.classList.add("amarelo");
        }else if(tarefas[i].cor == '#fbd4b4'){
            cor.classList.add("laranja");
        }else if(tarefas[i].cor == '#fff'){
            cor.classList.add("branco");
        }

        //Montagem
        cardInteiro.appendChild(cor);
        cor.appendChild(cab);
        cor.appendChild(textDescricao);
        cor.appendChild(rodape);

        //Adicionando na pagina html
        $('article').append(cardInteiro);
    }
     
}

function excluir(idProduto) {
    alert('EExcluir produto com o id = ' + idProduto);
}

function concluir(idProduto) {
    alert('Editar produto com o id = ' + idProduto);
}

$(document).on('click', '.lixo', function(idTarefa){
    alert('Excluir produto com o id = ' + idTarefa);
});