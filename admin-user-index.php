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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">

  <title>Daftar User</title>
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
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-1 mb-lg-0">
          <li class="nav-item mx-2">
            <a class="nav-link" href="admin-buku-index.php">Daftar Buku</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="admin-user-index.php">Daftar User</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-2">
            <a href="login-proses.php?logoutSubmit=1" type="submit">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="container my-5">
    <div class="card border-dark">
      <div class="card-body">

        <div class="container">
          <div class="row justify-content-start" style="background-color:#fff">
            <div class="col-4">
              <a href="admin-user-tambah.php" class="btn" style="background-color: grey;" type="add">Tambah User</a>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
              <form class="d-flex">
                <input class="form-control me-2 border-dark" type="search" placeholder="Search" name="search"
                  aria-label="Search">
                <button class="btn btn-outline-dark text-black" value="search" type="submit">Search</button>
              </form>
              <?php
              include("koneksi.php");
              if (isset($_GET['search'])) {
                $search = $_GET['search'];
                echo "<b>Hasil Pencarian : " . $search . "</b>";
              }
              ?>
            </div>
          </div>

          <div class="mt-4 " style=" width: 100%; margin: auto; align-items: center;">
            <div class="container rounded-3 p-2 mt-3 border">
              <table class="table">
                <caption>List of users</caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include 'koneksi.php';
                    if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $hasil = mysqli_query($koneksi, "SELECT * FROM user WHERE username like '%" . $search . "%' OR email like '%" . $search . "%'");
                    } else {
                    $hasil = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id ASC limit 30");
                    }
                    while ($row = mysqli_fetch_array($hasil)) {
                    ?>
                  <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['email']; //untuk menampilkan nama ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td>
                      <a href="admin-user-formedit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="admin-user-hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
                    </td>
                  </tr>
                  <?php
                 }
                ?>
                </tbody>
              </table>
            </div>
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>