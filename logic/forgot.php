<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../db_conn.php';
require 'check_existing_email.php';
require 'send_email_gmail.php';
require 'get_all_column.php';

//Connection to db
$dbconn = getDBConn();

//1. Check if account exist
try {
    $email = trim($_POST['email-address']);
    $generatedPass = md5(substr(md5(time()), 0, 10));
    $data = get_data($dbconn, $email);

    $is_exist = is_exist($dbconn, $email);
    if ($is_exist != 'not_exist') {

        $subject = 'Forgot Password Submission';
        $body = file_get_contents('../Palio_Recover_Password_Header.html') . $generatedPass . file_get_contents('../Palio_Recover_Password_Footer.html');

        // udpate new password
        try {
            
            $query = $dbconn->prepare("UPDATE USER_ACCOUNT SET PASSWORD = MD5('$generatedPass') WHERE EMAIL_ACCOUNT = '$email' ");
            $query->execute();
            $query->close();

        } catch (\Throwable $th) {
            //throw $th;
            error_log(print_r($th->getMessage(), TRUE));
            return $th->getMessage();
        }

        //Account exist, send instructions email
        echo send_email($email, $data['USERNAME'], $subject, $body);

    } else {

        //Account not exist
        echo $is_exist;
    }

} catch (\Throwable $th) {
    //throw $th;
    error_log(print_r($th->getMessage(), TRUE));
    return $th->getMessage();
}
