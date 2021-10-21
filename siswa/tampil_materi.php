<?php

$qr_materi_tampil = "SELECT mapel,judul_materi,gambar_materi,lokasi,isi_materi,audio
    FROM tb_materi 
    where id_materi= '$_GET[hr_idmateri]' ";
$tampil = mysqli_query($kon,$qr_materi_tampil);

$jml_rec = mysqli_num_rows($tampil);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_mapel,$ls_judul,$ls_gambar,$ls_lokasi,$ls_isi,$ls_audio) =  mysqli_fetch_row($tampil);

?>
<div>
<div class="kembali">
        <a href="?module=materi">&#10094; Kembali</a>
    </div>
<div>
<h1><?php echo ucwords("$ls_judul"); ?></h1>
    </div>
    <div class="isimateri">
    <img src="../upload/<?php echo "$ls_gambar"?>" style="max-width:500px">
    </div>
    <div class="isimateri">
Letak Materi : <?php echo ucwords("$ls_mapel") ."&nbsp;".ucwords("$ls_lokasi"); ?>
    </div>
    <div class="isimateri">
    <audio controls id="myaudio">
        <source src="../upload/audio/<?php echo "$ls_audio"?>" type="audio/ogg">
        <source src="../upload/audio/<?php echo "$ls_audio"?>" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>
    </div>
    <div class="isimateri">
<p><?php echo "$ls_isi"; ?></p>
    </div>
    </div>
    <script>
        var audio = document.getElementById("myaudio");
        audio.volume = 0.2;
    </script>