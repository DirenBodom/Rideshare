<?php

	if (isset($_REQUEST['method']) && $_REQUEST['method'] == 'logout') {
		logout();
		header('location: ../index.php');
	}
	// Logs out user by destroying session data
	function logout () {
		session_start();
		session_destroy();
	}
?>