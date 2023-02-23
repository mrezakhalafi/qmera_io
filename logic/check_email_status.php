<?php

function is_verified($dbconn, $email)
{
    try {

        //Check db for particular email
        $query = $dbconn->prepare("SELECT STATUS AS STS FROM USER_ACCOUNT WHERE EMAIL_ACCOUNT='$email';");
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
        $sts = $result['STS'];

        if ($sts == 0) {

            return 'not_verified';

        } else if ($sts == 1) {

            return 'verified';

        } else {

            return 'trial';

        }
        
    } catch (\Throwable $th) {

        //throw $th;
        error_log(print_r($th->getMessage(), TRUE));
        return $th->getMessage();
    }
}
