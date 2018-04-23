<?php
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

		$id = $_POST["id"];
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$gender = $_POST["gender"];
		$dob = $_POST["dob"];
		$exp=$_POST["exp"];
		$workplace = $_POST["workplace"];
		$dept = $_POST["dept"];
 
$query = "INSERT INTO signuphod(id,name,email,password,gender,dob,exp,workplace,dept) VALUES ('$id','$name','$email','$password','$gender','$dob','$exp','$workplace','$dept')";
$success = $conn->query($query);
$message = "Registered Successfully.";
  
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='loginhodlm.php';
    </SCRIPT>");
$conn->close();
?>