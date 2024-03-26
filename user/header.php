<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shree</title>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SHREE</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--  [if lt IE 9]> -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <!-- <![endif] -->
   <!-- </head>  -->
</head>
<body>
   

<header>
         <!-- header inner -->
         <div class="header">
            <div class="container ">
               <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-10 col-sm-10  width: 100%">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                <img src="images/lo.png" alt="">
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="home"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#service">Service</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#customer">Work</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="cateproduct">Shopping</a>
                               </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
                  

                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 ">
                     <ul class="email">
                        <li><a href="#contact">Call :(+91-1234567894)</a></li>
                        <li><a href="mailto:recipientvaibhavibihola@gmail.com">Email :shree@gmail.com</a></li>
                        <li><a href="cart"><i class="fa fa-shopping-bag"></i>
                        <?php
                        if(isset($_SESSION['uid']))
                        {?>

                           <b><?php echo $total_cart ?></b>
                           
                        <?php  } ?>
                      </a></li>
                     </ul>
                  </div>
                  <div>
                        <?php
                           if(!isset($_SESSION['unm']))
                           { ?>

                       <button class="btn btn-danger"><a href="login">Login</a></button>
                       <?php } else { ?>

                        <button class="btn btn-danger"><a href="logout">Logout</a></button>
                        
                        <?php }?>
                        <button class="btn btn-danger"><a href="index">Register</a></button>
                  </div>
            </div>
         </div>
      </header>
   </body>
</html>