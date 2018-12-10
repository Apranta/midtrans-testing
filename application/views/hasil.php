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
        <h2>Hasil Analisis Kerusakan Komputer</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Metode Bayes
                    </div>
                    <div class="panel-body">
                        <h6>Kerusakan yang anda alami adalah <?= $this->Penyakit_m->get_row(['id_penyakit' => $bayes[0]['id_penyakit']])->nama ?></h6>
                    </div>
                </div>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse2" style="color: white;">Detail Perhitungan</a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- <pre> -->
                                <p><?= $bayes[0]['html'] ?>
                                </p>
                            <!-- </pre> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Metode Certainty Factory
                    </div>
                    <div class="panel-body">
                        <h6>Kerusakan yang anda alami adalah <?= $this->Penyakit_m->get_row(['id_penyakit' => $cf[0]['id_penyakit']])->nama ?></h6>
                    </div>
                </div>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse1" style="color: white;">Detail Perhitungan</a>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- <pre> -->
                                <p><?= $cf[0]['html']   ?>
                                </p>
                            <!-- </pre> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
