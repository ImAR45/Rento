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


<!doctype html>
<html>
    <head>
        <title>Welcome to Rento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style3.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    </head>
    <body style="font-family: sofia;">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark " >
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



<style>.sidenav {
        height: 100%; /* Full-height: remove this if you want "auto" height */
        width: 250px; /* Set the width of the sidebar */
        position: fixed; /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1; /* Stay on top */
        top: 0; /* Stay at the top */
        left: 0;
        background-color: #212529; /* Black */
        overflow-x: hidden; /* Disable horizontal scroll */
        padding-top: 20px;
        margin-top: 55px;
    }

    /* The navigation menu links */
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 35px;
        color: #009999;
        display: block;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;
    }

    /* Style page content */
    .main {
        margin-left: 160px; /* Same as the width of the sidebar */
        padding: 0px 10px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }</style>  <!-- Side navigation -->
<div class="sidenav">
    <?php echo'<a href="profile.php?uid=' . $user . '">Profile</a>' ?>
    <a href="allproducts.php">Products</a>
    <a href="rentproduct.php">Rented</a>
    <a href="editprofile.php">Edit Profile</a>
</div>


</div>

<div>
    <table class="rightsidemenu">
        <tr style="font-weight: bold;" colspan="10" bgcolor="#3A5487">
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Type</th>
            <th>Rent Amount</th>
            <th>Condition</th>
            <th>Brand</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        <tr>
<?php
include ( "connection.php");
$query = "SELECT * FROM images WHERE pemail='" . $user . "' ORDER BY id ASC";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($run)) {
    $id = $row['id'];
    $proname = substr($row['proname'], 0, 50);
    $protype = $row['type'];
    $rent = $row['rent'];
    $cnd = $row['cnd'];
    $brand = $row['brand'];
    $desc = $row['text'];
    $picture = $row['image'];
    ?>
                <th><?php echo $id; ?></th>
                <th><?php echo $proname; ?></th>
                <th><?php echo $protype; ?></th>
                <th><?php echo $rent; ?></th>
                <th><?php echo $cnd; ?></th>
                <th><?php echo $brand; ?></th>
                <th><?php echo $desc; ?></th>
                <th><?php echo '<div class="home-prodlist-img"><a href="editproduct.php?epid=' . $id . '">
									<img src="' . $picture . '" class="home-prodlist-imgi" style="height: 75px; width: 75px;">
									</a>
								</div>' ?></th>
            </tr>
                <?php } ?>
    </table>
</div>
</body>
</html>