<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='../index.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!=1) {
    echo "Anda tidak punya akses pada halaman admin";
    exit;
}

require "../koneksi.php";
require "../function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus user guru
if ($module=='dfrguru' AND $act=='guru_hapus'){
   $qr_guru_hps  = "DELETE from tb_guru WHERE id ='$_GET[hr_id]' ";
    mysqli_query($kon,$qr_guru_hps);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Guru berhasil dihapus
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Guru gagal dihapus
        </div>';
}
   header('location:index.php?module='.$module);
}
//hapus user admin
elseif($module=='dfradmin' AND $act=='admin_hapus'){
    $qr_admin_hps  = "DELETE from tb_user WHERE id ='$_GET[hr_id]' ";
    mysqli_query($kon,$qr_admin_hps);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Admin berhasil dihapus
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Admin gagal dihapus
        </div>';
}
   header('location:index.php?module='.$module);
}
//hapus user siswa
elseif($module=='dfrsiswa' AND $act=='siswa_hapus'){
    $qr_siswa_hps  = "DELETE from tb_siswa WHERE id ='$_GET[hr_id]' ";
    mysqli_query($kon,$qr_siswa_hps);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Siswa berhasil dihapus
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Siswa gagal dihapus
        </div>';
}
   header('location:index.php?module='.$module);
}
//hapus user berita
elseif($module=='dfrberita' AND $act=='berita_hapus'){
    $qr_berita_hps  = "DELETE from tb_berita WHERE id_berita ='$_GET[hr_idberita]' ";
    mysqli_query($kon,$qr_berita_hps);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Berita berhasil dihapus
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Berita gagal dihapus
        </div>';
}
   header('location:index.php?module='.$module);    
}
// hapus galeri
elseif ($module=='galeri' AND $act=='hapusgaleri') {
    // query gambar
    $qr_pilihfile = "SELECT `img_galeri` FROM `tb_galeri` WHERE id_galeri ='$_GET[hr_id]'";
    $hasil = mysqli_query($kon,$qr_pilihfile);
    $data = mysqli_fetch_assoc($hasil);
    $gambar = $data["img_galeri"];

    // hapus file
    if(file_exists("../upload/".$gambar)){
        unlink("../upload/".$gambar);
    }
    // var_dump($gambar); die;
    // hapus dari database
    $qr_galeri_hps  = "DELETE from tb_galeri WHERE id_galeri ='$_GET[hr_id]' ";
    mysqli_query($kon,$qr_galeri_hps);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Galeri berhasil dihapus
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Galeri gagal dihapus
        </div>';
}
   header('location:index.php?module='.$module);  
}
// tambah galeri
elseif ($module=='galeri' AND $act=='addgalery'){
    // var_dump($_FILES); die;
    $judul_galeri = htmlspecialchars($_POST["judul"]);
    $img_galeri = upload();
    if (!$img_galeri){
        return false;
    }

    $tambahgaleri = "INSERT INTO `tb_galeri` (`judul`, `img_galeri`) VALUES ('$judul_galeri', '$img_galeri')";	
    mysqli_query($kon,$tambahgaleri);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Galeri berhasil ditambahkan
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Galeri gagal ditambahkan
        </div>';
}
   header('location:index.php?module='.$module);
}
//tambah user
elseif ($module=='dfruser' AND $act=='adduser'){   
    $leveluser= $_POST['f_level'];
    $username = htmlspecialchars($_POST['f_username']);
    $nama = htmlspecialchars($_POST['f_nama']);
    $pass = mysqli_real_escape_string($kon, $_POST['f_password']);
    $pass2 = mysqli_real_escape_string($kon, $_POST['f_konpassword']);
    // var_dump($leveluser);
    // die;
    if($leveluser == '1') {
        $table = 'tb_user';
        $lvl = 'dfradmin';
    } elseif($leveluser == '2') {
        $table = 'tb_guru';
        $lvl = 'dfrguru';
    } elseif($leveluser == '3') {
        $table = 'tb_siswa';
        $lvl = 'dfrsiswa';
    }
    
    //cek username udah ada belum
    $qr_cek = "SELECT username FROM $table WHERE username='$username'";
    $qr_hasilcek = mysqli_query($kon, $qr_cek);
    // var_dump($qr_hasilcek); die;
    if (mysqli_num_rows($qr_hasilcek) > 0){
        echo "<script>
        alert('Username sudah ada!')
        </script>";
        return false;
    }
    //konfirmasi password
    if($pass !== $pass2){
        echo"<script>
        alert('Password tidak sama!')
        </script>";
        return false;
    }

    //enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    
    //tambah ke database
    $tambahuser = "INSERT INTO `$table` (`username`, `nama`, `password`, `level`) VALUES ('$username','$nama','$pass','$leveluser')";
        // var_dump($tambahuser);die;
        mysqli_query($kon, $tambahuser);
    
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Pengguna berhasil ditambahkan
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Pengguna gagal ditambahkan
        </div>';
}
   header('location:index.php?module='.$lvl);
}
//simpan berita
elseif ($module=='dfrberita' AND $act=='addnews'){
    $judul_berita = htmlspecialchars($_POST["f_judul"]);
    $isi_berita = htmlspecialchars($_POST["f_isi"]);
        $tambah_berita = "INSERT INTO `tb_berita` (`judul_berita`, `isi_berita`) VALUES ('$judul_berita', '$isi_berita')";

mysqli_query($kon,$tambah_berita);
$crud = mysqli_affected_rows($kon);

if ($crud > 0){
    // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Berita berhasil ditambahkan
        </div>';
} else{
    // session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Berita gagal ditambahkan
        </div>';
}

header('location:index.php?module='.$module);
}

elseif ($module=='mhs' AND $act=='update'){
 echo "Perintah SQL Update data ditulis disini";
}   
?>
