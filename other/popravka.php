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
			<form id="sopstvenik">
					<div class=" col-lg-12 form-group p">
						<h3>Сопственик</h3><br>
				    	<label for="exampleInputEmail1">Име</label>
				    	<input type="text" class="form-control inp" id="fname" name="fname"><br>

				    	<label for="exampleInputEmail1">Презиме</label>
				    	<input type="text" class="form-control inp" id="lname" name="lname"><br>

				    	<label for="exampleInputEmail1">ЕМБГ</label>
				    	<input type="text" class="form-control inp" id="embg" name="embg"><br>

				    	<label for="exampleInputEmail1">Контакт</label>
				    	<input type="text" class="form-control inp" id="contact" name="contact"><br>

				    	<input type="button" name="submit" value="Следно" class="button sop-submit"><br>
				    	<span id="status"> </span>
				    </div>
			</form>
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

