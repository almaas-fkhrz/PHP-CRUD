<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    mysqli_query($conn, "INSERT INTO buku (judul, jml_buku) VALUES ('$judul', '$jumlah')");
    header('location:buku.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <label for="">Judul Buku</label><br>
        <input type="text" name="judul"><br><br>
        <label for="">Jumlah Buku</label><br>
        <input type="text" name="jumlah"><br><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
    <h3>Daftar Buku</h3>
    <table>
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Jumlah Buku</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'koneksi.php';
                $data = mysqli_query($conn, "SELECT * FROM buku");
                while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?= $d['kode_buku'];?></td>
                <td><?= $d['judul'];?></td>
                <td><?= $d['jml_buku'];?></td>
                <td><a href="edit.php?kode_buku=<?= $d['kode_buku'];?>">Edit</a> <a
                        href="hapus.php?kode_buku=<?= $d['kode_buku'];?>"
                        onclick="return confirm('Apakah kamu yakin ingin menghapus item ini?')">Hapus</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>