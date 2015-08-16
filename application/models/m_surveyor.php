<?php
class M_surveyor extends CI_Model{
    function __construct(){
        parent::__construct();
    }

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

//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_st($limit,$offset,$id,$level)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join asuransi b on a.id_asuransi=b.id_asuransi 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		where c.id_pegawai='$id' AND c.level='$level'
		order by a.id_surat_tugas DESC LIMIT $offset,$limit");
		return $q->result();
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
//====================UPDATE data=====================================	 
	    function update($table,$kolom,$id,$data)
	    {
	      $this->db->where($kolom,$id);
	       $ubah= $this->db->update($table,$data);
			return $ubah;
	    }
//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}
}