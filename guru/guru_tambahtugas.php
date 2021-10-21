<?php 
$idtugas = uniqid();

// <!-- var_dump(); -->
?>
<div class="kembali">
        <a href="?module=tugas">&#10094; Kembali</a>
</div>
<h2>Tambahkan Tugas</h2>
<p id="waktusekarang"></p>
<div class="kotak_login">
<form action="guru_aksi.php?module=tugas&act=tambahtugas" method="post" enctype="multipart/form-data">
    <label for="idtugas">ID Tugas <?= $idtugas; ?></label><br>
    <input type="hidden" name="idtugas" id="idtugas" value="<?= $idtugas; ?>">
<br>
    <label for="namatugas">Nama Tugas</label>
    <input type="text" name="namatugas" id="namatugas">

    <!-- <label for="kelas">Kelas <?= $kelas; ?></label> -->
    <input type="hidden" name="kelas" id="kelas" value="<?= $kelas; ?>">

    <label for="mapel">Mata Pelajaran</label>
    <input type="text" name="mapel" id="mapel">

    <label>Instruksi</label>
    <textarea rows="3" style="font: size 1px; width:100%;" type="text" name="instruksi" required></textarea>

    <label for="tgl_terbit">Tanggal Terbit</label><br>
    <input type="datetime-local" name="tgl_terbit" id="tgl_terbit" value="<?php echo date('Y-m-d').'T'.date('H:i'); ?>"><br>

    <label for="tgl_akhir">Tanggal Akhir Pengumpulan</label><br>
    <input type="datetime-local" name="tgl_akhir" id="tgl_akhir">
<br>
    <label for="lampiran">Lampiran</label><br>
    <input type="file" name="lampiran" id="lampiran" accept="application/pdf">
<br>
<input type="submit" name="tambah" value="Tambah">
</form>
</div>
