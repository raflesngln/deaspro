<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller  {
	
function __construct() {
parent::__construct();
$this->load->library('pagination');
$this->load->model('m_manager');
$this->load->model('m_lhs');
$this->load->model('m_st');

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
	
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='List LHS Baru';
		$data['list'] = $this->m_manager->tampil_semua_lhs($limit,$offset,1);
		$tot_hal = $this->m_manager->hitung_isi_tabel('lhs','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'lhs/lhs_baru/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='manager/v_list_lhs_baru';
			 $this->load->view('home',$data);
		
	}

//===========form edit asuransiiiiii====================
function buat_lhs()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit LHS',
	'judul'=>'TAMBAH LHS BARU',
	'lhs'=>$this->m_manager->edit_lhs($id),
	'view'=>'manager/v_lhs_baru'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//===========form edit asuransieeeee====================
function edit_lhs()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit LHS',
	'judul'=>'EDIT LHS',
	'lhs'=>$this->m_manager->edit_lhs($id),
	'view'=>'manager/v_lhs_baru'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
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
	'list'=> $this->m_manager->tampil_semua_lhs($limit,$offset,1),
	'asuransi' => $this->m_manager->selectall('asuransi')
		);
		$tot_hal = $this->m_manager->hitung_isi_tabel('lhs','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'manager/list_lhs/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='manager/v_list_lhs';
			 $this->load->view('home',$data);
		
	}

//================Approve LHS=======================================
function app_lhs()
{
	$idlhs=$this->uri->segment(3);
	$tgl=date("m/d/Y");
	
$datalhs=array(
'tgl_manager_app'=>$tgl,
'manager_app'=>'1',
'tgl_acc'=>$tgl
);
	
$this->m_manager->update('lhs','id_lhs',$idlhs,$datalhs);
redirect('manager/list_lhs');
}
	
//================update lhsss=======================================
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
		'manager_app'=>$this->input->post('app'),
		'tgl_manager_app'=>$tgl_app,
		);

			$this->m_manager->update('lhs','id_lhs',$idlhs,$datalhs);
			redirect('manager/list_lhs');
		 } 
	}
}
//--------LIST LHS----------------------------------------------
	  function list_surat_tugas()
	{	
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_manager->selectall('asuransi');
		$data['list'] = $this->m_manager->tampil_semua_st($limit,$offset);
		$tot_hal = $this->m_manager->hitung_isi_tabel('surat_tugas','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'manager/list_surat_tugas/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='manager/v_list_st';
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
		
	$asurans= $this->input->post('asuransi');
    $bln= $this->input->post('bln');
    $thn=$this->input->post('thn');
		
	//JIKA TOMBOL CETAK YANG DI TEKAN	
	if(isset($_POST['btncetak']))
	{
		//menampilkan semua data periode tanpa status bayar 
		if($asurans=='semua')
		{
        $data=array(
            'title'=>'data Surat Tugas global',
            'periode'=>$asurans.' Periode '.$bln.'-'.$thn,
            'list'=> $this->m_lhs->lhs_cetak($bln,$thn,1,''),
        );
		}	
		else
		{
		 $data=array(
            'title'=>'data Surat Tugas global',
            'periode'=>$asurans.' Periode '.$bln.'-'.$thn,
            'list'=> $this->m_lhs->lhs_cetak($bln,$thn,1,"AND a.id_asuransi='$asurans'"),
        );
		}
		$this->load->view('lhs/laporan_lhs_global',$data);
		
       //---------JIKA TOMBOL CARI YANG DITEKAN------------------
	}
	else
	{
	
		//--view menurut asuransus penjualan periode
		if($asurans=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_manager->selectall('asuransi');
		$data['list'] = $this->m_manager->tampil_periode($limit,$offset,1,$bln,$thn,'');
		$tot_hal = $this->m_manager->hitung_isi_tabel2('surat_tugas',1,'');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'manager/lhs_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='manager/v_list_lhs';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_manager->selectall('asuransi');
		$data['list'] = $this->m_manager->tampil_periode($limit,$offset,1,$bln,$thn,"AND a.id_asuransi='$asurans'");
		$tot_hal = $this->m_manager->hitung_isi_tabel2('surat_tugas',1,'');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'manager/lhs_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='manager/v_list_lhs';
			 $this->load->view('home',$data);	
			
		}

   	}
}
//===========Pencarian LHS====================
function cari_lhs()
{	
$id=$this->input->post('lhs');	
 if($this->session->userdata('login_status') == TRUE ){
		$data['asuransi'] = $this->m_manager->selectall('asuransi');
		$data['list'] = $this->m_manager->edit_lhs($id);
	$data['view']='manager/v_list_lhs';
	
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//===========form edit asuransi====================
function edit_surat_tugas()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'Edit data asuransi',
	'st'=>$this->m_st->edit_st($id),
	'asuransi'=>$this->m_st->selectall('asuransi'),
	'surveyor'=>$this->m_st->selectall('surveyor'),
	'view'=>'manager/v_edit_st'
	);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}

//================update asuransi=======================================
function update_surat_tugas()
{

$id=$this->input->post('id');
$sk=$this->input->post('sk');
$tglsurat=$this->input->post('tglsurat');$pisah=explode("/",$tglsurat);$urutan=array($pisah[2],$pisah[1],$pisah[0]);$satukan=implode('-',$urutan);

$thnbuat=$this->input->post('thnbuat');
$asuransi=$this->input->post('asuransi');
$warna=$this->input->post('warna');
$tipe=$this->input->post('tipe');
$nopol=$this->input->post('nopol');
$rangka=$this->input->post('rangka');
$nomesin=$this->input->post('nomesin');
$namastnk=$this->input->post('namastnk');
$alamatstnk=$this->input->post('alamatstnk');
$tertanggung=$this->input->post('tertanggung');
$alamattertanggung=$this->input->post('alamattertanggung');
$telp=$this->input->post('telp');
$hp=$this->input->post('hp');
$polis=$this->input->post('polis');
$tglmulai=$this->input->post('tglmulai');
$tglakhir=$this->input->post('tglakhir');
$surveyor=$this->input->post('surveyor');

	
	$terimask=$this->input->post('terimask');
	$terbitsk=$this->input->post('terbitsk');
	
	if($this->session->userdata('login_status') == TRUE )
	{
	
	$this->form_validation->set_rules('asuransi','asuransi','required|trim|xss_clean');
	$this->form_validation->set_rules('surveyor','surveyor','required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
		{
			echo'<script type="text/javascript"> alert("data kurang lengkap"); history.back();</script>';
		}
		else
		{
			$datast=array(	
		'tgl_surat_tugas'=>$tglsurat,
		'no_kuasa'=>$sk,
		'terima_kuasa'=>$terimask,
		'terbit_kuasa'=>$terbitsk,
		'type_kendaraan'=>$this->input->post('jenis'),
		'model_kendaraan'=>$tipe,
		'no_polisi'=>$nopol,
		'no_rangka'=>$rangka,
		'no_mesin'=>$nomesin,
		'thn_buat'=>$thnbuat,
		'warna'=>$warna,
		'nm_stnk'=>$namastnk,
		'almt_stnk'=>$alamatstnk,
		'nm_tertanggung'=>$tertanggung,
		'almt_tertanggung'=>$alamattertanggung,
		'telp_tertanggung'=>$telp,
		'hp_tertanggung'=>$hp,
		'id_asuransi'=>$asuransi,
		'no_polis'=>$polis,
		'tgl_berlaku'=>$tglmulai,
		'tgl_kedaluwarsa'=>$tglakhir,
		'id_pegawai'=>$surveyor,
		);
		
 if(isset($_POST['button']))
 {
			$this->m_st->update('surat_tugas','id_surat_tugas',$id,$datast);
			redirect('manager/list_surat_tugas');
 }
 elseif(isset($_POST['button2']))
 {
		$this->m_st->update('surat_tugas','id_surat_tugas',$id,$datast);
		$cetak=array(
		'title'=>'Cetak data Surat Tugas',
		'merk'=>'Merk/Type',
		'st'=>$this->m_st->edit_st($id),
		);
		 $this->load->view('surat_tugas/cetak',$cetak);
		// redirect('surat_tugas/list_surat_tugas');
		
 			}

		 } 
	}
}

	
}