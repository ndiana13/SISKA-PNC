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
  <title>SISKA | Jurusan</title>
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
            <h1 class="m-0">Tabel Jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jurusan</li>
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
              <button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-circle"></i> &nbsp; Jurusan
              </button>
              <div><br></div>
              <!-- Modal Import Lampiran -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-default">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Jurusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <input type="hidden" name="id_jurusan" id="id_jurusan">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Kode Jurusan</label>
                            <input class="form-control" type="text" name="kode_jurusan" required id="kode_jurusan">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for=""> Nama Jurusan</label>
                            <input class="form-control" type="text" name="nama_jurusan" required id="nama_jurusan">
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
                      Kode Jurusan
                    </th>
                    <th>
                      Nama Jurusan
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM tb_jurusan");
                while($d = mysqli_fetch_array($data)){

                ?>
                  <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $d['kode_jurusan']; ?></td>
                  <td><?php echo $d['nama_jurusan']; ?></td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a data-toggle="modal" data-target="#modal-default<?php echo $d['id_jurusan']; ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a> 
                      <a href="hapus_tb_jurusan.php?id_jurusan=<?php echo $d['id_jurusan']; ?>" class="btn btn-danger alert_konfirmasi"><i class="fas fa-trash"></i> Hapus</a>      
                    </div>
                </td>
                <!-- Modal Edit Pegawai -->
                  <div class="modal fade" id="modal-default<?php echo $d['id_jurusan']; ?>">
                    <div class="modal-dialog modal-default">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Jurusan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id_jurusan" id="id_jurusan" value="<?= $d['id_jurusan'];?>">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Kode Jurusan</label>
                                  <input class="form-control" type="text" name="kode_jurusan" required id="kode_jurusan" value="<?= $d['kode_jurusan'];?>">
                                </div>  
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for=""> Nama Jurusan</label>
                                  <input class="form-control" type="text" name="nama_jurusan" required id="nama_jurusan" value="<?= $d['nama_jurusan'];?>">
                                </div>  
                              </div>
                            </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary col-md-2" id="ubah" name="ubah" >Save</button>
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
  if  (tambah_jurusan($_POST) < 0){
    $_SESSION['alert_tambah'] = 'false';
    echo "
    <script>
    document.location.href='tb_jurusan.php';
    </script>
    ";
  }else {
    $_SESSION['alert_tambah'] = 'true';
    echo "
    <script>
     document.location.href='tb_jurusan.php';
    </script>
    ";

  }
}
if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_jurusan($_POST)>0){
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='tb_jurusan.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'false';
    echo "
    <script>
      document.location.href='tb_jurusan.php';
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