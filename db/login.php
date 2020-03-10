<?php
    include_once('conn.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        session_start();
        $_SESSION['username'] = $username;
        
        header('location: ../feed.php');
    } else {
        header('location: ../index.php');
    }

    $conn->close();
?>