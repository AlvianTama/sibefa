<?php 
$perhalaman = 15;
$page = isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
$mulai = ($page > 1) ? ($page * $perhalaman) - $perhalaman : 0;

$qr = "SELECT * FROM tb_galeri order by id_galeri DESC limit $mulai,$perhalaman";
$qr_galeri = "SELECT * FROM tb_galeri";
$tampil = mysqli_query($kon,$qr);
$result = mysqli_query($kon,$qr_galeri);
$total = mysqli_num_rows($result);

$jmlhal = ceil($total/$perhalaman);
?>
<h1>Galeri</h1>
<div class="container">

<ul class="galery">
    <?php 
    while($rr = mysqli_fetch_assoc($tampil)) : 
    ?>
<li><a href="#gambar-<?= $rr["id_galeri"] ?>">
    <img src="upload/<?= $rr["img_galeri"] ?>" alt="<?= $rr["judul"] ?>" width=100% height=100%>
    <span><?= readmore(3,$rr["judul"]) ?></span>
    </a>
    <div class="overlay" id="gambar-<?= $rr["id_galeri"] ?>">
        <h2 class="judulgaleri"><?= $rr["judul"] ?></h2>
    <img src="upload/<?= $rr["img_galeri"] ?>" alt="<?= $rr["judul"] ?>">
    <a href="#" class="galclose">&#10006;</a>
    
    </div>
</li>
<?php 
endwhile;
?>

<div class="clear"></div>
</ul>

</div>
<ul class="h_bar">
        <?php for ($i=1; $i <= $jmlhal; $i++) { ?> 
        <?php if( $i == $page) : ?>
          <li class="sorot"><a href="?module=galery&hal=<?php echo $i ?>"><?php echo $i ?></a><li>
          <?php else :?>
            <li><a href="?module=galery&hal=<?php echo $i ?>"><?php echo $i ?></a><li>
          <?php endif;?>
        <?php } ?>
        </ul>