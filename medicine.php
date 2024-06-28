<!doctype html>
<html lang="en">
    <head>
        <title>ข้อมูลยาในเครื่องจ่ายยา</title>
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

        <!-- Insert Medicine -->
        <div class="container my-5 shadow p-4 rounded">
            <?php 
                $sql = "SELECT * FROM tb_device LEFT JOIN user ON user.id = tb_device.id WHERE tb_device.id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if ($row >= 1) { ?>
                    <h2 class="text-center">ตารางข้อมูลยา<br>
                    <button type="button" class="btn btn-success shadow my-3" data-toggle="modal" data-target="#medicine"><i class="ri-play-fill"></i> เพิ่มข้อมูลยา</button>
                    </h2>
                    <table class="table table-striped table-bordered text-center mt-3">
                        <thead>
                            <tr>
                                <th scope="col" class="w-25">ชื่อยา</th>
                                <th scope="col" class="w-25">ข้อมูลยา</th>
                                <th scope="col" class="w-25">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($conn->query("SELECT * FROM tb_medicine WHERE id = $id") as $z) { ?>
                            <tr>
                                <td><?php echo $z['medicine_name']; ?></td>
                                <td><?php echo $z['medicine_detail']; ?></td>
                                <td><?php echo $z['medicine_num']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <?php } else { ?>
                <h1 class="text-center text-danger">กรุณาเพิ่มข้อมูลเครื่องก่อน</h1>
            <?php } ?>
        </div>

        <!-- Modal Insert Medicine -->
        <div class="modal fade" id="medicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">จัดการ เพิ่มข้อมูลยา</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="php/chk_medicine.php">
                            <div class="mb-3 ">
                                <label for="dname" class="form-label">ชื่อยา</label>
                                <input type="text" class="form-control" name="mname" required>
                            </div>

                            <div class="mb-3">
                                <label for="dtail" class="form-label">รายละเอียดยายา</label>
                                <input type="text" class="form-control" name="mtail" required>
                            </div>

                            <div class="mb-3">
                                <label for="dline" class="form-label">จำนวน (เม็ด)</label>
                                <input type="text"  class="form-control" name="mnum" required>
                            </div>

                            <button type="submit" class="btn btn-success">ยืนยัน เพิ่มข้อมูลยา</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>