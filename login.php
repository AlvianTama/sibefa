<!DOCTYPE html>
<html lang="en">
<head>
<title>SISTEM BELAJAR FATMAH</title>
<link rel = "icon" href ="asset/image/logo_fatmah.png" type = "image/x-icon">
<link rel="stylesheet" href="asset/css/reset.css">
<link rel="stylesheet" href="asset/css/style.css">
<link rel="stylesheet" href="asset\css\all.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>

<div class="header">
<?php include"asset/header.php"?>
</div>

<div class="row">
<?php include"home_menu.php"?>
<div class="column" >
<div class="kotak_login">
    <h2>Silakan Login</h2>
    <?php
	include "koneksi.php";
    include("function.php");
		 //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//Cek apakah ada kiriman form dari method post
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			session_start();
			
      		date_default_timezone_set("ASIA/JAKARTA");

			$username = input($_POST["username"]);
			$p = input($_POST["password"]);
			$level = input($_POST["level"]);

			if($level == "1") {
				$table = "tb_user";
			} elseif($level == "2") {
				$table = "tb_guru";
			} elseif($level == "3") {
				$table = "tb_siswa";
			}

			$sql = "SELECT * FROM ".$table." WHERE username='".$username."' limit 1";
			$hasil = mysqli_query ($kon,$sql);
			$jumlah = mysqli_num_rows($hasil);

			if ($jumlah>0) {
				$row = mysqli_fetch_assoc($hasil);
				
				//cek password
				if (password_verify($p, $row["password"])){

				$_SESSION["id"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["nama"]=$row["nama"];
				$_SESSION["kelas"]=$row["kelas"];
				$_SESSION["level"]=$row["level"];
        		$_SESSION["email"]=$row["email"];
				// var_dump($_SESSION["level"]);die;
				if ($_SESSION["level"]=$row["level"]==1)
				{
					$_SESSION["level"] = "1";
					header("Location:admin");
				} else if ($_SESSION["level"]=$row["level"]==2)
				{
					$_SESSION["level"] = "2";
					header("Location:guru");
				} else if ($_SESSION["level"]=$row["level"]==3)
				{
					$_SESSION["level"] = "3";
					header("Location:siswa");
				}
			}
				
			}else {
				echo "<div class='alert alert-danger'>
				<strong>Error!</strong> Username atau password salah. 
		</div>";
			}

		}
	
	?>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label for="uname">Username :</label>
            <input type="text" class="form_login" name="username" placeholder="Masukan Username" id="uname" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="pass">Password :</label>
            <input type="password" class="form_login" name="password" placeholder="Masukan Password" id="pass">
        </div>
		<div class="form-group">
		<label for="level"> Login Sebagai</label>
    <select name="level" value="level" id="level">
		<option value='1'>Admin</option>
        <option value='2'>Guru</option>
        <option value='3'>Murid</option>
        </select>
	</div>
        <span class="form-group">
		
            <input type="submit"  class="tombol_login"  value="Login">
        </span>
        </form>
	</div>
</div>
<div class="column2">
<?php include"home_isi.php" ?>
    </div>
	</div>
</div>
</div>
</div>
<br>
<div class="footer">
<?php include"asset/footer.php"?>
</div>

</body>
</html>