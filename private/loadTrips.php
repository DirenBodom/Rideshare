<?php
	// This script loads a table with user trips in the homepage, or displays no trips if there aren't any.
	function &load_trips_db($connect, $usr) {
		$query = "select * from user_trips where username='$usr'";
		$result = mysqli_query($connect, $query);

		if ($result ->num_rows == 0) {
			echo "<p>You don't have any scheduled trips...</p>";
		} else {
			echo "<p>You can look at your scheduled trips in the following table:</p>";
			echo "<table><tr>" .
				 "<th>Day</th>" .
				 "<th>Desired Desired Arrival Time</th>" .
				 "<th>Earliest Availability</th>" .
				 "<th>Departure Location</th>" .
				 "<th>Destination</th></tr>";
			// Go through each trip the user has and add it as a row to this HTML5 table.
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $row["day"] . "</td>";	// Day
				echo "<td>" . $row["targetTime"] . "</td>"; // Desired arrival time
				echo "<td>" . $row["availableTime"] . "</td>"; // Earliest Availability
				echo "<td>" . $row["pickupLocation"] . "</td>"; // Departure location
				echo "<td>" . $row["destination"] . "</td></tr></table>"; // Destination
			}
		}
		return $result;
	}
?>