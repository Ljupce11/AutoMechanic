<?php 

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['opis']) && isset($_POST['cena'])) {
		
		$opis = $_POST['opis'];
		$cena = $_POST['cena'];
		$vozID = $_SESSION['vozID'];
		$vrab = $_SESSION['user'];

		$sql = "SELECT Del_ID FROM delovi WHERE VoziloID='$vozID'";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$delID = $row['Del_ID'];
					$_SESSION['delID'] = $delID;
				}
			}
			else {
				echo "Vehicle part doesnt exist";
			}
		}
		else {
			echo "query_error1";
		}

		$sql = "SELECT VrabotenID FROM vraboten WHERE Ime='$vrab'";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$vrabID = $row['VrabotenID'];
					$_SESSION['vrabID'] = $vrabID;
				}
			}
			else {
				echo "Vehicle part doesnt exist";
			}
		}
		else {
			echo "query_error1";
		}

		$sql = "INSERT INTO `popravka` (`VrabotenID`, `Del_ID`, `Opis`, `Cena`, `Zavrsena`)
				VALUES ( '$vrabID', '$delID', '$opis', '$cena', '0');";

		if ($query = mysqli_query($db, $sql)) {
			
		echo 
		"

		<div class='col-lg-10 form1 fade-div'>
			<form id='servis'>
					<div class=' col-lg-12 form-group p'>
						<h3>Потврда</h3><br>
				    	<label for='exampleInputEmail1'>Потврди ги внесените податоци за сервис</label><br><br>

				    	<input type='button' name='submit' value='Потврди' class='button ser-submit'><br>
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