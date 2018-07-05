<?php 

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['marka']) && isset($_POST['god']) && isset($_POST['km']) && isset($_POST['boja']) && isset($_POST['pogon']) && isset($_POST['sasija'])) {

		$marka = $_POST['marka'];
		$god = $_POST['god'];
		$km = $_POST['km'];
		$boja = $_POST['boja'];
		$pogon = $_POST['pogon'];
		$sasija = $_POST['sasija'];

		$embg = $_SESSION['embg'];

		$sql = "SELECT SopstvenikID FROM sopstvenik WHERE EMBG='$embg'";
		if ($query = mysqli_query($db, $sql)) {
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					$sopID = $row['SopstvenikID'];
					$_SESSION['sopID'] = $sopID;
				}
			}
			else {
				echo "User doesnt exist";
			}
		}
		else {
			echo "query error1";
		}

		$sql = "INSERT INTO `vozilo` (`SopstvenikID`, `Marka`, `Godina`, `Kilometraza`, `Boja`, `Pogon`, `Br_Shasija`)
				VALUES ( '$sopID', '$marka', '$god', '$km', '$boja', '$pogon', '$sasija');";

		if ($query = mysqli_query($db, $sql)) {
			$_SESSION['sasija'] = $sasija;

		echo 
		"

		<div class='col-lg-10 form1 fade-div'>
			<form id='del'>
					<div class=' col-lg-12 form-group p'>
						<h3>Дел за поправка</h3><br>
				    	<label for='exampleInputEmail1'>Име</label>
				    	<input type='text' class='form-control inp' id='name' name='name'><br>

				    	<label for='exampleInputEmail1'>Модел</label>
				    	<input type='text' class='form-control inp' id='model' name='model'><br>

				    	<label for='exampleInputEmail1'>Цена</label>
				    	<input type='text' class='form-control inp' id='price' name='price'><br>

				    	<label for='exampleInputEmail1'>За нарачка</label>
				    	<select id='naracka' name='naracka' class='form-control inp'>
				    		<option value='0' default>Не</option>
				    		<option value='1'>Да</option>
				    	</select><br>

				    	<input type='button' name='submit' value='Следно' class='button del-submit'><br>
				    	<span id='status'> </span>
				    </div>
			</form>
		</div>
		
		";

		}
		else {
			echo "query error2";
		}
	}

?>