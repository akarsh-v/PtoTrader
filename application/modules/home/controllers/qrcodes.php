<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Qrcodes extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('common/common_model');
		$this->load->library('ciqrcode');

    }

    function index(){
     //echo '<pre>'; print_r($_POST);
     $qrcode1 = md5($_POST['v_name'].$_POST['c_num'].$_POST['e_num']);
     $refnum = 'VID'.uniqid();
     $data = $this->db->get_where('vehicleinfo',array('qrcode'=>$qrcode1))->result_array();
	     if(count($data)==0){     
	     	$vdata = array('ref_id'=>$refnum,
	     	            'qrcode'=>$qrcode1,
	     	            'vehicle_name'=>$_POST['v_name'],
	     	            'owner_name'=>$_POST['o_name'],
	     	            'vehicle_type'=>$_POST['v_type'],
	     	            'eng_no'=>$_POST['e_num'],
	     	            'ch_no'=>$_POST['c_num']);
	        $this->db->insert('vehicleinfo',$vdata);
	        
			$vec = base_url().'vehicleinformation/'.$qrcode1.'';
			$params['data'] = $vec;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.'/qrcodes/'.$qrcode1.'.png';
			$this->ciqrcode->generate($params);
			echo 'success';
		 }else{
		 	echo 'This vechicle Alredy Registerd';
		 }
    }
	
	function vehicleinformation($p1){
	  $data = $this->db->get_where('vehicleinfo',array('qrcode'=>$p1))->result_array();
	  echo '<table>
	         <tr>
	          <th>vehicle ID</th>
	          <th>Vehicle Name</th>
	          <th>Engine Number</th>
	          <th>Chassie Number</th>
	         </tr>
	         <tr>
	          <td>'.$data[0]['ref_id'].'</td>
	          <td>'.$data[0]['vehicle_name'].'</td>
	          <td>'.$data[0]['eng_no'].'</td>
	          <td>'.$data[0]['ch_no'].'</td>
	         <tr>
	        </table>';
	}

	
}

