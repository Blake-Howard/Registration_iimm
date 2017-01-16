<?php
require("config.php");

if (isset($_POST['submitButton'])) {
    
    $firstName = mysql_real_escape_string(filter_input(INPUT_POST, 'firstName'));
    $lastName = mysql_real_escape_string(filter_input(INPUT_POST, 'lastName'));
    $email = mysql_real_escape_string(filter_input(INPUT_POST, 'email'));
    $catAmount = filter_input(INPUT_POST, 'catDropDown');
    $password = mysql_real_escape_string(filter_input(INPUT_POST, 'password'));
    $hashPassword = hash("sha512", $password);
    
    if (trim($email) == ''){
        die("The email field was empty");
        
    } else if (trim($firstName) == '') {
        die("The First Name field was empty");
        
    } else if (trim($lastName) == '') {
        die("The Last Name field was empty");
        
    } else if (trim($password) == '') {
        die("the Password field was empty");
    }
    
    if (isset($_POST['catChkBox'])) {
        $boolCat = TRUE;
    } else {
        $boolCat = FALSE;
    }
    
    if (isset($_POST['dogChkBox'])) {
        $boolDog = TRUE;
    } else {
        $boolDog = FALSE;
    }
    
    if (isset($_POST['spiderChkBox'])) {
        $boolSpider = TRUE;
    } else {
        $boolSpider = FALSE;
    }
    
    if (isset($_POST['snakeChkBox'])) {
        $boolSnake = TRUE;
    } else {
        $boolSnake = FALSE;
    }
    
    if (isset($_POST['orangeChkBox'])) {
        $boolOrange = TRUE;
    } else {
        $boolOrange = FALSE;
    }  
    
    $inserted = mysql_query("INSERT INTO users (email, password, firstName, lastName, catAmount, boolCat, boolDog, boolSnake," .
            "boolSpider, boolOrange) VALUES ('$email', '$hashPassword', '$firstName', '$lastName', '$catAmount', '$boolCat', '$boolDog'," .
            "'$boolSnake', '$boolSpider', '$boolOrange')");
    
    if ($inserted){
        print("Thank you for registering!");
    } else {
        print("</br> sql insert aborted");
    }
}
?>