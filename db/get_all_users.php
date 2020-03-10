<?php
    include_once('conn.php');
    session_start();
    $username = $_SESSION['username'];

    $query = "SELECT name,username FROM profile WHERE username != '$username'";
    $result = $conn->query($query);
    $userArray = mysqli_fetch_all($result);
?>