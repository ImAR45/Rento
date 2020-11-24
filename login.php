<?php

session_start();
include ("connection.php");
if ($_POST['login']) {

    $email = $_POST["email"];
    $pwd = $_POST["pass"];
    // echo"wprk";
    //echo $email;
    //echo $pwd;
    $query = "SELECT * FROM reg WHERE pemail='$email' && ppass='$pwd'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        echo "<script type='text/javascript'>
                confirm('Successful');
            </script>";
        $_SESSION['EMAIL'] = $email;
        header('Location:index.php');
    } else {
        echo "<script type='text/javascript'>
                confirm('Wrong Email or Password');
            </script>";
        header('Location:index.php');
    }
}
?>

<?php

$db = mysqli_connect("localhost", "root", "9009044855", "rento");
if (isset($_POST['reg-bn'])) {
    $name = $_POST['pname'];
    $emaild = $_POST['pemail'];
    $user = $_POST['puser'];
    $ppass = $_POST['ppass'];
    $dob = $_POST['dob'];
    $gender = $_POST['pgender'];
    $city = $_POST['pcity'];
    $mob = $_POST['pmob'];
    //if($pass = $pass2){
    //$pass = md5($pass);
    $sql = "INSERT INTO reg(pname,puser,pemail,ppass,dob,pgender,pcity,pmob) VALUES('$name','$user','$emaild','$ppass','$dob','$gender','$city','$mob')";
    $data = mysqli_query($db, $sql);
    if ($data) {

        echo '<script type="text/javascript">alert("Signned In");</script>';
    } else {
        echo '<script type="text/javascript">alert("Sorry ! Already User");</script>';
    }
    $_SESSION['message'] = "You are now logged in";
    //$_SESSION['username'] = $username;
    header("location: index.php");
    //}
    //else{
    //$_SESSION['message'] = "passwords didn't match";
}
?>
