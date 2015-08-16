<?php
class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//=====================login member cek============================
    function login($table,$username,$password) {
		
	$query=$this->db->query("select*from ".$table." where username='$username' and password='$password'");		
	return $query->result();
    }
	
//    KODE PENJUALAN
    public function getKodekwitansi()
    {
        $query = $this->db->query("select MAX(RIGHT(id_kwitansi,4)) as kd_max from kwitansi");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return "KW-".date('dmy').'-'.$kd;
    }

	
//=================== DELETEA ===============================

		function delete_data($table,$kolom,$id)
	{
		$this->db->where($kolom,$id);
		$this->db->delete($table);
	}	
//=================== select1 ===============================

		function select1($table,$kolom,$id)
	{
		 $query = $this->db->query("select*from $table where $kolom='$id'");
		return $query->result();
	}	
//========================INSERT ========================
public function insert($table,$data) {
	 $this->db->insert($table,$data);
    }
//=====================get data all============================
    public function selectall($tabel)
    {
        $query = $this->db->query("select*from ".$tabel."");
		return $query->result();
    }
	//=====================get data all============================
    public function getdata($tabel,$where)
    {
        $query = $this->db->query("select*from ".$tabel." $where");
		return $query->result();
    }

//=====================get data all============================
    public function select_id($tabel,$kolom,$id)
    {
        $query = $this->db->query("select*from ".$tabel." a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi
		inner join lhs c on a.id_surat_tugas=c.id_surat_tugas
		inner join surveyor d on a.id_pegawai=d.id_pegawai
		where a.".$kolom."='$id' AND c.surveyor_app='1' AND c.manager_app='1' And c.status='0'");
		return $query->result();
    }


//=====================get data all============================
    public function cek_bayar($tabel,$kolom,$id)
    {
        $query = $this->db->query("select*from ".$tabel."
		where ".$kolom."='$id'");
		return $query->result();
    }
	
//====================UPDATE data=====================================	 
	    function update($table,$kolom,$id,$data)
	    {
	      $this->db->where($kolom,$id);
	       $ubah= $this->db->update($table,$data);
			return $ubah;
	    }
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_kwitansi($limit,$offset,$status)
	{
		$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		left join pembayaran_piutang g on a.id_kwitansi=g.id_kwitansi
		where a.status_kwitansi='$status'
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
	//===============VIEW kwitansi WITH PAGING=============================
		function sub_jumlah($where)
	{
		$query = $this->db->query("select sum(uang_survey) as jumlah1,sum(b_operasional) as jumlah2,sum(gagal_klaim) as jumlah3 from kwitansi $where
		");
	
		return $query->result();
	}
	//=====================get data all============================
    public function tampil_detail_kwitansi()
    {
        $query = $this->db->query("select*from pembayaran_piutang a
		right join kwitansi b on a.id_kwitansi=b.id_kwitansi
		inner join surat_tugas c on b.id_surat_tugas=c.id_surat_tugas
		");
		return $query->result();
    }
//===============VIEW kwitansi WITH PAGING=============================
		function laporan_os($limit,$offset,$where)
	{
	$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		left join pembayaran_piutang g on a.id_kwitansi=g.id_kwitansi
		$where
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_periode($limit,$offset,$bln,$thn,$where)
	{
		$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		left join pembayaran_piutang g on a.id_kwitansi=g.id_kwitansi
		WHERE left(a.tgl_kwitansi,2)='$bln' AND right(a.tgl_kwitansi,4)='$thn' $where
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi cetak=============================
		function tampil_laporan_cetak($bln,$thn,$where)
	{
		$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		inner join surveyor g on a.id_pegawai=g.id_pegawai
		left join pembayaran_piutang h on a.id_kwitansi=h.id_kwitansi
		WHERE left(a.tgl_kwitansi,2)='$bln' AND right(a.tgl_kwitansi,4)='$thn' $where
		order by a.id_kwitansi DESC");
		return $q->result();
	}

//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_pembayaran($limit,$offset)
	{
		$q = $this->db->query("SELECT * from pembayaran_piutang
		order by id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW Pembayaran history WITH PAGING=============================
		function pembayaran_history($limit,$offset,$bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from pembayaran_piutang a
		inner join kwitansi b on a.id_kwitansi=b.id_kwitansi
		inner join asuransi c on b.id_asuransi=c.id_asuransi
		WHERE mid(a.insertime,6,2)='$bln' AND left(a.insertime,4)='$thn' $ass
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
//=============== Hitung isi tabel periode===============================
		function hitung_isi_tabel_periode($tabel,$seleksi,$bln,$thn)
	{
		$q = $this->db->query("SELECT * from $tabel where mid(tgl_kwitansi,6,2)='$bln' AND left(tgl_kwitansi,4)='$thn' $seleksi");
		return $q;
	}
//=============== Hitung isi tabel periode===============================
		function hitung_isi_tabel_customer($tabel,$seleksi,$bln,$thn,$cust)
	{
		$q = $this->db->query("SELECT * from $tabel where mid(tgl_kwitansi,6,2)='$bln' AND left(tgl_kwitansi,4)='$thn' AND insuranceid='$cust' $seleksi");
		return $q;
	}

///////////laporan periode semua customer bulanan///////////////
function lap_periode_semua($limit,$offset,$bln,$thn){
        $sql=$this->db->query("SELECT * from kwitansi a 
		inner join job b on a.nosurat=b.nosurat 
		inner join insurance c on a.insuranceid=c.insuranceid
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		where mid(a.tgl_kwitansi,6,2)='$bln' AND left(a.tgl_kwitansi,4)='$thn'
		order by a.id_kwitansi DESC LIMIT $offset,$limit
                ");
return $sql->result();
    }
///////////laporan periode menurut custo,er///////////////
function lap_periode_customer($limit,$offset,$bln,$thn,$cust){
        $sql=$this->db->query("SELECT * from kwitansi a 
		inner join job b on a.nosurat=b.nosurat 
		inner join insurance c on a.insuranceid=c.insuranceid
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		where mid(a.tgl_kwitansi,6,2)='$bln' AND left(a.tgl_kwitansi,4)='$thn' AND a.insuranceid='$cust'
		order by a.id_kwitansi DESC LIMIT $offset,$limit");

				return $sql->result();
    }


//===============VIEWsrat kuasa donotan============================
		function tampil_semua_sk($limit,$offset,$where)
	{
		$q = $this->db->query("SELECT * from data_upload a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi
		$where
		order by a.id_upload DESC LIMIT $offset,$limit");
		return $q->result();
	}

//=====================get data all============================
    public function detail_kuasa($where)
    {
        $query = $this->db->query("select* from file_upload a
		left join data_upload b on a.id_upload=b.id_upload
		$where
		");
		return $query->result();
    }
//=====================get data all============================
    public function selected($tabel,$where)
    {	
		$q = $this->db->query("SELECT * from ".$tabel." a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		left join pembayaran_piutang g on a.id_kwitansi=g.id_kwitansi
		$where
		order by a.id_kwitansi");
		return $q->result();
    }
	
	//=====================get data all============================
    public function selectedid($tabel,$where)
    {
        $query = $this->db->query("select*from ".$tabel." a
		right join asuransi c on a.id_asuransi=c.id_asuransi
		 $where ");
		return $query->result();
    }
		
//    KODE jurnal
    public function kode()
    {
        $query = $this->db->query("select MAX(id_parent) as kd_max from akun");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd =$tmp;
            }
        }
        else
        {
            $kd = "0001";
        }
        return $kd;
    }	
	//    KODE jurnal
    public function kodejurnal()
    {
        $query = $this->db->query("select MAX(RIGHT(id_jurnal,5)) as kd_max from jurnal");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd ='TR-'. sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = 'TR-'."00001";
        }
        return $kd;
    }
	
			
}