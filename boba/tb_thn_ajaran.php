<?php
error_reporting();
session_start();
 
include 'function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Tahun Ajaran </title>
     <?php include '../template/rel.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Template Header & Sidebar -->
      <?php    include '../template/header.php'; ?>
      <?php    include '../template/sidebar_baak.php'; ?>
      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Tahun Ajaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tahun Ajaran</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.modal-dialog -->
            <div class="card">
              <div class="card-body">
              <button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#modal-md"><i class="fas fa-plus-circle"></i> &nbsp; Tahun Ajaran
              </button>
              <div><br></div>
              <!-- Modal Import Lampiran -->
              <div class="modal fade" id="modal-md">
                <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Tahun Ajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <input type="hidden" name="id_thn_ajaran" id="id_thn_ajaran">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Tahun Ajaran</label>
                            <input class="form-control" type="text" name="thn_ajaran" required id="thn_ajaran">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Semester</label>
                            <input class="form-control" type="text" name="semester" required id="semester">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status" required id="status">
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                          </div>  
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Save</button>
                  </div>
                </form>
              </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        <!-- /. Modal Import Lampiran -->            
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: center;">
                  <tr>
                    <th>#</th>
                    <th>
                      Tahun Ajaran
                    </th>
                    <th>
                      Semester
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM tb_thn_ajaran");
                while($d = mysqli_fetch_array($data)){

                  if($d['status']== 'Aktif'){
                  $status = 'Aktif';
                  $warna = 'success';
                }elseif ($d['status']== 'Tidak Aktif') {
                  $status = 'Tidak Aktif';
                  $warna = 'danger';
                }

                ?>
                  <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $d['thn_ajaran']; ?></td>
                  <td><?php echo $d['semester']; ?></td>
                  <td class="text-center"><?php echo "<a class='badge bg-". $warna."'>". $status."</a>";?></td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a data-toggle="modal" data-target="#modal-sm<?php echo $d['id_thn_ajaran']; ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a> 
                      <a href="hapus_tb_thn_ajaran.php?id_thn_ajaran=<?php echo $d['id_thn_ajaran']; ?>" class="btn btn-danger alert_konfirmasi"><i class="fas fa-trash"></i> Hapus</a>      
                    </div>
                </td>
                <!-- Modal Edit Pegawai -->
                  <div class="modal fade" id="modal-sm<?php echo $d['id_thn_ajaran']; ?>">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Tahun Ajaran</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id_thn_ajaran" id="id_thn_ajaran" value="<?= $d['id_thn_ajaran']?>">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Tahun Ajaran</label>
                                  <input class="form-control" type="text" name="thn_ajaran" required id="thn_ajaran" value="<?= $d['thn_ajaran']?>" >
                                </div>  
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Semester</label>
                                  <input class="form-control" type="text" name="semester" required id="semester" value="<?= $d['semester']?>">
                                </div>  
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Status</label>
                                  <select class="form-control" name="status" required id="status">
                                    <option hidden selected value="<?= $d['status'];?>"><?php echo $d['status']?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                  </select>
                                </div>  
                              </div>
                            </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="ubah" name="ubah">Save</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php   
include '../template/footer.php'; 
include '../template/script.php';

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah_thn_ajaran($_POST) < 0){
    $_SESSION['alert_tambah'] = 'false';
    echo "
    <script>
    document.location.href='tb_thn_ajaran.php';
    </script>
    ";
  }else {
    $_SESSION['alert_tambah'] = 'true';
    echo "
    <script>
     document.location.href='tb_thn_ajaran.php';
    </script>
    ";

  }
}
if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_thn_ajaran($_POST)>0){
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='tb_thn_ajaran.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'false';
    echo "
    <script>
      document.location.href='tb_thn_ajaran.php';
    </script>";
  }
}  
?>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 
</body>
</html>