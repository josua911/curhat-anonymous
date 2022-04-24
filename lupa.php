<?php
session_start();
if (isset($_SESSION["alert"])) {
    echo $_SESSION["alert"];
    $_SESSION["alert"] = NULL;
}
include 'konfigurasi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lupa Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container tengah">
        <div class="card mx-auto kartu" style="width: 18rem">
            <div class="card-body">
                <div class="text-center my-3">
                    <img src="image/logo.png" alt="" class="img-fluid gambar" />
                </div>
                <form action="operasi.php" method="POST">
                    <div class="input-container">
                        <i class="fa fa-user icon my-auto"></i>
                        <input class="input-field" type="text" placeholder="Username" name="username" required />
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-light huruf-login" type="submit" name="submit" value="lupa">Request Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<style>
    body {
        background-color: #4168df;
    }

    .tengah {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .gambar {
        width: 50%;
        height: 50%;
    }

    .kartu {
        background-color: #4168df;
        border: 0px;
    }

    .huruf-login {
        color: #4168df;
        font-weight: 600;
        width: 100%;
    }

    .no-spacing {
        margin: 0;
    }

    .input-container {
        display: -ms-flexbox;
        display: flex;
        width: 100%;
        margin-bottom: 15px;
        border: 1px solid white;
        border-radius: 15px;
    }

    .icon {
        background: #4168df;
        color: white;
        min-width: 50px;
        text-align: center;
        min-height: 100%;
    }

    .input-field,
    .input-field:active,
    .input-field:focus {
        height: 50px;
        background-color: #4168df;
        outline: none;
        border-width: 0px;
        border: none;
        color: white;
    }

    .input-field::placeholder {
        color: white;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
        text-decoration-color: white;
    }
</style>