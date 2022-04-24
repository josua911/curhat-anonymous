<?php
include 'logincheck.php';
include 'konfigurasi.php';
include 'navbar.php';
$username = $_SESSION['login'];
$result = $conn->query("SELECT * FROM user where username = '$username'");
$data = $result->fetch_assoc();
if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    $_SESSION["alert"] = NULL;
}
$username = $_SESSION['login'];
$hasil = $conn->query("SELECT * FROM postingan where username = '$username' ORDER BY id_postingan DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
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
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $data['username'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $data['password'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" value="edit_profile" class="btn btn-primary" onclick="return confirm('Apakah anda yakin untuk mengedit data anda?');">Edit</button>
                </div>
            </form>
        </div>
    </div>

    <p class="h3 my-3 text-center">Postingan Anda</p>
    <div class="container">
        <div class="row">
            <?php foreach ($hasil as $data) { ?>
                <div class="col-md my-3">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $data['username'] ?></h5>
                            <p class="card-text"><?php echo $data['isi_postingan'] ?></p>
                            <div class="text-center">
                                <a href="komentar.php?id_postingan=<?php echo $data['id_postingan'] ?>" class="btn btn-primary">komentar</a>
                            </div>
                            <div class="text-center">
                                <a href="operasi_get.php?submit=hapus_post&id_postingan=<?php echo $data['id_postingan'] ?>" class="btn btn-danger my-2" onclick="return confirm('Apakah anda yakin untuk menghapus postingan ini?');">Hapus</a>
                            </div>
                            <div class="text-center">
                                <a href="edit_post.php?id_postingan=<?php echo $data['id_postingan'] ?>" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<style>
</style>