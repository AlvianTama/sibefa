<?php
$qr     = "SELECT * FROM tb_galeri ";
$tampil = mysqli_query($kon,$qr);
?>
    <h2>Daftar Galeri</h2>
    <br>
    <div style="overflow-x:auto;" >
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>Judul</td>
                        <td>Gambar</td>
                        <td>Aksi</td>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    while($rr = mysqli_fetch_assoc($tampil)) :
                    ?>
                    <tr>
                                <td><?= $no; ?></td>
                                <td><?= $rr["judul"]; ?></td>
                                <td><img src="../upload/<?=$rr["img_galeri"];?>" width=80px height=50px></td> 
                                <td width="50"><a class="hapus" href="admin_aksi.php?module=galeri&act=hapusgaleri&hr_id=<?=$rr["id_galeri"]; ?>" onclick='return confirm("Yakin mau menghapus <?=$rr["judul"]; ?> ?")' title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</a></td>
                            </tr>
                    <?php $no++;
                    endwhile; ?>
                    </table>