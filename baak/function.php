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
		//ambil data dari form
	$lam_sp = upload();
	if(!$lam_sp){
		return false;
	}
	
	$id_sp 			= htmlspecialchars($data["id_sp"]);
	$id_acc_user 	= htmlspecialchars($data["id_acc_user"]);
	$id_jns_sk  	= htmlspecialchars($data["id_jns_sk"]);
	$no_sp  		= htmlspecialchars($data["no_sp"]);
	$id_thn_ajaran  = htmlspecialchars($data["id_thn_ajaran"]);
	$tgl_sp 		= date("Y-m-d h:i:s");
	$hal_sp  		= htmlspecialchars($data["hal_sp"]);
	$status  		= htmlspecialchars($data["status"]);

	$cek_no_sp = mysqli_query($conn, "SELECT * FROM tb_sp WHERE no_sp = '$no_sp'");
    if (mysqli_fetch_array($cek_no_sp)) {
        echo "<script>
        alert('Nomor Pengajuan Sudah Ada');
        document.location.href='tb_pengajuan.php';
        </script>";
        return false;
    }
	

	$query = "INSERT INTO tb_sp VALUES ('$id_sp', '$id_acc_user', '$id_jns_sk', '$id_thn_ajaran', '$no_sp', '$lam_sp', '$hal_sp', '$tgl_sp', '$status', 'NULL', 'NULL', 'NULL', 'NULL')";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
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

function hapus_pegawai($id_pegawai) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_pegawai WHERE id_pegawai = $id_pegawai");
	
	return mysqli_affected_rows($conn);
}

function tambah_pegawai($data){
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
	$nama_pegawai   = htmlspecialchars($data['nama_pegawai']);
	$alamat  		= htmlspecialchars($data['alamat']);
	$jk  		    = htmlspecialchars($data['jk']);
	$agama  		= htmlspecialchars($data['agama']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$email  		= htmlspecialchars($data['email']);
	$status_pegawai = htmlspecialchars($data['status_pegawai']);
	$gelar_depan    = htmlspecialchars($data['gelar_depan']);
	$gelar_belakang = htmlspecialchars($data['gelar_belakang']);
	$nip  			= htmlspecialchars($data['nip']);
	$tempat_lahir  	= htmlspecialchars($data['tempat_lahir']);
	$tgl_lahir   	= htmlspecialchars($data['tgl_lahir']);


	$query="INSERT INTO tb_pegawai VALUES ('$id_pegawai','$nama_pegawai','$alamat','$jk','$agama','$no_hp', '$email','$status_pegawai', '$gelar_depan','$gelar_belakang','$nip','$tempat_lahir','$tgl_lahir','$foto','$ttd')";
	mysqli_query($conn, $query);

}

function tambah_acc_user($data){
	global $conn;


	$id_acc_user    = htmlspecialchars($data['id_acc_user']);
	$id_pegawai     = htmlspecialchars($data['id_pegawai']);
	$id_jurusan     = htmlspecialchars($data['id_jurusan']);
	$level 			= htmlspecialchars($data['level']);
	$username       = htmlspecialchars($data['username']);
	$password       = htmlspecialchars($data['password']);


	$query="INSERT INTO acc_user VALUES ('$id_acc_user','$id_pegawai','$id_jurusan','$username','$password','$level','')";
	mysqli_query($conn,$query);

}
function hapus_acc_user($id_acc_user) {
	global $conn;
	mysqli_query($conn,"DELETE FROM acc_user WHERE id_acc_user = $id_acc_user");
	
	return mysqli_affected_rows($conn);
}

function ubah_acc_user($data){

	global $conn;

	$id_acc_user    = htmlspecialchars($data['id_acc_user']);
	$id_pegawai     = htmlspecialchars($data['id_pegawai']);
	$id_jurusan     = htmlspecialchars($data['id_jurusan']);
	$level 			= htmlspecialchars($data['level']);
	$username       = htmlspecialchars($data['username']);
	$password       = htmlspecialchars($data['password']);
		
	
	//update data 
	mysqli_query($conn,"UPDATE acc_user SET id_acc_user='$id_acc_user', id_pegawai='$id_pegawai', id_jurusan='$id_jurusan', username='$username', password='$password', level='$level' WHERE id_acc_user ='$id_acc_user'");
	return mysqli_affected_rows($conn);
}
function ubah_pegawai($data){

	global $conn;
	$id_pegawai     = htmlspecialchars($data['id_pegawai']);
	$nama_pegawai   = htmlspecialchars($data['nama_pegawai']);
	$alamat  		= htmlspecialchars($data['alamat']);
	$jk  		    = htmlspecialchars($data['jk']);
	$agama  		= htmlspecialchars($data['agama']);
	$no_hp         	= htmlspecialchars($data['no_hp']);
	$email  		= htmlspecialchars($data['email']);
	$status_pegawai = htmlspecialchars($data['status_pegawai']);
	$gelar_depan    = htmlspecialchars($data['gelar_depan']);
	$gelar_belakang = htmlspecialchars($data['gelar_belakang']);
	$nip  			= htmlspecialchars($data['nip']);
	$tempat_lahir  	= htmlspecialchars($data['tempat_lahir']);
	$tgl_lahir   	= htmlspecialchars($data['tgl_lahir']);
	$fotoLama       = htmlspecialchars($data['foto_lama']);
	$ttdLama       = htmlspecialchars($data['ttd_lama']);
		
	//cek apakah pilih foto baru atau tidak
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
	mysqli_query($conn,"UPDATE tb_pegawai SET id_pegawai='$id_pegawai', nama_pegawai='$nama_pegawai', alamat='$alamat', jk='$jk', agama='$agama', no_hp='$no_hp', email='$email', status_pegawai='$status_pegawai', gelar_depan='$gelar_depan', gelar_belakang='$gelar_belakang', nip='$nip', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', foto='$foto', ttd='$ttd' WHERE id_pegawai ='$id_pegawai'");
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
    	echo "<script>
			Swal.fire('Gagal ganti Password')
			</script>";
			return false;
    }
    mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function buat_sk($data)
{
	global $conn;
	$id_sk 				=htmlspecialchars($data['id_sk']);
	$id_sp 				=htmlspecialchars($data['id_sp']);
	$tgl_sk 		    =date("Y-m-d H:i:s");
	$no_sk	    	    =htmlspecialchars($data["no_sk"]);
	$perihal_sk	    	=htmlspecialchars($data["perihal_sk"]);
    $menimbang_sk 		=htmlspecialchars($data['menimbang_sk']);
    $mengingat_sk 		=htmlspecialchars($data['mengingat_sk']);
    $memperhatikan_sk 	=htmlspecialchars($data['memperhatikan_sk']);
    $menetapkan_sk 		=htmlspecialchars($data['menetapkan_sk']);
    $lam_sk 		    =htmlspecialchars($data['lam_sk']);

	$query = "INSERT INTO tb_sk VALUES ('$id_sk', '$id_sp', '$no_sk', '$tgl_sk', '$perihal_sk', '$menimbang_sk', '$mengingat_sk', '$memperhatikan_sk', '$menetapkan_sk','$lam_sk', 'NULL')";
	$query2 = "UPDATE tb_sp SET status_sp = '2' WHERE id_sp ='$id_sp'";
	mysqli_query($conn,$query);
	mysqli_query($conn,$query2);
	return mysqli_affected_rows($conn);

}

function edit_sk($data)
{
	global $conn;

	$id_sp 				=htmlspecialchars($data['id_sp']);
	$perihal_sk	    	=htmlspecialchars($data["perihal_sk"]);
    $menimbang_sk 		=htmlspecialchars($data['menimbang_sk']);
    $mengingat_sk 		=htmlspecialchars($data['mengingat_sk']);
    $memperhatikan_sk 	=htmlspecialchars($data['memperhatikan_sk']);
    $menetapkan_sk 		=htmlspecialchars($data['menetapkan_sk']);

	$query = "UPDATE tb_sk,tb_sp SET tb_sk.perihal_sk='$perihal_sk', tb_sk.menimbang_sk='$menimbang_sk', tb_sk.mengingat_sk='$mengingat_sk', tb_sk.memperhatikan_sk='$memperhatikan_sk', tb_sk.menetapkan_sk='$menetapkan_sk', tb_sp.status_sp='2' WHERE tb_sk.id_sp='$id_sp' AND tb_sp.id_sp='$id_sp'";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}

function tambah_jurusan($data){
	global $conn;
	$id_jurusan       = htmlspecialchars($data['id_jurusan']);
	$kode_jurusan     = htmlspecialchars($data['kode_jurusan']);
	$nama_jurusan     = htmlspecialchars($data['nama_jurusan']);

	$query="INSERT INTO tb_jurusan
		VALUES ('$id_jurusan','$kode_jurusan','$nama_jurusan')";
	mysqli_query($conn, $query);

}


function ubah_jurusan($data){

	global $conn;

	$id_jurusan       = htmlspecialchars($data['id_jurusan']);
	$kode_jurusan     = htmlspecialchars($data['kode_jurusan']);
	$nama_jurusan     = htmlspecialchars($data['nama_jurusan']);

		

	
		//insert data
	$query ="UPDATE tb_jurusan SET
	
	id_jurusan 	='$id_jurusan',
	kode_jurusan 	='$kode_jurusan',
	nama_jurusan 	='$nama_jurusan'
	
	WHERE id_jurusan= '$id_jurusan'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus_jurusan($id_jurusan) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_jurusan WHERE id_jurusan=$id_jurusan");
	
	return mysqli_affected_rows($conn);
}

function tambah_thn_ajaran($data){
	global $conn;
	$id_thn_ajaran      = htmlspecialchars($data['id_thn_ajaran']);
	$thn_ajaran     	= htmlspecialchars($data['thn_ajaran']);
	$semester           = htmlspecialchars($data['semester']);
	$status             = htmlspecialchars($data['status']);

	$query="INSERT INTO tb_thn_ajaran
		VALUES ('$id_thn_ajaran','$thn_ajaran','$semester','$status')";
	mysqli_query($conn, $query);

}


function ubah_thn_ajaran($data){

	global $conn;

	$id_thn_ajaran      = htmlspecialchars($data['id_thn_ajaran']);
	$thn_ajaran     	= htmlspecialchars($data['thn_ajaran']);
	$semester           = htmlspecialchars($data['semester']);
	$status             = htmlspecialchars($data['status']);


	$query ="UPDATE tb_thn_ajaran SET
	
	id_thn_ajaran 	='$id_thn_ajaran',
	thn_ajaran 	    ='$thn_ajaran',
	semester 	    ='$semester',
	status 			='$status'
	
	WHERE id_thn_ajaran= '$id_thn_ajaran'
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function hapus_thn_ajaran($id_thn_ajaran) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_thn_ajaran WHERE id_thn_ajaran=$id_thn_ajaran");
	
	return mysqli_affected_rows($conn);
}

function ubah_jns_sk($data){
	global $conn;
	$id_jns_sk       = htmlspecialchars($data['id_jns_sk']);
	$jns_sk     	 = htmlspecialchars($data['jns_sk']);
	$tentang     	 = htmlspecialchars($data['tentang']);
	$menimbang     	 = htmlspecialchars($data['menimbang']);
	$mengingat     	 = htmlspecialchars($data['mengingat']);
	$memperhatikan   = htmlspecialchars($data['memperhatikan']);
	$menetapkan      = htmlspecialchars($data['menetapkan']);
	$tembusan        = htmlspecialchars($data['tembusan']);


	$query="UPDATE tb_jns_sk SET
	id_jns_sk 		 = '$id_jns_sk',
	jns_sk       	 = '$jns_sk',
	tentang      	 = '$tentang',
	menimbang    	 = '$menimbang',
	mengingat    	 = '$mengingat',
	memperhatikan    = '$memperhatikan',
	menetapkan    	 = '$menetapkan',
	tembusan 		 = '$tembusan'

	WHERE id_jns_sk='$id_jns_sk'
	";
	mysqli_query($conn, $query);

}
// DASHBOARD

$row_sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp = 1");
$jumlah_sk_mengajar = mysqli_num_rows($row_sk_mengajar);

$sk_mengajar = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 2 AND status_sp = 9");
$j_sk_mengajar = mysqli_num_rows($sk_mengajar);

$row_sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3  AND status_sp = 1");
$jumlah_sk_magang = mysqli_num_rows($row_sk_magang);

$row_sk = mysqli_query($conn,"SELECT * FROM tb_sp");
$jumlah_sk = mysqli_num_rows($row_sk);

$sk_magang = mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 3  AND status_sp = 9");
$j_sk_magang = mysqli_num_rows($sk_magang);

$row_sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk = 1 AND status_sp = 1");
$jumlah_sk_doswal = mysqli_num_rows($row_sk_doswal);

$sk_doswal = mysqli_query($conn,"SELECT * FROM tb_sp INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk WHERE tb_sp.id_jns_sk =1 AND status_sp = 9");
$j_sk_doswal = mysqli_num_rows($sk_doswal);

$sk = mysqli_query($conn,"SELECT * FROM tb_sk");
$j_sk = mysqli_num_rows($sk);

$r_id_jns_sk =query("SELECT * FROM tb_jns_sk");

?>

