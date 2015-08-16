<?php
 
class Dasboard extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('model_app');
session_start();
}

/////	
	function index()
	{
		//$session=isset($_SESSION['user']) ? $_SESSION['user']:'';
		   if($this->session->userdata('login_status') != TRUE )
	   {
			$data['title']='Login Area';
			$data['message']='Please Login First';
            redirect('login');
			}
		else
		{
		$data=array(
		'judul'=>'Informasi umum dan penting',
		'view'=>'welcome'
		);	
		$this->load->view('home',$data);
		}
				
	}	
	
	
	
	
	
}