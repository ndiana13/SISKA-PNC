<?php
error_reporting();
session_start();
include 'function.php';
$id_sp     = $_GET['id_sp'];
$timeline  = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.id_sp='$id_sp'");
$detail    = mysqli_fetch_array($timeline);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Lampiran</title>
     <?php include '../template/rel.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Template Header & Sidebar -->
      <?php    include '../template/header.php'; ?>
      <?php    include '../template/sidebar_jurusan.php'; ?>
      
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Lampiran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
              <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-default"><i class="fas fa-download"></i> Import Lampiran</button>
              <a href="hapus_lam_sdoswal.php?id_sp=<?php echo $id_sp; ?>" class="btn btn-danger float-sm-right alert_konfirmasi"><i class="fas fa-trash"></i> &nbsp;Hapus Semua Data
              </a><br><br><br>
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
                            <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.xlxs max 50MB!</small>
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
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>
                    Nama Dosen
                  </th>
                  <th>
                    NPM
                  </th>
                  <th>
                    Nama Mahasiswa
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php                
                $result = mysqli_query($conn, "SELECT * FROM tb_lam_doswal WHERE id_sp ='$id_sp'");
                $no= 1;
                while($d = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_doswal']; ?></td>
                      <td><?php echo $d['npm'];?></td>
                      <td><?php echo $d['nama_mhs'];?></td>
                      
                      <td style="text-align: center;">
                        <div class="btn-group btn-group-sm">
                          <a data-toggle="modal" data-target="#modal-lg<?php echo $d['id_lam_doswal']; ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a>
                          <a href="hapus_lam_doswal.php?id_lam_doswal=<?php echo $d['id_lam_doswal']; ?>" class="btn btn-danger alert_konfirmasi"><i class="fas fa-trash"></i> Hapus</a>       
                        </div>
                      </td>
                      <!-- /.timeline -->
                      <!-- Modal Import Lampiran -->
                      <div class="modal fade" id="modal-lg<?php echo $d['id_lam_doswal']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Lampiran</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" class="forms-sample" enctype="multipart/form-data">
                                <input type="text" name="id_lam_doswal" value="<?= $d['id_lam_doswal']?>" hidden>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="">Nama Dosen</label>
                                      <input type="text" class="form-control" name="nama_doswal" value="<?= $d["nama_doswal"];?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="">NPM</label>
                                      <input type="text" class="form-control" name="npm" value="<?= $d["npm"];?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Nama Mahasiswa</label>
                                      <input type="text" class="form-control" name="nama_mhs" value="<?= $d["nama_mhs"];?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" id="edit_doswal" name="edit_doswal">Edit</button>
                                </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /. Modal Import Lampiran -->
                    </div>
                    </tr>
                  </tbody>
                  <?php
                  } 
                  ?>   
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

if (isset($_POST['upload'])) {


    require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('spreadsheet-reader-master/SpreadsheetReader.php');

    //upload data excel kedalam folder uploads
    $target_dir = "../dist/img/lampiran/".basename($_FILES['lam_sp']['name']);
    
    move_uploaded_file($_FILES['lam_sp']['tmp_name'],$target_dir);

    $Reader = new SpreadsheetReader($target_dir);

    foreach ($Reader as $Key => $Row)
    {
      // import data excel mulai baris ke-2 (karena ada header pada baris 1)
      if ($Key < 1) continue;     
      $query=mysqli_query($conn, "INSERT INTO tb_lam_doswal(id_lam_doswal,nama_doswal,npm,nama_mhs,id_sp) VALUES ('','".$Row[0]."','".$Row[1]."','".$Row[2]."','$id_sp')");
    }
    if ($query) {
      $_SESSION['alert_import'] = 'true';
      echo 
      "<script>
      document.location.href='lampiran_doswal.php?id_sp=$id_sp';
      </script>";
      }else{
        echo mysqli_error();
      }
}


if ( isset($_POST["edit_doswal"])) {
    //cek data berhasil ubah atau tidak
    if  (ubah_doswal($_POST)>0){
      $_SESSION["alert_edit"] = 'true';
      echo "
      <script>
      document.location.href='lampiran_doswal.php?id_sp=$id_sp';
      </script>
      ";
    }else {
    $_SESSION["alert_edit"] = 'false';
    echo "
      <script>
      document.location.href='lampiran_doswal.php?id_sp=$id_sp';
      </script>
      ";
    }
  }
?>
</body>
</html>