<?php
include 'konfigurasi.php';
include 'logincheck.php';




if ($_POST['submit'] == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM user where username = '$username' && password = '$password'");
    if ($result->num_rows == "1") {
        $_SESSION["login"] = $username;
        header("Location: halaman_utama.php");
    } else {
        $_SESSION["alert"] = "<script>alert('Username atau Password Salah')</script>";
        header("Location: index.php");
    }
}



if ($_POST['submit'] == "register") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM user where username = '$username'");
    if ($result->num_rows == "1") {
        $_SESSION["alert"] = "<script>alert('Username sudah terdaftar')</script>";
        header("Location: index.php");
    } else {
        $email = $_POST['email'];
        $result = $conn->query("INSERT INTO `user` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')");
        $_SESSION["alert"] = "<script>alert('Berhasil Buat Akun')</script>";
        header("Location: index.php");
    }
}

if ($_POST['submit'] == "edit_profile") {
    $username = $_SESSION['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $result = $conn->query("UPDATE `user` SET `password` = '$password', `email` = '$email' WHERE `user`.`username` = '$username';");
    header("Location: profile.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Update Data')</script>";
}
if ($_POST['submit'] == "buat_post") {
    $username = $_SESSION['login'];
    $cerita = $_POST['cerita'];
    $result = $conn->query("INSERT INTO `postingan` (`id_postingan`, `isi_postingan`, `username`, `is_edited`) VALUES (NULL, '$cerita', '$username', '0')");
    header("Location: halaman_utama.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Membuat Postingan')</script>";
}

if ($_POST['submit'] == "buat_komentar") {
    $username = $_SESSION['login'];
    $komentar = $_POST['komentar'];
    $id_postingan = $_POST['id_postingan'];
    $result = $conn->query("INSERT INTO `komentar` (`id_komentar`, `id_postingan`, `username`, `isi_komentar`) VALUES (NULL, '$id_postingan', '$username', '$komentar');");
    header("Location: komentar.php?id_postingan=$id_postingan.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Buat Komentar')</script>";
}

if ($_POST['submit'] == "hapus_komentar") {
    $username = $_SESSION['login'];
    $id_postingan = $_POST['id_postingan'];
    $result = $conn->query("DELETE FROM `komentar` where `komentar`.`id_postingan` = '$id_postingan' && `komentar`.`username`= '$username';");
    header("Location: komentar.php?id_postingan=$id_postingan.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Hapus Komentar')</script>";
}

if ($_POST['submit'] == "edit_post") {
    $username = $_SESSION['login'];
    $id_postingan = $_POST['id_postingan'];
    $cerita = $_POST['cerita'];
    $result = $conn->query("UPDATE `postingan` SET `isi_postingan`='$cerita',`is_edited`='1' WHERE `id_postingan` = '$id_postingan' && `username` = '$username';");
    header("Location: profile.php");
    $_SESSION["alert"] = "<script>alert('Berhasil Update Postingan')</script>";
}

if ($_POST['submit'] == "lupa") {
    $username = $_POST['username'];
    $result = $conn->query("SELECT * FROM user where username = '$username'");
    if ($result->num_rows == "1") {

        // the message
        foreach ($result as $datapassword) {
            $passwordkirim = $datapassword['password'];
            $emailkirim = $datapassword['email'];
            $msg = "Password anda adalah : " . $passwordkirim;
            $msg = wordwrap($msg, 70);
            mail("$emailkirim", "Password Curhat Anonymous", $msg);
        }

        // use wordwrap() if lines are longer than 70 characters

        // send email
        $_SESSION["alert"] = "<script>alert('Silahkan cek email anda')</script>";
        header("Location: index.php");
    } else {
        $_SESSION["alert"] = "<script>alert('Username tidak terdaftar')</script>";
        header("Location: index.php");
    }
}
