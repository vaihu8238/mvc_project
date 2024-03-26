<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>staff</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


<section class="container bg-dark  text-light ">
 <form action="" method="post" enctype="multipart/form-data">
 <div class="container-fluid position-relativep-0">
    
        <!-- Sign In Start -->
        <!-- <div class="container-fluid"> -->
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 70vh; margin-left: 15%; ">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6 ">
                    <div class="bg-secondary rounded p-6 p-sm-5 my-4 mx-6">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="scategory" class="">
                                
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SHREE</h3>
                            </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <h3>UPDATE SERVICE</h3>
                        </div>
                        <div class="form-floating mb-2">

                        <input type="text" class="form-control" name="scn" id="floatingInput" value="<?php echo $fetch->pcate_name;?>">
                        <label for="floatingInput">CATEGORY NAME :</label>

                        </div>

                        <div class=" mb-2">
                            
                            <input type="file" class="form-control" name="file" id="floatingInput">
                            <label for="floatingInput"></label>
                    
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">ADD</button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- Sign In End -->
</div>
 </form>
</section>

