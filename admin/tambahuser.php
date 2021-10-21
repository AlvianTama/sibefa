<h2>Silakan Tambahkan User Baru</h2>
    <div class="kotak_login">
    <form action="admin_aksi.php?module=dfruser&act=adduser" method="post">
    <div class="form-group">
                <label>Username : </label>
                <input type='text' class="form_login" name='f_username'><br>
                </div>
                <div class="form-group">
                <label>Nama  : </label>
                <input type='text' class="form_login" name='f_nama'><br>
                </div> 
                <div class="form-group">
                <label>Password  : </label>
                <input type='password' class="form_login" name='f_password'><br>
                </div>
                <div class="form-group">
                <label>Konfirmasi Password  : </label>
                <input type='password' class="form_login" name='f_konpassword'><br>
                </div>
                <br>
                <div class="form-group">
                <label>Level :</label>
                <input type='radio' name='f_level' value='1'> admin
                <input type='radio' name='f_level' value='2' checked>guru
                <input type='radio' name='f_level' value='3'> murid
                </div>
                <br><br><br>
                <div class="form-group">
                <input type="submit" class="tombol_login">
                </div>
            </form>