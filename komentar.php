<?php
include 'logincheck.php';
if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    $_SESSION["alert"] = NULL;
}
include 'konfigurasi.php';
include 'navbar.php';


$id_postingan = $_GET['id_postingan'];
$result = $conn->query("SELECT * FROM `postingan` WHERE `id_postingan` = '$id_postingan'");
$data = $result->fetch_assoc();
$hasil = $conn->query("SELECT * FROM `komentar` WHERE `id_postingan` = '$id_postingan' ORDER BY id_komentar DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Komentar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="mx-auto text-center">
            <p class="h3"><?php echo $data['username'] ?></p>
            <p class="lead">"<?php echo $data['isi_postingan'] ?>"</p>
        </div>
    </div>
    <div class="container my-3">
        <form action="operasi.php" method="POST">
            <div class="card mx-auto" style="width: 18rem;">
                <div class="card-body">
                    <form action="operasi.php" method="POST">
                        <div class="mb-3">
                            <label for="komentar" class="form-label text-center">Berikan Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" style="height: 70px;" maxlength="1000" required></textarea>
                        </div>
                        <input type="hidden" name="id_postingan" value="<?php echo $id_postingan ?>">
                        <div class="text-center">
                            <button type="submit" name="submit" value="buat_komentar" class="btn btn-primary" onclick="return confirm('Apakah anda yakin untuk mengirim komentar?');">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="operasi.php" method="post">
                <input type="hidden" name="id_postingan" value="<?php echo $id_postingan ?>">
                <button class="btn btn-danger" name="submit" value="hapus_komentar" onclick="return confirm('Apakah anda yakin untuk menghapus semua komentar anda di postingan ini?');">Hapus Komentar</button>
            </form>
            <p class="h4">Komentar :</p>
    </div>
    </form>
    <div class="container my-3 kotak">
        <?php foreach ($hasil as $data) { ?>
            <p class="h5 dekat"><?php echo $data['username'] ?></p>
            <p class="lead dekat">"<?php echo $data['isi_komentar'] ?>"</p>
        <?php } ?>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<style>
    .dekat {
        line-height: 0.7em;
    }
</style>