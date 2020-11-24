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
if (isset($_REQUEST['pid'])) {

    $pid = mysqli_real_escape_string($conn, $_REQUEST['pid']);
} else {
    header('location: index.php');
}


$getposts = mysqli_query($conn, "SELECT * FROM images WHERE id ='$pid'") or die(mysqli_error($conn));
if (mysqli_num_rows($getposts)) {
    $row = mysqli_fetch_assoc($getposts);
    $id = $row['id'];
    $pName = $row['proname'];
    $price = $row['rent'];
    $description = $row['text'];
    $picture = $row['image'];
    $item = $row['type'];
    $brand = $row['brand'];
    $cnd = $row['cnd'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href="style.css">
    </head>

    <body style="font-family: comic snes ms;">

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


<?php
//			echo '
//				<div style="float: left;">
//				<div>
//					<img src="'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
//				</div>
//				</div>
//				<div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
//					<div style="">
//						<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
//						<h3 style="padding: 20px 0 0 0; font-size: 20px;">Prize: '.$price.' Rs</h3><hr>
//						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
//						<p>
//							'.$description.'
//						</p>
//
//						<div>
//							<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </h3>
//							<div id="srcheader">
//								<form id="" method="post" action="../orderform.php?poid='.$pid.'">
//								        <input type="submit" value="Order Now" class="srcbutton" >
//								</form>
//								<div class="srcclear"></div>
//							</div>
//						</div>
//
//					</div>
//				</div>
//
//			';

echo '<div style="background: #5556; height: 600px; padding-top: 5%;" >
    <div class= "container" style="padding: 20px;">
        <div class = "row">
            <div class="col-md-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="' . $picture . '" style="height: 400px; width: 400px; padding: 2px; border: 2px solid black;">
                        </div>
                        
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-7" >
                <p class="newarrival text-center"> NEW</p>
                <h2> ' . $pName . '</h2>
                <p>Product Code: IRY389</p>
                <br>
                <p class="price">' . $price . '/month</p>
                <p><b>Availability:</b>In Stock</p>
                <p><b>Condition:</b>' . $cnd . '</p>
                <p><b>Brand</b>' . $brand . '</p>
                <label>Quantity</label>
                <input type="text" value="1" style="border: 1px solid #ccc; font-weight: bold; height: 33px;
                       text-align: center; width: 30px;">
                <form id="" method="post" action="rentform.php?poid=' . $pid . '" class="btn btn-default-cart">
								        <input type="submit" value="Get on Rent" class="srcbutton" >
                                                                        <a href="chat_project/chatpage.php" class="srcbutton">CHAT<a/>
</div>
            <div>
                <textarea class="productText" disabled="true">' . $description . '</textarea>
            </div>
        </div>
    </div>
';
?>

</div>
<div style="background: whitesmoke; height: 600px; padding-top: 2%; " >
    <div style="padding: 30px 95px; font-size: 25px; margin: 0 auto; display: table; width: 98%;">
        <h3 style="padding-bottom: 20px">Recommand Product For You:</h3>
        <div>
<?php
$getposts = mysqli_query($conn, "SELECT * FROM images WHERE id != '" . $pid . "' AND type ='" . $item . "'  ORDER BY RAND() LIMIT 3") or die(mysqli_error($conn));
if (mysqli_num_rows($getposts)) {
    echo '<ul id="recs">';
    while ($row = mysqli_fetch_assoc($getposts)) {
        $id = $row['id'];
        $pName = $row['proname'];
        $price = $row['rent'];
        $description = $row['text'];
        $picture = $row['image'];
        $brand = $row['brand'];
        echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<div class="home-prodlist-img"><a href="view_product.php?pid=' . $id . '">
										<img src="' . $picture . '" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">' . $pName . '</span><br> Price: ' . $price . ' Rs</div>
									</div>

								</li>
							</ul>
						';
    }
}
?>
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

</body>
</html>
