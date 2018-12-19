<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HanoiTour</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
            h3{
                color:#45aed6;
            }
            #phantrang{text-align:center; margin: 20px;}
            #phantrang a{background: #337ab7; color:white;padding:5px;margin-right: 3px;}
            #phantrang a:hover{background-color:#09F}
        </style>
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
					<li class="nav-item active">
						<a href="news.php" class="nav-link">News</a>
					</li>
					<li class="nav-item">
						<a href="contact.php" class="nav-link">Contact</a>
					</li>
					<li class="nav-item">
						<a href="login.php" class="nav-link" style="color: blue;">Log in</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<!-- Header -->

	<header id="page-header">
		<div class="container py-5">
			<div class="row">
				<div class="m-auto text-center ">
					<h1>News</h1>
					<p class="p-4">Check out some news from our company</p>
				</div>
			</div>
		</div>
	</header>

<!-- about section -->
	
	 <div class="container" id="txt1" style="padding-top:50px;">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h3 class="page-header">News </h3><br><hr>
                </div>
            </div>
            <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $db_name = "ftico";
            $tbl_name = "tbl_news";


            $conn = mysqli_connect($host, $username, $password, $db_name) or die("Không thể kết nối");
            mysqli_set_charset($conn, 'utf8');
            $sotin1trang = 5;
            $sql1 = "select * from tbl_news where idLTT = 1 order by idNews DESC";
            $result1 = mysqli_query($conn, $sql1);
            $tongsotin = mysqli_num_rows($result1);
            $tongsotrang = ceil($tongsotin / $sotin1trang);
            if (isset($_GET["trang"])) {
                $trang = $_GET["trang"];
                settype($trang, "int");
            } else {
                $trang = 1;
            }

            $from = ($trang - 1) * $sotin1trang;
            $sql = "select * from tbl_news where idLTT = 1 order by idNews DESC 
            LIMIT $from, $sotin1trang";
            $result = mysqli_query($conn, $sql);
            while ($row_tin = mysqli_fetch_array($result)) {
                ?>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-1">
                        <a href="#">
                            <img class="img-responsive" src="<?php echo $row_tin['urlHinhAnh'] ?>" style="width:100%;height: 200px" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h4 style="color:#428bca"><?php echo $row_tin['TieuDe'] ?></h4>
                        <p><?php echo $row_tin['TomTat'] ?></p>
                        <a class="btn btn-primary" href="#">Details<span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>
                <hr>

                <?php
            }
            ?>
            <div id = "phantrang">
                <?php
                for ($i = 1; $i <= $tongsotrang; $i++) {
                    ?>
                    <a href="news.php?trang=<?php echo $i ?>"><?php echo $i ?> </a>
                    <?php
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>

<!-- Footer -->
<footer id="main-footer" class="text-center p-4">
		<div class="container">
			<div class="col-md-6" style="float: left;">
				<div class="row mb-2">
					<a href="login.php">Log in</a>(For staff only)
				</div>
				<div class="row mb-2">
					<a href="#">Go Top Page</a>
				</div>
				<div class="row mb-2">
					<a href="#">Register Now</a>
				</div>					
			</div>
				<div class="col-md-6 d-none d-md-block" style="float: right;">
					<p class="row mb-2">Copyright 2018 &copy; HanoiTour</p>
					<p class="row mb-2">Tiennt0611@gmail.com</p>
					<p class="row mb-2">Lai Yen, Hoai Duc, Ha Noi</p>
				</div>
			</div>
		</div>
	</footer>		
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>