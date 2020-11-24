<?php include ( "../connection.php" ); ?>

<?php
ob_start();
session_start();
if (!isset($_SESSION['admin_login'])) {
}
else {
header("location: index.php");
}

if (isset($_POST['login'])) {
if (isset($_POST['email']) && isset($_POST['password'])) {
$user_login = mysqli_real_escape_string($conn, $_POST['email']);
$user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
$password_login = mysqli_real_escape_string($conn, $_POST['password']);
$num = 0;
$password_login = $password_login;
$result = mysqli_query($conn, "SELECT * FROM admin WHERE (email='$user_login') AND password='$password_login'");
$num = mysqli_num_rows($result);
$get_user_email = mysqli_fetch_assoc($result);
$get_user_uname_db = $get_user_email['id'];
if ($num>0) {
$_SESSION['admin_login'] = $get_user_uname_db;
setcookie('admin_login', $user_login, time() + (365 * 24 * 60 * 60), "/");
header('location: index.php');
exit();
}
else {
$error_message = '<br><br>
				<div class="maincontent_text" style="text-align: center; font-size: 18px;">
				<font face="bookman">Username or Password incorrect.<br>
				</font></div>';

}
}

}

$search_value = "";
?>

<!doctype html>
<html>
    <head>
        <title>Welcome</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script defer src="https://friconix.com/cdn/friconix.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link rel = "stylesheet" href="../admin/style3.css">
    </head>
    <body style="font-family: comic snes ms;">
        <nav class="navbar navbar-expand-md navbar-dark  bg-dark " >
            <a class="navbar-brand" href="index.php">SORENTO</a>
            
                    <?php
                    echo '<li class="nav-item" style="position: absolute; right: 4%">
                         <a href="signin.php"> <button type="button" class="btn btn-primary" data-toggle="modal" >
                                    BECOME A SELLER
                                </button></a>';
                    ?>                           


            </div>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="product.php" method="POST" style="position: absolute; left: 40%;">
        <input class="form-control mr-sm-2" type="text"  name="search"placeholder="Search" aria-label="Search" size="40px">
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" ></input>
    </form>

</nav>
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
</html>