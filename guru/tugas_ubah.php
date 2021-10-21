<?php

$qr_tugas_ubah = "SELECT id,id_tugas,nama_tugas,kelas,mapel,instruksi,tgl_terbit,tgl_akhir,lampiran
    FROM tb_tugas 
    where id = '$_GET[hr_id]' ";
$tampil = mysqli_query($kon,$qr_tugas_ubah);

$jml_rec = mysqli_num_rows($tampil);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($id,$id_tugas,$nama_tugas,$kelas,$mapel,$instruksi,$tgl_terbit,$tgl_akhir,$lampiranlama) =  mysqli_fetch_row($tampil);

// echo date('Y-m-d').'T'.date('H:i');
?>
<div class="kembali">
        <a href="?module=tugas">&#10094; Kembali</a>
    </div>
<h2>Ubah Tugas</h2>
<br>
<div>
    <form action="guru_aksi.php?module=tugas&act=ubahtugas" method="post" enctype="multipart/form-data">
    <label for="idtugas">ID Tugas <?= $id_tugas; ?></label><br>
    <input type="hidden" name="id" value="<?= $id; ?>">
    <input type="hidden" name="idtugas" id="idtugas" value="<?= $id_tugas; ?>">
    <input type="hidden" name="lampiranlama" value="<?= $lampiranlama; ?>">
<br>
    <label for="namatugas">Nama Tugas</label>
    <input type="text" name="namatugas" id="namatugas" value="<?= $nama_tugas; ?>">

    <label for="kelas">Kelas <?= $kelas; ?></label><br>
    <input type="hidden" name="kelas" id="kelas" value="<?= $kelas; ?>">
<br>
    <label for="mapel">Mata Pelajaran</label>
    <input type="text" name="mapel" id="mapel" value="<?= $mapel; ?>">

    <label>Instruksi</label>
    <textarea rows="3" style="font: size 1px; width:100%;" type="text" name="instruksi" required><?= $instruksi; ?></textarea>

    <label for="tgl_terbit">Tanggal Terbit</label><br>
    <input type="datetime-local" name="tgl_terbit" id="tgl_terbit" value="<?php echo tgl_value($tgl_terbit); ?>">
<br>
    <label for="tgl_akhir">Tanggal Akhir Pengumpulan</label><br>
    <input type="datetime-local" name="tgl_akhir" id="tgl_akhir" value="<?php echo tgl_value($tgl_akhir); ?>">
<br>
    <label for="lampiran">Lampiran</label>
    <input type="file" name="lampiran" id="lampiran" accept="application/pdf">
<br>
<input type="submit" name="tambah" value="Perbarui">
    </form>
</div>