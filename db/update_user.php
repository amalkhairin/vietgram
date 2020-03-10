<?php
    include_once('conn.php');
    session_start();
    $username = $_SESSION['username'];

    $name = $_POST['full-name'];
    $website = $_POST['website'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $query = "UPDATE profile SET name ='$name', website = '$website',
                bio = '$bio', email='$email', phone_number='$phone', gender='$gender' WHERE username='$username'";
    $result = $conn->query($query);

    $conn->close();
    header('location: ../profile.php');
?>