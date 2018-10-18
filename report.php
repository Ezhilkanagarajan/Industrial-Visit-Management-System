<?php 
session_start(); 
$per=(int)$_SESSION['userid'];
if($per != 1)
{ 
$con=mysqli_connect("localhost","root","","industry");
$quer="select deptid from student where studid='$per'";
$rst=mysqli_query($con,$quer);
$row = mysqli_fetch_array($rst);
$quer2="select distinct classid from iv where deptid='$row[0]'";
$rst2=mysqli_query($con,$quer2);
$option="";
while($row = mysqli_fetch_array($rst2,true))
{
	//echo "hiii";
  $option .= '<option value =' .$row['classid'].'>'.$row['classid'].'</option>';
  //echo $option;
}
?>
<!DOCTYPE html>
<html>
<head>
<body>
<title>Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<body>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</body>
</head>
<body>
<div class="container">
 <form action="report1.php" method="post" 
enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="cid">Class id</label>
      </div>
      <div class="col-75">
       <select name="s1" id="s1" required>
<option value="" selected>Class id</option>
 <?php echo $option; ?>
</select>
      </div>
    </div>
	<!--<div class="row">
      <div class="col-25">
        <label for="cid">Report</label>
      </div>
      <div class="col-75">
	<textarea name="comment">   </textarea>
	 </div>
    </div>-->
	<div class="row">
      <div class="col-25">
        <label for="cid">Report</label>
      </div>
      <div class="col-75">
	<input type="file" name="myfile" id="file" />
	</div>
    </div>
   <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</form>
</body>
</html>
<?php }
 else
 {?>
 <script type="text/javascript">location.href = 'studentlogin.html';</script>
 <?php } ?>
