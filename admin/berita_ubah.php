<?php
$qr_berita_ubah =  "SELECT  id_berita,judul_berita,tgl_berita,isi_berita 
        FROM  tb_berita 
        where id_berita= '$_GET[hr_idberita]' ";

$result = mysqli_query($kon, $qr_berita_ubah);
$jml_rec = mysqli_num_rows($result);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_id,$ls_judul, $ls_tgl,$ls_isi) =  mysqli_fetch_row($result);

?>
<div class="kembali">
        <a href="?module=dfrberita">&#10094; Kembali</a>
</div>
<h2>Silakan Ubah Berita</h2>
    <div class="kotak_login">
    <form method="post" >
                  <label for="id">ID</label>
                  <input name="f_id" type="hidden" value="<?php echo "$ls_id"; ?>"> <?php echo "$ls_id"; ?>
              <br><br>

                  <label for="judul">Judul Berita atau Pengumuman</label>
                  <input name="f_judul" type="text" value="<?php echo "$ls_judul"; ?>" size="10">
                  <br>
                  <label for="tanggal">Tanggal Berita : <?php echo "$ls_tgl"; ?></label>
                  <input name="f_tgl" type="hidden" value="<?php echo "$ls_tgl"; ?>">
                <br><br>
                  <label for="isi_berita"> Isi Berita : </label>
                  <textarea rows="10" style="font: size 1px;vw; width:100%;" type='text' name="f_isi"><?php echo "$ls_isi"; ?></textarea>

                  <input type="submit" name="button1" value="Submit">
                </form>
</div>
                <?php
      
        if(isset($_POST['button1'])) {
            require("../koneksi.php");
            $judul_berita = htmlspecialchars($_POST["f_judul"]);
            $isi_berita = htmlspecialchars($_POST["f_isi"]);
     //---------------------------------------------------
       $qr_berita = "UPDATE `tb_berita` SET
	            `judul_berita`='$judul_berita',
				`tgl_berita`='$_POST[f_tgl]',
				`isi_berita`='$isi_berita'
                   WHERE id_berita ='$_POST[f_id]' ";
       mysqli_query($kon,$qr_berita);
	   //---------------------------------------------------
	   $crud = mysqli_affected_rows($kon);

       if ($crud > 0){
           // session_start();
       $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
               <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Berita berhasil diperbarui
               </div>';
       } else{
           // session_start();
           $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
               <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Berita gagal diperbarui
               </div>';
       }
     header('location:index.php?module=dfrberita');
        }
    ?>