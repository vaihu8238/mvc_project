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
      <!--[if lt IE 9]>-->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><!--<![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   </head>
<body  style="background-image: url('images/bg.jpg'); background-repeat: no-repeat;">
<?php 


foreach($user_cart as $u)
{

   $price = $u->sp_price;
   $qty = $u->qty;
   $subtotal = $price*$qty . " INR";
   $arr[] = $subtotal;
}

?>
<header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                                 <img src="images/head.png" height="50" width="50">
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="index"> SHREE BEAUTY-CARE  </a>
                              </li>
                              <!-- <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li> -->
                              <!-- <li class="nav-item">
                                 <a class="nav-link" href="#service">Service</a>
                              </li> -->
                              <!-- <li class="nav-item">
                                 <a class="nav-link" href="#customer">Staff-person</a>
                              </li> -->
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <!-- <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="home"><img src="images/logo1.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 ">
                     <ul class="email">
                        <li><a href="#">Call: (+91-1234567894)</a></li>
                        <li><a href="mailto:recipientvaibhavibihola@gmail.com">Email:  shree@gmail.com</a></li>
                        <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li> -->
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header><br><br><br><br><br>
      
<section class="container w-25 my-2 bg-dark  text-light p-2 rounded" style="background-image: url('images/contact.jpg'); ">

<form class="row g-3 p-3" method="POST"  enctype="multipart/form-data">
<h2>Book Now !!</h2>
    <!-- <div class="col-md-12">
        <label for="work" class="form-label">WORK :</label>
        <input type="text" readonly class="form-control" name="wo" id="work" value="<?php echo $u->sp_name; ?>">   
    </div><br><br><br> -->
    <div class="col-md-12">  
        <label for="pay" class="form-label">PAYMENT :</label>
        <input type="text" readonly class="form-control" name="py" id="pay" value="<?php print_r(array_sum($arr)); echo " /-INR";?>"> 
    </div><br><br><br>
    <div class="col-md-12">
         <label for="date" class="form-label">SELECT DATE :</label>
         <input type="DATE" class="form-control" name="inputdate" id="inputdate">
    </div><br><br><br>
    <div class="col-md-12">
         <label for="time" class="form-label">SELECT TIME :</label>
         <input type="time" class="form-control" name="time" id="time">
    </div><br><br><br><br>
    <div class="col-md-12">
    <label for="msg" class="form-label">WORK RELATE MASSGE :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div><br><br><br><br><br><br><br>



<center>
  <div class="col-6 align-center" >
   <button type="submit" name="submit" class="btn btn-secondary">LOGIN</button><br>
  </div>
</center>

</form>
</section><br>

<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#inputdate').attr('min', maxDate);
});
</script>

<?php  include "footer.php";?>
</body>
</html>