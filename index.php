<!doctype html>
<html lang="en">
    <head>
        <title>เครื่องจ่ายยาอัตโนมัติ</title>
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
            *{
                margin: 0;
                padding: 0;
                font-family: "Bai Jamjuree", sans-serif;
            }
            .mainsection{
                background-color: #E9E9E9;
            }
            .inf{
                margin: 0 0 0 10%;
            }
            .indeximage{
                width: 100%;
                min-width: 250px;
                max-width: 550px;
            }
            @media only screen and (max-width: 1000px){
                .indeximage{
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

        <!-- Nav bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h2 class="navbar-brand pl-2">เครื่องจ่ายยา<span class="text-danger">อัตโนมัติ</span></h2>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-outline-danger mr-1" type="button">เข้าสู่ระบบ</a>
                    <a href="signup.php" class="btn btn-danger" type="button">สมัครเข้าใช้งาน</a>
                </div>
            </div>
        </nav>

        <div class="mainsection p-4">
            <div class="row align-items-center">
                <div class="col">
                    <div class="inf">
                        <h1 class="font-weight-bold display-4">โปรเจกต์เครื่องจ่ายยา<span class="text-danger">อัตโนมัติ</span></h1>
                        <h4 class="font-weight-bold">By CTN Phrae</h4>
                        <p>
                        แผนกเทคนิคคอมพิวเตอร์ วิทยาลัยเทคนิคแพร่ <br>ตั้งอยู่เลขที่ 5 ถนนเหมืองหิต ตำบลในเวียง อำเภอเมืองแพร่ จังหวัดแพร่ รหัสไปรษณีย์ 54000 <br>
                        </p>
                        <a href="pdf/คู่มือเครื่องจ่ายยา.pdf" type="button" class="btn btn-danger shadow" download><i class="ri-info-i"></i> รายละเอียด</a>
                        <a href="https://www.youtube.com/watch?v=yIoUpd4DK3M" target="_blank" type="button" class="btn btn-outline-danger shadow"><i class="ri-play-fill"></i> วิธีการใช้งาน</a>
                    </div>
                </div>
                <div class="col text-center">
                    <img src="image/d5.png" alt="โมเดลออกแบบเครื่องจ่ายยา" class="indeximage img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>

        <!-- Modal Video -->
        <div class="modal fade bd-example-modal-xl" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">วิธีการใช้งาน เว็บไซต์เครื่องจ่ายยาอัตโนมัติ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video id="videoElement" class="embed-responsive-item" controls>
                                <source src="video/Medicine_video.mp4" type="video/mp4">
                            </video>
                        </div>
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
