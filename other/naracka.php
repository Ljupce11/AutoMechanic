<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['del_id']) && isset($_SESSION['vID'])) {
		$id = $_POST['del_id'];
		$vID = $_SESSION['vID'];
		
		$sql = "SELECT Cena FROM delovi WHERE Del_ID='$id' LIMIT 1";
		if ($query = mysqli_query($db, $sql)) {
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
				$cena = $row['Cena'];
			}
		}

		$sql = "UPDATE delovi SET Naracka = '0' WHERE Del_ID = '$id';";
		if ($query = mysqli_query($db, $sql)) {
			$sql1 = "INSERT INTO `naracka` (`Del_ID`, `VrabotenID`, `Cena`)
					VALUES ('$id', '$vID', '$cena');";
			if ($query1 = mysqli_query($db, $sql1)) {
				echo "Нарачката е успешно воспоставена.";
			}
			else {
				echo "query error";
			}
		}
		else {
			echo "query fail";
		}

	}
	else {
		echo "Потребна е најава.";
	}

?>