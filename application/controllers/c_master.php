<?php
 
class C_master extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('m_master');
session_start();
}

/////	
	function index()
	{
		   if($this->session->userdata('login_status') != TRUE )
	   {
			$data['title']='Login Area';
            $this->load->view('login_area',$data);
			}
		else
			{
				if($this->session->userdata('level')=='admin')
				{
					redirect('dasboard');
				}
		}
	}
//------------view all admin-----------------------------------
function tambah_admin(){
        $data=array(
            'title'=>'Data administrator',
			'view'=>'master/tambah_admin'
        );
        
		$this->load->view('home',$data);
    }
//------------view all admin-----------------------------------
function tampil_admin(){
        $data=array(
            'title'=>'Data administrator',
            'data_admin'=>$this->m_master->selectall('admin'),
			'view'=>'master/v_admin'
        );
        
		$this->load->view('home',$data);
    }
//===========GFORM Password===================
	function simpan_admin()
{		
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
	$this->form_validation->set_rules('pass','pass','required|trim|xss_clean');
	$this->form_validation->set_rules('telp','telp','required|trim|xss_clean|integer');
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
			'message'=>'Data Tidak lengkap atau tidak valid',
			'view'=>'master/tambah_admin',
			);
			$this->load->view('home',$data);
		}
		else
		{
			$datamaster= array(
				'id_admin'	=>'',
				'nm_admin'	=>$this->input->post('nama'),
				'username'	=>$this->input->post('usernm'),
				'password'	=>md5($this->input->post('pass')),
				'telp'	=>$this->input->post('telp'),
				'level'	=>'admin'
			);
			$this->m_master->insert('admin',$datamaster);
			
			redirect('c_master/tampil_admin');	
		} 
	}
}
//------------view all admin-----------------------------------
function hapus_admin(){
	$kode=$this->uri->segment(3);
    $this->m_master->delete_data('admin','id_admin',$kode);
        
	redirect('c_master/tampil_admin');
    }

//------------view all admin-----------------------------------
function tambah_asuransi(){
        $data=array(
            'title'=>'tambah Asuransi',
			'view'=>'master/tambah_asuransi'
        );
        
		$this->load->view('home',$data);
    }
//------------view all admin-----------------------------------
function tampil_asuransi(){
        $data=array(
            'title'=>'Data asuransi',
            'det_asuransi'=>$this->m_master->getdata("asuransi",""),
			'data_asuransi'=>$this->m_master->getdata("asuransi",""),
			'view'=>'master/v_asuransi'
        );
        
		$this->load->view('home',$data);
    }
//===========GFORM Password===================
	function simpan_asuransi()
{		
$usernm=$this->input->post('usernm');
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
	$this->form_validation->set_rules('pass','pass','required|trim|xss_clean');
	$this->form_validation->set_rules('telp','telp','required|trim|xss_clean|integer');
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
			'message'=>'Data Tidak lengkap atau tidak valid',
			'view'=>'master/tambah_asuransi',
			);
			$this->load->view('home',$data);
		}
		else
		{
			$cek=$this->m_master->select_id('asuransi','username',$usernm);
			if($cek){
				echo'<script type="text/javascript"> alert("Username sudah ada di database, coba cek kembali data asuransi"); history.back(); </script>';
			}
			else
			{
			$datamaster= array(
				'id_asuransi'	=>'',
				'nm_asuransi'	=>$this->input->post('nama'),
				'almt_asuransi'	=>$this->input->post('alamat'),
				'telp_asuransi'	=>$this->input->post('telp'),
				'username'	=>$this->input->post('usernm'),
				'password'	=>md5($this->input->post('pass')),
				'level'	=>'asuransi'
			);
			$this->m_master->insert('asuransi',$datamaster);
			}
			redirect('c_master/tampil_asuransi');	
		} 
	}
}
//================update asuransi=======================================
function update_asuransi()
{
	$id=$this->input->post('idasuransi');
	
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
	'message'=>'<font color="#FF0000">Gagal simpan data, Data kurang lengkap</font>',
	'dtasuransi'=>$this->m_master->select_id('asuransi','id_asuransi',$id),
	'view'=>'master/edit_asuransi'
		);
			$this->load->view('home',$data);
		}
		else
		{
				$dataasuransi= array(
				'nm_asuransi'	=>$this->input->post('nama'),
				'almt_asuransi'	=>$this->input->post('alamat'),
				'telp_asuransi'	=>$this->input->post('telp'),
				'username'	=>$this->input->post('usernm'),
			);
			$this->m_master->update_data('asuransi','id_asuransi',$id,$dataasuransi);
			redirect('c_master/tampil_asuransi');
		 } 
	}
}

//------------delete data----------------------------------
function hapus_asuransi(){
	$kode=$this->uri->segment(3);
    $this->m_master->delete_data('asuransi','id_asuransi',$kode);
        
	redirect('c_master/tampil_asuransi');
    }
//===========form edit asuransi====================
function edit_asuransi()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit data asuransi',
	'dtasuransi'=>$this->m_master->select_id('asuransi','id_asuransi',$id),
	'view'=>'master/edit_asuransi'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//================update data=======================================
function update_pegawai()
{
	$id=$this->input->post('idpegawai');
	$level=$this->input->post('level');
	
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
	'message'=>'<font color="#FF0000">Gagal simpan data, Data kurang lengkap</font>',
	'pegawai'=>$this->m_master->select_id('pegawai','id_pegawai',$id),
	'view'=>'master/edit_pegawai'
		);
			$this->load->view('home',$data);
		}
		else
		{
			
			$data= array(
			'id_pegawai'	=>$id,
				'nm_pegawai'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
			);
			if($level=='surveyor')
			{
				$surveyor= array(
		
				'nm_surveyor'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
			);
			$this->m_master->update_data('surveyor','id_pegawai',$id,$surveyor);
			}
			elseif($level=='manager')
			{
			$manager= array(
	
				'nm_manager'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
			);
			$this->m_master->update_data('manager','id_pegawai',$id,$manager);				
			}
		
			$this->m_master->update_data('pegawai','id_pegawai',$id,$data);
			redirect('c_master/tampil_pegawai');
		}
	}
}
//--------for paging limit------------------------------------------------------
	  function tampil_pegawai()
	{	
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data pegawai';
		$data['kodepg']=$this->m_master->getKodepg();
		//$data['customer'] = $this->m_master->selectall('surveyor');
		$data['pegawai'] = $this->m_master->tampil_semua_pegawai($limit,$offset);
		$tot_hal = $this->m_master->hitung_isi_tabel('pegawai','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'c_master/tampil_pegawai/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='master/v_pegawai';
			 $this->load->view('home',$data);
		
	}
//------------view all admin-----------------------------------
function tambah_pegawai(){
        $data=array(
			'kodepg'=>$this->m_master->getKodepg(),
            'title'=>'tambah tambah_pegawai',
			'view'=>'master/tambah_pegawai'
        );
        
		$this->load->view('home',$data);
    }
//===========save===================
	function simpan_pegawai()
{	
$id=$this->input->post('id');	
$level=$this->input->post('level');
$usernm=$this->input->post('usernm');
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
	$this->form_validation->set_rules('pass','pass','required|trim|xss_clean');
	$this->form_validation->set_rules('telp','telp','required|trim|xss_clean|integer');
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
	$this->form_validation->set_rules('level','level','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
			'message'=>'<font color="#FF0000">'.'Data Tidak lengkap/tidak valid,Mohon lengkapi dengan benar'.'</font>',
			'kodepg'=>$this->m_master->getKodepg(),
			'view'=>'master/tambah_pegawai',
			);
			$this->load->view('home',$data);
		}
		else
		{
			$cek=$this->m_master->select_id('pegawai','username',$usernm);
			if($cek){
				echo'<script type="text/javascript"> alert("Username sudah ada di database, coba cek kembali data"); history.back(); </script>';
			}
			else
			{
			if($level=='surveyor'){
			$datalevel= array(
				'id_surveyor'	=>'',
				'id_pegawai'	=>$id,
				'nm_surveyor'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
				'password'	=>md5($this->input->post('pass')),
				'level'	=>'surveyor'
			);
			$this->m_master->insert('surveyor',$datalevel);
			}
			elseif($level=='manager'){
			$datalevel= array(
				'id_manager'	=>'',
				'id_pegawai'	=>$id,
				'nm_manager'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
				'password'	=>md5($this->input->post('pass')),
				'level'	=>'manager'
			);
			$this->m_master->insert('manager',$datalevel);	
			}
			$datamaster= array(
				'id_pegawai'	=>$id,
				'nm_pegawai'	=>$this->input->post('nama'),
				'almt_pegawai'	=>$this->input->post('alamat'),
				'telp_pegawai'	=>$this->input->post('telp'),
				'email_pegawai'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
				'password'	=>md5($this->input->post('pass')),
				'level'	=>$level
			);
			$this->m_master->insert('pegawai',$datamaster);
			}
			redirect('c_master/tampil_pegawai');	
		} 
	}
}
//------------delete data----------------------------------
function hapus_pegawai(){
	$id=$this->uri->segment(3);
	//$cek=$this->m_master->select_id('pegawai','id_pegawai',$id);
	$this->m_master->delete_data('pegawai','id_pegawai',$id);
	$this->m_master->delete_data('surveyor','id_pegawai',$id);
	$this->m_master->delete_data('manager','id_pegawai',$id);

	redirect('c_master/tampil_pegawai');
 }
//===========form edit asuransi====================
function edit_pegawai()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit data Pegawai',
	'pegawai'=>$this->m_master->select_id('pegawai','id_pegawai',$id),
	'view'=>'master/edit_pegawai'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//================update asuransi=======================================
function update_surveyor()
{
	$id=$this->input->post('idsurveyor');
	
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('nama','nama','required|trim|xss_clean');
	$this->form_validation->set_rules('usernm','usernm','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
	'message'=>'<font color="#FF0000">Gagal simpan data, Data kurang lengkap</font>',
	'dtasuransi'=>$this->m_master->select_id('surveyor','id_surveyor',$id),
	'view'=>'master/edit_surveyor'
		);
			$this->load->view('home',$data);
		}
		else
		{
				$datasurveyor= array(
				'nm_surveyor'	=>$this->input->post('nama'),
				'almt_surveyor'	=>$this->input->post('alamat'),
				'telp_surveyor'	=>$this->input->post('telp'),
				'email_surveyor'=>$this->input->post('email'),
				'username'	=>$this->input->post('usernm'),
			);
			$this->m_master->update_data('surveyor','id_surveyor',$id,$datasurveyor);
			redirect('c_master/tampil_surveyor');
		 } 
	}
}

	function logout()
	{	
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR INVITE THIS WEB');
        redirect('login');
	}


}


