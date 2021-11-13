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

  <title>Tambah</title>
</head>

<body style="font-family: 'Poppins', serif;">
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg sticky-top" style="background-color: #ffffff;">
    <div class="container">
      <ul class="navbar-nav ms-6">
        <li>
          <a class="navbar-brand" style="font-family: 'Poppins', cursive;" href="#">
            <cover alt="" width="77" height="50" class="d-inline-block align-text-center"> Perpus
          </a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <div class="container p-5 my-5 border">
    <div class="card">
      <div class="card-header text-muted">Tambah Buku</div>
      <div class="card-body">


        <form method="post" action="admin-buku-tambah.php" name="form1">

          <div class="mb-3 mt-3 form-group">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="formFile" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar" name="gambar" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="pengarang" required>
          </div>

          <div class="mb-3 mt-3 form-group">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" required>
          </div>

          <input class="btn btn-success" type="submit" name="Submit" value="Submit"></td>
          <a href="admin-buku-index.php" class="btn btn-warning">Cancel</a>
      </div>
    </div>
  </div>

  <?php

  // Check If form submitted, insert form data into users table.
  if (isset($_POST['Submit'])) {
    $judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    unset($_POST);

    // include database connection file
    include("koneksi.php");

    // Insert user data into table
    $sql = "INSERT INTO buku (judul,gambar,pengarang,penerbit) VALUES('$judul','$gambar','$pengarang','$penerbit')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
      echo "<script> alert ('Data Buku Berhasil Ditambah');document.location='admin-buku-index.php';</script>";
    } else {
      die(mysqli_error($koneksi));
    }
  }
  ?>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>