<?php  
session_start();
 require('db_connect.php');

if (isset($_POST['us_id']) and isset($_POST['us_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['us_id'];
$password = $_POST['us_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT sid,passwd FROM `incharge` WHERE sid='$username' and passwd='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
//$findme='t';

if (is_numeric($username)) 
    //echo 'Match found';
{
$_SESSION["userid"]=(int)$username;	
header("Location: staff1.php");
}

}else{
 //echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
 //echo "Invalid Login Credentials";
 //<?php
 header("Location: stafflogin.html");
 
}


}

?>