<?php 
if (is_null($kelas)){
    include"../asset/blm_edit_profil.php";
    exit;
  }
  //select judul
  $qr_judul = "SELECT nama_tugas FROM tb_tugas WHERE id_tugas = '$_GET[hr_id]'";
  $hasil = mysqli_query($kon,$qr_judul);
  $a = mysqli_fetch_assoc($hasil);
//   var_dump($nama);
$qr_pengumpulan = "SELECT * FROM tb_pengumpulan WHERE id_tugas = '$_GET[hr_id]'";
$result = mysqli_query($kon, $qr_pengumpulan);
// var_dump($result);
// $r = mysqli_fetch_assoc($result);
?>
<div class="kembali">
        <a href="?module=tugas">&#10094; Kembali</a>
    </div>
<h2>Daftar Pengumpulan Tugas</h2>
<br>
<div>
    Nama Tugas : <?= $a["nama_tugas"]; ?>
</div>
<br>
<div style="overflow-x:auto;">
<table class="table1">
    <thead>
        <tr>
            <th width="37">No</th>
            <th>Nama Siswa</th>
            <th>Tanggal Pengumpulan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php 
    $no=1;
    while($r = mysqli_fetch_assoc($result)):
    ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $r["nama_pengumpul"]; ?></td>
        <td><?= $r["tgl_mengumpulkan"]; ?></td>
        <td><a href="?module=vtugas&hr_id=<?= $r['id_tugas']; ?>&id=<?= $r['id']; ?>" class="ubah" title="Lihat Pengumpulan Tugas"> lihat</a></td>
    </tr>
    <?php 
    $no++;
    endwhile;
    ?>
</table>
</div>