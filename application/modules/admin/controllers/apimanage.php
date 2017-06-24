<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Apimanage extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		define('TITLE', 'Api manage');
		define('controller', 'apimanage');
		define('view','apimanage');
		define('table','apis');
    }
	
	public function index(){
        if(!isset($_SESSION['admin'])){
	      redirect('admin/index');
	    }
	    $data['tbody']=$this->db->get(table)->result_array();
	    $data['thead']=array('No','Key', 'name', 'Hits', 'active', 'action');
	    $data['page_title']='Blood Bank- Blood Groups';
        $data['page']=view;
		$this->load->view('common/template',$data);
	    //echo '<pre>'; print_r($data['thead']);
	}

	function click($p1,$p2=''){
	 if($p1=='insert'){
	  $this->load->view(view.'/addform');
	 }
	 if($p1=='update'){
	  $data['form']=$this->db->get_where(table,array('id'=>$p2))->result_array();
	  $this->load->view(view.'/updateform',$data);
	 }
	 if($p1=='view'){
	  $data['form']=$this->db->get_where(table,array('id'=>$p2))->result_array();
	  $this->load->view(view.'/view',$data);	
	 }
	}

	function insert($p1=''){
		if($p1==''){
			$data = array('api_name'=>$_POST['name'],'api_key'=>$_POST['key']);
			$this->db->insert(table,$data);
			$this->session->set_flashdata('msg','Successfuly Created New '.TITLE.''); 
            redirect('admin/'.controller);
	    }else{
	    	$data = array('api_name'=>$_POST['name'],'api_key'=>$_POST['description']);
	    	$this->db->where('id',$p1);
            $this->db->update(table,$data);
            $this->session->set_flashdata('msg','Successfuly updated');
            redirect('admin/'.controller);
	    }
	}

	function active($p1,$p2){
		if($p2==1){
		  $data = array('active'=>'0');
		  $msg = 'Deactived Successfuly';
		}else{
		  $data = array('active'=>'1');
		  $msg = 'Actived Successfuly';
		}
	    $this->db->where('api_id',$p1);
        $this->db->update(table,$data);	
        $this->session->set_flashdata('msg',$msg); 
        echo $msg;
	}



}