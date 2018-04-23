<?php 
  if (!isset($_SESSION)) 
	   session_start();
 
 ?>
 <?php
// define variables and set to empty values
$nameErr =$idErr= $emailErr=$passwordErr=$expErr=$deptErr = $genderErr=$confirmpasswordErr  = "";
$id=$name = $email  =$password=$exp=$dept=$gender=$confirmpassword  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["id"])) {
    $idErr = "id is required";
  } else {
    $id = test_input($_POST["id"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $idErr = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
   if (empty($_POST["password"]))
   {
     $passwordErr = "password is required";
   }
   else
   {$password = test_input($_POST["password"]);
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $password))
	{
     $passwordErr= "the password does not meet the requirements!";
	}
	else
	{
	 
	 if(($_POST["password"])!=($_POST["confirmpassword"]))
     {
      $confirmpasswordErr = "passwords donot match";
     }
    }
   }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }


if (empty($_POST["exp"])) {
    $expErr = "experience is required";
  } else {
    $exp = test_input($_POST["exp"]);
  }

if (empty($_POST["dept"])) {
    $deptErr = "Department is required";
  } else {
    $dept = test_input($_POST["dept"]);
  }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ((!empty($_POST["name"])) && (!empty($_POST["id"])) &&(!empty($_POST["email"])) && (!empty($_POST["gender"]))&&(!empty($_POST["password"])) 
	&& (!empty($_POST["exp"]))&&(!empty($_POST["dept"])) && (($_POST["password"])==($_POST["confirmpassword"]))  )
{
	function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "lms";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}

$conn    = Connect();
	
		$dob = $_POST["dob"];
		
		$workplace = $_POST["workplace"];
		
 
$query = "INSERT INTO signup(id,name,email,password,gender,dob,exp,workplace,dept) VALUES ('$id','$name','$email','$password','$gender','$dob','$exp','$workplace','$dept')";
$success = $conn->query($query);
$message = "Registered Successfully.";
  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='loginlm.php';
    </SCRIPT>");
$conn->close();
}
?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.error {color: #FF0000;}
.body1 {
height:100%;
}
table{
border-spacing: 10px;
}

button {
 width:10%;
 background-color:green;
 color:white;
 padding: 8px ;
 text-align:center;
 margin:8px 0;
 border:none;
 cursor:pointer;
}

button:hover {
    opacity: 0.8;
}
</style>
</head>
<body>
<div class="body1">

 <img src="anits1.jpg" height="190" width="990"> 
 <center>
<h1> REGISTRATION FORM </h1>
<p><span class="error">* required field.</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<table>
<tr><td>EMPLOYEE ID:</td>
<td><input type="text" name="id"/><span class="error">* <?php echo $idErr;?></span></td></tr>
<tr><td>NAME:</td>
<td><input type="text" name="name"/><span class="error">* <?php echo $nameErr;?></span></td></tr>
<tr><td>EMAIL ID:</td> 
<td> <input type="text" name="email"/><span class="error">* <?php echo $emailErr;?></span></td></tr>
     <tr><td>PASSWORD:	</td><td><input type="password" name="password"><span class="error">* <?php echo $passwordErr;?></span></td></tr>
	  <tr><td> CONFIRM PASSWORD:	</td><td><input type="password" name="confirmpassword"><span class="error">* <?php echo $confirmpasswordErr;?></span></td></tr>
		<tr><td>GENDER</td><td><input type="radio" name="gender" value="male"/>male	
 		<input type="radio" name="gender" value="female"> female<span class="error">* <?php echo $genderErr;?></span></td></tr>
<tr><td>DOB:</td>
<td><input type="date" name="dob" ></td></tr>
<tr><td>SELECT EXPERIENCE:</td>
              <td> <select name="exp">
                <option select="0" selected>0</option>
                <option select="1-3" selected>1-3</option>
                <option select="4-6" selected>4-6</option></select><span class="error">* <?php echo $expErr;?></span></td></tr>
   <tr><td>WORKPLACE: </td><td> <input type="text" name="workplace"/></td></tr>
<tr><td> SELECT DEPT :</td><td>  <select name="dept">
                <option select="CSE" selected>cse</option>
<option select="ECE" selected>ece</option>
<option select="EEE" selected>eee</option>
<option select="MECH" selected>mech</option></select><span class="error">* <?php echo $deptErr;?></span></td></tr></table>
<input type="submit" value="SUBMIT">
</form>
</center>
</body>
</html>

 