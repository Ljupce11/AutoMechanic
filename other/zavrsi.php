<?php

	include '../php_includes/connect.php';
	include '../php_includes/checklogin.php';

	if (isset($_POST['zav_id'])) {
		$id = $_POST['zav_id'];
		
		$sql = "UPDATE popravka SET Zavrsena = '1' WHERE PopravkaID = '$id';";
		if ($query = mysqli_query($db, $sql)) {
			echo "Поправката е успешно завршена.";
		}
		else {
			echo "query fail";
		}

	}
	else {
		echo "Потребна е најава.";
	}

?>