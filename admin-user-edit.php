<?php

include 'koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// jalankan query UPDATE berdasarkan ID yang produknya kita edit
$query  = "UPDATE user SET username = '$username', password = '$password', email = '$email' WHERE id = '$id'";
// $query  = "WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
// periska query apakah ada error
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($koneksi) . 
  " - " . mysqli_error($koneksi));
} 
else 
{
  //tampil alert dan akan redirect ke halaman user-index.php
  //silahkan ganti user-index.php sesuai halaman yang akan dituju
  echo "<script>alert('Data Berhasil Diubah.');window.location='admin-user-index.php';</script>";
}