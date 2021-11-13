<?php

include 'koneksi.php';

$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$gambar = $_FILES['gambar']['name'];
//cek dulu jika merubah gambar produk jalankan coding ini
if ($gambar != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'cover/' . $nama_gambar_baru); //memindah file gambar ke folder gambar   
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', gambar = '$nama_gambar_baru'";
    $query .= "WHERE id_buku = '$id'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman user-index.php
      //silahkan ganti user-index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data Berhasil Diubah.');window.location='admin-buku-index.php';</script>";
    }
  } else {
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg, jpg atau png.');window.location='admin-buku-index.php';</script>";
  }
} else {
  // jalankan query UPDATE berdasarkan ID yang produknya kita edit
  $query  = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit'";
  $query  .= "WHERE id_buku = '$id'";
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {
    //tampil alert dan akan redirect ke halaman user-index.php
    //silahkan ganti user-index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data Berhasil Diubah.');window.location='admin-buku-index.php';</script>";
  }
}
