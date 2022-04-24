<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "curhat";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Database Error')</script>");
}
