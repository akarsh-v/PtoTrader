<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 

class Api_model extends CI_Model
{
	
	
	public function __construct()
	{
		parent::__construct();
	}
 

    function api_authentication($key){
    	$data['api']=$this->db->get_where('apis', array('api_key'=>$key, 'active'=>'1'))->result_array();
    	if(count($data['api'])==1){
         $hits = $data['api'][0]['api_hits']+1;
         $this->db->where('api_key',$key);
         $this->db->update('apis',array('api_hits'=>$hits));
         return TRUE;
    	}else{
    	 return FALSE;
    	}
    }
}

