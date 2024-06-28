<!doctype html>
<html lang="en">
    <head>
        <title>ข้อมูลเครื่องจ่ายยา</title>
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
            .container {
                background-color: white;
                max-width: 800px;
                width: 90%;
            }
        </style>
    </head>
    <body>
        <?php
            include 'php/chk_id.php';
            include 'php/navbar.php';
        ?>

        <?php 
            $sql = "SELECT * FROM tb_device LEFT JOIN user ON user.id = tb_device.id WHERE tb_device.id = '$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row <= 0) { ?>
                <div class="container my-5 shadow p-4 rounded">
                    <h2 class="text-center">ข้อมูลเครื่องจ่ายยา</h2>
                    <form method="POST" action="php/chk_device.php">
                        <div class="mb-3">
                            <label for="dname" class="form-label">ตั้งชื่อเครื่องจ่ายยา</label>
                            <input type="text" class="form-control" name="dname" required>
                        </div>

                        <div class="mb-3">
                            <label for="dtail" class="form-label">รายละเอียดเพิ่มเติม</label>
                            <input type="text" class="form-control" name="dtail" required>
                        </div>

                        <div class="mb-3">
                            <label for="dline" class="form-label text-danger">*หมายเลขโทเคน เครื่องจ่ายยา</label>
                            <input type="text"  class="form-control" name="dline" required>
                        </div>

                        <button type="submit" class="btn btn-success">ยืนยันเปิดใช้งานเครื่อง</button>
                    </form>
                </div>
        <?php } else { ?>
            <div class="container my-5 shadow p-4 rounded">
                <h2 class="text-center">ข้อมูลเครื่องจ่ายยา</h2>
                <form method="POST" action="php/chk_device.php">
                    <div class="my-3">
                        <label for="dname" class="form-label">เครื่องจ่ายยา</label>
                        <input type="text" class="form-control" name="dname" value="<?php echo $row['device_name']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="dtail" class="form-label">รายละเอียดเพิ่มเติม</label>
                        <input type="text" class="form-control" name="dtail" value="<?php echo $row['device_detail']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="dline" class="form-label text-danger">*หมายเลขโทเคน เครื่องจ่ายยา</label>
                        <input type="text"  class="form-control" name="dline" value="<?php echo $row['token_line']; ?>" readonly>
                    </div>
                </form>
            </div>
        <?php } ?>

        <div class="container my-5 shadow p-4 rounded">
            <h2 class="text-center">ประวัติการทำงานเครื่องจ่ายยา</h1>
            <h5 class="mt-3">การตั้งค่า</h5>
            <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col" class="w-25">ช่วงเช้า</th>
                        <th scope="col" class="w-25">ช่วงกลางวัน</th>
                        <th scope="col" class="w-25">ช่วงเย็น</th>
                        <th scope="col" class="w-25">ช่วงก่อนนอน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php foreach($conn->query("SELECT * FROM tb_data_bf WHERE id = $id") as $z) {
                            echo substr($z['time_bf'], 0, 5);} ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM tb_data_lunch WHERE id = $id") as $z) {
                            echo substr($z['time_lunch'], 0, 5);} ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM tb_data_dn WHERE id = $id") as $z) {
                            echo substr($z['time_dn'], 0, 5);} ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM tb_data_bb WHERE id = $id") as $z) {
                            echo substr($z['time_bb'], 0, 5);} ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <?php foreach($conn->query("SELECT * FROM tb_data_bf WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'] . "<br>";
                            }
                            
                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo $ech_2['medicine_name'] . "<br>";
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo $ech_3['medicine_name'] . "<br>";
                            }
                            
                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo $ech_4['medicine_name'];
                            }}?>
                        </td>
                        <td>
                        <?php foreach($conn->query("SELECT * FROM tb_data_lunch WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'] . "<br>";
                            }

                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo $ech_2['medicine_name'] . "<br>";
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo $ech_3['medicine_name'] . "<br>";
                            }

                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo $ech_4['medicine_name'];
                            }}?>
                        </td>
                        <td>
                        <?php foreach($conn->query("SELECT * FROM tb_data_dn WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'] . "<br>";
                            }

                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo $ech_2['medicine_name'] . "<br>";
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo $ech_3['medicine_name'] . "<br>";
                            }

                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo $ech_4['medicine_name'];
                            }}?>
                        </td>
                        <td>
                        <?php foreach($conn->query("SELECT * FROM tb_data_bb WHERE id = '$id'") as $z) {
                            $r1 = $z['medicine_id'];
                            $r2 = $z['medicine_id2'];
                            $r3 = $z['medicine_id3'];
                            $r4 = $z['medicine_id4'];

                            if ($r1 != NULL) {
                                $sql_1 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r1'");
                                $ech_1 = $sql_1->fetch_assoc();
                                echo $ech_1['medicine_name'] . "<br>";
                            }

                            if ($r2 != NULL) {
                                $sql_2 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r2'");
                                $ech_2 = $sql_2->fetch_assoc();   
                                echo $ech_2['medicine_name'] . "<br>";
                            }

                            if ($r3 != NULL) {
                                $sql_3 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r3'");
                                $ech_3 = $sql_3->fetch_assoc();
                                echo $ech_3['medicine_name'] . "<br>";
                            }

                            if ($r4 != NULL) {
                                $sql_4 = $conn->query("SELECT * FROM tb_medicine WHERE medicine_id = '$r4'");
                                $ech_4 = $sql_4->fetch_assoc();
                                echo $ech_4['medicine_name'];
                            }}?>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
            
            <h5 class="mt-4">ประวัติการทำงานเครื่อง</h5>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ช่วงรับยา</th>
                        <th scope="col">เวลารับยา</th>
                        <th scope="col">ผลลัพธ์</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($conn->query("SELECT * FROM tb_data_eat_medicine WHERE id = $id") as $z) { ?>
                    <tr>
                        <td><?php if ($z['bf_id'] != NULL) {
                                echo "ช่วงเช้า";
                            } else if ($z['lunch_id'] != NULL) {
                                echo "ช่วงกลางวัน";
                            } else if ($z['dn_id'] != NULL) {
                                echo "ช่วงเย็น";
                            } else if ($z['bb_id'] != NULL) {
                                echo "ช่วงก่อนนอน";
                            }?>
                        </td>
                        <td>    
                            <?php echo $z['time_get']; ?>
                        </td>
                        <td><?php if ($z['medicine_get'] != "success") {
                                echo "<div class='text-danger'>" . "รับยาไม่สำเร็จ" . "</div>";
                            } else {
                                echo "<div class='text-success'>" . "รับยาสำเร็จ" . "</div>";
                            } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>