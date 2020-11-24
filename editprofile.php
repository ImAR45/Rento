<?php // include ( "./connection.php" );  ?>
//<?php
//ob_start();
//session_start();
//if (!isset($_SESSION['EMAIL'])) {
//    header("location: login.php");
//    $user = "";
//} else {
//    $user = $_SESSION['EMAIL'];
//    $result = mysqli_query($conn, "SELECT * FROM reg WHERE pemail='$user'");
//    $get_user_email = mysqli_fetch_assoc($result);
//    $uname_db = $get_user_email['pname'];
//}
//
//
//$search_value = "";
//
?>
<?php include ( "./connection.php" ); ?>
<?php
ob_start();
session_start();
if (!isset($_SESSION['EMAIL'])) {
    header("location: login.php");
} else {
    $user = $_SESSION['EMAIL'];
    $result = mysqli_query($conn, "SELECT * FROM reg WHERE pemail='$user'");
    $get_user_email = mysqli_fetch_assoc($result);
    $uname_db = $get_user_email['pname'];
    $uemail_db = $get_user_email['pemail'];
    $upass = $get_user_email['ppass'];
    $umob_db = $get_user_email['pmob'];
//			$uadd_db = $get_user_email['address'];
}

//if (isset($_REQUEST['uid'])) {
//
//	$user2 = mysqli_real_escape_string($conn,$_REQUEST['uid']);
//	if($user != $user2){
//		header('location: index.php');
//	}
//}else {
//	header('location: index.php');
//}

if (isset($_POST['changesettings'])) {
//declere veriable
    $email = $_POST['email'];
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $npass1 = $_POST['npass1'];
//triming name
    try {
        if (empty($_POST['email'])) {
            throw new Exception('Email can not be empty');
        }
        if (isset($opass) && isset($npass) && isset($npass1) && ($opass != "" && $npass != "" && $npass1 != "")) {
            if ($opass == $upass) {
                if ($npass == $npass1) {
                    $npass = ($npass);
                    mysqli_query($conn, "UPDATE reg SET ppass='$npass' WHERE pemail='$user'");
                    $success_message = '
						<div class="signupform_text" style="font-size: 18px; text-align: center;">
						<font face="bookman">
							Password changed.
						</font></div>';
                } else {
                    $success_message = '
						<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
						<font face="bookman">
							New password not matched!
						</font></div>';
                }
            } else {
                $success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.ADASNDLAKJ
					</font></div>';
            }
        } else {
            $success_message = '
					<div class="signupform_text" style=" color: red; font-size: 18px; text-align: center;">
					<font face="bookman">
						Fillup password field exactly.
					</font></div>';
        }

        if ($uemail_db != $email) {
            if (mysqli_query($conn, "UPDATE reg SET  pemail='$email' WHERE pemail='$user'")) {
                //success message
                $success_message = '
					<div class="signupform_text" style="font-size: 18px; text-align: center;">
					<font face="bookman">
						Settings change successfull.
					</font></div>';
            }
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<!doctype html>
<html>
    <head>
        <title>Welcome to Rento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style3.css">
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

<li style="float: right;">
    <div class="holecontainer" style=" padding-top: 20px; padding: 0 20%">
        <form action="" method="POST" class="registration">
            <div class="container signupform_content " style="position: absolute; top: 20%; left: 45%;">
                <div style="text-align: center;font-size: 20px;color: #fff;margin: 0 0 5px 0;">
                    <td >Change Password:</td>
                </div>
                <div>
                    <td><input class="email signupbox" type="password" name="opass" placeholder="Old Password"></td>
                </div>
                <div>
                    <td><input class="email signupbox" type="password" name="npass" placeholder="New Password"></td>
                </div>
                <div>
                    <td><input class="email signupbox" type="password" name="npass1" placeholder="Repeat Password"></td>
                </div>
                <div style="text-align: center;font-size: 20px;color: #fff;margin: 0 0 5px 0;">
                    <td >Change Email:</td>
                </div>
                <div>
                    <td><?php echo '<input class="email signupbox" required type="email" name="email" placeholder="New Email" value="' . $uemail_db . '">'; ?></td>
                </div>
                <div>
                    <td><input class="uisignupbutton signupbutton" type="submit" name="changesettings" value="Update Settings"></td>
                </div>
                <div>
<?php if (isset($success_message)) {
    echo $success_message;
} ?>
                </div>
            </div>
        </form>
    </div>
</li>
</ul>
</div>
</div>
