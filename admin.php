<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HanoiTour-Admin</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lightbox.min.css">
  <style>
  	#phantrang{text-align:center;margin: 30px;}
    #phantrang a{background: #337ab7; color:white;padding:5px;margin-right: 3px;}
    #phantrang a:hover{background-color:#09F}
    table{
    	width: 1000px;
    	margin: 20px auto;
    }
  </style>
</head>
<body style="background-color: #eee;">
	<?php
session_start();
ob_start();
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ftico";

$conn = mysqli_connect($host, $username, $password, $db_name) or die("Không thể kết nối tới CSDL!");
mysqli_set_charset($conn, 'utf8');
?>



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

	<div class="header" style="margin-left: 200px;">
		<a style="font-size:18px;color:#428bca" href="#"><b>DANH SÁCH TIN TỨC</b></a><br>
	  <a style="font-size:18px;color:#428bca" href="dangBai.php"><b>Đăng bài</b></a>
	</div>
	  
	<div class="container" style="min-height: 400px;">
	<table border="1">
		<tr>
			
			<th style="width: 400px;">Subject</th>
			<th style="width: 100px;">Uploader</th>
			<th style="width: 100px;">Upload Date</th>
			<th style="width: 100px;">Function</th>
		</tr>
		<?php
			$sotin1trang=6;
			if (isset($_GET["trang"])) {
                                $trang = $_GET["trang"];
                                settype($trang, "int");
                            } else {
                                $trang = 1;
                            }
                            $from = ($trang - 1) * $sotin1trang;
			$sql = "SELECT * FROM tbl_admin,tbl_news where tbl_admin.id=tbl_news.idAdmin order by NgayDang DESC LIMIT $from, $sotin1trang";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($result)){
				
				$idNews=$row['idNews'];
				$TieuDe=$row['TieuDe'];
				$username=$row['username'];
				$NgayDang=$row['NgayDang'];
				echo "<tr>";
				
				echo "<td> $TieuDe</td>";
				echo "<td> $username</td>";
				echo "<td> $NgayDang</td>";
				echo ("<td> <a href='edit.php?idNews=$idNews'> Edit </a>
							/ <a onclick='return confirmAction()' href='delete.php?idNews=$idNews'> Delete </a> </td>");
				echo "</tr>";
			}
			
		 ?>

	</table>
	<?php 
		$sql="SELECT * FROM tbl_news";
		$result=mysqli_query($conn,$sql);
		$tongsotin=mysqli_num_rows($result);
		$tongsotrang=ceil($tongsotin/$sotin1trang);

	 ?>
	<div id="phantrang">
		<?php 
			for ($i=1; $i <=$tongsotrang ; $i++) 
			echo("<a href=admin.php?trang=$i> $i </a>");
		 ?>	
	</div>
</div>
	
<footer id="main-footer" class="text-center p-4">
		<div class="container">
			<div class="col-md-6" style="float: left;">
				<div class="row mb-2">
					<a href="logout.php">Log out</a>
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
</body>
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
    <script>
        function confirmAction() {
            return confirm("Bạn muốn xóa tin tức này?")
        }
    </script>
	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<script src="js/lightbox-plus-jquery.min.js"></script>
</html>