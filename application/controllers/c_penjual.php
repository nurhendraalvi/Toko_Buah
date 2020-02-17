<?php
	class c_penjual extends CI_Controllers{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_penjual');
			$this->load->library('form_validation');
			//$this->load->helper('url');
		}
		public function tambah(){
			//$this->load->view("admin/peserta/v_new_form_peserta.php"); //akses GUI form
		}
		public function simpan_aksi(){
				$nama_toko = $_POST['nama_toko'];
				$username = $_POST['username'];
				$pass = $_POST['password'];
				$data = array(
					'no_id_penjual' => '',
					'nama_toko' => $nama_toko,
					'username' => $username,
					'password' => $pass
				);
				$input = $this->m_penjual->simpan_data('penjual', $data);
				if ($input >= 1) {
					echo "<script>alert('data telah tersimpan'</script>";
					//redirect(site_url('c_peserta/index'));
				}
				else {
					echo "<script>alert('anda belum beruntung')</script>";
					//redirect(site_url('c_peserta/index'));
				}
		}

		public function update(){
				$nama_toko = $_POST['nama_toko'];
				$username = $_POST['username'];
				$pass = $_POST['password'];
				$data = array(
					//'no_id_penjual' => '',
					'nama_toko' => $nama_toko,
					'username' => $username,
					'password' => $pass
				);
			$where = array('no_id_penjual' => $no_id_penjual);
			$this->m_penjual->update_data($where, $data,'penjual');
			//redirect(site_url('c_peserta/index'));
		}
	}
?>