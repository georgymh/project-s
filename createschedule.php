<?php
	session_start();

	if (isset($_POST['data'])) {
		$_SESSION['view'] = 'schedule';
		$_SESSION['stepsData'] = $_POST['data'];
	}

?>