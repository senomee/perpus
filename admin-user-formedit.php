<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  <title>Edit</title>
</head>

<body style="font-family: 'Poppins', serif;">
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg sticky-top" style="background-color: #ffffff;">
    <div class="container">
      <ul class="navbar-nav ms-6">
        <li>
          <a class="nav-link" style="font-family: 'Poppins', cursive;" href="admin-buku-index.php" width="80"
            height="60"> Perpus</a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <?php

  include 'koneksi.php';

  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
      die("Query Error: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='admin-user-index.php';</script>";
    }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke user-index.php
    echo "<script>alert('Masukkan Data ID.');window.location='admin-user-index.php';</script>";
  }
  ?>

  <div class="container p-5 my-5 border">
    <div class="card">
      <div class="card-header text-muted">Edit User</div>
      <div class="card-body">

        <form enctype="multipart/form-data" action="admin-user-edit.php" method="post">

          <input name="id" value="<?php echo $data['id']; ?>" hidden />

          <div class="mb-3 mt-3">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
          </div>

          <div class="mb-3 mt-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" />
          </div>

          <div class="mb-3 mt-3">
            <label>Password</label>
            <input type="text" class="form-control" name="password" required=""
              value="<?php echo $data['password']; ?>" />
          </div>

          <button class="btn btn-success mt-3" type="submit">Update</button>
          <a href="admin-user-index.php" class="btn btn-warning mt-3">Cancel</a>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>