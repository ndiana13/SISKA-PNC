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
					<font size="5">KEMENTRIAN PENDIDIKAN, DAN KEBUDAYAAN<br></font>
					<font size="4">POLITEKNIK NEGERI CILACAP<br></font>
					<font size="4" style="text-transform:uppercase;"><strong><?php echo $row['nama_jurusan'];?></strong><br></font>
					<font size="2">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>
						Telepon: (0282)533329, Faksimile: (0282)537992<br>
						Laman: www.politeknikcilacap.ac.id Email: poltec@politeknikcilacap.ac.id</font>
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
				if ($result['status_sp']>='1') {
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
			</table>
			<table border="2" cellspacing="0"  width="700">
				<tbody>
				<tr style="font-size: 3; text-align: center;"><strong>
					<td width="15">NO</td>
					<td width="150">NAMA DOSEN</td>
					<td width= "30" colspan="2">NPM</td>
					<td width="100">NAMA MAHASISWA</td></strong>	
				</tr>
				<?php 		           
		            $tb_doswal = mysqli_query($conn,"SELECT * FROM tb_lam_doswal WHERE id_sp='$id_sp'");
		            $no= 1;
		            $jml= 1;
		            $i = 0;
		            $doswal1 =0;
		            while($d = mysqli_fetch_array($tb_doswal)) {
		            $doswal1 = $d['nama_doswal'][$i++];
				?>
				
				<tr style="font-size: 2;">
					<td width ="15"style="text-align: center;"><?php echo $no++; ?></td>
					<td width="150" rowspan="<?php echo $i++ ?>"><?php echo $d['nama_doswal'];?></td>
					<td width="15"style="text-align: center;"><?php echo $jml++; ?></td>
                    <td width="20" style="text-align: center;"><?php echo $d['npm']; ?></td>
                    <td width="120"><?php echo $d['nama_mhs']; ?></td>
                </tr>
            	</tbody>
            	<?php
				}
				?>
			</table>
			<br><br><br>
			<table>
			<tr class="text2">
				<td width="400"></td>
				<td><br>Jurusan <?php echo $row['nama_jurusan']?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td><?php
				if (($result['status_sp']>=1) AND ($result['status_sp']<=4)) {
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
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada dosen-dosen dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$kon = mysqli_connect("localhost",'root',"","siska");
			    if (!$kon){
			       	die("Koneksi database gagal:".mysqli_connect_error());
			   	}
				$jur 	= $result['id_jurusan'];
				$kajur 	= "SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip WHERE tb_kajur.id_jurusan='$jur'";
				$sql    = mysqli_query($kon,$kajur);
				$row    = mysqli_fetch_array($sql);
				if (($result['status']>=1) AND ($result['status']<=4)) {
					$tandatangan = "<img src='../AdminLTE/dist/img/".$row['ttd']."' width='120' height='90'>";
				}
				else{
					echo "";
				}
				?>
				<?php echo "<a>" .$tandatangan. "<a>"?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
			</tr>
		</table>
		 <div style="page-break-before:always;">
	     	<table width="700">
				<tr style="font-size: 10px;">
					<td width="30">Lampiran Nomor &nbsp;&nbsp;&nbsp;: <?php echo $result['no_sp'];?></td>
				</tr>
				<tr style="font-size: 10px;">
					<td>Tanggal &nbsp;&nbsp;: <?php echo  "<a>". $h." ". $nm. " ". $y. "</a>" ?></td>
				</tr>
			</table><br><br>		
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="2" style="text-transform:uppercase;" ><strong>DAFTAR DOSEN PENGAMPU MATA KULIAH<br>
						TAHUN AKADEMIK <?php echo $result['semester'] ." ". $result['thn_akademik'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
			</table>
			<table border="1" cellspacing="0"  width="680">
				<tbody>
				<?php
					$connection = mysqli_connect("localhost",'root',"","siska");
					if ($result['id_jurusan']== 'TI') {
						$sql = "SELECT * FROM lam_skm ORDER BY id";
					}
					elseif ($result['id_jurusan']=='TM') {
						$sql = "SELECT * FROM lam_skm_tm ORDER BY id";
					}
					elseif ($result['id_jurusan']=='TE') {
						$sql = "SELECT * FROM lam_skm_te ORDER BY id";
					}
		           elseif ($result['id_jurusan']=='TPPL') {
						$sql = "SELECT * FROM lam_skm_tppl ORDER BY id";
					}
					else {
						echo "database tidak tersedia!";
					}		           
		            $result = mysqli_query($connection,$sql);
		            $no= 1;
		            while($d = mysqli_fetch_array($result)) {
		            $jml_sks_a = $d['sks_matkul1']+$d['sks_matkul2']+$d['sks_matkul3']+$d['sks_matkul4']+$d['sks_matkul5']+$d['sks_matkul6']+$d['sks_matkul7']+$d['sks_matkul8']+$d['sks_matkul9']+$d['sks_matkul10'];
		            $jml_sks_b = $d['sks1']+$d['sks2']+$d['sks3']+$d['sks4']+$d['sks5']+$d['sks6']+$d['sks7']+$d['sks8']+$d['sks9']+$d['sks10'];
				?>
				<tr style="font-size: 9px; text-align: center;">
					<td width="10">NO</td>
					<td width="150">NAMA DOSEN</td>
					<td width="150">MATA KULIAH</td>
					<td width="40">PRODI</td>
					<td width="40">KELAS</td>
					<td width="40">SKS Mata Kuliah</td>
					<td width="40">SKS Paralel</td>		
				</tr>
				<tr style="font-size: 9px; text-align: center;">
					<td width="10">I</td>
					<td width="150">II</td>
					<td width="150">III</td>
					<td width="40">IV</td>
					<td width="40">V</td>
					<td width="40">VI</td>
					<td width="40">VII</td>
				</tr>
				<tr style="font-size: 9px;">
					<td style="text-align: center;" rowspan="10"><?php echo $no++; ?></td>
					<td rowspan="10"><?php echo $d['nm_dosen']; ?><br><?php echo $d['nidn']; ?><br><?php echo $d['nip_dis']; ?></td>
                    <td><?php echo $d['matkul1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['prodi1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['kelas1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['sks_matkul1']; ?></td>
                    <td style="text-align: center;"><?php echo $d['sks1']; ?></td>
                </tr>
                <?php
	                $matkul2 = $d['matkul2'];
	                $matkul3 = $d['matkul3'];
	                $matkul4 = $d['matkul4'];
	                $matkul5 = $d['matkul5'];
	                $matkul6 = $d['matkul6'];
	                $matkul7 = $d['matkul7'];
	                $matkul8 = $d['matkul8'];
	                $matkul9 = $d['matkul9'];
	                $matkul10 = $d['matkul10'];

	                if (!empty($matkul2)){
	                	echo "
	                	<tr style='font-size: 9px;'>
	                    <td>".$d['matkul2']."</td>
	                    <td style='text-align: center'>".$d['prodi2']."</td>
	                    <td style='text-align: center'>".$d['kelas2']."</td>
	                    <td style='text-align: center'>".$d['sks_matkul2']."</td>
	                    <td style='text-align: center'>".$d['sks2']."</td>
	                	</tr>";
	                	if (!empty($matkul3)){

	                	echo "
	                	<tr style='font-size: 9px;'>
	                    <td>".$d['matkul3']."</td>
	                    <td style='text-align: center'>".$d['prodi3']."</td>
	                    <td style='text-align: center'>".$d['kelas3']."</td>
	                    <td style='text-align: center'>".$d['sks_matkul3']."</td>
	                    <td style='text-align: center'>".$d['sks3']."</td>
	                	</tr>";
		                	if (!empty($matkul4)){

		                	echo "
		                	<tr style='font-size: 9px;'>
		                    <td>".$d['matkul4']."</td>
		                    <td style='text-align: center'>".$d['prodi4']."</td>
		                    <td style='text-align: center'>".$d['kelas4']."</td>
		                    <td style='text-align: center'>".$d['sks_matkul4']."</td>
		                    <td style='text-align: center'>".$d['sks4']."</td>
		                	</tr>";
		                	
			                	if (!empty($matkul5)){

			                	echo "
			                	<tr style='font-size: 9px;'>
			                    <td>".$d['matkul5']."</td>
			                    <td style='text-align: center'>".$d['prodi5']."</td>
			                    <td style='text-align: center'>".$d['kelas5']."</td>
			                    <td style='text-align: center'>".$d['sks_matkul5']."</td>
			                    <td style='text-align: center'>".$d['sks5']."</td>
			                	</tr>";
				                	if (!empty($matkul6)){

				                	echo "
				                	<tr style='font-size: 9px;'>
				                    <td>".$d['matkul6']."</td>
				                    <td style='text-align: center'>".$d['prodi6']."</td>
				                    <td style='text-align: center'>".$d['kelas6']."</td>
				                    <td style='text-align: center'>".$d['sks_matkul6']."</td>
				                    <td style='text-align: center'>".$d['sks6']."</td>
				                	</tr>";
				                	
					                	if (!empty($matkul7)){

					                	echo "
					                	<tr style='font-size: 9px;'>
					                    <td>".$d['matkul7']."</td>
					                    <td style='text-align: center'>".$d['prodi7']."</td>
					                    <td style='text-align: center'>".$d['kelas7']."</td>
					                    <td style='text-align: center'>".$d['sks_matkul7']."</td>
					                    <td style='text-align: center'>".$d['sks7']."</td>
					                	</tr>";
						                	if (!empty($matkul8)){

						                	echo "
						                	<tr style='font-size: 9px;'>
						                    <td>".$d['matkul8']."</td>
						                    <td style='text-align: center'>".$d['prodi8']."</td>
						                    <td style='text-align: center'>".$d['kelas8']."</td>
						                    <td style='text-align: center'>".$d['sks_matkul8']."</td>
						                    <td style='text-align: center'>".$d['sks8']."</td>
						                	</tr>";
						                	
							                	if (!empty($matkul9)){

							                	echo "
							                	<tr style='font-size: 9px;'>
							                    <td>".$d['matkul9']."</td>
							                    <td style='text-align: center'>".$d['prodi9']."</td>
							                    <td style='text-align: center'>".$d['kelas9']."</td>
							                    <td style='text-align: center'>".$d['sks_matkul9']."</td>
							                    <td style='text-align: center'>".$d['sks9']."</td>
							                	</tr>";
								                	if (!empty($matkul9)){

								                	echo "
								                	<tr style='font-size: 9px;'>
								                    <td>".$d['matkul9']."</td>
								                    <td style='text-align: center'>".$d['prodi9']."</td>
								                    <td style='text-align: center'>".$d['kelas9']."</td>
								                    <td style='text-align: center'>".$d['sks_matkul9']."</td>
								                    <td style='text-align: center'>".$d['sks10']."</td>
								                	</tr>";
								                	}
								                	else{}
							                	}
							                	else{}
							                }
							                else{}
					                	}
					                	else{}
					                }
					            	else{}
					            }
					        	else{}
					        }
					    	else{}
					    }
					else{}
				}
				else{}

                ?>
                 <tr style="font-size: 9px; text-align: center;">
					<td width="200"></td>
					<td colspan="2">Jumlah SKS</td>
					<td width="40"><?php echo "$jml_sks_a";?></td>
					<td width="50"><?php echo "$jml_sks_b";?></td>
				</tr>
            	</tbody>
            	<?php
				}
				?>
			</table>
			<br><br><br>
			<table>
			<tr class="text2">
				<td width="500"></td>
				<td style="font-size: 9px;"><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 9px;"><?php echo "<a>" .$tandatangan. "<a>"?>
			</tr>
			<tr class="text2">
				<td width="500"></td>
				<td style="font-size: 9px;"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
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
				<td width="600"><br>Sehubungan dengan pelaksanaan perkuliahan pada semester <?php echo $result['semester'];?> Tahun Akademik <?php echo $result['thn_akademik'];?>, kami bermaksud mengajukan permohonan <?php echo $result['perihal'];?> pada mahasiswa-mahasiswa dengan nama terlampir.</td>
			</tr>
			<tr class="text2">
				<td width="40"></td>
				<td width="600"><br>Demikian surat permohonan ini saya buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</td>
			</tr>			
		</table>
		<table>
			<tr class="text2">
				<td width="420"></td>
				<td><br><br><br><br>Jurusan <?php echo "<a>" .$nm_jurusan."</a>"?><br>Ketua</td>
			</tr>
			<tr class="text2">
				<td></td>
				<td style="font-size: 12px;">
				<?php
				$kon = mysqli_connect("localhost",'root',"","siska");
			    if (!$kon){
			       	die("Koneksi database gagal:".mysqli_connect_error());
			   	}
				$jur 	= $result['id_jurusan'];
				$kajur 	= "SELECT * FROM tb_kajur INNER JOIN tb_jurusan ON tb_kajur.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pengguna ON tb_kajur.nip = tb_pengguna.nip WHERE tb_kajur.id_jurusan='$jur'";
				$sql    = mysqli_query($kon,$kajur);
				$row    = mysqli_fetch_array($sql);
				if (($result['status']>=1) AND ($result['status']<=4)) {
					echo "<img src='../AdminLTE/dist/img/".$row['ttd']."' width='120' height='90'>";
				}
				else{
					echo "";
				}
				?>
			</tr>
			<tr class="text2">
				<td width="420"></td>
				<td width="300"><?php echo $row['nama_lengkap'];?><br>NPAK. <?php echo $row['nip'];?></td>
			</tr>
		</table>
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
