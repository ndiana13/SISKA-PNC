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

$tb_sk = mysqli_query($conn,"SELECT * FROM tb_sk where id_sp = '$id_sp'");
$sk    = mysqli_fetch_array($tb_sk);

if($detail['status_sp'] == '1'){
$status_sp = '';
$kajur = '';
$baak = 'hidden';
$ketuabaak = 'hidden';
$wadir = 'hidden';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = 'hidden';
$ket = 'menerima';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '2'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = 'hidden';
$wadir = 'hidden';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= '';
$status_sk = '';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '3'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = 'hidden';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
$catatan='';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '4'){
$status_sp = '';
$kajur = '';
$baak = '';
$ketuabaak = '';
$wadir = 'hidden';
$direktur= 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'decline';
$catatan1= '';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '5'){
$status_sp = '';
$kajur = '';
$baak = '';
$wadir = '';
$ketuabaak='';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '6'){
$status_sp = '';
$kajur = '';
$baak = '';
$wadir = '';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menolak';
$catatan1= '';
$catatan2= '';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '7'){
$status_sp = '';
$kajur = '';
$baak = '';
$wadir = '';
$direktur = '';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menerima';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '8'){
$status_sp = '';
$kajur = '';
$baak = '';
$wadir = '';
$direktur = '';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = 'menolak';
$catatan1= '';
$catatan2= '';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '9'){
$status_sp = '';
$kajur = '';
$baak = '';
$wadir = '';
$direktur = '';
$umum = '';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$ket = '';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
elseif ($detail['status_sp'] == '10'){
$status_sp = 'disabled';
$kajur = 'hidden';
$baak = 'hidden';
$wadir = 'hidden';
$direktur = 'hidden';
$umum = 'hidden';
$verif= 'hidden';
$verif2= 'hidden';
$status_sk = '';
$catatan1= 'hidden';
$catatan2= 'hidden';
$catatan3= 'hidden';
}
else {
  $status_sp = 'disabled';
  $kajur = 'hidden';
  $baak = 'hidden';
  $wadir = 'hidden';
  $direktur = 'hidden';
  $umum = 'hidden';
  $verif= '';
  $verif2= 'hidden';
  $status_sk = 'hidden';
  $catatan1= 'hidden';
  $catatan2= 'hidden';
  $catatan3= 'hidden';

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
                    <a href="accept_ketuabaak.php?id_sp=<?php echo $detail['id_sp']; ?>" class="btn btn-success btn-sm alert_confirm" <?php echo $verif ?>><i class="fas fa-check"></i> Terima</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default" <?php echo $verif ?>><i class="fas fa-times"></i> Tolak</button>
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
                      <a class="btn btn-primary btn-sm <?php echo $status_sp;?>" href="cetak_sp.php?id_sp=<?php echo $detail['id_sp'];?>"><i class="fas fa-download"></i> Cetak SP</a>

                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div class="time-label" <?php echo $baak ?>>
                  <span class="bg-green"><?php echo $sk['tgl_sk'];?></span>
                </div>
              <div <?php echo $baak ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">BAAK</a> menerima pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah dibuat oleh BAAK.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm <?php echo $status_sk;?>" href="cetak_sk.php?id_sp=<?php echo $detail['id_sp'];?>"> Lihat SK</a>
                    <a href="accept_ketuabaak.php?id_sp=<?php echo $detail['id_sp']; ?>" class="btn btn-success btn-sm alert_confirm" <?php echo $verif2 ?>><i class="fas fa-check"></i> Accept</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default" <?php echo $verif2 ?>><i class="fas fa-times"></i> Decline</button>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label" <?php echo $ketuabaak ?>>
                  <span class="bg-green"><?php echo $detail['tgl_baak'];?></span>
                </div>
              <div <?php echo $ketuabaak ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Ketua BAAK</a> <?php echo $ket?> pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah diverifikasi oleh Ketua BAAK.
                    <br><br>
                    <label <?= $catatan1;?>>Catatan : <?php echo $sk['catatan'] ;?></label> 
                  </div>
                  <div class="timeline-footer">  
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label" <?php echo $wadir ?>>
                  <span class="bg-green"><?php echo $detail['tgl_wadir'];?></span>
                </div>
              <div <?php echo $wadir ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Wakil Direktur</a> <?php echo $ket?> pengajuan SK</h3>
                  <div class="timeline-body">
                    <br><br>
                    <label <?= $catatan2;?>>Catatan : <?php echo $sk['catatan'] ;?></label> 
                  </div>
                  <div class="timeline-footer">  
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label" <?php echo $direktur ?>>
                <span class="bg-green"><?php echo $detail['tgl_sk'];?></span>
              </div>
              <div <?php echo $direktur ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Direktur</a> <?php echo $ket?> pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah diverifikasi oleh Direktur.

                    <br><br>
                    <label <?= $catatan3;?>>Catatan : <?php echo $sk['catatan'] ;?></label> 
                  </div>
                  <div class="timeline-footer">  
                  </div>
                </div>
              </div>
              <div class="time-label" <?php echo $umum ?>>
                <span class="bg-green"><?php echo $detail['tgl_umum'];?></span>
              </div>
              <div <?php echo $umum ?>>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i></span>
                  <h3 class="timeline-header"><a href="#">Bagian Umum</a> <?php echo $ket?> pengajuan SK</h3>
                  <div class="timeline-body">
                    Surat Keputusan telah diberikan nomor oleh Bagian Umum.
                    <br>
                    <label>No SK : <?php echo $sk['no_sk'];?></label><br>
                    <a class="btn btn-primary btn-sm <?php echo $status_sk;?>" href="cetak_sk.php?id_sp=<?php echo $detail['id_sp'];?>"><i class="fas fa-download"></i> Cetak SK</a> 
                  </div>
                  <div class="timeline-footer">  
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
              <h4 class="modal-title">Tolak SK</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" class="forms-sample" enctype="multipart/form-data">
                <input type="text" name="id_sp" value="<?= $id_sp; ?>" hidden="">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Disposisi/Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary alert_decline" name="submit">Tolak</button>
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

if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (dec_ketuabaak($_POST)>0){
    $_SESSION['alert_dec'] = 'true';
    echo "
    <script>
    document.location.href='tb_pengajuan.php';
    </script>
    ";
  }else {
    $_SESSION['alert_dec'] = 'false';
    echo "
    <script>
     document.location.href='tb_pengajuan.php';
    </script>
    ";

  }
}
?>

</body>
</html>