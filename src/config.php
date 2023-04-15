<?php
// DB CONNECTION
$conn= new mysqli('mysql-server','root','secret','store');
if($conn->connect_error)
{
    echo $conn->connect_error;
}


?>