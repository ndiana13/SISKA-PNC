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
      <?php    include '../template/sidebar_jurusan.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Surat Pengajuan</h1>
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
              <!-- Tombol Pengajuan -->
              <button type="button" class="btn btn-primary col-md-2" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-circle"></i> &nbsp;Pengajuan 
              </button>
              <div><br></div>
              <!-- Modal Pengajuan SK -->
            <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Form Surat Pengajuan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" class="forms-sample" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" placeholder="id_sp" name="id_sp" id="id_sp"  >
                    <input type="hidden" class="form-control" name="id_acc_user" id="id_acc_user"  value="<?php echo $row['id_acc_user'];?>">
                    <input type="hidden" class="form-control" name="status" id="status"  value="0" >
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
                            <select class="form-control" id="id_jns_sk" name="id_jns_sk">
                                <?php

                                $tb_jns_sk =mysqli_query($conn,"SELECT * FROM tb_jns_sk");
                                    while ($data= mysqli_fetch_array($tb_jns_sk)) {
                                ?>
                                <option value="<?= $data['id_jns_sk'];?>" ><?php echo $data['jns_sk'];?></option>
                                <?php 
                                    }
                                ?>
                            </select>
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
                            <input type="hidden" class="form-control" id="id_thn_ajaran" name="id_thn_ajaran" value="<?php echo $thn['id_thn_ajaran'];?>">
                            <?php
                                }
                            ?>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">Hal</label>
                          <textarea class="form-control" name="hal_sp" required id ="hal_sp"placeholder="Ex: Pengajuan SK Pengampu Mata Kuliah"></textarea>
                        </div>
                      </div>
                      
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="">No Surat Pengajuan</label>
                          <input type="text" class="form-control" name="no_sp" required id ="no_sp" placeholder="Cth : 001/PL43.J02/PK.01.06/2022">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <p>Panduan Penomoran<br>
                          SK Dosen Wali : No Surat Keluar/PL.43.Kode Jurusan/PK.01.06/Tahun Pengajuan <br>
                          SK Pengampu Mata Kuliah : No Surat Keluar/PL.43.Kode Jurusan/PK.01.03/Tahun Pengajuan<br>
                          SK Magang Industri : No Surat Keluar/PL.43.Kode Jurusan/PK.01.08/Tahun Pengajuan</p>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="">Lampiran</label>
                          <textarea class="summernote" name="lam_sp"></textarea> 
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary col-md-2" id="submit" name="submit" >Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
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
                $id_jurusan = $row['id_jurusan'];
                $pengajuan = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE acc_user.id_jurusan = '$id_jurusan' ORDER BY tb_sp.id_sp DESC");
                $no= 1;
                while($d = mysqli_fetch_array($pengajuan)) {
                if($d['status_sp']=='1'){
                    $status = 'Accept Kajur';
                    $warna = 'warning';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='2'){
                    $status = 'SK Sudah Dibuat';
                    $warna = 'primary';
                    $tombol = 'hidden';

                    }
                    elseif ($d['status_sp']=='3'){
                    $status = 'Accept Ketua BAAK';
                    $warna = 'success';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='4'){
                    $status = 'Decline Ketua BAAK';
                    $warna = 'danger';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='5'){
                    $status = 'Accept Wadir I';
                    $warna = 'success';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='6'){
                    $status = 'Decline Wadir I';
                    $warna = 'danger';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='7'){
                    $status = 'Accept Direktur';
                    $warna = 'success';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='8'){
                    $status = 'Decline Direktur';
                    $warna = 'danger';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='9'){
                    $status = 'SK Selesai';
                    $warna = 'info';
                    $tombol = 'hidden';
                    }
                    elseif ($d['status_sp']=='10'){
                    $status = 'Ditolak';
                    $warna = 'danger';
                    $tombol = 'hidden';
                    }
                    else {
                        $status = 'Belum Diverifikasi';
                        $warna = 'secondary';
                        $tombol = '';
                    }
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['nama_pegawai']; ?></td>
                      <td><?php echo $d['tgl_sp'] ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $row['nama_jurusan']; ?><br><?php echo $d['thn_ajaran']; ?><br><?php echo $d['semester']; ?></td>
                      <td><?php echo $d['hal_sp']; ?></td>
                      <td><?php echo "<a class='badge bg-". $warna."'>". $status."</a>";?>
                      <td>
                        <!-- Tombol Aksi Pengajuan -->
                        <div class="btn-group btn-group-sm">
                          <a href="detail_pengajuan.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-primary"><i class="fas fa-folder-open"></i> Detail</a>
                          <a href="hapus_pengajuan.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-danger alert_konfirmasi" <?= $tombol;?> ><i class="fas fa-trash"></i> Hapus</a>  
                          <a data-toggle="modal" data-target="#modal-lg<?php echo $d['id_sp']; ?>" class="btn btn-info" <?= $tombol;?>><i class="fas fa-pencil-alt"></i> Edit</a>     
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
                                          <div class="col-lg-12">
                                            <div class="form-group">
                                              <label>Lampiran</label>
                                              <textarea class="summernote" name="lam_sp" value="<?= $d["lam_sp"];?>"><?php echo html_entity_decode($d['lam_sp']);?></textarea>
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
