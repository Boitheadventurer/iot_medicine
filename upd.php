<?php
    include 'conn.php';

    // รับค่าจาก ESP8266
    if (isset($_POST["UserID"]) && isset($_POST["Clect"]) && isset($_POST["key_get"])) {

        $id     = $_POST["UserID"];     // UserID
        $meal   = $_POST["Clect"];      // Meal
        $t      = $_POST["key_get"];    // เวลา

        $key_get = substr($t, 0, -1) . "00"; // ลบ '*' แล้วเพิ่ม '00'

        // เลือกตารางและคอลัมน์ตามค่า meal
        if ($meal == "BKF") {
            $select = "tb_data_bf";
            $tt     = "time_bf";
        } else if ($meal == "LUN") {
            $select = "tb_data_lunch";
            $tt     = "time_lunch";
        } else if ($meal == "DNR") {
            $select = "tb_data_dn";
            $tt     = "time_dn";
        } else if ($meal == "BED") {
            $select = "tb_data_bb";
            $tt     = "time_bb";
        }

        $search = "SELECT * FROM tb_device LEFT JOIN user ON user.id = tb_device.id WHERE tb_device.id = '$id'";
        $result = $conn->query($search);
        $row = $result->fetch_assoc();
        $did = $row['device_id'];

        $check_sql = "SELECT id FROM $select WHERE id = '$id'";
        $result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result) > 0) {
            // ถ้ามีข้อมูลอยู่แล้ว UPDATE
            $sql = "UPDATE $select SET $tt = '$key_get' WHERE id = '$id'";
            $operation = "อัปเดต";
        } else {
            // ถ้าไม่มีข้อมูล INSERT
            $sql = "INSERT INTO $select ($tt, status_alert, device_id, id) 
                    VALUE ('$key_get', 'ON', '$did', '$id')";
            $operation = "เพิ่มข้อมูลใหม่";
        }

        // แสดงผลลัพธ์
        if (mysqli_query($conn, $sql)) {
            echo "\n$operation สำเร็จ:" .
                "\nUserID = " . $id .
                "\nMeal = " . $meal .
                "\nTime_setting = " . $key_get;
        } else {
            echo "\nเกิดข้อผิดพลาด: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else if (isset($_POST["UserID"])) {
        $id = $_POST["UserID"];

        $deleteQueries = [
            "DELETE FROM tb_data_bf WHERE id = '$id'",
            "DELETE FROM tb_data_lunch WHERE id = '$id'",
            "DELETE FROM tb_data_dn WHERE id = '$id'",
            "DELETE FROM tb_data_bb WHERE id = '$id'"
        ];

        foreach ($deleteQueries as $query) {
            if (!$conn->query($query)) {
                echo "เกิดข้อผิดพลาด: " . $conn->error;
            }
        }

        echo "ลบข้อมูลตั้งกำหนดเวลาจ่ายยาของ $id เคลียหมดแล้ว";
    }
