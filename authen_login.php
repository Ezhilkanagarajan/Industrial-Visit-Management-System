<?php  
session_start();
 require('db_connect.php');

if (isset($_POST['us_id']) and isset($_POST['us_pass'])){
	
// Assigning POST values to variables.
$username = $_POST['us_id'];
$password = $_POST['us_pass'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `studrep` WHERE studid='$username' and pwd='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){


if (is_numeric($username)) 
    //echo 'Match found';
{
	$_SESSION["userid"]=(int)$username;	
header("Location: index.php");
}

}else{

 header("Location: studentlogin.html");
 
}


}

?>