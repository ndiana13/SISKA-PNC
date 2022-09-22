<?php
include '../config.php';
session_start();
error_reporting();
 
if (!isset($_SESSION['id_acc_user'])) {
    header("Location: ../index.php");
}

$id_sp     = $_GET['id_sp'];
$query     =mysqli_query($conn, "SELECT * FROM tb_sp INNER JOIN tb_thn_ajaran ON tb_sp.id_thn_ajaran = tb_thn_ajaran.id_thn_ajaran INNER JOIN tb_jns_sk ON tb_sp.id_jns_sk = tb_jns_sk.id_jns_sk  INNER JOIN acc_user ON tb_sp.id_acc_user  = acc_user.id_acc_user WHERE tb_sp.id_sp ='$id_sp'");
$result    =mysqli_fetch_array($query);

   $t = substr($result['tgl_direktur'],0,4);
   $b = substr($result['tgl_direktur'],5,2);
   $h = substr($result['tgl_direktur'],8,2);

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

$tb_sk = mysqli_query($conn,"SELECT * FROM tb_sk where id_sp = '$id_sp'");
$sk    = mysqli_fetch_array($tb_sk);
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
                <td>
                <center>
                  <font size="5" style="font-family:'Times New Roman',serif;">KEMENTRIAN PENDIDIKAN, DAN KEBUDAYAAN<br></font>
                  <font size="5" style="font-family:'Times New Roman',serif;">POLITEKNIK NEGERI CILACAP<br></font>
                  <font size="2" style="font-family:'Times New Roman',serif;">Jalan Dr.Soetomo No.1 Sidakaya-CILACAP 53212 Jawa Tengah<br>Telepon: (0282)533329, Faksimile: (0282)537992<br>
                  Laman:</font><font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> www.politeknikcilacap.ac.id</font><font size="2"> Email: </font> <font size="2" style="color: blue; text-underline-position: under; font-family:'Times New Roman',serif;"> poltec@politeknikcilacap.ac.id</font>
                </center>
            	</td>		
			</tr>
			<tr>
				<td colspan="2"><hr size="1px" color="black"></td>
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>KEPUTUSAN DIREKTUR POLITEKNIK NEGERI CILACAP<br>
						NOMOR : <?php echo $sk['no_sk'];?></p>
				</center>
				</td>			
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>TENTANG</p>
				</center>
				</td>			
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center; text-transform: uppercase;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'><?php echo $sk['perihal_sk'];?></span></p>
					<p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center; text-transform: uppercase;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>PADA JURUSAN <?php echo $row['nama_jurusan'];?> SEMESTER <?php echo $result['semester'];?></span></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:107%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:107%;font-family:"Times New Roman",serif;'>TAHUN AKADEMIK <?php echo $result['thn_ajaran'];?></span></p>
				</center>
				</td>
			</tr>
		</table>
		<table width="700">
			<tr>
				<td>
				<center>
					<p style='margin-top:12.0pt;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:150%;font-size:14px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:150%;font-family:"Times New Roman",serif;'>DIREKTUR POLITEKNIK NEGERI CILACAP</span></p>
				</center>
				</td>
			</tr>
		</table>
		</center>
		<table>
                <?php
                echo html_entity_decode($sk['menimbang_sk']);?>

		</table>
		<table>
        	<tr class="text2">
            	<td width="630" style="vertical-align: top; font-family:'Times New Roman',serif;"><?php
            	  echo html_entity_decode($sk['mengingat_sk']);?>          
          </tr>
        </table>
        <table>
        	<tr class="text2">
            	<td width="630" style="vertical-align: top; font-family:'Times New Roman',serif;"><?php
            	  echo html_entity_decode($sk['memperhatikan_sk']);?>          
          </tr>
        </table>
        <center>
        <table>
          	<tr>
            	<td>
            	<center>
              	<font size="4" style="vertical-align: top; font-family:'Times New Roman',serif;">MEMUTUSKAN</font>
            	</center>
            	</td>     
          	</tr>
        </table>
        </center>
        <table>
        	<tr class="text2">
        		<td width="630" style="vertical-align: top; font-family:'Times New Roman',serif;">
            		<?php  echo html_entity_decode($sk['menetapkan_sk']);?> </td>
          </tr>
        </table>
        <table>
            <tr class="text2">
              <td width="310"></td>
              <td width="90"style="font-family:'Times New Roman',serif;"><br><br> Ditetapkan di Cilacap<br>DIREKTUR POLITEKNIK NEGERI CILACAP</td>
            </tr>
           	<tr class="text2">
              	<td></td>
              	<td style="font-size: 12px; font-family:'Times New Roman',serif;">
              	<?php
              	$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.level='Direktur'");
              	$row_dir    = mysqli_fetch_array($sql);
              	if ($result['status_sp'] =='9') {
                	echo "<img src='../dist/img/".$row_dir['ttd']."' width='120' height='90'>";
               	
              	}else{
                	echo "<br><br><br>";
              	}
              	?>
            </tr>
            <tr class="text2">
              	<td width="300"></td>
              	<td width="300" style="font-family:'Times New Roman',serif;"><?php echo"<a>". $row_dir['gelar_depan']." ". $row_dir['nama_pegawai']. ", ". $row_dir['gelar_belakang']. "</a>";?><br>NPAK. <?php echo $row_dir['nip'];?></td>
            </tr>
        </table>		
		<div style="page-break-before:always;">
			<table width="700">
				<tr style="font-size: 12px; font-family:'Times New Roman',serif;">
					<td width="300"></td>
					<td width="400">Lampiran Keputusan Direktur Politeknik Negeri Cilacap</td>
				</tr>
				<tr style="font-size: 12px; font-family:'Times New Roman',serif;">
					<td width="400"></td>
					<td width="30">Nomor &nbsp;&nbsp;&nbsp;: <?php echo $sk['no_sk'];?></td>
				</tr>
				<tr style="font-size: 12px; font-family:'Times New Roman',serif;">
					<td width="300"></td>
					<td>Tanggal &nbsp;&nbsp;: <?php echo  "<a>". $h." ". $b. " ". $t. "</a>" ?></td>
				</tr>
				<tr style="font-size: 12px; font-family:'Times New Roman',serif;">
					<td width="300"></td>
					<td>Tentang : <?php echo ucwords(strtolower($sk['perihal_sk']));?> Semester <?php echo $result['semester'];?> Jurusan <?php $row['nama_jurusan'];?> Tahun Akademik <?php echo $result['thn_ajaran'];?>
					</td>
				</tr>
			</table><br><br>
			<?php
			if($result['id_jns_sk'] == 1)
			{
			?>
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="3" style="text-transform: uppercase; font-family:'Times New Roman',serif;" ><strong>DAFTAR NAMA DOSEN DAN NAMA MAHASISWA PERWALIAN<br>
						JURUSAN <?php echo $row['nama_jurusan']?><br>
						SEMESTER <?php echo $result['semester'] ." TAHUN AJARAN ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($sk['lam_sk']);?>
			</table>
			<?php
			}elseif($result['id_jns_sk']==2){
			?>
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="3" style="text-transform: uppercase; font-family:'Times New Roman',serif;" ><strong>DAFTAR DOSEN PENGAMPU MATA KULIAH<br>
						SEMESTER <?php echo $result['semester'] ." TAHUN AKADEMIK ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($sk['lam_sk']);?>
			</table>
		<?php }elseif($result['id_jns_sk']==3){?>
			<table width="700">
				<tr>
					<td width="700">
					<center>
						<font size="3" style="text-transform: uppercase; font-family:'Times New Roman',serif;" ><strong>DAFTAR DOSEN PEMBIMBING MAGANG INDUSTRI<br>
						JURUSAN <?php echo $row['nama_jurusan']?><br>
						SEMESTER <?php echo $result['semester'] ." TAHUN AKADEMIK ". $result['thn_ajaran'];?></strong>
						</font>
					</center><br>
					</td>			
				</tr>
				<?php echo html_entity_decode($sk['lam_sk']);?>
			</table>
		<?php }?>
		<table>
            <tr class="text2">
              <td width="310"></td>
              <td width="90"style="font-family:'Times New Roman',serif;"><br><br> Ditetapkan di Cilacap<br>DIREKTUR POLITEKNIK NEGERI CILACAP</td>
            </tr>
           	<tr class="text2">
              	<td></td>
              	<td style="font-size: 12px; font-family:'Times New Roman',serif;">
              	<?php
              	$sql    = mysqli_query($conn,"SELECT * FROM acc_user INNER JOIN tb_jurusan ON acc_user.id_jurusan = tb_jurusan.id_jurusan INNER JOIN tb_pegawai ON acc_user.id_pegawai = tb_pegawai.id_pegawai WHERE acc_user.level='Direktur'");
              	$row_dir    = mysqli_fetch_array($sql);
              	if ($result['status_sp'] == '9') {
                	echo "<img src='../dist/img/".$row_dir['ttd']."' width='120' height='90'>";
               	
              	}else{
                	echo "<br><br><br>";
              	}
              	?>
            </tr>
            <tr class="text2">
              	<td width="300"></td>
              	<td width="300" style="font-family:'Times New Roman',serif;"><?php echo "<a>". $row_dir['gelar_depan']." ". $row_dir['nama_pegawai']. ", ". $row_dir['gelar_belakang']. "</a>";?><br>NPAK. <?php echo $row_dir['nip'];?></td>
            </tr>
        </table>
		</div>



		

	    
</body>
</html>
<script>
		window.print();
</script>
