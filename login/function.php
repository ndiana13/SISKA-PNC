<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '..\vendor\phpmailer\phpmailer\src\Exception.php';
require '..\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require '..\vendor\phpmailer\phpmailer\src\SMTP.php';
// require '..\vendor\autoload.php';
function forgot_password($data)
{
  $mail = new PHPMailer;

  // Konfigurasi SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'jawakurakura@gmail.com';
  $mail->Password = 'uoebiustctzsmwxb';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // $mail->setFrom('jawakurakura@gmail.com', 'Codingan');
  // $mail->addReplyTo('info@contoh.com', 'Codingan');

  // Menambahkan penerima
  $mail->addAddress('diananurfitra13@gmail.com');

  // Menambahkan cc atau bcc 
  // $mail->addCC('cc@contoh.com');
  // $mail->addBCC('bcc@contoh.com');

  // Subjek email
  $mail->Subject = 'Kirim Email via SMTP Server di PHP menggunakan PHPMailer';

  // Mengatur format email ke HTML
  $mail->isHTML(true);

  // Konten/isi email
  $mailContent = "<h1>Mengirim Email HTML menggunakan SMTP di PHP</h1>
    <p>Ini adalah email percobaan yang dikirim menggunakan email server SMTP dengan PHPMailer.</p>";
  $mail->Body = $mailContent;

  // Kirim email
  if (!$mail->send()) {
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo 'Pesan telah terkirim';
  }
}

function ganti_password($data)
{
    global $conn;

    $email = $data['email'];
    $password = $data['password'];
    $Repassword = $data['Repassword'];
    $token = $data['token'];


    // cek email ada di tabel mana
    // cek token ada tidak di tabel
    $p = mysqli_query($conn, "SELECT * FROM acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE tb_pegawai.email='$email'");
    $data_p = mysqli_fetch_assoc($p);

    // cek password == konfirmasi password tidak
    if ($password != $Repassword) {
        return false;
    } else {
        // jika email ada di tabel pengguna dan token ada di tabel pengguna sesuai email
        if ((mysqli_num_rows($p) > 0) and ($token == $data_p['token'])) {
            $baru = "UPDATE acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai SET acc_user.password='$password', acc_user.token='' WHERE tb_pegawai.email = '$email'";
            $query = mysqli_query($conn, $baru);
            return  mysqli_affected_rows($conn);
        }
        else {
            return false;
        }
    }
}

function login($data)
{
    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM acc_user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row['level']=='Admin Jurusan'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../jurusan/index.php");
        }elseif($row['level']=='Ketua Jurusan'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../kajur/index.php");
        }else if($row['level']=='BAAK'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../baak/index.php");
        }elseif($row['level']=='Ketua BAAK'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../ketuabaak/index.php");
        }else if($row['level']=='Bagian Umum'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../umum/index.php");
        }else if($row['level']=='Wakil Direktur I'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../wadir/index.php");
        }else if($row['level']=='Direktur'){
          $_SESSION['id_acc_user'] = $row['id_acc_user'];
          $_SESSION['alert_login'] = 'true';
          $_SESSION["alert_profil"] = 'default';
          $_SESSION["alert_password"] = 'default';
          $_SESSION["alert_tambah"] = 'default';
          $_SESSION["alert_edit"] = 'default';
          $_SESSION["alert_hapus"] = 'default';
          $_SESSION['alert_no_sp'] = 'default';
          $_SESSION['alert_import'] = 'default';
          $_SESSION['alert_dec'] = 'default';
          $_SESSION['alert_acc'] = 'default';
          $_SESSION['alert_sk'] = 'default';
          header("Location: ../direktur/index.php");
        }  
    }
}
?>