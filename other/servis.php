<?php 

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	$delID = $_SESSION['delID'];
	$vrabID = $_SESSION['vrabID'];
	$date = date("Y-m-d H:i:s");

	$sql = "SELECT PopravkaID FROM popravka WHERE Del_ID='$delID'";
	if ($query = mysqli_query($db, $sql)) {
		$num_rows = mysqli_num_rows($query);
		if ($num_rows > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$popID = $row['PopravkaID'];
				$_SESSION['popID'] = $popID;
			}
		}
		else {
			echo "Popravka ID doesnt exist";
		}
	}
	else {
		echo "query_error1";
	}

	$sql = "SELECT Cena, Naracka FROM delovi WHERE Del_ID='$delID'";
	if ($query = mysqli_query($db, $sql)) {
		$num_rows = mysqli_num_rows($query);
		if ($num_rows > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$cenaDel = $row['Cena'];
				$naracka = $row['Naracka'];
			}
		}
		else {
			echo "Popravka ID doesnt exist";
		}
	}
	else {
		echo "query_error2";
	}

	$sql = "SELECT Cena FROM popravka WHERE Del_ID='$delID'";
	if ($query = mysqli_query($db, $sql)) {
		$num_rows = mysqli_num_rows($query);
		if ($num_rows > 0) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$cenaPop = $row['Cena'];
			}
		}
		else {
			echo "Popravka ID doesnt exist";
		}
	}
	else {
		echo "query_error3";
	}

	$cenaSer = $cenaPop + $cenaDel;

	if ($naracka == 0) {
		$sql = "INSERT INTO `servis` (`PopravkaID`, `VrabotenID`, `Data`, `Cena`)
				VALUES ( '$popID', '$vrabID', '$date', '$cenaPop');";

		if ($query = mysqli_query($db, $sql)) {
			echo "success";
		}
		else {
			echo "query_error4";
		}
	}
	else {
		$sql = "INSERT INTO `servis` (`PopravkaID`, `VrabotenID`, `Data`, `Cena`)
				VALUES ( '$popID', '$vrabID', '$date', '$cenaSer');";

		if ($query = mysqli_query($db, $sql)) {
			echo "success";
		}
		else {
			echo "query_error5";
		}
	}

?>