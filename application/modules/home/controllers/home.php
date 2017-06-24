<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('common/common_model');

    }
	
	public function index()
	{
	    $data['title']='Welcome To ProTrader';
		$data['page']='index';
		$this->load->view('common/template',$data);    	 
	}

	function blog($p1='',$p2='',$p3=''){
		if($p1=='' && $p2==''){
			$data['title']='Welcome To ProTrader - Blog';
			$data['page']='blog';
			$data['post']=$this->db->get('post')->result_array();
			$this->load->view('common/template',$data);	
		}else{
			$data['title']='Welcome To ProTrader -'.$p1;
			$data['page']='blog_view';
			$data['post']=$this->db->get_where('post',array('id'=>$p2))->result_array();
			$this->db->where('id',$p2);
			$this->db->update('post',array('views'=>$p3+1));
			$this->load->view('common/template',$data);

		}
		
	}

	function contactus(){
	    $data['title']='Welcome To ProTrader- Contact US';
		$data['page']='contact';
		$this->load->view('common/template',$data);
	}

	function Qrcode(){
		$this->load->library('ciqrcode');
		$vec = 'KA-35 EB-8515
		        Name:Gixxer Sf
		        Owner:Suresh';
		$params['data'] = $vec;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'tes.png';
		$this->ciqrcode->generate($params);

		echo '<img src="'.base_url().'tes.png" />';
	}

	
}

