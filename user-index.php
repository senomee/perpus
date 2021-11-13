<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="cover/Logo.svg" type="image">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Margarine&family=Montaga&display=swap" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Perpus</title>
</head>

<body style="font-family: 'Poppins', serif;">
  <nav class="navbar navbar-expand-lg navbar-light shadow-lg sticky-top" style="background-color: #ffffff;">
    <div class="container">
      <ul class="navbar-nav ms-6">
        <li>
          <a class="navbar-brand" style="font-family: 'Poppins', cursive;" href="#">
            <cover src="cover/Logo.svg" alt="" width="77" height="50" class="d-inline-block align-text-center"> Perpus
          </a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-2">
            <a href="login-proses.php?logoutSubmit=1" type="submit">Logout</a>
          </li>
        </ul>
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
              <?php
              include("koneksi.php");
              if (isset($_GET['search'])) {
                $search = $_GET['search'];
                echo "<b>Hasil Pencarian : " . $search . "</b>";
              }
              ?>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">
              <form class="d-flex">
                <input class="form-control me-2 border-dark" type="search" placeholder="Search" name="search"
                  aria-label="Search">
                <button class="btn btn-outline-dark " value="search" type="submit">Search</button>
              </form>
            </div>
          </div>

          <div class="row row-cols-2 mt-4 " style=" width: 100%; margin: auto; align-items: center;">
            <?php
            if (isset($_GET['search'])) {
              $search = $_GET['search'];
              $hasil = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul like '%" . $search . "%' OR pengarang like '%" . $search . "%'");
            } else {
              $hasil = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku ASC limit 30");
            }
            while ($row = mysqli_fetch_array($hasil)) {
            ?>
            <div style="width: 25%;">
              <div data-toggle="modal" name="view_detail" data-id="<?php echo $row['id_buku']; ?>"
                data-target="#myModal" class="details card h-100 shadow p-3 mb-5 bg-body rounded"
                style="max-width: 15rem;">
                <img src="cover/<?php echo $row['gambar'] ?>" class="card-img-top border" alt="gambar" height="100%">
                <div class="card-body text-center">
                  <div class="text-center mt-2 fw-bold"><?php echo $row['judul']; ?></div>
                  <div class="text-center mt-2 small"><?php echo $row['pengarang']; ?></div>
                  <div div class="text-center mt-2 small"><?php echo $row['penerbit']; ?></div>
                  <div class="container my-3">
                    <div class="col-md-12 text-center">
                      <a href="user-print.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-danger">Print</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>