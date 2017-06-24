<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Admin extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
    }
	
	public function index()
	{
		    if(isset($_SESSION['admin'])){
		      redirect('admin/dashboard');
		    }
		 	$data['page_title']='Blood Bank-Login';
		    $this->load->view('login',$data);
		 
	}

	public function auth(){

	 //echo '<pre>'; print_r($_POST);
	 $email = $_POST['email'];
	 $pwd = md5($_POST['pwd']);
	 $sql = $this->db->query("SELECT * FROM admin WHERE email='$email' AND password='$pwd'");
	 $resl = $sql->result_array();
		 if(count($resl)==1){
		  $_SESSION['admin']=$resl;
		  $_SESSION['role']='admin';
		  redirect('admin/dashboard'); 
		 }else{
	      echo 'login failed';
		 }
	}

	function dashboard(){
		if(!isset($_SESSION['role'])){
		 redirect('admin/index');
		}
        $data['page_title']='Blood Bank-Dashboard';
        $data['page']='index';
		$this->load->view('common/template',$data);
	}
    
    function logout(){
     unset($_SESSION['admin']);
     session_destroy();
     redirect('admin/index');
    }
}

