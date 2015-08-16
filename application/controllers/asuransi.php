<?php
 
class Asuransi extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('Model_app');
$this->load->model('m_lhs');
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
            $this->load->view('asuransi/login_asuransi',$data);
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
		
		$result = $this->Model_app->login('asuransi',$username,$password);
  			if($result) {
            $sess_array = array();
            foreach($result as $row)
			 {
               //create the session
                $datasession = array(
                    'id' => $row->id_asuransi,
					'name' => $row->nm_asuransi,
                    'user' => $row->username,
                    'level' => $row->level,
                    'login_status'=>true,
                );
		$data=array(
		'judul'=>'Insuranse Page',
		'view'=>'asuransi/welcome'
		);	
	
             $this->session->set_userdata($datasession);
			 $this->load->view('home',$data);				
            }
		}
		else
		 {
            // form validate false
			$data['message']='<font color="#FF0000">Username dan Password salah!!</font> ';
			$data['title']='login Area';
            $this->load->view('asuransi/login_asuransi',$data);
        }
}
// add upload
    function upload_surat_kuasa(){
		if($this->session->userdata('login_status')== TRUE )
		{
        $data['view']=('asuransi/upload_file');
        $this->load->view('home',$data);
     }
	}
//--------list menurut asuransi yang login------------------------------------------------------
	  function list_surat_kuasa()
	{	
	$idasuransi=$this->session->userdata('id');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Surat Kuasa';
		$data['list'] = $this->model_app->tampil_semua_sk($limit,$offset,"where b.id_asuransi=$idasuransi");
		$tot_hal = $this->model_app->hitung_isi_tabel('data_upload','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/list_surat_kuasa/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/list_data';
			 $this->load->view('home',$data);
		
	}
//--------for paging limit------------------------------------------------------
	  function list_surat_kuasa_all()
	{	
	$idasuransi=$this->session->userdata('id');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Surat Kuasa';

		$data['list'] = $this->model_app->tampil_semua_sk($limit,$offset,'');
		$tot_hal = $this->model_app->hitung_isi_tabel('data_upload','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/list_surat_kuasa/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/admin/list_data';
			 $this->load->view('home',$data);
		
	}

//-simpan upload
    function do_upload(){
		
		$idasuransi=$this->session->userdata('id');
		$folder='./asset/uploads/';
	foreach($_FILES['myfile']['name'] as $key => $val){
        $name = $_FILES['myfile']['name'][$key];
		$namafile =$_POST['namafile'][$key];
        $tmp  = $_FILES['myfile']['tmp_name'][$key];
        if(trim($name)!=''){
			
			$new_name = date('YmdHis').'-'.$name; //rename file
			
			$datafile=array(
			'id_upload'=>$this->input->post('no'),
			'nm_file'=>$namafile,
			'file'=>$new_name
			);
			$this->model_app->insert('file_upload',$datafile);
	
            if(move_uploaded_file($tmp,$folder.$new_name)){ //proses upload
			
			}
		}
	}
	$dataupload=array(
			'id_upload'=>$this->input->post('no'),
			'id_asuransi'=>$idasuransi,
			'keterangan'=>$this->input->post('ket'),
			'insertime'=>date('Y-m-d:His')
			);
			$this->model_app->insert('data_upload',$dataupload);
			redirect('asuransi/list_surat_kuasa');

}
function edit_surat_kuasa(){
	$id=$this->uri->segment(3);
	$data=array(
	'list'=>$this->model_app->selectedid('data_upload',"where a.id_upload='$id'"),
	'view'=>'asuransi/edit_upload'
	);

	 $this->load->view('home',$data);
 }
function detail_surat_kuasa(){
	$id=$this->uri->segment(3);
	$data=array(
	'list'=>$this->model_app->detail_kuasa("where b.id_upload='$id'"),
	'dt'=>$this->model_app->selectedid('data_upload',"where a.id_upload='$id'"),
	'view'=>'asuransi/detail_upload'
	);

	 $this->load->view('home',$data);
 }

 function hapus_surat_kuasa(){
	$level=$this->session->userdata('level');
	$id=$this->uri->segment(3);
	
	$folder='./asset/uploads/';
	$cari=$this->model_app->detail_kuasa("where b.id_upload='$id'");
	if($cari)
	{
	foreach($cari as $dt)
		{
		$namafile=$dt->file;
		$this->model_app->delete_data('data_upload','id_upload',$id);
		$this->model_app->delete_data('file_upload','id_upload',$id);
		unlink($folder.$namafile);
		}
	}
	if($level=='asuransi'){
	redirect('asuransi/list_surat_kuasa');
	}
	elseif($level=='admin'){
		redirect('asuransi/list_surat_kuasa_all');
	}
}	

 //------------delete file----------------------------------
function hapus_file(){
	$level=$this->session->userdata('level');
	$id=$this->uri->segment(3);
	
	$folder='./asset/uploads/';
	
	$cari=$this->model_app->detail_kuasa("where a.id='$id'");
	if($cari)
	{
	foreach($cari as $dt)
		{
		$namafile=$dt->file;
		}	
    $this->model_app->delete_data('file_upload','id',$id);
	unlink($folder.$namafile);
        
	}
	if($level=='asuransi'){
	redirect('asuransi/list_surat_kuasa');
	}
	elseif($level=='admin'){
		redirect('asuransi/list_surat_kuasa_all');
	}
}	

//========================update
    function update_kuasa(){
		$nomor=$this->input->post('no');
		$idasuransi=$this->session->userdata('id');
		$folder='./asset/uploads/';
	foreach($_FILES['myfile']['name'] as $key => $val){
        $name = $_FILES['myfile']['name'][$key];
		$namafile =$_POST['namafile'][$key];
        $tmp  = $_FILES['myfile']['tmp_name'][$key];
        if(trim($name)!=''){
			
			$new_name = date('YmdHis').'-'.$name; //rename file
			$datafile=array(
			'id_upload'=>$this->input->post('no'),
			'nm_file'=>$namafile,
			'file'=>$new_name
			);
			$this->model_app->insert('file_upload',$datafile);
	
            if(move_uploaded_file($tmp,$folder.$new_name)){ //proses upload
			
			}
		}
	}
	$dataupload=array(
			'keterangan'=>$this->input->post('ket'),
			'insertime'=>date('Y-m-d:His')
			);
			$this->model_app->update('data_upload','id_upload',$nomor,$dataupload);
			redirect('asuransi/list_surat_kuasa');

}
//========================periode
    function surat_kuasa_periode(){
$page=$this->uri->segment(3);
      	$limit=100;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
	$idasuransi=$this->session->userdata('id');
	$bln= $this->input->post('bln');
    $thn=$this->input->post('thn');

	/*if($asurans=='semua')
		{
		$data['title']='Data List Surat Kuasa';
$data['list'] = $this->model_app->tampil_semua_sk($limit,$offset,"where a.id_asuransi=$idasuransi AND mid(a.insertime,6,2)='$bln' AND left(a.insertime,4)='$thn'");

		$tot_hal = $this->model_app->hitung_isi_tabel('data_upload','');
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/surat_kuasa_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/list_data';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
			*/
			
		$data['title']='Data List Surat Kuasa';
$data['list'] = $this->model_app->tampil_semua_sk($limit,$offset,"where a.id_asuransi=$idasuransi AND mid(a.insertime,6,2)='$bln' AND left(a.insertime,4)='$thn'");
		$tot_hal = $this->model_app->hitung_isi_tabel('data_upload',"where id_asuransi=$idasuransi AND mid(insertime,6,2)='$bln' AND left(insertime,4)='$thn'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/surat_kuasa_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/list_data';
			 $this->load->view('home',$data);	
			
		//}

   	}
//========================periode
    function surat_kuasa_periode2(){
$idasuransi=$this->session->userdata('id');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		$idasuransi=$this->session->userdata('id');
	$bln= $this->input->post('bln');
    $thn=$this->input->post('thn');
	
		$data['title']='Data List Surat Kuasa';
		$data['list'] = $this->model_app->tampil_semua_sk($limit,$offset,"where mid(a.insertime,6,2)='$bln' AND left(a.insertime,4)='$thn'");
		$tot_hal = $this->model_app->hitung_isi_tabel('data_upload',"");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/list_surat_kuasa/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/admin/list_data';
			 $this->load->view('home',$data);

   	}

//--------for paging limit------------------------------------------------------
	  function list_lhs()
	{	$idasuransi=$this->session->userdata('id');
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='List LHS';
		$data['list'] = $this->m_lhs->tampil_semua_lhs($limit,$offset,"where b.surveyor_app='1' AND a.id_asuransi='$idasuransi'");
		$tot_hal = $this->m_lhs->hitung_isi_tabel('lhs b',"inner join surat_tugas a on a.id_surat_tugas=b.id_surat_tugas 
			inner join surveyor c on a.id_pegawai=c.id_pegawai
			inner join asuransi d on a.id_asuransi=d.id_asuransi
			where b.surveyor_app='1' AND a.id_asuransi='$idasuransi'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/list_lhs/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/v_list_lhs';
			 $this->load->view('home',$data);
		
	}
//-----TAMPIL MENURUT PERIODE -------------------
function lhs_periode(){
	$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
	$idasuransi= $this->session->userdata('id');
    $bln= $this->input->post('bln');
    $thn=$this->input->post('thn');
	
	if($bln=='01')
	{$bulan='Januari';}elseif($bln=='02'){$bulan='Maret';}elseif($bln=='03')
	{$bulan='April';}elseif($bln=='04'){$bulan='Maret';}elseif($bln=='05')
	{$bulan='Mei';}elseif($bln=='06'){$bulan='Juni';}elseif($bln=='07')
	{$bulan='Juli';}elseif($bln=='08'){$bulan='Agustus';}elseif($bln=='09')
	{$bulan='September';}elseif($bln=='10'){$bulan='Oktober';}elseif($bln=='11')
	{$bulan='November';}elseif($bln=='12'){$bulan='Desember';}
	$periode=$bulan.'-'.$thn;	

		$data['title']='Data List LHS';
		$data['list'] = $this->m_lhs->tampil_periode($limit,$offset,1,$bln,$thn,"AND a.id_asuransi='$idasuransi'");
		$tot_hal = $this->m_lhs->hitung_isi_tabel('surat_tugas a',"inner join lhs b on a.id_surat_tugas=b.id_surat_tugas where b.surveyor_app='1' AND a.id_asuransi='$idasuransi'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'asuransi/lhs_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='asuransi/v_list_lhs';
			 $this->load->view('home',$data);	
}
//==============logout=================================
	function logout()
	{	
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','YOU"VE LOGOUT THE SISTEM');
		session_destroy();
        redirect('asuransi');
	}



}


