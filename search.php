<?php
//error_reporting(0);
include("connection.php");

session_start();
$name=$_POST['search'];
$name=strtolower($name);
if($name==TRUE)
{
   echo"true";}
else
{
    
}
$query = "select * from images where proname='$name'";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total==1)
{
    
}
else
{
    echo $query ." ".$conn->error;
echo '<script type="text/javascript">alert("Sorry ! Not present in Database");</script>';

}

$result=mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<title><?php echo $result['proname'] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display: none}
</style>
<body class="w3-content w3-border-left w3-border-right">

 Sidebar/menu 
<nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
    <h3>Booking Form</h3>
       <img src ="<?php echo $result['text'] ?>"</img>
    
    <img src=""
    <hr>
      <p><a href="product.php" class="w3-button w3-block w3-green w3-left-align">Book Now</a></p>
      
  </div>
  <div class="w3-bar-block">
    <a href="#apartment" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-building"></i> Apartment</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-16" onclick="document.getElementById('subscribe').style.display='block'"><i class="fa fa-rss"></i> Subscribe</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-16"><i class="fa fa-envelope"></i> Contact</a>
  </div>
</nav>

 Top menu on small screens 
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <span class="w3-bar-item">Rental</span>
  <a href="javascript:void(0)" class="w3-right w3-bar-item w3-button" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

 Overlay effect when opening sidebar on small screens 
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 !PAGE CONTENT! 
<div class="w3-main w3-white" style="margin-left:260px">

   Push down content on small screens 
  <div class="w3-hide-large" style="margin-top:80px"></div>

   Slideshow Header 
  <div class="w3-container" id="apartment">
    <h2 class="w3-text-green"><?php echo $result['rent'] ?></h2>

    <div class="w3-display-container mySlides">
    <img src="<?php echo $result['text'] ?>"style="width:100%;margin-bottom:-6px">
      <div class="w3-display-bottomleft w3-container w3-black">
        <p>Dining Room</p>
      </div>
    </div>
    
    <hr>

 

  
  
</body>
</html>
    
    
//<?php
//    if($_POST['submit'])
//    {
//        $name=$_POST['name'];
//        $email=$_POST['email'];
//        $mobile=$_POST['mobile'];
//         $per=$_POST['person'];
//         $room=$_POST['roomid'];
//        $INSERT="INSERT INTO `booking`(name,email,mobile,person,roomid,date) VALUES('$name','$email','$mobile','$per','$room',CURRENT_TIMESTAMP)";
//        $data=mysqli_query($conn,$INSERT);
//        if($data)
//        {
//            echo "<script type='text/javascript'>
//                alert('Congrulations Your Room Booked\n You can pay at location of room ! ');
//            </script>";
//        }
//        else
//        {
//            echo "<script type='text/javascript'>
//                alert('Sorry ! Booking Failed');
//            </script>";
//        }
//    }
//    
//    
//    ?>