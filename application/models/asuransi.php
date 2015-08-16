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
    public function tampil_detail_kwitansi()
    {
        $query = $this->db->query("select*from pembayaran_piutang
		right join kwitansi on kwitansi.id_kwitansi=pembayaran_piutang.id_kwitansi
		");
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
		where a.status_kwitansi='$status'
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_global_kwitansi($limit,$offset,$where)
	{
	$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		where status_kwitansi='utang'
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_periode($limit,$offset,$bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		WHERE mid(a.tgl_kwitansi,6,2)='$bln' AND left(a.tgl_kwitansi,4)='$thn' $ass
		order by a.id_kwitansi DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi cetak=============================
		function tampil_laporan_cetak($bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from kwitansi a 
		inner join surat_tugas b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi
		inner join klaim d on a.id_kwitansi=d.id_kwitansi
		inner join operasional e on a.id_kwitansi=e.id_kwitansi
		inner join survey f on a.id_kwitansi=f.id_kwitansi
		WHERE mid(a.tgl_kwitansi,6,2)='$bln' AND left(a.tgl_kwitansi,4)='$thn' $ass
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

}