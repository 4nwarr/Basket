<?php
$db_server = "localhost";
$username = "root";
$password = "";
$db_name = "basket";

$conn = new mysqli($db_server, $username, $password, $db_name);

if (!$conn) {
    die("Coud not connect to the database");
}
