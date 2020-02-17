<?php
	class m_login extends CI_Model{
		private $username;
		private $password;
		//cek login pembeli
		public function pembeli($username,$password){
			$query = $this->db->query("SELECT * FROM pembeli WHERE username = '$username' AND password = '$password'");
			return $query;
		}
		// cek login penjual
		public function penjual($username,$password){
			$query = $this->db->query("SELECT * FROM penjual WHERE username_p = '$username' AND password = '$password'");
			return $query;
		}	
	}
?>