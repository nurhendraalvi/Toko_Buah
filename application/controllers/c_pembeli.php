<?php
	class c_pembeli extends CI_Controllers{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pembeli');
			$this->load->library('form_validation');
			//$this->load->helper('url');
		}
		public function tambah(){
			//$this->load->view("admin/peserta/v_new_form_peserta.php"); //akses GUI form
		}
		public function simpan_aksi(){
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat']
				$username = $_POST['username'];
				$pass = $_POST['password'];
				$no_hp = $_POST['no_hp'];
				$data = array(
					//'no_id_pembeli' => '',
					'Nama' => $nama,
					'Alamat' => $alamat,
					'username' => $username,
					'password' => $pass,
					'no_hp' => $no_hp, 
				);
				$input = $this->m_pembeli->simpan_data('pembeli', $data);
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
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat']
				$username = $_POST['username'];
				$pass = $_POST['password'];
				$no_hp = $_POST['no_hp'];
				$data = array(
					//'no_id_pembeli' => '',
					'Nama' => $nama,
					'Alamat' => $alamat,
					'username' => $username,
					'password' => $pass,
					'no_hp' => $no_hp,
				);
			$where = array('no_id_pembeli' => $no_id_pembeli);
			$this->m_pembeli->update_data($where, $data,'pembeli');
			//redirect(site_url('c_peserta/index'));
		}
	}
?>