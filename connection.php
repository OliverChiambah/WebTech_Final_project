<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "assoc_database";

$db = mysqli_connect($server, $user, $password, $database);

if (!$db)
    die("Connection Failed!: " . mysqli_connect_error());
