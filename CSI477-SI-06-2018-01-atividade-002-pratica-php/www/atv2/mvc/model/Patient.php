<?php

namespace Model;

use PDO;
use Model\Database;

class Patient {

	protected $db = null;

	public function __construct() {
		$this->db = Database::getInstance()->getDB();
	}

	public function all() {
		session_start();
		$user_id = $_SESSION['usuario'];

		try{
			$sql = "SELECT  tests.id, tests.date_test, procedures.name, procedures.price FROM tests
					INNER JOIN procedures ON tests.procedure_id = procedures.id  
					WHERE tests.user_id=:user_id ORDER BY tests.date_test DESC, procedures.name ASC";
			$result = $this->db->prepare($sql);
			$result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$result->execute();

			return $result->fetchAll(PDO::FETCH_ASSOC);

		} catch(PDOException $e){
			echo "ERROR" . $e->getMessage();
		}

	}

	function formatarData($date){
      $rData = date('Y-m-d',strtotime($date));
      return $rData;
   }

	public function salvar($procedure_id, $date){
		session_start();
		$date_test = Patient::formatarData($date);
		$user_id = $_SESSION['usuario'];
		try {
			$sql = "INSERT INTO tests (user_id, procedure_id, date_test)
			VALUES (:user_id, :procedure_id, :date_test)";

			$result = $this->db->prepare($sql);
			$result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
			$result->bindParam(':procedure_id', $procedure_id, PDO::PARAM_INT);
			$result->bindParam(':date_test', $date_test, PDO::PARAM_STR);
			return $result->execute();
		} catch (PDOException $e) {
			echo "ERROR" . $e->getMessage();
		}
	}

	public function deletar($linha){

	}

}
