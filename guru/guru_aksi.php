<?php
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];
 
if ($level!=2) {
    echo "Anda tidak punya akses pada halaman guru";
    exit;
}
include "../koneksi.php";
include "../function.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus materi
if ($module=='materi' AND $act=='materihapus'){
// hapus file
    $qr_pilihfile = "SELECT `gambar_materi`, `audio` FROM `tb_materi` WHERE id_materi ='$_GET[hr_idmateri]'";
    $hasil = mysqli_query($kon,$qr_pilihfile);
    $data = mysqli_fetch_assoc($hasil);
    $gambar = $data["gambar_materi"];
    $audio = $data["audio"];  

    // hapus file gambar
    if(file_exists("../upload/".$gambar)){
        unlink("../upload/".$gambar);
    }
    // hapus file audio
    if(file_exists("../upload/audio/".$audio)){
        unlink("../upload/audio/".$audio);
    }

// query delete
  $qr_materi  = "DELETE from tb_materi WHERE id_materi ='$_GET[hr_idmateri]' ";
    mysqli_query($kon,$qr_materi);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Materi berhasil dihapus
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Materi gagal dihapus
        </div>';
}
    header('location:index.php?module='.$module);
}
//tambah materi
elseif ($module=='materi' AND $act=='materitambah'){   
    $judul = htmlspecialchars($_POST["f_judul"]);
    $mapel = htmlspecialchars($_POST["f_mapel"]);
    $sub_tema = htmlspecialchars($_POST["f_sub_tema"]);
    $lokasi = htmlspecialchars($_POST["f_lokasi"]);
    $materi = htmlspecialchars($_POST["f_materi"]);
    $gambar = upload();
    if(!$gambar){
      return false;
    }
    $audio = audio();
    if(!$audio){
      return false;
    }
    
    $input_materi = "INSERT INTO `tb_materi` (`id_materi`, `kelas`, `judul_materi`, `mapel`, `sub_tema`, `lokasi`, `isi_materi`, `gambar_materi`, `audio`)
          VALUES (NULL,
            '$_POST[f_kelas]',
            '$judul',
            '$mapel',
            '$sub_tema',
            '$lokasi',
            '$materi',
            '$gambar',
            '$audio'
            )";	
                
    mysqli_query($kon,$input_materi);
    $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Materi berhasil ditambahkan
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Materi gagal ditambahkan
        </div>';
}
  header('location:index.php?module='.$module);
}
//update materi
elseif ($module=='materi' AND $act=='materiupdate'){
  $judul = htmlspecialchars($_POST["f_judul"]);
  $mapel = htmlspecialchars($_POST["f_mapel"]);
  $sub_tema = htmlspecialchars($_POST["f_subtema"]);
  $lokasi = htmlspecialchars($_POST["f_lokasi"]);
  $materi = htmlspecialchars($_POST["f_materi"]);
  $gambarlama = $_POST['f_gambarlama'];
    if ($_FILES['f_gambar']['error']===4){
      $gambar = $gambarlama;
    } else {
      $gambar = upload();
    //   delete file lama
    if(file_exists("../upload/".$gambarlama)){
        unlink("../upload/".$gambarlama);
    }
    } 

    $audiolama = $_POST['f_audiolama'];
    if ($_FILES['f_audio']['error']===4){
      $audio = $audiolama;
    } else {
      $audio = audio();
    //   delete file lama
    if(file_exists("../upload/audio/".$audiolama)){
        unlink("../upload/audio/".$audiolama);
    }
    } 
//---------------------------------------------------
$update_materi  = "UPDATE `tb_materi` SET
        `kelas`         ='$_POST[f_kelas]',
        `judul_materi`  ='$judul',
        `mapel`         ='$mapel',
        `sub_tema`      ='$sub_tema',
        `lokasi`        ='$lokasi',
        `isi_materi`    ='$materi',
        `gambar_materi` ='$gambar',
        `audio`         ='$audio'
        WHERE id_materi ='$_POST[f_idmateri]' ";
mysqli_query($kon, $update_materi);
$crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Materi berhasil diperbarui
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Materi gagal diperbarui
        </div>';
}
header('location:index.php?module='.$module);
}
// tambah tugas
elseif ($module=='tugas' AND $act=='tambahtugas'){
  $idtugas = $_POST['idtugas'];
  $namatugas = htmlspecialchars($_POST["namatugas"]);
  $kelas = $_POST['kelas'];
  $mapel = htmlspecialchars($_POST["mapel"]);
  $instruksi = htmlspecialchars($_POST["instruksi"]);
  $tglterbit = $_POST['tgl_terbit'];
  $tglakhir = $_POST['tgl_akhir'];
  // $lampiran = document();
if ($_FILES['lampiran']['error']===4){
  $lampiran = "NULL";
}else{
  $lampiran = document();
}
  if(!$lampiran){
    return false;
  }

  $input_tugas = "INSERT INTO `tb_tugas` (`id`, `id_tugas`, `nama_tugas`, `kelas`, `mapel`, `instruksi`, `tgl_terbit`, `tgl_akhir`, `lampiran`) VALUES (NULL, '$idtugas','$namatugas','$kelas','$mapel','$instruksi','$tglterbit','$tglakhir','$lampiran') ";
  mysqli_query($kon,$input_tugas);
  $crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Tugas berhasil ditambahkan
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Tugas gagal ditambahkan
        </div>';
}
header('location:index.php?module='.$module);
}
//hapus tugas
elseif($module=='tugas' AND $act=='hapustugas'){
    // hapus file lampiran tugas
// query gambar
    $qr_pilihfile = "SELECT `lampiran` FROM `tb_tugas` WHERE id = '$_GET[id]'";
    $hasil = mysqli_query($kon,$qr_pilihfile);
    $data = mysqli_fetch_assoc($hasil);
    $lampiran = $data["lampiran"];
    // var_dump($lampiran);die;
    // hapus file
    if(file_exists("../upload/document/".$lampiran)){
        // echo "lampiran tugas ada"; die;
        unlink("../upload/document/".$lampiran);
    }

    // query hapus dari database
  $qr_tugas  = "DELETE from tb_tugas WHERE id_tugas ='$_GET[hr_tugas]' AND id = '$_GET[id]' ";
  mysqli_query($kon,$qr_tugas);
  $crud = mysqli_affected_rows($kon);

if ($crud > 0){
  // session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
      <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Tugas berhasil dihapus
      </div>';
} else{
  // session_start();
  $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
      <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Tugas gagal dihapus
      </div>';
}
 header('location:index.php?module='.$module);
}
// update tugas
elseif($module=='tugas' AND $act='ubahtugas'){
  $id_tugas = htmlspecialchars($_POST["idtugas"]);
  $namatugas = htmlspecialchars($_POST["namatugas"]);
  $kelas = htmlspecialchars($_POST["kelas"]);
  $mapel = htmlspecialchars($_POST["mapel"]);
  $instruksi = htmlspecialchars($_POST["instruksi"]);
  $tglterbit = $_POST["tgl_terbit"];
  $tglakhir = $_POST["tgl_akhir"];
  $lampiranlama = $_POST["lampiranlama"];
    if ($_FILES['lampiran']['error']===4){
      $lampiran = $lampiranlama;
    } else {
      $lampiran = document();
      if(file_exists("../upload/document/".$lampiranlama)){
        // echo "file lampiran ada"; die;
        unlink("../upload/document/".$lampiranlama);
    }
    }

//---------------------------------------------------
$update_materi  = "UPDATE `tb_tugas` SET
        `id_tugas`    ='$id_tugas',
        `nama_tugas`  ='$namatugas',
        `kelas`       ='$kelas',
        `mapel`       ='$mapel',
        `instruksi`   ='$instruksi',
        `tgl_terbit`  ='$tglterbit',
        `tgl_akhir`   ='$tglakhir',
        `lampiran`    ='$lampiran'
        WHERE id ='$_POST[id]' ";
mysqli_query($kon,$update_materi);
$crud = mysqli_affected_rows($kon);

if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Tugas berhasil diperbarui
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Tugas gagal diperbarui
        </div>';
}
header('location:index.php?module='.$module);
}
?>