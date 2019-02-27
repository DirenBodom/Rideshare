<?php
	include_once 'create_conn.php';
	include_once 'free_res.php';

	// Credentials
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'users';

	// 1. Craete a database connection
	$conn = create_connect();

	$q = "insert into user_base (firstN, secN, addStreet, addCity, addState, addZip, email, userName, pass)" . 
	"values ('yagger', 'lopez', '1335 fill', 'Los Angels', 'CA', 56666, 'agh@gmail.com', 'diemeister', 'pass')";
	$res = mysqli_query($conn, $q);

		// 5. Close database connection
	mysqli_close($conn);

?>