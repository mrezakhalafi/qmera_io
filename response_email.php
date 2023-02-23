<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require $_SERVER['DOCUMENT_ROOT'].'/logic/send_email_gmail.php';

    header("Content-Type: application/json");
    $data = json_decode(file_get_contents("php://input")); 

    $email_address = $data->email;
    $full_name = $data->name;
    $subject = "Qmera Email Response";

    function invoiceMail($username){
        $content = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/template/ContactusResponse.htm');
        $content = str_replace('USERNAME', $username, $content);

        $content = str_replace('', $username, $content);
        $content = str_replace('', $username, $content);

        return $content;
    }

    $content = invoiceMail($full_name);
    echo send_email($email_address, $full_name, $subject, $content);

?>