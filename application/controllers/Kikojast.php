<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kikojast extends CI_Controller {
	
public function __construct (){
	parent::__construct();
	$this->load->model("location");
	}

	
	public function index ()
	{
		$res=$this->location->get_all();
		echo json_encode($res);
	}
	
	public function hame (){
$this->load->model("location");
	$res=$this->location->get_all();
//	echo json_encode($res);
//$res=array_reverse($res);
$array=array("points"=>$res);
	
	//$this->load->view("map",$array);
	echo json_encode($res);
	}
	public function afz (){
		$this->load->view("afz");
	}
	public function add (){
	$inpuit=$this->input->post();
//	print_r($inpuit);
$res=$this->location->insert();
echo "پیام با شماره زیر ذخیرهشد".$res;
	
	}
}
