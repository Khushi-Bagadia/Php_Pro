<?php

include 'model.php';

class control extends model
{
    public function __construct()
    {
        // echo "Hello world";

        session_start();
        parent::__construct();
        // model::__construct();

        $url = $_SERVER['PATH_INFO'];

        switch($url)
        {
            case "/index":
                //    if($this->connection)
                //    {
                //     echo "Database Connected Successfully";
                //    }
                //    else{
                //     die("Database Not Connected");
                //    }
                
                include("index.php");
                break;

            case "/about":
                //  if($this->connection)
                // {
                //     echo "Database connected successfully";
                // }
                // else
                // {
                //     die("Database not connected");
                // }
                include("about.php");
                break;

            case "/shop":
                //  if($this->connection)
                // {
                //     echo "Database connected successfully";
                // }
                // else
                // {
                //     die("Database not connected");
                // }
                $category_arr = $this->select('categories');
                $subcategory_arr = $this->select('subcategories');
                $products_arr = $this->select('products');

                include("shop.php");
                break;

            case "/shop-subcategory":
                $category_arr =  $this->select('categories');
                $subcategory_arr =  $this->select('subcategories');
                $products_arr =  $this->select('products');

                // if(isset($_REQUEST['name']))
                //     {
                //         // echo $_REQUEST['name'];  
                //         // exit();

                //         $where = array('sid'=>2);
                //         $run = $this->select_where('products',$where);

                //         // $fetch = $run->fetch_object();

                //         // $pname = $fetch->name;
                //         // echo $pname;

                //         // exit();

                //         while($fetch = $run->fetch_object())
                //         {
                //             $pname = $fetch->name;
                //             echo $pname;
                //         }
                        
                //         exit();
                //     }


                if(isset($_REQUEST['id']))
                    {
                        // echo $_REQUEST['id']; //1 2 
                        $id = $_REQUEST['id']; //1 2 
                        // exit();

                        $where = array('sid'=>$id);
                        $run = $this->select_where('products',$where);

                        // $fetch = $run->fetch_object();

                        // $pname = $fetch->name;
                        // echo $pname;

                        // exit();

                        // while($fetch = $run->fetch_object())
                        // {
                        //     $pname = $fetch->name;
                        //     echo $pname;
                        // }
                        
                        // exit();
                    }

                include("shopSubcate.php");
                break;

            case "/shop-single":
                if(isset($_REQUEST['id']))
                    {
                        $id =  $_REQUEST['id'];//1 2
                        // echo $id;
                        // exit;

                        // $where = array("sid"=>$id);  // aa na aave
                        $where = array("id"=>$id);
                        $run = $this->select_where('products',$where);
                        $fetch = $run->fetch_object();
                          
                    }

                include("shop-single.php");
                break;

            case "/login":
                //  if($this->connection)
                // {
                //     echo "Database connected successfully";
                // }
                // else
                // {
                //     die("Database not connected");
                // }
                if(isset($_REQUEST['login']))
                {
                    $email = $_REQUEST['email'];    //form
                    $alag = $_REQUEST['password'];  //form

                    if(isset($_REQUEST['rem']))
                    {
                        setcookie("e",$email,time()+20);
                        setcookie("p",$alag,time()+20);
                    }

                    // $where = array('email' => $email, 'password' => $alag);   //OR
                    $where = ['email'=>$email,'password'=>$alag];
                    $run = $this->select_where('users',$where);

                    $fetch = $run->fetch_object();
                    // echo $fetch->name;
                    // echo $fetch->id;
                    // echo $fetch->email;
                    // echo $fetch->password;
                    $uname = $fetch->name;
                    $uid = $fetch->id;
                    $dbemail = $fetch->email;
                    $dbpwd = $fetch->password;
            
                    $_SESSION['em'] = $uid;
                    $_SESSION['nm'] = $uname; 

                    // exit();

                    if($dbemail === $email && $dbpwd === $alag)
                    {
                        echo "<script>
                            alert('Login Successful');
                            location.href='index';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                            alert('Invalid Credentials');
                            location.href='login';
                        </script>";
                    }

                }

                include("login.php");
                break;

            case "/logout":
                // echo "logout";

                // unset($_SESSION['em']);
                // unset($_SESSION['nm']);
                session_destroy();

                echo "<script>
                    alert('Logout Successful');
                    location.href = 'login';
                </script>";
                break;


            case "/register":
                if(isset($_REQUEST['register']))
                {
                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $password = $_REQUEST['password'];

                    $data = ['name'=>$name ,'email'=>$email,'password'=>$password];
                    $insert = $this->insert('users',$data);

                    if($insert)
                    {
                         //header("location:login");
                        echo "<script>
                            alert('Registration Successful'); 
                            location.href='login';
                        </script>";
                    }
                    else
                    {
                        echo "<script>
                            alert('Registration Failed. Please try again.'); 
                            location.href='register';
                        </script>";
                    }
                }

                include("register.php");
                break;

            case "/contact":
                // if($this->connection)
                // {
                //     echo "Database connected successfully";
                // }
                // else
                // {
                //     die("Database not connected");
                // }
                include("contact.php");
                break;

            case "/cart":
                // if(isset($_REQUEST['addtocart']))     //OR  if(isset($_POST['addtocart']))
                //     {
                //         $pid = $_REQUEST['pid'];  //pid
                //         $qty = $_REQUEST['qty'];  //pqty //3 
                //         $uid = $_SESSION['em'];  //uid

                //         $where = ['uid'=> $uid, 'pid' => $pid];
                //         $run = $this->select_where('cart',$where);
                //         $fetch = $run->fetch_object();
                //         $dbQty = $fetch->qty;
                        
                //         if($dbQty <= 0)
                //             {
                //                 $data = ['uid'=> $uid, 'pid'=> $id, 'qty'=> $qty];

                //                 $this->insert('cart',$data);
                //             }

                //         else
                //             {
                //                 $data = ['qty'=> $dbQty + $qty];

                //                 $this->update('cart',$data, $where);
                //             }

                //     }

                //     else
                //         {
                //             echo "<script>
                //             alert('Please Login first'); 
                //             window.location.href='login'; 
                //             </script>";
                //         }

                if(isset($_SESSION['em']))
                {    
                    if(isset($_REQUEST['addtocart']))     //OR  if(isset($_POST['addtocart']))
                    {

                        $pid = $_REQUEST['pid'];  //pid  //2 
                        $qty = $_REQUEST['qty'];  //qty //2
                        $uid = $_SESSION['em'];  //uid  //hk 5

                        $where = array('pid'=>$pid, 'uid'=>$uid);
                        $run = $this->select_where('cart',$where);

                        //select * from cart where pid=2 and uid=5
                        $fetch = $run->fetch_object();

                        $dbQty = $fetch->qty;  //0

                        if ($dbQty <= 0)  //1>=2
                            {
                                 // echo "<script> alert('$pid') </script>";

                                $data = ['pid'=>$pid, 'uid'=> $uid, 'qty'=>$qty];

                                //insert into cart(pid,uid,qty) values(2,5,2)
                                $insert = $this->insert('cart',$data);

                                if($insert)
                                {
                                    echo "<script> alert('Added to cart') </script>";
                                }
                               
                            }  

                        else
                            {
                                
                                // echo "<script> alert('$pid') </script>";

                                $qty = $_POST['qty']; 

                                $dbQty = $fetch->qty; //2

                                $totalQty = $qty + $dbQty; //3+2
                                $data = ['qty' => $totalQty];
                                $update = $this->update('cart',$data,$where);

                                if ($update)
                                {
                                    echo "<script> alert('Cart Updated') </script>";
                                }

                        
                            }    

                    }
                }

                else
                {
                    echo "<script>
                    alert('Please Login first'); 
                    window.location.href='login'; 
                    </script>";
                }

                $cart_prd_arr = $this->select_join2('cart','products','cart.pid = products.id');

                include("cart.php");
                break;

            default:
                include("404.php");

        }
    }
}

$obj = new control();

?>

