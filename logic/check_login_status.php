<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../db_conn.php';

//Connection to db
$dbconn = getDBConn();


function is_login()