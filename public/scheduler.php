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
	<script type='text/javascript' src='../javascripts/scheduler.js'></script>
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
		<div id="entry0">
			<hr>
			<h4>Entry 1</h4>
			<form name="form0" onsubmit="return addEntry()">
				Desired Arrival time:
				<input type="time" name="destinationtime"
					 min="0:00" max="24:00"> <br>
				Earliest Availability:
				<input type="time" name="availabletime"
					 min="0:00" max="24:00"> (Maximum 2 hours before desired arrival time.) <br>
				Departure Location: <input type="radio" name="departurelocation" value="home" checked> Home 
				<input type="radio" name="departurelocation" value="other"> Other <br>
				Other Location Address: 
				<p>
                    Street Address: 
                    <input type="text" name="addStrt">
                    City: 
                    <input type="text" name="city">
                </p>
                <p>
                    State: 
                    <select name="state">
                        <option value="AL">Alabama - AL</option>
                        <option value="AK">Alaska - AK</option>
                        <option value="AZ">Arizona - AZ</option>
                        <option value="AR">Arkansas - AR</option>
                        <option value="CA">California - CA</option>
                        <option value="CO">Colorado - CO</option>
                        <option value="CT">Connecticut - CT</option>
                        <option value="DE">Delaware - DE</option>
                        <option value="FL">Florida - FL</option>
                        <option value="GA">Georgia - GA</option>
                        <option value="HI">Hawaii - HI</option>
                        <option value="ID">Idaho - ID</option>
                        <option value="IL">Illinois - IL</option>
                        <option value="IN">Indiana - IN</option>
                        <option value="IA">Iowa - IA</option>
                        <option value="KS">Kansas - KS</option>
                        <option value="KY">Kentucky - KY</option>
                        <option value="LA">Louisiana - LA</option>
                        <option value="ME">Maine - ME</option>
                        <option value="MD">Maryland - MD</option>
                        <option value="MA">Massachusetts - MA</option>
                        <option value="MI">Michigan - MI</option>
                        <option value="MN">Minnesota - MN</option>
                        <option value="MS">Mississippi - MS</option>
                        <option value="MO">Missouri - MO</option>
                        <option value="MT">Montana - MT</option>
                        <option value="NE">Nebraska - NE</option>
                        <option value="NV">Nevada - NV</option>
                        <option value="NH">New Hampshire - NH</option>
                        <option value="NJ">New Jersey - NJ</option>
                        <option value="NM">New Mexico - NM</option>
                        <option value="NY">New York - NY</option>
                        <option value="NC">North Carolina - NC</option>
                        <option value="ND">North Dakota - ND</option>
                        <option value="OH">Ohio - OH</option>
                        <option value="OK">Oklahoma - OK</option>
                        <option value="OR">Oregon - OR</option>
                        <option value="PA">Pennsylvania - PA</option>
                        <option value="RI">Rhode Island - RI</option>
                        <option value="SC">South Carolina - SC</option>
                        <option value="SD">South Dakota - SD</option>
                        <option value="TN">Tennessee - TN</option>
                        <option value="TX">Texas - TX</option>
                        <option value="UT">Utah - UT</option>
                        <option value="VT">Vermont - VT</option>
                        <option value="VA">Virginia - VA</option>
                        <option value="WA">Washington - WA</option>
                        <option value="WV">West Virginia - WV</option>
                        <option value="WI">Wisconsin - WI</option>
                        <option value="WY">Wyoming - WY</option>
                    </select>
                    Zip Code: 
                    <input type="number" name="zip">
                </p>
                <br>
				Days: (Must select at least one)<br>
				<input type="checkbox" name="mon">Monday
				<input type="checkbox" name="tues">Tuesday
				<input type="checkbox" name="wed">Wednesday
				<input type="checkbox" name="thurs">Thursday
				<input type="checkbox" name="fri">Friday
				<input type="checkbox" name="sat">Saturday
				<input type="checkbox" name="sun">Sunday <br>
				<input type="button" value="Save Entry" onclick=addEntry(0)>
			</form>
			<button onClick="newEntryClick()">Add New Entry</button>
		</div> 
    </div>
</body>
</html>