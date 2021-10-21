<?php
$qr     = "SELECT * FROM tb_siswa ";
$tampil = mysqli_query($kon,$qr);
?>

    <h2>Daftar User Siswa</h2>
    <br>
    <div style="overflow-x:auto;" >
                <table class="table1" border="1">
                    <thead>
                    <tr>
                        <td width="36">No</td>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Kelas</td>
                        <td>No HP (+62)</td>
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
                                <td><?= $rr["kelas"]; ?></td>
                                <td><?= $rr["no_hp"]; ?></td>
                                <td><a class='ubah' href='?module=tampilsiswa&hr_id=<?=$rr["id"];?>' title="Edit"><i class="fas fa-edit"></i> Edit</a></td>  
                                <td><a class='hapus' href='admin_aksi.php?module=dfrsiswa&act=siswa_hapus&hr_id=<?=$rr["id"];?>' onclick='return confirm("Yakin mau menghapus <?=$rr["nama"];?> ?")' title="Hapus"><i class="fas fa-trash-alt"></i> Hapus</a></td>
                            </tr>
                    <?php
                    $no++;
                    endwhile;
                    ?>
                </table>