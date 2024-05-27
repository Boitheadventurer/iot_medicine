<?php
include 'conn.php';

// Get values from ESP8266
if (isset($_POST["UserID"]) && isset($_POST["Clect"]) && isset($_POST["key_get"]) ) {

    $id     = $_POST["UserID"];     // UserID
    $meal   = $_POST["Clect"];    // Meal
    $t      = $_POST["key_get"];     // Time from keypad setting mode

    $key_get = substr($t, 0, -1) . "00";       //Substr cut '*' out and add ':'

    if ($meal == "BBF") {
        $select = "tb_data_bf";
        $tt     = "time_bf";
        $ttin   = "bf_id";
    } else if ($meal == "LUN") {
        $select = "tb_data_lunch";
        $tt     = "time_lunch";
        $ttin   = "lunch_id";
    } else if ($meal == "DNR") {
        $select = "tb_data_dn";
        $tt     = "time_dn";
        $ttin   = "dn_id";
    } else if ($meal == "BED") {
        $select = "tb_data_bb";
        $tt     = "time_bb";
        $ttin   = "bb_id";
    } else {
        $select = "Err";
        $tt     = "Err";
        $ttin   = "Err";
    }

    //echo "$id " . " $select " . " $tt " . " $ttin " . " $key_get";      //Check data send

    $sql = "UPDATE $select SET $tt = '$key_get' WHERE $select.$ttin = $id";

    // Show response
    if (mysqli_query($conn, $sql)) { 
        echo "\nUserID = " . $id . 
            "\nMeal = " . $meal . 
            "\nTime_setting = " . $key_get;
    } else { 
        echo "\nError: " . $sql . "<br>" . mysqli_error($conn); 
    }
}
?>
