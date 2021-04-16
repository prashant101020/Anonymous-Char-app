<?php

$servernme="localhost";
$username="root";
$password="";
$database="chatroom";

//creating database connection

$conn= mysqli_connect($servernme,$username,$password,$database);

if(!$conn){

    die("Failed to connect". mysqli_connect_error());

}

?>