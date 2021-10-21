<?php
        $qr     = "SELECT * FROM tb_user ";
        $tampil = mysqli_query($kon,$qr);

        ?>
    <h2>Daftar User Admin</h2>
    <br>
    <div style="overflow-x:auto;" >
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>No HP (+62)</td>
                        <td>E-Mail</td>
                        <td  colspan="2">Aksi</td>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    while($rr = mysqli_fetch_assoc($tampil)) : ?>
                    
                    <tr>
                                <td><?= $no; ?></td>
                                <td><?= $rr["nama"]; ?></td>
                                <td><?= $rr["username"]; ?></td>
                                <td><?= $rr["no_hp"]; ?></td>
                                <td><?= $rr["email"]; ?></td>
                                <td><a class="ubah" href="?module=tampiladmin&hr_id=<?=$rr["id"];?>" title="Edit"><i class="fas fa-edit"></i> Edit</a></td>  
                                <td><a class="hapus" onclick='return confirm("Yakin ingin menghapus <?= $rr["nama"]; ?> ?")' href="admin_aksi.php?module=dfradmin&act=admin_hapus&hr_id=<?= $rr["id"]; ?>" title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</a></td>
                            </tr>
                <?php 
                    $no++;
                    endwhile;
                    ?>
                </table>