<?php
	class m_buah extends CI_Model{
		//deklarasi
		public $id_buah;
		public $nama_buah;
		public $jenis_buah;
		public $harga;
		public $stock;
		public $id_penjual;
		
		public function getAll(){
			//return $this->db->get($this->_table)->result();
			return $this->db->query("SELECT * FROM buah")->result();
		}
		public function getByBuah($table,$id_buah){
			//return $this->db->get_where($this->_table, ["id_buah" => $id_buah]) -> row();	
			return $this->db->get_where($table,$id_buah);
			//return $this->db->query("SELECT * FROM buah where id_buah = '$id_buah'");
		}
		public function getBydata($id_buah){
			$this->db->select('*');
			$this->db->from('buah');
			$this->db->join('penjual','buah.id_penjual=penjual.no_id_penjual');
			$this->db->where($id_buah);
			$query = $this->db->get();
			return $query->result();
		}
		public function getBydata_penjual($id_penjual){
			//$this->db->select('*');
			//$this->db->from('buah');
			//$this->db->join('penjual','buah.id_penjual=penjual.no_id_penjual');
			//$this->db->where($id_penjual);
			//$query = $this->db->get();
			//return $query->result();
			return $this->db->query("SELECT * FROM buah where id_penjual = '$id_penjual'")->result();
		}
		public function search($where){
			$this->db->select('*');
			$this->db->from('buah');
			$this->db->like('nama_buah',$where);
			$this->db->or_like('jenis_buah',$where);
			return $this->db->get()->result();
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
		public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
		}
	}
?>