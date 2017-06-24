<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Sales extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		define('TITLE', 'Blood Groupp');
		define('controller', 'Bloodgroup');
		define('view','sales');
		define('table','sales');
    }
	
	public function index(){
        if(!isset($_SESSION['admin'])){
	      redirect('admin/index');
	    }
	    $data['tbody']=$this->db->get(table)->result_array();
	    $data['thead']=array('No',
	    	                 'Transcation Number',
	    	                 'Seller', 
	    	                 'Buyername', 
	    	                 'Buyer phone',
	    	                 'Buyer address',
	    	                 'Buyer Email',
	    	                 'satutus',
	    	                 'date',
	    	                 'action');
	    $data['page_title']=TITLE;
        $data['page']='sales';
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
			$data = array('buyer_name'=>$_POST['name']);
			$this->db->insert(table,$data);
			$this->session->set_flashdata('msg','Successfuly Created New '.TITLE.''); 
			
	    }else{
	    	/*$data = array('group_name'=>$_POST['name'],'shot_description'=>$_POST['description']);
	    	$this->db->where('id',$p1);
            $this->db->update(table,$data);
            $this->session->set_flashdata('msg','Successfuly updated');
            redirect('admin/'.controller);*/
	    }
	}



}