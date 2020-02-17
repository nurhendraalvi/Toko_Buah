<?php
	class m_pembelian extends CI_Model{
		//deklarasi
		public $id_buah;
		public $nama_buah;
		public $jenis_buah;
		public $harga;
		public $stock;
		public $id_penjual;
		
		public function getAll($id){
			//return $this->db->get($this->_table)->result();
			return $this->db->query("SELECT a.*, b.* FROM transaksi a INNER JOIN pembeli b on a.no_id_pembeli = b.no_id_pembeli where a.no_id_pembeli = '$id'")->result();
			//$this->db->select('*');
			//$this->db->from('transaksi');
			//$this->db->join('pembeli','transaksi.no_id_pembeli=pembeli.no_id_pembeli');
			//$this->db->where($id);
			//$query = $this->db->get();
			//return $query->result();
		}
		public function getByTransaksi($where){
			//return $this->db->get_where($this->_table, ["id_buah" => $id_buah]) -> row();	
			//return $this->db->get_where($table,$where);
			//return $this->db->query("SELECT * FROM transaksi where no_id_penjual = '$where'");
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('pembeli','transaksi.no_id_pembeli=pembeli.no_id_pembeli');
			$this->db->join('penjual','transaksi.no_id_penjual=penjual.no_id_penjual');
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
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