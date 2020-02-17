<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>">

    <title>Tani Maju</title>
  </head>
  <body>
    <h1>TANI MAJU</h1>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">TANI MAJU</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'index.php/c_buah/home'?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/c_buah/index'?>">Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'index.php/c_users/profile'?>">Profile</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo base_url()."index.php/c_buah/index3"; ?>">
      <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- NAVBAR -->

<!-- LOGIN -->
	<table align="center">
		<?php 
		foreach($penjual as $data_penjual)
		{
		?>
		<tr>
			<td>
				<?php echo $data_penjual->nama_toko;?>
			</td>
			<td>
				<?php echo $data_penjual->alamat_toko;?>
			</td>
		</tr>
		<?php } ?>
    <tr>
      <td>
        <button><?php echo anchor('c_users/edit_penjual/'.$data_penjual->no_id_penjual,'Edit'); ?></button>
        <a href="<?php echo base_url().'index.php/c_pembelian/index'?>"><button>Lihat Data Penjualan</button></a>
        <a href="<?php echo base_url().'index.php/c_buah/tambah'?>"><button>Input Penjualan</button></a>
        <a href="<?php echo base_url().'index.php/c_buah/index4'?>"><button>Lihat Data Produk</button></a>
        <a href="<?php echo base_url().'index.php/c_login/logout'?>"><button>Logout</button></a>
      </td> 
    </tr>
	</table>
	
<!-- LOGIN -->

    <!-- footer -->
  <footer>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p>Copyright &copy; 2019 | Built and designed by Tani Maju</p>
          <p>Special thanks to <a href="https://tanihub.com/">Tani Maju Team</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>