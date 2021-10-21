<?php

$qr_detailsiswa = "SELECT nisn,nama,no_hp,nama_ortu,email,alamat
    FROM tb_siswa 
    where id= $id_user ";
$tampil = mysqli_query($kon,$qr_detailsiswa);

$jml_rec = mysqli_num_rows($tampil);
if (!($jml_rec>0)) 
    { 
    die('Data tidak ditemukan!'); 
    }
list($ls_nisn,$ls_nama,$ls_nohp,$ls_wali,$ls_email,$ls_alamat) =  mysqli_fetch_row($tampil);

?>

    <h1>Biodata Siswa</h1>
    <div class="masterid">
        <!-- awal id foto -->
    <div class="card">
                <div class="card-body">
               
                   <img src="..\asset\image\no-photo-available-icon-20.jpg" alt="Admin" width="150">
            
                    
                </div>
              </div>
              <!-- akhir id foto -->
              <!-- awal detail profile -->
<div class="card2">
    <div class="card-body">
                <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NISN</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $ls_nisn; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($ls_nama); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $ls_email; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No HP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $ls_nohp; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Orang Tua / Wali</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= ucwords($ls_wali); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="sesi-detail">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $ls_alamat; ?>
                    </div>
                  </div>
                  <hr>
<div class="sesi-detail">
<div class="col-sm-3">
                      <a class="btn" href="?module=editprofil"><i class="fas fa-pen"></i> Edit</a>
                    </div>
</div>
    </div>
</div>
<!-- akhir detail profile -->
    </div>
