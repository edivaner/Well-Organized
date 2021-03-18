<?php 
    include_once 'ConexaoPDO.class.php';
        
    class TarefaDao {        
        private $conexao;

        public function __construct() {
            $this->conexao = new ConexaoPDO();
        }

        /**
         * Summary:
         * Método que tem por objetivo cadastrar uma nova tarefa no banco de dados
         * @param $tarefa: Objeto da classe Tarefa a ser cadastrada
         * @param boolean: Retorna true se a tarefa foi cadastrada com sucesso 
         * ou false caso contrário
         */
        public function cadastrarTarefa($tarefa) {
            $retorno  = false;
            try {
                // query
                $query = "INSERT INTO tarefa(descricao, cor, concluida, arquivada) VALUES(:descricao, :cor, :concluida, :arquivada)";
                // fields to bind
                $fields = array (
                 ':descricao' => $tarefa->get('descricao'), 
                 ':cor' => $tarefa->get('cor'), 
                 ':concluida' => $tarefa->get('concluida'),
                 ':arquivada' => $tarefa->get('arquivada'));

                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $result = $this->conexao->executeQuery($stmt);
                if ($result > 0) {
                    $retorno  = true;
                }
                
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $retorno;
        }

        /**
         * Método que tem por objetivo excluir uma tarefa com o id passado por parâmetro
         * @param $idTarefa: Id da tarefa a ser deletado
         * @return boolean: Retorna true se a tarefa foi excluída com sucesso or false caso contrário. 
         * Variável $result guarda o número de linhas afetadas pela consulta
         */
        public function deletarTarefa($idTarefa) {
            $retorno = false;
            $query = "DELETE FROM tarefa WHERE idTarefa = :idTarefa";
            
            // fields to bind
            $fields = array (':idTarefa' => $idTarefa);

            try {
                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $result = $this->conexao->executeQuery($stmt);
                if ($result > 0) {
                    $retorno  = true;
                }

            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $retorno;
        }      
        
        /**
         * Método que tem por objetivo realizar a atualização de uma tarefa.
         * @param $idTarefa: Id da tarefa a ser atualizada
         * @param $fields: Array associativo contendo os campos e os novos valores a serem atualizados
         * Ex.: array('concluida' => true, 'arquivada' => false);
         * @return boolean: Retorna true se a tarefa pôde ser atualizada com sucesso e false caso contrário
         */
        public function atualizarTarefa($idTarefa, $fields) {
            $retorno = false;
            $query = "UPDATE tarefa SET ";

            // construindo a query dinamicamente
            foreach($fields as $field => $newValue) {                     

                // single quotes for string types
                gettype($newValue) === 'string' ? $query .= $field." = '".$newValue."'" : $query .= $field." = ".$newValue;

                // Se não for o último campo, então coloca vírgula
                if ($field !== array_key_last($fields)) $query .= ", ";
            }            

            $query .= " WHERE idTarefa = :idTarefa";

            // fields to bind
            $fields = array (':idTarefa' => $idTarefa);

            try {
                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $result = $this->conexao->executeQuery($stmt);
                if ($result > 0) {
                    $retorno  = true;
                }

            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $retorno;
        }        

        /**
         * Summary:
         * Método que busca todos as tarefas cadastradas na base de dados.
         * @param nenhum
         * @return array: Retorna uma array associativo do tipo arr(key -> value) com os 
         * dados da tarefa, ou um array vazio caso nenhuma tarefa seja encontrada
         */
        public function buscarTodasTarefas() {
            $query = "SELECT * FROM tarefa";    //ORDER BY descricao ASC                   
            // fields to bind
            $fields = [];
            // array return
            $arr = [];
            try {
                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $arr = $this->conexao->executeQuerySelect($stmt);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $arr;
        }

        public function buscarArquivadas() { 
            $query = "SELECT * FROM tarefa WHERE arquivada = 1  AND concluida = 1";    //ORDER BY descricao ASC                   
            // fields to bind
            $fields = [];
            // array return
            $arr = [];
            try {
                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $arr = $this->conexao->executeQuerySelect($stmt);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $arr;
        }

        public function buscarAFazer() { 
            $query = "SELECT * FROM tarefa WHERE concluida = 0 and arquivada = 0";    //ORDER BY descricao ASC                   
            // fields to bind
            $fields = [];
            // array return
            $arr = [];
            try {
                $this->conexao->connect();    
                $stmt = $this->conexao->prepareQuery($query, $fields);                
                $arr = $this->conexao->executeQuerySelect($stmt);
            } catch (Exception $ex) {
                throw new Exception($ex->getMessage());
            }
            return $arr;
        }
    }

?>