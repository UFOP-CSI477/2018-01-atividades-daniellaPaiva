<?php
namespace Model;
use Model\Database;
use Model\Test;
session_start();
class Procedure{
	protected $db = null;
	private $id;
	private $name;
	private $price;

	public function __construct(){
		$this->db = Database::getInstance()->getDB();
		$this->id = 0;
	}

	public function all(){
		$sql = "SELECT * FROM procedures ORDER BY name";
		return $this->db->query($sql);
	}

	public function insert($name, $price){
		$userId = $_SESSION['id'];
		$sql = "INSERT INTO procedures (name, price, user_id) VALUES ('$name', '$price', '$userId')";
		if($this->db->query($sql)){
        	return true;
      	} else { 
        	return false;
      	}  
	}

	public function updateOp($id, $price){
	  $sql = "UPDATE procedures SET price='$price' WHERE id='$id'";
      	if($this->db->query($sql)){
        	return true;
      	} else { 
        	return false;
      	}  
	}

	public function update($id,$name, $price){
	  $sql = "UPDATE procedures SET price='$price', name='$name' WHERE id='$id'";
      	if($this->db->query($sql)){
        	return true;
      	} else { 
        	return false;
      	}  
	}

	public function delete($id){
		$sql = "SELECT FROM tests INNER JOIN procedures ON tests.procedure_id = procedures.id";
			if($this->db->query($sql)){ 
				return 2; 
			}else{ 
				$sql2 = "DELETE FROM procedures WHERE id='$id'";
				if($this->db->query($sql2)){
					return 0;
				}else{ 
					return 1;
				}
			}
	}

}
