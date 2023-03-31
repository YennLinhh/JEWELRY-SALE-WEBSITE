<?php
    $conn=new mysqli("localhost:3360","root","","shop");
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn, 'UTF8');
?>