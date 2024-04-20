<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


    <style>
        body{
            background-image: url('img/ewallet.jpg');
            background-size: cover;
        }
        .bg {
            background-color: rgba(0, 0, 0, 0.6);
        }
        h1,h2{
            color:burlywood;
        }
        .red{
            color: rgb(255, 0, 0);
        }
        .whit{
            color: aliceblue;
        }
        img{
            height: 200px;
            width: 400px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center my-4">
            <div class="col-md-6 text-center bg shadow py-5 rounded">
                <h1 class="my-4">Wellcome to &nbsp;<i><span class="whit">E-Wallet</span><span class="red"></span></i></h1>
                <hr class="my-3 bg-light">
                <span><img src="./img/wallet2.jpg"></span>
                <hr class="my-3 bg-light">
                <h2 class="my-4">Online Money Transfer system</h2>
                <button type="submit" onclick="window.location='home.php'" class="btn btn-danger btn-lg my-4 px-3 py-3">Start Now ! &nbsp; &nbsp;<i class="fa fa-heartbeat" style="font-size:25px;"></i></button>
            </div>
        </div>
    </div>
</body>
</html>