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
 

      <?php include "sidebar.php"; ?>
      
   <div class="content">
   <!-- Navbar Start -->
   <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="home" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-user me-2 fa-2x d-none d-lg-inline-flex"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <button  class="dropdown-item"><a href="#">My Profile</a></button>  
                            
                            <?php
                            if(!isset($_SESSION['unm']))
                            {
                            ?>
                            <button  class="dropdown-item"><a href="login">Login</a></button>
                           <?php }
                           else{ ?>

                           <button class="dropdown-item"><a href="index">Log Out</a></button>

                           <?php } ?>
                           
                        </div>
                    </div>
                </div>
            </nav><br><br>
   

   <form action="" method="post">
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 50vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="scategory" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SHREE</h3>
                            </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <h3>ADD NEW SERVICE</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="scn" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">SERVICE NAME :</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">ADD</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    <div class= "container-fluid  col-sm-6 col-md-6 rounded align-items-center justify-content-between">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Color Table</h6>
                            <table class="table table-dark"> 
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                            <tr>

                                <?php
                                    if(!empty($cate_arr))
                                    {
                                        foreach($cate_arr as $cate)
                                        {
                                            // echo $user->fname;
                                ?>

                                    <td><?php echo $cate->cate_id?></td>
                                    <td><?php echo $cate->cate_name?></td>

                                    <td>
                                        <a  href="/project/admin/edit-cate?update_id=<?php echo $cate->cate_id; ?>">
                                        <i class="fa fa-pen fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    
                                    
                                        <a  href="/project/admin/delete-cate?del_id=<?php echo $cate->cate_id; ?>">
                                        <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                
                                    </td>

                            </tr>
                                <?php } }?>
                                  
                             </tbody>
                            </table>
                       </div>
                    </div>
                </div>
</form>

<section class="container bg-dark  text-light ">
<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid position-relativep-0">
    
        <!-- Sign In Start -->
        <!-- <div class="container-fluid"> -->
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 70vh; margin-left: 15%; ">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 ">
                    <div class="bg-secondary rounded p-6 p-sm-5 my-4 mx-6">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="scategory" class="">
                                
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SHREE</h3>
                            </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <h3>ADD NEW SERVICE</h3>
                        </div>
                        <div class="mb-2">

                                <label for="scate"><strong> SERVICE NAME: </strong><span class="text-danger"></span></label>
                                <select class="form-select" id="scate-dropdown">
                                <option value="">Select</option>
                            
                                </select>
                        </div>

                        <!-- <div class=" mb-2">
                            
                            <input type="file" class="form-control" name="file" id="floatingInput">
                            <label for="floatingInput"></label>
                    
                        </div> -->

                        <div class="form-floating mb-2">

                                <input type="text" class="form-control" name="scn" id="floatingInput">
                                <label for="floatingInput">SERVICE NAME :</label>
                        
                        </div>
                        <button type="submit" name="sub" class="btn btn-primary py-3 w-100 mb-4">ADD</button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- Sign In End -->
</div>
                          <!-- Navbar End --> 
                          
<div class= "container-fluid  col-sm-6 col-md-6 rounded align-items-center justify-content-between "  style="margin-right: 15%;">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Color Table</h6>
                            <table class="table table-dark"> 
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">cate_id</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                            <tr>

                            <?php
                                    if(!empty($subcate_arr))
                                    {
                                        foreach($subcate_arr as $scate)
                                        {
                                            // echo $user->fname;
                                ?>

                                    <td><?php echo $scate->scate_id?></td>
                                    <td><?php echo $scate->subcate_name?></td>
                                    <td><?php echo $scate->c_id?></td>

                                    <td>
                                        <a  href="/project/admin/edit-subcate?update_id=<?php echo $scate->scate_id; ?>">
                                        <i class="fa fa-pen fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    
                                    
                                        <a  href="/project/admin/delete-subcate?del_id=<?php echo $scate->scate_id; ?>">
                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                
                                    </td>

                            </tr>
                             
                            <?php } }?>
                                  
                             </tbody>
                            </table>
                       </div>
</div>

</form>
</section>

<section class="container bg-dark  text-light ">
 <form action="" method="post" enctype="multipart/form-data">
 <div class="container-fluid position-relativep-0">
    
        <!-- Sign In Start -->
        <!-- <div class="container-fluid"> -->
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 70vh; margin-left: 15%; ">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 ">
                    <div class="bg-secondary rounded p-6 p-sm-5 my-4 mx-6">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="scategory" class="">
                                
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>SHREE</h3>
                            </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <h3>ADD NEW SERVICE</h3>
                        </div>
                        <div class="mb-2">

                                <label for="subcate"><strong>SUB SERVICE NAME: </strong><span class="text-danger"></span></label>
                                <select class="form-select" id="subcate-dropdown">
                                <option value="">Select</option>
                            
                                </select>
                        </div>

                        <div class=" mb-2">
                            
                            <input type="file" class="form-control" name="file" id="floatingInput">
                            <label for="floatingInput"></label>
                    
                        </div>

                        <div class="form-floating mb-2">

                                <input type="text" class="form-control" name="scn" id="floatingInput">
                                <label for="floatingInput">SERVICE NAME :</label>
                        
                        </div>
                        <button type="submit" name="sub" class="btn btn-primary py-3 w-100 mb-4">ADD</button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- Sign In End -->
</div>
</form>
</section>

<?php include "footer.php";?>
                
</body>
</html>