<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Well Organized</title>
    <meta charset="UTF-8">        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/estilo.css" media="screen" />
    <link rel="icon" href="./public/assets/favicon.ico"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">   
</head>
<body>
    <!-- Seu código deverá estar aqui -->
    <nav class="navegacao">
        <div class="logo">
            <img src="public/assets/well-organized-logo.png" alt="Logo Organized">
        </div>

        <div class="links">
            <a href="#">A fazer</a> 
            <span class="divisor">|</span>
            <a href="#">Arquivadas</a>
        </div>
    </nav>

    <section>
        <button class="botaoAdicionar" id="botaoPlus" onclick="mostrarForm()">
            <img src="public/assets/task-add-icon.png" alt="botão adicionar formulario">
            <span>Adicionar Tarefa</span>
        </button>

        <? if(isset($_GET['inclusao']) && $_GET['inclusao']==1) { ?>
            <!-- <div id="feedBackInclusao" class="bg-success pt-2 text-white d-flex justify-content-center">
            <h5>Tarefa inserida com sucesso!</h5>
        </div> -->
        <?}?>

        <form method="post" action="public/php/tarefa_controle.php">
            <div class="esconder" id="formulario">
                <label for="descricao" class="descricaoTexto">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="descricaoInput">

                <label for="cor" class="labelcor">Cor:</label>
                <input type="checkbox" class="checkzinho azul" value="#daf5fa" name="cor">
                <input type="checkbox" class="checkzinho verde" value="#d1fecb" name="cor">
                <input type="checkbox" class="checkzinho rosa" value="#f6d0f6" name="cor">
                <input type="checkbox" class="checkzinho roxo" value="#dcd0f3" name="cor">
                <input type="checkbox" class="checkzinho amarelo" value="#fcfccb" name="cor">
                <input type="checkbox" class="checkzinho laranja" value="#fbd4b4" name="cor">
                <input type="checkbox" class="checkzinho branco" value="#fff" name="cor">

                <button class="buttonAdd">Adicionar</button>
            </div>
        </form>
    </section>

    <article class="conteudo">
        <div class="cartaoConcluido">
            <div class="cabCartaoConcluido">
                <img src="public/assets/checked.png" alt="checked concluido">
                concluido
            </div>
            <div class="textoDescricao">
                Tarefas tarefas tarefas tarefas tarefas
            </div>
            <div class="rodapeCartaoConcluido">
                <img src="public/assets/archive-color.png" alt="arquivar">
                <img src="public/assets/trash-gray-scale.png" alt="lixo">
            </div>
        </div>

        <div class="cartaoNaoConcluido">
            <div class="cabCartaoNaoConcluido">
                <img src="public/assets/unchecked.png" alt="checked não concluido">
                não concluido
            </div>
            <div class="textoDescricao">
                Tarefas tarefas tarefas tarefas tarefas
            </div>
            <div class="rodapeCartaoNaoConcluido">
                <img src="public/assets/archive-color.png" alt="arquivar">
                <img src="public/assets/trash-gray-scale.png" alt="lixo">
            </div>
        </div>
    </article>

    <script src="public/js/script.js"></script>

</body>
</html>