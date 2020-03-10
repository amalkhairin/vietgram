<?php
    include_once('conn.php');
    session_start();
    $username = $_SESSION['username'];
    $caption = $_POST['caption'];

    $target = "../upload/";
    
    $nama_file = $_FILES["file-upload"]["name"];
    
    $upload = move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target.$nama_file);

    $query = "INSERT INTO PHOTO (username,url,caption,likes) values
              ('$username','$nama_file','$caption',210)";

    $result = $conn->query($query);
    $conn->close();
    header('location: ../profile.php');
?>