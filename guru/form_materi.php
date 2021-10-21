<div class="kembali">
        <a href="?module=materi">&#10094; Kembali</a>
    </div>
<h2>Entry Materi Kelas <?php echo $kelas ?></h2>
    <div class="content">
        <div class="kotak_login">
        <form action="guru_aksi.php?module=materi&act=materitambah" method="post" enctype="multipart/form-data">
                
                <label for="kelas">Kelas :</label>
                    <select name='f_kelas'  tabindex='1' id="kelas">
                        <option  value='0' >- Pilih Kelas -</option>";
                        <option <?php if($kelas==1){echo "selected";} ?> value='1'>Kelas 1</option>
                        <option <?php if($kelas==2){echo "selected";} ?> value='2'>Kelas 2</option>
                        <option <?php if($kelas==3){echo "selected";} ?> value='3'>Kelas 3</option>
                        <option <?php if($kelas==4){echo "selected";} ?> value='4'>Kelas 4</option>
                        <option <?php if($kelas==5){echo "selected";} ?> value='5'>Kelas 5</option>
                        <option <?php if($kelas==6){echo "selected";} ?> value='6'>Kelas 6</option>
                    </select>
                    <br>
                    <label for="judul">Judul Pelajaran : </label>
                    <input type='text' name='f_judul' id="judul"><br>
    
                    <label for="mapel">Mata Pelajaran : </label>
                    <input type='text' name='f_mapel' id="mapel"><br>
                    
                    <label for="subtema">Sub Tema  : </label>
                    <input type='text' name='f_sub_tema' id="subtema"><br>
                    <br>
    
                    <label for="lokasi">Lokasi Materi :</label>
                    <input type='text' name='f_lokasi' id="lokasi">
                    <br><br>
    
                    <label for="isi">Isi Materi : </label>
                    <textarea style="font: size 1px; width:100%;" type='text' name="f_materi" id="editor"></textarea>
                    <br><br>
                    <label>Gambar : </label>
                    <input type="file" name="f_gambar" accept=".png, .jpg, .jpeg">
                    <br>
                    <label>Audio : </label>
                    <input type="file" name="f_audio" accept=".mp3">
                    <br>
                    
                    <input type="submit">
                </form>
        </div>
        <script src="..\node_modules\@ckeditor\ckeditor5-build-classic\build\ckeditor.js"></script>
        <script>ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );</script>
        