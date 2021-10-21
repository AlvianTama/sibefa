<?php

$qr_guru = "SELECT id,id_guru,username,nama,no_hp,email,alamat,kelas
        FROM tb_guru
        where id='$id_user'";
$sql_profil_guru = mysqli_query($kon, $qr_guru);
$data = mysqli_num_rows($sql_profil_guru);
if (!($data>0)) 
                { 
                die('Data tidak ditemukan!'); 
                }
list($ls_id,$ls_idguru,$ls_username,$ls_nama,$ls_nohp,$ls_email,$ls_alamat,$ls_kelas) =  mysqli_fetch_row($sql_profil_guru);
?>
<div class="kembali">
        <a href="?module=profil">&#10094; Kembali</a>
</div>
<h2>Edit Profil</h2>
<div class="kotak_login">
        <form action="" method="post">

        <label for=id>Id Guru</label>
        <input type="text" name="id_guru" value="<?php echo $ls_idguru ?>" id="id" required>

        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $ls_nama ?>" required>

        <label>No HP (62)</label>
        <input type="text" name="no_hp" value="<?php echo $ls_nohp ?>" required>

        <label>E-Mail</label>
        <input type="email" name="email" value="<?php echo $ls_email ?>" required>

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

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $ls_username ?>" required>

        <input type="submit" name="button1" value="Perbarui">
</form>

</div>

<?php

        if(isset($_POST['button1'])) {
        $id_guru = htmlspecialchars($_POST["id_guru"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]);
        $email = htmlspecialchars($_POST["email"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $kelas = htmlspecialchars($_POST["kelas"]);
        $username = htmlspecialchars($_POST["username"]);
                // session_start();
                $_SESSION["nama"] = $nama;
                $_SESSION["kelas"] = $kelas ;
                $_SESSION["username"] = $username;
        if($username !== $ls_username){
        //cek username udah ada belum
        $qr_cek = "SELECT `username` FROM `tb_guru` WHERE `username`='".$username."'";
        $t = mysqli_query($kon, $qr_cek);
        // var_dump($t); die;
        if (mysqli_fetch_assoc($t)){
                echo "<script>
                alert('Username sudah ada!')
                </script>";
                return false;
        }
        }
        
     //---------------------------------------------------
$qr_profil_guru  = "UPDATE `tb_guru` SET
        `id_guru`  ='$id_guru',
        `nama`     ='$nama',
        `no_hp`    ='$no_hp',
        `email`    ='$email',
	    `alamat`   ='$alamat',
        `kelas`    ='$kelas',
        `username` ='$username'
        WHERE id ='$id_user' ";
mysqli_query($kon,$qr_profil_guru);
//---------------------------------------------------
$crud = mysqli_affected_rows($kon);

if ($crud > 0){

$_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Profil berhasil diperbarui
        </div>';
} else{

    $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
        <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>Profil gagal diperbarui
        </div>';
}
if($qr_profil_guru){
header('location:?module=profil');
}
}
?>