<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 

class Admin_model extends CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
	}
   
	public function get_all_zone(){
	 $sql = $this->db->query('SELECT DISTINCT within FROM employee_location');
	 return $sql->result_array();
	}

	public function get_all(){
	 $sql = $this->db->query('SELECT * FROM employee_location');
	 return count($sql->result_array());
	}

	public function count_emmployee_by_zone($zone){
		$sql = $this->db->query("SELECT * FROM employee_location WHERE within='$zone'");
	    return count($sql->result_array());
	}

	public function count_emmployee_by($zone){
		$sql = $this->db->query("SELECT * FROM employee_location WHERE zone='$zone'");
	    return count($sql->result_array());
	}

	public function allselect($sql){
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function delete($id,$table_id,$table){
		$this->db->where($table_id, $id);
        $this->db->delete($table);
	}

	function update($tid,$gid,$table,$data){
        $this->db->where($tid,$gid);
        $this->db->update($table,$data);
	}

	function barchat(){
	  $sql = $this->db->query("SELECT * FROM within");
	  $within = $sql->result_array();
	  foreach($within as $w){
	  	$name = $w['name'];
	  	$sql1 = $this->db->query("SELECT * FROM employee_location WHERE within='$name'");
	    $te = count($sql1->result_array());
	  	$data[]=array('name'=>$w['name'],'totalemployees'=>$te);
	  }
	  
	  echo json_encode($data);
	}

	function get_locations(){
		$sql = $this->db->query("SELECT location FROM location");
        $array = $sql->result_array();
        foreach($array as $a){
         $array1[]=$a['location'];
        }
        return $array1;
	}

	function get_city($city){
		$sql = $this->db->query("SELECT name FROM $city");
        $array = $sql->result_array();
        foreach($array as $a){
         $array1[]=$a['name'];
        }
        return $array1;
	}


}

?>