
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
            success: successfullRequest,
            error: errorRequest
        });    
    }

    // handles success request
    function successfullRequest(response) {          
        try {             
            // try to parse JSON response      
            const objResult = JSON.parse(response); 
            
            location.href = 'index.php';   
            //console.log(objResult);                   

        } catch(e) {                    
            const msg = 'Ocorreu um erro ao tentar cadastrar o produto (JSON PARSE ERROR).<br>Mensagem: ' + e.message;    
            console.log(msg, objResult);          
        }    
    }
    // handles error request
    function errorRequest(xhr, status, error) {                                
        const msg = 'Um errorRequest: Ocorreu um erro com a requisição.<br> Mensagem: Status ' + xhr.status + ': ' + xhr.statusText;
        console.log(msg);
    }

