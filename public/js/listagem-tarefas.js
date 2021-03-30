
$(document).ready(listarTarefas);

function listarTarefas() {            
    const controllerURL = "./controller/TarefaController.class.php?_acao=listar";       

    $.ajax({
        url: controllerURL,
        type: "GET",
        dataType: "JSON",
        success: successfullRequestListar,
        error: errorListRequestListar
    });
}


/**
 * 
 * @param {Array of objects} response - handles success request
 */
function successfullRequestListar(response) {    
          
    try {
        // array of objects
        if (Array.isArray(response)) {
            const size = response.length;

            if (size > 0) {
                loadTarefas(response); // carrega as tarefas
            } else {
                console.log('Opss! Não existem Tarefas cadastradas');
            }                

        } else {
            console.log('Response: Ocorreu um erro ao tentar recuperar as Tarefas (Listagem).<br>Mensagem: ' + response.message); //Onde ocorre o erro apos cadastrar
        }

    } catch(e) {                    
        console.log('Ocorreu um erro ao tentar listar as tarefas.<br>Mensagem: ' + e.message);    
    }   
}

// handles error request
function errorListRequestListar(xhr, status, error) {                                
    console.log('Ocorreu um erro ao tentar recuperar as tarefas.<br>Mensagem: ' + error + '<br>Status ' + xhr.status + ': ' + xhr.statusText);                
}  


/**
 * Cria a tarefa dinamicamente e add na tela.
*/
function loadTarefas(tarefas) {
    console.log(tarefas);

    if($('article').children().length > 0){
        $('article').children().remove();
    }

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

        if(tarefas[i].arquivada == 0){    
            textDescricao.classList.add('textoDescricao');
        }else if(tarefas[i].arquivada == 1){
            textDescricao.classList.add('textoDescricaoRiscado');
        }

        textDescricao.innerText = tarefas[i].descricao;
        
        //criação do rodapé
        const rodape = document.createElement('footer');

        const rodapeAcao = document.createElement('img');
        rodapeAcao.src = "public/assets/archive-color.png";

        if(tarefas[i].concluida == 0){
            rodapeAcao.addEventListener('click', function() {
               concluir(tarefas[i].idTarefa);
            });
        }else if(tarefas[i].concluida == 1){
            rodapeAcao.addEventListener('click', function() {
                arquivar(tarefas[i].idTarefa);
            });
        }
        

        const rodapeLixo = document.createElement('img');
        rodapeLixo.src = "public/assets/trash-gray-scale.png";
        rodapeLixo.addEventListener('click', function() {
            excluir(tarefas[i].idTarefa, tarefas[i].descricao);
        });

        rodape.appendChild(rodapeAcao);
        rodape.appendChild(rodapeLixo);

        //Criação do cartão inteiro
        const cardInteiro = document.createElement('div');
        cardInteiro.classList.add("cartaoConcluido");

        const cor = document.createElement('div');

        //Cor do cartão
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

        //Adicionando na página html
        $('article').append(cardInteiro);
    }
     
}

function excluir(IDTarefa, desc) {
    let confirma = confirm('Excluir a tarefa: ' +desc);

    if(confirma){
        location.href = "./controller/TarefaController.class.php?_acao=lixo&_id="+IDTarefa;
    }else{
        console.log('não excluir');
    }             
}

function concluir(IDTarefa) {
    let confirma = ('Acao de concluir tarefa com o id: '+IDTarefa);

    if(confirma){
        location.href = "./controller/TarefaController.class.php?_acao=concluir&_id="+IDTarefa;
    }else{
        console.log('Cancelar Atualização');
    }
}

function arquivar(IDTarefa) {
    let confirma = ('Acao de arquivar tarefa com o id: '+IDTarefa);

    if(confirma){
        location.href = "./controller/TarefaController.class.php?_acao=arquivar&_id="+IDTarefa;
    }else{
        console.log('Cancelar Atualização');
    }
}




    /*
    // Criando Tarefa dinamicamente Sem array tarefas

    //Criação do cabeçalho da tarefa
    const cab = document.createElement('div'); // Cabeçalho do cartao
    cab.classList.add("cabCartaoNaoConcluido"); // Cabeçalho do cartao não concluido

    const imgCab = document.createElement('img');       // imagem do card
    imgCab.src = 'public/assets/unchecked.png'; // imagem do card não concluido
    cab.appendChild(imgCab);

    const textCab = document.createElement('span');  //Texto do cabeçalho
    textCab.innerText = 'Não concluido';   //Texto do cabeçalho nao concluido
    cab.appendChild(textCab);   

    //Criação do corpo (descricao) da tarefa
    let textDescricao = document.createElement('div');
    textDescricao.classList.add('textoDescricao');
    textDescricao.innerText = "teste texto";//tarefas[i].descricao; 

    //criação do rodapé
    const rodape = document.createElement('footer');

    const rodapeAcao = document.createElement('img');
    rodapeAcao.src = "public/assets/archive-color.png";
    const rodapeLixo = document.createElement('img');
    rodapeLixo.src = "public/assets/trash-gray-scale.png";

    rodape.appendChild(rodapeAcao);
    rodape.appendChild(rodapeLixo);

    //Criação do cartão inteiro
    const cardInteiro = document.createElement('div');
    cardInteiro.classList.add("cartaoConcluido");

    const cor = document.createElement('div');
    cor.classList.add("rosa");

    //Montagem
    cardInteiro.appendChild(cor);
    cor.appendChild(cab);
    cor.appendChild(textDescricao);
    cor.appendChild(rodape);

    //Adicionando na pagina html
    $('article').append(cardInteiro);
    */

    /*
    //Criando no HTML
    
        <div class="cartaoConcluido rosa">
            <div class="cabCartaoConcluido">
                <img src="public/assets/checked.png" alt="checked concluido">
                concluida
            </div>
            <div class="textoDescricao">
                tetetetetete
            </div>
            <div class="rodapeCartao">
                <img src="public/assets/archive-color.png" alt="arquivar">
                <img src="public/assets/trash-gray-scale.png" alt="lixo">
            </div>
        </div>
    */