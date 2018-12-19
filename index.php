<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HanoiTour</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lightbox.min.css">
</head>
<body>
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
<!-- Showcase slide -->
	<section id="showcase">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item carousel-image-1 img-fluid active">
					<div class="container dark-overlay1">
						<div class="carousel-caption text-right md-5">
							<h1 class="display-3" style="font-family: time-new-roman;">Covenient</h1>
							<p class="lead d-none d-sm-block">Ensure the most interesting and comfortable trip to customers</p>
							<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#bookModal">Book now</a>
						</div>
					</div>
				</div>
				<div class="carousel-item carousel-image-2 img-fluid">
					<div class="container dark-overlay1">
						<div class="carousel-caption text-right md-5">
							<h1 class="display-3" style="font-family: time-new-roman;">Cheap</h1>
							<p class="lead d-none d-sm-block">Bringing the best quality with reasonable price</p>
							<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#bookModal">Book now</a>
						</div>
					</div>
				</div>
				<div class="carousel-item carousel-image-3 img-fluid">
					<div class="container dark-overlay1">
						<div class="carousel-caption text-left md-5">
							<h1 class="display-3" style="font-family: time-new-roman;">Reputation</h1>
							<p class="lead d-none d-sm-block">Ensuring credibility with customers</p>
							<a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#bookModal">Book now</a>
						</div>
					</div>
				</div>
			</div>
	
		 <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a href="#myCarousel" data-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon"></span>
      </a>
		</div>
	</section>


<div class="modal fade text-dark" id="bookModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookModalTitle">Contact Us</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" placeholder="Message"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </div>
  </div>
<!-- Home Icon -->
	
	<section id="home-icon" class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-4 text-center">
					<i class="fa fa-cog mb-2"></i>
					<h3>Easily</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, magni voluptatem accusantium? Laboriosam, enim, quo!</p>
				</div>
				<div class="col-md-4 mb-4 text-center">
					<i class="fa fa-cloud mb-2"></i>
					<h3>Quickly</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, magni voluptatem accusantium? Laboriosam, enim, quo!</p>
				</div>
				<div class="col-md-4 mb-4 text-center">
					<i class="fa fa-cart-plus mb-2"></i>
					<h3>Flexible</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, magni voluptatem accusantium? Laboriosam, enim, quo!</p>
				</div>
			</div>
		</div>
	</section>

<!-- Home heading -->

	<section id="home-heading" class="p-5">
		<div class="dark-overlay">
			<div class="row">
				<div class="col">
					<div class="container pt-5">
						<h1>HanoiTour</h1>
						<p class="d-none d-sm-block">Discover interesting things in Viet Nam's capital</p>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- info section -->

	<section id="info" class="py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 align-self-center">
					<h3>Registration Guide</h3>
					<p>Click the button below to learn registration guide of HanoiTour</p>
					<a href="#" class="btn btn-outline-danger btn-lg">Learn more</a>
				</div>
				<div class="col-md-6 py-3">
					<img style="width: 100%" src="img/img5.jpg" class="img-fluid" alt="">
				</div>
			</div>
		</div>
	</section>
	<hr>	

<!-- Photo gallery -->
	
	<section id="photo-gallery" class="py-5">
		<div class="container">
			<div class="text-center text-danger">
				<h1>Photo Gallery</h1>
			
			</div>
			<div class="row mb-4 pt-5">
				<div class="col-md-4">
					<a href="img/index1.jpg" data-lightbox="mygallery"><img src="img/index1.jpg" alt="" class="img-fluid"></a>
				</div>
				<div class="col-md-4">
					<a href="img/index2.jpg" data-lightbox="mygallery"><img src="img/index2.jpg" alt="" class="img-fluid"></a>
				</div>	
					<div class="col-md-4">
						<a href="img/index3.jpg" data-lightbox="mygallery"><img src="img/index3.jpg" class="img-fluid" alt=""></a>	
					</div>													
			</div>
			<div class="row mb-4">
				<div class="col-md-4">
					<a href="img/index4.jpg" data-lightbox="mygallery"><img src="img/index4.jpg" alt="" class="img-fluid"></a>				
				</div>
				<div class="col-md-4">
					<a href="img/index5.jpg" data-lightbox="mygallery"><img src="img/index5.jpg" alt="" class="img-fluid"></a>
				</div>
				<div class="col-md-4">
					<a href="img/index6.jpg" data-lightbox="mygallery"><img src="img/index6.jpg" alt="" class="img-fluid"></a>	
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-md-4">
					<a href="img/index7.jpg" data-lightbox="mygallery"><img src="img/index7.jpg" alt="" class="img-fluid"></a>			
				</div>
				<div class="col-md-4">
					<a href="img/index8.jpg" data-lightbox="mygallery"><img src="img/index8.jpg" alt="" class="img-fluid"></a>
				</div>
				<div class="col-md-4">
					<a href="img/index9.jpg" data-lightbox="mygallery"><img src="img/index9.jpg" alt="" class="img-fluid"></a>	
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-md-4">
					<a href="img/index10.jpg" data-lightbox="mygallery"><img src="img/index10.jpg" alt="" class="img-fluid"></a>
				</div>
				<div class="col-md-4">
					<a href="img/index11.jpg" data-lightbox="mygallery"><img src="img/index11.jpg" alt="" class="img-fluid"></a>
				</div>
				<div class="col-md-4">
					<a href="img/index12.jpg" data-lightbox="mygallery"><img src="img/index12.jpg" alt="" class="img-fluid"></a>
				</div>
			</div>
		</div>
	</section>	

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
  <script src="js/lightbox-plus-jquery.min.js"></script>
</body>
</html>