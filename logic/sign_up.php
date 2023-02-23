<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
require '../db_conn.php';
require 'check_existing_email.php';
// require 'send_email.php';
require 'send_email_gmail.php';
require 'customize_template.php';

session_start();

//Connection to db
$dbconn = getDBConn();

//0. trim spaces from input
$full_name = trim($_POST['name']);
$email_address = trim($_POST['emailAddr']);
$password = trim($_POST['pass']);
$_SESSION['password_show'] = $password;
$_SESSION['full_name'] = $full_name;
$hash = md5(rand(0, 1000));

//check session token
$query = $dbconn->prepare("SELECT * FROM SESSION WHERE SESSION_TOKEN = ?");
$query->bind_param("s", $_SESSION['session_token']);
$query->execute();
$token = $query->get_result()->fetch_assoc();
$token_exist = $token['USER_ID'];
$query->close();

// $token_exist = null;

if ($token_exist == null) {

    //2. Insert to database
    try {

        do {

            $bytes = random_bytes(8);
            $hexbytes = strtoupper(bin2hex($bytes));
            $company_id = substr($hexbytes, 0, 10);

            $query = $dbconn->prepare("SELECT COUNT(*) as check_company FROM COMPANY WHERE ID = '$company_id'");
            $query->execute();
            $counter = $query->get_result()->fetch_assoc();
            $check_company = $counter['check_company'];
            $query->close();
            
        } while ($check_company > 0);

        // select an apikey
        $query = $dbconn->prepare("SELECT APIKEY FROM APIKEY ORDER BY ID DESC LIMIT 1");
        $query->execute();
        $apiarray = $query->get_result()->fetch_assoc();
        $apikey = $apiarray['APIKEY'];
        $query->close();

        // insert company
        $query = $dbconn->prepare("INSERT INTO COMPANY (ID, API_KEY, DOMAIN, STATUS) VALUES ('$company_id', '$apikey', 'easysoft', 0)");
        $query->execute();
        // $company_id = $query->insert_id;
        $query->close();

        $_SESSION['id_company'] = $company_id;

        // delete used apikey
        $query = $dbconn->prepare("DELETE FROM APIKEY WHERE APIKEY = '$apikey'");
        $query->execute();
        $query->close();

        //insert id product to subscribe table
        $query = $dbconn->prepare("INSERT INTO SUBSCRIBE (COMPANY, PRODUCT, START_DATE, END_DATE, STATUS) VALUES ('$company_id', 0, NOW(), DATE_ADD(NOW(), INTERVAL 1 DAY), 3)");
        $query->execute();
        $subscribe_id = $query->insert_id;
        $query->close();

        // insert to user account
        $query = $dbconn->prepare("INSERT INTO USER_ACCOUNT (COMPANY, USERNAME, EMAIL_ACCOUNT, PASSWORD, STATUS, HASH, ACTIVE) VALUES ('$company_id', '$full_name', '$email_address', MD5('$password'), 3, '$hash', 0);");
        $query->execute();
        $user_id = $query->insert_id;
        $query->close();

        // update session
        $query = $dbconn->prepare("UPDATE SESSION SET USER_ID = ? WHERE SESSION_TOKEN = ?");
        $query->bind_param("is", $user_id, $_SESSION['session_token']);
        $query->execute();
        $query->close();

        //check order number availability
        do {

            $bytes = random_bytes(8);
            $hexbytes = strtoupper(bin2hex($bytes));
            $order_number = substr($hexbytes, 0, 15);

            $query = $dbconn->prepare("SELECT COUNT(*) as counter_bill FROM BILLING WHERE ORDER_NUMBER = '$order_number'");
            $query->execute();
            $counter = $query->get_result()->fetch_assoc();
            $counter_bill = $counter['counter_bill'];
            $query->close();
            
        } while ($counter_bill > 0);

        // $query = $dbconn->prepare("INSERT INTO BILLING (ORDER_NUMBER, BILL_DATE, DUE_DATE, COMPANY, SUBSCRIBE, CURRENCY, CHARGE, CUT_OFF_DATE, IS_PAID) VALUES ('$order_number', NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), '$company_id', '$subscribe_id', 'IDR', '450000', DATE_ADD(NOW(), INTERVAL 37 DAY), 0)");
        // $query->execute();
        // $query->close();

        $_SESSION['order_number'] = $order_number;

        // insert company info
        $services = "ls,vc,ac,ss,um,wb,cb";
        $query = $dbconn->prepare("INSERT INTO COMPANY_INFO (COMPANY, COMPANY_NAME, CREATED_DATE, PRODUCT_INTEREST) VALUES ('$company_id', '$full_name', NOW(), '$services');");
        $query->execute();
        $query->close();

        // insert company info
        $query = $dbconn->prepare("REPLACE INTO CREDIT (USER_ID, COMPANY_ID, CURRENCY) VALUES ('$user_id', '$company_id', 'USD');");
        $query->execute();
        $query->close();

        $secret = sha1($hash);
        $_SESSION['secret'] = $secret;

        // insert temporary table
        $query = $dbconn->prepare("INSERT INTO HASH (EMAIL, HASH) VALUES ('$email_address', '$secret');");
        $query->execute();
        $query->close();

        $url = $_SERVER['SERVER_NAME'] . '/';
        $subject = "Qmera Email Confirmation";
        // $activation_link = $_SERVER['SERVER_NAME'] . '/' . "verify.php?h=" . $secret;
        $activation_link = base_url() . "verify.php?h=" . $secret;
        $content = customizeTemplateRemoteEmailConfirmation($full_name, $activation_link);

        // to enable resend verification
        $_SESSION['activation-link'] = $activation_link;
        $_SESSION['email'] = $email_address;
        
        echo send_email($email_address, $full_name, $subject, $content);

    } catch (\Throwable $th) {

        //throw $th;
        error_log(print_r($th->getMessage(), TRUE));
        return $th->getMessage();

    }

} else {

    echo ("token_exist");

}

