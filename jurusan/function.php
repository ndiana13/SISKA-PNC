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

function tambah_sp($data){

	global $conn;
	
	$id_sp 			= htmlspecialchars($data["id_sp"]);
	$id_acc_user 	= htmlspecialchars($data["id_acc_user"]);
	$id_jurusan 	= htmlspecialchars($data["id_jurusan"]);
	$id_jns_sk  	= htmlspecialchars($data["id_jns_sk"]);
	$no_sp  		= htmlspecialchars($data["no_sp"]);
	$id_thn_ajaran  = htmlspecialchars($data["id_thn_ajaran"]);
	$tgl_sp 		= date("Y-m-d H:i:s");
	$hal_sp  		= htmlspecialchars($data["hal_sp"]);
	$status  		= htmlspecialchars($data["status"]);
	$lam_sp  		= htmlspecialchars($data["lam_sp"]);

	$cek_no_sp = mysqli_query($conn, "SELECT * FROM tb_sp WHERE no_sp = '$no_sp'");
    if (mysqli_fetch_array($cek_no_sp)) {
    	$_SESSION['alert_no_sp']='true';
        echo "
        <script>
        document.location.href='tb_pengajuan.php';
        </script>"; 
        return false;
    }
	

	$query = "INSERT INTO tb_sp VALUES ('$id_sp', '$id_acc_user', '$id_jns_sk', '$id_thn_ajaran', '$no_sp', '$lam_sp', '$hal_sp', '$tgl_sp', '$status', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

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
	$lam_sp 		= htmlspecialchars($data["lam_sp"]);

		
		//insert data
	$query ="UPDATE tb_sp SET
	
	id_sp 		='$id_sp',
	id_acc_user ='$id_acc_user',
	id_jns_sk 	='$id_jns_sk',
	no_sp 		='$no_sp',
	tgl_sp  	='$tgl_sp',
	hal_sp 		='$hal_sp' ,	
	lam_sp   	='$lam_sp',
	status_sp 	='$status'
	WHERE id_sp = $id_sp";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus_sp($id_sp) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_sp WHERE id_sp = $id_sp");
	
	return mysqli_affected_rows($conn);
}

function tambah_pengguna($data){
	global $conn;

	$foto = upload_foto();
	if(!$foto){
		return false;	
	}
	$ttd = upload_ttd();
	if(!$ttd){
		return false;	
	}

	$id_pegawai     = htmlspecialchars($data['id_pegawai']);
	$username       = htmlspecialchars($data['username']);
	$password 		= htmlspecialchars($data['password']);
	$email  		= htmlspecialchars($data['email']);
	$nama_lengkap   = htmlspecialchars($data['nama_lengkap']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$level         	= htmlspecialchars($data['level']);


	$query="INSERT INTO tb_pengguna
		VALUES ('$id_pegawai','$username','$password','$email','$nama_lengkap','$no_hp', '$level', '$foto', '$ttd')";
	mysqli_query($conn, $query);

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
		$ekstensiValid = ['jpg','jpeg','png'];
		$ekstensi = explode('.', $namaFile);
		$ekstensi = strtolower(end($ekstensi));
		if(!in_array($ekstensi,$ekstensiValid)){
			echo "<script>
			alert('Tolong Upload File Tanda Tangan (jpg/jpeg/png) !!');
			</script>";
			return false;
		}
		
				//cek jika  ukuran  file   terlalu besar
		if ($ukuranFile > 50000000) 
		{
			echo "<script>
			alert('Ukuran File Terlalu Besar (Max 5 MB)');
			</script>";
			return false;
		}
				//lolos pengecekan
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .=$ekstensi;


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
		
	//cek apakah user pilih foto baru atau tidak
	if($_FILES['foto']['error'] === 4){

		$foto  = $fotoLama;

	}else{

		$foto =upload_foto();
	}	
	
	//update data 
	mysqli_query($conn,"UPDATE acc_user,tb_pegawai SET acc_user.username ='$username', tb_pegawai.nama_pegawai ='$nama_pegawai', tb_pegawai.email ='$email', tb_pegawai.alamat ='$alamat', tb_pegawai.gelar_depan ='$gelar_depan', tb_pegawai.gelar_belakang ='$gelar_belakang', tb_pegawai.no_hp ='$no_hp', tb_pegawai.foto ='$foto' WHERE acc_user.id_pegawai= tb_pegawai.id_pegawai AND id_acc_user='$id_acc_user'");
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
			return false;
    }
    mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function ubah_doswal($data)
{
    global $conn;

    $id_lam_doswal  =htmlspecialchars($data['id_lam_doswal']);
    $nama_doswal 	=htmlspecialchars($data["nama_doswal"]);
    $npm 		    =htmlspecialchars($data['npm']);
    $nama_mhs 	    =htmlspecialchars($data['nama_mhs']);

	$query = "UPDATE tb_lam_doswal SET nama_doswal='$nama_doswal', npm='$npm', nama_mhs='$nama_mhs' WHERE id_lam_doswal = '$id_lam_doswal'";

    mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus_lam_doswal($id_lam_doswal) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_lam_doswal WHERE id_lam_doswal = $id_lam_doswal");
	
	return mysqli_affected_rows($conn);
}

function hapus_lam_sdoswal($id_sp) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_lam_doswal WHERE id_sp= $id_sp");
	
	return mysqli_affected_rows($conn);
}

// DASHBOARD

$row_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp < 9");
$jumlah_sk_mengajar = mysqli_num_rows($row_sk_mengajar);

$sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp = 9");
$j_sk_mengajar = mysqli_num_rows($sk_mengajar);

$row_sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3 AND status_sp < 9");
$jumlah_sk_magang = mysqli_num_rows($row_sk_magang);

$row_sk = mysqli_query($conn,"SELECT * FROM tb_sp");
$jumlah_sk = mysqli_num_rows($row_sk);

$sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3  AND status_sp = 9 ");
$j_sk_magang = mysqli_num_rows($sk_magang);

$row_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 1 AND status_sp < 9");
$jumlah_sk_doswal = mysqli_num_rows($row_sk_doswal);

$sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk =1 AND status_sp = 9");
$j_sk_doswal = mysqli_num_rows($sk_doswal);

$sk = mysqli_query($conn,"SELECT * FROM tb_sk");
$j_sk = mysqli_num_rows($sk);

$r_id_jns_sk =query("SELECT * FROM tb_jns_sk");

function notif_email(){


}

?>

