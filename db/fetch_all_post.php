<?php
    session_start();
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM PHOTO WHERE username !='$username'";
    $result = $conn->query($query);
    $result = mysqli_fetch_all($result);
?>