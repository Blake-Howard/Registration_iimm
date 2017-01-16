<?php

$dbUser = "root";
$dbPass = "";
$dbDatabase = "test";
$dbHost = "localhost";

$dbConn = mysql_connect($dbHost, $dbUser, $dbPass);

if ($dbConn) {
    if (TRUE == mysql_select_db($dbDatabase)){
         print("Succesful Connection");   
    }
} else {
    die("<strong>Error:</strong> Could not connect to database.");
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

