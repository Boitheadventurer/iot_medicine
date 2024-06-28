<?php
    include 'conn.php';
    include 'chk_id.php';

    if (isset($_POST["dname"]) && isset($_POST["dtail"]) &&
        isset($_POST["dline"]) ){

        $device_name = $_POST['dname'];
        $device_tail = $_POST['dtail'];
        $device_line = $_POST['dline'];

        $sql = "INSERT INTO tb_device (device_name, device_detail, token_line, id)
                VALUE ('$device_name', '$device_tail', '$device_line', '$id')";

        if (mysqli_query($conn, $sql)) { 
            echo "<script>alert('เปิดข้อมูลเครื่อง สำเร็จ!'); window.location.href='../home.php';</script>";
        } else { 
            echo "<script>alert('เปิดข้อมูลเครื่อง ล้มเหลว!'); window.location.href='../home.php';</script>";
        }
    }
?>