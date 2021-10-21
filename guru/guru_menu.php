<nav>
<div class="logokecil">
<img src="../asset/image/logo_fatmah.png" >
    <h2>SIBEFA</h2>
  </div>
  <ul>
  <li><a href="?module=guru"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="?module=profil"><i class="fas fa-user"></i> Profil</a></li>
    <li>
    <label for="daftar-1"><i class="fa fa-list"></i>Pembelajaran</label>
  <input type="checkbox" id="daftar-1">
  <ul>
  <li><a href="?module=materi"><i class="fas fa-chalkboard-teacher"></i> Materi</a></li>
  <li><a href="?module=tugas"><i class="fas fa-clipboard-list"></i> Penugasan</a></li>
  </ul>
    </li>
    
    <li><a href="?module=siswa"><i class="fas fa-users"></i> Daftar Siswa</a></li>
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