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
  <title>SISKA | Akun User</title>
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
            <h1 class="m-0">Tabel Akun User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Akun User</li>
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
              <button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus-circle"></i> &nbsp;Akun User
              </button>
              <div><br></div>
              <!-- Modal Import Lampiran -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-default">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Akun User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <input type="hidden" name="id_acc_user" id="id_acc_user">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label for="">Nama Pegawai</label>
                            <select class="form-control select2bs4" style="width: 100%;" name='id_pegawai'>
                              <option selected="selected" style="text-align: center;">Pilih Pegawai</option>
                              <?php
                              $pegawai = mysqli_query($conn,"SELECT * FROM tb_pegawai");
                              while($tb_pegawai = mysqli_fetch_array($pegawai)){
                                ?>
                                <option value="<?= $tb_pegawai['id_pegawai'];?>"><?php echo "<a>". $tb_pegawai['gelar_depan']." ". $tb_pegawai['nama_pegawai']. ", ". $tb_pegawai['gelar_belakang']. "</a>" ?></option>

                              <?php }  ?>
                            </select>
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Jurusan</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="id_jurusan">
                              <option selected="selected" style="text-align: center;">Pilih Jurusan</option>
                              <?php
                              $jurusan = mysqli_query($conn,"SELECT * FROM tb_jurusan");
                              while($tb_jurusan = mysqli_fetch_array($jurusan)){
                                ?>
                                <option value="<?= $tb_jurusan['id_jurusan'];?>"><?php echo $tb_jurusan['kode_jurusan']; ?></option>

                              <?php }  ?>
                            </select>
                          </div>  
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="level">
                              <option selected="selected" style="text-align: center;">Pilih Role</option>
                              <option value="Admin Jurusan">Admin Jurusan</option>
                              <option value="Ketua Jurusan">Ketua Jurusan</option>
                              <option value="BAAK">BAAK</option>
                              <option value="Ketua BAAK">Ketua BAAK</option>
                              <option value="Wakil Direktur I">Wakil Direktur I</option>
                              <option value="Direktur">Direktur</option>
                            </select>
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" type="text" name="username" required id="username">
                          </div>  
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" type="password" name="password" required id="password">
                          </div>  
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit">Save</button>
                  </div>
                </form>
              </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        <!-- /. Modal Import Lampiran -->            
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: center;">
                  <tr>
                    <th>#</th>
                    <th>
                      Nama Pegawai
                    </th>
                    <th>
                      Role
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan ");
                while($d = mysqli_fetch_array($data)){
                  if($d['level']=='Admin Jurusan'){
                    $warna = 'danger';
                    }
                    elseif ($d['level']=='Ketua Jurusan'){
                    $warna = 'warning';
                    }
                    elseif ($d['level']=='BAAK'){
                    $warna = 'success';
                    }
                    elseif ($d['level']=='Ketua BAAK'){
                    $warna = 'primary';
                    }
                    elseif ($d['level']=='Wakil Direktur I'){
                    $warna = 'primary';
                    }
                    elseif ($d['level']=='Direktur'){
                    $warna = 'primary';
                    }
                    elseif ($d['level']=='Bagian Umum'){
                    $warna = 'success';
                    }

                ?>
                  <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $d['nama_pegawai']; ?></td>
                  <td class="text-center"><?php echo "<a class='badge bg-". $warna."'>". $d['level']."</a>";?></td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a data-toggle="modal" data-target="#lihatModal<?php echo $d['id_acc_user']; ?>" class="btn btn-primary"><i class="fas fa-folder-open"></i> Detail</a>
                      <a data-toggle="modal" data-target="#modal-default<?php echo $d['id_acc_user']; ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a> 
                      <a href="hapus_acc_user.php?id_acc_user=<?php echo $d['id_acc_user']; ?>" class="btn btn-danger alert_konfirmasi"><i class="fas fa-trash"></i> Hapus</a>      
                    </div>
                </td>
                <!-- Modal Edit Pegawai -->
                  <div class="modal fade" id="modal-default<?php echo $d['id_acc_user']; ?>">
                    <div class="modal-dialog modal-default">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Pegawai</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id_acc_user" id="id_acc_user" value="<?= $d['id_acc_user']?>">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="">Nama Pegawai</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name='id_pegawai'>
                                      <option hidden selected value="<?= $d['id_pegawai'];?>"><?php echo "<a>". $d['gelar_depan']." ". $d['nama_pegawai']. ", ". $d['gelar_belakang']. "</a>" ?></option>
                                      <?php
                                      $pegawai = mysqli_query($conn,"SELECT * FROM tb_pegawai");
                                      while($tb_pegawai = mysqli_fetch_array($pegawai)){
                                        ?>
                                        <option value="<?= $tb_pegawai['id_pegawai'];?>"><?php echo "<a>". $tb_pegawai['gelar_depan']." ". $tb_pegawai['nama_pegawai']. ", ". $tb_pegawai['gelar_belakang']. "</a>" ?></option>

                                      <?php }  ?>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">Jurusan</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="id_jurusan">
                                      <option hidden selected value="<?= $d['id_jurusan'];?>"><?php echo $d['kode_jurusan'] ?></option>
                                      <?php
                                      $jurusan = mysqli_query($conn,"SELECT * FROM tb_jurusan");
                                      while($tb_jurusan = mysqli_fetch_array($jurusan)){
                                        ?>
                                        <option value="<?= $tb_jurusan['id_jurusan'];?>"><?php echo $tb_jurusan['kode_jurusan']; ?></option>

                                      <?php }  ?>
                                    </select>
                                  </div>  
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">Role</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="level">
                                      <option hidden selected value="<?= $d['level'];?>"><?php echo $d['level'] ?></option>
                                      <option value="Admin Jurusan">Admin Jurusan</option>
                                      <option value="Ketua Jurusan">Ketua Jurusan</option>
                                      <option value="BAAK">BAAK</option>
                                      <option value="Ketua BAAK">Ketua BAAK</option>
                                      <option value="Wakil Direktur I">Wakil Direktur I</option>
                                      <option value="Direktur">Direktur</option>
                                    </select>
                                  </div>  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">Username</label>
                                    <input class="form-control" type="text" name="username" required id="username" value="<?= $d['username']?>">
                                  </div>  
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" name="password" required id="password" value="<?= $d['password']?>">
                                  </div>  
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary col-md-2" id="ubah" name="ubah" >Save</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal Edit Pegawai -->
                <div class="modal fade" id="lihatModal<?php echo $d['id_acc_user']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Akun User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card-body box-profile">
                          <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="../dist/img/<?= $d['foto'];?>" alt="User profile picture"></div>
                          <h3 class="profile-username text-center"><?php echo "<a>". $d['gelar_depan']." ". $d['nama_pegawai']. ", ". $d['gelar_belakang']. "</a>" ?> </h3>
                          <p class="text-muted text-center"><?php echo $d['status_pegawai']?></p>
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>NIP/NPAK</b> <a class="float-right"><?php echo $d['nip']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Username</b> <a class="float-right"><?php echo $d['username']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Password</b> <a class="float-right"><?php echo $d['password']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Role</b> <a class="float-right"><?php echo $d['level']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tanda Tangan</b> <a class="float-right"><img src="../dist/img/<?= $d['ttd'];?>" width="50" height="50"></a>
                            </li>
                          </ul>
                          <button type="button" class="btn btn-info btn-block" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
  if  (tambah_acc_user($_POST) < 0){
    $_SESSION['alert_tambah'] = 'false';
    echo "
    <script>
    document.location.href='acc_user.php';
    </script>
    ";
  }else {
    $_SESSION['alert_tambah'] = 'true';
    echo "
    <script>
     document.location.href='acc_user.php';
    </script>
    ";

  }
}
if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_acc_user($_POST)>0){
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='acc_user.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'false';
    echo "
    <script>
      document.location.href='acc_user.php';
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