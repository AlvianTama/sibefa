<?php
function readmore($limit,$text){
        $content = explode(" ",$text);
        $words = array_slice($content, 0, $limit);
        return implode(" ", $words); 
    }
    function tgl_indonesia($date){
      /* ARRAY u/ hari dan bulan */
      $Hari = array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",);
      $Bulan = array ("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
   
   /* Memisahkan format tanggal bulan dan tahun menggunakan substring */
   $tahun 	 = substr($date, 0, 4);
   $bulan 	 = substr($date, 5, 2);
   $tgl	 = substr($date, 8, 2);
   $waktu	 = substr($date,11, 5);
   $hari	 = date("w", strtotime($date));
   
   $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." ";
   return $result;
   }

   function tgl_value($date){
    /* ARRAY u/ hari dan bulan */
    $Hari = array ("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",);
    $Bulan = array ("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
 /* Memisahkan format tanggal bulan dan tahun menggunakan substring */
 $tahun 	 = substr($date, 0, 4);
 $bulan 	 = substr($date, 5, 2);
 $tgl	 = substr($date, 8, 2);
 $waktu	 = substr($date,11, 5);
 $hari	 = date("w", strtotime($date));
 
//  $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." ";
$result = $tahun."-".$bulan."-".$tgl."T".$waktu;
 return $result;
 }
 
   function upload(){
      $namagambar = $_FILES['f_gambar']['name'];
      $ukuranfile = $_FILES['f_gambar']['size'];
      $error      = $_FILES['f_gambar']['error'];
      $tmpname    = $_FILES['f_gambar']['tmp_name'];
    //   var_dump($tmpname); die;
    //apakah yg diupload itu ada
      if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu');
        </script>";
      }
    
      //apakah yg di upload itu gambar
      $ekstensigambarvalid = ['jpg','jpeg','png'];
      $ekstensigambar = explode('.',$namagambar);
      $ekstensigambar = strtolower(end($ekstensigambar));
      if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
        alert('itu bukan gambar');
        </script>";
      }
      $namagambarbaru = uniqid();
      $namagambarbaru .= '.';
      $namagambarbaru .= $ekstensigambar;
    //   var_dump($namagambarbaru); die;
    // upload dir
    // $uploaddir = ;
      move_uploaded_file($tmpname,"../upload/".$namagambarbaru);
      return $namagambarbaru;
    }

    function audio(){
      $namaaudio = $_FILES['f_audio']['name'];
      $ukuranfile = $_FILES['f_audio']['size'];
      $error      = $_FILES['f_audio']['error'];
      $tmpname    = $_FILES['f_audio']['tmp_name'];
    //apakah yg diupload itu ada
      if($error === 4){
        echo "<script>
        alert('pilih audio terlebih dahulu');
        </script>";
      }
    
      //apakah yg di upload itu gambar
      $ekstensiaudiovalid = ['mp3','wav','ogg'];
      $ekstensiaudio = explode('.',$namaaudio);
      $ekstensiaudio = strtolower(end($ekstensiaudio));
      if(!in_array($ekstensiaudio, $ekstensiaudiovalid)){
        echo "<script>
        alert('itu bukan audio');
        </script>";
      }
      $namaaudiobaru = uniqid();
      $namaaudiobaru .= '.';
      $namaaudiobaru .= $ekstensiaudio;
      move_uploaded_file($tmpname,"../upload/audio/".$namaaudiobaru);
      return $namaaudiobaru;
    }

    function galeri(){
      $namagaleri = $_FILES['f_galeri']['name'];
      $ukuranfile = $_FILES['f_galeri']['size'];
      $error      = $_FILES['f_galeri']['error'];
      $tmpname    = $_FILES['f_galeri']['tmp_name'];
    //apakah yg diupload itu ada
      if($error === 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu');
        </script>";
      }
    
      //apakah yg di upload itu gambar
      $ekstensigalerivalid = ['jpg','jpeg','png'];
      $ekstensigaleri = explode('.',$namagaleri);
      $ekstensigaleri = strtolower(end($ekstensigaleri));
      if(!in_array($ekstensigaleri, $ekstensigalerivalid)){
        echo "<script>
        alert('itu bukan gambar');
        </script>";
      }
      $namagaleribaru = uniqid();
      $namagaleribaru .= '.';
      $namagaleribaru .= $ekstensigaleri;
      move_uploaded_file($tmpname,"../upload/galeri/".$namagaleribaru);
      return $namagaleribaru;
    }

    function document(){
      $namagambar = $_FILES['lampiran']['name'];
      // $ukuranfile = $_FILES['lampiran']['size'];
      $error      = $_FILES['lampiran']['error'];
      $tmpname    = $_FILES['lampiran']['tmp_name'];
    
      //apakah yg di upload itu gambar
      $ekstensigambarvalid = ['pdf'];
      $ekstensigambar = explode('.',$namagambar);
      $ekstensigambar = strtolower(end($ekstensigambar));
      if(!in_array($ekstensigambar, $ekstensigambarvalid)){
        echo "<script>
        alert('itu bukan file PDF');
        </script>";
      }
      $namagambarbaru = uniqid();
      $namagambarbaru .= '.';
      $namagambarbaru .= $ekstensigambar;
      move_uploaded_file($tmpname,"../upload/document/".$namagambarbaru);
      return $namagambarbaru;
    }
?>