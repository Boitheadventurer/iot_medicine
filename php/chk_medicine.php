<?php
    include 'conn.php';
    include 'chk_id.php';

    $search = "SELECT * FROM tb_device LEFT JOIN user ON user.id = tb_device.id WHERE tb_device.id = '$id'";
    $result = $conn->query($search);
    $row = $result->fetch_assoc();
    $did = $row['device_id'];

    if (isset($_POST["mname"]) && isset($_POST["mtail"]) &&
        isset($_POST["mnum"]) ){

        $medicine_name = $_POST['mname'];
        $medicine_tail = $_POST['mtail'];
        $medicine_num  = $_POST['mnum'];

        $sql = "INSERT INTO tb_medicine (medicine_name, medicine_detail, medicine_num, id, device_id)
                VALUE ('$medicine_name', '$medicine_tail', '$medicine_num', '$id', '$did')";

        if (mysqli_query($conn, $sql)) { 
            echo "<script>window.location.href='../medicine.php';</script>";
        } else { 
            echo "<script>alert('บันทึกข้อมูลยา ล้มเหลว!'); window.location.href='../home.php';</script>";
        }
    }
?>