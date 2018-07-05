<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pw']) && isset($_POST['embg']) && isset($_POST['position'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$pw =  md5($_POST['pw']);
		$embg = $_POST['embg'];
		$position = $_POST['position'];

		$sql = "SELECT VrabotenID FROM vraboten WHERE EMBG='$embg' LIMIT 1";
		$query = mysqli_query($db, $sql) or die("query fail1 ");
		$uCheck = mysqli_num_rows($query);

		if ($fname == "" || $lname == "" || $pw == "" || $embg == "" || $position == ""){
			echo "Сите места не се пополнети!";
			exit();
		}
		else if ($uCheck > 0){
			echo "Веќе постои корисник со внесениот ЕМБГ!";
			exit();
		}
		else if (strlen($fname) < 3 || strlen($fname) > 16) {
			echo 'Името мора да се состои од 3-16 букви!';
			exit();
		}
		else if (strlen($lname) < 3 || strlen($lname) > 16) {
			echo 'Името мора да се состои од 3-16 букви!';
			exit();
		}
		else if (is_numeric($fname[0]) || is_numeric($lname[0])){
			echo "Името/Презимето мора да почнуваат со буква!";
			exit();
		}
		else {
				//If signup is successfull, insert data to DB
			$sql = "INSERT INTO `vraboten` (`Ime`, `Prezime`, `Lozinka`, `EMBG`, `Pozicija`)
					VALUES ('$fname', '$lname', '$pw', '$embg', '$position');";
			if ($query = mysqli_query($db, $sql)) {
				echo "Податоците се успешно внесени. Вашиот профил е креиран.";
				exit();
			}
			else {
				echo "query fail 3";
				exit();
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Регистрација</title>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<meta charset="utf-8">
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/index.js"></script>
</head>
<body>

<div class="container-fluid title">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 centered">
			<a href="http://localhost/Projects/Avtoservis/">
				<img class="logo" src="../assets/img/logo.png"><h3>Авто-сервис за поправка на автомобили</h3>
			</a>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">

		<?php include '../php_includes/sidebar.php' ?>

		<div class="col-lg-10 login">
			<br><h2>Регистрација</h2><br><br>

			<div class="col-lg-6 centered form">
			<form spellcheck="false" id="register-form">

			    <div class="form-group c">
			    	<label for="exampleInputEmail1">Име</label>
			    	<input type="text" class="form-control inp" id="fname" name="fname">
			    </div><br>
				<div class="form-group f">
				    <label for="exampleInputEmail1">Презиме</label>
				    <input type="text" class="form-control inp" id="lname" name="lname">
				</div><br>
				<div class="form-group f">
				    <label for="exampleInputEmail1">Лозинка</label>
				    <input type="password" class="form-control inp" id="pw" name="pw">
				</div><br>
				<div class="form-group f">
				    <label for="exampleInputEmail1">ЕМБГ</label>
				    <input type="text" class="form-control inp" id="embg" name="embg">
				</div><br>
				<div class="form-group f">
				    <label for="exampleInputEmail1">Позиција</label>
				    <input type="text" class="form-control inp" id="position" name="position">
				</div><br>

				<div class="form-group g">
				    <button type="button" class="register-submit">Регистрирај се</button><br>
				    <span id="status"> </span>
				</div>							  
			</form>	
		</div>

		</div>

	</div>
</div><br><br>

<script type="text/javascript">
	$('.register-submit').click(function() {
		register();
	});
</script>

</body>
</html>