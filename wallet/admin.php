

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EWALLET</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('http://localhost/project/backgroundimg1.jpg');
            background-size: cover;
        }
        .bg {
            background-color: rgba(0, 0, 0, 0.6);
        }
        img{
            height: 200px;
            width: 400px;
        }

        .margin-top-10 {
            margin-top: 10% !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white shadow rounded margin-top-10 py-4">
                <div class="text-center">
                    <a href="/">
                        <div class="mb-4">
                            <h1>ADMIN</h1>
                        </div>
                    </a>

                    <h1 class="my-4">Login</h1>
                </div>
                <hr class="bg-light">
                <div class="my-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="#" method="post">
                                <div>
                                    <div>
                                        <label for="">Email</label>
                                        <input type="text" class="form-control mb-2" name="email" id="" placeholder="Email" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control mb-2" name="password" id="" placeholder="Password" required>
                                    </div>
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-primary w-100">Login</button>
                                    </div>
                                    <div class="text-end mb-2">
                                        <div class="text-primary small">
                                            <a href="/forgot_password.php">Forgot password?</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>