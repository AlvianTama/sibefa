<?php
$qr_guru_ubah =  "SELECT id,password FROM tb_siswa WHERE id= $id_user ";

$result = mysqli_query($kon, $qr_guru_ubah);
$jml_rec = mysqli_num_rows($result);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_id,$ls_pass) =  mysqli_fetch_row($result);
// var_dump($ls_id);
?>

<form action="" method="POST">
<h2>Ubah Password</h2>
<br>
    <label for="passwordlama">Password lama</label>
    <input type="password" name="password" id="passwordlama">

    <label for="password1">Password baru</label>
    <input type="password" name="pass1" id="password1">

    <label for="password2">Konfirmasi Password baru</label>
    <input type="password" name="pass2" id="password2">

    <input type="submit" name="ubah" value="Ubah">
</form>

<?php 

if(isset($_POST['ubah'])){
$pass = mysqli_real_escape_string($kon, $_POST["password"]);
$pass1 = mysqli_real_escape_string($kon, $_POST["pass1"]);
$pass2 = mysqli_real_escape_string($kon, $_POST["pass2"]);
    if($pass1 !== $pass2){
    echo"<script>
        alert('Password tidak sama!')
        </script>";
        return false;
}

if(password_verify($pass, $ls_pass)){
    $passbaru = password_hash($pass1, PASSWORD_DEFAULT);
    mysqli_query($kon,"UPDATE tb_siswa SET password = '$passbaru' WHERE id = '$ls_id'");
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Password berhasil diperbarui
        </div>';
        // return false;
}else{
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Password gagal diperbarui
        </div>';
        // return false;
}
header('location:index.php?module=pass');
}


?>