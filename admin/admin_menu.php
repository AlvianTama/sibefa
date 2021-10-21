<nav>
<div class="logokecil">
<img src="../asset/image/logo_fatmah.png" >
    <h2>SIBEFA</h2>
  </div>
  <ul>
<li><a href="?module=home"><i class="fa fa-home"></i>Home</a></li>
<li>
  <label for="daftar-1"><i class="fa fa-list"></i>Daftar</label>
  <input type="checkbox" id="daftar-1">
  <ul>
    <li><a href="?module=dfradmin"><i class="fas fa-id-badge"></i> Daftar Admin</a></li>
    <li><a href="?module=dfrguru"><i class="fas fa-chalkboard-teacher"></i> Daftar Guru</a></li>
    <li><a href="?module=dfrsiswa"><i class="fas fa-users"></i> Daftar Siswa</a></li>
    <li><a href="?module=dfrberita"><i class="far fa-newspaper"></i> Daftar Berita</a></li>
    <li><a href="?module=galeri"><i class="far fa-images"></i> Daftar Galeri</a></li>
  </ul>
</li>

<li>
<label for="daftar-2"><i class="fas fa-plus-square"></i> Tambah</label>
  <input type="checkbox" id="daftar-2">
  <ul>
    <li><a href="?module=tambahuser"><i class="fas fa-user-plus"></i> Tambah User</a></li>
    <li><a href="?module=tambahberita"><i class="far fa-newspaper"></i> Tambah Berita</a></li>
    <li><a href="?module=tambahgaleri"><i class="far fa-images"></i> Tambah Galeri</a></li>
  </ul>
</li>

<li><a href="?module=pass"><i class="fas fa-key"></i> Ganti Password</a></li>
<div class="status-samping">
      <h3><i class="fas fa-id-card"></i><?php echo $username ?></h3>
<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</ul>
<div class="saklar">
  <input type="checkbox">
  <span></span>
  <span></span>
  <span></span>

</div>
</nav>
<script src="../asset/saklar.js"> </script>