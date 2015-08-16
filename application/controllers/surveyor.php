<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveyor extends CI_Controller  {
	
function __construct() {
parent::__construct();
$this->load->library('pagination');
$this->load->model('m_surveyor');
$this->load->model('m_lhs');
}
	 
	function index()
	{
		   if($this->session->userdata('login_status') != TRUE )
	   {
		   redirect('login');

	}
		
}
//--------for paging limit------------------------------------------------------
	  function lhs_baru()
	{	
	$level=$this->session->userdata('level');
	$id=$this->session->userdata('id');
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='List LHS Baru';
		$data['asuransi'] = $this->m_lhs->selectall('asuransi');
		$data['list'] = $this->m_surveyor->tampil_semua_lhs($limit,$offset,"where b.surveyor_app='0' AND c.id_pegawai='$id' AND b.status='0'");
		$tot_hal = $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='0' AND b.id_pegawai='$id' AND a.status='0'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'surveyor/lhs_baru/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs_baru';
			 $this->load->view('home',$data);
		
	}

//===========form edit asuransi====================
function buat_lhs()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit LHS',
	'judul'=>'TAMBAH LHS BARU',
	'lhs'=>$this->m_surveyor->edit_lhs($id),
	'view'=>'surveyor/v_lhs_baru'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//===========form edit asuransi====================
function edit_lhs()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit LHS',
	'judul'=>'EDIT LHS',
	'lhs'=>$this->m_surveyor->edit_lhs($id),
	'view'=>'surveyor/v_lhs_baru'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}	 

//================update lhs=======================================
function update_lhs()
{
$app=$this->input->post('app');
if($app=='1'){ $tgl_app=date('m/d/Y');}
	
	
$idlhs=$this->input->post('id');
$tgllhs=$this->input->post('tgllhs');
$uraian=$this->input->post('uraian');
$awalpolis=$this->input->post('awalpolis');
$akhirpolis=$this->input->post('akhirpolis');
$saksi1=$this->input->post('saksi1');
$alamatsaksi1=$this->input->post('alamatsaksi1');
$ketsaksi1=$this->input->post('ketsaksi1');
$saksi2=$this->input->post('saksi2');
$alamatsaksi2=$this->input->post('alamatsaksi2');
$ketsaksi2=$this->input->post('ketsaksi2');
$saksi3=$this->input->post('saksi3');
$alamatsaksi3=$this->input->post('alamatsaksi3');
$ketsaksi3=$this->input->post('ketsaksi3');
$saksi4=$this->input->post('saksi4');
$alamatsaksi4=$this->input->post('alamatsaksi4');
$ketsaksi4=$this->input->post('ketsaksi4');
$saksi5=$this->input->post('saksi5');
$alamatsaksi5=$this->input->post('alamatsaksi5');
$ketsaksi5=$this->input->post('ketsaksi5');
$saksi6=$this->input->post('saksi6');
$alamatsaksi6=$this->input->post('alamatsaksi6');
$ketsaksi6=$this->input->post('ketsaksi6');
$penyidik=$this->input->post('penyidik');
$alamatpenyidik=$this->input->post('alamatpenyidik');
$ketpenyidik=$this->input->post('ketpenyidik');

$tindakan1=$this->input->post('tindakan1');
$almttindakan1=$this->input->post('almttindakan1');
$kettindakan1=$this->input->post('kettindakan1');
$tindakan2=$this->input->post('tindakan2');
$almttindakan2=$this->input->post('almttindakan2');
$kettindakan2=$this->input->post('kettindakan2');

$kettertanggung=$this->input->post('kettertanggung');
$analisatertanggung=$this->input->post('analisatertanggung');
$ketpenyidik=$this->input->post('ketpenyidik');

$tkpa=$this->input->post('tkpa');
$tkpb=$this->input->post('tkpb');
$saksia=$this->input->post('saksia');
$saksib=$this->input->post('saksib');
$saksic=$this->input->post('saksic');
$saksid=$this->input->post('saksid');

$buktilain=$this->input->post('buktilain');

$analisatertanggung=$this->input->post('analisatertanggung');

	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('id','id','required|trim|xss_clean');
	$this->form_validation->set_rules('notugas','notugas','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			echo'<script type="text/javascript"> alert("data kurang lengkap"); history.back();</script>';
		}
		else
		{
			$datalhs=array(	
		'tgl_lhs'=>$tgllhs,
		'uraian_singkat'=>$uraian,
		'awal_polis'=>$awalpolis,
		'akhir_polis'=>$akhirpolis,
		'saksi1'=>$saksi1,
		'almt_saksi1'=>$alamatsaksi1,
		'ket_saksi1'=>$ketsaksi1,
		'saksi2'=>$saksi2,
		'almt_saksi2'=>$alamatsaksi2,
		'ket_saksi2'=>$ketsaksi2,
		'saksi3'=>$saksi3,
		'almt_saksi3'=>$alamatsaksi3,
		'ket_saksi3'=>$ketsaksi3,
		'saksi4'=>$saksi4,
		'almt_saksi4'=>$alamatsaksi4,
		'ket_saksi4'=>$ketsaksi4,
		'saksi5'=>$saksi5,
		'almt_saksi5'=>$alamatsaksi5,
		'ket_saksi5'=>$ketsaksi5,
		'saksi6'=>$saksi6,
		'almt_saksi6'=>$alamatsaksi6,
		'ket_saksi6'=>$ketsaksi6,
				
		'penyidik'=>$penyidik,
		'almt_penyidik'=>$alamatpenyidik,
		'ket_penyidik'=>$ketpenyidik,
		'ket_tertanggung'=>$kettertanggung,
		'analisa_tertanggung'=>$analisatertanggung,
		'tindakan1'=>$tindakan1,
		'almt_tindakan1'=>$almttindakan1,
		'ket_tindakan1'=>$kettindakan1,
		'tindakan2'=>$tindakan2,
		'almt_tindakan2'=>$almttindakan2,
		'ket_tindakan2'=>$kettindakan2,
		'analisa_saksi_a'=>$saksia,
		'analisa_saksi_b'=>$saksib,
		'analisa_saksi_c'=>$saksic,
		'analisa_saksi_d'=>$saksid,
		
		'analisa_tkp_a'=>$tkpa,
		'analisa_tkp_b'=>$tkpb,
		'alat_bukti_lain'=>$buktilain,
		'kesimpulan1'=>$this->input->post('kesimpulan1'),
		'kesimpulan2'=>$this->input->post('kesimpulan2'),
		'kesimpulan3'=>$this->input->post('kesimpulan3'),
		'kesimpulan4'=>$this->input->post('kesimpulan4'),
		'kesimpulan5'=>$this->input->post('kesimpulan5'),
		'kesimpulan6'=>$this->input->post('kesimpulan6'),
		'surveyor_app'=>$this->input->post('app'),
		'tgl_surveyor_app'=>$tgl_app,
		);

			$this->m_surveyor->update('lhs','id_lhs',$idlhs,$datalhs);
			redirect('surveyor/lhs_baru');
		 } 
	}
}
//--------for paging limit------------------------------------------------------
	  function list_lhs()
	{	
	$level=$this->session->userdata('level');
	$id=$this->session->userdata('id');

		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data=array(
		'title'=>'List LHS',		
		'list' => $this->m_surveyor->tampil_semua_lhs($limit,$offset,"where b.surveyor_app='1' AND c.id_pegawai='$id' AND b.status='0'"),
		);
		$tot_hal= $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='1' AND b.id_pegawai='$id' AND a.status='0'");
			//create for pagination		
			$config['base_url'] = base_url() . 'surveyor/list_lhs/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs';
			 $this->load->view('home',$data);
		
	}

//-----TAMPIL MENURUT PERIODE -------------------
function lhs_periode(){
	$page=$this->uri->segment(3);
      	$limit=100;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
	$id=$this->session->userdata('id');
	$asurans= $this->input->post('asuransi');
    $bln= $this->input->post('bln');
    $thn=$this->input->post('thn');	

		//--view menurut asuransus penjualan periode
		if($asurans=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_lhs->selectall('asuransi');
		$data['list'] = $this->m_lhs->tampil_periode($limit,$offset,1,$bln,$thn,"AND a.id_pegawai='$id' AND b.status='0'");
		$tot_hal = $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='1' AND b.id_pegawai='$id' AND a.status='0' AND left(b.tgl_surat_tugas,2)='$bln' AND right(b.tgl_surat_tugas,4)='$thn'");

			//create for pagination		
			$config['base_url'] = base_url() . 'surveyor/lhs_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_lhs->selectall('asuransi');
		$data['list'] = $this->m_lhs->tampil_periode($limit,$offset,1,$bln,$thn,"AND a.id_pegawai='$id' AND b.status='0' AND a.id_asuransi='$asurans'");
		$tot_hal = $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='1' AND b.id_pegawai='$id' AND a.status='0' AND left(b.tgl_surat_tugas,2)='$bln' AND right(b.tgl_surat_tugas,4)='$thn' AND b.id_asuransi='$asurans'");
	
			//create for pagination		
			$config['base_url'] = base_url() . 'surveyor/lhs_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs';
			 $this->load->view('home',$data);	
			
		}

}


//-----TAMPIL MENURUT PERIODE -------------------
function lhs_baru_periode(){
	$page=$this->uri->segment(3);
      	$limit=100;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
	$id=$this->session->userdata('id');
	$asurans= $this->input->post('asuransi');
    $bln= $this->input->post('bln');
    $thn=$this->input->post('thn');	

		//--view menurut asuransus penjualan periode
		if($asurans=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_lhs->selectall('asuransi');
		$data['list'] = $this->m_lhs->tampil_periode($limit,$offset,0,$bln,$thn,"AND a.id_pegawai='$id' AND b.status='0'");
		$tot_hal = $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='0' AND b.id_pegawai='$id' AND a.status='0' AND left(b.tgl_surat_tugas,2)='$bln' AND right(b.tgl_surat_tugas,4)='$thn'");

			//create for pagination		
			$config['base_url'] = base_url() . 'lhs/lhs_baru_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs_baru';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_lhs->selectall('asuransi');
		$data['list'] = $this->m_lhs->tampil_periode($limit,$offset,0,$bln,$thn,"AND a.id_pegawai='$id' AND b.status='0' AND a.id_asuransi='$asurans'");
		$tot_hal = $this->m_surveyor->hitung_isi_tabel('lhs a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas left join surveyor c on b.id_pegawai=c.id_pegawai where a.surveyor_app='0' AND b.id_pegawai='$id' AND a.status='0' AND left(b.tgl_surat_tugas,2)='$bln' AND right(b.tgl_surat_tugas,4)='$thn' AND b.id_asuransi='$asurans'");
	
			//create for pagination		
			$config['base_url'] = base_url() . 'surveyor/lhs_baru_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surveyor/v_list_lhs_baru';
			 $this->load->view('home',$data);	
			
		}

}


	
}