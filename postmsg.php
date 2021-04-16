<?php

include 'db_connect.php';

$msg= $_POST['text'];
$room= $_POST['room'];
$ip= $_POST['ip'];

$sql = "INSERT INTO `msgs` (`msg` , `room` , `ip` , `time`) VALUES ('$msg','$room','$ip',CURRENT_TIMESTAMP);";

mysqli_query($conn,$sql);
// if(mysqli_query($conn,$sql)){
// $message='this room dows not exist';
//     echo '<script language="javascript">';
//     echo 'alert("'.$message.'");';
//     echo 'window.location="http://localhost/chatanonymously";';
//     echo '</script>';
// }
mysqli_close($conn);

?>