<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Kerusakan
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?= form_open('admin/basis_pengetahuan') ?>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Kerusakan</label>
                                                <select name="id_penyakit" class="form-control">
                                                    <option value="">= Silahkan PIlih =</option>
                                                    <?php foreach ($this->Penyakit_m->get() as $p): ?>
                                                        <option value="<?= $p->id_penyakit ?>"> <?= $p->nama ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Kerusakan</label>
                                                <select name="id_gejala" class="form-control">
                                                    <option value="">= Silahkan PIlih =</option>
                                                    <?php foreach ($this->Gejala_m->get() as $g): ?>
                                                        <option value="<?= $g->id_gejala ?>"> <?= $g->nama ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">MD</label>
                                                <input type="number" name="md" class="form-control" step="0.01">
                                            </div>
                                            <div class="form-group">
                                                <label for="">MB</label>
                                                <input type="number" name="mb" class="form-control" step="0.01">
                                            </div>
                                            <div class="form-group">
                                                <label for="">bobot</label>
                                                <input type="number" name="bobot" class="form-control" step="0.01" id="bobot">
                                            </div>
                                            <input type="submit" name="simpan" value="Tambah Data" class="btn btn-success">
                                            </form>
                                        </div>
                                    </div><hr>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kerusakan</th>
                                                <th>Nama Gejala</th>
                                                <th>MD</th>
                                                <th>MB</th>
                                                <th>Bobot</th>
                                                <th>Action</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $this->Penyakit_m->get_row(['id_penyakit' => $row->id_penyakit])->nama ?></td>
                                                <td><?= $this->Gejala_m->get_row(['id_gejala' => $row->id_gejala])->nama ?></td>
                                                <td><?= $row->md ?></td>
                                                <td><?= $row->mb ?></td>
                                                <td><?= $row->bobot ?></td>
                                                <td align="center">
                                                <button class="btn btn-danger btn-xs" onclick="_delete(<?= $row->id_basis ?>)"><i class="glyphicon glyphicon-trash"></i></button>

                                                <button class="btn btn-primary btn-xs" onclick="_edit(<?= $row->id_basis ?>)" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <?= form_open('admin/gejala'); ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Data</h4>
          </div>
          <div class="modal-body">
            <div class="form-group label-floating">
                <label class="control-label">Nama</label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-info" name="edit" value="Edit Data">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>

  </div>
</div>
            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
                function _delete(id) {
                    // alert('aa');
                    $.ajax({
                            url: "<?= base_url('admin/basis_pengetahuan') ?>",
                            type: 'POST',
                            data: {
                                id: id,
                                delete: true
                            },
                            success: function() {
                                window.location = "<?= base_url('admin/basis_pengetahuan') ?>";
                            }
                        });
                }

                function _edit(id) {
                    // alert('aa');
                    $.ajax({
                            url: "<?= base_url('admin/basis_pengetahuan') ?>",
                            type: 'POST',
                            data: {
                                id: id,
                                get: true
                            },
                            success: function(data) {
                                data = JSON.parse(data);
                                console.log(data);
                                $("#nama").val(data.nama);
                                $("#id").val(data.id_gejala);
                                
                            }
                        });
                }
            </script>