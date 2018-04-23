<?php
$data=$_POST['val'];
$status =explode('-',$data);
$user_id=$status[1];

if($status[0]=='acc'){
    $value="Approved";
}
elseif($status[0]=='rec'){
    $value="Rejected";
}

  $conn = mysqli_connect('localhost', 'root', '', 'lms');
 mysqli_query($conn,"update vidhod set status='$value' where sno=$user_id");

?>

