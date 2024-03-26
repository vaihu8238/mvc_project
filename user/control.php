<?php

include "model.php";
class control extends model
{
    function __construct()
    {
        // error_reporting(0);
        model::__construct();
        session_start();
        $url = $_SERVER['PATH_INFO'];


        if(isset($_SESSION['uid']))
		{
            $uid=$_SESSION['uid'];
            $where = array(
                "uid"=>$uid
            );
            $cate_arr=$this->select_where_multidata('scart',$where);
                if(!empty($cate_arr))
                {
                    $total_cart=count($cate_arr);
                }
		}

        if(isset($_SESSION['uid']))
		{
            $uid=$_SESSION['uid'];
            $where = array(
                "uid"=>$uid
            );
            $cate=$this->select_where_multidata('pcart',$where);
                if(!empty($cate))
                {
                    $ptotal_cart=count($cate);
                }
		}
        // $cate_arr = $this->select('scategory');
        
        switch($url)
        {
            case "/index":
                if(isset($_REQUEST['sub']))
                    {                          
                        // this name like fname in breket is form input name proptys given name:
                        $fn = $_REQUEST['fn'];  
                        $ln =  $_REQUEST['ln'];
                        $em = $_REQUEST['eml'];
                        $phone =  $_REQUEST['mob'];
                        $pass =  $_REQUEST['pass'];
                        $cpass =  $_REQUEST['c_pass'];

                        $where = array(
                            "email"=>$em
                        );                  

                       $res = $this->select_where("users",$where);

                       $fetch =  $res->fetch_object();
                       $uemail= $fetch->email;

                        if($em==$uemail)
                        {                           
                           echo "<script>alert('already exits...!')</script>";//ankit@gmail.com                          
                        }

                        else
                        {                     
    
                           $data = array(
                            "fname"=>$fn,
                            "lname"=>$ln,
                            "email"=>$em,
                            "mobile_no"=>$phone,
                            "password"=>$pass,
                            "c_password"=>$cpass                
                            
                           );
    
                        //    if($fn!=="")
                        //    {
                            $ins =   $this->insert('users',$data);
                            // echo $ins;
                        //    }
                        }
                    }
                include "index.php";
                break;

            case "/home":
                    include "home.php";
                    break;
           

            case "/login":
                if(isset($_REQUEST['submit']))
                {                        
                    $em =  $_REQUEST['eml'];
                    $pass =  $_REQUEST['pass'];
                    $where = array(
                        "email"=>$em,
                        "password"=>$pass
                    );    
                                    
                   $res= $this->select_where("users",$where);

                   $fetch = $res->fetch_object();
                   $uemail= $fetch->email;
                   $upass= $fetch->password;
                   $uid= $fetch->u_id;
                   $name= $fetch->fname;
                   $lname= $fetch->lname;
                
                   
                //    if(isset($_REQUEST['remember']))
                //    {
                //     setcookie('eml','$em',time() + 10);
                //     setcookie('pass','$pass',time() + 10);
                //    }

                   $_SESSION['unm'] = $em;
                   $_SESSION['uid'] = $uid;
                   $_SESSION['name'] =$name;
                   $_SESSION['lname'] =$lname;
                  
                   if($uemail!==$em && $upass!==$pass)
                   {
                    echo "<script>alert('not match...!')</script>"; 
                   }
                   else
                   {
                    echo "<script>
                    alert('Welcome user.....!');
                    window.location='home';
                    
                    </script>";                   
                   }
                }
                include "login.php";
                break;

            case "/logout":
                    unset( $_SESSION['unm']);
                    // unset( $_SESSION['uid']);
                    // unset( $_SESSION['name'])
                    echo "<script>
                    alert('Logout success.....!');
                    window.location='login';
                    
                    </script>";
                    break;

            case "/forgot-pass":
                    if(isset($_REQUEST['submit']))
                    {
                        $em = $_REQUEST['eml'];
                        $pass =  $_REQUEST['pass'];
                        $cpass =  $_REQUEST['c_pass'];

                         // 'update users set password=123 where u_id=1'

                         $where = array(
                            "email"=>$em
                         );

                         $res = $this->select_where("users",$where);
                         $fetch = $res->fetch_object();

                         $uemail = $fetch->email;

                         if($uemail!=$em)
                         {
                          echo "<script>
                          alert('We dont have this record in our database.....!');
                          window.location='login';
                          
                          </script>";
                         }

                         else if($password!=$c_password)
                         {
                          echo "<script>
                          alert('Passwords do not match....!');
                          window.location='forgot-pass';
                          
                          </script>";
                         }

                         else
                         {
                          $data = array(
                            "password"=>$pass,
                    
                          );

                         $update =  $this->update("users",$data,$where);
                         if($update)
                         {
                          echo "<script>
                          alert('Password updated......!');
                          window.location='login';
                          
                          </script>";
                         }
                         }


                    }
                    include "forgot-pass.php";
                    break;


             
            case "/services":
                        $cate_arr = $this->select('scategory');
                       
                       include "services.php";
                       break;
       
            case "/subcategory":
                       if(isset($_REQUEST['btn_cate_id']))
                       {
                           $cate_id = $_REQUEST['btn_cate_id'];
                         
                           $where = array(
                               "c_id"=> $cate_id
                           );
       
                         $scate_arr = $this->select_where_multidata('ssubcategory',$where);
                       
                       }
                          
                       include "servicesubcategory.php";
                       break;
       
            case "/sproducts":
                       if(isset($_REQUEST['pscate_id']))
                       {
                           $subcate_id = $_REQUEST['pscate_id'];
                         
                           $where = array(
                               "ssc_id"=> $subcate_id
                           );
       
                           $prd_arr = $this->select_where_multidata('sproduct',$where);
       
                          
                       }
                       include "sproduct.php";
                       break;
       
            case "/singleproduct":
                    if(isset($_REQUEST['singleprd_id']))
                    {
                        $pid = $_REQUEST['singleprd_id'];
                        $where = array(
                            "sp_id"=>$pid
                        );
                        $prd_arr=$this->select_join_where_multidata('sproduct','ssubcategory','sproduct.ssc_id=ssubcategory.scate_id',$where);
                    }
                    include "ssinglepro.php";
                    break;

            case "/addcart":
                       if(isset($_SESSION['unm']))
                       {
                          if(isset($_REQUEST['btn_add_cart']))
                          {
                              $prdId = $_REQUEST['pro_id'];
                              $uId = $_SESSION['uid'];
                              $cate_id =  $_REQUEST['cate_id'];
                              $prd_qty = $_REQUEST['pro_qty'];//2
       
       
                               $where = array(
                                  'sprd_id'=>$prdId,
                                  'uid'=>$uId
       
                               );
       
                             $run = $this->select_where('scart',$where);
                             $fetch= $run->fetch_object();
                            //   $qty = $fetch->qty;
       
                             if(!empty($fetch))
                             {
                               $qty = $fetch->qty;
                               $main_qty = $prd_qty+$qty;//2+4
                               // $where = array(
                               //    'sprd_id'=>$prdId,
                               //    'uid'=>$uId
                                 
       
                               //  );
       
                               $data = array(
                               'qty'=>$main_qty
       
                               );
                                $up = $this->update('scart',$data,$where);
                                if($up)
                                   {
                                      echo "<script>
                                      
                                      alert('added to Cart...!');
                                      window.location ='sproducts?pscate_id=$cate_id  ';
                                      </script>";
                                   }
                             }
                             else 
                             {
       
                            //   if(isset($_REQUEST['sub']))
                            //   {
                                //  $cate_id =  $_REQUEST['cate_id'];
                               
                               
                                   $data = array (
                                       'qty'=> $prd_qty,
                                       'sprd_id'=>$prdId,
                                       'uid'=>$uId
                                   );
       
                                   $rus = $this->insert('scart',$data);
                                   
                                   if($rus)
                                   {
                                      echo "<script>
                                      
                                      alert('added to Cart...!');
                                      window.location ='sproducts?pscate_id=$cate_id ';
                                      </script>";
                                   }
                                 
                                // }
                                
                               }
       
                           }
                            
                        }
                       else 
                             
                       {
                           echo "<script> 
                           alert('Please login first...! ');
                           window.location='login';
                           </script>";
                                       
                       }
                  
                    include_once "sproduct.php";
                    break;

            case '/cart';
                    if(isset($_SESSION['uid']))
                    {
                        $uid=$_SESSION['uid'];
                        $where=array(
                            "uid"=>$uid
                        );
                        $user_cart=$this->select_join_where_multidata('scart','sproduct','scart.sprd_id=sproduct.sp_id',$where);
                    }
                    
                    
                    include_once('scart.php');
                    break;

            case '/deleteCart':
                if(isset($_REQUEST['delId']))
                {
                    $cart_id=$_REQUEST['delId'];
                    $where=array('scart_id'=>$cart_id);

                    $res=$this->delete_where('scart',$where);
                    if($res)
                    {
                        echo "<script>
                        alert('Remove Product');
                        window.location='services';
                        </script>";
                    }
                }
                break;
                
                

            // case "/appoint":
            //     if(isset($_SESSION['uid']))
            //     {
            //         $uid=$_SESSION['uid'];
            //         $where=array(
            //             "uid"=>$uid
            //         );
            //         $user_cart=$this->select_join_where_multidata('scart','sproduct','scart.sprd_id=sproduct.sp_id',$where);
            //     }
                
            //     include "appointment.php";
            //     break;

            case "/cateproduct":
                    $pcate_arr = $this->select('pcategory');
                       
                    include "productcate.php";
                    break;

            case "/subcateproduct":
                if(isset($_REQUEST['btn_pcate_id']))
                {
                        $psubcate_id = $_REQUEST['btn_pcate_id'];
                      
                        $where = array(
                            "pc_id"=> $psubcate_id
                        );
    
                      $psubcate_arr = $this->select_where_multidata('psubcategory',$where);
                    
                    
                }
                 include "productsubcate.php";
                 break;

            case "/psubproduct":
                if(isset($_REQUEST['pspro_id']))
                {
                    $ps_id=$_REQUEST['pspro_id'];

                    $where = array(
                        "ps_id"=> $ps_id
                    );

                    $pprd_arr = $this->select_where_multidata('psubproduct',$where);
                }
                include "psubproduct.php";
                break;

            case "/singlepro":
                if(isset($_REQUEST['singleprd_id']))
                    {
                        $pid = $_REQUEST['singleprd_id'];
                        $where = array(
                            "psp_id"=> $pid
                        );
                        $prds_arr=$this->select_join_where_multidata('psubproduct','psubcategory','psubproduct.ps_id=psubcategory.psub_id',$where);
                    }
                include "psingleproduct.php";
                break;

            case "/paddcart":
                if(isset($_SESSION['unm']))
                {
                   if(isset($_REQUEST['btn_padd_cart']))
                   {
                       $prdId = $_REQUEST['pro_id'];
                       $uId = $_SESSION['uid'];
                       $cate_id =  $_REQUEST['cate_id'];
                       $prd_qty = $_REQUEST['prd_qty'];//2


                        $where = array(
                           'prd_id'=>$prdId,
                           'uid'=>$uId

                        );

                      $run = $this->select_where('pcart',$where);
                      $fetch= $run->fetch_object();
                     //   $qty = $fetch->qty;

                      if(!empty($fetch))
                      {
                        $qty = $fetch->p_qty;
                        $main_qty = $prd_qty+$qty;//2+4
                        // $where = array(
                        //    'sprd_id'=>$prdId,
                        //    'uid'=>$uId
                          

                        //  );

                        $data = array(
                        'p_qty'=>$main_qty

                        );
                         $up = $this->update('pcart',$data,$where);
                         if($up)
                            {
                               echo "<script>
                               
                               alert('added to Cart...!');
                               window.location ='psubproduct?pspro_id=$cate_id  ';
                               </script>";
                    
                            }
                      }
                      else 
                      {

                     //   if(isset($_REQUEST['sub']))
                     //   {
                         //  $cate_id =  $_REQUEST['cate_id'];
                        
                        
                            $data = array (
                                'p_qty'=> $prd_qty,
                                'prd_id'=>$prdId,
                                'uid'=>$uId
                            );

                            $rus = $this->insert('pcart',$data);
                            
                            if($rus)
                            {
                               echo "<script>
                               
                               alert('added to Cart...!');
                               window.location ='psubproduct?pspro_id=$cate_id ';
                               </script>";
                               
                            }
                          
                         // }
                         
                        }

                    }
                     
                 }
                else 
                      
                {
                    echo "<script> 
                    alert('Please login first...! ');
                    window.location='login';
                    </script>";
                                
                }

                include_once "psubproduct.php";
                break;


            case '/pcart';
                if(isset($_SESSION['uid']))
                {
                    $uid=$_SESSION['uid'];
                    $where=array(
                        "uid"=>$uid
                    );
                    $u_cart=$this->select_join_where_multidata('pcart','psubproduct','pcart.prd_id=psubproduct.psp_id',$where);
                }
                
                
                include_once('pcart.php');
                break;

            case "/pcheckout":
                if(isset($_SESSION['uid']))
			    {
                    $uid=$_SESSION['uid'];
                    $where=array("uid"=>$uid);
                    $user_cart=$this->select_join_where_multidata('pcart','psubproduct','pcart.prd_id=psubproduct.psp_id',$where);
			    }

                include "pcheckout.php";
                break;

            case "/psuccess":   

                    echo "<script>
                    alert('Payment done..!');
                    window.location = 'empty_cart';
                    </script>";
                    include "psuccess.php";
                    break;

            case '/empty_cart':
                if(isset($_SESSION['uid']))
                {
                    $uid = $_SESSION['uid'];
                    $where = array(
                        "uid"=>$uid
                    );
                    $res = $this->delete_where('pcart',$where);
                    if($res)
                    {
                        $ptotal_cart = 0;
                        echo $ptotal_cart;
                    }
                }
                include "pemptycard.php";
                break;

            case '/payment':
                if(isset($_POST['name']) && isset($_POST['amount']) && isset($_POST['pay_id']) )
                {
                    $pay_id = $_POST['pay_id'];
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];

                    $data = array(
                        "name" => $name,
                        "amount" => $amount,
                        "pay_id" => $pay_id,
                        "pay_status" => "success"
                    );
                    $run = $this->insert('ppayment',$data);
                }
                break;

            case '/deletecart':
                    if(isset($_REQUEST['delId']))
                    {
                        $cart_id=$_REQUEST['delId'];
                        $where=array('pc_id'=>$cart_id);
    
                        $res=$this->delete_where('pcart',$where);
                        if($res)
                        {
                            echo "<script>
                            alert('Remove Product');
                            window.location='pcart';
                            </script>";
                        }
                    }
                    break;

        }
    }
}

$obj = new control;

?>