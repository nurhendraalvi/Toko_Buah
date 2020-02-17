<?php
	class m_penjual extends CI_Model{
		//deklarasi
		public $no_id_penjual;
		public $nama_toko;
		public $username;
		public $password;
		
		public function simpan_data($table, $data){
			$this->db->insert($table,$data);
		}
		public function update_data($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>