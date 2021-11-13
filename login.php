<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
  $statusPsn = $sesiData['status']['msg'];
  $jenisStatusPsn = $sesiData['status']['type'];
  unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.all.min.css">
</head>

<body style="margin-top: 150px;">
  <div class="row mt-5 mx-auto justify-content-center">
    <div class="col-lg-4 p-4 text-center" style="background: black">
      <?php
      if (!empty($sesiData['userLoggedIn']) && !empty($sesiData['userID'])) {
        include 'user-function.php';
        $user = new User();
        $kondisi['where'] = array(
          'id' => $sesiData['userID'],
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
        if ($userData['level'] == 'user') {
          header("Location:user-index.php");
        } else if ($userData['level'] == 'admin') {
          header("Location:admin-buku-index.php");
        }
      ?>
      <?php } else { ?>
        <h3 class="text-center text-black text-white">Silahkan Login</h3><br>
        <?php echo !empty($statusPsn) ? '<p class="text-white"' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
        <div class="form-signin">
          <form action="login-proses.php" method="post">
            <div class="form-floating">
              <input style="font-weight: 500;" type="txt" class="form-control" name="username" placeholder="username" required="">
              <label style="font-weight: 500;" for="username">Email Address</label>
            </div>
            <div class="form-floating">
              <input style="font-weight: 500;" type="password" class="form-control mt-3" name="password" placeholder="Password" required="">
              <label style="font-weight: 500;" for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg mt-3 btn-primary" value="Login" name="loginSubmit" type="submit">Login</button>
          </form>
        </div>
    </div>
  </div>
<?php } ?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>