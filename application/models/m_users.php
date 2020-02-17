<?php
	class m_users extends CI_Model{
		//deklarasi
		public $no_id_pembeli;
		public $no_id_penjual;
		public $nama;
		public $alamat;
		public $username;
		public $password;
		public $no_hp;
		public function getAllPembeli($id){
			return $this->db->query("SELECT * FROM pembeli where no_id_pembeli = '$id'")->result();
		}
		public function getAllPenjual($id_penjual){
			return $this->db->query("SELECT * FROM penjual where no_id_penjual = '$id_penjual'")->result();
		}
		public function simpan_data($table, $data){
			$this->db->insert($table,$data);
		}
		public function edit_data($where, $table){
			return $this->db->get_where($table,$where);
		}
		public function update_data($where, $data, $table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>