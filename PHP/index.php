<!doctype html>
<html lang="en">
    <head>
        <title>Medicine_IOT</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="https://icon-library.com/images/medic-icon/medic-icon-28.jpg">
        <style>
            body {
                background-color: #f0f0f2;
            }
            .container {
                background-color: white;
                max-width: 800px;
                width: 90%;
            }
            li {
                margin-top: 3%;
            }
        </style>
        <?php
            include 'conn.php';
            $a = 1; // Test (Get data from INPUT FORM website)
        ?>
    </head>
    <body>
        <div class="container my-5 shadow p-5 rounded">
            <h1>Welcome, <?php foreach($conn->query("SELECT * FROM `user` WHERE `id` = $a") as $z) {
                            echo $z['firstname'] . " " . $z['lastname'];
                        } ?></h1>
            <h5>This is Subdomain medicine5iot</h5>
            <!-- PHP file
            <h5>
                <ul>
                    <li><a href="conn.php" target="_blank">conn.php</a></li>
                    <li><a href="get.php" target="_blank">get.php</a></li>
                    <li><a href="post.php" target="_blank">post.php</a></li>
                    <li><a href="tft.php" target="_blank">tft.php</a></li>
                    <li><a href="upd.php" target="_blank">upd.php</a></li>
                </ul>
            </h5>
            -->
            <h5 class="mt-5">Setting</h5>
            <table class="table table-striped border text-center">
                <thead>
                    <tr>
                        <th scope="col">BBF</th>
                        <th scope="col">LUN</th>
                        <th scope="col">DNR</th>
                        <th scope="col">BED</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php foreach($conn->query("SELECT * FROM `tb_data_bf` WHERE `id` = $a") as $z) {
                            echo $z['time_bf']; } ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM `tb_data_lunch` WHERE `id` = $a") as $z) {
                            echo $z['time_lunch'];} ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM `tb_data_dn` WHERE `id` = $a") as $z) {
                            echo $z['time_dn'];} ?>
                        </td>
                        <td><?php foreach($conn->query("SELECT * FROM `tb_data_bb` WHERE `id` = $a") as $z) {
                            echo $z['time_bb'];} ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <h5 class="mt-5">History</h5>
            <table class="table table-striped table-hover border text-center">
                <thead>
                    <tr>
                        <th scope="col">Meal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Time</th>
                    </tr>
                </thead>
                <?php foreach($conn->query("SELECT * FROM `tb_data_eat_medicine` WHERE `id` = $a") as $z) { ?>
                <tbody>
                    <tr>
                        <td><?php if ($z['bf_id'] != NULL) {
                                echo "BFF";
                            } else if ($z['lunch_id'] != NULL) {
                                echo "LUN";
                            } else if ($z['dn_id'] != NULL) {
                                echo "DNR";
                            } else if ($z['bb_id'] != NULL) {
                                echo "BED";
                            } else { echo "Err";
                            } ?>
                        </td>
                        <td>
                            <?php if ($z['medicine_get'] != "success") {
                                    echo "<div class='text-danger'>" . $z['medicine_get'] . "</div>";
                                } else {
                                    echo "<div class='text-success'>" . $z['medicine_get'] . "</div>";
                                } ?>
                        </td>
                        <td>
                            <?php echo $z['time_get']; ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>