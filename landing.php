<!DOCTYPE html>
<html>
<head>
	<title>Najava</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style type="text/css">
		.centered {
				margin: 20% auto!important;
				float: none!important;
				text-align: center!important;
				border: 1px solid black;
				padding: 70px 0px 70px 0px!important;
				background-color: silver;
				font-weight: bold;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 centered">
				
				Username: <input class="user" type="text" name="username"><br><br>
				Password: <input class="pass" type="password" name="password"><br><br>
				<input class="submit" type="submit" name="submit" value="Najavi se"><br>			

			</div>
		</div>
		
	</div>

	<script type="text/javascript">
		$('.submit').click(function() {
			if ($('.user').val() == 'admin' && $('.pass').val() == 'admin') {
				window.location.replace("http://localhost/Projects/Avtoservis/index.php");
			}
			else {
				alert('Vnesenite podatoci ne se tocni!');
			}
		});
	</script>

</body>
</html>