<?php
    include_once('conn.php');
    session_start();
    $username = $_SESSION['username'];

    $query1 = "SELECT * FROM profile WHERE username = '$username'";
    $result1 = $conn->query($query1);
    $user = $result1->fetch_assoc();

    $conn->close();
?>