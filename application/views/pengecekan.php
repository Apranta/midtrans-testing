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
        <li><a href="<?= base_url('admin') ?>">Login</a></li>
        <li><a href="<?= base_url('home/cek') ?>">Cek Kerusakan</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
      <h2>Daftar Gejala Kerusakan Laptop</h2>
        <?= form_open('home/hasil') ?>
          <div class="panel panel-primary">
            <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th></th>
                    <th>Nama Gejala</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data as $gejala): ?>
                  <tr>
                    <td><input type="checkbox" name="gejala[]" value="<?= $gejala->id_gejala ?>"></td>
                    <td><?= $gejala->nama ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <div class="panel-footer">
              <input type="submit" name="pilih" value="Cari" class="btn btn-primary">
            </div>
          </div>
        <?= form_close() ?>
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
