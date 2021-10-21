<?php
include "../koneksi.php";
include "../function.php";
@$module = $_GET['module'];
$aksi = "siswa_aksi.php";
if(!empty($module)){
    switch($module){
        case 'siswa':
            include"siswa_home.php";
            break;

        case 'profil':
            include"siswa_profil.php";
            break;

        case 'materi':
            include"materi_guru.php";
            break;

        case 'tmateri':
            include"tampil_materi.php";
            break;

        case 'editprofil':
            include"siswa_editprofil.php";
            break;

        case 'pass':
            include"siswa_pass.php";
            break;

        case 'tugas':
            include"siswa_tugas.php";
            break;

        case 'kerjakan':
            include"siswa_kerjakan.php";
            break;

        case 'histugas':
            include"history_tugas.php";
            break;

        case 'vtugas':
            include"siswa_vtugas.php";
            break;

            default:
            include"siswa_home.php";
            break;
    }

} else{
    include"siswa_home.php";
}?>