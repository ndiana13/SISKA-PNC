<?php
include '../config.php';
session_start();
error_reporting(0);
 
if (!isset($_SESSION['id_acc_user'])) {
    header("Location: ../index.php");
}

$id_sp     = $_GET['id_sp'];
$query     =mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.id_sp ='$id_sp'");
$result    =mysqli_fetch_array($query);

   $t = substr($result['tgl_sp'],0,4);
   $b = substr($result['tgl_sp'],5,2);
   $h = substr($result['tgl_sp'],8,2);

   if($b == "01"){
       $nm = "Januari";
   } elseif($b == "02"){
       $nm = "Februari";
   } elseif($b == "03"){
       $nm = "Maret";
   } elseif($b == "04"){
       $nm = "April";
   } elseif($b == "05"){
       $nm = "Mei";
   } elseif($b == "06"){
       $nm = "Juni";
   } elseif($b == "07"){
       $nm = "Juli";
   } elseif($b == "08"){
       $nm = "Agustus";
   } elseif($b == "09"){
       $nm = "September";
   } elseif($b == "10"){
       $nm = "Oktober";
   } elseif($b == "11"){
       $nm = "November";
   } elseif($b == "12"){
       $nm = "Desember";
  }
$id_acc_user = $result['id_acc_user'];
$sql = "SELECT * FROM acc_user INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan WHERE acc_user.id_acc_user='$id_acc_user'"; 
$hasil = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table {
			border-width: 1px;
			border-color: white;
		}

		table tr,td .text2 {
			text-align: justify;
			font-size: 16px;
		}

		

	</style>
</head>
<body>
	<center>
		<table width="700">
			<tr>
				<td><img src="../dist/img/pnc.png" width="100" height="`100"></td>
				<td><center>
					<font size="4">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI<br></font>
					<font size="4">POLITEKNIK NEGERI CILACAP<br></font>
					<font size="4" style="text-transform:uppercase;"><strong><?php echo $row['nama_jurusan'];?></strong><br></font>
					<font size="2" style="font-family:'Times New Roman',serif;">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>Telepon: (0282)533329, Faksimile: (0282)537992<br>
                  Laman:</font><font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> www.politeknikcilacap.ac.id</font><font size="2"> Email: </font> <font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> poltec@politeknikcilacap.ac.id</font>
				</center></td>			
			</tr>
			<tr>
				<td colspan="2"><hr size="1px" color="black"></td>
			</tr>
		</table>
	</center>
		<table width="700">
			<td width="500"></td>
			<td>
				<?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?>
			</td>
			</tr>
		</table>		
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Nomor</td>
				<td width="20"><span>:</span><td>
				<td width="300"><?php echo $result['no_sp'];?></td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Lampiran</td>
				<td width="20"><span>:</span><td>
				<td width="300">1 bundle<td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70">Hal</td>
				<td width="20"><span>:</span><td>
				<td width="300"><?php echo $result['hal_sp'];?><td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="70"></td>
				<td width="20"><td>
				<td width="300">Semester <?php echo $result['semester'];?> TA <?php echo $result['thn_ajaran'];?><td>
			</tr>
				
		</table>
		<br><br>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="400">Kepada Yth.<br>
				Ka.Subbag. Akademik dan Kemahasiswaan<br>
				Politeknik Negeri Cilacap<br>
				Di Tempat</td>
			</tr>			
		</table>
		
		<?php
		if($result['id_jns_sk']=='1'){
		?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_ajaran'];?>, kami bermaksud mengajukan permohonan <?php echo $result['hal_sp'];?> dengan nama dosen-dosen terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$jur    =$row['id_jurusan'];
				$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.id_jurusan='$jur' AND acc_user.level='Ketua Jurusan'");
				$row_kajur    = mysqli_fetch_array($sql);
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
		<div style="page-break-before:always;">
	     	<table width="700">
				<tr style="font-size: 2;">
					<td width="30">Nomor &nbsp;&nbsp;&nbsp;: <?php echo $result['no_sp'];?></td>
				</tr>
				<tr style="font-size: 2;">
					<td>Hal &nbsp;&nbsp;: <?php echo  $result['hal_sp']." Semester ". $result['semester']." TA ".$result['thn_ajaran'];?></td>
				</tr>
			</table><br>		
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="3" style="text-transform:uppercase;" ><strong>DAFTAR NAMA DOSEN DAN NAMA MAHASISWA PERWALIAN<br>
						JURUSAN <?php echo $row['nama_jurusan']?><br>
						SEMESTER <?php echo $result['semester'] ." TAHUN AJARAN ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($result['lam_sp']);?>
			</table>
			<br><br><br>
			<table>
			<tr class="text2">
				<td width="400"></td>
				<td size="4"><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td><?php
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>	
				</td>
			</tr>
			<tr class="text2">
				<td width="400"></td>
				<td><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
	     </div>
		<?php
		}
		elseif($result['id_jns_sk']=='2'){
		?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_ajaran'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada dosen-dosen dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$jur    =$row['id_jurusan'];
				$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.id_jurusan='$jur' AND acc_user.level='Ketua Jurusan'");
				$row_kajur    = mysqli_fetch_array($sql);
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
		 <div style="page-break-before:always;">
	     	<table width="700" class="text2">
				<tr style="font-size: 12px;">
					<td width="30">Lampiran Nomor &nbsp;&nbsp;&nbsp;: <?php echo $result['no_sp'];?></td>
				</tr>
				<tr style="font-size: 12px;">
					<td>Tanggal &nbsp;&nbsp;: <?php echo  "<a>". $h." ". $nm. " ". $y. "</a>" ?></td>
				</tr>
			</table><br>		
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="2" style="text-transform:uppercase;" ><strong>DAFTAR DOSEN PENGAMPU MATA KULIAH<br>
						TAHUN AKADEMIK <?php echo $result['semester'] ." ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($result['lam_sp']);?>
			</table>
			<br><br><br>
			<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$jur    =$row['id_jurusan'];
				$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.id_jurusan='$jur' AND acc_user.level='Ketua Jurusan'");
				$row_kajur    = mysqli_fetch_array($sql);
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
	     </div>
		<?php
		}  elseif($result['id_jns_sk']=='3'){ ?>
		<table>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br><br>Dengan hormat,</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_ajaran'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada mahasiswa-mahasiswa dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$jur    =$row['id_jurusan'];
				$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.id_jurusan='$jur' AND acc_user.level='Ketua Jurusan'");
				$row_kajur    = mysqli_fetch_array($sql);
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
		<div style="page-break-before:always;">
	     	<table width="700" class="text2">
				<tr style="font-size: 12px;">
					<td width="30">Lampiran Nomor &nbsp;&nbsp;&nbsp;: <?php echo $result['no_sp'];?></td>
				</tr>
				<tr style="font-size: 12px;">
					<td>Tanggal &nbsp;&nbsp;: <?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></td>
				</tr>
			</table><br>		
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="2" style="text-transform:uppercase;" ><strong>DAFTAR DOSEN PEMBIMBING MAHASISWA MAGANG INDUSTRI<br>
						TAHUN AKADEMIK <?php echo $result['semester'] ." ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($result['lam_sp']);?>
			</table>
			<br><br><br>
			<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$jur    =$row['id_jurusan'];
				$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.id_jurusan='$jur' AND acc_user.level='Ketua Jurusan'");
				$row_kajur    = mysqli_fetch_array($sql);
				if (($result['status_sp']>=1) AND ($result['status_sp']<=9)) {
					echo "<img src='../dist/img/".$row_kajur['ttd']."' width='120' height='90'>";
				}
				else{
					echo '<br><br><br>';
				}
				?>
			</tr>
			<tr class="text2">
<td width="420"></td>
				<td width="300"><?php echo $row_kajur['nama_pegawai'].' '. $row_kajur['gelar_belakang'];?><br>NPAK. <?php echo $row_kajur['nip'];?></td>
			</tr>
		</table>
	     </div>
		<?php
		}
		else {
			echo "";
		}
		?>


		

	    
</body>
</html>
<script>
		window.print();
</script>
