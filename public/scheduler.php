<?php
	session_start();
	// Check if the user has logged in
	if (!isset($_SESSION['username'])) {
		header('location: signin.php');
	}
	$user = $_SESSION['username'];
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
				url: '../private/logout.php',
				data: {method: "logout"},
				success: function () {
                   // Redirect the user to the log in page.
                    $(location).attr('href', 'signin.php');
				}
			});
		}
	</script>
 <div class="bg-image"></div>
    <div class="bg-text">
        <p>Thank you for signing up  <?php echo $user;?>! In order to match you with other users with a similar schedule,
		   please provide your schedule needs as well as a well as your work address.</p>
		<table>
			<tr>
				<th></td>	<!-- Day -->
				<th>Earliest Availability</td>	<!-- Earliest availability for pickup -->
				<th>Destination Desired Arrival Time</td>	<!-- Time they need to be at their destination -->
				<th>Pickup Location</td>	<!-- Radio button, home or other, if other is picked add cells for address input -->
				<th>Destination</td>		<!-- Desired destination -->
			</tr>
			<tr>
				<td>Monday</td>
				<td><input type="time" id="avb" name="availability"
					 min="0:00" max="24:00">
				</td>
				<td><input type="time" id="dest" name="destinationtime"
					 min="0:00" max="24:00">
				</td>
				<td>
					<input type="radio" name="home" value="home" checked> Home
					<input type="radio" name="other" value="other"> Other
				</td>
				<td>
					<input type="radio" name="work" value="home" checked> Work
					<input type="radio" name="other" value="other"> Other
				</td>
			</tr>
		</table>
    </div>
</body>
</html>