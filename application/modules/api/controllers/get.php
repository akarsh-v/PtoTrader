<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Get extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
		$this->load->model('api_model');
    }

    function doctors($p1=''){
      $key = $_GET['key'];
	  $api = $this->api_model->api_authentication($key);
	  if($api){
	  	if($p1!=''){
	  	  $doctors= $this->db->get_where('doctors',array('active'=>'1','id'=>$p1))->result_array();
	  	}else{
	  	  $doctors= $this->db->get_where('doctors',array('active'=>'1' ))->result_array();
	  	}
	  	//$json = json_encode($doctors);
	  	 $data[]=array('status'=>'ok','doctor_list'=>$doctors);	
	  }else{
	  	$data[]=array('error'=>'Invalid Api Key');
	  }
	  echo json_encode(array('result'=>$data));
    }

    function bloodbank($p1=''){
      $key = $_GET['key'];
	  $api = $this->api_model->api_authentication($key);
	  if($api){
	  	if($p1!=''){
	  	  $doctors= $this->db->get_where('bbank',array('active'=>'1','id'=>$p1))->result_array();
	  	}else{
	  	  $doctors= $this->db->get_where('bbank',array('active'=>'1' ))->result_array();
	  	}
	  	 
	  	//$json = json_encode($doctors);
	  	$data[]=array('status'=>'ok','bloodbanks'=>$doctors);
	  }else{
	  	$data[]=array('error'=>'Invalid Api Key');
	  }
	  echo json_encode(array('result'=>$data));
    }

    function bloodgroups($p1=''){
      $key = $_GET['key'];
	  $api = $this->api_model->api_authentication($key);
	  if($api){
	  	if($p1!=''){
	  	  $bloodgroups= $this->db->get_where('blood_groups',array('active'=>'1','id'=>$p1))->result_array();
	  	}else{
	  	  $bloodgroups= $this->db->get_where('blood_groups',array('active'=>'1' ))->result_array();
	  	}
	  	 
	  	//$json = json_encode($doctors);
	  	$data[]=array('status'=>'ok','bloodgroups'=>$bloodgroups);
	  }else{
	  	$data[]=array('error'=>'Invalid Api Key');
	  }
	  echo json_encode(array('result'=>$data));
    }


}