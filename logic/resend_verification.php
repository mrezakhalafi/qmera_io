<?php

require 'send_email_gmail.php';
require 'get_all_column.php';
require '../db_conn.php';
require 'customize_template.php';

session_start();

//Connection to db
$dbconn = getDBConn();

$data = get_data($dbconn, $_SESSION['email']);

$email_address = $data['EMAIL_ACCOUNT'];
$full_name = $data['USERNAME'];
$subject = "Qmera Email Confirmation";
$activation_link = $_SESSION['activation-link'];

$content = customizeTemplateRemoteEmailConfirmation($full_name, $activation_link);
echo send_email($email_address, $full_name, $subject, $content);