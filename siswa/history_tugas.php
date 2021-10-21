<?php 
if (is_null($kelas)){
    include"../asset/blm_edit_profil.php";
    exit;
  }
//   var_dump($nama);
$qr_pengumpulan = "SELECT * FROM tb_pengumpulan WHERE nama_pengumpul = '$nama' AND id_tugas = '$_GET[hr_id]'";
$result = mysqli_query($kon, $qr_pengumpulan);
// var_dump($result);
// $r = mysqli_fetch_assoc($result);
?>
<div class="kembali">
        <a href="?module=tugas">&#10094; Kembali</a>
    </div>
<h2>History Tugas</h2>

<div style="overflow-x:auto;">
<br>
<table class="table1">
    <thead>
        <tr>
            <td width="36">No</td>
            <td>Nama Tugas</td>
            <td>Tanggal Pengumpulan</td>
            <td colspan="2">Aksi</td>
        </tr>
    </thead>
    <?php 
    $no=1;
    while($r = mysqli_fetch_assoc($result)) :
    ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $r["nama_tugas"]; ?></td>
        <td><?= $r["tgl_mengumpulkan"]; ?></td>
        <td><a href="?module=vtugas&hr_id=<?= $r['id_tugas']; ?>&id=<?= $r['id']; ?>" class="ubah"> lihat</a></td>
        <td><a href="siswa_aksi.php?module=histugas&act=hpstugas&hr_id=<?= $r['id_tugas']; ?>&id=<?= $r['id']; ?>" onclick='return confirm("Yakin mau menghapus tugas <?= $r["nama_tugas"]; ?> ?")' class="hapus"> hapus</a></td>
    </tr>
    <?php 
    $no++;
    endwhile;
    ?>
</table>
</div>