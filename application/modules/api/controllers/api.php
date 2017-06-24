<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Api extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
		$this->load->model('api_model');
    }

	public function apitest()
	{
		  //$key = md5('admin');
		  $key = $_GET['key'];
		  $api = $this->api_model->api_authentication($key);
	      if($api){
	      	echo 'api successfuly Working';
	      	echo $key;
	      }else{
	      	echo 'please provide valid api key';
	      }
	}

	

}

