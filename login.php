

<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ftico";
$tbl_name = "tbl_admin";
// kết nối cơ sở dữ liệu
$conn = mysqli_connect($host, $username, $password) or die("Không thể kết nối");
mysqli_select_db($conn, $db_name) or die("cannot select DB");
// username và password được gửi từ form đăng nhập
$err1 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST["myusername"];
    $mypassword = $_POST["mypassword"];

// Xử lý để tránh MySQL injection
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysqli_real_escape_string($conn, $myusername);
    $mypassword = mysqli_real_escape_string($conn, $mypassword);

    $sql = "SELECT * FROM tbl_admin WHERE username='$myusername' and password='$mypassword'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
    if ($count == 0) {
        $err1 = "UserName or Password is not valid, Please enter again!";
    } else {
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["myusername"] = $row["username"];
        $_SESSION["mypassword"] = $row["password"];
        header("location:admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HanoiTour-Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lightbox.min.css">
</head>
<body style="background-color: #eee;">

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<a href="index.php" class="navbar-brand">HanoiTour</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
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
						<a href="login.php" class="nav-link" style="color: blue;">Log in</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="min-height: 400px;">
		
	
	<form action="login.php" method="POST" style="margin: 0 auto;padding: 15px;max-width: 500px;margin-top: 100px">
		<div class="card-header">
			<h3 class="text-center text-danger">Log in for admin</h3>
		</div>
		<div class="card-content" style="margin-top: 10px;">
			<div class="form-group">
				<input type="text" class="form-control" name="myusername" placeholder="admin1">
			</div> 
			<div class="form-group">
				<input type="password" class="form-control" name="mypassword" placeholder="admin1234">
			</div></div><span class="error" style="color: red;text-align: center;"><?php echo $err1; ?></span>
			<div class="form-group">
				<button type="submit" class="form-control btn btn-outline-danger btn-block" name="enter">Enter</button> 
			
		</div>
		<div class="card-footer">
			<div style="text-align: center;">
				<a href="index.php">HomePage </a>|
				<a href="#">Forgot password?</a>
			</div>
		</div>
	</form>
	<div style="text-align: center;"><strong>Notice:</strong> <span style="color: red;">For Staffs only<span></div></div>
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
</body>
	<script src="js/jquery.min.js"></script>
  	<script src="js/popper.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<script src="js/lightbox-plus-jquery.min.js"></script>
</html>