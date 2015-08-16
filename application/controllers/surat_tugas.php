<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_tugas extends CI_Controller  {
	
function __construct() {
parent::__construct();
$this->load->library('pagination');
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
	  function list_surat_tugas()
	{	
		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_st->selectall('asuransi');
		$data['datajurnal'] = $this->m_st->getdata('surat_tugas a',"left join detail_jurnal b on a.id_surat_tugas=b.id_surat_tugas ");
		$data['list'] = $this->m_st->tampil_semua_st($limit,$offset);
		//$data['list'] = $this->m_st->getdata('surat_tugas a',"left join (detail_jurnal b inner join jurnal c on b.id_jurnal=c.id_jurnal) on a.id_surat_tugas=b.id_surat_tugas inner join asuransi d on a.id_asuransi=d.id_asuransi ");
		
		$tot_hal = $this->m_st->hitung_isi_tabel('surat_tugas',"order by id_surat_tugas DESC");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'surat_tugas/list_surat_tugas/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surat_tugas/v_list_st';
			 $this->load->view('home',$data);
		
	}

//================add input================
 function add_surat_tugas(){
        $data=array(
            'title'=>'Tambah Surat tugas',
            'kodest'=>$this->m_st->getKodest(),
			'kodelhs'=>$this->m_st->getKodelhs(),
			'asuransi'=>$this->m_st->selectall('asuransi'),
			'surveyor'=>$this->m_st->selectall('surveyor'),
			'view'=>('surat_tugas/v_add_st')
        );
        $this->load->view('home',$data);
     }
	 
///---------------------------------------------------------
function save_surat_tugas(){
		 
$notugas=$this->input->post('notugas');
$kodelhs=$this->input->post('kodelhs');
$tglsurat=$this->input->post('tglsurat');
$thnbuat=$this->input->post('thnbuat');
$asuransi=$this->input->post('asuransi');
$warna=$this->input->post('warna');
$tipe=$this->input->post('tipe');
$nopol=$this->input->post('nopol');
$rangka=$this->input->post('rangka');
$thnbuat=$this->input->post('thnbuat');
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
	
	$sk=$this->input->post('sk');
	$terimask=$this->input->post('terimask');
	$terbitsk=$this->input->post('terbitsk');
	
	$this->form_validation->set_rules('jenis','jenis','required|trim|xss_clean');
	$this->form_validation->set_rules('sk','Nomor SK','required|trim|xss_clean');
	$this->form_validation->set_rules('tertanggung','Nama tertanggung','required|trim|xss_clean');
	$this->form_validation->set_rules('surveyor','surveyor','required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
            'title'=>'Tambah Surat tugas',
			'message'=>'Mohon Lengkapi data anda !',
			'kodelhs'=>$this->m_st->getKodelhs(),
			'asuransi'=>$this->m_st->selectall('asuransi'),
			'surveyor'=>$this->m_st->selectall('surveyor'),
			'kodest'=>$this->m_st->getKodest(),
			'view'=>('surat_tugas/v_add_st')
			
        );
        $this->load->view('home',$data);
     
}
		else
	{
		$cekst=$this->m_st->select_id('surat_tugas','no_kuasa',$sk);//cek kalo sudah ada di db gagalin
		if($cekst){
		echo'
		<script>
		alert("Data Sudah ada di table Surat tugas. Silahkan edit jika perlu di llist Surat Tugas");
		history.back();
		</script>
		';
		}
		else
		{	
		$datast=array(	
		'id_surat_tugas'=>$notugas,
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
		'no_kontrak'=>$this->input->post('nokontrak'),
		'tgl_berlaku'=>$tglmulai,
		'tgl_kedaluwarsa'=>$tglakhir,
		'id_pegawai'=>$surveyor,
		'uraian_st'=>$this->input->post('uraian_st')
		);
	$datalhs=array(
		'id_lhs'=>$kodelhs,
		'tgl_lhs'=>'',
		'id_surat_tugas'=>$notugas
		);	
		
 if(isset($_POST['button']))
 {
	$this->m_st->insert('surat_tugas',$datast);
	$this->m_st->insert('lhs',$datalhs);
	redirect('surat_tugas/list_surat_tugas'); 
	 
 }
 elseif(isset($_POST['button2']))
 {
		$this->m_st->insert('surat_tugas',$datast);
		$this->m_st->insert('lhs',$datalhs);
		$cetak=array(
		'title'=>'Cetak data Surat Tugas',
		'merk'=>'Merk/Type',
		'st'=>$this->m_st->edit_st($notugas),
		);
		 $this->load->view('surat_tugas/cetak',$cetak);
		// redirect('surat_tugas/list_surat_tugas');
		
 }
 
		
		} 
		
			
	}
	
}
//===========cetak st====================
function cetak_surat_tugas()
{	
$id=$this->uri->segment(3);	
 if($this->session->userdata('login_status') == TRUE ){

	$data=array(
	'title'=>'<font size="28">Cetak data Surat Tugas</font>',
	'merk'=>'Merk/Type',
	'st'=>$this->m_st->edit_st($id),
	);
	 $this->load->view('surat_tugas/cetak',$data); 
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
	'view'=>'surat_tugas/v_edit_st'
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
		'no_kontrak'=>$this->input->post('nokontrak'),
		'no_polis'=>$polis,
		'tgl_berlaku'=>$tglmulai,
		'tgl_kedaluwarsa'=>$tglakhir,
		'id_pegawai'=>$surveyor,
		'uraian_st'=>$this->input->post('uraian_st')
		);
		
 if(isset($_POST['button']))
 {
			$this->m_st->update('surat_tugas','id_surat_tugas',$id,$datast);
			redirect('surat_tugas/list_surat_tugas');
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

//------------delete data----------------------------------
function hapus_surat_tugas(){
	$kode=$this->uri->segment(3);
    $this->m_st->delete_data('surat_tugas','id_surat_tugas',$kode);
	 $this->m_st->delete_data('lhs','id_surat_tugas',$kode);
        
	redirect('surat_tugas/list_surat_tugas');
    }	

//-----TAMPIL MENURUT PERIODE -------------------
function surat_tugas_periode(){
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
	
	if($bln=='01')
	{$bulan='Januari';}elseif($bln=='02')
	{$bulan='Maret';}elseif($bln=='03')
	{$bulan='April';}elseif($bln=='04')
	{$bulan='Maret';}elseif($bln=='05')
	{$bulan='Mei';}elseif($bln=='06')
	{$bulan='Juni';}elseif($bln=='07')
	{$bulan='Juli';}elseif($bln=='08')
	{$bulan='Agustus';}elseif($bln=='09')
	{$bulan='September';}elseif($bln=='10')
	{$bulan='Oktober';}elseif($bln=='11')
	{$bulan='November';}elseif($bln=='12')
	{$bulan='Desember';}

	$periode=$bulan.'-'.$thn;	
	//JIKA TOMBOL CETAK YANG DI TEKAN	
	if(isset($_POST['btncetak']))
	{
		//menampilkan semua data periode tanpa status bayar 
		if($asurans=='semua')
		{
        $data=array(
            'title'=>'data Surat Tugas global',
            'periode'=>$asurans.' '.$periode,
            'list'=> $this->m_st->tampil_laporan_cetak($bln,$thn,''),
        );
		}	
		else
		{
		 $data=array(
            'title'=>'data Surat Tugas global',
			'periode'=>$periode,
            'list'=> $this->m_st->tampil_laporan_cetak($bln,$thn,"AND b.id_asuransi='$asurans'"),
        );
		}
		$this->load->view('surat_tugas/laporan_st_cetak',$data);
		
       //---------JIKA TOMBOL CARI YANG DITEKAN------------------
	}
	else
	{
	
		//--view menurut asuransus penjualan periode
		if($asurans=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_st->selectall('asuransi');
		$data['list'] = $this->m_st->tampil_periode($limit,$offset,$bln,$thn,'');
		$tot_hal = $this->m_st->hitung_isi_tabel('surat_tugas','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'surat_tugas/surat_tugas_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surat_tugas/v_list_st';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->m_st->selectall('asuransi');
		$data['list'] = $this->m_st->tampil_periode($limit,$offset,$bln,$thn,"AND b.id_asuransi='$asurans'");
		$tot_hal = $this->m_st->hitung_isi_tabel('surat_tugas','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'surat_tugas/surat_tugas_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='surat_tugas/v_list_st';
			 $this->load->view('home',$data);	
			
		}

   	}
}

function cari_surat_tugas(){
	$id=$this->input->post('nost');

		$data['asuransi'] = $this->m_st->selectall('asuransi');
		$data['list'] = $this->m_st->edit_st($id);

			$data['view']='surat_tugas/v_list_st';
			 $this->load->view('home',$data);


	}
function jurnal_surat_tugas(){
		$id=$this->uri->segment(3);
		$data=array(
		'detail_jurnal'=>$this->m_st->getdata('detail_jurnal a',"left join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas inner join jurnal c on a.id_jurnal=c.id_jurnal where id_sub_parent='101' AND b.id_surat_tugas='$id' ORDER BY a.id_jurnal DESC"),
		'detail_jurnal2'=>$this->m_st->getdata('detail_jurnal a',"inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas inner join jurnal c on a.id_jurnal=c.id_jurnal where id_sub_parent='102' AND b.id_surat_tugas='$id' ORDER BY a.id_jurnal DESC"),
		'nost'=>$id,
		'view'=>'surat_tugas/jurnal_st'
		);
			 $this->load->view('home',$data);


	}

}