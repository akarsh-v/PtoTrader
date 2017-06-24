<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();


class Doctors extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
		$dir = 'doctors';
		$this->load->library('session');
		define('Module', 'Doctors');
		define('TEMPLATE','doctors/doctor_template');
		define('imgfolder','doctor');
		define('TABLE', 'doctors');
		define('ID', 'id');
		define('VIEWFOLDER', 'doctors');
		
    }
	
	public function index()
	{
		    if(!isset($_SESSION['admin'])){
		      redirect('admin/dashboard');
		    }
		    $data['doctors']=$this->db->get('doctors')->result_array();
		 	$data['page_title']='Blood Bank-'.Module;
		 	$data['page_content']='view';
		 	$data['bred']='list';
		 	$data['page']=TEMPLATE;
		    $this->load->view('common/template',$data);
	}

	public function DoctorsAdd(){
		if(!isset($_SESSION['admin'])){
		redirect('admin/dashboard');
	    }
	    $data['page_title']='Blood Bank-'.Module;
	 	$data['page_content']='add';
	 	$data['bred']='Add';
	 	$data['page']=TEMPLATE;
	    $this->load->view('common/template',$data);
	}

	function test(){
		echo 'hello';
	}

	function add(){
	 $this->load->model('common/common_model');
	 $profile = $this->common_model->image_up($_FILES,imgfolder,$_POST['name']);
	 $data = array('name'=>$_POST['name'],
	 	           'phone'=>$_POST['phone'],
	 	           'email'=>$_POST['email'],
	 	           'univercity'=>$_POST['college'],
	 	           'specialaization'=>$_POST['specialization'],
	 	           'certificate_number'=>$_POST['cno'],
	 	           'is_bni_member'=>$_POST['bni'],
	 	           'experiance'=>$_POST['experiance'],
	 	           'course_done'=>$_POST['course'],
	 	           'profile_image'=>$profile,
	 	           'address'=>$_POST['address'],
	 	           'location'=>$_POST['location'],
	 	           'city'=>$_POST['city'],
	 	           'about'=>$_POST['about']
	 	           );
	$this->db->insert('doctors',$data);
	$this->session->set_flashdata('msg','Successfuly Created New Doctor'); 
	redirect('doctors/index','refresh');
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

	function update($p1){
		
		if(!isset($_SESSION['admin'])){
			redirect('admin/dashboard');
		}
		$data['id']=$p1;
		$data['doctors']= $this->db->get_where(TABLE,array('active'=>'1',ID=>$p1))->result_array();
	    $data['page_title']='Blood Bank-'.Module;
	 	$data['page_content']='update';
	 	$data['bred']='update';
	 	$data['page']=TEMPLATE;
	    $this->load->view('common/template',$data);
	    
	}

	function updateaction(){
	    //echo '<pre>'; print_r($_POST);
		//echo '<pre>'; print_r($_FILES);
		if($_FILES['img']['name']!=''){
		  $profile = $this->common_model->image_up($_FILES,imgfolder,$_POST['name']);
		}else{
			$profile=$_POST['oldimg'];
		}
		$data = array('name'=>$_POST['name'],
	 	           'phone'=>$_POST['phone'],
	 	           'email'=>$_POST['email'],
	 	           'univercity'=>$_POST['college'],
	 	           'specialaization'=>$_POST['specialization'],
	 	           'is_bni_member'=>$_POST['bni'],
	 	           'experiance'=>$_POST['experiance'],
	 	           'course_done'=>$_POST['course'],
	 	           'profile_image'=>$profile,
	 	           'address'=>$_POST['address'],
	 	           'location'=>$_POST['location'],
	 	           'city'=>$_POST['city'],
	 	           'about'=>$_POST['about']
	 	           );
		$this->db->where(ID,$_POST['id']);
        $this->db->update(TABLE,$data);
        $this->session->set_flashdata('msg','Successfuly updated'); 
	    redirect('doctors/index','refresh');
	}

}
