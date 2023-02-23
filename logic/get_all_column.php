<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function get_data($dbconn, $value)
{
    try {

        //Check db for particular email
        $query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT AS UA JOIN COMPANY AS CMP ON UA.COMPANY = CMP.ID WHERE EMAIL_ACCOUNT='$value';");
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
        
        return $result;
        
    } catch (\Throwable $th) {

        //throw $th;
        error_log(print_r($th->getMessage(), TRUE));
        return $th->getMessage();
    }
}