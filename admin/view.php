<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VIEW-USERS</title>
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
</head>

<body>
<form action="">
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="users" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SHREE</h3>
                            </a>
                            <h3>VIEW-USERS</h3>
                        </div>
                        <div class="col-md-12">
                            <label for="fnm" class="form-label">Fname</label>
                            <input type="text" class="form-control" name="fn" value="<?php echo $v_fetch->fname;?>">
                        </div>
                        <div class="col-md-12">
                            <label for="lnm" class="form-label">Lname</label>
                            <input type="text" class="form-control"name="ln" value="<?php echo $v_fetch->lname;?>">
                        </div>
                        <div class="col-md-12">
                            <label for="em" class="form-label">Email</label>
                            <input type="email" class="form-control" name="eml" value="<?php echo $v_fetch->email;?>">
                        </div>
                        <div class="col-md-12">
                            <label for="mo" class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mob" value="<?php echo $v_fetch->mobile_no;?>">
                        </div>
                        <div class="col-md-12">
                            <label for="pass" class="form-label">Password</label>
                            <input type="text" class="form-control" name="pass" value="<?php echo $v_fetch->password;?>">
                        </div>
                        <div class="col-12">
                            <label for="cpass" class="form-label">confirm-password</label>
                            <input type="text" class="form-control" name="c_pass" value="<?php echo $v_fetch->c_password;?>">
                        </div><br>
                        <!-- <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Update</button> -->
                        <!-- <p class="text-center mb-0">Already have an Account? <a href="">Sign In</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
</form>

</body>
</html>