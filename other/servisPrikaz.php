<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Avtoservis</title>
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

		<div class="col-lg-10 form1 fade-div">
			<div class=" col-lg-12 form-group servis-tabela">
				<h3>Клиенти и поправки</h3><br>
				<table>
				<?php 

					$sql = "SELECT Ime, Prezime FROM sopstvenik";
					if ($query = mysqli_query($db, $sql)) {
						echo "<tr>";
						echo "<th>Сопственик</th>";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							$ime = $row['Ime'];
							$prezime = $row['Prezime'];							
							echo "<th>".$ime." ".$prezime."</th>";	
						}
						echo "</tr>";
					}
					else {
						echo "querry error!";
					}

					$sql = "SELECT Marka, Godina, Kilometraza, Boja, Pogon, Br_Shasija FROM vozilo";
					if ($query = mysqli_query($db, $sql)) {
						echo "<tr>";
						echo "<th>Возило</th>";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo "<th>";
							foreach ($row as $key) {
								echo "<p>".$key."</p>";	
							}
							echo "</th>";	
						}
						echo "</tr>";
					}
					else {
						echo "querry error!";
					}

					$sql = "SELECT Ime, Model, Cena FROM delovi";
					if ($query = mysqli_query($db, $sql)) {
						echo "<tr>";
						echo "<th>Дел</th>";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo "<th>";
							foreach ($row as $key) {
								echo "<p>".$key."</p>";	
							}
							echo "</th>";	
						}
						echo "</tr>";
					}
					else {
						echo "querry error!";
					}

					$sql = "SELECT Opis, Cena, Zavrsena FROM popravka";
					if ($query = mysqli_query($db, $sql)) {
						echo "<tr>";
						echo "<th>Поправка</th>";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							if ($row['Zavrsena'] == 0) {
								$zavrsena = "Незавршена";
							}
							else {
								$zavrsena = "Завршена";
							}
							echo "<th>";
							echo "<p>".$row['Opis']."</p>";
							echo "<p>".$row['Cena']."ден</p>";
							echo "<p>".$zavrsena."</p>";
							echo "</th>";	
						}
						echo "</tr>";
					}
					else {
						echo "querry error!";
					}

					$sql = "SELECT Data, Cena FROM servis";
					if ($query = mysqli_query($db, $sql)) {
						echo "<tr>";
						echo "<th>Сервис</th>";
						while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
							echo "<th>";
							echo "<p>".$row['Data']."</p>";
							echo "<p>".$row['Cena']."ден</p>";
							echo "</th>";	
						}
						echo "</tr>";
					}
					else {
						echo "querry error!";
					}


				?>
			</table>
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

    $('.sop-submit').click(function() {
    	sopstvenik();
    });


    $(document).on('click', '.vozilo-submit', function() {
    	vozilo();
    });

    $(document).on('click', '.del-submit', function() {
    	del();
    });

    $(document).on('click', '.pop-submit', function() {
    	pop();
    });

    $(document).on('click', '.ser-submit', function() {
    	servis();
    });

</script>

</body>
</html>

