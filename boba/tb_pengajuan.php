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
  <title>SISKA | Pengajuan</title>
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
            <h1 class="m-0">Tabel Surat Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Pengajuan</li>
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
                    Nama
                  </th>
                  <th>
                  Tanggal
                  </th>     
                  <th>
                    No Surat Pengajuan
                  </th>
                  <th>
                    Jurusan
                  </th>
                  <th>
                    Hal
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
                $pengajuan = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user ORDER BY tb_sp.id_sp DESC");
                $no= 1;
                while($d = mysqli_fetch_array($pengajuan)) {
                  if($d['status_sp']=='1'){
                    $status = 'Accept Kajur';
                    $warna = 'warning';
                    $verif = '';
                    }
                    elseif ($d['status_sp']=='2'){
                    $status = 'SK Sudah Dibuat';
                    $warna = 'primary';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='3'){
                    $status = 'Accept Ketua BAAK';
                    $warna = 'success';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='4'){
                    $status = 'Decline Ketua BAAK';
                    $warna = 'danger';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='5'){
                    $status = 'Accept Wadir I';
                    $warna = 'success';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='6'){
                    $status = 'Decline Wadir I';
                    $warna = 'danger';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='7'){
                    $status = 'Accept Direktur';
                    $warna = 'success';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='8'){
                    $status = 'Decline Direktur';
                    $warna = 'danger';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='9'){
                    $status = 'SK Berhasil';
                    $warna = 'info';
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='10'){
                    $status = 'Ditolak';
                    $warna = 'danger';
                    $verif = 'hidden';
                    }
                    else {
                        $status = 'Belum Diverifikasi';
                        $warna = 'secondary';
                        $verif = 'hidden';
                    }
                    $id_pegawai = $d['id_pegawai'];
                    $tb_pegawai = mysqli_query($conn,"SELECT * FROM tb_pegawai where id_pegawai = '$id_pegawai'");
                    $pegawai    = mysqli_fetch_array($tb_pegawai);

                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $pegawai['nama_pegawai']; ?></td>
                      <td><?php echo $d['tgl_sp'] ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $row['nama_jurusan']; ?><br><?php echo $d['thn_ajaran']; ?><br><?php echo $d['semester']; ?></td>
                      <td><?php echo $d['hal_sp']; ?></td>
                      <td><?php echo "<a class='badge bg-". $warna."'>". $status."</a>";?>
                      <td>
                        <!-- Tombol Aksi Pengajuan -->
                        <div class="btn-group btn-group-sm">
                          <a href="detail_pengajuan.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-primary btn-sm" ><i class="fas fa-folder-open"></i> Detail</a>
                          <a href="buat_sk.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-success" <?php echo $verif; ?>><i class="fas fa-pencil-alt"></i> Buat SK</a>    
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
