 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal extends CI_Controller  {
	
function __construct() {
parent::__construct();
$this->load->library('pagination');
$this->load->model('model_app');
}
	 
	function index()
	{
		   if($this->session->userdata('login_status') != TRUE )
	   {
		   redirect('login');

	}
		
}

	// add input
    function add_jurnal(){

		$akun=$this->model_app->getdata('akun',"where id_sub_parent !='0'");
		$bulan=date('m');
        $data=array(
            'title'=>'Data jurnal',
			'judul'=>'EXPENSE',
            'kd_kwitansi'=>$this->model_app->getKodekwitansi(),
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
						'trans'=>$this->model_app->getdata('detail_jurnal a',"left join jurnal b on a.id_jurnal=b.id_jurnal left join akun c on a.id_parent=c.id_parent WHERE a.id_sub_parent='102' AND  mid(a.tgl_transaksi,6,2)='$bulan' order by a.id_jurnal DESC"),
			//'akun'=>$idparent,
			//'trans'=>$id_parent2,
			'trans2'=>$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal WHERE b.id_sub_parent='101' group by b.id_parent"),
			'view'=>('jurnal/v_add_jurnal')
        ); 
        $this->load->view('home',$data);
     }
	/////////////////// add input
    function laporan_jurnal(){
			
			$thn=date("Y");
			$bln=date("m");        	
        $data=array(
            'title'=>'laporan jurnal',
			'status'=>'pengeluaran',
			'view'=>('jurnal/v_laporan_jurnal')
        );
        $this->load->view('home',$data);
     }
////////////////////// add input
 function list_account(){
        $data=array(
            'title'=>'list_account',
            'kd_kwitansi'=>$this->model_app->getKodekwitansi(),
			'kodejurnal'=>$this->model_app->kode(),
			'dt'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
			'akun'=>$this->model_app->getdata('akun',"where id_sub_parent !=0"),
			//'lhs'=>$this->model_app->selectall('lhs'),
			'view'=>('jurnal/v_account')
        );
        $this->load->view('home',$data);
     } 
			
	 // add input
    function data_jurnal(){
		
        $data=array(
            'title'=>'list_account',
            'kd_kwitansi'=>$this->model_app->getKodekwitansi(),
			'kodejurnal'=>$this->model_app->kode(),
			'dt'=>$this->model_app->getdata('jurnal',""),
			'akun'=>$this->model_app->getdata('jurnal',""),
			'trans'=>$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal group by b.id_parent"),
			'view'=>('jurnal/v_jurnal')
        );
        $this->load->view('home',$data);
     } 
	 
//    INSERT DATA Session
    function add_itemmmmm(){
        $data = array(
            'id'    => $this->input->post('kd_barang'),
            'qty'   => $this->input->post('qty'),
            'price' => $this->input->post('harga'),
            'name'  => $this->input->post('nm_barang'),
        );
        $this->cart->insert($data);
        redirect('penjualan/pages_tambah_penjualan');
    }
	
	 // add input
    function add_jurnal_st(){
		$kdjurnal=$this->model_app->kodejurnal();
        $data=array(
            'title'=>'Tambah jurnal',
            'surat_tugas'=>$this->model_app->getdata('surat_tugas',""),
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
			'trans'=>$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal group by b.id_parent"),
			'temp'=>$this->model_app->getdata('temp_jurnal',"where id_jurnal='$kdjurnal'"),
			'view'=>('jurnal/v_add_jurnal_st')
        );
        $this->load->view('home',$data);
     }
			

//    INSERT DATA Session
    function add_item(){
		$kdtrans = $this->input->post('kdtrans2');
		$id_parent = $this->input->post('id_sub2');
		$idsub = $this->input->post('id_parent3');
		$nost = $this->input->post('no_st');
		$det = $this->input->post('det2');
		$jumlah = $this->input->post('jumlah2');
		$temp=array(
		'id_jurnal'=>$kdtrans,
		'id_parent'=>$id_parent,
		'id_sub_parent'=>$idsub,
		'id_surat_tugas'=>$nost,
		'detail'=>$det,
		'jumlah'=>$jumlah,
		);
		$this->model_app->insert('temp_jurnal',$temp);	

		redirect('jurnal/add_jurnal_st');
    }	

//------------delete data----------------------------------
function hapus_item_temp(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('temp_jurnal','id_temp',$kode);
	redirect('jurnal/add_jurnal_st');
    }	
}				
//------------delete data----------------------------------
function delete_account(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('akun','id_parent',$kode);
	redirect('jurnal/list_account');
    }	
}
//------------delete data----------------------------------
function delete_transaksi(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('jurnal','id_jurnal',$kode);
	  $this->model_app->delete_data('detail_jurnal','id_jurnal',$kode);
	redirect('jurnal/add_jurnal');
    }	
}

//////////////////////////////////////////////////	 
 function get_sub_parent(){
	 $idparent=$this->input->post('id_parent');
	 
	 if($idparent=='101')
	 {
      $result=$this->model_app->getdata("akun","where id_sub_parent='$idparent' AND id_parent !='1024' AND id_parent !='1025' AND id_parent !='1026'");
	echo'<option>Pilih Transaksi</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->id_parent.'">'.$data->nm_akun.'</option>';
		
		}	
	} }
	 elseif($idparent=='102')
	 {
      $result=$this->model_app->getdata("akun","where id_sub_parent='$idparent' AND id_parent !='1022' AND id_parent !='1023'");
	echo'<option>Pilih Transaksi</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->id_parent.'">'.$data->nm_akun.'</option>';
		
		}	
	} }	
	     
}

//////////////////////////////////////////////////	 
 function get_sub_st(){
	 $idparent=$this->input->post('id_parent');
	 if($idparent=='102')
	 {
      $result=$this->model_app->getdata("akun","where id_sub_parent='$idparent' AND id_parent='1022' or id_parent='1023' or id_parent='1024'");
	echo'<option>Pilih Transaksi</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->id_parent.'">'.$data->nm_akun.'</option>';
		
		}	
	}  
	 }
	 elseif($idparent=='101')
	 {
	     $result=$this->model_app->getdata("akun","where id_sub_parent='$idparent' AND id_parent='1024' or id_parent='1025' or id_parent='1026'");
	echo'<option>Pilih Transaksi</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->id_parent.'">'.$data->nm_akun.'</option>';
		
		}	
	} 
	
	 }
}	
	//===========tambah_akun====================
function tambah_akun()
{	
 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_parent2','id_parent2','required|trim|xss_clean');
	 $this->form_validation->set_rules('nm_akun','nm_akun','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			
		echo 'Gagal Simpan data,data kurang lengkap';	
		}
		else
		{
		$databaru=array(
		'id_parent' =>$this->input->post('kodejurnal'),
		'id_sub_parent' =>$this->input->post('id_parent2'),
		'nm_akun'=>$this->input->post('nm_akun'),
		'detail'=>$this->input->post('detail2'),
		);
		$this->model_app->insert('akun',$databaru);	
	  redirect('jurnal/list_account');
 }
 }
 else
 {
 redirect('login');
 }
}


	//===========tambah_akun====================
function update_akun()
{	
$idsubparent=$this->input->post('idsubparent');

 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_parent2','id_parent2','required|trim|xss_clean');
	 $this->form_validation->set_rules('nm_akun','nm_akun','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			
		echo 'Gagal Simpan data,data kurang lengkap';	
		}
		else
		{
		$dataubah=array(
		'id_sub_parent'=>$this->input->post('id_parent2'),
		'nm_akun'=>$this->input->post('nm_akun'),
		'detail'=>$this->input->post('detail2'),
		);
		
		$this->model_app->update('akun','id_parent',$idsubparent,$dataubah);
	  redirect('jurnal/list_account');
 }
 }
 else
 {
 redirect('login');
 }
}

	//===========tambah_akun====================
function update_transaksi()
{	
$id_trans=$this->input->post('id_trans');

 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_trans','id_trans','required|trim|xss_clean');
	 $this->form_validation->set_rules('nm_akun','nm_akun','required|trim|xss_clean');
	 $this->form_validation->set_rules('jml_trans','jml_trans','required|trim|xss_clean|integer');
	 if ($this->form_validation->run() == FALSE)
		{
			
		echo 'Gagal Simpan data,data kurang lengkap';	
		}
		else
		{
		$dataubah=array(
		'nm_jurnal'=>$this->input->post('nm_trans'),
		'det_jurnal'=>$this->input->post('det_trans'),
		'jumlah_jurnal'=>$this->input->post('jml_trans'),
		'update_jurnal'=>date('Y-m-d:h:m:s'),
		);
		
		$this->model_app->update('jurnal','id_jurnal',$id_trans,$dataubah);
	  redirect('jurnal/add_jurnal');
 }
 }
 else
 {
 redirect('login');
 }
}

	//===========tambah_akun====================
function simpan_jurnal()
{	
 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('kodejurnal','kodejurnal','required|trim|xss_clean');
	// $this->form_validation->set_rules('id_sub','id_sub','required|trim|xss_clean');
	 //$this->form_validation->set_rules('jumlah','jumlah','required|trim|xss_clean|integer');
	 if ($this->form_validation->run() == FALSE)
			{
			
		$data=array(
		'message'=>'data tidak lengkap',
		'view'=>('jurnal/add_jurnal_st')
		);
		 $this->load->view('home',$data);
		 
			}
		else
		{
		$akun=$_POST['t_akun'];
		foreach($akun as $dt => $value) {	

		$datajurnal=array(
		'id_jurnal' =>'TR'.'-'.$this->input->post('kodejurnal'),
		'nm_jurnal' =>$this->input->post('t_ket'),
		'tgl_jurnal'=>date('Y-m-d'),
		'det_jurnal'=>$this->input->post('t_ket'),
		'jumlah_jurnal'=>'1111111111111',
		);
		$this->model_app->insert('jurnal',$datajurnal);	
	  redirect('jurnal/add_jurnal');
	 	}
 	}
 }
 else
 {
 redirect('login');
 }
}
//===========tambah_akun====================
function simpan_jurnal_st()
{	
$kode =$this->input->post('kodejurnal');
$t_ket =$this->input->post('t_ket');
$t_jumlah =$this->input->post('t_jumlah');

 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('kodejurnal','kodejurnal','required|trim|xss_clean');
	 $this->form_validation->set_rules('t_ket','t_ket','required|trim|xss_clean');
	// $this->form_validation->set_rules('jumlah','jumlah','required|trim|xss_clean|integer');
	 if ($this->form_validation->run() == FALSE)
			{
			
		$data=array(
		'message'=>'data tidak lengkap',
		'view'=>('jurnal/v_add_jurnal')
		);
		 $this->load->view('home',$data);
		 
			}
		else
		{

		$datajurnal=array(
		'id_jurnal' =>$this->input->post('kodejurnal'),
		'id_parent' =>$this->input->post('id_sub'),
		'nm_jurnal' =>$this->input->post('t_ket'),
		'tgl_jurnal'=>date('Y-m-d'),
		'det_jurnal'=>$this->input->post('t_ket'),
		'jumlah_jurnal'=>$this->input->post('t_jumlah'),
		);		
		 $this->model_app->insert('jurnal',$datajurnal);	
		 
		  
		$parent=$_POST['t_parent']; //save to detail
		foreach($parent as $key => $val)
		{
		  $t_parent =$_POST['t_parent'][$key];
		  $t_sub =$_POST['t_sub'][$key];
		  $t_st =$_POST['t_st'][$key];
		  $t_detail =$_POST['t_detail'][$key];

		$detail_jurnal=array(
		'id_jurnal'=>$kode,
		'id_parent'=>$this->input->post('id_sub'),
		'id_sub_parent'=>$this->input->post('id_parent'),
		'id_surat_tugas'=>$t_st,
		'nm_transaksi'=>$t_detail,
		'tgl_transaksi'=>date('Y-m-d'),
		'det_transaksi'=>$t_ket,
		'jumlah_transaksi'=>$t_jumlah,
		);
		$this->model_app->insert('detail_jurnal',$detail_jurnal);	
		$this->model_app->delete_data('temp_jurnal','id_jurnal',$kode);
	   }
		 ///////////////////
	     redirect('jurnal/add_jurnal');
 	}
 }
 else
 {
 redirect('login');
 }
}
	//===========tambah_akun====================
function simpan_jurnal2()
{	
 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_parent3','id_parent','required|trim|xss_clean');
	 $this->form_validation->set_rules('id_sub2','id_sub','required|trim|xss_clean');
	 $this->form_validation->set_rules('jumlah2','jumlah2','required|trim|xss_clean|integer');
	 if ($this->form_validation->run() == FALSE)
			{
			
		$data=array(
		'message'=>'data tidak lengkap',
		'view'=>('jurnal/v_add_jurnal')
		);
		 $this->load->view('home',$data);
		 
			}
		else
		{
		$datajurnal=array(
		'id_jurnal' =>$this->input->post('kdtrans2'),
		'id_parent' =>$this->input->post('id_sub2'),
		'nm_jurnal' =>$this->input->post('det2'),
		'tgl_jurnal'=>date('Y-m-d'),
		'det_jurnal'=>$this->input->post('det2'),
		'jumlah_jurnal'=>$this->input->post('jumlah2'),
		'update_jurnal'=>''
		);
		$datadetail=array(
		'id_jurnal' =>$this->input->post('kdtrans2'),
		'id_parent' =>$this->input->post('id_sub2'),
		'id_sub_parent' =>$this->input->post('id_parent3'),
		'id_surat_tugas' =>'',
		'nm_transaksi' =>$this->input->post('det2'),
		'tgl_transaksi'=>date('Y-m-d'),
		'det_transaksi'=>$this->input->post('det2'),
		'jumlah_transaksi'=>$this->input->post('jumlah2'),
		);
		
		$this->model_app->insert('jurnal',$datajurnal);	
		$this->model_app->insert('detail_jurnal',$datadetail);		
	  redirect('jurnal/add_jurnal');
 }
 }
 else
 {
 redirect('login');
 }
}


//-----TAMPIL MENURUT PERIODE -------------------
function periode_jurnal(){
	
	$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
	$asurans= $this->input->post('asuransi');
	$status= $this->input->post('status');
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
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.status_kwitansi='$status'"),
        );
		}	
		else
		{
		 $data=array(
            'title'=>'data Surat Tugas global',
            'periode'=>$asurans.' Periode '.$bln.'-'.$thn,
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.id_asuransi='$asurans' AND a.status_kwitansi='$status'"),
        );
		}
		$this->load->view('kwitansi/laporan_kwitansi_cetak',$data);
		
       //---------JIKA TOMBOL CARI YANG DITEKAN------------------
	}
	else
	{
	
		//--view semua asuransi dan semua status
		if($status=='semua')
		{
		$data['title']='Data  Jurnal';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['kd_kwitansi'] = $this->model_app->getKodekwitansi();
		$data['kodejurnal'] =$this->model_app->kode();
		$data['kodetrans'] =$this->model_app->kodejurnal();
		$data['data'] =$this->model_app->getdata('akun',"where id_sub_parent='0'");
		$data['kodejurnal'] =$this->model_app->kode();
		$data['trans'] =$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal  WHERE b.id_sub_parent='102' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by b.id_parent");
				$data['trans2'] =$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal  WHERE b.id_sub_parent='101' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by b.id_parent");
	
						
						
		$tot_hal = $this->model_app->hitung_isi_tabel('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal group by b.id_parent");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'jurnal/periode_jurnal/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='jurnal/v_add_jurnal';
			 $this->load->view('home',$data);	
		}
        //--view semua asuransi utang atau lunas
		else
		{
		$data['title']=$status;
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['kd_kwitansi'] = $this->model_app->getKodekwitansi();
		$data['kodejurnal'] =$this->model_app->kode();
		$data['kodetrans'] =$this->model_app->kodejurnal();
		$data['data'] =$this->model_app->getdata('akun',"where id_sub_parent='0'");
		$data['kodejurnal'] =$this->model_app->kode();
		$data['trans'] =$this->model_app->getdata('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal where LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' AND b.id_sub_parent='$status' group by b.id_parent");
		$tot_hal = $this->model_app->hitung_isi_tabel('jurnal a',"left join (detail_jurnal b left join akun c on b.id_parent=c.id_parent) on a.id_jurnal=b.id_jurnal where LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' AND b.id_sub_parent='$status' group by b.id_parent");
		
	
			
			//create for pagination		
			$config['base_url'] = base_url() . 'jurnal/periode_jurnal/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["status"] =$status;

			$data['view']='jurnal/v_add_jurnal_periode';
			 $this->load->view('home',$data);	
		}
		  


   	}
}


//-----TAMPIL MENURUT PERIODE -------------------
function lap_periode_jurnal(){
	
	$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
	$status= $this->input->post('status');
    $bln= $this->input->post('bln');
    $thn=$this->input->post('thn');
		
	//JIKA TOMBOL CETAK YANG DI TEKAN	
	if(isset($_POST['btncetak']))
	{
		//menampilkan semua data periode tanpa status bayar 
		if($status=='expense')
		{
        $data=array(
            'title'=>'laporan jurnal',
			'status'=>'PENGELUARAN',
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
'b_survey'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1023' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_operasional'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1022' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_lain'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1031' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_atk'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1032' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_listrik'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1033' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_telkom'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1034' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_trust'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1037' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_dapur'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1035' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_gaji'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1021' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_pajak'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1036' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
);
		ob_start();
		$content = $this->load->view('jurnal/v_cetak_keluar',$data);
		$content = ob_get_clean();	
		}
		elseif($status=='income')
		{
	
	$data=array(
            'title'=>'laporan jurnal',
			'status'=>'PEMASUKAN',
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
'p_operasional'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1024' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_survey'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1025' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_klaim'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1026' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_lain'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1027' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_modal'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1028' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),

	       );
		   		ob_start();
		$content = $this->load->view('jurnal/v_cetak_masuk',$data);
		$content = ob_get_clean();	
		}
		
	
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15', array(10,10,0,0));
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->setDefaultFont('Arial','9');  
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Laporan Jurnal.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
			}
		
       //---------JIKA TOMBOL CARI YANG DITEKAN------------------
	}
	else
	{
	
		//--view expense
		if($status=='expense')
		{
				$data=array(
            'title'=>'laporan jurnal',
			'status'=>'PENGELUARAN',
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
'b_survey'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1023' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_operasional'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1022' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_lain'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1031' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_atk'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1032' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_listrik'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1033' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_telkom'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1034' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_trust'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1037' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_dapur'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1035' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_gaji'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1021' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'b_pajak'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1036' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
		
			'view'=>('jurnal/v_laporan_keluar')
        );
        $this->load->view('home',$data);
		}
        //--view income
		elseif($status=='income')
		{
	
	$data=array(
            'title'=>'laporan jurnal',
			'status'=>'PEMASUKAN',
			'kodejurnal'=>$this->model_app->kode(),
			'kodetrans'=>$this->model_app->kodejurnal(),
			'data'=>$this->model_app->getdata('akun',"where id_sub_parent='0'"),
'p_operasional'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1024' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),

'p_survey'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1025' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_klaim'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1026' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_lain'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1027' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
'p_modal'=>$this->model_app->getdata('jurnal a',"right join detail_jurnal b on a.id_jurnal=b.id_jurnal WHERE a.id_parent='1028' AND LEFT(a.tgl_jurnal,4)='$thn' AND MID(a.tgl_jurnal,6,2)='$bln' group by a.id_jurnal"),
		
			'view'=>('jurnal/v_laporan_masuk')
        );
        $this->load->view('home',$data);
		}
		  


   	}
}
	//===========Pencarian kwitansi====================
function cari_lap_os()
{	
$id=$this->input->post('st');	
 if($this->session->userdata('login_status') == TRUE ){
		$data=array(
		'asuransi' =>$this->model_app->selectall('asuransi'),
		'det_kw'=> $this->model_app->tampil_detail_kwitansi(),
		'sub' =>$this->model_app->sub_jumlah(""),
		'list'=> $this->model_app->selected('kwitansi',"where a.id_surat_tugas='$id'"),
		'view'=>'kwitansi/v_laporan_os'
		);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}




}