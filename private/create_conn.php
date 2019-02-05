<?php

// Create a connection and return it.

function create_connect() {
	// Credentials
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'users';

	// 1. Craete a database connection
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQLi " . mysqli_connect_error();
	}

	// Return the connection
	return $connection;
}

?>