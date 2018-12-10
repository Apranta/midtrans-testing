<!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                <?php if ($this->session->userdata('role') == 1): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('admin/data-pegawai') ?>" class=""><i class="lnr lnr-user"></i> <span>Data Calon Pegawai</span></a></li></li>
                        <li><a href="<?= base_url('admin/kriteria') ?>" class=""><i class="fa fa-table"></i> <span>Kriteria</span></a></li></li>
                        <li><a href="<?= base_url('admin/tes_tertulis') ?>" class=""><i class="fa fa-edit"></i> <span>Input Nilai Tes Tertulis</span></a></li></li>
                        <li><a href="<?= base_url('admin/nilai_pegawai') ?>" class=""><i class="fa fa-edit"></i> <span>Data Penilaian Pegawai</span></a></li></li>
                        <li><a href="<?= base_url('admin/penilaian') ?>" class=""><i class="fa fa-edit"></i> <span>Penilaian Pegawai</span></a></li></li>
                    </ul>
                <?php elseif ($this->session->userdata('role') == 2): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('direktur/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('direktur/data-pegawai') ?>" class=""><i class="lnr lnr-user"></i> <span>Data Calon Pegawai</span></a></li></li>
                        <li><a href="<?= base_url('direktur/nilai_pegawai') ?>" class=""><i class="fa fa-file"></i> <span>Data Penilaian</span></a></li></li>
                        <li><a href="<?= base_url('direktur/penilaian') ?>" class=""><i class="fa fa-file"></i> <span>Hasil Penilaian</span></a></li></li>
                        <li><a href="<?= base_url('direktur/laporan') ?>" class=""><i class="fa fa-table"></i> <span>Laporan</span></a></li></li>
                    </ul>
                <?php elseif ($this->session->userdata('role') == 3): ?>
                    <ul class="nav">
                        <li><a href="<?= base_url('pegawai/') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="<?= base_url('pegawai/profile') ?>"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
                        <li><a href="<?= base_url('pegawai/berkas') ?>"><i class="lnr lnr-user"></i> <span>Data Berkas</span></a></li>
                    </ul>
                <?php endif; ?>               
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <div id="page-wrapper">