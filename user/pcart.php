<!DOCTYPE html>
<html lang="en">
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
      <!-- <link rel="stylesheet" href="js/custom.js"> -->
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- [if lt IE 9]> -->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <!-- <![endif] -->
   </head>
<body>
 
<header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="home"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About us</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact Us</a>
                              </li>
                              <!-- <li class="nav-item">
                                 <a class="nav-link" href="subcategory">SubServices</a>
                              </li> -->
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <!-- <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="services"><img src="images/lo.png" alt="#" /><i><h1>shree</h1></i></a>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                     <ul class="email">
                        <li><a href="#">Call: (+91-1234567894)</a></li>
                        <li><a href="mailto:recipientvaibhavibihola@gmail.com">Email:  shree@gmail.com</a></li>
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
                  <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  -->
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
         </div>
</header><br><br>
        
<div class= "container-fluid rounded align-items-center justify-content-between">
                        <div class=" p-4 ">
                            <h6 class="mb-4"></h6>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       <?php
                                          
                                          if(!empty($u_cart))
                                          {
                                             foreach($u_cart as $u)
                                             {
                                       ?>
                                          <tr>
                                                <td>image</td>
                                                <td><?php echo $u->pspro_name; ?></td>
                                                <td><?php echo $u->price; ?></td>

                                                <td class="cart-product-quantity" width="130px">
                                                   <div class="input-group quantity">
                                                         <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                                                            <span class="input-group-text">-</span>
                                                         </div>
                                                         <input type="text" class="qty-input form-control" maxlength="2" max="10" value="<?php echo $u->p_qty?>">
                                                         <div class="input-group-append increment-btn" style="cursor: pointer">
                                                            <span class="input-group-text">+</span>
                                                         </div>
                                                   </div>
                                                </td>

                                                <td>
                                                   
                                                   <a href="deletecart?delId=<?php echo $u->pc_id?>">
                                                   <i class="fa fa-trash fa-2x btn btn-danger"></i>
                                                   </a>
                                                </td> 

                                                <td>
                                                <?php
                                                   $price = $u->price;
                                                   $qty = $u->p_qty;
                                                   echo  $subtotal = $price*$qty . " INR";
                                                   $arr[] = $subtotal;
                                                ?>
                                             </td>&nbsp;
                                          </tr>
                                          <?php } } ?>
                                        
                                          <tr>
                                             <td>
                                                <b>
                                                <?php echo "Total : INR ";
                                                      $arr[] = 0;
                                                      print_r(array_sum($arr));?>
                                                </b>
                                             </td>
                                          </tr>

                                          <tr>
                                             <td>
                                                <a href="pcheckout" class="btn btn-primary">Check-out</a>
                                                <a href="cateproduct" class="btn btn-primary">Back</a>
                                             </td>
                                          </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

 <?php include "footer.php";?>
        
 

</body>
</html>