<?php 
$qr_view ="SELECT nama_tugas,nama_pengumpul,tgl_mengumpulkan,isi_tugas,lampiran FROM tb_pengumpulan WHERE id_tugas='$_GET[hr_id]' AND id='$_GET[id]'";
$tampil = mysqli_query($kon,$qr_view);

$jml_rec = mysqli_num_rows($tampil);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($nama_tugas,$nama_pengumpul,$tgl_mengumpulkan,$isi_tugas,$lampiran) =  mysqli_fetch_row($tampil);

?>
<div class="kembali">
        <a href="?module=histugas&hr_id=<?= $_GET['hr_id']; ?>">&#10094; Kembali</a>
</div>
<h2>Tampil Tugas <?= ucwords($nama_tugas); ?></h2>
<div class="isimateri">
    nama : <?= ucwords($nama_pengumpul); ?>
</div>
<div class="isimateri">Tanggal Pengumpulan : <?= tgl_indonesia($tgl_mengumpulkan); ?></div>
<div class="isimateri">
    <div>
        Jawaban :
    </div>
<?= $isi_tugas; ?>
</div>
<div class="isimateri">
    Lampiran :
</div>
<?php 
    // echo $r["lampiran"]; 
    if($lampiran!="NULL"){?>
    <div class="isimateri">
        <embed src="../upload/document/<?= $lampiran; ?>" type="application/pdf" style="
    width: 100%;
    height: 100vh;
"></embed>
    </div>
    <?php 
    }
    ?>