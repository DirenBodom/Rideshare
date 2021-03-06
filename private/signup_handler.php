<?php
	include_once 'create_conn.php';
	include_once 'free_res.php';

	// Start session
	session_start();

	// Craete a database connection
	$conn = create_connect();

	// If the server request is not post, redirect to error_page.php

	if ($_SERVER["REQUEST_METHOD"] != "POST") {
		header('location: error_page.php');
		exit;
	}

	//var_dump($_POST);
	//exit;

	$_SESSION['validationErrors'] = '';

	$f_name = $l_name = $email = $pwd = "";

	// For now accept the user's input without validating since we don't have a map api.
	$street = $_POST["addStrt"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = intval($_POST["zip"]);  // Casting into an integer value.
	
	/* $l_name = $email = $usr_name =
		$pwd = $pwd_check = $street = $state = $zip = "";*/

	// Validate first name.
	if (empty($_POST["firstname"])) {
		$_SESSION['validationErrors'] = "<p>Please enter a  first name.</p>";
	} else {
		// Check whether the name given consists of only letters
		
		if (preg_match("/^([a-zA-Z' ]+)$/", $_POST["firstname"])) {
			$f_name = $_POST["firstname"];
		} else {
			$_SESSION['validationErrors'] .= "<p>First name must consists of alphabetical character only.</p>";
		}
	}

	// Validate last name.
	if (empty($_POST["lastname"])) {
		$_SESSION['validationErrors'] .= "<p>Please enter a  last name.</p>";
	} else {
		// Check whether the name given consists of only letters
		
		if (preg_match("/^([a-zA-Z' ]+)$/", $_POST["lastname"])) {
			$l_name = $_POST["lastname"];
		} else {
			$_SESSION['validationErrors'] .= "<p>Last name must consists of alphabetical character only.</p>";
		}
	}

	// Validate email.
	
	if (empty($_POST["email"])) {
		$_SESSION['validationErrors'] .= "<p>Please enter an email.</p>";
	} else {
		// Check whether the name given consists of only letters
		// Regex taken from https://stackoverflow.com/questions/201323/how-to-validate-an-email-address-using-a-regular-expression		
		if (preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST["email"])) {
			$email_temp = $_POST["email"];
			// Check whether the email already exists in the database
			$check_query = "SELECT * FROM user_base WHERE email = '$email_temp'";
			$check_res = mysqli_query($conn, $check_query);	// Array containning user if it already exists.

			if ($check_res ->num_rows == 0) {
				// Email is valid and doesn't already exist.
				$email = $_POST["email"];
			} else {
				$_SESSION['validationErrors'] .= "<p>Email alreay in use.</p>" . 
												"<p>Already have an account? Log in <a href=\"../public/signin.php\">here</a></p>";
			}
		} else {
			$_SESSION['validationErrors'] .= "<p>Please enter a valid email.</p>";
		}
	}

	/*
		Validate Password. Requirements are:
		Must be between 8-32 characters long.
		At least one special character:  ~`!@#$%^&*()+=_-{}[]\|:;��?/<>,.
		At least one number
		At least one upper case and one lower case character.
	*/
	
	if (empty($_POST["password"])) {
		$_SESSION['validationErrors'] .= "<p>Please enter a password.</p>";
	} elseif (empty($_POST["password2"])) {
		$_SESSION['validationErrors'] .= "<p>Please re-enter your password.</p>";
	} else {
		// If password and re-entered do not match, ask for matching inputs.
		// Otherwise, check requirements.

		if (strcmp($_POST["password"], $_POST["password2"]) != 0) {
			$_SESSION['validationErrors'] .= "<p>Password and re-entered password do not match.</p>";
		} else {
			// Check whether the password meets the requirements listed above.
			// Regex taken from: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
			if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/", $_POST["password"])) {
				// Good password was entered.
				$pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
			} else {
				$_SESSION['validationErrors'] .= "<p>Please enter a valid password..</p>";
			}
		}
	}

	// Make sure user name doesn't already exist, between 5 and 18 characters long, and can contain -. or _
	
	if (empty($_POST["username"])) {
		$_SESSION['validationErrors'] .= "<p>Please enter a user name.</p>";
	} else {
		// First make sure it's valid, then make sure it's unique.
		if (preg_match("/^[a-zA-Z0-9_\-\.]{5,18}$/", $_POST["username"])) {
			$usr_temp = $_POST["username"];
			// Check whether the user already exists.
			$check_query = "SELECT * FROM user_base WHERE userName = '$usr_temp'";
			$check_res = mysqli_query($conn, $check_query);	// Array containning user if it already exists.

			if ($check_res ->num_rows == 0) {
				// User name valid and doesn't already exist.
				$usr_name = $_POST["username"];
			} else {
				echo $check_query;
				$_SESSION['validationErrors'] .= "<p>User name already exists, please try another user name.</p>";
			}

		} else {
			$_SESSION['validationErrors'] .= "<p>Invalid user name:</p><li>User name must be between 5 and 12 characters long</li>"
											. "<li>Can contain alphanumeric characters and -, ., or _</li>";
		}
	}
	
	// Reload the page with errors before submitting query
	if ($_SESSION['validationErrors']) {
		header('location: ../public/signup.php');
		exit;
	}
	// 2. Perform databse query

	$query = "INSERT INTO user_base VALUES " . 
			"(null, '$f_name', '$l_name', '$street', '$city', '$state', '$zip', '$email', '$usr_name', '$pwd')";

	$result = mysqli_query($conn, $query);   // Insert new user


	// Redirect to scheduler and set the session variable to current user
	$_SESSION['username'] = $usr_name;
	header('location: ../public/scheduler.php');
	// 5. Close database connection
	mysqli_close($conn);
?>