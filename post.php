<?php
include 'conn.php';

// SQL UPDATE data
//$ud = "SELECT SUM(count_medicine) FROM tb_data_eat_medicine WHERE medicine_id = $a";
//echo $ud;

// Get values from ESP8266
if (isset($_POST["UserID"]) && isset($_POST["meal"]) &&
    isset($_POST["medic_send1"]) && isset($_POST["medic_send2"]) &&
    isset($_POST["medic_send3"]) && isset($_POST["medic_send4"]) &&
    isset($_POST["status"]) ) {

    $id = $_POST["UserID"];                 // UserID
    $meal = $_POST["meal"];                 // Meal for send data_tb
    $medic1 = $_POST["medic_send1"];
    $medic2 = $_POST["medic_send2"];
    $medic3 = $_POST["medic_send3"];
    $medic4 = $_POST["medic_send4"];
    $stt = $_POST["status"];                // Status take medicine

    if ($medic1 == 0) {
        $medic1 = "NULL";
    }
    if ($medic2 == 0) {
        $medic2 = "NULL";
    }
    if ($medic3 == 0) {
        $medic3 = "NULL";
    }
    if ($medic4 == 0) {
        $medic4 = "NULL";
    }

    // Switch meal  
    switch ($meal) {
        case 1:
            $select = "bf_id";
            break;
        case 2:
            $select = "lunch_id";
            break;
        case 3:
            $select = "dn_id";
            break;
        case 4:
            $select = "bb_id";
            break;
        default:
            echo "Error: " . $meal;
    }
    
    // SQL INSERT data
    $sql = "INSERT INTO tb_data_eat_medicine
    ($select, device_id, 
    medicine_id, medicine_id2, medicine_id3, medicine_id4,
    id, medicine_get, count_medicine)
    VALUES ($id, $id, 
    $medic1, $medic2, $medic3, $medic4,
    $id, $stt, 1)";

    // Show response
    if (mysqli_query($conn, $sql)) { 
        echo "\nUserID = " . $id . 
        "\nMeal = " . $select . 
        "\nStatus = " . $stt;
    } else { 
        echo "\nError: " . $sql . "<br>" . mysqli_error($conn); 
    }
}
?>1