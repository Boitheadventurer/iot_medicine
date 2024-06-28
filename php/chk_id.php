<?php
    include 'conn.php';
    
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ!'); window.location.href='index.php';</script>";
    }
?>