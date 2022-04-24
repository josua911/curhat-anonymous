<?php
include 'konfigurasi.php';
session_start();
include 'logincheck.php';

if ($_GET['submit'] == "hapus_post") {
    $username = $_SESSION['login'];
    $id_postingan = $_GET['id_postingan'];
    $result = $conn->query("DELETE FROM `postingan` WHERE `postingan`.`id_postingan` = '$id_postingan' && `postingan`.`username` = '$username'");
    header("Location: profile.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Menghapus Postingan')</script>";
}

if ($_GET['submit'] == "logout") {
    session_unset();
    header("Location: index.php");
}
