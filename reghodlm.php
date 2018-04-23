<?php 
  if (!isset($_SESSION)) 
	   session_start();
 
 ?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
<form action="indexhod2.php" method="post">
<table>
<tr><td>HOD ID:</td>
<td><input type="text" name="id"/></td></tr>
<tr><td>NAME:</td>
<td><input type="text" name="name"/></td></tr>
<tr><td>EMAIL ID:</td> 
<td> <input type="text" name="email"/></td></tr>
     <tr><td>PASSWORD:	</td><td><input type="password" name="password"></td></tr>
		<tr><td>GENDER</td><td><input type="radio" name="gender" value="male"/>male	
 		<input type="radio" name="gender" value="female"> female</td></tr>
<tr><td>DOB:</td>
<td><input type="date" name="dob" ></td></tr>
<tr><td>SELECT EXPERIENCE:</td>
              <td> <select name="exp">
                <option select="0" selected>0</option>
                <option select="1-3" selected>1-3</option>
                <option select="4-6" selected>4-6</option></td></tr>
   <tr><td>WORKPLACE: </td><td> <input type="text" name="workplace"/></td></tr>
<tr><td> SELECT DEPT :</td><td>  <select name="dept">
                <option select="CSE" selected>cse</option>
<option select="ECE" selected>ece</option>
<option select="EEE" selected>eee</option>
<option select="MECH" selected>mech</option></select></td></tr></table><br>
<input type="submit" value="SUBMIT">
</form>
</center>
</body>
</html>

 