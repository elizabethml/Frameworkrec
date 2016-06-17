<?php

	class Model{

		protected $db;
		protected $stmt;

		function __construct(){
			$this->db=DB::singleton();
		}

		function query($query){
			$this->stmt=$this->db->prepare($query); 
		}

		function bind($param,$value,$type=NULL){  //(per lligar paràmetres de consultes prepareades
			
            if (is_int($value))
            {
               $type = PDO::PARAM_INT;

            } elseif ($value === NULL) {

                    $type = PDO::PARAM_NULL;

            } else {

                    $type = PDO::PARAM_STR;
            }

            $this->stmt->bindValue($param, $value, $type);
		}


		function execute(){ //executa la sentència ($stmt)
		//executar sentencia
			$this->stmt->execute();
		}

		function resultset(){  //extreu l'array de resultats de la sentència executada
		
			$result=$this->stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

		function single(){ /*???*/ /*result però amb una única incidència*/
			$result=$this->stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}

		function rowcont(){ /*???*//* retorna el valor de fileres afectades després d'un INSERT, UPDATE. o DELETE*/
			
			return $this->stmt->rowCount();
		}

		function lastInsertId(){ //retorna l'ultim ID com a string, de l'últim INSERT
			return $this->stmt->lastInsertId();
		}
		function beginTransaction(){
		/* Begin a transaction, turning off autocommit */
			$this->stmt->beginTransaction();	
		}
		function endTransaction(){
			$this->stmt->commit();
		}
		function cancelTransaction(){
			$this->stmt->rollBack();
		}

		function debugDumpParams(){
		// fa un return per depurar sentències preaparades
			$result=$this->stmt->debugDumpParams();
			return $result;
		}

	}