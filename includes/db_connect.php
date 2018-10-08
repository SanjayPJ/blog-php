<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "root";
    $db_name = "blog";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$conn){
        die("Database Connection Failed! : " . mysqli_connect_error());
    }
    echo "Database Connected Successfully";
?>