<?php 

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['embg']) && isset($_POST['contact'])) {
		
		if (isset($_SESSION['user'])) {

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$embg = $_POST['embg'];
		$contact = $_POST['contact'];

		$sql = "INSERT INTO `sopstvenik` (`Ime`, `Prezime`, `EMBG`, `Telefon`)
		VALUES ('$fname', '$lname', '$embg', '$contact');";

		if ($query = mysqli_query($db, $sql)) {
			$_SESSION['embg'] = $embg;
		echo 
		"

		<div class='col-lg-10 form1 fade-div'>
			<form id='vozilo'>
					<div class=' col-lg-12 form-group p'>
						<h3>Возило</h3><br>
				    	<label for='exampleInputEmail1'>Марка</label>
				    	<input type='text' class='form-control inp' id='marka' name='marka'><br>

				    	<label for='exampleInputEmail1'>Година</label>
				    	<input type='text' class='form-control inp' id='god' name='god'><br>

				    	<label for='exampleInputEmail1'>Километража</label>
				    	<input type='text' class='form-control inp' id='km' name='km'><br>

				    	<label for='exampleInputEmail1'>Боја</label>
				    	<input type='text' class='form-control inp' id='boja' name='boja'><br>

				    	<label for='exampleInputEmail1'>Погон</label>
				    	<input type='text' class='form-control inp' id='pogon' name='pogon'><br>

				    	<label for='exampleInputEmail1'>Шасија</label>
				    	<input type='text' class='form-control inp' id='sasija' name='sasija'><br>

				    	<input type='button' name='submit' value='Следно' class='button vozilo-submit'><br>
				    	<span id='status'> </span>
				    </div>
			</form>
		</div>	
		
		";

		}
		else {
			echo "query fail 3";
		}



		}
		else {
			echo "Fail";
		}

	}

?>