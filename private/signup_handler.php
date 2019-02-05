<?php
	include_once 'create_conn.php';
	include_once 'free_res.php';
	/*
	  1. Check that the input is appropiate								X
	  2. Check the password field matches with the retyped password		X
	  3. INSERT the new user onto the users table.						X
	  4. Take the user to the entry page.								X
	*/
	
	$f_name = $_POST["firstname"];
	$l_name = $_POST["lastname"];
	$email = $_POST["email"];
	$usr_name = $_POST["username"];
	$pwd = $_POST["password"];
	$pwd_check = $_POST["password2"];
	$street = $_POST["addStrt"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = intval($_POST["zip"]);  // Casting into an integer value.

	// Get the street parsed into 2 separate variables.
    

	// Credentials
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'users';

	// 1. Craete a database connection
	$conn = create_connect();

	// 2. Perform databse query
	$query = "INSERT INTO user_base VALUES (null, '$f_name', '$l_name', 1453, '$street', '$city', '$state', '$zip')";
	$result = mysqli_query($conn, $query);   // Insert new user

	// 5. Close database connection
	mysqli_close($conn);

?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		
		<title>Rideshare App</title>
	</head>
	<body>
		<div class="bg-image"></div>
		<div class="bg-text">
			<h2>Welcome to Rideshare!</h2>
			<?php
				echo "<p>Thank you for signing up " . $f_name . " " . $l_name , "</p>";
				echo "<p>Your email is: " . $email . "</p>";
				echo "<p>Your user name is: " . $usr_name . "</p>";
				echo "<p>Your address is: " . $street . ", " . $city . ", " . $state . " " . $zip . "</p>";
			?>
		</div>
	</body>
</html>