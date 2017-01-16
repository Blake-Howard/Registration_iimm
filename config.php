<?php

//A basic way to connect to the database. 
$dbUser = "root";
$dbPass = "";
$dbDatabase = "test";
$dbHost = "localhost";

$dbConn = mysql_connect($dbHost, $dbUser, $dbPass);

if ($dbConn) {
    if (TRUE === mysql_select_db($dbDatabase)){   
    }
} else {
    die("<strong>Error:</strong> Could not connect to database.");
}

?>