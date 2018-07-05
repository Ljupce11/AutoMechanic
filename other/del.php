<?php 

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['name']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['naracka'])) {
		
		$name = $_POST['name'];
		$model = $_POST['model'];
		$price = $_POST['price'];
		$naracka = $_POST['naracka'];

		$sasija = $_SESSION['sasija'];

		$sql = "SELECT VoziloID FROM vozilo WHERE Br_Shasija='$sasija'";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$vozID = $row['VoziloID'];
					$_SESSION['vozID'] = $vozID;
				}
			}
			else {
				echo "Vehicle doesnt exist";
			}
		}
		else {
			echo "query_error1";
		}

		$sql = "INSERT INTO `delovi` (`VoziloID`, `Ime`, `Model`, `Cena`, `Naracka`)
				VALUES ( '$vozID', '$name', '$model', '$price', '$naracka');";

		if ($query = mysqli_query($db, $sql)) {
			
		echo 
		"

		<div class='col-lg-10 form1 fade-div'>
			<form id='pop'>
					<div class=' col-lg-12 form-group p'>
						<h3>Pоправка</h3><br>
				    	<label for='exampleInputEmail1'>Опис</label>
				    	<textarea id='opis' name='opis' cols='5' rows='5' class='form-control inp left'></textarea><br>

				    	<label for='exampleInputEmail1'>Цена</label>
				    	<input type='text' class='form-control inp' id='cena' name='cena'><br>

				    	<input type='button' name='submit' value='Следно' class='button pop-submit'><br>
				    	<span id='status'> </span>
				    </div>
			</form>
		</div>
		
		";

		}
		else {
			echo "query_error2";
		}
	}

?>