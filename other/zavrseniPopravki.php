<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Нарачај дел</title>
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

		<div class="col-lg-10 col-md-12 col-sm-12 form1 fade-div">
			<div class=" col-lg-12 col-md-12 col-sm-12 form-group res-table">
				<h3>Завршени поправки</h3><br>

					<?php 

					$sql = "SELECT PopravkaID, VrabotenID, Del_ID, Opis, Cena FROM popravka WHERE Zavrsena='1'";
					if ($query = mysqli_query($db, $sql)) {
						echo "<table class='tabela1 table'>";
						echo 
						"
						<tr>
							<th>Поправка ID</th>
							<th>Вработен ID</th>
							<th>Дел ID</th>
							<th>Опис</th>
							<th>Цена</th>
						</tr>
						";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo "<tr>";

							foreach ($row as $key) {
								echo "<th>".$key."</th>";
							}
					
							echo "</tr>";
						}
						echo "</table>";
					}
					else {
						echo "querry error!";
					}

					?>

		    </div>
		</div>	
	</div>
</div>

<script type="text/javascript">

    if ($('.login').html() != 'Најави се'){
      $('.register').attr('href', 'http://localhost/Projects/Avtoservis/other/logout.php');
      $('.login').attr('');	
    }
    else {
      $('.register').attr('href', 'http://localhost/Projects/Avtoservis/other/register.php');
    }

</script>

</body>
</html>

