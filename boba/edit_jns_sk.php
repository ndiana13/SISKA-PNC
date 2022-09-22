<?php
error_reporting();
session_start();
 
include 'function.php';
$id_jns_sk     = $_GET['id_jns_sk'];
$tb_jns_sk     = mysqli_query($conn,"SELECT * FROM tb_jns_sk WHERE id_jns_sk='$id_jns_sk'");
$d             = mysqli_fetch_array($tb_jns_sk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Jenis SK</title>
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
            <h1 class="m-0">Edit Jenis SK</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jenis SK</li>
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
                <form method="POST" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="id_jns_sk" id="id_jns_sk" value="<?= $d['id_jns_sk']?>">
                  <input type="hidden" name="tembusan" value="<?= $d['tembusan']?>">
                   <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Jenis SK</label>
                          <input type="text" class="form-control"  required id="jns_sk" name="jns_sk" value="<?= $d['jns_sk'];?>">
                        </div>               
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Tentang</label>
                          <input class="form-control" name="tentang" value="<?= html_entity_decode($d['tentang']);?>">
                        </div>  
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Menimbang</label>
                          <textarea id="summernote1" name="menimbang" value="<?= $d['menimbang']?>"><?php echo html_entity_decode($d['menimbang']);?></textarea> 
                        </div>  
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Mengingat</label>
                          <textarea id="summernote2"name="mengingat" value="<?= $d['mengingat']?>"><?php  echo html_entity_decode($d['mengingat']);?></textarea> 
                        </div>  
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                        <label for="">Memperhatikan</label>
                        <textarea id="summernote3" name="memperhatikan" value="<?= $d['memperhatikan']?>"><?php  echo html_entity_decode($d['memperhatikan']);?></textarea> 
                        </div>  
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Menetapkan</label>
                          <textarea id="summernote4" name="menetapkan" value="<?= $d['menetapkan']?>"><?php echo html_entity_decode($d['menetapkan']);?></textarea> 
                          </div>  
                      </div>
                    </div>
                    <div align="right">
                      <a  class="btn btn-default" href="tb_jns_sk.php">Close</a>
                      <button type="submit" class="btn btn-primary" id="ubah" name="ubah" >Edit</button>
                    </div>
                  </form>
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

if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_jns_sk($_POST)<0){
    $_SESSION['alert_edit'] = 'false';
    echo "
    <script>
      document.location.href='tb_jns_sk.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='tb_jns_sk.php';
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