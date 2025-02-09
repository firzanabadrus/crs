<?php

//set DB Parameter
$servername = "localhost: 3307";
$username = "root";
$password = "";
$dbname = "db_crs";

//connect db
$con = mysqli_connect($servername, $username, $password, $dbname);

//connection check (continue as individual project)
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>