<?php

include "model.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


ob_start();
require 'vendor/autoload.php';

class control extends model
{
    function __construct()
    {
        // error_reporting(0);
        model::__construct();
        session_start();
        $url = $_SERVER['PATH_INFO'];
        switch($url)
        {
            case "/index":
                if(isset($_REQUEST['submit']))
                {                        
                    $em =  $_REQUEST['eml'];
                    $pass =  $_REQUEST['pass'];
                    $where = array(
                        "email"=>$em,
                        "password"=>$pass
                    ); 
                    $res= $this->select_where("admin_login",$where);

                    $fetch = $res->fetch_object();
                    $uemail= $fetch->email;
                    $upass= $fetch->password;

                    $_SESSION['unm'] = $em;
                  
                    if($uemail!==$em && $upass!==$pass)
                       {
                        echo "<script>alert('not match...!')</script>"; 
                       }
                       else
                       {
                        echo "<script>
                        alert('Welcome admin.....!');
                        window.location='home';
                        
                        </script>";                   
                       }
                    // else
                    // {
                    //  echo "<script>
                    //  alert('Welcome admin.....!');
                    //  window.location='home';
                     
                    //  </script>";                   
                    // }
                }
                include "index.php";
                break;

        
            case "/forgotpass":
                if(isset($_REQUEST['submit']))
                {
                 //Load Composer's autoloader
                    
                    $mail = new PHPMailer(true);
                    $OTP = rand(1000,9999);
                    // if (isset($_POST['sendmail'])) {
                        $mail->isSMTP();                            // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                     // Enable SMTP authentication
                        $mail->Username   = 'vaibhu584@gmail.com';                     //SMTP username
                        $mail->Password   = 'cmio ftbo vlpq fzys';  // your password 2step varified 
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                
                        $mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
                        $mail->setFrom('vaibhu584@gmail.com', 'Name');
                        $mail->addAddress($_REQUEST['email']);   // Add a recipient
                        $mail->isHTML(true);  // Set email format to HTML
                        
                        $bodyContent = "<h1>HeY!,</h1>: OTP : $OTP";
                    // 
                    
                        $mail->Body    = $bodyContent."<br>";
                        $mail->Subject = 'Email from Localhost by tops';
                        if(!$mail->send()) {
                          echo 'Message was not sent.';
                          echo 'Mailer error: ' . $mail->ErrorInfo;
                        } else {
                          echo 'Message has been sent.';
                        }

                        $_SESSION['OTP'] = $OTP;
                        header('location:otp');
                       
                    // }
                }
                include "forgotpass.php";
                break;

            case "/logout":
                    unset( $_SESSION['unm']);
                    break;

            case "/otp":

                    if(isset($_REQUEST['submit']))
                    {
                        if ($_SESSION['OTP'] == $_REQUEST['otp'])
                         {
                                    echo "verified";
                                    unset( $_SESSION['OTP']);
                        } 
                        else {
                            echo "kon h tu";
                        }
                    }
                    include "otp.php";
                    break;
                
                
            case "/home":
                include "home.php";
                break;

            case "/signup":
                if(isset($_REQUEST['submit']))
                {
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


                   
                        $ins =  $this->insert('users',$data);
                        if($ins)
                        {
                            echo "<script>alert('NEW USER REGISTED SUCSSESFULLY...!')
                            window.location='users';
                            </script>";
                            
                        }
                    }

                }
                include "signup.php";
                break;

            case "/users":
                $user_arr = $this->select("users");
                include "user.php";
                break;

            case "/edit-users":
                if($_REQUEST['update_id'])
                {
                    $id = $_REQUEST['update_id'];

                    $where = array(
                     "u_id"=>$id
                    );
 
                    $run =  $this->select_where("users",$where);

                    $fet = $run->fetch_object();

                  if(isset($_REQUEST['submit']))
                  {
                    $fn = $_REQUEST['fn'];  
                    $ln =  $_REQUEST['ln'];
                    $em = $_REQUEST['eml'];
                    $phone =  $_REQUEST['mob'];
                    $pass =  $_REQUEST['pass'];
                    $cpass =  $_REQUEST['c_pass'];

                    $data = array(
                        "fname"=>$fn,
                        "lname"=>$ln,
                        "email"=>$em,
                        "mobile_no"=>$phone,
                        "password"=>$pass,
                        "c_password"=>$cpass                
                    );
                    $res =  $this->update("users",$data,$where);
                    if($res)
                    {
                     echo "
                     
                     <script>
                     alert('data updated...!');
                     window.location='home';
                     </script>
                     ";
                    }

                   }
                }
                include "edit.php";
                break;
            
            case "/delete-users":
                if($_REQUEST['del_id'])
                {
                    $id=$_REQUEST['del_id'];

                    $where = array(
                        "u_id"=>$id
                    );

                    $res = $this->delete_where("users",$where);

                    if($res)
                    {
                        echo " <script>

                        alert('Deleted...!');
                        window.location = 'users';
                        
                        </script>";
                    }
                }
                break;
            
            case "/view-users":
                if($_REQUEST['v_id'])
                {
                    $id = $_REQUEST['v_id'];

                    $where = array(
                        "u_id"=>$id
                    );

                    $run = $this->view("users",$where);

                    $v_fetch = $run->fetch_object();
                }
                include "view.php";
                break;

            case "/staff":
                if(isset($_REQUEST['submit']))
                {
                    $fn = $_REQUEST['fn'];  
                    $ln =  $_REQUEST['ln'];
                    $em = $_REQUEST['eml'];
                    $phone =  $_REQUEST['mob'];
                    $special =  $_REQUEST['spe'];
                    $work =  $_REQUEST['work'];

                    $where = array(
                        "email"=>$em
                    );                  

                    $res = $this->select_where("staff",$where);

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
                        "specialization"=>$special,
                        "work_type"=>$work                
                        
                       );

                   
                        $ins = $this->insert_where('staff',$data);
                        if($ins)
                        {
                            echo "<script>alert('NEW STAFF MEMBER REGISTED SUCSSESFULLY...!')
                            window.location='staffview';
                            </script>";
                            
                        }
                    }
                }

                include "staff.php";
                break;

            case "/staffview":
                $staff_arr = $this->select("staff");
                include "staffview.php";
                break;


            case "/edit-staff":
                    if($_REQUEST['update_id'])
                    {
                        $id = $_REQUEST['update_id'];
    
                        $where = array(
                         "s_id"=>$id
                        );
     
                        $run =  $this->staffselect_where("staff",$where);
    
                        $fetc = $run->fetch_object();
    
                      if(isset($_REQUEST['submit']))
                      {
                        $fn = $_REQUEST['fn'];  
                        $ln =  $_REQUEST['ln'];
                        $em = $_REQUEST['eml'];
                        $phone =  $_REQUEST['mob'];
                        $special =  $_REQUEST['spe'];
                        $work =  $_REQUEST['work'];
    
                        $data = array(
                            "fname"=>$fn,
                            "lname"=>$ln,
                            "email"=>$em,
                            "mobile_no"=>$phone,
                            "specialization"=>$special,
                            "work_type"=>$work                
                        );
                        $res =  $this->update("staff",$data,$where);
                        if($res)
                        {
                         echo "
                         
                         <script>
                         alert('data updated...!');
                         window.location='staffview';
                         </script>
                         ";
                        }
    
                       }
                    }
                    include "staffedit.php";
                    break;
            
            case "/delete-staff":
                        if($_REQUEST['del_id'])
                        {
                            $id=$_REQUEST['del_id'];
        
                            $where = array(
                                "s_id"=>$id
                            );
        
                            $res = $this->staffdelete_where("staff",$where);
        
                            if($res)
                            {
                                echo " <script>
        
                                alert('Deleted...!');
                                window.location = 'staffview';
                                
                                </script>";
                            }
                        }
                        break;

            case "/scategory":
                        $cate_arr = $this->cateview("scategory");
                        $subcate_arr = $this->cateview("ssubcategory");
                        if(isset($_REQUEST['submit']))
                        {
                            $scname = $_REQUEST['scn']; 

                            $data = array(
                                "cate_name"=>$scname
                            );
                            
                            
                            $ins = $this->insert_cate('scategory',$data);
                            if($ins)
                            {
                                echo "<script>alert('NEW SERVICE ADDDED SUCSSESFULLY...!')
                                window.location='scategory';
                                </script>";
                                
                            }
                           

                        }
                        include "scategory.php";
                        break;


            case "/edit-cate":
                        if($_REQUEST['update_id'])
                        {
                            $id = $_REQUEST['update_id'];
        
                            $where = array(
                             "cate_id"=>$id
                            );

                            $r = $this->cateselect_where("scategory",$where);

                            $fe = $r->fetch_object();

                            if(isset($_REQUEST['submit']))
                              {
                                 $scname = $_REQUEST['scn']; 

                                 $data = array(
                                      "cate_name"=>$scname
                                    );

                                    $res =  $this->update("scategory",$data,$where);
                                    if($res)
                                    {
                                     echo "
                                     
                                     <script>
                                     alert('data updated...!');
                                     window.location='scategory';
                                     </script>
                                     ";
                                    }
                              }
                        }
                        include "scateedit.php";
                        break;


            case "/delete-cate":
                        if($_REQUEST['del_id'])
                        {
                            $id=$_REQUEST['del_id'];
            
                            $where = array(
                                "cate_id"=>$id
                            );
            
                            $res = $this->catedelete_where("scategory",$where);
            
                            if($res)
                            {
                                echo " <script>
            
                                alert('Deleted...!');
                                window.location = 'scategory';
                                    
                                </script>";
                            }
                        }
                            break;

            case "/delete-subcate":
                            if($_REQUEST['del_id'])
                            {
                                $id=$_REQUEST['del_id'];
                    
                                $where = array(
                                    "scate_id"=>$id
                                );
                    
                                $res = $this->catedelete_where("ssubcategory",$where);
                    
                                if($res)
                                {
                                    echo " <script>
                    
                                    alert('Deleted...!');
                                    window.location = 'scategory';
                                            
                                    </script>";
                                }
                            }
                            break;

            case "/shopproduct":
                $pcate_arr = $this->cateview("pcategory");
                if(isset($_REQUEST['submit']))
                        {
                            $pcname = $_REQUEST['scn'];

                            $file = $_FILES["file"]["name"];
                            $temp_file = $_FILES["file"]["tmp_name"];
                            $location = "productimages/".$file;
                            move_uploaded_file($temp_file,$location); 

                            $data = array(
                                "pcate_name"=>$pcname,
                                "image" => $file
                            );
                            
                            
                            $ins = $this->insert_cate('pcategory',$data);
                            if($ins)
                            {
                                echo "<script>alert('NEW SERVICE ADDDED SUCSSESFULLY...!')
                                window.location='shopproduct';
                                </script>";
                                
                            }
                           

                        }
                include "shpingproduct.php";
                break;


                case "/edit-pcate":
                    if($_REQUEST['update_id'])
                    {
                        $id = $_REQUEST['update_id'];

                        $where = array(
                            "pcate_id"=>$id
                        ); 

                        $run = $this->select_where("pcategory",$where);

                        $fetch = $run->fetch_object();

                        if(isset($_REQUEST['submit']))
                        {
                            $pname = $_REQUEST['scn'];

                            $file = $_FILES["file"]["name"];
                            $temp_file = $_FILES["file"]["tmp_name"];
                            $path = "productimages/".$file;
                            move_uploaded_file($temp_file,$path);

                            if($_FILES['file']['size'] > 0)
                            {
                                $data = array(
                                    "pcate_name"=>$pname,
                                    "image"=>$file
                                );
                            }
                            else
                            {
                                $data = array(
                                    "pcate_name"=>$pname
                                );
                           }
                        $res = $this->update("pcategory",$data,$where);
                        if($res)
                        {
                            echo "
                      
                            <script>
                            alert('data updated...!');
                            window.location='shopproduct';
                            </script>
                            ";
                        }
                        }
                    }
                    include "editproduct.php";
                    break;


                case "/delete-pcate":
                    if($_REQUEST['del_id'])
                    {
                        $id=$_REQUEST['del_id'];

                        $where = array(
                            "pcate_id"=>$id
                        );
                        $re =$this->delete_where("pcategory",$where);
                        if($re)
                        {

                            echo " <script>

                            alert('Deleted...!');
                            window.location = 'shopproduct';
                            
                            </script>";
                        }
                    }
                    break;
        }
    }
}

$obj = new control;



?>