<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#"><?php echo $row['firstname'] . " " . $row['lastname']; ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>   
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item nn">
        <a class="nav-link text-dark" href="home.php"><i class="ri-home-4-line"></i> หน้าหลัก</a>
    </li>
    <li class="nav-item nn">
        <a class="nav-link text-dark" href="medicine.php"><i class="ri-capsule-fill"></i> ข้อมูลยา</a>
    </li>
    <li class="nav-item nn">
        <a class="nav-link text-dark" href="device.php"><i class="ri-hard-drive-2-line"></i> ข้อมูลเครื่อง</a>
    </li>
    <li class="nav-item dropdown nn">
        <a class="nav-link  dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-time-line"></i> กำหนดเวลา
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php $sql = "SELECT * FROM tb_data_bf WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row <= 0) { ?>
            <a class="dropdown-item" href="settime.php?set=bf">กำหนด ช่วงเช้า</a>
            <div class="dropdown-divider"></div>
        <?php } else { ?>
            <a class="dropdown-item" href="#">แก้ไข ช่วงเช้า</a>
            <div class="dropdown-divider"></div>
        <?php } ?>

        <?php $sql = "SELECT * FROM tb_data_lunch WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row <= 0) { ?>
            <a class="dropdown-item" href="settime.php?set=lun">กำหนด ช่วงกลางวัน</a>
            <div class="dropdown-divider"></div>
        <?php } else { ?>
            <a class="dropdown-item" href="#">แก้ไข ช่วงกลางวัน</a>
            <div class="dropdown-divider"></div>
        <?php } ?>

        <?php $sql = "SELECT * FROM tb_data_dn WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row <= 0) { ?>
            <a class="dropdown-item" href="settime.php?set=dn">กำหนด ช่วงเย็น</a>
            <div class="dropdown-divider"></div>
        <?php } else { ?>
            <a class="dropdown-item" href="#">แก้ไข ช่วงเย็น</a>
            <div class="dropdown-divider"></div>
        <?php } ?>

        <?php $sql = "SELECT * FROM tb_data_bb WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($row <= 0) { ?>
            <a class="dropdown-item" href="settime.php?set=bb">กำหนด ช่วงก่อนนอน</a>
        <?php } else { ?>
            <a class="dropdown-item" href="#">แก้ไข ช่วงก่อนนอน</a>
            <div class="dropdown-divider"></div>
        <?php } ?>

        </div>
    </li>
    <li class="nav-item nn">
        <a href="php/logout.php" type="button" class="btn btn-danger"><i class="ri-logout-box-line"></i> ออกจากระบบ</a>
    </li>
    </ul>
</div>
</nav>
