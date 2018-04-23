<?php 
 if (!isset($_SESSION)) 
	   session_start();
   
 ?>
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
 td:last-child{color:black;cursor: pointer;
                          text-decoration: underline}
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
   <a href="#" class="active" >Leave Applications</a>
  <a href="aflhodlm.php" >Apply for leave</a>
  <a href="historyhodlm.php" >Leave history</a>
  <a href="logouthod.php">Signout</a>
</div>

<div class="borde" >
 <br>
<center>


<h1>View in detail</h1>

<?php 
include("config.php");
$user=$_SESSION["username"];

	  $dept=$_SESSION["dept"];

$sql = "SELECT user,ad,no,from2,to2,cl,el,od,al,sno,status,tol from vid where dept='$dept' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th>
	<th>Applied date</th>
	<th>No</th>
	<th>From</th>
	<th>To</th>
	<th>Type</th>
	<th>Status</th>
	<th>Grant</th></tr>";
    // output data of each row
	$i=0;
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
		echo '<td>' . $row["user"] .'</td>
		<td>' .date("d-m-Y", strtotime($row["ad"])). '</td>
		<td>' . $row["no"]. '</td>
		<td>' . date("d-m-Y", strtotime($row["from2"])). '</td>
		<td>' . date("d-m-Y", strtotime($row["to2"])). '</td>
		<td>' . $row["tol"]. '</td>
		<td>' . $row["status"]. '</td>';
		$i=$row["sno"];
		 echo "<td><button name='sAcc' id='acc-".$i."' onclick='approveuser(this.id)'>Approve</button>";
            echo "|"."<button name='sRej' id='rec-".$i."' onclick='approveuser(this.id)'>Reject</button></td>";
            echo "</tr>";

            $i++;
        
    }
	/*echo "g";

    if (isset($_POST['sAcc']) && intval($_POST['sAcc'])) {echo "f";
        $user_id = (int) $_POST['sAcc'];echo $user_id;
$query = "UPDATE vid set status='approvediy' ";
$success = $conn->query($query);}
        // Do the database update code to set Accept
    
    //if (isset($_POST['sRej']) && intval($_POST['sRej'])) {
	//$user_id = (int) $_POST['sRej'];}

	//$i=$row["sno"];
		echo "<td>".$row["status"]."</td>";
		echo '<td><form method="POST" action="" >
		<input type="submit" name=/"$row["sno"]/" value="Accept" >
		</form></td>';
		 if( isset($_POST[$row["sno"]]) )
    { 
        echo "as";
		$query = "UPDATE vid set status='approvediy' where sno='$i'";
$success = $conn->query($query);} */
    echo "</tr>";
     $i++;                              
    echo "</table>";
} else {
    echo "0 results";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
function approveuser(id){

     trid=id.split('-')[1];
    

    $.ajax({
        url: "index6.php",
        type:"post",
        data:{ val : id },


        success: function(result){
            
            $('table#sHold tr#'+trid).remove();
            

    }
    });
}
</script>





</center>
 </div>
</div>
</form>

</body>
</html>
