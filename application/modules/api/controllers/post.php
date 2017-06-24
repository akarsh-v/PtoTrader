<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Post extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
		$this->load->model('api_model');
    }

    function new_user(){
    	$key = $_POST['api_key'];
	    $api = $this->api_model->api_authentication($key);
	    if($api){
	      $check = $this->db->get_where('donars',array('phone'=>$_POST['phone']))->result_array();
	      if(count($check)>0){
	        if($check[0]['otp_recived']!='' && $check[0]['otp_confirm']=='YES'){
	       	 $data[] = array('msg'=>'This number already exists');
	       	}else{
	       	 //echo '<pre>'; print_r($check);
	       	 $this->db->where('id',$check[0]['id']);
	       	 $this->db->delete('donars');
	       	 $otp = mt_rand(1,9999);
	      	 $user = array('name'=>$_POST['name'],
	      		          'email'=>$_POST['email'],
	      		          'phone'=>$_POST['phone'],
	      		          'password'=>md5($_POST['password']),
	      		          'gender'=>$_POST['gender'],
	      		          'otp_recived'=>$otp,
	      		          'otp_confirm'=>'NO');
	      	$this->db->insert('donars',$user);
	      	$data[]=array('msg'=>'Please verify Your Mobile Number', 'otp'=>$otp);
	       	}
          
	      }else{
	      	$otp = mt_rand(1000,9999);
	      	$user = array('name'=>$_POST['name'],
	      		          'email'=>$_POST['email'],
	      		          'phone'=>$_POST['phone'],
	      		          'password'=>md5($_POST['password']),
	      		          'gender'=>$_POST['gender'],
	      		          'otp_recived'=>$otp,
	      		          'otp_confirm'=>'NO');
	      	$this->db->insert('donars',$user);
	      	$data[]=array('msg'=>'Please verify Your Mobile Number', 'otp'=>$otp);
	      }
	  	}else{
          $data[] = array('msg'=>'Invalid Api key Used');  
	  	}
	  	$json = array('result'=>$data);
	  	echo json_encode($json);
    }

    function otp_verification(){
    	
    	$key = $_POST['api_key'];
	    $api = $this->api_model->api_authentication($key);
		if($api){
		   $phone = $_POST['phone'];
           $otp = $_POST['otp'];
           $check = $this->db->get_where('donars',array('phone'=>$phone,'otp_recived'=>$otp))->result_array();
	          if(count($check)>0){
		          $update = array('otp_confirm'=>'YES','active'=>'1');
		          $this->db->where('id',$check[0]['id']);
		          $this->db->update('donars',$update);
		          $data[] = array('msg'=>'Your Mobile Number Is successfuly verifyed');
	          }else{
	           $data[]=array('msg'=>'Invalid Otp');	
	          }
		}else{
		  $data[]=array('msg'=>'Invalid Api key Used');
		}
		$json = array('result'=>$data);
	  	echo json_encode($json);
    }

    function otp_resend(){
    	$key = $_POST['api_key'];
	    $api = $this->api_model->api_authentication($key);
	    if($api){
	    	$phone = $_POST['phone'];
            $check = $this->db->get_where('donars',array('phone'=>$phone))->result_array();
	        if($check){
	         $data[]=array('otp'=>$check[0]['otp_recived']);
	        }else{
	         $data[]=array('msg'=>'Time out');	
	        }

	    }else{
            $data[]=array('msg'=>'Invalid Api key Used');
	    }
	    $json = array('result'=>$data);
	  	echo json_encode($json);
    }

    function user_login(){
    	$key = $_POST['api_key'];
	    $api = $this->api_model->api_authentication($key);
	    if($api){
	       $phone = $_POST['phone'];
	       $pwd = md5($_POST['pwd']);
           $check = $this->db->get_where('donars',array('phone'=>$phone,'password'=>$pwd,'active'=>'1','otp_confirm'=>'YES'))->result_array();
           if(count($check)==1){
           	$data[]=array('UserInfo'=>$check);
           }else{
           	$data[]=array('msg'=>'Please check your phone or Password');
           }
	    }else{
           $data[]=array('msg'=>'Invalid Api key Used');
	    }
	    $json = array('result'=>$data);
	  	echo json_encode($json);
    }

    function user_profile_image_change(){
     echo '<pre>'; print_r($_FILES);
    }

   
 }
 ?>
