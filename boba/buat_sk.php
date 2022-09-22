<?php
error_reporting();
session_start();
 
include 'function.php';

$id_sp     = $_GET['id_sp'];
$query     =mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.id_sp ='$id_sp'");
$result    =mysqli_fetch_array($query);
   $t = substr($result['tgl_direktur'],0,4);
   $b = substr($result['tgl_direktur'],5,2);
   $h = substr($result['tgl_direktur'],8,2);

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
$id_acc_user = $result['id_acc_user'];
$sql = "SELECT * FROM acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan WHERE acc_user.id_acc_user='$id_acc_user'"; 
$hasil = mysqli_query($conn, $sql);
$user  = mysqli_fetch_assoc($hasil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISKA | Buat SK</title>
     <?php include '../template/rel.php'; ?>
</head>
<style type="text/css">
    table {
      border-width: 1px;
      border-color: white;
    }

    table tr,td .text2 {
      text-align: justify;
      font-size: 16px;
    }
    .separator {
                border-bottom: 2px solid #616161;
                margin: 0.5rem 0 1.0rem;
            }
        .page {
            width: 210mm;
            min-height: 330mm;

        }
</style>
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
            <h1 class="m-0">Buat <?php echo $result['jns_sk'] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">SK</li>
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
                <center>
                  <table>
                    <tr>
                      <td><img src="../dist/img/pnc.png" width="100" height="`100"></td>
                      <td><center>
                        <font size="5" style="font-family:'Times New Roman',serif;">KEMENTRIAN PENDIDIKAN, DAN KEBUDAYAAN<br></font>
                        <font size="4" style="font-family:'Times New Roman',serif;">POLITEKNIK NEGERI CILACAP<br></font>
                        <font size="4" style="text-transform:uppercase; font-family:'Times New Roman',serif;"><strong><?php echo $user['nama_jurusan'];?></strong><br></font>
                        <font size="2" style="font-family:'Times New Roman',serif;">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>
                          Telepon: (0282)533329, Faksimile: (0282)537992<br>
                          Laman:</font><font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> www.politeknikcilacap.ac.id</font><font size="2"> Email: </font> <font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> poltec@politeknikcilacap.ac.id</font>
                      </center></td>      
                    </tr>
                    <tr>
                      <td colspan="2"><div class="separator"></div></td>
                    </tr>
                  </table>
                <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                  <input type="hidden" name="id_sp" value="<?= $result["id_sp"];?>">
                  <input type="hidden" name="no_sk" id="no_sk">
                  <input type="hidden" name="id_sk" id="id_sk">
                  <table>
                    <tr>
                      <td>
                      <center>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>KEPUTUSAN DIREKTUR POLITEKNIK NEGERI CILACAP<br>
                          NOMOR : </p>
                      </center>
                      </td>     
                    </tr>
                  </table>
                  <table>
                    <tr>
                      <td>
                      <center>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>TENTANG</p>
                          <input type="text" class="form-control form-control-border" id="perihal_sk" name="perihal_sk" style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:19px;font-family:"Times New Roman",serif;text-align:center;' value="<?php echo html_entity_decode($result['tentang']);?>">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center; text-transform: uppercase;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>PADA JURUSAN <?php echo $user['nama_jurusan'];?> SEMESTER <?php echo $result['semester'];?></span></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>TAHUN AKADEMIK <?php echo $result['thn_ajaran'];?></span></p>
                      </center>
                      </td>     
                    </tr>
                  </table>
                  <br>
                  <table >
                    <tr>
                      <td>
                      <center>
                        <p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:150%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:150%;font-family:"Times New Roman",serif;'>DIREKTUR POLITEKNIK NEGERI CILACAP</span></p>
                      </center>
                      </td>
                    </tr>
                  </table>
                  <br>
                  <table>
                    <tr class="text2">
                      <td width="700" style="vertical-align: top; font-family:'Times New Roman',serif;">
                        <textarea id="summernote1" name="menimbang_sk">
                          <?php echo html_entity_decode($result['menimbang']);?></td>
                        </textarea>
                    </tr>
                  </table>
                  <table>
                    <tr class="text2">
                      <td width="700" style="vertical-align: top; font-family:'Times New Roman',serif;">
                        <textarea id="summernote2" name="mengingat_sk"><?php echo html_entity_decode($result['mengingat']);?></td>
                        </textarea>
                    </tr>
                  </table>
                  <table>
                    <tr class="text2">
                      <td width="700" style="vertical-align: top; font-family:'Times New Roman',serif;">
                        <textarea id="summernote3" name="memperhatikan_sk"><?php echo html_entity_decode($result['memperhatikan']);?>
                        </textarea></td>
                    </tr>
                  </table>
                  <table>
                    <tr>
                      <td>
                      <center>
                        <font size="3" style="vertical-align: top; font-family:'Times New Roman',serif;">MEMUTUSKAN</font>
                      </center>
                      </td>     
                    </tr>
                  </table>
                  <table>
                    <tr class="text2">
                      <td width="700" style="vertical-align: top; font-family:'Times New Roman',serif;">
                        <textarea id="summernote4" name="menetapkan_sk"><?php echo html_entity_decode($result['menetapkan']);?>
                        </textarea></td>
                    </tr>         
                  </table>
                  <table>
                    <tr>
                      <td>
                      <center>
                        <font size="3" style="vertical-align: top; font-family:'Times New Roman',serif;">LAMPIRAN </font>
                      </center>
                      </td>     
                    </tr>
                  </table>
                  <table>
                    <tr class="text2">
                      <td width="700" style="vertical-align: top; font-family:'Times New Roman',serif;">
                        <textarea id="summernote5" name="lam_sk"><?php echo html_entity_decode($result['lam_sp']);?>
                        </textarea></td>
                    </tr>         
                  </table>
                  <table hidden>
                    
                    <tr class="text2">
                      <td width="300"></td>
                      <td style="font-family:'Times New Roman',serif;"><br><br> Ditetapkan di Cilacap<br>DIREKTUR POLITEKNIK NEGERI CILACAP</td>
                    </tr>
                    <tr class="text2">
                      <td></td>
                      <td style="font-size: 12px; font-family:'Times New Roman',serif;">
                      <?php
                      $sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.level='Direktur'");
                      $row_dir    = mysqli_fetch_array($sql);
                      if ($result['status'] == 4) {
                        echo "<img src='../dist/img/".$row['ttd']."' width='120' height='90'>";
                      }
                      else{
                        echo "<br><br><br>";
                      }
                      ?>
                    </tr>
                    <tr class="text2">
                      <td width="300"></td>
                      <td width="300" style="font-family:'Times New Roman',serif;"><?php echo $row_dir['nama_pegawai'];?><br>NPAK. <?php echo $row_dir['nip'];?></td>
                    </tr>
                  </table>
                </center>
                <button type="submit" class="btn btn-primary" id="buat" name="buat" style="float: right;">Buat SK</button>
                <a href='detail_pengajuan.php?id_sp=<?=$id_sp?>'class="btn btn-secondary"  style="float: right;">Close</a>
                </form>
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


if ( isset($_POST["buat"]))
{
        //cek data berhasil tambah atau tidak
  if  (buat_sk($_POST)>0){
    $_SESSION['alert_sk'] = 'true';
    echo "
    <script>
    document.location.href='detail_pengajuan.php?id_sp=$id_sp';
    </script>
    ";
  }else {
    $_SESSION['alert_sk'] = 'false';
    echo "
    <script>
     document.location.href='detail_pengajuan.php?id_sp=$id_sp';
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
