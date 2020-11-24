<?php
$servername="localhost";
$username="root";
$password="9009044855";
$dbname="rento";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
//	echo "Successful";
}
else
{
	die("connection error because".mysqli_connect_error());
}

?>
