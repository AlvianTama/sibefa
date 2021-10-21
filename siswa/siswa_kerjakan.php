<?php 
$qr_tugas = "SELECT * FROM tb_tugas WHERE id_tugas = '$_GET[hr_id]'";
$tampil = mysqli_query($kon,$qr_tugas);
$r = mysqli_fetch_assoc($tampil);
// var_dump ($r);

$sekarang = strtotime(date('Y-m-d H:i'));
$akhir = strtotime($r["tgl_akhir"]);
$diff  = $akhir - $sekarang;
$jam   = floor($diff / (60 * 60));
$menit = $diff - $jam * (60 * 60);
$awal = strtotime($r["tgl_terbit"]);
// echo "Sisa waktu pengerjaan tinggal ".$jam." jam " . floor( $menit / 60 ). " menit";

?>
<div class="kembali">
        <a href="?module=tugas">&#10094; Kembali</a>
    </div>
    <?php 
if($awal > $sekarang){
    echo "Tugas ".ucwords($r["nama_tugas"])." belum waktunya mengerjakan.<br>";
    echo "Tugas akan dibuka pada ".tgl_indonesia($r["tgl_terbit"]);
    echo "</div></div><div class=footer>";
        include "../asset/footer.php";
        echo "</div>";
        exit;
}

    if ($jam <= 0){
        echo "Waktu pengerjaan tugas ".ucwords($r["nama_tugas"])." sudah habis pada ".tgl_indonesia($r["tgl_akhir"]);
        echo "</div></div><div class=footer>";
        include "../asset/footer.php";
        echo "</div>";
        exit;
    }
    ?>
    
    <h2>Lembar Jawab Tugas <?= ucwords($r["nama_tugas"]); ?></h2>
<div>
    <div class="isimateri">
        Mata Pelajaran : <?= ucfirst($r["mapel"]); ?>
    </div>
    <div class="isimateri">
        Instruksi Mengerjakan
        <div><?= $r["instruksi"]; ?></div>
    </div>
    <div class="isimateri">
        Batas Akhir Pengumpulan : <?= tgl_indonesia($r["tgl_akhir"]); ?>
        <br>
        <?= "Sisa waktu pengerjaan tinggal ".$jam." jam " . floor( $menit / 60 ). " menit"; ?>
    </div>
    <?php 
    // echo $r["lampiran"]; 
    if($r['lampiran']!="NULL"){?>
    <div class="isimateri">
        <embed src="../upload/document/<?= $r['lampiran']; ?>" type="application/pdf" style="
    width: 100%;
    height: 100vh;
"></embed>
    </div>
    <?php 
    }
    ?>
    <div class="kotak_login">
        <form action="siswa_aksi.php?module=histugas&act=kirimtugas" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_tugas" value="<?= $r["id_tugas"]; ?>">
            <input type="hidden" name="nama_tugas" value="<?= $r["nama_tugas"]; ?>">
            <input type="hidden" name="mapel" id="mapel" value="<?= $r["mapel"]; ?>">
            <input type="hidden" name="nama" id="nama" value="<?= $nama; ?>">
            <input type="hidden" name="kelas" value="<?= $kelas; ?>">
            
<label for="isitugas">Lembar Jawab</label>
            <textarea rows="10"  type="text" name="isitugas" required></textarea>

            <label for="lampiran">Lampiran</label><br>
            <input type="file" name="lampiran" id="lampiran" accept="application/pdf">
<br>
            <input type="submit" value="Kirim Tugas">
        </form>
    </div>
</div>