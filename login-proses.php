<?php
//memulai Session
session_start();
include 'user-function.php';
$user = new User();
if(isset($_POST['loginSubmit'])){
    //memeriksa apakah login yang diinput kosong
    if(!empty($_POST['username']) && !empty($_POST['password'])){
  //mendapatkan data user dari class user
        $kondisi['where'] = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'status' => '1'
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
  //Menetapkan data dan status user berdasarkan login
        if($userData){
            $sesiData['userLoggedIn'] = TRUE;
            $sesiData['userID'] = $userData['id'];
            $sesiData['status']['type'] = 'sukses';
            $sesiData['status']['msg'] = 'login.php';
        }else{
            $sesiData['status']['type'] = 'error';
            $sesiData['status']['msg'] = 'username atau password salah, silahkan coba lagi.'; 
        }
    }else{
        $sesiData['status']['type'] = 'error';
        $sesiData['status']['msg'] = 'Masukkan username and password.'; 
    }
 //menyimpan status login ke dalam Session
    $_SESSION['sesiData'] = $sesiData;
 //mengalihkan ke halaman home
    header("Location:login.php");
}elseif(!empty($_REQUEST['logoutSubmit'])){
 //menghapus data Session
    unset($_SESSION['sesiData']);
    session_destroy();
 //menyimpan Status logout ke dalam Session
    $sesiData['status']['type'] = 'sukses';
    $sesiData['status']['msg'] = 'Anda telah berhasil logout dari akun Anda.';
    $_SESSION['sesiData'] = $sesiData;
 //mengalihkan ke halaman home
    header("Location:login.php");
}else{
 //mengalihkan ke halaman home
    header("Location:login.php");
}