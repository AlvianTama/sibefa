<?php
  include "../koneksi.php";
  include "../function.php";
@$module = $_GET['module'];
$aksi="admin_aksi.php";
if(!empty($module)){
    switch($module){
        case 'home':
            include"admin_home.php";
            break;

            case 'dfradmin':
                include"daftaradmin.php";
                break;
            
            case 'dfrguru':
                include"daftarguru.php";
                break;
                
            case 'dfrsiswa':
                include"daftarsiswa.php";
                break;

            case 'dfrberita':
                include"daftarberita.php";
                break;

            case 'tambahuser':
                include"tambahuser.php";
                break;

            case 'tambahberita':
                include"form_berita.php";
                break;

            case 'tampiladmin':
                include"admin_ubah.php";
                break;

            case 'tampilguru':
                include"guru_ubah.php";
                break;

            case 'tampilsiswa':
                include"siswa_ubah.php";
                break;

            case 'tampilberita':
                include"berita_ubah.php";
                break;

            case 'pass':
                include"admin_pass.php";
                break;

            case 'tambahgaleri':
                include"tambahgaleri.php";
                break;

            case 'galeri':
                include"daftar_galeri.php";
                break;

            default:
            include"admin_home.php";
            break;
    }

} else{
    include"admin_home.php";
}
  
?>