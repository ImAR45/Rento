
<?php include ( "./connection.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['EMAIL'])) {
    header("location: login.php");
    $user = "";
} else {
    $user = $_SESSION['EMAIL'];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE pemail='$user'");
    $get_user_email = mysqli_fetch_assoc($result);
    $uname_db = $get_user_email['pname'];
}

$search_value = "";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>List Your Property</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style3.css">
    </head>
    <style>
        .chip {
            float:right;
            display: inline-block;
            padding: 0 25px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            border-radius: 25px;

        }

        .textbox {
            padding: 10px;
        }
    </style>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark  bg-dark " >
            <a class="navbar-brand" href="index.php">SORENTO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            City
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Bhopal</a>
                            <a class="dropdown-item" href="#">Indore</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Mumbai</a></div></li>

                    <li>
                        <a href="uploader.php"> <button type="button" class="btn btn-primary" data-toggle="modal" >
                                Upload Product
                            </button></a>
                    </li>

<?php
if ($user != "") {
    echo '<li class="nav-item" style="position: absolute; right: 13%">
                                                     <a style="text-decoration: none; color: #fff;" href="logout.php"><button type="button" class="btn btn-primary" data-toggle="modal" >
                                    LOG OUT
                                </button></a></li>';
} else {
    echo '<li class="nav-item" style="position: absolute; right: 11%">
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#LoginModal">
                                    Login
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" >LOGIN</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="login.php" method="post" name="Login" >
                                                    <div class="login-box">

                                                        <div class ="textbox">
                                                            <i class="fi-xnsuxl-user-circle-solid"></i> Email ID:<br> 
                                                            <input type = "email"  name="email" value="" required >
                                                        </div>
                                                        <br>
                                                        <div class="textbox">
                                                            <i class="fi-xnsuxl-lock-solid"></i> Password:<br>
                                                            <input type = "password" name="pass" value="" required>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <input type="submit" name="login" class="btn btn-primary" value="Login"></input>
                                                        </div>

                                                
                                            </div>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </li>
';
}
?>
                    <?php
                    if ($user != "") {
                        echo '<li class="nav-item" style="position: absolute; right: 4%">
                                                    <a style="text-decoration: none; color: #fff;" href="profile.php?uid=' . $user . '"><button type="button" class="btn btn-primary" data-toggle="modal" >
                                    
                                Hi ' . $uname_db . '</button></a></li>';
                    } else {
                        echo '<li class="nav-item" style="position: absolute; right: 4%">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SignupModal">Sign Up</button>

                        <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" >SIGN UP</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="login.php" name="registration" method="post" >
                                            <div class="registration-box">

                                                <div class="textbox">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <input type="text" placeholder="Name" name="pname" value="">
                                                </div>

                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>
                                                    <input type="email" placeholder="Email-Id" name="pemail" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>
                                                    <input type="text" placeholder="Username" name="puser" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fi-xnsuxl-lock-solid"></i>
                                                    <input type="password" placeholder="Password" name="ppass" value="">
                                                </div>
                                                <div class="textbox"> 
                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                    <input type="text" placeholder="DOB YYYY/MM/DD" name="dob" value="">
                                                </div>
                                                <div class="stextbox">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                    <select class="stextbox" name="pgender">
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                </div>
                                                <div class="textbox">   
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <input type="text" placeholder="City" name="pcity" value="">
                                                </div>
                                                <div class="textbox">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>  
                                                    <input type="text" placeholder="Mobile-Number" name="pmob" value="">
                                                </div>

                                                <div class="modal-footer">
                                                    <input  type="submit" name = "reg-bn" class="btn btn-primary" value="Sign Up"></input>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>';
                    }
                    ?>                           


            </div>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="product.php" method="POST" style="position: absolute; left: 40%;">
        <input class="form-control mr-sm-2" type="text"  name="search"placeholder="Search" aria-label="Search" size="40px">
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" ></input>
    </form>

</nav>


<div>
    <div class="chip">

        Welcome <?php // echo $result['NAME']   ?>
    </div>


    <div class="container col-md-5"  >
        <div class="container signupform_content">
            <form class="" action ="uploader.php" method="post" enctype="multipart/form-data" >
                <span class="contact100-form-title">
                    <h1> Enter Product Details </h1>
                </span>

                <div class="textbox"> 
                    <input type="text"class="email signupbox" placeholder="Product Name" name="proname" value="">
                </div>
                <div class="textbox">
                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                    <select class="uisignupbutton signupbutton" name="type">
                        <option value="FU">Furniture</option>
                        <option value="E">Electronics</option>
                        <option value="F">Fitness</option>
                        <option value="A">Appliances</option>
                    </select>
                </div>

                <div class="textbox"> 
                    <input type="text" class="email signupbox" placeholder="Rent" name="rent" value="">
                </div>
                <div class="textbox"> 
                    <input type="text"class="email signupbox" placeholder="Condition" name="cnd" value="">
                </div>
                <div class="textbox"> 
                    <input type="text"class="email signupbox" placeholder="Brand" name="brand" value="">
                </div>
                <div class="textbox"> 
                    <input type="text"class="email signupbox" placeholder="Quantity" name="qty" value="">
                </div>
                <div class="textbox">
                    <textarea class="uisignupbutton signupbutton" class="textbox" name="message" placeholder="Description of product...."></textarea>
                    
                </div>
                <div class="textbox">
        <input  type="file" class="uisignupbutton signupbutton"style="background-color:lightgreen;"name="uploadfile" value="" /> 
                </div>
        <div class="textbox">
            <input class="uisignupbutton signupbutton"type="submit" name="upload" value="Request" class="contact100-form-btn">

            </input>
        </div>
            </form></div></div>





        </body>
        </html>
        <!-- Insert code in php-->
<?php
if (isset($_POST['upload'])) {
    $proname = $_POST["proname"];
    $type = $_POST["type"];

    $rent = $_POST["rent"];
    $cnd = $_POST["cnd"];
    $brand = $_POST["brand"];
    $rules = $_POST["message"];
    $qty = $_POST["qty"];
    $filename = $_FILES["uploadfile"]["name"];   //for image 
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;
    move_uploaded_file($tempname, $folder);
    $query = "INSERT INTO images (image,text,type,proname,rent,cnd,brand,pemail,qty) VALUES ('$folder','$rules','$type','$proname','$rent','$cnd','$brand','$user','$qty')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo '<script type="text/javascript">alert("Your Product Uploaded");</script>';
        echo '<script type="text/javascript">window.location= "product.php"</script>';
    } else {
//                    echo "error: ".$query."<br>".$conn->error;
        echo '<script type="text/javascript">alert("Sorry ! Not Inserted ");</script>';
        echo '<script type="text/javascript">window.location= "uploader.php"</script>';
    }
}
?>
