<?php
    include_once '../model/Tarefa.class.php';
    include_once '../dao/TarefaDao.class.php';

    try{
        $tarefaController = new TarefaController();
        $tarefaController->handleRequest();

    }catch(Exception $ex){
        echo json_encode(array('message'=>'Uma exceção ocorreu ao tentar realizar a requisição.<br> Mensagem: '.$ex->getMessage(), 'status_code' => 0));
    }

    class TarefaController{
        private $daoTarefa;

        public function __construct() {
            $this->daoTarefa = new TarefaDao();
        }

        public function handleRequest() {            
            //identificando o tipo de requisicao recebida            
            switch ($_SERVER['REQUEST_METHOD']) 
            {
                case 'POST':                    
                    if (isset($_POST['_acao'])) {
                        $this->handlePostRequest($_POST['_acao']);                        
                    } else {
                        echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar a operação.<br> Ação não informada', 'status_code' => 0));     
                    }                     
                break;

                case 'GET':
                    if (isset($_GET['_acao'])) {
                        $this->handleGetRequest($_GET['_acao']);                        
                    } else {
                        echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar a operação.<br> Ação não informada', 'status_code' => 0));     
                    }                      
                break;

                default:
                    echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar a operação.<br> Requisição desconhecida', 'status_code' => 0)); 
            }
        }

        private function handlePostRequest($_acao) {
            switch($_acao) {
                case 'cadastrar':
                    $this->cadastrar();
                break;
                // poderiam existir outras ações a serem executadas com POST
                default:
                    echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar a operação.<br> Ação desconhecida', 'status_code' => 0)); 
            }            
        }

        private function handleGetRequest($_acao) {
            switch($_acao) {
                case 'listar':
                    $this->buscarTodasTarefas();
                break;
                case 'arquivadas':
                    $this->buscarArquivadas();
                break;
                case 'afazer':
                    $this->buscarAFazer();
                break;
                // poderiam existir outras ações a serem executadas com GET
                default:
                    echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar a operação.<br> Ação desconhecida', 'status_code' => 0)); 
            }
        }


        public function cadastrar() {
            try {
                extract($_POST);
                // variaveis $_acao, $nome, $categoria e $quantidade
                $tarefa = new Tarefa(0, $descricao, $cor);

                if($this->daoTarefa->cadastrarTarefa($tarefa)) {
                    echo json_encode(array('message' => 'Cadastro realizado com sucesso!', 'status_code' => 1));
                } else {
                    echo json_encode(array('message' => 'Ocorreu um erro ao tentar realizar o cadastro.', 'status_code' => 0));
                }

                           
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar realizar o cadastro.<br> Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }

        public function buscarTodasTarefas() {
            $tarefas = [];
            try {
                $tarefas = $this->daoTarefa->buscarTodasTarefas();
                echo json_encode($tarefas);
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar buscar as tarefas.<br>Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }

        public function buscarArquivadas() {
            $tarefas = [];
            try {
                $tarefas = $this->daoTarefa->buscarArquivadas();
                echo json_encode($tarefas);
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar buscar as tarefas.<br>Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }

        public function buscarAFazer() {
            $tarefas = [];
            try {
                $tarefas = $this->daoTarefa->buscarAFazer();
                echo json_encode($tarefas);
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar buscar as tarefas.<br>Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }

        public function atualizar() {
            try {
                echo json_encode(array('message' => 'Produto atualizado com sucesso', 'status_code' => 1));
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar atualizar a tarefa.<br>Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }    
        
        public function deletar() {
            try {
                echo json_encode(array('message' => 'Produto excluído com sucesso', 'status_code' => 1));
            } catch (Exception $ex) {
                echo json_encode(array('message' => 'Uma exceção ocorreu ao tentar excluir a tarefa.<br>Mensagem: '.$ex->getMessage(), 'status_code' => 0));
            }
        }

    }

?>