<?php

class MainUI {
	public static function showSteps() {
		include 'steps.php';
	}

	public static function showSchedule() {
		include 'schedule.php';
	}

	public static function deleteSession() {
		include 'deletesession.php';
	}

	public static function refreshPage() {
		header('Location: http://localhost/ps/github/');
		die();
	}
}

?>