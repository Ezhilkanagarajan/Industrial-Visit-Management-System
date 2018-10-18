<?php 
session_start(); 
$per=(int)$_SESSION['userid'];
if($per != 1)
{ 
$con=mysqli_connect("localhost","root","","industry");
$quer="select deptid from staff where sid='$per'";
$rst=mysqli_query($con,$quer);
$row = mysqli_fetch_array($rst);
$quer2="select distinct classid from class where deptid='$row[0]'";
$quer3="select distinct sid,sname from staff where deptid='$row[0]'";
$rst2=mysqli_query($con,$quer2);
$rst3=mysqli_query($con,$quer3);
$option="";
$option1="";
$quer4="select distinct name from place";
$rst4=mysqli_query($con,$quer4);
$option2="";
while($row = mysqli_fetch_array($rst2,true))
{
	//echo "hiii";
  $option .= '<option value =' .$row['classid'].'>'.$row['classid'].'</option>';
  //echo $option;
}

while($row1 = mysqli_fetch_array($rst3,true))
{
   $option1 .= '<option value =' .$row1['sid']. $row1['sname'].'>'.$row1['sid'].'- '.$row1['sname'].'</option>';
}
while($row2 = mysqli_fetch_array($rst4,true))
{
   $option2 .= '<option value =' .$row2['name'].'>'.$row2['name'].'</option>';
}
?>
<html>
<head>
<body>
<title>Staff</title>
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
  <form action="adddetails.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="comname1">Company Name1</label>
      </div>
      <div class="col-75">
        <input type="text" id="comname1" name="comname1" placeholder="comname1" required>
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="comname2">Company Name2</label>
      </div>
      <div class="col-75">
        <input type="text" id="comname2" name="comname2" placeholder="comname2" required>
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="comname3">Company Name3</label>
      </div>
      <div class="col-75">
        <input type="text" id="comname3" name="comname3" placeholder="comname3" required>
      </div>
	  </div>
    <div class="row">
      <div class="col-25">
        <label for="classid">Class Id</label>
      </div>
      <div class="col-75">
	<select name="s1" id="s1" required>
<option value="" selected>Class id</option>
<?php echo $option; ?>
</select>
</div>
</div>
<div class="row">
      <div class="col-25">
        <label for="staffid1">Staff ID 1</label>
      </div>
      <div class="col-75">
<select name="s2" id="s2" required>
<option value="" selected>Staff Id1</option>

 <?php echo $option1; ?>
</select>
</div>
</div>
<div class="row">
      <div class="col-25">
        <label for="staffid1">Staff ID 1</label>
      </div>
      <div class="col-75">
<select name="s3" id="s3" required>
<option value="" selected>Staff Id2</option>

 <?php echo $option1; ?>
</select>
</div>
</div>
	<div class="row">
      <div class="col-25">
        <label for="sem">Semester</label>
      </div>
      <div class="col-75">
        <input type="text" id="sem" name="sem" placeholder="semester">
      </div>
    </div>
	
	   
	<div class="row">
      <div class="col-25">
        <label for="date">From Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="fdate" name="fdate" placeholder="From date">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="date">To Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="tdate" name="tdate" placeholder="To date">
      </div>
    </div>

	 <div class="row">
      <div class="col-25">
        <label for="place">Place</label>
      </div>
      <div class="col-75">
	<select name="s4" id="s4" required>
<option value="" selected>Place</option>
<?php echo $option2; ?>
</select>
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


