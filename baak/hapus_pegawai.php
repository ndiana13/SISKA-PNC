<?php
session_start();
include 'function.php';
$id_pegawai =$_GET["id_pegawai"];
if (hapus_pegawai($id_pegawai)>0){
    $_SESSION['alert_hapus'] = 'true';
        echo "

            <script>
            document.location.href='tb_pegawai.php';
            </script>
            ";
    }else {
    $_SESSION['alert_hapus'] = 'false';
        echo "
            <script>
            document.location.href='tb_pegawai.php';
            </script>
            ";
    }

?>