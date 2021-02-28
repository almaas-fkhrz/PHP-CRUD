<?php
include 'koneksi.php';
$kode_buku = $_GET['kode_buku'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE kode_buku = '$kode_buku'");
while ($d = mysqli_fetch_array($data)) {
    $kode_buku = $d['kode_buku'];
    $judul = $d['judul'];
    $jumlah = $d['jml_buku'];
}

if (isset($_POST['cancel'])){
    header('location:buku.php');
} else if (isset($_POST['edit'])) {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($conn, "UPDATE buku SET judul='$judul', jml_buku='$jumlah' WHERE kode_buku='$kode_buku'");
    header('location:buku.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="hidden" name="kode_buku" value="<?= $kode_buku ?>">
        <label for="">Judul Buku</label><br>
        <input type="text" name="judul" value="<?= $judul ?>"><br><br>
        <label for="">Jumlah Buku</label><br>
        <input type="text" name="jumlah" value="<?= $jumlah ?>"><br><br>
        <input type="submit" name="cancel" value="Cancel">
        <input type="submit" name="edit" value="Simpan">
    </form>
</body>

</html>