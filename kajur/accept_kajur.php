<?php
error_reporting();
session_start();
include 'function.php';
$id_sp =$_GET['id_sp'];
if (acc_kajur($id_sp)>0){
	$_SESSION['alert_acc'] = 'true';
		echo "
			<script>
			document.location.href='detail_pengajuan.php?id_sp=$id_sp';
			</script>
			";
	}else {
	$_SESSION['alert_acc'] = 'false';
		echo "
			<script>
			document.location.href='detail_pengajuan.php?id_sp=$id_sp';
			</script>
			";
		}
?>