<?php 
session_start();
include 'function.php';
$id_sp=$_GET["id_sp"];

if (hapus_sp($id_sp)>0){
    $_SESSION["alert_hapus"] = 'true';
        echo "
            <script>
            document.location.href='tb_pengajuan.php';
            </script>
            ";
    }else {
    $_SESSION["alert_hapus"] = 'false';        
        echo "
            <script>
            alert('data gagal dihapus');
            document.location.href='tb_pengajuan.php';
            </script>
            ";
        }

?>