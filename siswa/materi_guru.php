<?php
if (is_null($kelas)){
  include"../asset/blm_edit_profil.php";
  exit;
}
$qr_tampil_materi     = "SELECT * FROM tb_materi where tb_materi.kelas = $kelas";
$tampil = mysqli_query($kon,$qr_tampil_materi);
?>
    <h2>Berikut Materi untuk Kelas <?php echo $kelas; ?></h2>

<?php 
$no = 1;
while($r = mysqli_fetch_assoc($tampil)) : 
?>
<br>
<div class="assignment">
    <div class="judultugas">
        <div class="namatugas"><?=ucwords($r["judul_materi"]); ?></div>
        <div class="control">
            <a href="?module=tmateri&hr_idmateri=<?= $r['id_materi']; ?>" class="tampil" title="Lihat Materi"><i class='fas fa-search'></i> Tampil</a>
        </div>
    </div>
    <div class="isitugas">
        <div class="sesi-detail">
        <div class="col-sm-3">Mata Pelajaran</div>
        <div class="col-sm-9 text-secondary">: <?=ucwords($r["mapel"]); ?></div>
        </div>
        <div class="sesi-detail">
        <div class="col-sm-3">Sub Tema</div>
        <div class="col-sm-9 text-secondary">: <?= $r["sub_tema"]; ?></div>
        </div>
        <div class="sesi-detail">
        <div class="col-sm-3">Lokasi Materi</div>
        <div class="col-sm-9 text-secondary">: <?= $r["lokasi"]; ?></div>
        </div>
        <div class="custom-shape-divider-bottom-1632797489">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div>
        <div> </div>
    </div>
</div>
<?php 
$no++;
endwhile;
?>