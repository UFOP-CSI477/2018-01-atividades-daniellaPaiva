<?php
namespace Model;
use Model\Database;
class Test{
	protected $db;

	public function __construct(){
		$this->db = Database::getInstance()->getDB();
	}

	public function all(){
		$sql = "SELECT * FROM tests ORDER BY 'date'";
		return $this->db->query($sql);
	}

	public function insert($date, $procedure){
	  $userId = $_SESSION['id'];
      $sql = "INSERT into tests(user_id, procedure_id, date) VALUES('$userId', '$procedure', '$date')";
      if($this->db->query($sql)){
        return true;
      } else { 
        return false;
      }  
      
    }

    public function update($id, $procedure, $date){
      $sql = "UPDATE tests SET date='$date', procedure_id='$procedure' WHERE id='$id'";
      if($this->db->query($sql)){
        return true;
      } else { 
        return false;
      }  
      
    }

    public function remove($id){
      $sql = "DELETE FROM tests WHERE id='$id'";
      if($this->db->query($sql)){
        return true;
      } else { 
        return false;
      }  
      
    }
}
