<?php
$qr_guru_ubah =  "SELECT  id,username,nama,no_hp,email,alamat 
        FROM  tb_guru 
        where id= '$_GET[hr_id]' ";

$result = mysqli_query($kon, $qr_guru_ubah);
$jml_rec = mysqli_num_rows($result);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_id,$ls_user, $ls_nama,$ls_nohp,$ls_email,$ls_alamat) =  mysqli_fetch_row($result);

?>
<div class="kembali">
        <a href="?module=dfrguru">&#10094; Kembali</a>
</div>
    <h2>Silakan Ubah Profil</h2>
    <div class="kotak_login">
    <form method="post" >
                  <label for="id">ID</label>
                  <input name="f_id" type="hidden" value="<?php echo "$ls_id"; ?>"> <?php echo "$ls_id"; ?>
              <br><br>

                  <label for="nama">Nama</label>
                  <input name="f_nama" type="text" value="<?php echo "$ls_nama"; ?>" size="10">

                  <label for="username">Username</label>
                  <input name="f_user" type="text" value="<?php echo "$ls_user"; ?>" size="10">

                  <label for="no_hp">Nomor HP</label>
                  <input name="f_nohp" type="text" value="<?php echo "$ls_nohp"; ?>" size="10">
                 
                  <label for="email">E-Mail</label>
                  <input name="f_email" type="text" value="<?php echo "$ls_email"; ?>" size="10">

                  <label for="alamat">Alamat</label>
                  <input name="f_alamat" type="text" value="<?php echo "$ls_alamat"; ?>" size="10">

                  <input type="submit" name="button1" value="Submit">
                </form>
</div>
                <?php
      
        if(isset($_POST['button1'])) {
            require("../koneksi.php");
        
        $id_guru = htmlspecialchars($_POST["f_id"]);
        $nama = htmlspecialchars($_POST["f_nama"]);
        $no_hp = htmlspecialchars($_POST["f_nohp"]);
        $email = htmlspecialchars($_POST["f_email"]);
        $alamat = htmlspecialchars($_POST["f_alamat"]);
        $username = htmlspecialchars($_POST["f_user"]);
            // var_dump($kk); die;

        //cek username udah ada belum
        if($username !== $ls_user){
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
       $qr_guru  = "UPDATE `tb_guru` SET
	            `nama`    ='$nama',
				`username`='$username',
                `no_hp`   ='$no_hp',
                `email`   ='$email',
                `alamat`  ='$alamat'
                   WHERE id ='$id_guru' ";
       mysqli_query($kon,$qr_guru);
	   //---------------------------------------------------
       $crud = mysqli_affected_rows($kon);

       if ($crud > 0){
           // session_start();
       $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
               <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>User berhasil diperbarui
               </div>';
       } else{
           // session_start();
           $_SESSION['pesan'] = '<div id="pesan" class="alert alert-success">
               <strong><i class="fa fa-check-circle fa-lg"></i> Success! </strong>User gagal diperbarui
               </div>';
       }
	   header('location:index.php?module=dfrguru');
        }
    ?>