<?php
require("config.php");

if (isset($_POST['submitButton'])) {
    
    //Declaring Variables, protecting from SQL injection
    $firstName = mysql_real_escape_string(filter_input(INPUT_POST, 'firstName'));
    $lastName = mysql_real_escape_string(filter_input(INPUT_POST, 'lastName'));
    $email = mysql_real_escape_string(filter_input(INPUT_POST, 'email'));
    $catAmount = filter_input(INPUT_POST, 'catDropDown');
    $password = mysql_real_escape_string(filter_input(INPUT_POST, 'password'));
    //hashing password for database
    $hashPassword = hash("sha512", $password);
    
    //Checking each required field to see that it has been filled in
    if (trim($email) == ''){
        die("The email field was empty");
        
    } else if (trim($firstName) == '') {
        die("The First Name field was empty");
        
    } else if (trim($lastName) == '') {
        die("The Last Name field was empty");
        
    } else if (trim($password) == '') {
        die("the Password field was empty");
    }
    
    //Seeing if the check boxes have been filled in 
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
    
    //Inserting our data into the users table
    $inserted = mysql_query("INSERT INTO users (email, password, firstName, lastName, catAmount, boolCat, boolDog, boolSnake," .
            "boolSpider, boolOrange) VALUES ('$email', '$hashPassword', '$firstName', '$lastName', '$catAmount', '$boolCat', '$boolDog'," .
            "'$boolSnake', '$boolSpider', '$boolOrange')");
    
    //Checking to see if the insert into sql succeeded. 
    if ($inserted){
        print("Thank you for registering!");
    } else {
        print("</br> Error: sql insert aborted, user not registered.");
    }
}
?>