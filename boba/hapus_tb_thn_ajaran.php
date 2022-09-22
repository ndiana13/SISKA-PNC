<?php
session_start();
include 'function.php';
$id_thn_ajaran =$_GET["id_thn_ajaran"];
if (hapus_thn_ajaran($id_thn_ajaran)>0){
    $_SESSION['alert_hapus'] = 'true';
        echo "

            <script>
            document.location.href='tb_thn_ajaran.php';
            </script>
            ";
    }else {
    $_SESSION['alert_hapus'] = 'false';
        echo "
            <script>
            document.location.href='tb_thn_ajaran.php';
            </script>
            ";
    }

?>