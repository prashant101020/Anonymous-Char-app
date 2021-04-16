<?php
//getting the value of parmeters
$room= $_POST['room'];


if((strlen($room))>20)
{

    $message='please choose a name between 2 to 20';
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatanonymously";';
    echo '</script>';

}

else if(!ctype_alnum($room)){
    $message="please choose a alpha numeric name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatanonymously";';
    echo '</script>'; 
}else{
    //connect ot the database

    //connecting the database

    include 'db_connect.php';

}

$sql = "SELECT * FROM `rooms` WHERE roomname= '$room'";

$result = mysqli_query($conn , $sql);
if($result){
    if(mysqli_num_rows($result)>0){

        $message='please choose a different room name';
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/anonymouschatroom";';
        echo '</script>';
    }else{
        $sql = "INSERT INTO `rooms` (`roomname`,`stime`) VALUES ('$room',CURRENT_TIMESTAMP);";
       
        if(mysqli_query($conn, $sql)){
            $message='your room is ready and you can chat now';
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/anonymouschatroom/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
      
   
   
    }
}else{
   echo  "ERROR:" .mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
</head>
<body>

<h2>Chat Messages</h2>

<div class="container">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>

<div class="container darker">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

<div class="container">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div>

<div class="container darker">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
  <span class="time-left">11:05</span>
</div>

</body>
</html>


