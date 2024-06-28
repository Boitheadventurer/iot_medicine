<?php
    include 'conn.php';
    
    if (isset($_POST["email"]) && isset($_POST["pasword"])) {

        $email = $_POST["email"];
        $pasword = $_POST["pasword"];

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pasword'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];

        if ($_SESSION['id'] != NULL) {
            echo "<script>alert('เข้าสู่ระบบ สำเร็จ!'); window.location.href='../home.php';</script>";
        } else {
            echo "<script>window.location.href='../index.php'; alert('เข้าสู่ระบบ ล้มเหลว!');</script>";
        }
    }
?>