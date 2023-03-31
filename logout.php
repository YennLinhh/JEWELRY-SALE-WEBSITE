<?php
		session_start();
        $conn=new mysqli("localhost:3360","root","","shop");

          if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
		session_destroy();
		header("location:login.php");
?>