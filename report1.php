<?php  
session_start(); 
$per=(int)$_SESSION['userid'];
if($per != 1)
{ 
 $connect = mysqli_connect("localhost","root","","industry");  
	//$reg = $_POST["depid"]; 
    //$msg =$_REQUEST["comment"];
	$id=$_POST["s1"];
	#echo $msg;
	$r="select deptid from student where studid='$per'";
	$t=mysqli_query($connect, $r);
	$s=mysqli_fetch_array($t);
	//echo $s[0];
	echo "<h1>File Info</h1>"; 
echo "File Name : ". $_FILES["myfile"]["name"]."<br/>"; 
echo "File Type : ". $_FILES["myfile"]["type"]."<br/>"; 
echo "File Size : ". $_FILES["myfile"]["size"]."<br/>"; 
echo "File Temp : ". $_FILES["myfile"]["tmp_name"]."<br/>"; 

$savingLocation="upload/"; 
$fileName=$_FILES["myfile"]["name"]; 
$fullPath=$savingLocation.$fileName; 
echo "<h2>Storing File Path & Name : ".$fullPath."</h2>"; 
if (file_exists($fullPath)) 
{ 
    echo $_FILES["myfile"]["name"] . " already exists. "; 
} 
else 
{ 
    move_uploaded_file($_FILES["myfile"]["tmp_name"],$fullPath); 
    echo "Stored in: upload/" . $_FILES['myfile']['name']; 
} 
echo $fullPath;
	  $query1="select ivid from iv where deptid='$s[0]' AND classid='$id'  AND ivid not in(select ivid from report)";
	 $result = mysqli_query($connect, $query1);
	 //echo $result[0];
	 if($result){ 
		 $row = mysqli_fetch_array($result);
		echo $row[0];
		 if($row[0]!=0){ 
		 $query = "INSERT INTO report(ivid,comment) VALUES ('$row[0]','$fullPath')";
      if(mysqli_query($connect,$query))
      {   
		   echo "<script type='text/javascript'>alert('Added successfully!')</script>";										
	       echo "<script>setTimeout(\"location.href = 'index.php';\",1000);</script>";
	  }
 
	}
	else{
		echo "<script type='text/javascript'>alert('Report already generated!')</script>";
	    echo "<script>setTimeout(\"location.href = 'index.php';\",1000);</script>";
	
	}	 
	
  }
}
?>