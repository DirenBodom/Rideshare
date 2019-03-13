<?php
	session_start();
	// Check if the user has logged in
	if (!isset($_SESSION['username'])) {
		header('location: ../index.php');
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
				complete: function () {
					console.log('AJAX worked!');
				}
			});
		}
	</script>
 <div class="bg-image"></div>
    <div class="bg-text">
        <p>Hello  <?php echo $user;?> <button onclick=logout_user()>Log out</button></p>
    </div>
</body>
</html>
<?php //session_destroy() ?>