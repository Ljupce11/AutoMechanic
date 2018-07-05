<?php

	Session_start();
	Session_destroy();

	header('Location: http://localhost/Projects/Avtoservis/index.php');

?>