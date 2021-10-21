<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];
 
if ($level!=3) {
    echo "Anda tidak punya akses pada halaman siswa";
    exit;
}
require "../koneksi.php";
require "../function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// pengumpulan tugas

if($module=='histugas' AND $act=='kirimtugas'){
$id_tugas = $_POST['id_tugas'];
$nama_tugas = $_POST['nama_tugas'];
$mapel = $_POST['mapel'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$tgl_pengumpulan = date("Y-m-d H:i");
// var_dump($tgl_pengumpulan); die;
$isitugas = htmlspecialchars($_POST['isitugas']);
if ($_FILES['lampiran']['error']===4){
    $lampiran = "NULL";
  }else{
    $lampiran = document();
  }
    if(!$lampiran){
      return false;
    }

$input_pengumpulan = "INSERT INTO `tb_pengumpulan` (`id_tugas`, `nama_tugas`, `mapel`, `nama_pengumpul`, `kelas`, `tgl_mengumpulkan`, `isi_tugas`, `lampiran`)
VALUE('$id_tugas','$nama_tugas','$mapel','$nama','$kelas','$tgl_pengumpulan','$isitugas','$lampiran')";
mysqli_query($kon,$input_pengumpulan);
$crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Tugas berhasil kumpulkan
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Tugas gagal dikumpulkan
        </div>';
}
header('location:index.php?module='.$module.'&hr_id='.$id_tugas);

}
// hapus tugas
elseif($module=='histugas' AND $act=='hpstugas'){
  $id_tgs = $_GET['hr_id'];
//   hapus file lampiran tugas
// query gambar
    $qr_pilihfile = "SELECT `lampiran` FROM `tb_pengumpulan` WHERE id ='$_GET[id]'";
    $hasil = mysqli_query($kon,$qr_pilihfile);
    $data = mysqli_fetch_assoc($hasil);
    $lampiran = $data["lampiran"];
    // var_dump($lampiran); die;

    // hapus file lampiran
    if(file_exists("../upload/document/".$lampiran)){
        unlink("../upload/document/".$lampiran);
    }
  $qr_tugas  = "DELETE from tb_pengumpulan WHERE id_tugas ='$id_tgs' AND id='$_GET[id]' ";
    mysqli_query($kon,$qr_tugas);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Tugas berhasil dihapus
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Tugas gagal dihapus
        </div>';
}
    header('location:index.php?module='.$module.'&hr_id='.$id_tgs);
}