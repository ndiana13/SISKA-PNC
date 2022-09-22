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
            <h1 class="m-0">Tabel Jenis SK</h1>
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
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: center;">
                  <tr>
                    <th>#</th>
                    <th>
                      Jenis SK
                    </th>
                    <th>
                      Tentang
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM tb_jns_sk");
                while($d = mysqli_fetch_array($data)){
                ?>
                  <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td><?php echo html_entity_decode($d['jns_sk']); ?></td>
                    <td><?php echo html_entity_decode($d['tentang']); ?></td>

                    <td class="text-center">
                      <div class="btn-group btn-group-sm">
                        <a class="btn btn-info btn-sm" href="edit_jns_sk.php?id_jns_sk=<?php echo $d['id_jns_sk'];?>"><i class="fas fa-pencil-alt"></i> Edit</a>      
                      </div>
                  </td>
                </tr>
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
  if  (tambah_jns_sk($_POST) < 0){
    $_SESSION['alert_tambah'] = 'false';
    echo "
    <script>
    document.location.href='tb_jns_sk.php';
    </script>
    ";
  }else {
    $_SESSION['alert_tambah'] = 'true';
    echo "
    <script>
     document.location.href='tb_jns_sk.php';
    </script>
    ";

  }
}
if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_jns_sk($_POST)>0){
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='tb_jns_sk.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'false';
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