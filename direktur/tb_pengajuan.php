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
      <?php    include '../template/sidebar_verifikator.php'; ?>
      
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
                    $verif = 'hidden';
                    }
                    elseif ($d['status_sp']=='2'){
                    $status = 'SK Sudah Dibuat';
                    $warna = 'primary';
                    $verif = '';
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
                    $verif = '';
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
                    $warna = 'primary';
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
                          <a href="accept_direktur.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-success btn-sm alert_confirm" <?php echo $verif; ?>><i class="fas fa-check"></i> Terima</a>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default" <?php echo $verif; ?>><i class="fas fa-times"></i> Tolak</button>   
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
                                    <input type="text" name="id_sp" value="<?= $d['id_sp']?>" hidden>
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
                                  <button type="submit" class="btn btn-primary alert_decline" name="decline">Tolak</button>
                               </div>
                               </form>
                              </div>
                              </div>
                            </div>  
                        </div>
                          <!-- Modal Edit Surat Pengajuan -->
                          <div class="modal fade" id="modal-lg<?php echo $d['id_sp']; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Surat Pengajuan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                      <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                                        <input type="hidden" name="lam_sp_lama" value="<?= $d["lam_sp"];?>">
                                        <input type="hidden" name="id_sp" value="<?= $d["id_sp"];?>">
                                        <input type="hidden" name="id_acc_user" value="<?= $d["id_acc_user"];?>">
                                        <input type="hidden" name="tgl_sp" value="<?= $d["tgl_sp"];?>">
                                        <input type="hidden" name="status" value="<?= $d["status"];?>">
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <label for="">Nama Pegawai</label>
                                                <input type="text" class="form-control" placeholder="<?php echo $row['gelar_depan'] ." " .$row['nama_pegawai'] ." ".$row['gelar_belakang'] ;?>" disabled>
                                            </div>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <label for="">Nama Jurusan</label>
                                              <input type="text" class="form-control" placeholder="<?php echo $row['nama_jurusan'];?>" disabled>
                                            </div>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <label for="">Jenis Pengajuan</label>
                                              <div class="form-group">
                                                <select class="form-control" id="id_jns_sk" name="id_jns_sk">
                                                    <?php

                                                    $tb_jns_sk =mysqli_query($conn,"SELECT * FROM tb_jns_sk");
                                                        while ($data= mysqli_fetch_array($tb_jns_sk)) {
                                                    ?>
                                                    <option hidden selected value = "<?= $d["id_jns_sk"];?>"><?php echo $d['jns_sk'];?></option>
                                                    <option value="<?= $data['id_jns_sk'];?>"><?php echo $data['jns_sk'];?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                               </div>
                                            </div>
                                          </div>
                                          <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Tahun Akademik</label>
                                                <?php
                                                    $tb_thn_ajaran = mysqli_query($conn,"SELECT * FROM tb_thn_ajaran WHERE status = 'Aktif'");
                                                    while ($thn= mysqli_fetch_array($tb_thn_ajaran)) {
                                                ?>
                                                <input type="text" class="form-control" placeholder="<?php echo $thn['thn_ajaran'];?>" disabled>
                                            </div>
                                          </div>
                                          <div class="col-lg-3">
                                            <div class="form-group">
                                              <label for="">Semester</label>
                                              <input type="text" class="form-control" placeholder="<?php echo $thn['semester'];?>" disabled>
                                            </div>
                                          </div>
                                                <input type="hidden" class="form-control" id="id_thn_ajaran" name="id_thn_ajaran" value="<?php echo $d['id_thn_ajaran'];?>">
                                                <?php
                                                    }
                                                ?>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                <label for="">Hal</label>
                                                <textarea  class="form-control"  required id="hal_sp" name="hal_sp" value="<?= $d["hal_sp"];?>"><?php echo $d['hal_sp'];?></textarea>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                              <label for="">No Surat Pengajuan</label>
                                                <input type="text" class="form-control"  required id="no_sp" name="no_sp" value="<?= $d["no_sp"];?>">
                                              </div>
                                          </div>                                         
                                            <div class="col-lg-6">
                                              <div class="form-group">
                                                <label for="exampleInputFile">Lampiran</label>
                                                <div class="input-group">
                                                  <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="lam_sp" name="lam_sp" value="<?= $d["lam_sp"];?>">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                  </div>  
                                                </div>
                                                <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.xls max 50MB!</small>
                                              </div>
                                            </div>
                                          </div>
                                       <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary col-md-2" id="edit" name="edit" >Save</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
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

if ( isset($_POST["decline"]))
{
        //cek data berhasil tambah atau tidak
  if  (dec_direktur($_POST)>0){
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
