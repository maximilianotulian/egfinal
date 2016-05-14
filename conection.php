<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$bd = "test";

$mysqli = new mysqli($serverName, $userName, $password, $bd);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    print_r($mysqli);
}

$mysqli->close();
?>
