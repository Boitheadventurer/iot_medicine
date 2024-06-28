<!doctype html>
<html lang="en">
    <head>
        <title>ตั้งค่ากำหนดจ่ายยา</title>
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
            option {
                background-color: #888;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <?php
            include 'php/chk_id.php';
            include 'php/navbar.php';
        ?>

        <!-- Condotion Meal Setting Time -->
        <?php 
            isset($_GET['set']);
            $getmeal = $_GET['set'];
            if ($getmeal == 'bf') { 
                $_SESSION['tb'] = "tb_data_bf";
                $_SESSION['se'] = "setting_bf";
                $_SESSION['ts'] = "time_bf";
                $txtshow = "ช่วงอาหารมื้อเช้า"; ?>
                <div class="container my-5 shadow p-4 rounded">
                    <h2 class="text-center">กำหนดข้อมูลจ่ายยา<p></p><?php echo $txtshow; ?></h2>
                    <form method="POST" action="php/chk_settime.php">
                        <div class="mb-3">
                            <label for="time" class="form-label">กำหนดเวลา</label>
                            <input type="time" class="form-control" id="tt" name="time" required>
                        </div>

                        <div class="mb-3">
                            <label for="medicine1" class="form-label">ยาที่บริโภค 1</label>
                            <select class="form-control" name="medicine1">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine2" class="form-label">ยาที่บริโภค 2</label>
                            <select class="form-control" name="medicine2">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine3" class="form-label">ยาที่บริโภค 3</label>
                            <select class="form-control" name="medicine3">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine4" class="form-label">ยาที่บริโภค 4</label>
                            <select class="form-control" name="medicine4">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">ยืนยัน ข้อมูลกำหนด<?php echo $txtshow; ?></button>
                    </form>
                </div>
        <?php } else if ($getmeal == 'lun') { 
                $_SESSION['tb'] = "tb_data_lunch";
                $_SESSION['se'] = "setting_lunch";
                $_SESSION['ts'] = "time_lunch";
                $txtshow = "ช่วงอาหารมื้อกลางวัน"; ?>
                <div class="container my-5 shadow p-4 rounded">
                    <h2 class="text-center">กำหนดข้อมูลจ่ายยา<p></p><?php echo $txtshow; ?></h2>
                    <form method="POST" action="php/chk_settime.php">
                        <div class="mb-3">
                            <label for="time" class="form-label">กำหนดเวลา</label>
                            <input type="time" class="form-control" id="tt" name="time" required>
                        </div>

                        <div class="mb-3">
                            <label for="medicine1" class="form-label">ยาที่บริโภค 1</label>
                            <select class="form-control" name="medicine1">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine2" class="form-label">ยาที่บริโภค 2</label>
                            <select class="form-control" name="medicine2">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine3" class="form-label">ยาที่บริโภค 3</label>
                            <select class="form-control" name="medicine3">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine4" class="form-label">ยาที่บริโภค 4</label>
                            <select class="form-control" name="medicine4">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">ยืนยัน ข้อมูลกำหนด<?php echo $txtshow; ?></button>
                    </form>
                </div>
        <?php } else if ($getmeal == 'dn') {
                $_SESSION['tb'] = "tb_data_dn";
                $_SESSION['se'] = "setting_dn";
                $_SESSION['ts'] = "time_dn";
                $txtshow = "ช่วงอาหารมื้อเย็น"; ?>
                <div class="container my-5 shadow p-4 rounded">
                    <h2 class="text-center">กำหนดข้อมูลจ่ายยา<p></p><?php echo $txtshow; ?></h2>
                    <form method="POST" action="php/chk_settime.php">
                        <div class="mb-3">
                            <label for="time" class="form-label">กำหนดเวลา</label>
                            <input type="time" class="form-control" id="tt" name="time" required>
                        </div>

                        <div class="mb-3">
                            <label for="medicine1" class="form-label">ยาที่บริโภค 1</label>
                            <select class="form-control" name="medicine1">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine2" class="form-label">ยาที่บริโภค 2</label>
                            <select class="form-control" name="medicine2">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine3" class="form-label">ยาที่บริโภค 3</label>
                            <select class="form-control" name="medicine3">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine4" class="form-label">ยาที่บริโภค 4</label>
                            <select class="form-control" name="medicine4">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">ยืนยัน ข้อมูลกำหนด<?php echo $txtshow; ?></button>
                    </form>
                </div>
        <?php } else if ($getmeal == 'bb') { 
                $_SESSION['tb'] = "tb_data_bb";
                $_SESSION['se'] = "setting_bb";
                $_SESSION['ts'] = "time_bb";
                $txtshow = "ช่วงก่อนนอน"; ?>
                <div class="container my-5 shadow p-4 rounded">
                    <h2 class="text-center">กำหนดข้อมูลจ่ายยา<p></p><?php echo $txtshow; ?></h2>
                    <form method="POST" action="php/chk_settime.php">
                        <div class="mb-3">
                            <label for="time" class="form-label">กำหนดเวลา</label>
                            <input type="time" class="form-control" id="tt" name="time" required>
                        </div>

                        <div class="mb-3">
                            <label for="medicine1" class="form-label">ยาที่บริโภค 1</label>
                            <select class="form-control" name="medicine1">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine2" class="form-label">ยาที่บริโภค 2</label>
                            <select class="form-control" name="medicine2">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine3" class="form-label">ยาที่บริโภค 3</label>
                            <select class="form-control" name="medicine3">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="medicine4" class="form-label">ยาที่บริโภค 4</label>
                            <select class="form-control" name="medicine4">
                                <option selected value="NULL">---</option>
                                <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                                <option value="<?php echo $z['medicine_id'] ?>"><?php echo $z['medicine_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">ยืนยัน ข้อมูลกำหนด<?php echo $txtshow; ?></button>
                    </form>
                </div>
        <?php } ?>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                                    
    </body>
</html>