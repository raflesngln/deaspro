<?php
 
class Login extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('Model_app');
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
            $this->load->view('login_area',$data);
			}
		else
			{
			redirect('dasboard');	
			}
	}
	
	//============ CEK LOGIN ====================
function cek_login() {

        $username =mysql_real_escape_string($this->input->post('username'));
		$password =mysql_real_escape_string($this->input->post('password'));
		$level =$this->input->post('level');
		$password=MD5($password);
		
		$result = $this->Model_app->login('pegawai',$username,$password);
  			if($result) {
            $sess_array = array();
            foreach($result as $row)
			 {
               //create the session
                $datasession = array(
                    'id' => $row->id_pegawai,
					'name' => $row->nm_pegawai,
                    'user' => $row->username,
                    'level' => $row->level,
                    'login_status'=>true,
                );
			
                $this->session->set_userdata($datasession);	
				 redirect('dasboard');				
            }
		}
		else
		 {
            // form validate false
			$data['message']='<font color="#FF0000">Username dan Password salah!!</font> ';
			$data['title']='login Area';
            $this->load->view('login_area',$data);
        }
}
//==============logout=================================
	function logout()
	{	
		if($this->session->userdata('level')=='asuransi')
		{	
		redirect('asuransi/logout');	
		}
		else
		{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login_status');
       // $this->session->set_flashdata('notif','YOU"VE LOGOUT THE SISTEM');
		session_destroy();
		redirect('login');	
		}
		
        
	}



}


