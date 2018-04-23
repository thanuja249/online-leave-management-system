<?php 
 if (!isset($_SESSION)) 
	   session_start();
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



   
 ?>
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LEAVE HISTORY</title>
<style>
table {
  border-spacing:14px;
}

.body1 {
height:100%;
}
</style>
</head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 8px;
    margin: 50px;
}

tr:nth-child(even) {
    background-color: #ddddd;
	
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
<body>
<body>
<div class="body1">

 <img src="anits1.jpg" height="190" width="990"> 

<div class="vertical-menu">
  <a href="homehodlm.php">Home</a>
  <a href="abouthodlm.php" >About</a>
  <a href="lahodlm.php"  >Leave Applications</a>
  <a href="aflhodlm.php" >Apply for leave</a>
  <a href="#" class="active" >Leave history</a>
  <a href="logouthod.php">Signout</a>
</div>

<div class="borde" >
 <br>
<center>
<div class="bgf">
<a href="historyhodlm.php"  style ="background-color:MediumSeaGreen;">Normal View</a>
<a href="vidhodlm.php" style ="background-color:LightSeaGreen;">View in detail</a></div>

<h1>View in detail</h1>

<?php 
include("config.php");
$dept=$_SESSION["dept"];

	  

$sql = "SELECT ad,no,from2,to2,cl,el,od,al,status from vidhod where dept='$dept'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Applied date</th>
	<th>No</th>
	<th>from</th>
	<th>to</th>
	<th>cl</th>
	<th>el</th>
	<th>od</th>
	<th>al</th>
	<th>Status</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .  date("d-m-Y", strtotime($row["ad"])). "</td>
		<td>" . $row["no"]. "</td>
		<td>" . date("d-m-Y", strtotime($row["from2"])). "</td>
		<td>" . date("d-m-Y", strtotime($row["to2"])). "</td>
		<td>" . $row["cl"]. "</td>
		<td>" . $row["el"]. "</td>
		<td>" . $row["od"]. "</td>
		<td>" . $row["al"]. "</td>
		<td>" . $row["status"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</center>
 </div>
</div>
</form>

</body>
</html>
