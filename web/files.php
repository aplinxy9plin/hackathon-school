<?php session_start() ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css"><link rel="stylesheet" href="./css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/materialForm.css">
	
    <script src="./js/jquery-2.1.0.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/blocs.min.js"></script>
    <title>ОБЛАКО</title>

    
<!-- Google Analytics -->
 
<!-- Google Analytics END -->
    
</head>
<body>
<style type="text/css">
	body {
  margin: 0;
  background: #000; 
}
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  html { background: url(https://thenewcode.com/assets/images/polina.jpg) #000 no-repeat center center fixed; }
  #bgvid { display: none; }
}
</style>
<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="ink.mp4" type="video/webm">
<source src="ink.mp4" type="video/mp4">
</video>
<!-- Main container -->
<div class="page-container">
	<div class="row" style="position: fixed; background-image: url('img/grayBack.png'); left: 20%; min-height: 768px; min-width: 1024px; max-height: 768px; max-height: 1024px">
		<div style="margin-top: 100px; text-align: center;">
			<h1 style="color: white">Привет!</h1>
			<h2 style="color: white">Выбери свои облачные хранилища </h2>
			<a onclick="check()"><img src="img/dropbox.png" style="width: 130px"></a>
			<img src="img/yandex.png" style="width: 130px">
			<br>
			<input id="drop" type="checkbox" name="dropbox">
			<input id="yand" style="margin-left: 120px" type="checkbox" name=""><br><br><br>
			<button onclick="enter()" class="btn btn-lg btn-primary">Входим</button>
			<script src="js/yandex.js">
			</script>
			<?php
				if(isset($_SESSION['tokenYandex']) or isset($_SESSION['tokenDropbox']) or isset($_GET['access_token'])){
					header('Location: index.php');
					exit;
				}
			?>
		</div>
	</div>
</div>
</body>
</html>
