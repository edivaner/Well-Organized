<?php 
	include '../config/DbConfig.php';
	
	class ConexaoPDO {

		private $connection;
		private $stringConnection;		

		public function __construct() {
			$this->stringConnection = DbConfig::$SGDB.':host='.DbConfig::$HOST.';dbname='.DbConfig::$DB;			
		}		
			
		public function connect() {
			try {				
				$this->connection =  new PDO($this->stringConnection, DbConfig::$USER, DbConfig::$PASSWORD, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (\PDOException $ex) {
				throw new Exception("Erro ao tentar se conectar com o banco de dados. <br>".				
				"Mensagem: ".$ex->getMessage());
			}								
		}
				
		/** 
		 * Summary.
		 * @param $query: Query to execute
		 * @param $fields: Associative array containing the fields and types in the right order to query
		 */
		public function prepareQuery($query, $fields) {						
			$stmt = $this->connection->prepare($query);
			// o valor (value) necessita ser por referência para que o bindParam funcione corretamente
			foreach ($fields as $name => &$value) {				
				$stmt->bindParam($name, $value);
			}			
			return $stmt;
		}

		/**
		 * Summary.
		 * Executa a query após a preparação da mesma (INSERT, UPDATE and DELETE
		 * @param $preparedStmt: Statement contendo a query pronta para execuçãos
		 * @return rowCount: Número de linhas afetadas pela execução da query.
		 * 
		 * Obs.: Na tentativa de atualização (UPDATE) pode ocorrer de o campo a ser atualizado ser
		 * igual ao valor que já está na tabela, neste caso rowcount retornará 0 (Nenhuma linha atualizada),
		 * o que não significa que a query não foi executada de forma correta.
		 */
		public function executeQuery($preparedStmt) {			
			$preparedStmt->execute();	
			return $preparedStmt->rowCount(); // tentar retornar o numero de linhas afetadas
		}
		
		/**
		 * Description.
		 * Executa a query após a preparação da mesma (SELECT)
		 * @param $preparedStmt: Statement contendo a query pronta para execução
		 * @return $arr: Array com os resultados
		 */
		public function executeQuerySelect($preparedStmt) {			
			$arr = [];
			$preparedStmt->execute();	
			while($row = $preparedStmt->fetch(PDO::FETCH_ASSOC)) {
				$arr[] = $row;
			}
			return $arr;
		}

		public function getLastInsertId() {
			return $this->connection->lastInsertId();
		}
	
	}
	
?>