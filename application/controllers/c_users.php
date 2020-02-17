<?php
	class c_users extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_users');
			$this->load->library('form_validation');
			//$this->load->helper('url');
		}
		public function index()
		{ 
			$id = $this->session->userdata('ses_id_pembeli');
			$data['pembeli'] = $this->m_users->getAllPembeli($id); //panggil sql select
			$this->load->view("transaksi/v_form_transaksi", $data); //admin
		}
		public function index2()
		{ 
			$id = $this->session->userdata('ses_id_penjual');
			$data['pembeli'] = $this->m_users->getAllPembeli($id); //panggil sql select
			$this->load->view("transaksi/v_form_transaksi", $data);
		}
		public function profile(){
			if ($this->session->userdata('akses')=='1') {
				$id = $this->session->userdata('ses_id_pembeli');
				$data['pembeli'] = $this->m_users->getAllPembeli($id);
				$this->load->view("User/profile_login_pembeli", $data); //akses GUI form
			} else if ($this->session->userdata('akses')=='2'){
				$id_penjual = $this->session->userdata('ses_id_penjual');
				$data['penjual'] = $this->m_users->getAllPenjual($id_penjual);
				$this->load->view("User/profile_login_penjual", $data); //akses GUI form
			} else {
				$this->load->view("User/profile_no_login.php"); //akses GUI form
			}
		}
		
		public function home(){
			$this->load->view("User/home"); //akses GUI form
		}
		public function tambah(){
			$this->load->view("User/v_users"); //akses GUI form
		}
		public function simpan_aksi(){
				$nama = $this->input->post('name'); 
				//$_POST['name'];
				//echo $nama;
				$alamat = $this->input->post('address');
				//$_POST['address'];
				$username = $this->input->post('email'); 
				//$_POST['email'];
				$pass = $this->input->post('pass'); 
				//$_POST['pass'];
				$no_hp = $this->input->post('tlp'); 
				//$_POST['tlp'];
				$user_id = $this->input->post('user_id'); 
				//$_POST['user_id'];
				if ($user_id == 'Pembeli') {
					$data = array(
					//'no_id_pembeli' => '',
					'Nama' => $nama,
					'Alamat' => $alamat,
					'username' => $username,
					'password' => $pass,
					'no_hp' => $no_hp,
					);
					$input = $this->m_users->simpan_data('pembeli', $data);
					if ($input) {
						echo "<script>alert('data telah tersimpan'</script>";
						redirect(site_url('c_users/home'));
						//$this->load->view("User/profile_no_login.php"); 
					}
					else {
						echo "<script>alert('anda belum beruntung')</script>";
						//$this->load->view("User/v_users");
						redirect(site_url('c_users/home'));
					}
				} else if ($user_id == 'Penjual'){
					$data = array(
					'nama_toko' => $nama,
					'alamat_toko' => $alamat,
					'username_p' => $username,
					'password' => $pass,
					'no_tlp_toko' => $no_hp,
					);
					$input = $this->m_users->simpan_data('penjual', $data);
						if ($input) {
							echo "<script>alert('data telah tersimpan'</script>";
							redirect(site_url('c_users/home'));
							//$this->load->view("User/profile_no_login.php"); 
						}
						else {
							echo "<script>alert('anda belum beruntung')</script>";
							//$this->load->view("User/v_users");
							redirect(site_url('c_users/home'));
						}
					}
				}
		public function edit($id){
				$where = array ('no_id_pembeli' => $id);
				$data['pembeli'] = $this->m_users->edit_data($where, "pembeli")->result();
				$this->load->view('User/profile_login_edit.php',$data);
		}
		public function edit_penjual($id){
				$where = array ('no_id_penjual' => $id);
				$data['penjual'] = $this->m_users->edit_data($where, "penjual")->result();
				$this->load->view('User/profile_login_edit_penjual.php',$data);
		}
		public function update(){
				$no_id_pembeli = $_POST['id'];
				$nama = $_POST['name'];
				$alamat = $_POST['address'];
				$username = $_POST['email'];
				$pass = $_POST['pass'];
				$no_hp = $_POST['tlp'];
				$data = array(
					//'no_id_pembeli' => '',
					'Nama' => $nama,
					'Alamat' => $alamat,
					'username' => $username,
					'password' => $pass,
					'no_hp' => $no_hp,
				);
			$where = array('no_id_pembeli' => $no_id_pembeli);
			$this->m_users->update_data($where, $data,'pembeli');
			redirect(site_url('c_users/home'));
		}
		public function update_penjual(){
				$no_id_penjual = $_POST['id'];
				$nama = $_POST['name'];
				$alamat = $_POST['address'];
				$username = $_POST['email'];
				$pass = $_POST['pass'];
				$no_hp = $_POST['tlp'];
				$data = array(
					'nama_toko' => $nama,
					'alamat_toko' => $alamat,
					'username_p' => $username,
					'password' => $pass,
					'no_tlp_toko' => $no_hp,
					);
			$where = array('no_id_penjual' => $no_id_penjual);
			$this->m_users->update_data($where, $data,'penjual');
			redirect(site_url('c_users/home'));
		}
	}
?>