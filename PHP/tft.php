<?php
    include 'conn.php';

    date_default_timezone_set("Asia/Bangkok");
    echo "\ntime=" . date("H:i");
    isset($_GET['device']);
    $a = $_GET['device'];

    if ($a > 0) {
    // Foreach data tb user
    foreach($conn->query("SELECT * FROM user WHERE id = '$a'") as $y) {
        echo "\nUserID=" . $y['id'];
        echo "\nName=" . $y['firstname'] . "\n " . $y['lastname'];
        echo "END";
    }

    // Medicine time Break fast
    foreach($conn -> query("SELECT * FROM tb_data_bf WHERE id = '$a'") as $bf) {
        $t_bf = substr($bf['time_bf'], 0, 5);
        $stt_bf = $bf['status_alert'];
        echo "\nstt_alert=" . $stt_bf;
        echo "\nBF=" . $t_bf;
    }

    // Medicine time Lunch
    foreach($conn -> query("SELECT * FROM tb_data_lunch WHERE id = '$a'") as $lun) {
        $t_lun = substr($lun['time_lunch'], 0, 5);
        $stt_lun = $lun['status_alert'];
        echo "\nstt_alert=" . $stt_lun;
        echo "\nLUN=" . $t_lun;
    }

    // Medicine time Dinner
    foreach($conn -> query("SELECT * FROM tb_data_dn WHERE id = '$a'") as $dn) {
        $t_dn = substr($dn['time_dn'], 0, 5);
        $stt_dn = $dn['status_alert'];
        echo "\nstt_alert=" . $stt_dn;
        echo "\nDN=" . $t_dn;
    }

    // Medicine time Before bed
    foreach($conn -> query("SELECT * FROM tb_data_bb WHERE id = '$a'") as $bb) {
        $t_bb = substr($bb['time_bb'], 0, 5);
        $stt_bb = $dn['status_alert'];
        echo "\nstt_alert=" . $stt_bb;
        echo "\nBB=" . $t_bb;
    }

    foreach($conn->query("SELECT * FROM tb_device WHERE id = '$a'") as $z) {
        $count = $z['count_medicine'];
        echo "\nCount_medicine=" . $count;
        echo "END";
    }}
?>