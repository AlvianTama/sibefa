<?php
// ambil data koneksi dari file koneksi.inc.php

$qr_update =  "SELECT  id_materi,kelas,judul_materi,mapel,sub_tema,lokasi,isi_materi,gambar_materi,audio
        FROM  tb_materi 
        where id_materi= '$_GET[hr_idmateri]' ";

$result = mysqli_query($kon, $qr_update);
$jml_rec = mysqli_num_rows($result);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_idmateri, $ls_kelas,$ls_judul,$ls_mapel,$ls_subtema,$ls_lokasi,$ls_isi,$ls_gambar,$ls_audio) =  mysqli_fetch_row($result);
// var_dump($ls_gambar);
?>
<div class="kembali">
        <a href="?module=materi">&#10094; Kembali</a>
    </div>
    <h2>Silakan Ubah Materi</h2>
    <div class="kotak_login">
    <form action="guru_aksi.php?module=materi&act=materiupdate" method="post" enctype="multipart/form-data">
                  <label for="id_materi">ID</label>
                  <input name="f_idmateri" type="hidden" value="<?php echo "$ls_idmateri"; ?>"> <?php echo "$ls_idmateri"; ?>
              <br><br>
              <input name="f_gambarlama" type="hidden" value="<?php echo "$ls_gambar"; ?>">
              <input name="f_audiolama" type="hidden" value="<?php echo "$ls_audio"; ?>">
                  <label for="kelas">Kelas</label>
                  <select name="f_kelas" value="kelas">
                    <option <?php if($ls_kelas=='1'){echo "selected";} ?> value='1'>Kelas 1</option>
                    <option <?php if($ls_kelas=='2'){echo "selected";} ?> value='2'>Kelas 2</option>
                    <option <?php if($ls_kelas=='3'){echo "selected";} ?> value='3'>Kelas 3</option>
                    <option <?php if($ls_kelas=='4'){echo "selected";} ?> value='4'>Kelas 4</option>
                    <option <?php if($ls_kelas=='5'){echo "selected";} ?> value='5'>Kelas 5</option>
                    <option <?php if($ls_kelas=='6'){echo "selected";} ?> value='6'>Kelas 6</option>
                  </select>

                  <label for="judul">Judul Materi</label>
                  <input name="f_judul" type="text" value="<?php echo "$ls_judul"; ?>" size="10">

                  <label for="mapel">Mata Pelajaran</label>
                  <input name="f_mapel" type="text" value="<?php echo "$ls_mapel"; ?>" size="10">

                  <label for="sub_tema">Sub Tema</label>
                  <input name="f_subtema" type="text" value="<?php echo "$ls_subtema"; ?>" size="10">
                  
                  <label for="lokasi">Lokasi</label>
                  <input name="f_lokasi" type="text" value="<?php echo "$ls_lokasi"; ?>" size="10">
                  
                  <label for="gambar">Gambar</label><br>
                  <img src="../upload/<?php echo "$ls_gambar"?>" style="width:300px; height:150px"><br>
                  <input name="f_gambar" type="file" size="10" accept=".png, .jpg, .jpeg" ><br><br>
                  
                  <label for="audio">Audio</label><br>
                  <audio controls id="myaudio">
                  <source src="../upload/audio/<?php echo "$ls_audio"?>" type="audio/ogg">
                  <source src="../upload/audio/<?php echo "$ls_audio"?>" type="audio/mpeg">
                  Your browser does not support the audio element.
                  </audio><br><br>
                  <input type="file" name="f_audio" id="audio" accept=".mp3"><br><br> 

                  <label for="isi_materi"> Isi Materi : </label>
                  <textarea rows="10" style="font: size 1px;vw; width:100%;" type='text' name="f_materi"><?php echo "$ls_isi"; ?></textarea>

                  <input type="submit" name="button1" value="Submit">
                </form>
  </div>
                <script>
                  var audio = document.getElementById("myaudio");
                  audio.volume = 0.2;
                </script>