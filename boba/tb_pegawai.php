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
  <title>SISKA | Pegawai</title>
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
            <h1 class="m-0">Tabel Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
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
              <button type="button" class="btn btn-primary col-sm-2" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-circle"></i> &nbsp;Pegawai
              </button>
              <div><br></div>
              <!-- Modal Import Lampiran -->
              <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" class="forms-sample" enctype="multipart/form-data">
                      <input type="hidden" name="id_pegawai" id="id_pegawai">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control"  required id="nama_pegawai" name="nama_pegawai">
                          </div>  
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">Gelar Depan</label>
                            <input type="text" class="form-control" name="gelar_depan">
                          </div>  
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">Gelar Belakang</label>
                            <input type="text" class="form-control" name="gelar_belakang">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea class="form-control"  required id="alamat" name="alamat"></textarea>
                          </div>  
                        </div>
                        <div class="col-lg-2">
                          <label for="">Jenis Kelamin</label>
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                              <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                              <label class="form-check-label">Perempuan</label>
                            </div>
                          </div>  
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Agama</label>
                            <select class="form-control" name="agama" >
                              <option value="Budha">Budha</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Islam">Islam</option>
                              <option value="Konghucu">Konghucu</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Protestan">Protestan</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Status Pegawai</label>
                            <select class="form-control" name="status_pegawai" >
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                          </div> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="">Tempat</label>
                            <input type="text" class="form-control"  required id="tempat_lahir" name="tempat_lahir">
                          </div> 
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control"  required id="tgl_lahir" name="tgl_lahir">
                          </div> 
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">NIP/NPAK</label>
                            <input type="text" class="form-control" required id= "nip" name="nip">
                          </div>  
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label for="">No HP</label>
                            <input type=”tel”  class="form-control"  required id="no_hp" name="no_hp">
                          </div>  
                        </div>   
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control"  required id="email" name="email">
                          </div> 
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>  
                            </div>
                          </div> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="exampleInputFile">Tanda Tangan</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ttd" name="ttd">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>  
                            </div>
                            <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.jpg/jpeg/png max 5MB!</small>
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
                      NIP/NPAK
                    </th>
                    <th>
                      Status Pegawai
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($conn,"SELECT * FROM tb_pegawai");
                while($d = mysqli_fetch_array($data)){
                if($d['status_pegawai']== 'Aktif'){
                  $status = 'Aktif';
                  $warna = 'success';
                }elseif ($d['status_pegawai']== 'Tidak Aktif') {
                  $status = 'Tidak Aktif';
                  $warna = 'danger';
                }
               $t = substr($d['tgl_lahir'],0,4);
               $b = substr($d['tgl_lahir'],5,2);
               $h = substr($d['tgl_lahir'],8,2);

               if($b == "01"){
                   $nm = "Januari";
               } elseif($b == "02"){
                   $nm = "Februari";
               } elseif($b == "03"){
                   $nm = "Maret";
               } elseif($b == "04"){
                   $nm = "April";
               } elseif($b == "05"){
                   $nm = "Mei";
               } elseif($b == "06"){
                   $nm = "Juni";
               } elseif($b == "07"){
                   $nm = "Juli";
               } elseif($b == "08"){
                   $nm = "Agustus";
               } elseif($b == "09"){
                   $nm = "September";
               } elseif($b == "10"){
                   $nm = "Oktober";
               } elseif($b == "11"){
                   $nm = "November";
               } elseif($b == "12"){
                   $nm = "Desember";
              }
                ?>
                  <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $d['nama_pegawai']; ?></td>
                  <td><?php echo $d['nip']; ?></td>
                  <td class="text-center"><?php echo "<a class='badge bg-". $warna."'>". $status."</a>";?></td>
                  <td class="text-center">
                    <div class="btn-group btn-group-sm">
                      <a data-toggle="modal" data-target="#lihatModal<?php echo $d['id_pegawai']; ?>" class="btn btn-primary"><i class="fas fa-folder-open"></i> Detail</a>
                      <a data-toggle="modal" data-target="#modal-lg<?php echo $d['id_pegawai']; ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Edit</a> 
                      <a href="hapus_pegawai.php?id_pegawai=<?php echo $d['id_pegawai']; ?>" class="btn btn-danger alert_konfirmasi"><i class="fas fa-trash"></i> Hapus</a>      
                    </div>
                </td>
                <!-- Modal Edit Pegawai -->
                  <div class="modal fade" id="modal-lg<?php echo $d['id_pegawai']; ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data Pegawai</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?= $d['id_pegawai']?>">
                            <input type="hidden" name="foto_lama" id="foto_lama" value="<?= $d['foto']?>">
                            <input type="hidden" name="ttd_lama" id="ttd_lama" value="<?= $d['ttd']?>">
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">Nama Lengkap</label>
                                  <input type="text" class="form-control"  required id="nama_pegawai" name="nama_pegawai" value="<?= $d['nama_pegawai'];?>">
                                </div>  
                              </div>
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="">Gelar Depan</label>
                                  <input type="text" class="form-control" name="gelar_depan" value="<?= $d['gelar_depan'];?>">
                                </div>  
                              </div>
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="">Gelar Belakang</label>
                                  <input type="text" class="form-control" name="gelar_belakang" value="<?= $d['gelar_belakang'];?>">
                                </div>  
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">Alamat</label>
                                  <textarea class="form-control"  required id="alamat" name="alamat" value="<?= $d['alamat'];?>"><?php echo $d['alamat'];?></textarea>
                                </div>  
                              </div>
                              <div class="col-lg-2">
                                <label for="">Jenis Kelamin</label>
                                <div class="form-group">
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Laki-laki" <?php if($d['jk']=='Laki-laki') echo 'checked'?>>
                                    <label class="form-check-label">Laki-laki</label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jk" value="Perempuan" <?php if($d['jk']=='Perempuan') echo 'checked'?>>
                                    <label class="form-check-label">Perempuan</label>
                                  </div>
                                </div>  
                              </div>
                              <div class="col-lg-2">
                                <div class="form-group">
                                  <label for="">Agama</label>
                                  <select class="form-control" name="agama" >
                                    <option hidden selected value="<?= $d['agama'];?>"><?php echo $d['agama']?></option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Protestan">Protestan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="form-group">
                                  <label for="">Status Pegawai</label>
                                  <select class="form-control" name="status_pegawai" >
                                    <option hidden selected value="<?= $d['status_pegawai'];?>"><?php echo $d['status_pegawai']?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                  </select>
                                </div> 
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-2">
                                <div class="form-group">
                                  <label for="">Tempat</label>
                                  <input type="text" class="form-control"  required id="tempat_lahir" name="tempat_lahir" value="<?= $d['tempat_lahir'];?>">
                                </div> 
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <label for="">Tanggal Lahir</label>
                                  <input type="date" class="form-control"  required id="tgl_lahir" name="tgl_lahir" value="<?= $d['tgl_lahir'];?>">
                                </div> 
                              </div>
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="">NIP/NPAK</label>
                                  <input type="text" class="form-control" required id= "nip" name="nip" value="<?= $d['nip'];?>">
                                </div>  
                              </div>
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="">No HP</label>
                                  <input type="text" class="form-control"  required id="no_hp" name="no_hp" value="<?= $d['no_hp'];?>">
                                </div>  
                              </div>   
                            </div>
                            <div class="row">
                              
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputFile">Foto</label><br>
                                  <img src="../dist/img/<?= $d['foto'];?>"  width="100" height="100"><br><br>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="foto" name="foto">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>  
                                  </div>
                                  <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.jpg/jpeg/png max 5MB!</small>
                                </div>
                              </div> 
                              <div class="col-lg-3">
                                <div class="form-group">
                                  <label for="exampleInputFile">Tanda Tangan</label><br>
                                  <img src="../dist/img/<?= $d['ttd'];?>"  width="100" height="100"><br><br>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="ttd" name="ttd">
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>  
                                  </div>
                                  <small style="color:#dc3545;">*Format file yang diperbolehkan adalah file berformat *.jpg/jpeg/png max 5MB!</small>
                                </div> 
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="text" class="form-control"  required id="email" name="email" value="<?= $d['email'];?>">
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
                <div class="modal fade" id="lihatModal<?php echo $d['id_pegawai']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Detail Data Pegawai</h4>
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
                              <b>Alamat</b><a class="float-right"><?php echo $d['alamat']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Jenis Kelamin</b> <a class="float-right"><?php echo $d['jk']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Agama</b> <a class="float-right"><?php echo $d['agama']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Tempat Tanggal Lahir</b><?php echo "<a class='float-right'>". $d['tempat_lahir'].", ". $h." ". $nm. " ". $t. "</a>" ?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Email</b> <a class="float-right"><?php echo $d['email']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>NO HP</b> <a class="float-right"><?php echo $d['no_hp']?></a>
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
  if  (tambah_pegawai($_POST) < 0){
    $_SESSION['alert_tambah'] = 'false';
    echo "
    <script>
    document.location.href='tb_pegawai.php';
    </script>
    ";
  }else {
    $_SESSION['alert_tambah'] = 'true';
    echo "
    <script>
     document.location.href='tb_pegawai.php';
    </script>
    ";

  }
}
if ( isset($_POST["ubah"])) {
//cek data berhasil ubah atau tidak
  if  (ubah_pegawai($_POST)>0){
    $_SESSION['alert_edit'] = 'true';
    echo "
    <script>
      document.location.href='tb_pegawai.php';
    </script>";
  }else {
    $_SESSION['alert_edit'] = 'false';
    echo "
    <script>
      document.location.href='tb_pegawai.php';
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