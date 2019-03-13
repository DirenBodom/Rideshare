<?php
// 
	include_once 'create_conn.php';
	include_once 'free_res.php';

	// Start session
	session_start();

	// Credentials
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'users';

	// 1. Craete a database connection
	$conn = create_connect();

	/*
		TODO:
		Implement Homepage.php

	*/

	if ($_SERVER["REQUEST_METHOD"] != "POST") {
		header('location: error_page.php');
		exit;
	}

	$_SESSION['loginErrors'] = '';

	// Variables to hold username and password
	$usr_name = $_POST['username'];
	$pwd = '';

	// Query which will return the password if the user name exists, then make sure user password is not null.
	$query  = "SELECT pass FROM user_base WHERE userName = '$usr_name'";
	$result = mysqli_query($conn, $query);

	// This block makes sure the user didn't leave the inputs blank.
	if (empty($_POST["username"])) {
		$_SESSION['loginErrors'] .= "<p>Please enter a user name.</p>";
	} elseif ($result ->num_rows == 0) {
		// User name doesn't exist.
		$_SESSION['loginErrors'] .= "<p>User name doesn't exist, please enter a "
									. "valid user name or sign up!</p>";
	} 

	if (empty($_POST["psw"])) {
		// Password left blank
		$_SESSION['loginErrors'] .= "<p>Please enter your password.</p>";
	} elseif ($result ->num_rows == 1) {
		// User does exist and is unique. If password is not null store password.
		$row = mysqli_fetch_assoc($result);	// Returns the row.
		$pwd = $row["pass"];			// Gets the hashed password.
		if ($pwd != null) {
			// Password exists, verify whether it matches the password inputed
			if (password_verify($_POST["psw"], $pwd) != 1) {
				// Password doesn't matches
				$_SESSION['loginErrors'] .= "<p>Incorrect password, please try again.</p>";
			} else {
				// Log in successful, set up session variables.
				//session_register('username');
				$_SESSION['username'] = $usr_name;
			}
		} else {
			$_SESSION['loginErrors'] .= "<p>Password is not set.</p>";
		}
	}

	// Check whether there were any errors, redirect to homepage if not, otherwise reload.

	if ($_SESSION['loginErrors']) {
		$redirPage = '../index.php';
	} else {
		$redirPage = '../public/homepage.php';
	}

	header("location: $redirPage");

	// User password: @56Yuuuub
?>