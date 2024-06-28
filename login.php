<!doctype html>
<html lang="en">
    <head>
        <title>เข้าสู่ระบบ</title>
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
            *{
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
            // SESSION CHK
            include 'php/conn.php';
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM user WHERE id = '$id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                if ($result->num_rows > 0) {
                    echo "<script>window.location.href='home.php';</script>";
                }
            } else {
                //echo "User ID is not set.";
            }
        ?>
        <div class="container my-5 shadow p-4 rounded">
            <a href="index.php" type="button" class="btn btn-warning mb-3"><i class="ri-arrow-go-back-fill"></i> ย้อนกลับ</a>
            <h3 class="text-center">เข้าสู่ระบบ</h3>
            <form method="POST" action="php/chk_login.php">

                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="text" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="pasword" class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="pasword" required>
                </div>

                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
            </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>