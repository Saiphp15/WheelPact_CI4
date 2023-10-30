<?php
// get to know MySQL Version
$connection = mysqli_connect("localhost", "u145586082_wheelpact", "Zz0&MjBNz1=V");
if ($connection) {
    $mysqlVersion = mysqli_get_server_info($connection);
    echo "MySQL Version: " . $mysqlVersion;
    mysqli_close($connection);
} else {
    echo "Failed to connect to MySQL.";
}
?>