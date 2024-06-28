<?php
include 'conn.php';
include 'chk_id.php';

date_default_timezone_set("Asia/Bangkok");
echo "\ntime=" . date("H:i");
$a = $_SESSION['id'];
if ($a <= 0) {
    echo "UserID Not Found";
}

// Foreach data tb user
foreach($conn->query("SELECT * FROM user WHERE id = '$a'") as $y) {
    echo "\nUserID=" . $y['id'];
    echo "\nName=" . $y['firstname'] . "\n " . $y['lastname'];
}

// Medicine time Break fast
foreach($conn -> query("SELECT * FROM tb_data_bf WHERE id = '$a'") as $bf) {
    if ($bf['setting_bf'] != "yes") {
        $st_bf = 0;
    } else {
        $st_bf = 1;
    }
    $t_bf = substr($bf['time_bf'], 0, 5);
    echo "\nst_bf=" . $st_bf;
    echo "\nBF=" . $t_bf;
}

// Medicine time Lunch
foreach($conn -> query("SELECT * FROM tb_data_lunch WHERE id = '$a'") as $lun) {
    if ($lun['setting_lunch'] != "yes") {
        $st_lun = 0;
    } else { 
        $st_lun = 1; 
    }
    $t_lun = substr($lun['time_lunch'], 0, 5);
    echo "\nst_lun=" . $st_lun;
    echo "\nLUN=" . $t_lun;
}

// Medicine time Dinner
foreach($conn -> query("SELECT * FROM tb_data_dn WHERE id = '$a'") as $dn) {
    if ($dn['setting_dn'] != "yes") {
        $st_dn = 0;
    } else { 
        $st_dn = 1; 
    }
    $t_dn = substr($dn['time_dn'], 0, 5);
    echo "\nst_dn=" . $st_dn;
    echo "\nDN=" . $t_dn;
}

// Medicine time Before bed
foreach($conn -> query("SELECT * FROM tb_data_bb WHERE id = '$a'") as $bb) {
    if ($bb['setting_bb'] != "yes") {
        $st_bb = 0;
    } else { 
        $st_bb = 1; 
    }
    $t_bb = substr($bb['time_bb'], 0, 5);
    echo "\nst_bb=" . $st_bb;
    echo "\nBB=" . $t_bb;
}
?>