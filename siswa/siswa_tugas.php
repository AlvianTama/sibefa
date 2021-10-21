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
<div style="overflow-x:auto;"> 
<!-- <table class="table1">
    <thead>
        <tr>
            <td width="36">No</td>
            <td>Nama Tugas</td>
            <td>Mata Pelajaran</td>
            <td>Tanggal Terbit</td>
            <td>Tanggal Akhir</td>
            <td colspan="2">Aksi</td>
        </tr>
    </thead> -->

<!-- <tr>
    <td><?= $no; ?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="" class="ubah" title="Kerjakan"><i class="fas fa-edit"></i> Kerjakan</a></td>
    <td><a href="" class="tampil" title="History Tugas">History</a></td>
</tr> -->

<!-- </table> -->
</div>
<?php 
$no = 1;
while($r = mysqli_fetch_assoc($tampil)) : 
?>
<br>
<div class="assignment">
    <div class="judultugas">
        <div class="namatugas"><?=ucwords($r["nama_tugas"]); ?></div>
        <div class="control">
            <a href="?module=kerjakan&hr_id=<?= $r["id_tugas"]; ?>" class="ubah" title="Kerjakan"><i class="fas fa-edit"></i> Kerjakan</a>
            <a href="?module=histugas&hr_id=<?= $r["id_tugas"]; ?>" class="tampil" title="History Tugas"><i class="fas fa-archive"></i> History</a>
        </div>
    </div>
    <div class="isitugas">
        <div class="sesi-detail">
        <div class="col-sm-3">Mata Pelajaran</div>
        <div class="col-sm-9 text-secondary">: <?=ucwords($r["mapel"]); ?></div>
        </div>
        <div class="sesi-detail">
        <div class="col-sm-3">Tanggal Mulai</div>
        <div class="col-sm-9 text-secondary">: <?= tgl_indonesia($r["tgl_terbit"]); ?></div>
        </div>
        <div class="sesi-detail">
        <div class="col-sm-3">Tanggal Pengumpulan</div>
        <div class="col-sm-9 text-secondary">: <?= tgl_indonesia($r["tgl_akhir"]); ?></div>
        </div>
        <div class="custom-shape-divider-bottom-1632797489">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
        <div> </div>
    </div>
</div>
<?php 
$no++;
endwhile;
?>