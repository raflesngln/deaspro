<?php
class M_master extends CI_Model{
    function __construct(){
        parent::__construct();
    }
public function getKodepg()
    {
        $query = $this->db->query("select MAX(RIGHT(id_pegawai,3)) as kd_max from pegawai");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return "PG-".$kd;
    }
//========================INSERT ========================
public function insert($table,$data) {
	 $this->db->insert($table,$data);
    }
//=====================get data selecting============================
    public function selectall($tabel)
    {
        $query = $this->db->query("select*from ".$tabel."");
		return $query->result();
    }
//=====================get data selecting============================
    public function select_id($tabel,$kolom,$id)
    {
        $query = $this->db->query("select*from ".$tabel." where ".$kolom."='$id'");
		return $query->result();
    }
		//=====================get data all============================
    public function getdata($tabel,$where)
    {
        $query = $this->db->query("select*from ".$tabel." $where");
		return $query->result();
    }
//=================== DELETEA ===============================

		function delete_data($table,$kolom,$id)
	{
		$this->db->where($kolom,$id);
		$this->db->delete($table);
	}
//=================== UPdate ===============================

		function update_data($table,$kolom,$id,$data)
	{
		$this->db->where($kolom,$id);
		$this->db->update($table,$data);
	}
//=====================================================================
//===============VIEW kwitansi WITH PAGING=============================
		function tampil_semua_pegawai($limit,$offset)
	{
		$q = $this->db->query("SELECT * from pegawai
		order by id_pegawai DESC LIMIT $offset,$limit");
		return $q->result();
	}
	
//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}

}