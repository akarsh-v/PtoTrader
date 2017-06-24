<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Common extends CI_Controller {
   function __construct()
	{
		parent::__construct();	
    }

    function state(){
      $name = $_POST['id'];
      $state = $this->db->query("SELECT * FROM state WHERE country_id='101' AND name LIKE '%$name%'")->result_array();
      foreach($state as $s){ ?>
       <li onclick="stateselect('<?=$s['id']; ?>','<?=$s['name']; ?>')" role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$s['name']; ?></a></li>

      <?php }
    }

     function city($c=''){
      $name = $_POST['id'];
      if(!empty($c)){
      $state = $this->db->query("SELECT * FROM city WHERE state_id='$c' AND name LIKE '%$name%'")->result_array();
      foreach($state as $s){ ?>
       <li onclick="cityselect('<?=$s['id']; ?>','<?=$s['name']; ?>')" role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$s['name']; ?></a></li>

      <?php } 
      }else{
      	echo '<li>Please Select State</li>';
      }

    }

    function specialization(){
      $name = $_POST['id'];
      $state = $this->db->query("SELECT * FROM specializatin WHERE sub_category_name LIKE '%$name%'")->result_array();
      foreach($state as $s){ ?>
       <li onclick="specializationselect('<?=$s['sub_category_name']; ?>')" role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$s['sub_category_name']; ?></a></li>

      <?php }
    }

     function college(){
      $name = $_POST['id'];
      $state = $this->db->query("SELECT * FROM list_of_collage WHERE name LIKE '%$name%'")->result_array();
      foreach($state as $s){ ?>
       <li onclick="collegeselect('<?=$s['name']; ?>')" role="presentation"><a role="menuitem" tabindex="-1" href="#"><?=$s['name']; ?></a></li>

      <?php }
    }

    

}