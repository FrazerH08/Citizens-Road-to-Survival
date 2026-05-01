<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "citizens'_road_to_survival"; 
// $dbname = cl27-frazerh



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error){
    die("Connection failed:" . $conn->connect_error);
}else{
    echo '<p style="display:none;">Connected successfully</p>';
    '<console class="log">Connected successfully</console>';
}
#echo '<p style="display:none;">Connected successfully</p>';
echo '<p>Connected successfully</p>';
