<div>
    <div class="kembali">
        <a href="?module=berita">&#10094; Kembali</a>
    </div>
<?php
require("koneksi.php");

$qr = "SELECT judul_berita,tgl_berita,isi_berita
    FROM tb_berita 
    where id_berita= '$_GET[hr_idberita]' ";
$tampil = mysqli_query($kon,$qr);

$jml_rec = mysqli_num_rows($tampil);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_judul,$ls_tgl,$ls_isi) =  mysqli_fetch_row($tampil);

?>
<div>
<h1><?php echo ucwords("$ls_judul"); ?></h1>
    </div>
    <div>
Dipublikasikan pada  <?php echo tgl_indonesia("$ls_tgl");?>
    </div>
    <div class="isimateri">
<p><?php echo ucfirst("$ls_isi"); ?></p>
    </div>
    </div>