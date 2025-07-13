<?php
    include 'conn.php';

    date_default_timezone_set("Asia/Bangkok");
    echo "\ntime=" . date("H:i");
    isset($_GET['device']);
    $a = $_GET['device'];
    
    if ($a > 0) {
    // SQL GET UserID
    foreach($conn->query("SELECT * FROM user WHERE id = '$a'") as $z) {
        echo "\nUserID=" . $z['id'] . "|<br>";
        echo "\nFullname=" . $z['firstname'] . " " . $z['lastname'] . "|<br>";
    } 

    // SQL GET TOKEN LINE
    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        echo "\nToken=" . $z['token_line'] . "|<br>";
        echo "\nDelay=" . $z['alert_delay'] . "|<br>";
    } 
    
    // SQL GET bf_time
    foreach($conn->query("SELECT * FROM tb_data_bf WHERE id = '$a'") as $z) {
        $bf_time = substr($z['time_bf'], 0, 5);
        $bf_medic1 = $z['medicine_id'];
        if ($bf_medic1 == "") {
            $bf_medic1 = "NULL";
        }
        $bf_medic2 = $z['medicine_id2'];
        if ($bf_medic2 == "") {
            $bf_medic2 = "NULL";
        }
        $bf_medic3 = $z['medicine_id3'];
        if ($bf_medic3 == "") {
            $bf_medic3 = "NULL";
        }
        $bf_medic4 = $z['medicine_id4'];
        if ($bf_medic4 == "") {
            $bf_medic4 = "NULL";
        }
        echo "\nbf_time=" . $bf_time;
        echo "\nbf_medic1=" . $bf_medic1;
        echo "\nbf_medic2=" . $bf_medic2;
        echo "\nbf_medic3=" . $bf_medic3;
        echo "\nbf_medic4=" . $bf_medic4;
    }

    // SQL GET lun_time
    foreach($conn->query("SELECT * FROM tb_data_lunch WHERE id = '$a'") as $z) {
        $lun_time = substr($z['time_lunch'], 0, 5);
        $lun_medic1 = $z['medicine_id'];
        if ($lun_medic1 == "") {
            $lun_medic1 = "NULL";
        }
        $lun_medic2 = $z['medicine_id2'];
        if ($lun_medic2 == "") {
            $lun_medic2 = "NULL";
        }
        $lun_medic3 = $z['medicine_id3'];
        if ($lun_medic3 == "") {
            $lun_medic3 = "NULL";
        }
        $lun_medic4 = $z['medicine_id4'];
        if ($lun_medic4 == "") {
            $lun_medic4 = "NULL";
        }
        echo "\nlun_time=" . $lun_time;
        echo "\nlun_medic1=" . $lun_medic1;
        echo "\nlun_medic2=" . $lun_medic2;
        echo "\nlun_medic3=" . $lun_medic3;
        echo "\nlun_medic4=" . $lun_medic4;
    }

    // SQL GET dn_time
    foreach($conn->query("SELECT * FROM `tb_data_dn` WHERE id = '$a'") as $z) {
        $dn_time = substr($z['time_dn'], 0, 5);
        $dn_medic1 = $z['medicine_id'];
        if ($dn_medic1 == "") {
            $dn_medic1 = "NULL";
        }
        $dn_medic2 = $z['medicine_id2'];
        if ($dn_medic2 == "") {
            $dn_medic2 = "NULL";
        }
        $dn_medic3 = $z['medicine_id3'];
        if ($dn_medic3 == "") {
            $dn_medic3 = "NULL";
        }
        $dn_medic4 = $z['medicine_id4'];
        if ($dn_medic4 == "") {
            $dn_medic4 = "NULL";
        }
        echo "\ndn_time=" . $dn_time;
        echo "\ndn_medic1=" . $dn_medic1;
        echo "\ndn_medic2=" . $dn_medic2;
        echo "\ndn_medic3=" . $dn_medic3;
        echo "\ndn_medic4=" . $dn_medic4;
    }

    // SQL GET bb_time
    foreach($conn->query("SELECT * FROM tb_data_bb WHERE id = '$a'") as $z) {
        $bb_time = substr($z['time_bb'], 0, 5);
        $bb_medic1 = $z['medicine_id'];
        if ($bb_medic1 == "") {
            $bb_medic1 = "NULL";
        }
        $bb_medic2 = $z['medicine_id2'];
        if ($bb_medic2 == "") {
            $bb_medic2 = "NULL";
        }
        $bb_medic3 = $z['medicine_id3'];
        if ($bb_medic3 == "") {
            $bb_medic3 = "NULL";
        }
        $bb_medic4 = $z['medicine_id4'];
        if ($bb_medic4 == "") {
            $bb_medic4 = "NULL";
        }
        echo "\nbb_time=" . $bb_time;
        echo "\nbb_medic1=" . $bb_medic1;
        echo "\nbb_medic2=" . $bb_medic2;
        echo "\nbb_medic3=" . $bb_medic3;
        echo "\nbb_medic4=" . $bb_medic4;
    }

    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        $count = $z['count_medicine'];
        echo "\nCount_medicine=" . $count . "|<br>";
    }

    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        $count = $z['modesend'];
        echo "\nmodesend=" . $count . "|<br>";
    }

    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        $count = $z['mode_sound'];
        echo "\nMode_sound=" . $count . "|<br>";
    }

    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        $count = $z['mode_setting'];
        echo "\nmode_setting=" . $count . "|<br>";
    }}
?>
