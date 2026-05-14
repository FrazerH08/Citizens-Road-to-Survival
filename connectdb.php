<?php
// $servername ="localhost";
// $username = "root";
// $password = "";
// $dbname = "citizens_road_to_survival"; 
$servername = "79.170.44.116";
$username = "cl27-frazerh";
$password = "q.wW!.nTV";
$dbname = "cl27-frazerh";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}else{
    echo '<p style="display:none;">Connected successfully</p>';
}
echo '<p style="display:none;">Connected successfully</p>';
#echo '<p>Connected successfully</p>';
