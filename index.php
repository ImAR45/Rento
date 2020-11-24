<?php include ( "connection.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['EMAIL'])) {
    $user = "";
} else {
    $user = $_SESSION['EMAIL'];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE pemail='$user'");
    $get_user_email = mysqli_fetch_assoc($result);
    $uname_db = $get_user_email['pname'];
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>SORENTO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href="style.css">
        <!--Cs s Styles--> 
        <!--    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
            <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
            <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="css/nice-select.css" type="text/css">
            <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
            <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="css/style.css" type="text/css">-->

    </head>
    <body style="font-family: sofia;">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark " >
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
                                                    <i class="fa fa-user" aria-hidden="true"></i>Name:<br>
                                                    <input type="text"  name="pname" value="">
                                                </div><br>
                                                
                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>Email-Id: <br>
                                                    <input type="email" name="pemail" value="">
                                                </div><br>
                                                
                                                <div class="textbox">
                                                    <i class="fi-xwsuxl-envelope-solid"></i>Username:<br>
                                                    <input type="text"  name="puser" value="">
                                                </div><br>
                                                
                                                <div class="textbox">
                                                    <i class="fi-xnsuxl-lock-solid"></i>Password: <br>
                                                    <input type="password"  name="ppass" value="">
                                                </div><br>
                                                
                                                <div class="textbox"> 
                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>DOB:<br>
                                                    <input type="text" placeholder="YYYY/MM/DD" name="dob" value="">
                                                </div><br>
                                                
                                                <div class="stextbox">
                                                    <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                                    <select class="stextbox" name="pgender">
                                                        <option value="M">Male</option>
                                                        <option value="F">Female</option>
                                                        <option value="O">Other</option>
                                                    </select>
                                                </div><br>
                                                
                                                <div class="textbox">   
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>City<br>
                                                    <input type="text" name="pcity" value="">
                                                </div><br>
                                                
                                                <div class="textbox">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>Mobile-Number:<br>  
                                                    <input type="text" name="pmob" value="">
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


<div class="jumbotron jumbotron-fluid" style="padding-top: 10%;">
    <div class="container">
        <p style="text-align: center; font-size: 50px;  ">
            SORENTO
        </p>

    </div>
</div>



<div style=" background-color: gray; height:300px; font-family: Comic Sans MS;">
    <section style="position: absolute; left: 28%; padding-top: 5%;">
        <div class="card-deck" style="width: 40rem;  align-content: center;">
            <div class="card" >
                <a href="furniture.php" > <img src="image/fur.svg" class="card-img-top" alt="..." ></a> <p style=" text-align: center;">Furniture</p>

            </div>
            <div class="card">
                <a href="electronic.php" > <img src="image/new-electronics.svg" class="card-img-top" alt="..."></a> <p style=" text-align: center;">Electronics</p>

            </div>
            <div class="card">
                <a href="fitness.php" > <img src="image/new-fitness.svg" class="card-img-top" alt="..."></a> <p style=" text-align: center;">Fitness</p>

            </div>

            <div class="card">
                <a href="appliances.php" > <img src="image/appl.svg" class="card-img-top" alt="..."></a> <p style=" text-align: center;">Appliances</p>

            </div>
        </div></section></div>


<div id="products"  style=" background-color: #cccccc; height:730px;" >
    <h2 style="font-family: Comic Sans MS;  padding: 40px;" >
        PRODUCTS: <br>
        For User By User
    </h2>
    <div >
        <div class="card-deck" style=" padding: 10px;">
            <div class="card"><form method="post" action="product.php"> 
                    <button type="submit" name="search" value="mobile"><img src="image/product1.jpg" class="card-img-top" alt="..."></button></form>
                <div class="card-body">
                    <h5 class="card-title">Sofa</h5>
                    <p class="card-text">Brand: Azrou <br>
                        Rent: 400<br>
                        Type: Furniture<br>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <form method="post" action="product.php" > 
                    <button type="submit" name="search" value="mobile"><img src="image/phone.jpeg" class="card-img-top" alt="..."></button></form>
                <div class="card-body">
                    <h5 class="card-title">Phone</h5>
                    <p class="card-text">Brand: Xiaomi <br>
                        Rent: 1200<br>
                        Type: Electronics<br></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="image/washing machine.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Washing Machine</h5>
                    <p class="card-text">Brand: Whirlpool <br>
                        Rent: 800<br>
                        Type: Appliances<br></p></div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="image/camera.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Camera</h5>
                    <p class="card-text">Brand: Nikon <br>
                        Rent: 400<br>
                        Type: Electronics<br> </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <!--            <div class="card">
                            <img src="image/pro cam.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>-->
            <div class="card">
                <img src="image/table.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Table</h5>
                    <p class="card-text">Brand: Woodland <br>
                        Rent: 100<br>
                        Type: Furniture<br></p>></div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>

            <!--            <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    </div>>-->

        </div>

    </div>

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 84-C Sonagiri Bhopal</li>
                            <li>Phone: +917389110005</li>
                            <li>Email: aryanchoubey49@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        window.onscroll = function () {
            myFunction()
        };

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

</body>
</html>
<!----------------------------------------------------------------------------------------------------------->



<!---------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------>
