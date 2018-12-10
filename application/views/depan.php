<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="<?= base_url('') ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('') ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 575px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Sistem Pakar</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="<?= base_url('home') ?>">Home</a></li>
        <?php if (($this->session->userdata('role'))): ?>
          
        <li><a href="<?= base_url('login') ?>">Profile</a></li>
        <?php else : ?>
        <li><a href="<?= base_url('login') ?>">Login</a></li>
        <?php endif ?>
        <li><a href="<?= base_url('home/cek') ?>">Cek Kerusakan</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <h2>Sistem Pakar Penentuan Kerusakan Pada Laptop</h2>
      <hr>
      <p>Selamat Datangblbalbalb</p>
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
