<?php 
session_start(); 
//$per=(int)$_SESSION['userid'];
$per=(int)$_SESSION['userid'];
if($per !=1)
{
 $connect = mysqli_connect("localhost","root","","industry");  
 $q2="select deptid from incharge where sid='$per'";
  $r2=mysqli_query($connect, $q2);
  $row1 = mysqli_fetch_array($r2);
    $year = $_POST["s1"];  
	$reg = $_POST["s2"]; 
	$reg1 = $_POST["s3"]; 
	$reg2 = $_POST["s4"]; 
   $code1 = $_REQUEST["fdate"];
    $code2 = $_REQUEST["tdate"];	
	$name1 = $_POST["comname1"]; 
	$name2 = $_POST["comname2"]; 
	$name3 = $_POST["comname3"]; 
	$s=$_POST["sem"];
	$e="select sectionid from section where classid='$year'";
	$w=mysqli_query($connect,$e);
	$t=mysqli_fetch_array($w);
	//echo $t[0];
	$query1="select pid from place where name='$reg2'";
	 $result = mysqli_query($connect, $query1);
	 if($result){
		 $row = mysqli_fetch_array($result);
		 //echo $row[0];
	 }
	 $query2 = "select count(ivid) from iv as p where p.deptid = '$row1[0]' and p.fromdate = '$code1' and p.todate = '$code2' and (select case when (select semester from section where sectionid = p.sectionid) = (select semester from section where sectionid = '$t[0]') then 1 else 0 end)";
			$res_check = mysqli_query($connect,$query2);
			$r_check = mysqli_fetch_array($res_check);
			//echo $r_check[0];
			if($r_check[0]==0)
			{
	 $query = "INSERT INTO iv (cmpname1,cmpname2,cmpname3,pid,deptid,fromdate,todate,sid1,sid2,classid,sectionid) VALUES ('$name1','$name2','$name3','$row[0]','$row1[0]','$code1','$code2','$reg1','$reg','$year','$t[0]')"; 
	 if(mysqli_query($connect,$query))
      {   
     	   echo "<script type='text/javascript'>alert('Added successfully!')</script>";
	       echo "<script>setTimeout(\"location.href = 'staff1.php';\",1000);</script>";
	  }  
			}
	else
			{ 
				echo "<script type='text/javascript'>alert('Not possible!')</script>";
				echo "<script>setTimeout(\"location.href = 'staff1.php';\",1000);</script>";
			}
         	
	
}
else
 {?>
 <script type="text/javascript">location.href = 'stafflogin.html';</script>
 <?php } ?>