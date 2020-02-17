<?php
	class c_pembelian extends CI_Controller{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_pembelian');
			$this->load->library('form_validation');
			//$this->load->helper('url');
		}
		public function index(){ 
			if ($this->session->userdata('akses')=='1') {
				$id = $this->session->userdata('ses_id_pembeli');
				$data['transaksi'] = $this->m_pembelian->getAll($id); //panggil sql select
				$this->load->view("transaksi/v_lihat_transaksi", $data);
			} else if ($this->session->userdata('akses')=='2') {
				$id_penjual = $this->session->userdata('ses_id_penjual');
				$where = array('transaksi.no_id_penjual' => $id_penjual);
				$data['transaksi'] = $this->m_pembelian->getByTransaksi($where); //panggil sql select
				$this->load->view("transaksi/v_lihat_transaksi", $data);
			}	
		}
		public function tambah(){
			if ($this->session->userdata('akses')=='1') {
				$this->load->view("transaksi/v_form_transaksi.php"); //akses GUI form			
			} else{
				$this->load->view("User/profile_no_login.php"); //akses GUI form
			}
		}
		public function simpan_aksi(){
				//$nama = $_POST['nama'];
				$no_id_pembeli = $_POST['idp'];
				$id_buah = $_POST['id_buah'];
				$nama_buah = $_POST['nama_buah'];
				$byk = $_POST['byk'];
				$hasil = $_POST['hasil'];
				$tagihan = $byk*$hasil;
				$pembayaran = $_POST['pembayaran'];
				$id_penjual = $_POST['id_penjual'];
				$data = array(
					'no_id_pembeli' => $no_id_pembeli,
					'id_buah' => $id_buah,
					'nama_buah' => $nama_buah,
					'tagihan' => $tagihan,
					'pembayaran' => $pembayaran,
					'status' => 'belum bayar',
					'no_id_penjual' => $id_penjual,
				);
				$input = $this->m_pembelian->simpan_data('transaksi', $data);
				if ($input >= 1) {
					echo "<script>alert('data telah tersimpan'</script>";
					redirect(site_url('c_buah/home'));
				}
				else {
					echo "<script>alert('anda belum beruntung')</script>";
					redirect(site_url('c_buah/home'));
				}
		}
		public function edit($no_transaksi){
			if ($this->session->userdata('akses')=='2') {
				$where = array ('no_transaksi' => $no_transaksi);
				$data['transaksi'] = $this->m_pembelian->getByTransaksi($where, "transaksi");
				$this->load->view('transaksi/v_edit_transaksi',$data);
			}
		}
		public function update(){
				$no_transaksi = $_POST['no_transaksi'];
				$status = $_POST['status'];
			$data = array('status' => $status);
			$where = array('no_transaksi' => $no_transaksi);
			$this->m_pembelian->update_data($where, $data, 'transaksi');
			redirect(site_url('c_buah/home'));
		}

		public function hapus($no_transaksi){
		$where = array('no_transaksi' => $no_transaksi);
		$this->m_barang->hapus_data($where,'transaksi');
		redirect('c_buah/home');
		}
	}
?>