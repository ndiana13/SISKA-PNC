<?php
include '../config.php';

if (!isset($_SESSION['id_acc_user'])) {
    header("Location: ../index.php");
}
date_default_timezone_set('Asia/Jakarta');
$id_acc_user = $_SESSION['id_acc_user'];
$sql = "SELECT * FROM acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan WHERE acc_user.id_acc_user='$id_acc_user'"; 
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);

function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [] ;
  while($row = mysqli_fetch_assoc($result)){
    $rows[]=$row;
    
  }
  return $rows;
}




function upload(){
	$namaFile   = $_FILES['lam_sp']['name'];
	$ukuranFile = $_FILES['lam_sp']['size'];
	$error      = $_FILES['lam_sp']['error'];
	$tmpName    = $_FILES['lam_sp']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		
		return (" ");
	}
	else {
	
			//cek apakah yang boleh diupload
	$ekstensifile_transaksiValid = ['xls'];
	$ekstensifile_transaksi = explode('.', $namaFile);
	$ekstensifile_transaksi = strtolower(end($ekstensifile_transaksi));
	if(!in_array($ekstensifile_transaksi,$ekstensifile_transaksiValid)){
		echo "<script>
		alert('Tolong Upload File  Lampiran!!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file gambar_transaksi  terlalu besar
	if ($ukuranFile > 5000000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar Maksimal File 50MB ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensifile_transaksi;
	
	move_uploaded_file($tmpName,'../dist/img/lampiran'.$namaFileBaru);
	return $namaFileBaru;
	}
}
function ubah_sp($data){

	global $conn;

	$id_sp 			= htmlspecialchars($data["id_sp"]);
	$id_acc_user 	= htmlspecialchars($data["id_acc_user"]);
	$id_jns_sk  	= htmlspecialchars($data["id_jns_sk"]);
	$no_sp  		= htmlspecialchars($data["no_sp"]);
	$id_thn_ajaran  = htmlspecialchars($data["id_thn_ajaran"]);
	$tgl_sp 		= htmlspecialchars($data["tgl_sp"]);
	$hal_sp  		= htmlspecialchars($data["hal_sp"]);
	$status  		= htmlspecialchars($data["status"]);
	$lam_sp_lama 	= htmlspecialchars($data["lam_sp_lama"]);

		//cek apakah user pilih gambar baru atau tidak
	if($_FILES['lam_sp']['error'] === 4){
		$lam_sp  = $lam_sp_lama;
	}else{
		$lam_sp =upload();
	}
		
		//insert data
	$query ="UPDATE tb_sp SET
	
	id_sp 		='$id_sp',
	id_acc_user ='$id_acc_user',
	id_jns_sk 	='$id_jns_sk',
	no_sp 		='$no_sp',
	tgl_sp  	='$tgl_sp',
	hal_sp 		='$hal_sp' ,	
	lam_sp   	='$lam_sp',
	status 		='$status'
	WHERE id_sp = $id_sp";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}


function upload_foto() {
	
	$namaFile   = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error      = $_FILES['foto']['error'];
	$tmpName    = $_FILES['foto']['tmp_name'];
	
			//cek apakah tidak ada foto yang di upload
	if($error === 4) {
		
		return ("tidak ada");
	}
	else {
	
			//cek apakah yang boleh diupload
		$ekstensifoto_transaksiValid = ['jpg','jpeg','png'];
		$ekstensifoto_transaksi = explode('.', $namaFile);
		$ekstensifoto_transaksi = strtolower(end($ekstensifoto_transaksi));
		if(!in_array($ekstensifoto_transaksi,$ekstensifoto_transaksiValid)){
			echo "<script>
			alert('Tolong Upload foto !!');
			</script>";
			return false;
		}
		
				//cek jika  ukuran  file foto_transaksi  terlalu besar
		if ($ukuranFile > 50000000) 
		{
			echo "<script>
			alert('Ukuran foto Terlalu Besar ');
			</script>";
			return false;
		}
		
				//lolos pengecekan
				//nama baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .=$ekstensifoto_transaksi;
		
		
		move_uploaded_file($tmpName,'../dist/img/'.$namaFileBaru);
		return $namaFileBaru;
	}	
}
function upload_ttd() {
	
	$namaFile   = $_FILES['ttd']['name'];
	$ukuranFile = $_FILES['ttd']['size'];
	$error      = $_FILES['ttd']['error'];
	$tmpName    = $_FILES['ttd']['tmp_name'];

	if($error === 4) {
		
		return ("tidak ada");
	}
	else {
	
			//cek apakah yang boleh diupload
		$ekstensifoto_transaksiValid = ['jpg','jpeg','png'];
		$ekstensifoto_transaksi = explode('.', $namaFile);
		$ekstensifoto_transaksi = strtolower(end($ekstensifoto_transaksi));
		if(!in_array($ekstensifoto_transaksi,$ekstensifoto_transaksiValid)){
			echo "<script>
			alert('Tolong Upload Tanda Tangan !!');
			</script>";
			return false;
		}
		
				//cek jika  ukuran  file foto_transaksi  terlalu besar
		if ($ukuranFile > 50000000) 
		{
			echo "<script>
			alert('Ukuran Tanda Tangan terlalu Besar ');
			</script>";
			return false;
		}
		
				//lolos pengecekan
				//nama baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .=$ekstensifoto_transaksi;
		
		
		move_uploaded_file($tmpName,'../dist/img/'.$namaFileBaru);
		return $namaFileBaru;
	}	
}
// Fungsi Ubah Profil Admin Jurusan
function ubah_profil($data){

	global $conn;
	$id_acc_user    = htmlspecialchars($data["id_acc_user"]);
	$id_pegawai     = htmlspecialchars($data["id_pegawai"]);
	$username       = htmlspecialchars($data['username']);
	$email  		= htmlspecialchars($data['email']);
	$alamat  		= htmlspecialchars($data['alamat']);
	$gelar_depan    = htmlspecialchars($data['gelar_depan']);
	$nama_pegawai   = htmlspecialchars($data['nama_pegawai']);
	$gelar_belakang = htmlspecialchars($data['gelar_belakang']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$fotoLama       = htmlspecialchars($data['foto_lama']);
	$ttdLama       = htmlspecialchars($data['ttd_lama']);
		
	//cek apakah user pilih foto baru atau tidak
	if($_FILES['foto']['error'] === 4){

		$foto  = $fotoLama;

	}else{

		$foto =upload_foto();
	}
	if($_FILES['ttd']['error'] === 4){

		$ttd  = $ttdLama;

	}else{

		$ttd =upload_ttd();

	}			
	
	//update data 
	mysqli_query($conn,"UPDATE acc_user,tb_pegawai SET acc_user.username ='$username', tb_pegawai.nama_pegawai ='$nama_pegawai', tb_pegawai.email ='$email', tb_pegawai.alamat ='$alamat', tb_pegawai.gelar_depan ='$gelar_depan', tb_pegawai.gelar_belakang ='$gelar_belakang', tb_pegawai.no_hp ='$no_hp', tb_pegawai.foto ='$foto', tb_pegawai.ttd ='$ttd' WHERE acc_user.id_pegawai= tb_pegawai.id_pegawai AND id_acc_user='$id_acc_user'");
	return mysqli_affected_rows($conn);
}

function ganti_password($data)
{
    global $conn;

    $id_acc_user 	=htmlspecialchars($data["id_acc_user"]);
    $password 		=htmlspecialchars($data['password']);
    $newpassword 	=htmlspecialchars($data['newpassword']);

    if($password == $newpassword){

        $query = "UPDATE acc_user SET password='$password' WHERE id_acc_user = '$id_acc_user'";
    }
    else {
    	echo "<script>
			Swal.fire('Gagal ganti Password')
			</script>";
			return false;
    }
    mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function acc_wadir($id_sp) {
	global $conn;	
	$tgl = date("Y-m-d H:i:s");

	$query ="UPDATE tb_sp SET status_sp = '5', tgl_wadir= '$tgl' WHERE id_sp = $id_sp";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
}
function dec_wadir($data) {
	global $conn;	
	$tgl     = date("Y-m-d H:i:s");
	$id_sp 	 = htmlspecialchars($data["id_sp"]);
	$catatan = htmlspecialchars($data['catatan']);

	$query ="UPDATE tb_sp,tb_sk SET tb_sp.status_sp = '6', tb_sp.tgl_wadir='$tgl', tb_sk.catatan='$catatan' WHERE tb_sp.id_sp='$id_sp' AND tb_sk.id_sp ='$id_sp'";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);	
}

// DASHBOARD

$row_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp <= 3");
$jumlah_sk_mengajar = mysqli_num_rows($row_sk_mengajar);

$sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp = 4");
$j_sk_mengajar = mysqli_num_rows($sk_mengajar);

$row_sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3  AND status_sp <= 3");
$jumlah_sk_magang = mysqli_num_rows($row_sk_magang);

$row_sk = mysqli_query($conn,"SELECT * FROM tb_sp");
$jumlah_sk = mysqli_num_rows($row_sk);

$sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3  AND status_sp = 4");
$j_sk_magang = mysqli_num_rows($sk_magang);

$row_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 1 AND status_sp <=3");
$jumlah_sk_doswal = mysqli_num_rows($row_sk_doswal);

$sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk =1 AND status_sp = 4");
$j_sk_doswal = mysqli_num_rows($sk_doswal);

$sk = mysqli_query($conn,"SELECT * FROM tb_sk");
$j_sk = mysqli_num_rows($sk);

$r_id_jns_sk =query("SELECT * FROM tb_jns_sk");

?>

