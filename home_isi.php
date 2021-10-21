<?php
  include "koneksi.php";
@$module = $_GET['module'];

if(!empty($module)){
    switch($module){
        case 'berita':
            include"berita.php";
            break;

            case 'lokasi':
                include"lokasi.php";
                break;
            
            case 'visimisi':
                include"visimisi.php";
                break;
                
            case 'tampilberita':
                include"tampil_berita.php";
                break;

                case 'galery':
                    include"home_galery.php";
                    break;

            default:
            include"berita.php";
            break;
    }

} else{
    include"berita.php";
}
  
?>