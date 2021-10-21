<?php
        include("koneksi.php");
        $perhalaman = 3;
        $page = isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
        $mulai = ($page > 1) ? ($page * $perhalaman) - $perhalaman : 0;
        
        $qr     = "SELECT * FROM tb_berita order by tgl_berita DESC limit $mulai,$perhalaman";
        $tampil = mysqli_query($kon,$qr);
        $result = mysqli_query($kon,"SELECT * FROM tb_berita");
        $total = mysqli_num_rows($result);
        $rr = mysqli_fetch_assoc($tampil);

        $jmlhal = ceil($total/$perhalaman);
        
        ?>
    <h1>Berita dan Pengumuman</h1>
    
    <?php
                    do {
                    echo "<div>";
                    $judul_berita = "$rr[judul_berita]";
                    $judul_baru = ucwords($judul_berita);
                    echo "<div><a class='judul' href='?module=tampilberita&hr_idberita=$rr[id_berita]'>".$judul_baru."</a></div>";
                    echo tgl_indonesia("$rr[tgl_berita]");
                    $isi_berita = "$rr[isi_berita]";
                    $isi_baru = ucfirst($isi_berita);
                    echo readmore(4,"<div class='review'>$isi_baru</div>");
                    echo "<div><a class='readmore' href='?module=tampilberita&hr_idberita=$rr[id_berita]'>Read More</a></div>";
                    echo "<br></div>";
                    } while($rr = mysqli_fetch_assoc($tampil));
                    ?>
        <div class="">
        <ul class="h_bar">
        <?php for ($i=1; $i <= $jmlhal; $i++) { ?> 
        <?php if( $i == $page) : ?>
          <li class="sorot"><a href="?hal=<?php echo $i ?>"><?php echo $i ?></a><li>
          <?php else :?>
            <li><a href="?hal=<?php echo $i ?>"><?php echo $i ?></a><li>
          <?php endif;?>
        <?php } ?>
        </ul>