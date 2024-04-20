<?php
error_reporting(E_ERROR | E_PARSE);
  try {
    include "check_admin_logged_in.php";
    include "db.php";

    session_start();

    $is_admin_logged_in = $_SESSION['is_admin_logged_in'];
    $admin_logged_in_id = $_SESSION['admin_logged_in_id'];

    $sql = "SELECT * FROM users WHERE role = 'seller'";
    $sql2 = "SELECT * FROM users WHERE role = 'user'";

    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    $conn->close();
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <style>
    body {
        background-image: url('img/wallet4.jpg');
        background-size: cover;
    }

    .bg {
        background-color: rgba(0, 0, 0, 0.6);
    }

    h1,
    h2 {
        color: burlywood;
    }

    .red {
        color: rgb(255, 0, 0);
    }

    .whit {
        color: aliceblue;
    }

    img {
        height: 200px;
        width: 400px;
    }
    </style>
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a href="index.php" class="navbar-brand"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">E-Wallet</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>


    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <div>
                    <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <nav id="navbar" class="navbar">
                <a class="btn btn-danger btn-sm" href="logout_admin.php">Logout</a>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <section class="inner-page" style="margin-top:60px;">
            <div class="p-2">
                <div class="mt-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="p-2">
                                <a href="dashboard.php" class="text-white">
                                    <div class="p-2 border bg-primary rounded mb-2">
                                        Dashboard
                                    </div>
                                </a>
                                <a href="sellers_list.php" class="text-dark">
                                    <div class="p-2 border rounded mb-2">
                                        Sellers
                                    </div>
                                </a>
                                <a href="user_list.php" class="text-dark">
                                    <div class="p-2 border rounded mb-2">
                                        Users
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            Sellers
                                        </div>
                                        <hr>
                                        <div class="fw-bold fs-3">
                                            <?php echo $result->num_rows ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="p-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            Users
                                        </div>
                                        <hr>
                                        <div class="fw-bold fs-3">
                                            <?php echo $result2->num_rows ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="custom_footer" id="footer">
        <?php
    include "includes/footer.php";
    ?>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <?php
  include "includes/scripts.php";
?>

</body>

</html>