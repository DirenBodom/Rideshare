<?php

include_once '../private/remove_usr.php';
include_once '../private/create_conn.php';
include_once '../private/free_res.php';
include_once '../private/loadDB.php';

// Create DB connection
$conn = create_connect();


?>
<!DOCTYPE html>

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
		function removeUser(id) {
		var identity = JSON.stringify(id);
		console.log(identity);
		
			$.ajax({
				type: 'POST',
				url: '../private/remove_usr.php',
				data: {method: "remove", identification: id},
				complete: function () {
					console.log('AJAX worked!');
					$(".usr_table").innerHTML = "<p>Testing delete</p>";
				}
			});
		}
	</script>
	<div class="bg-image">
		<div class="usr_table">
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>User name</th>
					<th>Password</th>
				</tr>
				<?php
					// This is laying out the mysql table into an html table for display.
					$result = load_db($conn);
				?>
			</table>
		</div>
	</div>
</body>
</html>

<?php
release($conn, $result);
?>

