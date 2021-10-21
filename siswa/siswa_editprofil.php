<?php

$qr_siswa_tampil = "SELECT id,nisn,username,nama,no_hp,nama_ortu,email,alamat,kelas
        FROM tb_siswa
        where id='$id_user'";
$sql_profil_siswa = mysqli_query($kon, $qr_siswa_tampil);
$data = mysqli_num_rows($sql_profil_siswa);
if (!($data>0)) 
                { 
                die('Data tidak ditemukan!'); 
                }
    list($ls_id,$ls_nisn,$ls_username,$ls_nama,$ls_nohp,$ls_ortu,$ls_email,$ls_alamat,$ls_kelas) =  mysqli_fetch_row($sql_profil_siswa);
?>
<div class="kembali">
        <a href="?module=profil">&#10094; Kembali</a>
    </div>
    <h2>Edit Profil</h2>
    <div class="kotak_login">
        <form action="" method="post">
    
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" value="<?php echo $ls_nisn ?>" id="nisn" required>
            
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?php echo $ls_nama ?>" id="nama" required>
            
            <label for="wali">Nama Wali Murid</label>
            <td><input type="text" name="wali" value="<?php echo $ls_ortu ?>" id="wali" required>
            
            <label for="hp">No HP (62)</label>
            <label><input type="text" name="no_hp" value="<?php echo $ls_nohp ?>" id="hp" required>
            
            <label for="email">E-Mail</label>
            <input type="email" name="email" value="<?php echo $ls_email ?>" id="email" required>
            
            <label>alamat</label>
            <textarea rows="3" style="font: size 1px;; width:100%;" type="text" name="alamat" required><?php echo $ls_alamat ?></textarea>
            
            <label>Kelas</label>
            <select name="kelas" value="kelas">
                    <option <?php if($ls_kelas==1){echo "selected";} ?> value='1'>Kelas 1</option>
                    <option <?php if($ls_kelas==2){echo "selected";} ?> value='2'>Kelas 2</option>
                    <option <?php if($ls_kelas==3){echo "selected";} ?> value='3'>Kelas 3</option>
                    <option <?php if($ls_kelas==4){echo "selected";} ?> value='4'>Kelas 4</option>
                    <option <?php if($ls_kelas==5){echo "selected";} ?> value='5'>Kelas 5</option>
                    <option <?php if($ls_kelas==6){echo "selected";} ?> value='6'>Kelas 6</option>
            </select>

            <label for="uname">Username</label>
            <input type="text" name="username" value="<?php echo $ls_username ?>" id="uname" required>

<input type="submit" name="button1" value="Perbarui">

</form>
    </div>
    

<?php
        if(isset($_POST['button1'])) {
        //   session_start();
          $_SESSION["nama"] = $_POST["nama"];
          $_SESSION["kelas"] = $_POST["kelas"];
          $_SESSION["username"] = $_POST["username"];
     //---------------------------------------------------
     $nisn = htmlspecialchars($_POST['nisn']);
     $nama = htmlspecialchars($_POST['nama']);
     $nohp = htmlspecialchars($_POST['no_hp']);
     $wali = htmlspecialchars($_POST['wali']);
     $email = htmlspecialchars($_POST['email']);
     $alamat = htmlspecialchars($_POST['alamat']);
     $kelas = $_POST['kelas'];
     $username = htmlspecialchars($_POST['username']);
    //  var_dump($nisn); die;
    $qr_siswa  = "UPDATE `tb_siswa` SET
    `nisn`      ='$nisn',
	`nama`      ='$nama',
	`no_hp`     ='$nohp',
    `nama_ortu` ='$wali',
    `email`     ='$email',
	`alamat`    ='$alamat',
    `kelas`     ='$kelas',
    `username`  ='$username'
    WHERE id ='$id_user' ";
    mysqli_query($kon,$qr_siswa);
	   //--------------------------------------------------
    $crud = mysqli_affected_rows($kon);
	if ($crud > 0){
    session_start();
$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Profil berhasil diperbarui
        </div>';
} else{
    session_start();
    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-fail">
        <strong><i class="fas fa-exclamation-triangle fa-lg"></i> Caution! </strong>Profil gagal diperbarui
        </div>';
}
    header('location:?module=profil');}
    
    ?>