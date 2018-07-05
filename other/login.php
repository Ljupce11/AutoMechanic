<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';


		if (isset($_POST['name']) && isset($_POST['pw'])) {
		$name = $_POST['name'];
		$pw = md5($_POST['pw']);

		$sql = "SELECT * FROM vraboten WHERE Ime='$name' AND Lozinka='$pw' LIMIT 1";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0){
				$_SESSION['user'] = $name;
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$_SESSION['vID'] = $row['VrabotenID'];
					echo 'success';
					exit();
				}
			}
			else {
				echo "query error 2";
				exit();
			}
		}
		else {
			echo "query error";
			exit();
		}		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Најава</title>
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
			<br><h2>Најава</h2><br><br>

			<div class="col-lg-6 centered form">
			<form spellcheck="false" id="login-form">

			    <div class="form-group c">
			    	<label for="exampleInputEmail1">Име</label>
			    	<input type="text" class="form-control inp" id="name" name="name">
			    </div><br>
				<div class="form-group f">
				    <label for="exampleInputEmail1">Лозинка</label>
				    <input type="password" class="form-control inp" id="pw" name="pw">
				</div><br>

				<div class="form-group g">
				    <button type="button" class="login-submit">Најави се</button><br>
				    <span id="status"></span>
				</div>							  
			</form>	
		</div>

		</div>

	</div>
</div>

<script type="text/javascript">
	$('.login-submit').click(function() {
		login();
	});
</script>

</body>
</html>