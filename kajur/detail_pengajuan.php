<?php
error_reporting();
session_start();
include 'function.php';

$id_sp     = $_GET['id_sp'];
$timeline  = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.id_sp='$id_sp'");
$detail    = mysqli_fetch_array($timeline);

$id_pegawai = $detail['id_pegawai'];
$tb_pegawai = mysqli_query($conn,"SELECT * FROM tb_pegawai where id_pegawai = '$id_pegawai'");
$pegawai    = mysqli_fetch_array($tb_pegawai);



if($detail['status_sp'] == '1'){
$status_sp = '';
$kajur = '';
$baak = 'hidden';
$ketuabaak = 'hidden';
$wadir = 'hidden';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = 'hidden';
$ket = 'menerima';
}
elseif ($detail['status_sp'] == '2'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = 'hidden';
$wadir = 'hidden';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
}
elseif ($detail['status_sp'] == '3'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = 'hidden';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= '';
$status_sk = '';
$ket = 'menerima';
$catatan='';
}
elseif ($detail['status_sp'] == '4'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = 'hidden';
$direktur= 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'decline';
$catatan = $sk['catatan'];
}
elseif ($detail['status_sp'] == '5'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = '';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
$catatan='';
}
elseif ($detail['status_sp'] == '6'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = '';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'decline';
$catatan = $sk['catatan'];
}
elseif ($detail['status_sp'] == '7'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = '';
$direktur = '';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
$catatan='';
}
elseif ($detail['status_sp'] == '8'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = '';
$direktur = '';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'decline';
$catatan = $sk['catatan'];
}
elseif ($detail['status_sp'] == '9'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = '';
$direktur = '';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
}
elseif ($detail['status_sp'] == '10'){
$status_sp = 'disabled';
$kajur = 'hidden';
$baak = 'hidden';
$wadir = 'hidden';
$ketuabaak = 'hidden';
$direktur = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
}
else {
  $status_sp = 'disabled';
  $kajur = 'hidden';
  $baak = 'hidden';
  $ketuabaak = 'hidden';
  $wadir = 'hidden';
  $direktur = 'hidden';
  $verif= '';
  $verif2= 'hidden';
  $status_sk = 'hidden';

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Detail Pengajuan</title>
     <?php include '../template/rel.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Template Header & Sidebar -->
      <?php    include '../template/header.php'; ?>
      <?php    include '../template/sidebar_verifikator.php'; ?>
      
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Surat <?php echo $detail['no_sp'];?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green"><?php echo $detail['tgl_sp'];?></span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-check-circle text-success"></i></span>
                  <h3 class="timeline-header"><a href="#"><?php echo $pegawai['nama_pegawai'];?></a> mengajukan <?php echo $detail['jns_sk'] ?></h3>

                  <div class="timeline-body">
                    No Surat. <?php echo $detail['no_sp'];?><br>
                    <?php echo $detail['hal_sp']; ?>
                  </div>
                  <div class="timeline-footer">    
                    <a class="btn btn-primary btn-sm" href="cetak_sp.php?id_sp=<?php echo $detail['id_sp'];?>">Lihat SP</a>
                    <a href="accept_kajur.php?id_sp=<?php echo $detail['id_sp']; ?>" class="btn btn-success btn-sm alert_confirm" <?php echo $verif ?>><i class="fas fa-check"></i> Terima</a>
                    <a href="decline_kajur.php?id_sp=<?php echo $detail['id_sp']; ?>" class="btn btn-danger btn-sm alert_decline" <?php echo $verif ?>><i class="fas fa-times"></i> Tolak</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
                <div class="time-label" <?php echo $kajur ?>>
                  <span class="bg-green"><?php echo $detail['tgl_kajur'];?></span>
                </div>
                <div <?php echo $kajur ?>>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-check-circle text-success"></i></span>
                  <h3 class="timeline-header no-border"><a href="#">Ketua Jurusan</a> menerima pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat pengajuan telah ditandatangani.
                  </div>
                  <div class="timeline-footer">
                      <a class="btn btn-primary btn-sm <?php echo $status;?>" href="cetak_sp.php?id_sp=<?php echo $detail['id_sp'];?>"><i class="fas fa-download"></i> Cetak SP</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div <?php echo $baak ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">BAAK</a> menerima pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah dibuat oleh BAAK.
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
                <div class="time-label" <?php echo $wadir ?> >
                  <span class="bg-green"><?php echo $detail['tgl_wadir'];?></span>
                </div>
                <div <?php echo $wadir ?> >
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Wakil Direktur</a> menerima pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah diverifikasi oleh Wakil Direktur I.
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
                <div class="time-label" <?php echo $direktur ?> >
                  <span class="bg-green"><?php echo $detail['tgl_direktur'];?></span>
                </div>
              <div <?php echo $wadir ?> >
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Direktur</a> menerima pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah diverifikasi Direktur.
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
      <!-- Modal Import Lampiran -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Lampiran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" class="forms-sample" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="exampleInputFile">Import Lampiran</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="lam_sp" name="lam_sp">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>  
                      </div>
                      <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.xls max 50MB!</small>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="upload" name="upload">Import</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /. Modal Import Lampiran -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php   
include '../template/footer.php'; 
include '../template/script.php'; 

if (isset($_POST['upload'])) {

    require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('spreadsheet-reader-master/SpreadsheetReader.php');

    //upload data excel kedalam folder uploads
    $target_dir = "../dist/img/lampiran/".basename($_FILES['lam_sp']['name']);
    
    move_uploaded_file($_FILES['lam_sp']['tmp_name'],$target_dir);

    $Reader = new SpreadsheetReader($target_dir);

    foreach ($Reader as $Key => $Row)
    {
      if($detail['id_jns_sk']=='1'){
      // import data excel mulai baris ke-2 (karena ada header pada baris 1)
      if ($Key < 1) continue;     
      $query=mysqli_query($conn, "INSERT INTO tb_lam_doswal(id_lam_doswal,nama_doswal,npm,nama_mhs,id_sp) VALUES ('','".$Row[0]."','".$Row[1]."','".$Row[2]."','$id_sp')");
      }elseif ($detail['id_jns_sk']=='2') {
      // import data excel mulai baris ke-2 (karena ada header pada baris 1)
      if ($Key < 1) continue;     
      $query=mysqli_query($conn, "INSERT INTO tb_lam_mengajar(id_lam_mengajar,npm,nama_mhs,id_sp) VALUES ('','".$Row[0]."','".$Row[1]."','".$Row[2]."','$id_sp')");
      }elseif ($detail['id_jns_sk']=='3') {
        if ($Key < 1) continue;     
      $query=mysqli_query($conn, "INSERT INTO tb_lam_mengajar(id_lam_mengajar,npm,nama_mhs,id_sp) VALUES ('','".$Row[0]."','".$Row[1]."','".$Row[2]."','$id_sp')");
      }
    }
    if ($query) {
        echo "<script>
            alert('data berhasil di import');
            </script>";
      }else{
        echo mysqli_error();
      }
  }
?>

</body>
</html>