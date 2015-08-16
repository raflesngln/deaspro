<?php
class Login extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//=====================login member cek============================
    function login($table,$username,$password) {
		
	$query=$this->db->query("select*from ".$table." where username='$username' and password='$password'");		
	return $query->result();
    }

}