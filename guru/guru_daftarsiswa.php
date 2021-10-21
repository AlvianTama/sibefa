<?php
if (is_null($kelas)){
  include"../asset/blm_edit_profil.php";
  exit;
}

$qr_daftarsiswa     = "SELECT * FROM tb_siswa where tb_siswa.kelas = $kelas";
$tampil = mysqli_query($kon,$qr_daftarsiswa);
?>
    <h2>Daftar Siswa kelas <?php echo $kelas; ?></h2>
    <br>
    <div style="overflow-x:auto;">            
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>NISN</td>
                        <td>Nama</td>
                        <td>Aksi</td>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    while($rr = mysqli_fetch_array($tampil))
	{
      echo"<tr>
      <td>$no</td>
      <td>$rr[nisn]</td>
      <td>$rr[nama]</td>
			<td><a class='tampil'href='?module=tsiswa&hr_idsiswa=$rr[id]' title='Lihat'><i class='fas fa-search'></i> Detail</a></td>  
			</tr>";
      $no++;
    }
?></table>