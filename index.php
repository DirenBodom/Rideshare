<?php
	include_once 'private/loadTrips.php';
	include_once 'private/create_conn.php';

	session_start();
	// Check if the user has logged in
	if (!isset($_SESSION['username'])) {
		header('location: public/signin.php');
	}
	$user = $_SESSION['username'];
	// Create DB connection
	$conn = create_connect();
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Rideshare App</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
		
	</script>
	<script>
		function logout_user() {
			$.ajax({
				type: 'POST',
				url: 'private/logout.php',
				data: {method: "logout"},
				success: function () {
                   // Redirect the user to the log in page.
                    $(location).attr('href', 'public/signin.php');
				}
			});
		}
	</script>
 <div class="bg-image"></div>
    <div class="bg-text">
        <p>Hello  <?php echo $user;?> <button onclick=logout_user()>Log out</button></p>
		<?php 
			// This will load the table if there are any trips or display a message if not.
			$result = load_trips_db($conn, $user);		// Connection to the user_trips database.
		?>
    </div>
</body>
</html>