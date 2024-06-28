<!doctype html>
<html lang="en">
    <head>
        <title>หน้าหลัก</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Remix Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
        <!-- Icon Title -->
        <link rel="icon" type="image/x-icon" href="https://icon-library.com/images/medic-icon/medic-icon-28.jpg">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
            body {
                background-color: #e0e0e0;
            }
            * {
                margin: 0;
                padding: 0;
                font-family: "Bai Jamjuree", sans-serif;
            }
            .inf {
                margin: 0 0 0 10%;
            }
            .indeximage {
                width: 100%;
                min-width: 250px;
                max-width: 550px;
            }
            .card {
                width: 100%;
                min-width: 250px;
                max-width: 450px;
                margin: 0 auto;
                float: none;
            }
            @media only screen and (max-width: 1000px){
                .indeximage {
                    display: block;
                    width: 100%;
                    margin: 0 auto;
                }
                .mainsection .row {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }
                .inf {
                    margin: 5% 0;
                }
            }
        </style>
    </head>
    <body>
        <?php
            include 'php/chk_id.php';   
            include 'php/navbar.php';
        ?>
        <!-- Banner Title -->
        <div class="mainsection text-light bg-dark p-4">
            <div class="row align-items-center">
                <div class="col">
                    <div class="inf">
                        <h1 class="font-weight-bold display-4">เครื่องจ่ายยาอัตโนมัติ</h1>
                        <p>
                        โปรเจกต์เครื่องจ่ายยาอัตโนมัติจัดทำขั้นมาเพื่ออำนวยความสะดวกแก่ผู้ที่รับประทานยาประจำหรือคนที่มีโรคประจำตัว ทำให้ให้การรับประทานยาสะดวกมากขั้นด้วยการให้ยาตามเวลาที่กำหนดโดยจะมีการแจ้งเตือนตามการทำงาน
                        </p>
                        <a href="pdf/คู่มือเครื่องจ่ายยา.pdf" type="button" class="btn btn-light shadow" download><i class="ri-info-i"></i> รายละเอียด</a>
                        <a href="https://www.youtube.com/watch?v=yIoUpd4DK3M" target="_blank" type="button" class="btn btn-outline-light shadow"><i class="ri-play-fill"></i> วิธีการใช้งาน</a>
                    </div>
                </div>
                <div class="col text-center">
                    <img src="image/pill.jpg" alt="โมเดลออกแบบเครื่องจ่ายยา" class="indeximage img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>

        <!-- Dash Data Setting -->
        <div class="row my-4 mx-auto">
            <div class="col">
            <?php $sql = "SELECT * FROM tb_data_bf WHERE id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row >= 1) { ?>
                <div class="card rounded shadow p-4 my-1">
                <img class="card-img" src="image/medicine.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">การตั้งค่าช่วงเช้า</h5>
                        <p class="card-text">กำหนดจ่ายยาเวลา : <b><?php echo $row['time_bf']; ?></b>1<br>
                        <?php foreach($conn->query("SELECT * FROM tb_data_bf WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'];
                            }
                            
                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo ", " . $ech_2['medicine_name'];
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo ", " .  $ech_3['medicine_name'];
                            }
                            
                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo ", " .  $ech_4['medicine_name'];
                            }} ?> </p>
                            <a href="#" class="btn btn-info">แก้ไข</a>
                    </div>
                </div>
            <?php } ?>  
            </div>
            <div class="col">
            <?php $sql = "SELECT * FROM tb_data_lunch WHERE id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row >= 1) { ?>
                <div class="card rounded shadow p-4 my-1">
                <img class="card-img" src="image/medicine.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">การตั้งค่าช่วงกลางวัน</h5>
                        <p class="card-text">กำหนดจ่ายยาเวลา : <b><?php echo $row['time_lunch']; ?></b><br>
                        <?php foreach($conn->query("SELECT * FROM tb_data_lunch WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'];
                            }
                            
                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo ", " . $ech_2['medicine_name'];
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo ", " . $ech_3['medicine_name'];
                            }
                            
                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo ", " . $ech_4['medicine_name'];
                            }} ?> </p>
                            <a href="#" class="btn btn-info">แก้ไข</a>
                    </div>
                </div>
            <?php } ?>  
            </div>
            <div class="col">
            <?php $sql = "SELECT * FROM tb_data_dn WHERE id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row >= 1) { ?>
                <div class="card rounded shadow p-4 my-1">
                <img class="card-img" src="image/medicine.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">การตั้งค่าช่วงเย็น</h5>
                        <p class="card-text">กำหนดจ่ายยาเวลา : <b><?php echo $row['time_dn']; ?></b><br>
                        <?php foreach($conn->query("SELECT * FROM tb_data_dn WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'];
                            }
                            
                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo ", " . $ech_2['medicine_name'];
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo ", " . $ech_3['medicine_name'];
                            }
                            
                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo ", " . $ech_4['medicine_name'];
                            }} ?> </p>
                            <a href="#" class="btn btn-info">แก้ไข</a>
                    </div>
                </div>
            <?php } ?>  
            </div>
            <div class="col">
            <?php $sql = "SELECT * FROM tb_data_bb WHERE id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row >= 1) { ?>
                <div class="card rounded shadow p-4 my-1">
                <img class="card-img" src="image/medicine.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">การตั้งค่าก่อนนอน</h5>
                        <p class="card-text">กำหนดจ่ายยาเวลา : <b><?php echo $row['time_bb']; ?></b><br>
                        <?php foreach($conn->query("SELECT * FROM tb_data_bb WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'];
                            }
                            
                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo ", " . $ech_2['medicine_name'];
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo ", " . $ech_3['medicine_name'];
                            }
                            
                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo ", " . $ech_4['medicine_name'];
                            }} ?> </p>
                            <a href="#" class="btn btn-info">แก้ไข</a>
                    </div>
                </div>
            <?php } ?>  
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>