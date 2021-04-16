

<?php

$roomname = $_GET['roomname'];

include 'db_connect.php';

$sql = "SELECT * FROM `rooms` WHERE roomname= '$roomname'";

$result =mysqli_query($conn,$sql);

if($result){
 
  if(mysqli_num_rows($result)==0){

    $message='this room dows not exist';
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatanonymously";';
    echo '</script>';

  }

}else{

    echo "ERROR : ".mysqli_error($conn);

  }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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
.anyClass
{
    height: 350px;
    overflow-y:scroll;

}
</style>
</head>
<body>
<nav class="container d-flex flex-column flex-md-row justify-content-between">
  <h3 class="py-2 d-none d-md-inline-block"><p style="color:white">Anonymous Chat</p></h3>
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="http://localhost/anonymouschatroom+">Home</a>
    <a class="py-2 d-none d-md-inline-block" href="#">About</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Contact Us</a>
    
    <a class="py-2 d-none d-md-inline-block" href="#">Sign up</a>
  </nav>
<h2>Chat Messages <?php echo $roomname; ?></h2>

<div class="container">   
<div class="anyClass">
 
  <!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;"> -->
  <!-- <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span> -->
</div>
</div>

<input type="text" class ="form-control" name="usermsg" id="usermsg" placeholder="add messages"><break>

<button class="btn btn-default" name="submitmsg" id="submitmsg">Send</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">

setInterval(runFunction,1000);
function runFunction()
{
  $.post("htcont.php", {room:'<?php echo $roomname ?>'},
  function(data, status){
    document.getElementsByClassName('anyClass')[0].innerHTML=data;
  })
}

var input =document.getElementById("usermsg");

input.addEventListener("keyup", function(event){
  event.preventDefault();

  if(event.keyCode===13){
    document.getElementById("submitmsg").click();
  }
});



   $("#submitmsg").click(function(){
    var clientmsg= $("#usermsg").val();
       $.post("postmsg.php", { text: clientmsg , room: '<?php echo $roomname ?>', ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
        function(data, status){
           document.getElementsByClassName('anyClass')[0].innerHTML = data;});
          $("#usermsg").val("");
           return false;
       });
        
    // <?php echo 'it is  working'; ?>;

</script> 
 
</body>
</html>



