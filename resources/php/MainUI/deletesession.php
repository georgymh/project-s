<?php

	session_start();
	unset($_SESSION);
	session_destroy();

	if ($_GET['refresh'] = "yes") {
		header('Location: http://localhost/ps/github/');
		die();
	}
?>