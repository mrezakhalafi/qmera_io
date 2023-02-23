<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_insert.php'); ?>

<?php

if (isset($_POST['email-address']) && isset($_POST['password'])) {
    $email = $_POST['email-address'];
    $showPassword = $_POST['password'];
    $password = MD5($_POST['password']);

    $dbconn = getDBConn();

    $query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE EMAIL_ACCOUNT = ? ");
    $query->bind_param("s", $email);
    $query->execute();
    $itemUser = $query->get_result()->fetch_assoc();
    $query->close();

    $query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? ORDER BY `CUT_OFF_DATE` DESC LIMIT 1");
    $query->bind_param("s", $itemUser['COMPANY']);
    $query->execute();
    $itemUser2 = $query->get_result()->fetch_assoc();
    $query->close();

    $msg = "";
    $active = 1;

    if ($itemUser['EMAIL_ACCOUNT'] != '') {

        if ($itemUser['PASSWORD'] != $password) {

            $msg = "Your Password is Incorrect!";

            //echo '<script>alert("Wrong Password")</script>';

        } else if ($itemUser2['CUT_OFF_DATE'] != null && strtotime($itemUser2['CUT_OFF_DATE']) < strtotime(date('Y-m-d H:i:s'))) {
            if (insertSession($itemUser['ID'])) {
                setSession('email', $email);
                setSession('password_show', $showPassword);
                setSession('password', $password);
                setSession('id_user', $itemUser['ID']);
                setSession('id_company', $itemUser['COMPANY']);
                $msg = 'expired';
            }
        } else if ($itemUser['ACTIVE'] != $active && $itemUser['ACTIVE'] != 3) {
            if (insertSession($itemUser['ID'])) {
                setSession('email', $email);
                setSession('hash', $itemUser['HASH']);
                setSession('password', $password);
                setSession('password_show', $showPassword);
                setSession('id_company', $itemUser['COMPANY']);
                setSession('id_user', $itemUser['ID']);
                $msg = "Please Validate Your Email!";
            } else {
                $msg = "You already logged in with another account!";
            }
        } else if ($itemUser['STATUS'] != 1 && $itemUser['STATUS'] != 3 && $itemUser['ACTIVE'] == 0) {
            if (insertSession($itemUser['ID'])) {
                setSession('email', $email);
                setSession('hash', $itemUser['HASH']);
                setSession('password', $password);
                setSession('password_show', $showPassword);
                setSession('id_company', $itemUser['COMPANY']);
                setSession('id_user', $itemUser['ID']);
                $msg = "Please Finish Your Payment!";
            } else {
                $msg = "You already logged in with another account!";
            }
        } else {
            if (insertSession($itemUser['ID'])) {
                setSession('email', $email);
                setSession('password_show', $showPassword);
                setSession('password', $password);
                setSession('id_user', $itemUser['ID']);
                setSession('id_company', $itemUser['COMPANY']);
                if ($itemUser['ACTIVE'] == 3 && $itemUser['STATE'] == 0) {
                    $msg = "Trial!";
                } else {
                    $msg = 'ok';
                }
            } else {
                $msg = "You already logged in with another account!";
            }
        }
    } else {
        //salah
        $msg = "Account does not exist!";
    }
}

header('Content-Type: application/json');
echo ('{"response": "' . $msg . '"}');

?>
