<?php
include 'koneksi.php';
$kode_buku = $_GET['kode_buku'];
mysqli_query($conn, "DELETE FROM buku WHERE kode_buku='$kode_buku'");
header('location:buku.php');
?>