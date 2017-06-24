<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 

class Reports_model extends CI_Model
{
  public function __construct()
	{
		parent::__construct();
	}

  public function getcurrentaccessbility(){
  	$q = $this->db->query("SELECT * FROM current_accessibility LIMIT 1");
  	foreach($q->result_array() as $c){
  	  $data['name']=$c['name'];
  	  $data['lat']=$c['lat'];
  	  $data['lng']=$c['lng'];
  	}
  	return $data;
  }

  public function distance_time_caluclate($current,$pin){
		$from = $current;
		$to = $pin;
        $from = urlencode($from);
        $to = urlencode($to);
        $data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
        $data1 = json_decode($data,true);
        $result['distance'][] = $data1['rows'][0]['elements'][0]['distance']['text'];
	    $result['duration'][] = $data1['rows'][0]['elements'][0]['duration']['text'];	
        return $result;	
	}

function current_report($clat,$clng){
  	    $latc=$clat;
		$lngc = $clng;
		$dat = $this->admin_model->allselect("SELECT * FROM employee_location");
		foreach($dat as $d){
		 $id=$d['eid'];
		 $lat[] = $this->admin_model->allselect("SELECT * FROM location_lat_lan WHERE employee_loc_id='$id'");
		}
		foreach($lat as $l){
		 $lat = $l[0]['lat'];
		 $lng = $l[0]['lng'];
		 $theta = $lngc - $lng;
         $dist = sin(deg2rad($latc)) * sin(deg2rad($lat)) +  cos(deg2rad($latc)) * cos(deg2rad($lat)) * cos(deg2rad($theta));
         $dist = acos($dist);
         $dist = rad2deg($dist);
         $miles = $dist * 60 * 1.1515;
         $inkm = ($miles*1.60934);
         $km=number_format((float)$inkm, 2, '.', '');
         $distanc1[] = array('lid'=>$l[0]['employee_loc_id'],'distance'=>$km);
		}
	   $data = $distanc1;
  	   $result['0-3']="";
  	   $result['3-5']="";
  	   $result['5-10']="";
  	   $result['10-15']="";
  	   $result['15-20']="";
  	   $result['20+']="";
		foreach($data as $d){
		  $distance = str_replace("km", "", $d['distance']);
		  if($distance > 0 && $distance < 3){
		  	$result['0-3'][]=$d['distance'];
		  }

		  if($distance > 3 && $distance < 5){
		  	$result['3-5'][]=$d['distance'];
		  }

		  if($distance > 5 && $distance < 10){
		  	$result['5-10'][]=$d['distance'];
		  }

		  if($distance > 10 && $distance < 15){
		  	$result['10-15'][]=$d['distance'];
		  }

		  if($distance > 15 && $distance < 20){
		  	
		  	 $result["15-20"][]=$d['distance'];
		   
		  }
 
		  if($distance > 20){
		  	
		  		$result['20+'][]=$d['distance'];
		  
		  }
		  
		}
        
		$reportsbykm = array('0-3KM'=>count($result['0-3']),
			                 '3-5KM'=>count($result['3-5']),
			                 '5-10KM'=>count($result['5-10']),
			                 '10-15KM'=>count($result['10-15']),
			                 '15-20KM'=>count($result['15-20']),
			                 '20+KM'=>count($result['20+'])
			                 );
		
		return $reportsbykm;
  }

  function current_report_by_time($clat,$clng){
  	    $latc=$clat;
		$lngc = $clng;
		$dat = $this->admin_model->allselect("SELECT * FROM employee_location");
		foreach($dat as $d){
		 $id=$d['eid'];
		 $lat[] = $this->admin_model->allselect("SELECT * FROM location_lat_lan WHERE employee_loc_id='$id'");
		}
		foreach($lat as $l){
		 $lat = $l[0]['lat'];
		 $lng = $l[0]['lng'];
		 $theta = $lngc - $lng;
         $dist = sin(deg2rad($latc)) * sin(deg2rad($lat)) +  cos(deg2rad($latc)) * cos(deg2rad($lat)) * cos(deg2rad($theta));
         $dist = acos($dist);
         $dist = rad2deg($dist);
         $miles = $dist * 60 * 1.1515;
         $inkm = ($miles*1.60934);
         $km=number_format((float)$inkm, 2, '.', '');
         $distanc1[] = array('lid'=>$l[0]['employee_loc_id'],'distance'=>$km);
		}
        $sql = $this->db->query("SELECT * FROM kmvalue WHERE active='1'");
        $avrtime = $sql->result_array();
		$avgtime = $avrtime[0]['km'];
		foreach($distanc1 as $time){
			$timetaken[]=array('distane'=>$time['distance'],'time'=>round($time['distance']*$avgtime));
		}
		$timetake='';
		foreach($timetaken as $t){
			 if($t['time'] > 0 && $t['time'] < 10){
              $timetake['0-10min'][]=$t['time'];
			 }
			 if($t['time'] > 10 && $t['time'] < 20){
              $timetake['10-20min'][]=$t['time'];
			 }
			 if($t['time'] > 20 && $t['time'] < 30){
              $timetake['20-30min'][]=$t['time'];
			 }
			 if($t['time'] > 30 && $t['time'] < 40){
              $timetake['30-40min'][]=$t['time'];
			 }
			 if($t['time'] > 40 && $t['time'] < 50){
              $timetake['40-50min'][]=$t['time'];
			 }
			 if($t['time'] > 50 && $t['time'] < 60){
              $timetake['50-60min'][]=$t['time'];
			 }
			 if($t['time'] > 60){

              $timetake['1hr'][]=$t['time'];
			 }
		}

		return $timetotrave = array('0-10min'=>count($timetake['0-10min']),
			                        '10-20min'=>count($timetake['10-20min']),
			                        '20-30min'=>count($timetake['20-30min']),
			                        '30-40min'=>count($timetake['30-40min']),
			                        '40-50min'=>count($timetake['40-50min']),
			                        '50-60min'=>count($timetake['50-60min']),
			                        'above 1hr'=>count($timetake['1hr'])
			                        );
	}

	/*function convertToHoursMins($time, $format = '%02d:%02d') {
	    if ($time < 1) {
	        return;
	    }
	    $hours = floor($time / 60);
	    $minutes = ($time % 60);
	    return sprintf($format, $hours, $minutes);
    }*/

    function map_data(){
    	$this->db->select('*');
		$this->db->from('location_lat_lan');
		$this->db->join('employee_location', 'location_lat_lan.employee_loc_id = employee_location.eid');
		$query = $this->db->get();
		$i=1;
		
		foreach($query->result_array() as $q){
		 
			 if($i==count($query->result_array())){
			 	echo "['".$q['location']."',".$q['lat'].",".$q['lng']."]";
			 }else{
			 	echo "['".$q['location']."',".$q['lat'].",".$q['lng']."],";
			 }
		    
		     $i++; 
		} 
			
	}

	function zone($name){
    	$this->db->select('*');
		$this->db->from('location_lat_lan');
		$this->db->join('employee_location', 'location_lat_lan.employee_loc_id = employee_location.eid');
		$this->db->where('employee_location.zone',$name);
		$this->db->order_by("location_lat_lan.lat", "asc");
		//$this->db->limit(50);
		$query = $this->db->get();
		$i=1;
		
		foreach($query->result_array() as $q){
		 
			 if($i==count($query->result_array())){
			 	echo "{'lat':".$q['lat'].",'lng':".$q['lng']."}";
			 }else{
			 	echo "{'lat':".$q['lat'].",'lng':".$q['lng']."},";
			 }
		    
		     $i++; 
		} 
			
	}
    

}

