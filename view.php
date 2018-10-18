<?php 
session_start(); 
$per=(int)$_SESSION['userid'];
if($per != 1)
{ 
?>
<html>
<head>
<link rel="stylesheet" href="table.css">
</head>
<style>
body {
background-color: #C0C0C0
}
table, th, td {
    border: 1px solid black;
}
</style>
 
<br><br><br>
</html>
<?php  
 $connect = mysqli_connect("localhost","root","","industry");   
  $q="select deptid from incharge where sid='$per'";
  $r=mysqli_query($connect, $q);
  $row1 = mysqli_fetch_array($r);
  //echo $row1[0];
 
      $query = "SELECT * from iv inner join place on iv.pid= place.pid inner join section on iv.classid=section.classid and iv.deptid='$row1[0]'";  
      $res=mysqli_query($connect, $query);
      if($res)  
      {    
          echo "<h1><center>History</h1>";     
		  echo "<center>";
          echo "<br>";
          echo "<br>";
          echo "<table>";
          echo "<tr>";
             echo "<th>IV id</th>";
             echo "<th>Company 1</th>";
		     echo "<th>Company 2</th>";
		     echo "<th>Company 3</th>";
		     #echo "<th>Place ID</th>";
			 echo "<th>Place</th>";
		     echo "<th>Department ID</th>";
			 echo "<th>Section</th>";
			echo "<th>Semester</th>";
		     echo "<th>From Date</th>";
		     echo "<th>To Date</th>";
		     echo "<th>Accompanying Staff ID1</th>";
		     echo "<th>Accompanying Staff ID2</th>";
		    
		  echo "</tr>";
        while($row = mysqli_fetch_array($res,true)){
            echo "<tr>";
                echo "<td>" . $row['ivid'] . "</td>";
                echo "<td>" . $row['cmpname1'] . "</td>";
				echo "<td>" . $row['cmpname2'] . "</td>";
				echo "<td>" . $row['cmpname3'] . "</td>";
				#echo "<td>" . $row['pid'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['deptid'] . "</td>";
				echo "<td>" . $row['section'] . "</td>";
				echo "<td>" . $row['semester'] . "</td>";
				echo "<td>" . $row['fromdate'] . "</td>";
                echo "<td>" . $row['todate'] . "</td>";
                echo "<td>" . $row['sid1'] . "</td>";
				echo "<td>" . $row['sid2'] . "</td>";
				
                echo "</tr>";
        }
        echo "</table>";
         echo "</center>";
       
    }
      else  
      {  
           echo 'No Records Present';  
      }  
  
 }
 else
 {?>
 <script type="text/javascript">location.href = 'stafflogin.html';</script>
 <?php } ?>

 <br>
 <br>
 <br>
