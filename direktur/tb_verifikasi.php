<?php
error_reporting();
$server = "localhost";
$user = "root";
$pass = "";
$database = "siska";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
session_start();
 
if (!isset($_SESSION['nip'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | DataTables</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
      <?php    include '../AdminLTE/header.php'; ?>
      <?php    include '../AdminLTE/sidebar2.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tabel Verifikasi</h1>
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
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr style="text-align: center;">
                      <th>#</th>
                      <th>
                        Nama<br>Tanggal
                      </th>     
                      <th>
                        No Pengajuan
                      </th>
                      <th>
                        Jurusan
                      </th>
                      <th>
                        Perihal
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Action
                      </th>
                      <th>
                        Detail
                      </th>
                    </tr>
                </thead>
              <tbody>
              <?php          
                $connection = mysqli_connect("localhost",'root',"","siska");
                $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_jurusan ON tb_pengajuan.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_pengajuan.nip = tb_pengguna.nip WHERE status=3";
                $result = mysqli_query($connection,$sql);
                $no= 1;
                while($d = mysqli_fetch_array($result)) {
                    if($d['status']=='1'){
                      $status = 'Diverifikasi Kajur';
                      $warna = 'warning';
                      $t = substr($d['tgl_kajur'],0,4);
                      $b = substr($d['tgl_kajur'],5,2);
                      $h = substr($d['tgl_kajur'],8,2);

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
                      $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                      }
                      elseif ($d['status']=='2'){
                      $status = 'Diverifikasi BAAK';
                      $warna = 'primary';
                      $t = substr($d['tgl_baak'],0,4);
                      $b = substr($d['tgl_baak'],5,2);
                      $h = substr($d['tgl_baak'],8,2);

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
                      $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                      }
                      elseif ($d['status']=='3'){
                      $status = 'Diverifikasi Wadir';
                      $warna = 'primary';
                      $t = substr($d['tgl_wadir'],0,4);
                      $b = substr($d['tgl_wadir'],5,2);
                      $h = substr($d['tgl_wadir'],8,2);

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
                      $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                      }
                      elseif ($d['status']=='4'){
                      $status = 'Diverifikasi Direktur';
                      $warna = 'success';
                      $t = substr($d['tgl_direktur'],0,4);
                      $b = substr($d['tgl_direktur'],5,2);
                      $h = substr($d['tgl_direktur'],8,2);

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
                      $tgl = "<a>". $h." ". $nm. " ". $t. "</a>";
                      }
                      elseif ($d['status']=='5'){
                      $status = 'Ditolak';
                      $warna = 'danger';
                      $tgl = '';
                      }
                      else {
                          $status = 'Belum Diverifikasi';
                          $warna = 'secondary';
                          $tgl= '';
                        }

                     $t = substr($d['tgl_sp'],0,4);
                     $b = substr($d['tgl_sp'],5,2);
                     $h = substr($d['tgl_sp'],8,2);

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
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_lengkap']; ?><br><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></td>
                      <td><?php echo $d['no_sp']; ?></td>
                      <td><?php echo $d['nm_jurusan']; ?><br><?php echo $d['thn_akademik']; ?></td>
                      <td><?php echo $d['perihal']; ?></td>
                      <td><?php echo "<a  class='badge bg-". $warna."'>". $status."</a>";?><br><?php echo "<a>" .$tgl. "<a>"?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="accept_direktur.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-info" onclick="return confirm('Anda yakin ingin menerima pengajuan ini ?')"><i class="fas fa-check"></i> Terima</a>
                          <a href="decline_direktur.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menolak pengajuan ini ?')"><i class="fas fa-times"></i>Tolak</a>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="cetak_sk_mengajar.php?id_sp=<?php echo $d['id_sp']; ?>" class="btn btn-primary"><i class="fas fa-save"></i> SK</a>
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
  </div>
  <!-- /.content-wrapper -->
  <?php include '../AdminLTE/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
</body>
</html>