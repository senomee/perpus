<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="cover/Logo.svg" type="image">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Poppins&display=swap" rel="stylesheet">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">

  <title>PerpusQ | Detail</title>
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
        <div class="card-header p-3 border-primary text-muted"></div>
        <div class="card-body text-center">
          <h3 class="mt-2 text-center"><?php echo $row['judul']; ?></h3>
          <div class="row">
            <div class="col-md-4 text-center">
              <div class="mt-3">
                <cover src="gambar/<?php echo $row['gambar']; ?>" style="height: 300px">
              </div>
              <h6 class="mt-2"><?php echo $row['pengarang']; ?></h6>
              <h6 class="mt-1"><?php echo $row['penerbit']; ?></h6>
            </div>
          </div>
        </div>
        <div class="card-footer p-3 border-primary text-end">
          <a href="user-print.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn" style="background-color: #ffffff;">Print</a>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <script>
  </script>
</body>

</html>