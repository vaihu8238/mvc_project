<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>users</title>
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
<div class="container-fluid position-relative d-flex p-0">

<?php include "sidebar.php";?>

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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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
            </nav><br><br><br>
            <!-- Navbar End -->
        
<div class= "container-fluid  col-sm-12 col-md-12 rounded align-items-center justify-content-between">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Color Table</h6>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile_no</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">C_password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>

                                <?php
                                    if(!empty($user_arr))
                                    {
                                        foreach($user_arr as $user)
                                        {
                                            // echo $user->fname;
                                ?>
                                
                                    <td><?php echo $user->u_id?></td>
                                    <td><?php echo $user->fname?></td>
                                    <td><?php echo $user->lname?></td>
                                    <td><?php echo $user->email?></td>
                                    <td><?php echo $user->mobile_no?></td>
                                    <td><?php echo $user->password?></td>
                                    <td><?php echo $user->c_password?></td>
                                   
    
                                    <td>
                                        <a  href="/project/admin/edit-users?update_id=<?php echo $user->u_id; ?>">
                                        <i class="fa fa-pen fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    
                                    
                                        <a  href="/project/admin/delete-users?del_id=<?php echo $user->u_id; ?>">
                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                        </a>&nbsp;
                                    

                                    
                                        <a  href="/project/admin/view-users?v_id=<?php echo $user->u_id; ?>">
                                        <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </td>
                             </tr>
                             <?php } }?>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
 <?php include "footer.php";?>
                
</body>
</html>