<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$sender;$lat;$lon;$id;$time;
	class Location extends CI_Model {   
    public function __construct() {        
 parent::__construct();     }  
   public function get($id){         
return $this->db->get_where('locations', array('id' => $id))->row();     } 
    public function get_all() {        
 $query = $this->db->get('locations');         return $query->result_array();     }   
  public function insert() {      
      $this->time = time();      $this->lat=$_POST["lat"];
	$this->lon=$_POST["lon"];
  $this->time= time();         $this->sender = $_POST["sender"];   $this->db->insert('locations', $this);    
return $this->db->insert_id();
 }  
   public function update($id) {       
	$this->lat=$_POST["lat"];
	$this->lon=$_POST["lon"];
  $this->time= time();         $this->sender = $_POST["sender"];         $this->time= time();         $this->db->update('locations', $this, array('id' => $id));     }    
 public function delete($id){       
  $this->db->delete('locations', array('id' => $id));      } }