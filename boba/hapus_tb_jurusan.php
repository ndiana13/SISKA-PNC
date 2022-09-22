<?php
session_start();
include 'function.php';
$id_jurusan =$_GET["id_jurusan"];
if (hapus_jurusan($id_jurusan)>0){
    $_SESSION['alert_hapus'] = 'true';
        echo "

            <script>
            document.location.href='tb_jurusan.php';
            </script>
            ";
    }else {
    $_SESSION['alert_hapus'] = 'false';
        echo "
            <script>
            document.location.href='tb_jurusan.php';
            </script>
            ";
    }

?>