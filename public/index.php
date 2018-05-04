<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Demo Contact Form'; 
		$to = 'example@domain.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Atomo
	</title>

	<!-- Dependencies and metadata -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="/octo.ico">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
	<link rel="stylesheet" href="/css/base.css">
	<link rel="stylesheet" href="/css/vendor.css">
	<link rel="stylesheet" href="/css/main.css">
	<script src="https://aframe.io/releases/0.8.0/aframe.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

	<!-- Inline CSS -->
	<style>
	@import url('https://fonts.googleapis.com/css?family=Barlow+Condensed:Extra-Light');
	@import url('https://fonts.googleapis.com/css?family=Quicksand:Regular');
	#demo, #team {
		background: linear-gradient(to bottom right, #073763ff, #0f77d8ff);
	}
	h2 {
		color: white;
		margin-left: 40px;
		font-family: 'Barlow Condensed';
		font-size: 80pt;
	}

	h3{
		color: white;
		text-align: center;
		font-family: 'Quicksand';
		font-size: 50pt;
		padding-top: 30px;
 		padding-bottom: 150px;
 		padding-left: 30px%;
 		padding-right: 5px;
	}

	h4{
		font-family: "montserrat-regular", sans-serif;
		font-size: 30pt;
		text-align: center;
	}

	h5{
		font-family: "montserrat-regular", sans-serif;
		padding-bottom: 20pt;
		padding-top: 20pt;
	}
	#product-button{
		text-align: center;
	}
	div.centered {
		margin-left:auto;
		margin-right:auto;
		width:100%;
	}
	#solutions {
		background-color: white;
	}
	#beaconbutton {
		height: 80px;
		width: 80px;
		min-width: initial;
		background-color: white;
		opacity: 1;
	}

	#beaconimage {
		color: black;
	}

	.col-twelve {
		justify-content: center;
	}

	.mdl-layout__title {
		font-family: 'Quicksand';
		font-size: 30pt;
		color: white;
	}
	.mdl-layout__content {
		display:flex; align-items:center; justify-content:center;
	}
	.mdl-grid {
		display:flex; align-items:center; justify-content:center;
	}
	.mdl-card__media {
		background-color: white;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	.mdl-card__title-text {
		font-family: 'Quicksand';
	}
	.mdl-card__supporting-text {
		font-family: 'Quicksand';
	}
	.mdl-button--icon, .material-icons {
		color: white;
	}
	.mdl-mini-footer {
		background-color: white;
		display: block;
		bottom: 0;
		width: 100%;
		height: 30px;
		margin-left: auto;
		margin-right: auto;
	}
	.mdl-navigation__link {
		font-family: 'Quicksand';
	}
	.mdl-layout__header {
		opacity: 0.9;
		color: black;
	}
	.mdl-logo {
		color: #999999ff;
	}
	a-scene {
		height:500px;
		width: 100%;
	}
	.overlay {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		height: 100%;
		width: 100%;
		opacity: 0;
		transition: .5s ease;
		background-color: #6fa8dcff;
	}

	.mdl-card__media:hover .overlay {
		opacity: 0.7;
	}

	.text {
		color: white;
		font-size: 20px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}
	.mdl-cell, .mdl-card, .portfolio-card {
		width: 338px;
	}
	.mdl-mini-footer__link-list {
		justify-content: right;
	}
</style>
</head>
<!-- Script for user AR interactions
<script>
	var point;
	AFRAME.registerComponent('cursor-listener', {
		init: function () {
			this.el.addEventListener('mouseenter', function (evt) {
        //this.setAttribute('color','#ff0000');
        //this.setAttribute('material','opacity:.85');
          //point = getNewPos(evt);
      });
			this.el.addEventListener('mouseleave', function (evt) {
        //this.setAttribute('color','rgb(' + getRandom() + ", " + (getRandom() + 150) + ", " +  (getRandom() + 60)+")");
        //this.setAttribute('material','opacity:1');
    });
		}
	})
	function animate() {
		element = document.querySelector("#building");
		movement = document.createElement("a-animation");
		movement.setAttribute("attribute", "position");
		movement.setAttribute("from", "200 0 -400");
		movement.setAttribute("to", "0 0 0");
		movement.setAttribute("dur", "10000");
		element.appendChild(movement);
		element.setAttribute("visible", true);
	}

	function createBeacon(point) {
		
	}

	function setInvisible() {
		element = document.querySelector("#building");
		element.setAttribute("visible",false);
	}
	window.onLoad = function(e) {
		setInvisible();
		setTimeout(animate, 3000);
	}
	
</script> -->

<body id="top">
	<header id="header" class="row">   

		<div class="header-logo">
			<a href="index.html">atomo</a>
		</div>

		<nav id="header-nav-wrap">
			<ul class="header-main-nav">
				<li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
				<li><a class="smoothscroll"  href="#about" title="about">Product</a></li>
				<li><a class="smoothscroll"  href="#solutions" title="solutions">Team</a></li>
				<li><a class="smoothscroll"  href="#Contact" title="founders">Contact</a></li>	
			</ul>

			<a href="#" title="sign-up" class="button button-primary cta">Docs</a>
		</nav>

		<a class="header-menu-toggle" href="#"><span>Menu</span></a>    	

	</header>
	<!--<div style="display:flex; height:50px; align-items:center; justify-content:center">
		<img src="images/WhiteBot.png" style="height:55px; top: 5px; z-index: 2;"-->
		<!--<h1>
			learn to love your space        
		</h1>-->
		<section id="demo" data-parallax="scroll">
			<div id="arframe">
				<div style="display:flex; height:100%; position: relative; align-items:center; justify-content:center">
					<a-scene embedded antialias="true">
						<a-assets>
							<a-asset-item id="hq" src="/images/EClinicModel.dae">
							</a-asset-item>
							<a-asset-item id="bot" src="/images/TexturedAtomo.dae"></a-asset-item>
						</a-assets>
						<a-entity id="building" collada-model="#hq" scale="2 2 2">
							<a-sphere color="yellow" radius=".15" position="11.14 1 -5.5"></a-sphere>
							<a-sphere color="yellow" radius=".15" position="11.14 1 -3.4"></a-sphere>
							<a-entity id="atomobot" collada-model="#bot" position="5 0 -4.5" scale=".12 .12 .12">
							</a-entity>
							<a-entity camera id="camera" position="-1.9 1 .6" rotation="-10.2 -56.4 0" look-controls wasd-controls></a-entity>
							<!--<a-cursor position="1 -.1 -1"></a-cursor>-->
						</a-entity>
					</a-scene>
				</div>
				<button onclick="createBeacon(point)" id="beaconbutton" class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
					<i id="beaconimage" class="material-icons">explore</i>
				</button>
			</div>
		</section>
		<section id="slogan-page">
			<div style="display: flex; position: relative; height: 100%; align-items: center; justify-content: center">
				<div class="slogan">
					<h3>Learn To Love Your Space</h3>  
					<br>
           		 </div>
           	<div class="product-button">
				<a href="#" title="product" class="button button-primary cta">See Our Product</a>
			</div>
			</div>
		</section>
		<section id="about">
			<div class="row about-how">

				<h1 class="intro-header" data-aos="fade-up">How The API Works?</h1>           

				<div class="about-how-content" data-aos="fade-up">
					<div class="about-how-steps block-1-2 block-tab-full group">

						<div class="bgrid step" data-item="1">
							<h4>API</h2>
							<p>By requesting an access token, we provide you with the documentation to integrate our API into your Android and iOS applications.
							</p> 
						</div>

						<div class="bgrid step" data-item="2">
							<h4>The Vision</h4>
							<p>Enter your business location(s) into the administrator portal, and we will generate a three dimensional rendering with live analytics readings.
							</p> 
						</div>               
					</div>           
				</div> <!-- end about-how-content -->

			</div>
			<div class="row half-bottom" data-aos="fade-up">

				<div class="col-twelve" data-aos="fade-up">
					<ul class="stats-tabs">
						<li><a href="#">7+ <em>Sensors</em></a></li>
						<li><a href="#">1 meter <em>Indoor Accuracy</em></a></li>
						<li><a href="#">4 <em>Languages</em></a></li>
						<li><a href="#">10+ <em>Mapped Locations</em></a></li>
					</ul>	      		

				</div>	      	

			</div>
		</section>
		<section id="team">
			<main class="mdl-layout__content">
				<br/>
				<br/>
				<br/>
				<br/>
				<div class="page-content">
					<div class="mdl-grid">
						<br/>
						<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
							<div class="mdl-card__media">
								<img class="article-image" src=" images/ryan.JPG" border="0" alt="">
								<div class="overlay">
									<div class="text">BS Mechanical Engineering</div>
								</div>
							</div>
							<div class="mdl-card__title">
								<h2 class="mdl-card__title-text">Ryan Kelley</h2>
							</div>
							<div class="mdl-card__supporting-text">
								Chief Executive Officer
							</div>
						</div>
						<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
							<div class="mdl-card__media">
								<img class="article-image" src=" images/bryan.JPG" border="0" alt="">
								<div class="overlay">
									<div class="text">BS Computer Science</div>
								</div>
							</div>
							<div class="mdl-card__title">
								<h2 class="mdl-card__title-text">Bryan Cooper</h2>
							</div>
							<div class="mdl-card__supporting-text">
								Chief Technology Officer
							</div>
						</div>
						<div class="mdl-cell mdl-card aidan mdl-shadow--4dp portfolio-card">
							<div class="mdl-card__media">
								<img class="article-image" src=" images/aidan.JPG" border="0" alt="">
								<div class="overlay">
									<div class="text">BS Textile Technologies</div>
								</div>
							</div>
							<div class="mdl-card__title">
								<h2 class="mdl-card__title-text">Aidan Special</h2>
							</div>
							<div class="mdl-card__supporting-text">
								Chief Product Officer
							</div>
						</div>
					</div>
				</div>
			</main>
		</section>

		<section id="Contact" style="background:#ffffff;">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <video autoplay muted loop id="contactvideo">
          <source src="#" type="video/mp4">
        </video>
          <h1 class="page-header text-center">Contact</h1>
          <form class="form-horizontal" role="form" method="post" action="index.php">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
                <p class='text-danger'></p>              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="enteremail" name="email" placeholder="example@domain.com" value="">
                <p class='text-danger'></p>              </div>
            </div>
            <div class="form-group">
              <label for="message" class="col-sm-2 control-label">Message</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="message">
                                  </textarea>
                <p class='text-danger'></p>              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
                              </div>
              <br>
            </div>
          </form>
        </div>
      </div>
    </section>
		<div id="preloader"> 
			<div id="loader"></div>
		</div>  
		<footer class="mdl-mini-footer">
			<div class="mdl-mini-footer__left-section">
				<div class="mdl-logo">Copyright @2018 Atomo, Inc.</div>
			</div>
			<div class="mdl-mini-footer__right-section">
				<div id="go-top">
					<a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up"></i></a>
				</div>  
			</div>
		</footer>

    <!-- Java Script
    	================================================== -->
    	<script src="/js/jquery-2.1.3.min.js"></script>
    	<script src="/js/plugins.js"></script>
    	<script src="/js/main.js"></script>
    	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </body>
    </html>