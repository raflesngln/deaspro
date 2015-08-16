<?php
class M_lhs extends CI_Model{
    function __construct(){
        parent::__construct();
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
        $query = $this->db->query("select*from ".$tabel." where ".$kolom."='$id'");
		return $query->result();
    }
        public function getdata($tabel,$where)
    {
        $query = $this->db->query("select*from ".$tabel." $where");
		return $query->result();
    }
//=====================get data all============================
    public function edit_lhs($id)
    {
		$q = $this->db->query("SELECT * from surat_tugas a
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi 
		inner join surveyor d on a.id_pegawai=d.id_pegawai
		where b.id_lhs='$id'
		");
		return $q->result();
    }
//=====================get data all============================
    public function cari_lhs($id)
    {
		$q = $this->db->query("SELECT * from surat_tugas a
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join asuransi c on a.id_asuransi=c.id_asuransi 
		inner join surveyor d on a.id_pegawai=d.id_pegawai
		where b.id_surat_tugas='$id'
		");
		return $q->result();
    }
//====================UPDATE data=====================================	 
	    function update($table,$kolom,$id,$data)
	    {
	      $this->db->where($kolom,$id);
	       $ubah= $this->db->update($table,$data);
			return $ubah;
	    }
//=================== DELETEA ===============================

		function delete_data($table,$kolom,$id)
	{
		$this->db->where($kolom,$id);
		$this->db->delete($table);
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_lhs($limit,$offset,$where)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		inner join asuransi d on a.id_asuransi=d.id_asuransi
		$where
		order by b.id_lhs DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_periode($limit,$offset,$status,$bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		inner join asuransi d on a.id_asuransi=d.id_asuransi
		where b.surveyor_app='$status' AND left(a.tgl_surat_tugas,2)='$bln' AND right(a.tgl_surat_tugas,4)='$thn' $ass
		order by b.id_lhs DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function lhs_cetak($bln,$thn,$status,$ass)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		inner join asuransi d on a.id_asuransi=d.id_asuransi
		where b.surveyor_app='$status' AND left(a.tgl_surat_tugas,2)='$bln' AND right(a.tgl_surat_tugas,4)='$thn' $ass
		order by b.id_lhs DESC");
		return $q->result();
	}

//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
}