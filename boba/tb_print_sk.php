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
  <title>SISKA | SK</title>
     <?php include '../template/rel.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Template Header & Sidebar -->
      <?php    include '../template/header.php'; ?>
      <?php    include '../template/sidebar_baak.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Surat Keputusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">SK</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr style="text-align: center;">
                  <th>#</th>
                  <th>
                    No Surat Pengajuan
                  </th>    
                  <th>
                    No Surat Keputusan
                  </th>
                  <th>Jenis SK</th>
                  <th>
                    Hal
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php
                $id_jurusan = $row['id_jurusan'];
                $pengajuan = mysqli_query($conn,"SELECT * FROM tb_sk INNER JOIN tb_sp ON tb_sk.id_sp=tb_sp.id_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.status_sp =9 ORDER BY tb_sk.id_sk DESC");
                $no= 1;
                while($d = mysqli_fetch_array($pengajuan)) {
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $d['no_sk']; ?></td>
                      <td><?php echo$d['jns_sk'];?></td>
                      <td style="text-transform: uppercase;"><?php echo $d['perihal_sk']; ?> tahun akademik <?php echo $d['thn_ajaran']; ?> semester <?php echo $d['semester']; ?></td>
                      <td class="text-center">
                        <!-- Tombol Aksi Pengajuan -->
                        <div class="btn-group btn-group-sm">
                          <a class="btn btn-success btn-sm"href="cetak_sk.php?id_sp=<?php echo $d['id_sp']; ?>"><i class="fas fa-print"></i> SK</a>   
                        </div>
                      </td>
                    </tr>
                          <?php
                            }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    <!-- Main content -->
   
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
<?php    
  include '../template/footer.php'; 
  include '../template/script.php';


if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah_sp($_POST)>0){
    $_SESSION["alert_tambah"] = 'true';
    echo "
    <script>
    document.location.href='tb_pengajuan.php';
    </script>
    ";
  }else {
    $_SESSION["alert_tambah"] = 'false';
    echo "
    <script>
     document.location.href='tb_pengajuan.php';
    </script>
    ";

  }
}
if ( isset($_POST["edit"])) {
    //cek data berhasil ubah atau tidak
    if  (ubah_sp($_POST)>0){
      $_SESSION["alert_edit"] = 'true';
      echo "
      <script>
      document.location.href='tb_pengajuan.php';
      </script>
      ";
    }else {
      $_SESSION["alert_edit"] = 'false';
    echo "
      <script>
      alert('Data gagal diubah');
      document.location.href='tb_pengajuan.php';
      </script>
      ";
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
