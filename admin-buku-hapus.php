<?php
include 'koneksi.php';
$id = $_GET["id_buku"];

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM buku WHERE id_buku='$id' ";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
  die("Gagal menghapus data: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='admin-buku-index.php';</script>";
}
?>