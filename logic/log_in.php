<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../db_conn.php';
require 'check_existing_email.php';
require 'check_email_status.php';
require 'login_status.php';
require 'get_all_column.php';

//Connection to db
$dbconn = getDBConn();

// is_login(); // check if user logged in

//1. Check if account exist
try {

    $is_exist = is_exist($dbconn, trim($_POST['email-address']), trim($_POST['password']));
    if ($is_exist == 'password_ok') {
        session_start();

        $data = get_data($dbconn, trim($_POST['email-address']));
        
        $_SESSION['email'] = $data['EMAIL_ACCOUNT'];
        $_SESSION['password'] = $data['PASSWORD'];
        $_SESSION['id_user'] = $data['ID'];
        $_SESSION['id_company'] = $data['COMPANY'];

        //Account verified
        $is_verified = is_verified($dbconn, trim($_POST['email-address']));
        if($is_verified == 'verified' || 'trial'){
            
            // header('location: ../dashboard/index.php'); //go to dashbaord
            echo $is_verified;

        } elseif ($is_verified == 'not_verified') {

            // header('location: verifyemail.php'); //verify email page
            echo $is_verified;

        }

    } else {

        //Login failed
        echo $is_exist;
    }

} catch (\Throwable $th) {
    //throw $th;
    error_log(print_r($th->getMessage(), TRUE));
    return $th->getMessage();
}
