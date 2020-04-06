<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "sql-basic";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection Error : " . $conn->connect_error);
}
