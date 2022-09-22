<?php
session_start();
include 'function.php';
$id_acc_user =$_GET["id_acc_user"];
if (hapus_acc_user($id_acc_user)>0){
    $_SESSION['alert_hapus'] = 'true';
        echo "

            <script>
            document.location.href='acc_user.php';
            </script>
            ";
    }else {
    $_SESSION['alert_hapus'] = 'false';
        echo "
            <script>
            document.location.href='acc_user.php';
            </script>
            ";
    }

?>