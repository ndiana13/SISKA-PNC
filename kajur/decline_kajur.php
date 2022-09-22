<?php
error_reporting();
session_start();
include 'function.php';
$id_sp =$_GET["id_sp"];
if (dec_kajur($id_sp)>0){
	$_SESSION['alert_dec'] = 'true';
		echo "
			<script>
			document.location.href='tb_pengajuan.php';
			</script>
			";
	}else {
	$_SESSION['alert_dec'] = 'false';
		echo "
			<script>
			alert('Data Gagal di Decline');
			document.location.href='tb_pengajuan.php';
			</script>
			";
		}
?>