<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kwitansi extends CI_Controller  {
	
function __construct() {
parent::__construct();
$this->load->library('pagination');
$this->load->model('model_app');
$this->load->helper('currency_format_helper');
}
	 
	function index()
	{
		   if($this->session->userdata('login_status') != TRUE )
	   {
		   redirect('login');

	}
		
}
//--------for paging limit------------------------------------------------------
	  function list_os()
	{	
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Kwitansi';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("where status_kwitansi='utang'");
		$data['list'] = $this->model_app->laporan_os($limit,$offset,"where a.status_kwitansi='utang'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='utang'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/list_os/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_list_os';
			 $this->load->view('home',$data);
		
	}

	// add input
    function add_kwitansi(){
        $data=array(
            'title'=>'Tambah Kwitansi',
            'kd_kwitansi'=>$this->model_app->getKodekwitansi(),
			'asuransi'=>$this->model_app->selectall('asuransi'),
			//'lhs'=>$this->model_app->selectall('lhs'),
			'view'=>('kwitansi/v_add_kwitansi')
        );
        $this->load->view('home',$data);
     }
	 
//-----get sub group from no_group-------------------------------->
 function get_lhs(){
	 $id_asuransi=$this->input->post('id_asuransi');
      $result=$this->model_app->select_id("surat_tugas","id_asuransi",$id_asuransi);
	echo'<option>Pilih Nomor ST</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->id_surat_tugas.'">'.$data->id_surat_tugas.'</option>';
		
		}	
	}
        
}
function get_detail_lhs(){
        $id_surat_tugas=$this->input->post('id_surat_tugas');
        $data=array(
       'detail'=>$this->model_app->select_id("surat_tugas","id_surat_tugas",$id_surat_tugas),
        );
        $this->load->view('kwitansi/v_detail_lhs',$data);
    }
	
function save_kwitansi(){
	$id_surat_tugas=$this->input->post('id_surat_tugas');
	
	$this->form_validation->set_rules('survey','survey','required|trim|xss_clean|integer');
	$this->form_validation->set_rules('operasional','operasional','required|trim|xss_clean|integer');
	$this->form_validation->set_rules('det1','det1','required|trim|xss_clean');
	$this->form_validation->set_rules('det2','det2','required|trim|xss_clean');
	$this->form_validation->set_rules('det3','det3','required|trim|xss_clean');
	$this->form_validation->set_rules('survey2','survey2','required|trim|xss_clean');
	$this->form_validation->set_rules('operasional2','operasional','required|trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$data=array(
            'title'=>'Tambah Kwitansi',
			'message'=>'<font color="#FF0000">Data kurang lengkap ! Mohon lengkapi data</font>',
			'kd_kwitansi'=>$this->model_app->getKodekwitansi(),
			'asuransi'=>$this->model_app->selectall('asuransi'),
			'lhs'=>$this->model_app->selectall('lhs'),
			'view'=>('kwitansi/v_add_kwitansi')
        );
        $this->load->view('home',$data);
     
		}
		else
	{
		$cekwitansi=$this->model_app->select_id('kwitansi','id_surat_tugas',$id_surat_tugas);//cek kalo sudah ada di kwitansi gagal
		if($cekwitansi){
		echo'
		<script>
		alert("Data Sudah ada di table kwitansi. Silahkan edit di table list Kwitansi");
		history.back();
		</script>
		';
		}
		else //----simpan jika belum ada di tbl kwitansi
		{	
        $result=$this->model_app->select_id('surat_tugas','id_surat_tugas',$id_surat_tugas);
		if($result){
		foreach($result as $row)
		{
		$total=$this->input->post('operasional')+$this->input->post('klaim')+$this->input->post('survey');
		
		$datakuitansi=array(	
		'id_kwitansi'=>$this->input->post('idkwitansi'),
		'no_kuasa'=>$row->no_kuasa,
		'id_surat_tugas'=>$row->id_surat_tugas,
		'tgl_kwitansi'=>$this->input->post('tgl'),
		'id_asuransi'=>$row->id_asuransi,
		'uang_survey'=>$this->input->post('survey'),
		'b_operasional'=>$this->input->post('operasional'),
		'gagal_klaim'=>$this->input->post('klaim'),
		'total'=>$total,
		'id_pegawai'=>$row->id_pegawai,
		);
		
		$survey=array('id'=>'','id_kwitansi'=>$this->input->post('idkwitansi'),'no_kwitansi_sr'=>$this->input->post('survey2'),'survey'=>$this->input->post('survey'),'status_survey'=>'0');
		$operasional=array('id'=>'','id_kwitansi'=>$this->input->post('idkwitansi'),'no_kwitansi_op'=>$this->input->post('operasional2'),'operasional'=>$this->input->post('operasional'),'status_operasional'=>'0');
		$klaim=array('id'=>'','id_kwitansi'=>$this->input->post('idkwitansi'),'no_kwitansi_kl'=>$this->input->post('klaim2'),'klaim'=>$this->input->post('klaim'),'status_klaim'=>'0');
		
		$this->model_app->insert('kwitansi',$datakuitansi);	
		$this->model_app->insert('survey',$survey);
		$this->model_app->insert('klaim',$klaim);
		$this->model_app->insert('operasional',$operasional);
		
		//ubah status LHS sudah dibuat kwitansi jadi ga nongol lagi saat ADD kwitansi
		$status_lhs['status']='1';
		$this->model_app->update('lhs','id_surat_tugas',$id_surat_tugas,$status_lhs);
		} 
		redirect('kwitansi/list_os');
		}
			
	}
	
			
  }
	
}


//---ubah status bayar
function lunas_survey(){
		$id=$this->uri->segment(3);
		$data=array(
		'status_survey'=>'1'
		);
		
		$this->model_app->update('survey','no_kwitansi',$id,$data);
		redirect('kwitansi/list_os');	
		}
		//---ubah status bayar
		function lunas_operasional(){
		$id=$this->uri->segment(3);
		$data=array(
		'status_operasional'=>'1'
		);
		
		$this->model_app->update('operasional','no_kwitansi',$id,$data);
		redirect('kwitansi/list_os');	
}

//---ubah status bayar
function lunas_klaim(){
	$id=$this->uri->segment(3);
	$data=array(
	'status_klaim'=>'1'
	);
	
		$this->model_app->update('klaim','no_kwitansi',$id,$data);
		redirect('kwitansi/list_os');	
	}
	
	
//---ubah status bayar
function bayar_biaya(){
		$id=$this->uri->segment(3);
		$data=array(
		'status_survey'=>'1'
		);
		
		$data=array(
		'title'=>'Pembayaran Biaya Kwitansi',
		'list'=>$this->model_app->select_id('kwitansi','id_kwitansi',$id),
		'view'=>'kwitansi/bayar_biaya'
		);
		$this->load->view('home',$data);
	}

//---ubah status bayar
function bayar_kwitansi(){
		$idst=$this->input->post('idkw');
		$nm_tertanggung=$this->input->post('nm_tertanggung');
	$uang_survey=$this->input->post('survey');
	$uang_operasional=$this->input->post('operasional');
	$uang_klaim=$this->input->post('klaim');
	 
if($uang_survey=='' or $uang_survey=='0'){ $survey['status_survey']='0';} else{$survey['status_survey']='1';}
if($uang_operasional=='' or $uang_operasional=='0'){ $operasional['status_operasional']='0';} else{$operasional['status_operasional']='1';}
if($uang_klaim=='' or $uang_klaim=='0'){ $klaim['status_klaim']='0';} else{$klaim['status_klaim']='1';}
		
	$this->form_validation->set_rules('survey','survey','trim|xss_clean|integer');
	$this->form_validation->set_rules('operasional','operasional','trim|xss_clean|integer');
	$this->form_validation->set_rules('klaim','klaim','trim|xss_clean|integer');
	
	if ($this->form_validation->run() == FALSE)
		{
			
		echo 'Gagal Simpan data,Harus berupa angka saja';	
		}
		else
		{
		$cekpembayaran=$this->model_app->cek_bayar('pembayaran_piutang','id_kwitansi',$idst);//cek kalo sudah ada di pembayaran piutang ubah
		if($cekpembayaran)
		{
		$dataubah=array(
		'uang_surveyor'=>$this->input->post('survey'),
		'uang_operasional'=>$this->input->post('operasional'),
		'uang_klaim'=>$this->input->post('klaim'),
		'insertime'=>date('d-m-Y:h:m:s'),
		);

		$this->model_app->update('pembayaran_piutang','id_kwitansi',$idst,$dataubah);
		$this->model_app->update('survey','id_kwitansi',$idst,$survey);
		$this->model_app->update('operasional','id_kwitansi',$idst,$operasional);
		$this->model_app->update('klaim','id_kwitansi',$idst,$klaim);
	}
	else
	{
		$databaru=array(
		'id_kwitansi'=>$idst,
		'uang_surveyor'=>$this->input->post('survey'),
		'uang_operasional'=>$this->input->post('operasional'),
		'uang_klaim'=>$this->input->post('klaim'),
		'insertime'=>date('d-m-Y:h:m:s'),
		);	
		
		$this->model_app->insert('pembayaran_piutang',$databaru);
		$this->model_app->update('survey','id_kwitansi',$idst,$survey);
		$this->model_app->update('operasional','id_kwitansi',$idst,$operasional);
		$this->model_app->update('klaim','id_kwitansi',$idst,$klaim);	
		}
		
		redirect('kwitansi/list_os');
		
		
	}

}
function edit_kwitansi(){
		$idst=$this->input->post('idkw');
		$nm_tertanggung=$this->input->post('nm_tertanggung');
	$survey=array('survey'=>$this->input->post('survey'));
	$operasional=array('operasional'=>$this->input->post('operasional'));
	$klaim=array('klaim'=>$this->input->post('klaim'));
	$total=$this->input->post('survey')+$this->input->post('operasional')+$this->input->post('klaim');
		
	$this->form_validation->set_rules('survey','survey','trim|xss_clean|integer');
	$this->form_validation->set_rules('operasional','operasional','trim|xss_clean|integer');
	$this->form_validation->set_rules('klaim','klaim','trim|xss_clean|integer');
	
	if ($this->form_validation->run() == FALSE)
		{
			
		echo 'Gagal Simpan data,Harus berupa angka saja';	
		}
		else
		{
		$dataubah=array(
		'uang_survey'=>$this->input->post('survey'),
		'b_operasional'=>$this->input->post('operasional'),
		'gagal_klaim'=>$this->input->post('klaim'),
		'total'=>$total,
		);
		
		
		$this->model_app->update('kwitansi','id_kwitansi',$idst,$dataubah);
		$this->model_app->update('survey','id_kwitansi',$idst,$survey);
		$this->model_app->update('operasional','id_kwitansi',$idst,$operasional);
		$this->model_app->update('klaim','id_kwitansi',$idst,$klaim);
		
		redirect('kwitansi/list_os');
		
	}

}

//--------Laporan Pembayaran-----------------------------------------------------
	  function laporan_os()
	{	
		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Kwitansi';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("where status_kwitansi='utang'");
		$data['list'] = $this->model_app->tampil_semua_kwitansi($limit,$offset,'utang');

		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='utang'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/laporan_os/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_os';
			 $this->load->view('home',$data);
	}

//-----TAMPIL MENURUT PERIODE -------------------
function pembayaran_periode(){
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
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,''),
        );
		}	
		else
		{
		 $data=array(
            'title'=>'data Surat Tugas global',
            'periode'=>$asurans.' Periode '.$bln.'-'.$thn,
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.id_asuransi='$asurans'"),
        );
		}
		$this->load->view('kwitansi/laporan_kwitansi_global',$data);
		
       //---------JIKA TOMBOL CARI YANG DITEKAN------------------
	}
	else
	{
		//--view menurut asuransus penjualan periode
		if($asurans=='semua')
		{
		$data['title']='Data History Pembayaran';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['list'] = $this->model_app->pembayaran_history($limit,$offset,$bln,$thn,'');
		$tot_hal = $this->model_app->hitung_isi_tabel('pembayaran_piutang','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/pembayaran_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_pembayaran';
			 $this->load->view('home',$data);	
		}
		//--menurut perusahaan asuransi
		else
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['list'] = $this->model_app->pembayaran_history($limit,$offset,$bln,$thn,"AND b.id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('surat_tugas','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/pembayaran_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_pembayaran';
			 $this->load->view('home',$data);	
			
		}

   	}
}

//-----TAMPIL MENURUT PERIODE -------------------
function lap_kwitansi_periode(){
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
		if($asurans=='semua' AND $status=='semua')
		{
        $data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>'Global '.' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah(""),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,""),
        );
		}	
		elseif($asurans=='semua' AND $status !='semua')
		{
			$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where status_kwitansi='$status'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.status_kwitansi='$status'"),
        );
		}
		elseif($asurans !='semua' AND $status=='semua')
		{
			$cari=$this->model_app->select1('asuransi','id_asuransi',$asurans);
		foreach($cari as $row){
		$nm=$row->nm_asuransi;	
		$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$nm.' - '.$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where id_asuransi='$asurans'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.id_asuransi='$asurans'"),
        );
		} }
		elseif($asurans !='semua' AND $status!='semua')
		{
			$cari=$this->model_app->select1('asuransi','id_asuransi',$asurans);
		foreach($cari as $row){
		$nm=$row->nm_asuransi;	
		$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$nm.' - '.$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where status_kwitansi='$status' AND id_asuransi='$asurans'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.status_kwitansi='$status' AND a.id_asuransi='$asurans'"),
        );
		} }
		
		ob_start();
		$content = $this->load->view('kwitansi/cetak_laporan_kw',$data);
		$content = ob_get_clean();	
		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4','en', false, 'ISO-8859-15', array(10,10,0,0));
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->setDefaultFont('Arial','9');  
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Laporan Kwitansi.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
			}
		
       //===============JIKA TOMBOL CARI YANG DITEKAN================
	}
	else
	{
	
		//--view semua asuransi dan semua status
		if($asurans=='semua' AND $status=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_kwitansi_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);	
		}
        //--view semua asuransi utang atau lunas
		elseif($asurans=='semua' AND $status !='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status'");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.status_kwitansi='$status'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_kwitansi_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);	
		}
		  //--view id_asuransi semua status
		elseif($asurans !='semua' AND $status=='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_kwitansi_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);	
		}
	//--view id_asuransi utang atau lunas
		elseif($asurans !='semua' AND $status!='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans' AND a.status_kwitansi='$status'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans' AND status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_kwitansi_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);	
			}

   	}
}

//-----TAMPIL MENURUT PERIODE ee-------------------
function lap_os_periode(){
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
		if($asurans=='semua' AND $status=='semua')
		{
        $data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>'Global '.' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah(""),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,""),
        );
		}	
		elseif($asurans=='semua' AND $status !='semua')
		{
			$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where status_kwitansi='$status'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.status_kwitansi='$status'"),
        );
		}
		elseif($asurans !='semua' AND $status=='semua')
		{
			$cari=$this->model_app->select1('asuransi','id_asuransi',$asurans);
		foreach($cari as $row){
		$nm=$row->nm_asuransi;	
		$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$nm.' - '.$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where id_asuransi='$asurans'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.id_asuransi='$asurans'"),
        );
		} }
		elseif($asurans !='semua' AND $status!='semua')
		{
			$cari=$this->model_app->select1('asuransi','id_asuransi',$asurans);
		foreach($cari as $row){
		$nm=$row->nm_asuransi;	
		$data=array(
            'title'=>'Laporan Kwitansi',
            'periode'=>$nm.' - '.$status .' Periode '.$bln.'-'.$thn,
            'sub'=> $this->model_app->sub_jumlah("where status_kwitansi='$status' AND id_asuransi='$asurans'"),
            'list'=> $this->model_app->tampil_laporan_cetak($bln,$thn,"AND a.status_kwitansi='$status' AND a.id_asuransi='$asurans'"),
        );
		} }
		
		///////////////////////////////////////////////////////////
		//mencetak document dalam PDF
		ob_start();
		$content = $this->load->view('kwitansi/laporan_os_cetak',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('laporan penjualan.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
			}
			////////////////////////////////////
		//$this->load->view('kwitansi/laporan_kwitansi_cetak',$data);
		
       //===============JIKA TOMBOL CARI YANG DITEKAN================
	}
	
	else
	{
	
		//--view semua asuransi dan semua status
		if($asurans=='semua' AND $status=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_os';
			 $this->load->view('home',$data);	
		}
        //--view semua asuransi utang atau lunas
		elseif($asurans=='semua' AND $status !='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status'");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.status_kwitansi='$status'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_os';
			 $this->load->view('home',$data);	
		}
		  //--view id_asuransi semua status
		elseif($asurans !='semua' AND $status=='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_os';
			 $this->load->view('home',$data);	
		}
	//--view id_asuransi utang atau lunas
		elseif($asurans !='semua' AND $status!='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans' AND a.status_kwitansi='$status'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans' AND status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/lap_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_os';
			 $this->load->view('home',$data);	
			}

   	}
	
	}

//-----TAMPIL MENURUT PERIODE -------------------
function list_os_periode(){
	
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
		if($asurans=='semua' AND $status=='semua')
		{
		$data['title']='Data List Surat Tugas';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/list_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_list_os';
			 $this->load->view('home',$data);	
		}
        //--view semua asuransi utang atau lunas
		elseif($asurans=='semua' AND $status !='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status'");
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.status_kwitansi='$status'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/list_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_list_os';
			 $this->load->view('home',$data);	
		}
		  //--view id_asuransi semua status
		elseif($asurans !='semua' AND $status=='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/list_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_list_os';
			 $this->load->view('home',$data);	
		}
	//--view id_asuransi utang atau lunas
		elseif($asurans !='semua' AND $status!='semua')
		{
		$data['title']='Data List OS';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['list'] = $this->model_app->tampil_periode($limit,$offset,$bln,$thn,"AND a.id_asuransi='$asurans' AND a.status_kwitansi='$status'");
		$data['sub'] = $this->model_app->sub_jumlah("WHERE left(tgl_kwitansi,2)='$bln' AND right(tgl_kwitansi,4)='$thn' AND status_kwitansi='$status' AND id_asuransi='$asurans'");
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where id_asuransi='$asurans' AND status_kwitansi='$status'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/list_os_periode/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_list_os';
			 $this->load->view('home',$data);	
		}


   	}
}


//--------Laporan Pembayaran-----------------------------------------------------
	  function lunas_kwitansi()
	{	
		$idst=$this->uri->segment(3);
		$dataubah=array(
		'status_kwitansi'=>'lunas'
		);
		$datast=array(
		'status'=>'1'
		);
		
       $this->model_app->update('kwitansi','id_surat_tugas',$idst,$dataubah);
       $this->model_app->update('surat_tugas','id_surat_tugas',$idst,$datast);

		redirect('kwitansi/list_os');
		
	}

//--------for paging limit------------------------------------------------------
	  function status_kwitansi()
	{	
		$status=$this->input->post('status');
		
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data List Kwitansi';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();

		$data['list'] = $this->model_app->tampil_semua_kwitansi($limit,$offset,$status);
		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi','');
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/status_kwitansi/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);
		
	}


	//===========Pencarian kwitansi====================
function cari_lap_st()
{	
$id=$this->input->post('st');	
 if($this->session->userdata('login_status') == TRUE ){
		$data=array(
		'asuransi' =>$this->model_app->selectall('asuransi'),
		'det_kw'=> $this->model_app->tampil_detail_kwitansi(),
		'sub' =>$this->model_app->sub_jumlah(""),
		'list'=> $this->model_app->selected('kwitansi',"where a.id_surat_tugas='$id'"),
		'view'=>'kwitansi/v_laporan_kwitansi'
		);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
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
	//===========Pencarian kwitansi====================
function cari_list_os()
{	

$id=$this->input->post('st');	
 if($this->session->userdata('login_status') == TRUE ){
		$data=array(
		'asuransi' =>$this->model_app->selectall('asuransi'),
		'sub' =>$this->model_app->sub_jumlah("where status_kwitansi='utang'"),
		'det_kw'=> $this->model_app->tampil_detail_kwitansi(),
		'list'=> $this->model_app->selected('kwitansi',"where a.id_surat_tugas='$id'"),
		'view'=>'kwitansi/v_list_os'
		);
	 $this->load->view('home',$data); 
 }
 else
 {
 redirect('login');
 }
}
//--------for paging limit------------------------------------------------------
	  function laporan_kwitansi()
	{	
		$page=$this->uri->segment(3);
      	$limit=50;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['title']='Data Lap Kwitansi';
		$data['asuransi'] = $this->model_app->selectall('asuransi');
		$data['det_kw'] = $this->model_app->tampil_detail_kwitansi();
		$data['sub'] = $this->model_app->sub_jumlah("where status_kwitansi='utang'");
		$data['list'] = $this->model_app->tampil_semua_kwitansi($limit,$offset,'utang');

		$tot_hal = $this->model_app->hitung_isi_tabel('kwitansi',"where status_kwitansi='utang'");
		
			//create for pagination		
			$config['base_url'] = base_url() . 'kwitansi/laporan_kwitansi/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();

			$data['view']='kwitansi/v_laporan_kwitansi';
			 $this->load->view('home',$data);
		
	}


}