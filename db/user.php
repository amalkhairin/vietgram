<?php
    include_once('conn.php');
    session_start();
    $username = $_SESSION['username'];
    // echo $_SESSION['username'];

    $query1 = "SELECT * FROM profile WHERE username = '$username'";
    $result1 = $conn->query($query1);
    $user = $result1->fetch_assoc();

    $query2 = "SELECT * FROM PHOTO WHERE username = '$username'";
    $result2 = $conn->query($query2);
    $postArray = null;
    $lengthArray = $result2->num_rows;

    if($result2->num_rows > 0){
        $postArray = mysqli_fetch_all($result2);
    }

    $conn->close();
?>