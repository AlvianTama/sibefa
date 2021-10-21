<h2>Dashboard Admin Galeri</h2>
<br>
<div class="kotak_login">
    <form action="admin_aksi.php?module=galeri&act=addgalery" method="POST" enctype="multipart/form-data">
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul">

    <label for="file">Input Gambar</label>
    <input type="file" name="f_gambar" id="file" accept="image/*">

    <input type="submit">
</form>
</div>
