<?php 
if (is_null($kelas)){
    include"../asset/blm_edit_profil.php";
    exit;
  }

  $qr_tugas = "SELECT * FROM tb_tugas WHERE kelas = $kelas";
  $tampil = mysqli_query($kon,$qr_tugas);
?>

<h2>Daftar Tugas Kelas <?= $kelas?></h2>
<br>
<div class="sesi-detail">
        <div class="col-sm-3">
            <a class="btn" href="?module=tambahtugas"><i class="fas fa-plus"></i> TAMBAH TUGAS</a>
        </div>
    </div>
    <br>
<div style="overflow-x:auto;"> 
<table class="table1">
    <thead>
        <tr>
            <td width="36">No</td>
            <td>Nama Tugas</td>
            <td>Tanggal Terbit</td>
            <td>Tanggal Akhir</td>
            <td colspan="3">Aksi</td>
        </tr>
    </thead>
<?php 
$no = 1;
while($r = mysqli_fetch_assoc($tampil)) : 
?>
<tr>
    <td><?= $no; ?></td>
    <td><?= $r["nama_tugas"]; ?></td>
    <td><?= $r["tgl_terbit"]; ?></td>
    <td><?= $r["tgl_akhir"]; ?></td>
    <td><a href="?module=ubahtugas&hr_id=<?= $r["id"]; ?>" class="ubah" title="Ubah"><i class="fas fa-edit"></i> Ubah</a></td>
    <td><a href="guru_aksi.php?module=tugas&act=hapustugas&hr_tugas=<?= $r["id_tugas"]; ?>&id=<?= $r["id"]; ?>" class="hapus" onclick='return confirm("Yakin mau menghapus tugas <?= $r["nama_tugas"]; ?> ?")' title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</a></td>
    <td><a href="?module=histugas&hr_id=<?= $r["id_tugas"]; ?>" class="ubah" title="Pengumpulan"><i class="fas fa-edit"></i> Pengumpulan</a></td>
</tr>
<?php 
$no++;
endwhile;
?>
</table>
</div>
