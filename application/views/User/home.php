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

  <!-- jumbotron -->
  <div class="jumbotron">
    <img src="<?php echo base_url('gambar/jumbotron.jpg')?>" class="img-circle">
    <h1>TANI MAJU</h1>
    <p style="text-align: center;">SUDAH MAKAN BUAH HARI INI?</p>
  </div>
  <!-- akhir jumbotron -->

    <!-- about -->
  <section class="about" id="about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="text-center">Cerita Kami</h2>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-2">
          <p class="text-justify">Tani Maju memiliki visi untuk mempercepat penciptaan dampak positif dalam sektor pertanian melalui pemanfaatan teknologi informasi. Oleh karena itu, kami membangun usaha kami diatas tiga pilar utama, yaitu: Pertanian, Teknologi, dan Dampak sosial.
          Misi kami sederhana: Memberdayakan petani lokal dengan menyediakan akses pasar dan akses keuangan
          Melalui Tani Maju, para petani lokal dapat menjual hasil panen mereka kepada para individu maupun Usaha Mikro, Kecil, dan Menengah (UMKM) di berbagai wilayah. Kami bukan hanya sebuah platform e-commerce terkemuka untuk produk pertanian namun juga katalis untuk masa depan Agri-tech. Tani Maju berawal dari sebuah mimpi bahwa suatu hari, para petani gurem Indonesia dapat menikmati hasil yang adil untuk segala kerja keras mereka di ladang,</p>
        </div>
        <div class="col-sm-6">
          <p class="text-justify">sementara setiap rumah tangga dapat menikmati produk pertanian lokal dengan harga terjangkau.
          Kami terus bekerja dan berusaha untuk menciptakan terobosan besar di sektor yang sebelumnya bisa dikatakan sangat tersegmentasi, misterius dan selalu diremehkan. Tentunya perjalanan kami tidak mudah dan penuh perlawanan, namun kami percaya bahwa setiap usaha keras demi cita-cita yang mulia akan selalu sepadan. 
          Oleh sebab itu, kami ingin bermitra yang individu maupun organisasi yang memiliki kesamaan nilai dan cita-cita, agar segala perkembangan kami berjalan cepat dan selalu berada di jalur yang tepat. Kami bersemangat... begitu juga harapan kami ke Anda. Mari bergabung bersama kami untuk sama-sama berjuang menghubungkan pertanian dengan masyarakat!</p>
        </div>       
      </div>    
    </div>
  </section>
  <!-- akhir about -->

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