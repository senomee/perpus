<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Poppins&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">

  <title>Perpus</title>
</head>

<body>
  <?php
  include("koneksi.php");

  $id = ($_GET["id_buku"]);
  $hasil = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
  while ($row = mysqli_fetch_array($hasil)) {
  ?>
    <div class="container my-5">
      <div class="card border-primary">
        <div class="card-header border-primary p-3 text-muted"></div>
        <div class="card-body text-center">
          <h3 class="text-center mt-2"><b><?php echo $row['judul']; ?></b></h3>
          <img src="cover/<?php echo $row['gambar'] ?>" class="card-cover-top border" alt="gambar" style="height: 80%; width: 80%;">
          <h5 class="text-center mt-2"><b><?php echo $row['pengarang']; ?></b></h5>
          <h6 div class="text-center mt-2"><i><?php echo $row['penerbit']; ?></i></h6>
        </div>
        <div class="card-footer border-primary p-3 text-muted"></div>
      </div>
    </div>
  <?php
  }
  ?>
  <script>
    window.print();
  </script>
</body>

</html>