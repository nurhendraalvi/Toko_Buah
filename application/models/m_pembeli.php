<?php
	class m_pembeli extends CI_Model{
		//deklarasi
		public $no_id_pembeli;
		public $nama;
		public $alamat;
		public $username;
		public $password;
		public $no_hp;
		
		public function simpan_data($table, $data){
			$this->db->insert($table,$data);
		}
		public function update_data($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>