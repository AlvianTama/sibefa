<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='../login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!=3) {
    echo "Anda tidak punya akses pada halaman siswa";
    exit;
}

$id_user=$_SESSION["id"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
$kelas=$_SESSION["kelas"];

?>
<!DOCTYPE html>
<html>
<head>
<title>SISTEM BELAJAR FATMAH</title>
<link rel = "icon" href ="..\asset\image\logo_fatmah.png" type = "image/x-icon"> 
<link rel="stylesheet" href="../asset/css/reset.css">
<link rel="stylesheet" type="text/css" href="../asset/css/style.css">
<link rel="stylesheet" href="..\asset\css\all.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="header">
<div class="logo">
<img src="..\asset\image\logo_fatmah.png">
    <h2>SISTEM BELAJAR FATMAH</h2>
</div>
</div>

<div class="row">

  <?php include "siswa_menu.php" ?>
  
  <div class="column" >
  <?php 
      if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> ''){
        echo $_SESSION['pesan'] ;
      } $_SESSION['pesan'] = '';
      ?>
</div>
  <div class="column2">
  <div class="status">
      <h3>Hi, <?php echo $username ?></h3>
<a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

      <?php include "siswa_isi.php" ?>
    </div>
	</div>
  </div>
  
</div>
<br>
<div class="footer">
  <?php include "../asset/footer.php" ?>
</div>

</body>
</html> 