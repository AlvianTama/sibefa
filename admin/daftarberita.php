<?php
$qr     = "SELECT * FROM tb_berita ";
$tampil = mysqli_query($kon,$qr);
?>
    <h2>Daftar Berita dan Pengumuman</h2>
    <br>
    <div style="overflow-x:auto;" >
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>Judul</td>
                        <td>Tanggal</td>
                        <td  colspan="2">Aksi</td>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    while($rr = mysqli_fetch_assoc($tampil)) :
                    ?>
                    <tr>
                                <td><?= $no; ?></td>
                                <td><?= $rr["judul_berita"]; ?></td>
                                <td><?= $rr["tgl_berita"]; ?></td>
                                <td width="50"><a class="ubah" href="?module=tampilberita&hr_idberita=<?=$rr["id_berita"]; ?>" title="Edit"><i class="fas fa-edit"></i> Edit</a></td>  
                                <td width="50"><a class="hapus" href="admin_aksi.php?module=dfrberita&act=berita_hapus&hr_idberita=<?=$rr["id_berita"]; ?>" onclick='return confirm("Yakin mau menghapus <?=$rr["judul_berita"]; ?> ?")' title="Hapus"><i class="fas fa-trash-alt"></i> HAPUS</a></td>
                            </tr>
                    <?php $no++;
                    endwhile; ?>
                    </table>