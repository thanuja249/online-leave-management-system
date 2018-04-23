<?php 
 if (!isset($_SESSION)) 
	   session_start();
    
// define variables and set to empty values
$kindErr =$daysErr= $fromErr = "";
$kind=$days = $from= "";
 ?>
 <?php
if (!isset($_SESSION)) 
	   session_start();
    
// define variables and set to empty values
$kindErr =$daysErr= $fromErr = "";
$kind=$days = $from= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["kind"])) {
    $kindErr = "type is required";
  } else {
    $kind = test_input($_POST["kind"]);
    
  }
  if (empty($_POST["days"])) {
    $daysErr = "days is/are required";
  } else {
    $days = test_input($_POST["days"]);
    
  }
  
  if (empty($_POST["from"])) {
    $fromErr = "date is required";
  } else {
    $from = test_input($_POST["from"]);
   
  }
}   
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ((!empty($_POST["kind"])) && (!empty($_POST["days"])) &&(!empty($_POST["from"])) ) 
{
include("config.php");

date_default_timezone_set('Asia/Kolkata');
 $date5=date('Y-m-d ');
 
		$user=$_SESSION["username"];
		$kind = $_POST["kind"];
		$days = $_POST["days"];
		$from = $_POST["from"];
		$days5=$days-1;
		$date1=date('Y-m-d', strtotime($from . "+".$days5." day"));
        $status="pending";
		$dept=$_SESSION["dept"];

		$sql="SELECT sum(no) as count1 FROM vidhod WHERE tol='$kind' and dept='$dept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  if($kind=='cl')
	  {
		  if(($days+$row['count1'])<=75)
	     {
		  
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','$days','0','0','0','$status')";
		    mysqli_query($db,$sql2);
		    echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			 $days1=15-$row['count1'];$days5=$days1-1;
			 $date1=date('Y-m-d', strtotime($from . "+".$days5." day"));
        	
			 $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days1','$from','$date1','$kind','$days1','0','0','0','$status')";
		    mysqli_query($db,$sql2);
			 $sql="SELECT sum(no) as count2 FROM vidhod WHERE tol='el' and dept='$dept'";
             $result = mysqli_query($db,$sql);
	         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);			 
		$date1=date('Y-m-d', strtotime($from . "+".$days1." day"));
       $days2=$days-$days1;$days5=$days2-1;
		$date2=date('Y-m-d', strtotime($date1 . "+".$days5." day"));
        
			 if(($days2+$row['count2'])<=15)
	         {
		     
			  $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days2','$date1','$date2','$kind','0','$days2','0','0','$status')";
		    mysqli_query($db,$sql2);
			   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		     }
		     else
			 {		
              echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='afllm.php';
	                 </SCRIPT>");
			 }	 
	  }
	  }
	  if($kind=='el')
	  {
		  if(($days+$row['count1'])<=10)
	     {
		  
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','$days','0','0','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
	   if($kind=='od')
	  {
		  if(($days+$row['count1'])<=10)
	     {
		   
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','0','$days','0','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
	   if($kind=='al')
	  {
		  if(($days+$row['count1'])<=5)
	     {
		   
		   $sql2="INSERT INTO vidhod(user,dept,ad,no,from2,to2,tol,cl,el,od,al,status)VALUES ('$user','$dept','$date5','$days','$from','$date1','$kind','0','0','0','$days','$status')";
		    mysqli_query($db,$sql2);
		   echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Successfully Submitted')
                    window.location.href='homehodlm.php';
	                 </SCRIPT>");
		 }
		 else
	     {
			        echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('days are not sufficient')
                    window.location.href='aflhodlm.php';
	                 </SCRIPT>");
			 }
	 
	  }
}  

?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.error {color: #FF0000;}
table {
  border-spacing:14px;
}

.body1 {
height:100%;
}
</style>
</head>
<body>
<div class="body1">

 <img src="anits1.jpg" height="190" width="990"> 

<div class="vertical-menu">
  <a href="homelm.php">Home</a>
  <a href="aboutlm.php" >About</a>
  <a href="#" class="active">Apply for leave</a>
  <a href="historylm.php">Leave history</a>
  <a href="logout.php">Signout</a>
</div>

<div class="borde" >
WELCOME  <?php echo $_SESSION['username'] ;?> !
<center>
<h1> LEAVE APPLICATION</h1>
<p><span class="error">* required field.</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<table>
 <tr>
  <td>Date:</td>
  <td><?php date_default_timezone_set('Asia/Kolkata');
 $date5=date('d-m-Y ');
 echo $date5;?> </td>
 </tr>
 
 <tr>
  <td>Employee id:</td>
  <td><?php echo $_SESSION['id'] ;?> </td>
  </tr>
  
 <tr>
  <td>Type of leave:</td>
  <td>
   
  <input type="radio" name="kind" value="cl" checked> CL
  <input type="radio" name="kind" value="el"> EL
  <input type="radio" name="kind" value="od"> OD 
  <input type="radio" name="kind" value="al"> AL
  <span class="error">* <?php echo $kindErr;?>
  </td>
 </tr>
 
 <tr>
 <td>No. of days</td>
 <td>
 
 <select name="days">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
<span class="error">* <?php echo $daysErr;?>
</td>
 </tr>
 
 <tr>
 <td>From:</td>
 <td>
 
  <input type="date" name="from">
  
<span class="error">* <?php echo $fromErr;?>
 </td>
 </tr>
   
  <tr>
  <td>Purpose:</td>
  <td><textarea rows="4" cols="50" > </textarea></td>
  </tr>
  
 </table>
 <input type="submit" value="SUBMIT"><br><br>
 </center>
 </div>
</div>
</form>

</body>
</html>

