<?php
    include 'conn.php';

    if (isset($_POST["fname"]) && isset($_POST["lname"]) &&
        isset($_POST["detail"]) && isset($_POST["email"]) &&
        isset($_POST["pasword"])) {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $detail = $_POST["detail"];
        $email = $_POST["email"];
        $pasword = $_POST["pasword"];

        $role = "user";

        $sql = "INSERT INTO user (firstname, lastname, user_detail, email, password, urole)
                VALUE ('$fname', '$lname', '$detail', '$email', '$pasword', '$role')";

        if (mysqli_query($conn, $sql)) { 
            echo "<script>alert('สมัครบัญชี สำเร็จ!'); window.location.href='../index.php';</script>";
        } else { 
            echo "<script>alert('สมัครบัญชี ล้มเหลว!'); window.location.href='../index.php';</script>";
        }
    }
?>