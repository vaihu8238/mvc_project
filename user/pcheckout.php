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


<?php 

foreach($user_cart as $u)
{

    $price = $u->price;
    $qty = $u->p_qty;
    $subtotal = $price*$qty . " INR";
    $arr[] = $subtotal;


}



?>





<div class="bg-secondary m-5">
<div class="container p-5">

<div class="row justify-content-center text-center">
    <div class="col-6">
    <form action="addcart?btn_add_cart" method="post">
  <div class="card ">
    <img class="card-img-top" src="../bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body p-5">
    Name : <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']." ".$_SESSION['lname'];?>" readonly/> <br>
    Amount: <input type="text" name="amount" id="amount" value="<?php   print_r(array_sum($arr));?>" readonly><br>
      <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
      <!-- <button class="btn btn-primary" id="rzp-button1">Pay</button> -->
      <input type="button" name="button" value="Pay Now"  class="btn btn-primary" onclick="MakePayment()"/>
    </div>
  </div>
</form>


<!-- <button class="btn btn-primary" id="rzp-button1">Pay</button> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

function MakePayment()
{
   var name =  $('#name').val();
   var amount = $('#amount').val();

   var options = {
    "key": "rzp_test_6mUt103oWz8SXI", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)
        $.ajax({
         type:"post",
         url:"payment",
         data:"pay_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
         success:function(result){
            window.location.href = "psuccess"
         }
        })
        console.log(response.razorpay_payment_id)
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com", 
        "contact": "9000090000"  //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
    rzp1.open();
   //  e.preventDefault();

}
</script>



    </div>
</div>
</div>
</div>


<?php include 'footer.php';?>
</body>
</html>