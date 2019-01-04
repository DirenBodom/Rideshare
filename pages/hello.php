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
$query = "SELECT * FROM user_base";
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
<div class="bg-image">
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Address</th>
        </tr>
        <?php
        while($row = mysqli_fetch_row($result)) {
            //var_dump($row);
            echo "<tr><td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . " " . $row[2] . "</td>"; // Name
            echo "<td>" . $row[3] . " " . $row[4] . // XXX StreetName
                ", " . $row[5] . ", " . $row[6] . " " // City, State
                . $row[7] . "</td> </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>

<?php
// 4. Release returned data

mysqli_free_result($result);

// 5. Close database connection
mysqli_close($connection);
?>

