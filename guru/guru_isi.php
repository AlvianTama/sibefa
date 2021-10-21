<?php
  include "../koneksi.php";
  include "../function.php";
@$module = $_GET['module'];
$aksi = "guru_aksi.php";
if(!empty($module)){
    switch($module){
        case 'guru':
            include"guru_home.php";
            break;
        
        case 'profil':
            include"guru_profil.php";
            break;

        case 'materi':
            include"guru_materi.php";
            break;
        
        case 'tambahmateri':
            include"form_materi.php";
            break;

        case 'ubahmateri':
            include"materi_ubah.php";
            break;

        case 'siswa':
            include"guru_daftarsiswa.php";
            break;

        case 'tsiswa':
            include"guru_detailsiswa.php";
            break;

        case 'editprofil':
                include"guru_editprofil.php";
                break;

        case 'pass':
                include"guru_pass.php";
                break;

        case 'tugas':
            include"guru_tugas.php";
            break;
        
        case 'tambahtugas':
            include"guru_tambahtugas.php";
            break;

        case 'histugas':
            include"guru_histugas.php";
            break;

        case 'vtugas':
            include"guru_vtugas.php";
            break;
        
        case 'ubahtugas':
            include"tugas_ubah.php";
            break;

        default:
            include"guru_home.php";
            break;
    }

} else{
    include"guru_home.php";
}?>