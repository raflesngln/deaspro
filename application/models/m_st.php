<?php
class M_st extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     //kode surat tugas
    public function getKodest()
    {
        $query = $this->db->query("select MAX(RIGHT(id_surat_tugas,4)) as kd_max from surat_tugas");
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
        return "ST-".date('dmy').'-'.$kd;
    }
 //kode LHS
    public function getKodelhs()
    {
        $query = $this->db->query("select MAX(RIGHT(id_lhs,4)) as kd_max from lhs");
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
        return "LHS-".date('dmy').'-'.$kd;
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
        $query = $this->db->query("select*from ".$tabel." where ".$kolom."='$id'");
		return $query->result();
    }
//=====================get data all============================
    public function edit_st($id)
    {
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		where a.id_surat_tugas='$id'
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
		function tampil_semua_st($limit,$offset)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		order by id_surat_tugas DESC LIMIT $offset,$limit");
		return $q->result();
	}
	//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_sttt($limit,$offset)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		where a.status='0'
		order by id_surat_tugas DESC LIMIT $offset,$limit");
		return $q->result();
	}
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_periode($limit,$offset,$bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		where left(a.tgl_surat_tugas,2)='$bln' AND right(a.tgl_surat_tugas,4)='$thn' $ass 
		order by a.id_surat_tugas DESC LIMIT $offset,$limit");
		return $q->result();
	}
function tampil_laporan_cetak($bln,$thn,$ass)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		right join asuransi b on a.id_asuransi=b.id_asuransi 
		right join surveyor c on a.id_pegawai=c.id_pegawai
		where a.status='0' AND left(a.tgl_surat_tugas,2)='$bln' AND right(a.tgl_surat_tugas,4)='$thn' $ass
		order by a.id_surat_tugas");
		return $q->result();
	}
//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
}