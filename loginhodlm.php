<?php
   include("config.php");
    if (!isset($_SESSION)) 
	   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM signuphod WHERE name= '$myusername' or id='$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['dept']="$row[dept]";
         $_SESSION['id']="$row[id]";
         $_SESSION['username']="$row[name]";
         header("location:homehodlm.php");
      }else {
         $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script>alert('$message');</script>";
  
  
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
form {
    border: 1px solid gray;
	width: 35%;
    min-width: 500px;
    margin: auto;
	overflow:none;
	
}
.body1{
height:100%;
}
h2 {
text-align:center;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


button,a, {
 width:100%;
 background-color:green;
 color:white;
 padding: 10px ;
 text-align:center;
 margin:18px 0;
 border:none;
 cursor:pointer;
 text-decoration:none;
}

button:hover ,a:hover{
    opacity: 0.8;
}

.create a {
    width:60%;
    padding: 8px 16px;
	padding-left:80px;
	display:block;
	margin:auto;
}

.container {
    padding: 12px;
}

.psw {
  display: block;
  text-align: center;
  font-size:18px;
}

h3 {
  font-family: Tahoma;
  font-size: 30px;
  line-height: 0;
  text-align: center;
}
  
h3 span{
  display: inline-block;
  position: relative;  
  width:auto;
}

h3 span:before,h3 span:after {
  content: "";
  position:absolute;
  border: 1.25px solid #BBB;
  width:200px;
  min-width:200px;
}
  
h3 span:before {
  right: 100%;
  margin-right: 15px;
}

h3 span:after {
  left: 100%;
  margin-left: 15px;
}
</style>
</head>
<body>
<div class="body1">

 <img src="anits1.jpg" height="190" width="990"> 

<h2>LEAVE MANAGEMENT SYSTEM</h2>
<form action="" method="POST">
 <div class="container">
  <label>Hod id</br></label>
  <input type="text" placeholder="Enter Id" name="username" required>
  <label>Password</br></label>
  <input type="password" placeholder="Enter Password" name="password" required><br><br>
  <center><div class="create1"><input type="submit" value="LOGIN"></div></center>
  
 
 </div>
 
  <div class="container" style="background-color:#f1f1f1">

      <h3><span>Or</span></h3>
	  <div class="create">
    <a href="reghodlm.php" style="font-size:20px;">CREATE NEW ACCOUNT</a> </div></div>
  </form>
</body>
</html>
