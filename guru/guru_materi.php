<?php
if (is_null($kelas)){
  include"../asset/blm_edit_profil.php";
  exit;
}

$qr_materi     = "SELECT * FROM tb_materi where tb_materi.kelas = $kelas";
$tampil = mysqli_query($kon,$qr_materi);
?>
    <h2>Materi Kelas <?php echo $kelas ?></h2><br>
    <div class="sesi-detail">
        <div class="col-sm-3">
            <a class="btn" href="?module=tambahmateri"><i class="fas fa-plus"></i> TAMBAH MATERI</a>
        </div>
    </div>
    <div style="overflow-x:auto;">
    <br>
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>Judul Materi</td>
                        <td>Mata Pelajaran</td>
                        <td>Sub Tema</td>
                        <td>Lokasi Materi</td>
                        <td>Gambar</td>
                        <td  colspan="2">Aksi</td>
                    </tr>
                    </thead>
<?php
$no = 1;
while($rr = mysqli_fetch_assoc($tampil)) :?>
<tr>
            <td><?= $no; ?></td>
            <td><?= $rr["judul_materi"]; ?></td>
            <td><?= $rr["mapel"]; ?></td>
            <td><?= $rr["sub_tema"]; ?></td>
            <td><?= $rr["lokasi"]; ?></td>
            <td><img src="../upload/<?=$rr["gambar_materi"];?>" width=80px height=50px></td>
			<td><a class="ubah" href="?module=ubahmateri&hr_idmateri=<?= $rr["id_materi"]; ?>" title="Ubah"><i class="fas fa-edit"></i> Ubah</a></td>  
			<td><a class="hapus" href="guru_aksi.php?module=materi&act=materihapus&hr_idmateri=<?= $rr["id_materi"]; ?>" onclick='return confirm("Yakin mau menghapus materi <?= $rr["judul_materi"]; ?> ?")' title="Hapus"><i class="fas fa-trash"></i> Hapus</a></td>
</tr>
    <?php
    $no++;
endwhile;
    ?>
</table>