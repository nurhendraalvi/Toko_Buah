<?php
	class c_buah extends CI_Controller{
		public function __construct()
		{ 
			parent::__construct();
			$this->load->model('m_buah');
			$this->load->library('form_validation');
			//$this->load->helper('url');
		}
		public function home(){
			$this->load->view("User/home");
		}
		public function index()
		{ 
			$data['buah'] = $this->m_buah->getAll(); //panggil sql select
		 if($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2'){
			$this->load->view("buah/v_list_buah", $data); //admin
		} else {
		 	$this->load->view("buah/v_list_buah", $data);
		 }
		}
		public function index2($id_buah){
			$where = array('id_buah' => $id_buah);
			$data['buah'] = $this->m_buah->getBydata($where);
			if ($this->session->userdata('akses')=='1'||$this->session->userdata('akses')=='2') {
				$this->load->view('buah/v_detail_buah',$data);
			} else {
				//$where = array ('id_buah' => $id_buah);
				//$data['buah'] = $this->m_buah->getBydata($where)->result();
				$this->load->view('buah/v_detail_buah',$data);
			}
		}
		public function index3(){
			if ($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2') {
				$where = $this->input->post('cari');
				$data['buah'] = $this->m_buah->search($where);
				$this->load->view('buah/v_list_cari',$data);
			} else {
				$where = $this->input->post('cari');
				$data['buah'] = $this->m_buah->search($where);
				$this->load->view('buah/v_list_cari',$data);
			}
		}
		public function index4(){
			if ($this->session->userdata('akses')=='2') {
				$id_penjual = $this->session->userdata('ses_id_penjual');
				$data['buah'] = $this->m_buah->getBydata_penjual($id_penjual);
				$this->load->view('buah/v_list_buah_akun',$data);
			}
		}
		public function index5($id_buah){
			if ($this->session->userdata('akses')=='1') {
				$where = array('id_buah' => $id_buah);
				$data['buah'] = $this->m_buah->getBybuah('buah',$where)->result();
				$this->load->view('transaksi/v_form_transaksi',$data);
				//redirect(site_url('c_buah/index', $data));
			}
			else {
				redirect(site_url('c_login/index'));
			}
		}
		public function tambah(){
			if ($this->session->userdata('akses')=='2') {	
			$this->load->view("buah/v_new_buah.php"); //akses GUI form
			}
		}
		public function simpan_buah(){
				$id_buah = $_POST['id_buah'];
				$nama_file = $_FILES['gambar']['name'];
	    		$ukuran_file = $_FILES['gambar']['size'];
	    		$tipe_file = $_FILES['gambar']['type'];
	    		$tmp_file = $_FILES['gambar']['tmp_name'];
				$nama_buah = $_POST['nama_buah'];
				$jenis_buah = $_POST['jenis_buah'];
				$harga = $_POST['harga'];
				$stock = $_POST['stock'];
				$id_penjual = $_POST['id_penjual'];
				$data = array(
					'id_buah' => $id_buah,
					'nama_file' => $nama_file,
					'nama_buah' => $nama_buah,
					'jenis_buah' => $jenis_buah,
					'harga' => $harga,
					'stock' => $stock,
					'id_penjual' => $id_penjual,
				);
				$path = "gambar/".$nama_file;
				if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
			      if($ukuran_file <= 1000000){ 
			        if(move_uploaded_file($tmp_file, $path)){ 
			        	$input = $this->m_buah->simpan_data('buah', $data);
						if ($input >= 1) {
							echo "<script>alert('data telah tersimpan'</script>";
							redirect(site_url('c_buah/index'));
						}
						else {
							//echo "<script>alert('anda belum beruntung')</script>";
							redirect(site_url('c_buah/index'));
						}  
			        }else{
			          echo "<script>alert('Maaf, Gambar gagal untuk diupload.'</script>";
			          redirect(site_url('c_buah/index'));
			        }
			      }else{
			        echo "<script>alert('Maaf, Gambar gagal untuk diupload.'</script>";
			          redirect(site_url('c_buah/index'));
			      }
			    }	
			}
		public function edit($id_buah){
			if ($this->session->userdata('akses')=='2') {
				$where = array ('id_buah' => $id_buah);
				$data['buah'] = $this->m_buah->edit_data($where, "buah")->result();
				$this->load->view('buah/v_edit_buah',$data);
			}
		}
		public function update(){
				$id_buah = $_POST['id_buah'];
				$nama_buah = $_POST['nama_buah'];
				$jenis_buah = $_POST['jenis_buah'];
				$harga = $_POST['harga'];
				$stock = $_POST['stock'];
				$id_penjual = $_POST['id_penjual'];
				$data = array( 
					'nama_buah' => $nama_buah,
					'jenis_buah' => $jenis_buah,
					'harga' => $harga,
					'stock' => $stock,
					'id_penjual' => $id_penjual,
				);
			$where = array('id_buah' => $id_buah);
			$this->m_buah->update_data($where, $data,'buah');
			redirect(site_url('c_buah/home'));
		}
		public function hapus($id_buah){
		$where = array('id_buah' => $id_buah);
		$this->m_buah->hapus_data($where,'buah');
		redirect(site_url('c_buah/home'));
		}
	}
?>