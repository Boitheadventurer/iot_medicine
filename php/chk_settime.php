<?php
    include 'conn.php';
    include 'chk_id.php';

    $search = "SELECT * FROM tb_device LEFT JOIN user ON user.id = tb_device.id WHERE tb_device.id = '$id'";
    $result = $conn->query($search);
    $row = $result->fetch_assoc();
    $did = $row['device_id'];

    isset($_POST['time']);
    isset($_POST['medicine1']) && isset($_POST['medicine2']);
    isset($_POST['medicine3']) && isset($_POST['medicine4']);

    $yes = "yes"; // Confirm 'Yes'

    $meal = $_SESSION['tb']; // title_tb
    $sett = $_SESSION['se']; // setting_tb
    $tile = $_SESSION['ts']; // time_tb

    $time = $_POST['time'];
    $med1 = $_POST['medicine1'];
    $med2 = $_POST['medicine2'];
    $med3 = $_POST['medicine3'];
    $med4 = $_POST['medicine4'];

    $sql = "INSERT INTO $meal ($sett, $tile, medicine_id, medicine_id2, medicine_id3, medicine_id4, device_id, id) 
            VALUE ('$yes', '$time', $med1, $med2, $med3, $med4, '$did', '$id')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('กำหนดจ่ายยา สำเร็จ!'); window.location.href='../home.php';</script>";
    } else { 
        echo "<script>alert('กำหนดจ่ายยา ล้มเหลว!'); window.location.href='../home.php';</script>";
    }

?>