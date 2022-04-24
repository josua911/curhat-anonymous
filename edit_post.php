<?php
include 'logincheck.php';
if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    $_SESSION["alert"] = NULL;
}
include 'konfigurasi.php';
include 'navbar.php';
$id_postingan = $_GET['id_postingan'];
$username = $_SESSION['login'];
$hasil = $conn->query("SELECT * FROM `postingan` WHERE `id_postingan` = $id_postingan && `username` = '$username';");
$data = $hasil->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Data Anda</h5>
            <form action="operasi.php" method="POST">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id_postingan" value="<?php echo $id_postingan ?>">
                </div>
                <div class="mb-3">
                    <label for="cerita" class="form-label text-center">Cerita Anda</label>
                    <textarea class="form-control" id="cerita" name="cerita" style="height: 200px;" maxlength="1000" required><?php echo $data['isi_postingan'] ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" value="edit_post" class="btn btn-primary" onclick="return confirm('Apakah anda yakin untuk mengedit postingan ini?');">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>