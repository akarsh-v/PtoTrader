<?php 

 class Common_model extends CI_model{

 	function image_up($files,$path,$name){
      $imagename = $files['img']['name'];
      $type = explode('.',$imagename);
      $source = $files['img']['tmp_name'];
      $ext = end((explode(".", $imagename)));
      $num = mt_rand();
      $dname = str_replace(' ', '-', $name);
      $newname =  'bloodbank-'.$path.'-'.$dname.'_'.$num.'.'.$ext;
      $target = "images/".$path."/".$newname;
      $imageuploded=$target;
      move_uploaded_file($source, $target);
      return $imageuploded;
    }

    function tabledata($table){
      $data=$this->db->get($table)->result_array();
      return $data;
    }

    function getrecentblog(){
      $data = $this->db->query("SELECT * FROM post ORDER BY id DESC")->result_array();
      return $data;
    }
 }