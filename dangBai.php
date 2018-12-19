<?php
ob_start();
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ftico";

$conn = mysqli_connect($host, $username, $password, $db_name) or die("Không thể kết nối tới CSDL!");
mysqli_set_charset($conn, 'utf8');
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <script src="lib/ckeditor/ckeditor.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Đăng bài</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="css/clean-blog.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <style>
            h3{
                color:#45aed6;
            }
            #phantrang{text-align:center}
            #phantrang a{background: #337ab7; color:white;padding:5px;margin-right: 3px;}
            #phantrang a:hover{background-color:#09F}

            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 1000%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 30%; /* Could be more or less, depending on screen size */
            }

            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)}
            to {transform: scale(1)}
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>
        <link href="css2/bootstrap.min.css" rel="stylesheet">
        <link href="css2/prettyPhoto.css" rel="stylesheet">
        <link href="css2/font-awesome.min.css" rel="stylesheet"> 
        <link href="css2/animate.css" rel="stylesheet"> 
        <link href="css2/main.css" rel="stylesheet">
    </head>

    <body>
       <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">HanoiTour</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="service.php" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="news.php" class="nav-link">News</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" style="color: blue;">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <?php
        $err = "";
        if (isset($_POST['ok'])) {
            if ($_FILES['file']['name'] != NULL) {
                if ($_FILES['file']['type'] == "image/jpeg"
                        || $_FILES['file']['type'] == "image/png"
                        || $_FILES['file']['type'] == "image/gif") {
                    if ($_FILES['file']['size'] > 1048576) {
                        $err = "File không được lớn hơn 1mb";
                    } else {
                        $path = "img/";
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        move_uploaded_file($tmp_name, $path . $name);
                        $err = "File uploaded! <br />Tên file : " . $name . "<br />Kiểu file : " . $type . "<br />File size : " . $size;
                    }
                } else {
                    $err = "Kiểu file không hợp lệ";
                }
            } else {
                $err = "Vui lòng chọn file";
            }
        }
        ?>
        <div class="modal" id="id01" >
            <form class="modal-content animate" action="dangBai.php" method="POST"  enctype="multipart/form-data">
                <div class="container" style="background-color:#f1f1f1;width:350px;padding-left:50px">
                    <h3 class="text-center">Upload</h3>
                    <p><input type="file" name="file" size="20" /></p><br />
                    <div><input type="submit" value="Upload" name="ok" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" onclick="document.getElementById('id01').style.display='none'" /></div>
                </div>
            </form>
        </div>
        <script>
            var modal = document.getElementById('id01');
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

        <div class="container" id="txt1" style="padding-top:70px;">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h3><b>POST</b></h3><a style="padding-left:700px;font-size:18px;color:#428bca" href="admin.php"><b>Back to admin page</b></a>
                    <hr style="color:grey"></hr>
                    <form method="POST" action="dangTin.php"> 
                        <h4>Subject:</h4>  <br>
                        <textarea rows="2" cols="130" name="txtTieuDe" required></textarea>
                        <br><br>
                        <h4>Image:</h4> <input type="file"  id="image" name="txtHinhAnh" required><br><a onclick="document.getElementById('id01').style.display='block'">Upload image to server</a> 
                        <p style="color:orange"><?php echo $err; ?></p>
                        <br>
                        <h4>Sumarry:</h4>  <br>
                        <textarea rows="3" cols="130" name="txtTomTat" class="ckeditor" ></textarea>
                        <br><br>
                        <h4>Type:</h5> <select name="txtTheLoai">
                                <option value="1" selected="selected">Tin tức</option>
                                <option value="2">Tuyển dụng</option>
                            </select>
                            <br><br>
                            <h4>Content:</h4>
                            <textarea rows="5" cols="130" name="txtChiTiet" class="ckeditor" rows="30"></textarea>
                            <br><br>
                            <input type="submit" name="btnSubmit" value="Post">   
                            <input type="button" name="btnReset" onclick="window.location='admin.php'" value="Back">
                            </form>

                            </div>
                            </div>
                            </div>

                            <br><br>
                            <!-- Footer -->
                         
                            <?php
                            mysqli_close($conn);
                            ?>
                            <script src="js/jquery.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="js/clean-blog.min.js"></script>
                            <script>
                                // Get the modal
                                var modal = document.getElementById('id01');

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function(event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            </script>
                            </body>
                            </html>
