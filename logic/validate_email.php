<?php

require '../db_conn.php';
require 'check_existing_email.php';

//Connection to db
$dbconn = getDBConn();

$email_address = trim($_POST['email-address']);

//1. Check if email exist
if (is_exist($dbconn, $email_address) == 'exist') {

    // redirect back to signup page
    echo ('exist');
    
} else {

    echo 'not_exist';

}