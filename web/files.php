<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compitable" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>хуеблако</title>
	<link rel="stylesheet" href="css/style1.css" />
	<script src="./js/jquery-2.1.0.min.js"></script>
	<script src="./js/yandex.js"></script>
</head>
<body>
<section id="up"><!-- Секция верхнего сектора -->
	<div class="container">
		<div class="row">
		   <div class="col-md-6" style="border:1px solid black">
		   			   	<!-- Кнопка "назад" -->
		   		<p style="text-align: left">
		   			<a onclick="window.location.href='http://google.com'"><img style="margin-top: 8px" width="30px" src="img/backarrow.svg" alt="кнопка назад" 
          style="vertical-align: middle"></a>
		   			</p>	
		</div>
			<div class="col-md-6" style="border:1px solid black">
			<div style="margin-top: 7px">
				<div style="width: 200px; display: inline-block;">
		   			<input class="form-control" type="search" name="q" placeholder="Поиск по приложению">
				</div>
		   			<button style="display: inline;" type="submit" class="btn btn-xs btn-primary" >Найти</button></div>
		   			</div>	
	</div>
</div>

</section>


<section id="mid1"><!-- Первая секция среднего сектора -->
	<div class="container">
		<div class="row">
		   <div class="col-md-12" style="border:1px solid black">
		   	<!-- Кнопка "гугл драйв" -->
				<p style="text-align: left">
		   		<button style="width: 120px" class="btn btn-xs btn-warning" onclick="googleXuy()" id="butt2">Google Drive </button></p>
          	</div>
	          <div class="col-md-12" id="hideGoogle" style="display: none;">
	          	<ul>
	          	</ul>
	          </div>

	</section>
	<section id="mid2"><!-- Вторая секция среднего сектора -->
	<div class="container">
		<div class="row">
		   <div class="col-md-12" style="border:1px solid black">
		   	<!-- Кнопка "яндекс диск" -->
	<p style="text-align: left">
		   			<button style="width: 120px" class="btn btn-xs" onclick="yandexXuy()" id="butt3">Yandex Disk </button>
          
          </p>
          </div>
				<div class="col-md-12" id="hideYandex" style="display: block;">
	          	<ul>
	          	</ul>
	          </div>

          </div>
          </div>
	</section>
</body>
<script type="text/javascript">
	var ret = yandex('content');
	console.log(ret);
	function googleXuy(){
		if(document.getElementById('hideGoogle').style.display === 'none'){
			document.getElementById('hideGoogle').style.display = 'block';
		}else{
			document.getElementById('hideGoogle').style.display = 'none';
		}
	}
	function yandexXuy(){
		if(document.getElementById('hideYandex').style.display === 'none'){
			document.getElementById('hideYandex').style.display = 'block';
		}else{
			document.getElementById('hideYandex').style.display = 'none';
		}
	}
</script>
</html>
