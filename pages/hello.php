<?php
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
  

// 2. Perform databse query
$query = "SELECT * FROM usr";
$result = mysqli_query($connection, $query);
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
		<div >
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
				</tr>
				<tr>
					<td>45</td>
					<td>Jennifer</td>
					<td>311 Clinton Ave, Minneapolis, MN 55454</td>
				</tr>
				<?
					while ($row = mysqli_fetch_row($result)) {
						echo "<tr><td>" . $row[0] . "</td>";
						echo "<td>" . $row[1] . "</td>";
						echo "<td>" . $row[2] . " " . $row[3] .
							", " . $row[4] . ", " . $row[5] . " "
								. $row[6] . "</td> </tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>

<?
// 3. Use returned data (if any)
/*
while ($row = mysqli_fetch_row($result)) {
	echo $row[1];
}*/

// 4. Release returned data

mysqli_free_result($result);

// 5. Close database connection
mysqli_close($connection);
?>