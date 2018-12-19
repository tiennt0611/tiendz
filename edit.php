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

        <title>Edit</title>
        <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/clean-blog.min.css" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="css2/bootstrap.min.css" rel="stylesheet">
        <link href="css2/prettyPhoto.css" rel="stylesheet">
        <link href="css2/font-awesome.min.css" rel="stylesheet"> 
        <link href="css2/animate.css" rel="stylesheet"> 
        <link href="css2/main.css" rel="stylesheet">
        <style>
            h3{
                color:#45aed6;
            }
            #phantrang{text-align:center}
            #phantrang a{background: #337ab7; color:white;padding:5px;margin-right: 3px;}
            #phantrang a:hover{background-color:#09F}
        </style>
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
        <div class="container" id="txt1" style="padding-top:70px;">
            <?php
            if (isset($_GET["idNews"])) {
                $idNews = $_GET["idNews"];
                settype($idNews, "int");
            }
            $sql = "select * from tbl_news where idNews = " . $idNews;
            $result = mysqli_query($conn, $sql);
            $row_tin = mysqli_fetch_array($result)
            ?>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h3><b>EDIT</b></h3><a style="padding-left:700px;font-size:18px;color:#428bca" href="admin.php"><b>Back to admin page</b></a>
                    <hr style="color:grey"></hr>
                    <form method="POST" action="suatin1.php?idNews=<?php echo $idNews; ?>"> 
                        <h4>Subject:</h4>  <br>
                        <textarea rows="2" cols="130" name="txtTieuDe" required><?php echo $row_tin["TieuDe"] ?></textarea>
                        <br><br>
                        <h4>Image:</h4>
                        <input type="file"  id="image" name="txtHinhAnh" required>
                        <br><br>
                        <h4>Summary:</h4>  <br>
                        <textarea rows="3" cols="130" name="txtTomTat" class="ckeditor" ><?php echo $row_tin["TomTat"] ?></textarea>
                        <br>
                        <h4>Type:</h4> <select name="txtTheLoai">
                            <?php if ($row_tin["idLTT"] == 2) { ?>
                                <option value = "1">Tin tức</option>
                                <option value = "2"  selected = "selected">Tuyển dụng</option><?php } else {
                                ?>                      
                                <option value="1" selected="selected">Tin tức</option>
                                <option value="2">Tuyển dụng</option><?php }
                            ?>
                        </select>
                        <br><br>
                        <h4>Content:</h4>                  
                        <textarea rows="5" cols="130" name="txtChiTiet" class="ckeditor" rows="30">
                            <?php
                            $fp = fopen($row_tin["NoiDung"], "r");
                            if (!$fp) {
                                
                            } else {
                                echo '<div style="font-size:15px">';
                                $data = fread($fp, filesize($row_tin["NoiDung"]));
                                echo $data;
                                echo '</div>';
                                fclose($fp);
                            }
                            ?></textarea>
                        <br><br>
                        <input type="submit" name="btnSubmit" value="Edit">   
                        <input type="button" name="btnReset" onclick="window.location='admin.php?idNews=<?php echo $idNews ?>'" value="Back">
                    </form>
                </div>
            </div>
        </div>
        <br><br>
        
        <?php
        mysqli_close($conn);
        ?>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/clean-blog.min.js"></script>
    </body>
</html>
