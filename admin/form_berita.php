<h2>Dashboard Admin Berita</h2>
            <p>Berikut ini disajikan form pengisian berita</p>
            <div class="kotak_login">
<form id="f_berita" name="f_berita" method="post" action="admin_aksi.php?module=dfrberita&act=addnews">
  <div class="form-group">
      <label>Judul</label>
        <input type='text' name='f_judul' placehoder='Judul berita' required>
      </label>
      </div>
      <div class="form-group">
      <label height="63">Isi Berita </label>
      <label>
        <textarea rows="10" style="font: size 1px;; width:100%;" type='text' name='f_isi' required></textarea>
      </label>
      <div>
      <div class="form-group">
      <label>
        <input type="submit" name="Submit" value="SIMPAN" />
      </label>
      </div>
</form>
</div>