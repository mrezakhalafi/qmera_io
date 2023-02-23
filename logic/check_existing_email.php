<?php

function is_exist($dbconn, $email, $password=null)
{
    try {

        //Check db for particular email
        $query = $dbconn->prepare("SELECT COUNT(EMAIL_ACCOUNT) AS CNT, PASSWORD AS PW FROM USER_ACCOUNT WHERE EMAIL_ACCOUNT='$email';");
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
        $cnt = $result['CNT'];

        if ($cnt == 0){

            return 'not_exist'; // account does not exist

        } else {

            //for login
            if ($password != null){

                if ($password == $result['PW']){

                    return 'password_ok'; // login success

                } else {

                    return 'password_wrong'; // wrong password

                }
                
            } 
            //for register
            else {

                return 'exist'; // account exist cant register with same email

            }

        }
        
    } catch (\Throwable $th) {

        //throw $th;
        error_log(print_r($th->getMessage(), TRUE));
        return $th->getMessage();
    }
}
