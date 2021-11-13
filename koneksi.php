<?php
$databaseHost = 'localhost';
$databaseName = 'perpus';
$databaseUsername = 'root';
$databasePassword = '';

global $koneksi;
$koneksi = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$koneksi) {
    die(mysqli_error($koneksi));
}
