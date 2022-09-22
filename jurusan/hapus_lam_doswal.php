<?php 
session_start();
include 'function.php';
$id_lam_doswal=$_GET["id_lam_doswal"];
$tb_lam = mysqli_query($conn,"SELECT * FROM tb_lam_doswal where id_lam_doswal = '$id_lam_doswal'");
$doswal   = mysqli_fetch_array($tb_lam);
$sp = $doswal['id_sp'];

if (hapus_lam_doswal($id_lam_doswal)>0){
    $_SESSION["alert_hapus"] = 'true';
        echo "
            <script>
            document.location.href='lampiran.php?id_sp=$sp';
            </script>
            ";
        }else {
    $_SESSION["alert_hapus"] = 'false';
        echo "
            <script>
            document.location.href='lampiran.php?id_sp=$sp';
            </script>
            ";
        }

?>