<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();


class Blog extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
		$dir = 'doctors';
		$this->load->library('session');
		$this->load->model('common/common_model');
		define('Module', 'Blog');
		define('TEMPLATE','blog/doctor_template');
		define('imgfolder','Blog');
		define('TABLE', 'post');
		define('TITLE','Blood Bank');
		define('ID', 'id');
		
    }

    function index(){
    	if(!isset($_SESSION['admin'])){
		  redirect('admin/dashboard');
		}
    	
    	$data['doctors']=$this->db->get(TABLE)->result_array();
		$data['page_title']=TITLE.'-'.Module;
		$data['page_content']='view';
		$data['bred']='list';
		$data['page']=TEMPLATE;
		$this->load->view('common/template',$data);
    }

    function add(){
    	if(!isset($_SESSION['admin'])){
		redirect('admin/dashboard');
	    }
	    $data['page_title']=TITLE.'-'.Module;
	 	$data['page_content']='add';
	 	$data['bred']='Add';
	 	$data['page']=TEMPLATE;
	    $this->load->view('common/template',$data);
    }

    function addaction(){
	 $profile = $this->common_model->image_up($_FILES,imgfolder,$_POST['name']);
	 $data = array('title'=>$_POST['name'],
	 	           'description'=>$_POST['description'],
	 	           'posted_by'=>$_SESSION['admin'][0]['id'],
	 	           'image'=>$profile,
	 	           'active'=>'1'
	 	           );
	$this->db->insert(TABLE,$data);
	$this->session->set_flashdata('msg','Successfuly Created New Doctor'); 
	redirect('blog/index','refresh');
	}

	function delete($p1){
        $this->db->where(ID, $p1);
        $this->db->delete(TABLE);
        echo '<h4 style="color:green">Successfuly Deleted<h4>';
	}

	function view($p1){
	 $data['doctors']= $this->db->get_where(TABLE,array('active'=>'1',ID=>$p1))->result_array();
	 $this->load->view('viewdoctor',$data);
	}

	function active($p1,$p2){
		if($p2==1){
		  $data = array('active'=>'0');
		  $msg = 'Deactived Successfuly';
		}else{
		  $data = array('active'=>'1');
		  $msg = 'Actived Successfuly';
		}
	    $this->db->where(ID,$p1);
        $this->db->update(TABLE,$data);	
        $this->session->set_flashdata('msg',$msg); 
	}
	
}