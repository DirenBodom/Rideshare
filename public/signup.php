<?php
session_start();
$validationErrors = $_SESSION['validationErrors'] ?? '';
$_SESSION['validationErrors'] = '';


/*
What the above lines actually do;

if (isset($_SESSION['validationErrors'])) {
	$validationErrors = $_SESSION['validationErrors'];
} else {
	$validationErrors = '';
}*/
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
		<div class="bg-text">
			<h3>Sign up:&#10</h3>
			<?= $validationErrors ?>
            <form method="post" action="../private/signup_handler.php">
                <p>
                    First name:
                    <input type="text" name="firstname">
                    Last name:
                    <input type="text" name="lastname">
                </p>
                <p>
                    Email:
                    <input type="text" name="email">
                    User name:
                    <input type="text" name="username"> </p>
                <p>
                    Password:
                    <input type="text" name="password">
                </p>
                <p>
                    Re-eneter password:
                    <input type="text" name="password2">
                </p>
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
                <input type="submit" value="Create account">
            </form>
		</div>
	</body>
</html>
