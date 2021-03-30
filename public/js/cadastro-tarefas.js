
    // registrando o listener do evento submit no form de cadastro
    formCadastrar = $('#form-tarefa').on('submit', formValidate);

    // função básica de validação do campo select
    function formValidate(evt) {   
        formSubmit(evt);
    }

    // realizando a requisição AJAX
    function formSubmit(evt) {    
        const controllerURL = "./controller/TarefaController.class.php";   
        evt.preventDefault();     
        $.ajax({
            type: "POST",
            url: controllerURL,
            data: $(formCadastrar).serialize(),
            success: successfullRequestCadastro,
            error: errorRequestCadastro
        });    
    }

    // handles success request
    function successfullRequestCadastro(response) {          
        try {             
            // try to parse JSON response      
            const objResult = JSON.parse(response); 
            alert("Tarefa cadastrada com sucesso!");
            listarTarefas();
            
            //location.href = 'index.php';   
            //console.log(objResult);                   

        } catch(e) {                    
            const msg = 'Ocorreu um erro ao tentar cadastrar a tarefa (JSON PARSE ERROR).<br>Mensagem: ' + e.message;    
            console.log(msg, objResult);          
        }    
    }
    // handles error request
    function errorRequestCadastro(xhr, status, error) {                                
        const msg = 'Um errorRequest: Ocorreu um erro com a requisição.<br> Mensagem: Status ' + xhr.status + ': ' + xhr.statusText;
        console.log(msg);
    }

