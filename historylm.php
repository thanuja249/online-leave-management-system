<?php 
 include("config.php");
  if (!isset($_SESSION)) 
	   session_start();
  ?>
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-spacing:10px;
  margin-left:270px;
}
table td {
	padding-left:15px;
}
.body1 {
height:100%;
}

.bgf a{
	font-size:20px;
	text-decoration:none;
	padding:15px;
	margin:15px;
}
.bgf a:hover {
opacity:0.8;
}
</style>
</head>
<body>
<div class="body1">

 <img src="anits1.jpg" height="190" width="990"> 

<div class="vertical-menu">
  <a href="homelm.php">Home</a>
  <a href="aboutlm.php" >About</a>
  <a href="afllm.php" >Apply for leave</a>
  <a href="#" class="active">Leave history</a>
    <a href="logout.php">Signout</a>
</div>

<div class="borde">
<center><br>
<div class="bgf">
<a href="historylm.php"  style ="background-color:MediumSeaGreen;">Normal View</a>
<a href="vidlm.php" style ="background-color:LightSeaGreen;">View in detail</a></div></center><br>
<center><h1> Leave  History</h1></center>
<table CELLSPACING=20 CELLPADDING=5>
<tr> <td>
Employee ID</td><td><?php echo $_SESSION['id'] ;?></td></tr>
<tr><td>
No.of days</td><td><?php
 $user=$_SESSION["username"];
      
      $sql="SELECT sum(no) as count1 FROM vid WHERE user='$user' and status='accept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($row['count1']==NULL)
		  $row1=0;
      else
          $row1=$row['count1'];
		echo $row1;
   
       
?></td></tr>
<tr><td>CL</td><td>
<?php
   
 $user=$_SESSION["username"];
      
      $sql="SELECT sum(no) as count1 FROM vid WHERE tol='cl' and user='$user'  and status='accept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($row['count1']==NULL)
		  $row1=0;
      else
          $row1=$row['count1'];
		echo $row1;
	  
?></td></tr>
<tr><td>EL</td><td><?php
  $user=$_SESSION["username"];
         
      $sql="SELECT sum(no) as count1 FROM vid WHERE tol='el' and user='$user'  and status='accept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($row['count1']==NULL)
		  $row1=0;
      else
          $row1=$row['count1'];
		echo $row1;
?></td></tr>
<tr><td>OD</td><td><?php
   $user=$_SESSION["username"];   
        
     $sql="SELECT sum(no) as count1 FROM vid WHERE tol='od' and user='$user' and status='accept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($row['count1']==NULL)
		  $row1=0;
      else
          $row1=$row['count1'];
		echo $row1;
?></td></tr>
<tr><td>AL</td><td><?php
   $user=$_SESSION["username"];   
           
      $sql="SELECT sum(no) as count1 FROM vid WHERE tol='al' and user='$user' and status='accept'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if($row['count1']==NULL)
		  $row1=0;
      else
          $row1=$row['count1'];
		echo $row1;
?></td></tr>
</table><br>
 
 </div>
</div>


</body>
</html>



