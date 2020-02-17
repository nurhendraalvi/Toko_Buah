<?php
	class c_login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('m_login');
		}
		public function index(){
			$this->load->view('user/profile_no_login');
		}
		public function auth(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cek_pembeli = $this->m_login->pembeli($username, $password);
			if ($cek_pembeli->num_rows() > 0) { //jika petugas
				$data = $cek_pembeli->row_array();
				$this->session->set_userdata('masuk', TRUE);
				$this->session->set_userdata('akses','1');
				$this->session->set_userdata('ses_id', $data['username']);
				$this->session->set_userdata('ses_id_pembeli', $data['no_id_pembeli']);
				$this->session->set_userdata('ses_nama', $data['Nama']);
				$this->session->set_userdata('ses_alamat', $data['Alamat']);
				redirect(site_url('c_users/profile'));
			} else { // peserta
				$cek_penjual = $this->m_login->penjual($username, $password);
				if ($cek_penjual->num_rows() > 0) {
					$data = $cek_penjual->row_array();
					$this->session->set_userdata('masuk', TRUE);
					 $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id', $data['username']);
					$this->session->set_userdata('ses_id_penjual', $data['no_id_penjual']);
					$this->session->set_userdata('ses_nama_toko', $data['nama_toko']);
					//echo "<script>alert('data telah tersimpan'</script>";
					redirect(site_url('c_users/profile'));
				} 
			}
		}
		public function logout(){
			$this->session->sess_destroy();
			$url = base_url('');
			redirect(site_url('c_buah/home'));
		}
	}
?>