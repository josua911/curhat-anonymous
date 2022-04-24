<?php
include 'logincheck.php';
include 'konfigurasi.php';
include 'navbar.php';
if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    $_SESSION["alert"] = NULL;
}

$result = $conn->query("SELECT * FROM postingan ORDER BY id_postingan DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Beranda</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


    <div class="container">
        <div class="row">
            <?php foreach ($result as $data) { ?>
                <div class="col-md my-3">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $data['username'] ?></h5>
                            <p class="card-text"><?php echo $data['isi_postingan'] ?></p>
                            <p class="card-text"><?php
                                                    if ($data['is_edited'] == 1) {
                                                        echo '(Pernah Diedit)';
                                                    } else {
                                                    }
                                                    ?></p>
                            <div class="text-center">
                                <a href="komentar.php?id_postingan=<?php echo $data['id_postingan'] ?>" class="btn btn-primary">komentar</a>
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