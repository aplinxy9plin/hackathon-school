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
	<script src="./js/google.js"></script>
	<script src="./js/sessvars.js"></script>
	<script src="./js/script.js"></script>

    <title>ОБЛАКО</title> 
</head>
<body>
<style type="text/css">
video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
}
</style>
<video style="transform: translateX(-50%) translateY(-50%);" poster="https://i.ytimg.com/vi/tQ-WuUHNIz8/maxresdefault.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="ink.mp4" type="video/webm">
<source src="ink.mp4" type="video/mp4">
</video>
<!-- Main container -->
<div class="page-container">
	<div class="row" style="position: fixed; background-image: url('img/grayBack.png'); left: 20%; min-height: 768px; min-width: 1024px; max-height: 768px; max-height: 1024px">
		<div id="form" style="margin-top: 100px; text-align: center;">
			<h1 style="color: white">Привет!</h1>
			<h2 style="color: white">Выбери свои облачные хранилища </h2>
			<a href="javascript:checkKek('drive')"><img src="img/gdrive.png" style="width: 130px"></a>
			<a href="javascript:checkKek('yand')"><img src="img/yandex.png" style="width: 130px"></a>
			<br>
			<input id="drive" type="checkbox" name="drive">
			<input id="yand" style="margin-left: 120px" type="checkbox" name=""><br><br><br>
			<button onclick="enter()" class="btn btn-lg btn-primary">Входим</button>
		</div>
	</div>
</div>
</body>
</html>
