<?php

	session_start();

	if (isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$logout = 'Одјави се';
	}
	else {
		$user = "Најави се";
		$logout = 'Регистрирај се';
	}

?>