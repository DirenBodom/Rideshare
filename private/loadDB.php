<?php
	// This script loads the database in a html table.

	function &load_db ($connect) {
		$query = "SELECT * FROM user_base";
		$result = mysqli_query($connect, $query);

		while($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" . $row["ID"] . "</td>";
			echo "<td>" . $row["firstN"] . " " . $row["secN"] . "</td>"; // Name
			echo "<td>" . $row["addStreet"] . // XXX StreetName
				", " . $row["addCity"] . ", " . $row["addState"] . " " // City, State
				. $row["addZip"] . "</td>";
			echo "<td>" . $row["email"] . "</td>";	// Email
			echo "<td>" . $row["userName"] . "</td>";	// User Name
			echo "<td>" . $row["pass"] . 
				"<button type=\"button\" onclick=\"removeUser(" . $row["ID"] . ")\">Remove</button>"
				. "</td> </tr>";	// Password
		}

		return $result;
	}
?>