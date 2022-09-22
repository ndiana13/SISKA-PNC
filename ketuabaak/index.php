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
  <title>SISKA | Dashboard</title>

    <?php include '../template/rel.php'; ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
      <?php    include '../template/header.php'; ?>
      <?php    include '../template/sidebar_verifikator.php'; ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Selamat Datang, <?php echo "<a>". $row['gelar_depan']." ". $row['nama_pegawai']. ", ". $row['gelar_belakang']. "</a>" ?> di SISKA PNC</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan SK Mengajar</span>
                <span class="info-box-number"><?php echo $jumlah_sk_mengajar; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan SK Magang</span>
                <span class="info-box-number"><?php echo $jumlah_sk_magang; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pengajuan SK Dosen Wali</span>
                <span class="info-box-number"><?php echo $jumlah_sk_doswal; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pengajuan SK</span>
                <span class="info-box-number"><?php echo $jumlah_sk; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK Mengajar</span>
                <span class="info-box-number"><?php echo $j_sk_mengajar; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK Magang</span>
                <span class="info-box-number"><?php echo $j_sk_magang; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SK DosWal</span>
                <span class="info-box-number"><?php echo $j_sk_doswal; ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jumlah SK</span>
                <span class="info-box-number"><?php echo $j_sk; ?></span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-6">
          <!-- Profile Image -->
          <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
              </div>
            <div class="card-body box-profile">
             <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"src=../dist/img/<?= $row['foto']; ?> alt="User profile picture">
              </div>
              <h3 class="profile-username text-center"><?php echo "<a>". $row['gelar_depan']." ". $row['nama_pegawai']. ", ". $row['gelar_belakang']. "</a>" ?> </h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Role</b> <a class="float-right"><?php
                    echo $row['level'];?></a>
                </li>

                <li class="list-group-item">
                  <b>Username</b> <a class="float-right"><?php
                    echo $row['username'];?></a>
                </li>

                <li class="list-group-item">
                  <b>No HP</b> <a class="float-right"><?php
                    echo $row['no_hp'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php
                    echo $row['email'];?></a>
                </li>
              </ul>
                 <!-- // Tombol Edit Profil dan Ganti Password // -->
                <a  class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-lg<?php echo $_SESSION['id_acc_user']; ?>"><b>Edit Profil</b></a>
                <a  class="btn btn-primary float-right" data-toggle="modal" data-target="#Mymodal<?php echo $_SESSION['id_acc_user']; ?>"><b>Ganti Password</b></a>
            </div>
             
             <!--  Modals Edit Profile  -->
              <div class="modal fade" id="modal-lg<?php echo $_SESSION['id_acc_user']; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Profil</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                        <input type="hidden" name="id_acc_user" value="<?= $row["id_acc_user"];?>">
                        <input type="hidden" name="id_pegawai" value="<?= $row["id_pegawai"];?>">
                        <input type="hidden" id="foto_lama" name="foto_lama" value="<?php echo $row['foto'] ?>">
                        <input type="hidden" id="ttd_lama" name="ttd_lama" value="<?php echo $row['ttd'] ?>">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Nama Lengkap</label>
                              <input type="text" class="form-control"  required id="nama_pegawai" name="nama_pegawai" value="<?= $row["nama_pegawai"];?>">
                            </div>  
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label for="">Gelar Depan</label>
                              <input type="text" class="form-control"  id="" name="gelar_depan" value="<?= $row["gelar_depan"];?>">
                            </div>  
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label for="">Gelar Belakang</label>
                              <input type="text" class="form-control"  required id="" name="gelar_belakang" value="<?= $row["gelar_belakang"];?>">
                            </div>  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" class="form-control"  required id="username" name="username" value="<?= $row["username"];?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">No HP</label>
                              <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $row["no_hp"];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Alamat</label>
                              <textarea class="form-control" id="alamat" name="alamat" value="<?= $row["alamat"];?>"><?= $row["alamat"];?></textarea>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label for="">Email</label>
                              <input type="text" class="form-control"  required id="email" name="email" value="<?= $row["email"];?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="exampleInputFile">Foto</label><br>
                              <img src="../dist/img/<?= $row['foto'];?>"  width="100" height="100"><br><br>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>  
                              </div>
                              <label for="exampleInputFile" style="color: gray;">*ukuran foto max 5MB (4x4)</label>
                            </div> 
                          </div>
                          <div class="col-lg-6" hidden>
                            <div class="form-group">
                              <label for="exampleInputFile">Tanda Tangan</label><br>
                              <img src="../dist/img/<?= $row['ttd'];?>"  width="100" height="100"><br><br>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ttd" name="ttd">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>  
                              </div>
                              <label for="exampleInputFile" style="color: gray;">*ukuran tanda tangan max 5MB (background transparant)</label>
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
              <!-- Modals Ganti Password -->
            <div class="modal fade" id="Mymodal<?php echo $_SESSION['id_acc_user']; ?>">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Ganti Password</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" class="forms-sample" enctype="multipart/form-data">
                        <input type="hidden" name="id_acc_user" value="<?= $row["id_acc_user"];?>">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Password Baru</label>
                              <input type="password" class="form-control"  required id="password" name="password">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                             <label for="">Konfirmasi Password</label>
                              <input type="text" class="form-control"  required id="newpassword" name="newpassword">
                            </div>
                          </div>
                        </div>
                    </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary col-md-2" id="gantipass" name="gantipass" >Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
            <!-- About Me Box -->
          <div class="col-lg-8 col-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Syarat dan Ketentuan Pengajuan SK</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">

                      <!-- /.user-block -->
                      <p><ol>
                        <li>Pegawai terdaftar sebagai pegawai di Politeknik Negeri Cilacap</li>
                        <li>Lampiran yang akan dilampirkan di SK Magang/SK Mengajar/SK Dosen Wali (Format lampiran dalam bentuk .xls)</li><br>
                        <div class="row">
                          <div class="col-md-4">                          
                            <a class="btn btn-primary btn-block" href="../baak/contoh/Format_Pengajuan_SK_Mengajar.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Mengajar</a>
                          </div>
                           <div class="col-md-4">                          
                            <a class="btn btn-success btn-block" href="../baak/contoh/Format_Pengajuan_SK_Magang.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Magang</a>
                          </div>
                          <div class="col-md-4">                          
                            <a class="btn btn-warning btn-block" href="../baak/contoh/Format_Pengajuan_SK_Doswal.docx"><i class="far fa-file"></i> Contoh Format Lampiran Surat Keputusan Dosen Wali</a>
                          </div>
                        </div>
                      </ol></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php 
    include '../template/footer.php';
    include '../template/script.php';

if ( isset($_POST["submit"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_profil($_POST)>0){

    $_SESSION['alert_profil'] = 'true';

    echo "
    <script>
      document.location.href='index.php';
    </script>";
  }else {
    $_SESSION['alert_profil'] = 'false';
    echo "
    <script>
      document.location.href='index.php';
    </script>";
  }
}  
if ( isset($_POST["gantipass"])) {
  //cek data berhasil ubah atau tidak
  if  (ganti_password($_POST)>0){

    $_SESSION['alert_password'] = 'true';

    echo "
    <script>
      document.location.href='index.php';
    </script>";
  }else {

    $_SESSION['alert_password'] = 'false';

    echo "
    <script>
      document.location.href='index.php';
    </script>";
  }
}
?>

</body>
</html>
