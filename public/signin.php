<?php
session_start();
$loginErrors = $_SESSION['loginErrors'] ?? '';
$_SESSION['loginErrors'] = '';
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
        <h2>Welcome to Rideshare!</h2>
        <h3>Sign in:&#10</h3>
        <?= $loginErrors ?>
        <form name="signin" action="../private/signin_handler.php" method="POST">
            <p>
                User name or email:
                <input type="text" name="username">
            </p>
            <p>
                Password:
                <input type="password" name="psw">
            </p>

            <input type="submit" value="Log in">
            <p>
                Don't have an account?
                <a href="signup.php">Sign up here</a>
            </p>
        </form>
    </div>
</body>
</html>