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
                        <li><a href="cart"><i class="fa fa-shopping-bag"></i>
                        <b>
                        <?php
                           if(isset($_SESSION['uid']))
                           {
                              if(empty($ptotal_cart))
                              {
                                 echo "0";

                              }
                              else
                              {
                                 echo $ptotal_cart;	
                              }
                           }
							   ?>
                     </b>
                           </a>
                      </li>
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



 <div id="service"  class="service">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2> <img src="images/head.png" alt="#"/>PRODUCTS</h2>
                  </div>
               </div>
            </div>

<form action="paddcart?btn_padd_cart" method="post">
<div class="row">
            <?php
            if(!empty($prds_arr))
            {
               foreach($prds_arr as $prd)
               {
            ?>
   <div class="col-md-6 p-4">
      <div id="hover_chang" class="service_box">
         <div class="card-group">
            <div class="card">
               <!-- <img src="images/tes.png" height="100" width="100" alt="#"/> -->
                  <div class="card-body">
                     <input type="hidden" name="cate_id" value="<?php echo $prd->psub_id;?>">
					      <input type="hidden" name="pro_id" value="<?php echo $prd->psp_id;?>">
                        <h4><b>price :<?php  echo $prd->price; ?> </b></h4>
                        <h3 class="btn btn-danger"><?php  echo $prd->pspro_name; ?></h3><br><br>
                        Qty : <input type="number" name="prd_qty" min="1" max="5" value="1">
                        <input type="submit" class="btn btn-primary" value="Add to Cart">
                  <div>
                     <h4><b>Plese note : <?php  echo $prd->discription; ?></b></h4>
                  </div>
                 </div>
            </div>
         </div>
      </div>
   </div>
</form>
   <?php }  } ?>

</div>


</div>
</div> 

 
    <div id="about"  class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-9">
                  <div class="titlepage">
                  <a href="appointment.php"><h2> <img src="images/head.h.png" alt="#"/> About Our shree</h2>
               <p>shree is opened in 2014 its very profetional beauty care and <br>
                  that have very happy customers if you interested <br>
                  than come to our shop and feel the smale of beauty <br>
                  "Get Your Glow On"<br>
                  "Dare to Be Bold"<br>
                  "Express Yourself Fearlessly"<br>
                  "Create Your Own Beauty Story"<br>
                  "Love the Skin You're In"<br>
                  "Playful Beauty, Serious Results"<br>
                  "Sparkle and Shine"<br>
                  "Embrace Your Inner Diva"<br>
                  "Beauty is Power"<br>
                  "Glow with Confidence"<br>
                  "Unlock Your Inner Beauty" <br>
               </p>
                     
                  </div></a>
               </div>
            </div>
         </div>
      </div>

      <?php include "footer.php";?>
</body>
</html>