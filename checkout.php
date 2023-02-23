
<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_insert.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/api_generator_2.php');

$js_version = 'v=12.1';

// language
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'LANGUAGE'");
$query->execute();
$lang_setting = $query->get_result()->fetch_assoc();
$language = $lang_setting['VALUE'];
$query->close();

// geoloc
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'GEOLOC'");
$query->execute();
$geoloc = $query->get_result()->fetch_assoc();
$geolocSts = $geoloc['VALUE'];
$query->close();

$_SESSION['language'] = $language;
$_SESSION['geolocSts'] = $geolocSts;
echo "<script>
    localStorage.geolocSts = " . $geolocSts . ";
    localStorage.fixedLanguage = " . $language . ";
    </script>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 12;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$dbconn = getDBConn();
$company_id = $_SESSION['id_company'];

// check cut off date
$query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? ORDER BY `CUT_OFF_DATE` DESC LIMIT 1");
$query->bind_param("s", $company_id);
$query->execute();
$itemUser2 = $query->get_result()->fetch_assoc();
$query->close();
//end check cut off date

if (isset($_POST['cancel'])) {
    if ($itemUser2['IS_PAID'] == 0) {
        unset($_SESSION['password']);
        unset($_SESSION['email']);
        unset($_SESSION['hash']);
        unset($_SESSION['companyname']);
        unset($_SESSION['username']);
        unset($_SESSION['price']);
        unset($_SESSION['id_company']);
        unset($_SESSION['session_token']);
        unset($_SESSION['flag']);
        unset($_SESSION['in_checkout']);
        session_destroy();

        header("Location: " . base_url());
    } else {
        unset($_SESSION['in_checkout']);
        redirect(base_url() . 'dashboardv2/index.php');
    }
}

$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE COMPANY = ?");
$query->bind_param("s", $company_id);
$query->execute();
$dataUser = $query->get_result()->fetch_assoc();
$password = MD5($dataUser['PASSWORD']);
$user_id = $dataUser['ID'];
$userStatus = $dataUser['STATUS'];
$userState = $dataUser['STATE'];
$email = $dataUser['EMAIL_ACCOUNT'];
$query->close();

$email = $_SESSION['email'];
$apikey = base64_encode(microtime() . $email);

$query = $dbconn->prepare("SELECT * FROM COMPANY_INFO WHERE COMPANY = ?");
$query->bind_param("s", $company_id);
$query->execute();
$dataCompany = $query->get_result()->fetch_assoc();
$query->close();

$query = $dbconn->prepare("SELECT * FROM CREDIT WHERE COMPANY_ID = ?");
$query->bind_param("s", $company_id);
$query->execute();
$credit_data = $query->get_result()->fetch_assoc();
$query->close();

// search for currency
$query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? ORDER BY ID DESC");
$query->bind_param("s", $company_id);
$query->execute();
$dataBill = $query->get_result()->fetch_assoc();
$currencyBill = $dataBill['CURRENCY'];
$query->close();
// search for currency

// $price_item_amount = sprintf('%0.2f', 33.5);

if ($_SESSION['geolocSts'] == 0 && $_SESSION['language'] == 1) {
    $currency = 'IDR';
    $price_item_amount = 450000.00;
} else {
    $currency = 'USD';
    $price_item_amount = 33.50;
}

//check order number availability
do {
    $bytes = random_bytes(8);
    $hexbytes = strtoupper(bin2hex($bytes));
    $order_number = substr($hexbytes, 0, 15);

    $query = $dbconn->prepare("SELECT COUNT(*) as counter_bill FROM BILLING WHERE ORDER_NUMBER = ?");
    $query->bind_param("s", $order_number);
    $query->execute();
    $counter = $query->get_result()->fetch_assoc();
    $counter_bill = $counter['counter_bill'];
    $query->close();
} while ($counter_bill > 0);

echo "<script>transaction_id = '" . $order_number . "';</script>";
echo "<script>company_id = " . $company_id . ";</script>";

// pay with paypal
if (isset($_POST['dashboard']) || $userState == 1) {
    // CREATE NEW BILLING FOR USER
    $product_id = 0;
    // $charge = 33.5;

    if ($_SESSION['geolocSts'] == 0 && $_SESSION['language'] == 1) {
        $currency = 'IDR';
        $charge = 450000.00;
    } else {
        $currency = 'USD';
        $charge = 33.50;
    }

    if ($dataUser['STATUS'] == 3 && $dataBill['IS_PAID'] == 1) {
        // TRIAL TO SUBSCRIBE

        // insert id product to subscribe table
        $query = $dbconn->prepare("INSERT INTO SUBSCRIBE (COMPANY, PRODUCT, START_DATE, END_DATE, STATUS) VALUES (?, ?, NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 0)");
        $query->bind_param("si", $company_id, $product_id);
        $query->execute();
        $subscribe_id = $query->insert_id;
        $query->close();

        //BILLING INSERT QUERY
        $query = $dbconn->prepare("INSERT INTO BILLING (ORDER_NUMBER, BILL_DATE, DUE_DATE, COMPANY, SUBSCRIBE, CURRENCY, CHARGE, CUT_OFF_DATE, IS_PAID) VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), ?, ?, ?, ?, DATE_ADD(NOW(), INTERVAL 37 DAY), 0)");
        $query->bind_param("ssisd", $order_number, $company_id, $subscribe_id, $currency, $charge);
        $query->execute();
        $bill_id = $query->insert_id;
        $query->close();
        // END CREATE NEW BILLING FOR USER
    } else {
        // NEW BILLING
        $query = $dbconn->prepare("SELECT * FROM SUBSCRIBE WHERE COMPANY = ? AND STATUS = 0");
        $query->bind_param("s", $company_id);
        $query->execute();
        $subscribe = $query->get_result()->fetch_assoc();
        $subscribe_id = $subscribe['ID'];
        $query->close();

        $query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? AND SUBSCRIBE = ?");
        $query->bind_param("si", $company_id, $subscribe_id);
        $query->execute();
        $subscriptionData = $query->get_result()->fetch_assoc();
        $bill_id = $subscriptionData['ID'];
        $currency = $subscriptionData['CURRENCY'];
        $query->close();
    }

    $query = $dbconn->prepare("SELECT *, COUNT(*) as cnt FROM BILLING WHERE ID = ?");
    $query->bind_param("i", $bill_id);
    $query->execute();
    $subscriptionData = $query->get_result()->fetch_assoc();
    $cnt = $subscriptionData['cnt'];
    $query->close();

    if ($cnt > 0) {
        // $apikey = base64_encode(microtime() . $email);

        // select an apikey
        $query = $dbconn->prepare("SELECT APIKEY FROM APIKEY ORDER BY ID DESC LIMIT 1");
        $query->execute();
        $apiarray = $query->get_result()->fetch_assoc();
        $apikey = $apiarray['APIKEY'];
        $query->close();

        // insert company
        $query = $dbconn->prepare("UPDATE COMPANY SET API_KEY = ? WHERE ID = ?");
        $query->bind_param("ss", $apikey, $company_id);
        $query->execute();
        $query->close();

        // delete used apikey
        $query = $dbconn->prepare("DELETE FROM APIKEY WHERE APIKEY = ?");
        $query->bind_param("s", $apikey);
        $query->execute();
        $query->close();

        $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',1, 1)");
        $queryUpdateInfo->execute();
        $queryUpdateInfo->close();

        $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',2, 1)");
        $queryUpdateInfo->execute();
        $queryUpdateInfo->close();

        $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',3 , 1)");
        $queryUpdateInfo->execute();
        $queryUpdateInfo->close();

        $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',4 , 1)");
        $queryUpdateInfo->execute();
        $queryUpdateInfo->close();

        //update status subscribe
        $query = $dbconn->prepare("UPDATE SUBSCRIBE SET STATUS = 1 WHERE ID = ?");
        $query->bind_param("i", $subscribe_id);
        $query->execute();
        $query->close();

        //update billing
        $query = $dbconn->prepare("UPDATE BILLING SET IS_PAID = 1 WHERE ID = ?");
        $query->bind_param("i", $bill_id);
        $query->execute();
        $query->close();

        //PAYMENT INSERT QUERY
        $query = $dbconn->prepare("INSERT INTO PAYMENT (PAYMENT_METHOD, BILL, COMPANY, USER, PAY_DATE) VALUES ('PAYPAL', ?, ?, ?, NOW())");
        $query->bind_param("isi", $bill_id, $company_id, $user_id);
        $query->execute();
        $query->close();

        $expire_date = strtotime('+30 days') * 1000;

        // // insert apikey to nusdk server
        $api_url = "http://202.158.33.27:8004/webrest/";
        $api_data = array(
            'code' => 'REGBE',
            'data' => array(
                'company_id' => $company_id,
                'name' => $dataCompany['COMPANY_NAME'],
                'api_key' => $apikey,
                'expire_date' => $expire_date,
                'private_key' => $_SESSION['password'],
                'is_trial' => 0,
            ),

        );

        $api_options = array(
            'http' => array(
                'header'  =>
                // "Authorization: ".$secretKey."\r\n".
                "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => strval(json_encode($api_data))
            )
        );

        $api_stream = stream_context_create($api_options);
        $api_result = file_get_contents($api_url, false, $api_stream);
        $api_json_result = json_decode($api_result);
        // end apikey

        $query = $dbconn->prepare("UPDATE USER_ACCOUNT SET STATUS = 1, ACTIVE = 1, STATE = 3 WHERE ID = ?");
        $query->bind_param("i", $_SESSION['id_user']);
        $query->execute();
        $query->close();

        if ($credit_data['PREPAID_QUOTA'] < 0) {

            $ce_quota = 17800000 + $credit_data['PREPAID_QUOTA'];

            $query = $dbconn->prepare("UPDATE CREDIT SET CREDIT = 0, PREPAID_QUOTA = 0, CE_QUOTA = ? WHERE COMPANY_ID = ?");
            $query->bind_param("ds", $ce_quota, $company_id);
            $query->execute();
            $query->close();
        } else {

            $query = $dbconn->prepare("UPDATE CREDIT SET CE_QUOTA = 17800000 WHERE COMPANY_ID = ?");
            $query->bind_param("s", $company_id);
            $query->execute();
            $query->close();
        }

        $dbconncore = dbConnPalioLite();
        $query = $dbconncore->prepare("UPDATE BUSINESS_ENTITY SET EC_DATE = DATE_ADD(NOW(), INTERVAL 30 DAY) WHERE COMPANY_ID = ?");
        $query->bind_param("s", $company_id);
        $query->execute();
        $query->close();

        function invoiceMail($name, $orderNumber, $orderDate, $item, $price, $method, $dashboard)
        {
            $item = "Up to 5,000,000 Monthly Text Recipients, Up to 50,000 Monthly Image Recipients, Up to 5,000 Monthly Video Recipients, Up to 3,000 Monthly Minutes Livestream Recipients, Up to 50,000 Monthly Minutes 1-1 VoIP Calls, Up to 500 Monthly Minutes 1-1 Video Calls";
            $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/template/Payment_copy_01.html');
            $content = str_replace('*NAME*', $name, $content);
            $content = str_replace('*AMOUNT*', $price, $content);
            $content = str_replace('1A2B3C4D5EFFF', $orderNumber, $content);
            $content = str_replace('April 28, 2020', $orderDate, $content);
            $content = str_replace('ITEM1', $item, $content);
            $content = str_replace('$75', $price, $content);
            $content = str_replace('BCA: **** 5808', $method, $content);
            $content = str_replace('http://103.94.169.26:8081/', $dashboard, $content);
            return $content;
        }

        $name = $dataUser['USERNAME'];
        $orderDate = date("F d, Y");
        $price = 33.5;
        $method = 'PAYPAL';
        $dashboard = base_url();
        $content = invoiceMail($name, $order_number, $orderDate, $item, '$' . $price, $method, $dashboard);

        // EMAIL
        $lowerCaseMail = strtolower($email);
        require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer();
        //$mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        // $mail->Username   = 'support@qmera.io';
        // $mail->Password   = 'Socialcommerce23';
        $mail->Username   = 'support@palio.io';
        $mail->Password   = '12345easySoft67890';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        // $mail->setFrom('support@qmera.io', 'Qmera');
        // $mail->addAddress($lowerCaseMail);
        // $mail->addReplyTo('support@qmera.io');
        $mail->setFrom('support@palio.io', 'Qmera');
        $mail->addAddress($lowerCaseMail);
        $mail->addReplyTo('support@palio.io');

        $mail->isHTML(true);
        $mail->Subject = 'Subscription Submission';
        $mail->Body = $content;
        $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/PalioEmailConfirmation_files/image003.png', 'ccimage', 'images003.png');

        if (!$mail->send()) {
            $succMsg = "";
            $mail->ClearAllRecipients();
            $msg = 'Error Mailler: ' . $mail->ErrorInfo;
            echo $msg;
        } else {
            $mail->ClearAllRecipients();
            $sent = true;

            // insert session into db
            apiGen();
            insertSession($user_id);
            unset($_SESSION['in_checkout']);
            setSession('order_number', $orderNumber);
            redirect(base_url() . 'status/palio/status.php');
        }
    }
}
// end pay with paypal

?>

<!DOCTYPE html>
<html>

<head>
    <title>Qmera - Checkout</title>
    <link rel="icon" type="image/png" href="images/qmera_button.png">
    <script>
        <?php if ($geolocSts == 1) { ?>

            var _0x71d3 = ['lang', 'https://api.ipgeolocation.io/ipgeo?apiKey=cacef90bd1af48e5a4e0a97e91439f51', 'lastCheck', 'prevGeoloc', '33274vpNuAb', 'country_code', '4980616OFFoOz', '914DRDVNE', 'switchLang', '282590khnngw', 'removeItem', '657143dDDjDE', '1313863qaJEoz', 'lang_visible', '49lrHAZr', 'country_code2', 'currentGeoloc', 'floor', '1DkWrmN', 'undefined', '1272623MVTMuX', 'prevCountry', 'ajax', '1197kAwtKu', 'now', 'Sorry,\x20we\x20are\x20unable\x20to\x20get\x20your\x20current\x20location.'];
            var _0x424e = function(_0x1bbcc1, _0x3bbb63) {
                _0x1bbcc1 = _0x1bbcc1 - 0x150;
                var _0x71d32d = _0x71d3[_0x1bbcc1];
                return _0x71d32d;
            };
            var _0x4d98a0 = _0x424e;
            (function(_0x32a3a7, _0x36a1eb) {
                var _0x4633dc = _0x424e;
                while (!![]) {
                    try {
                        var _0x468f39 = -parseInt(_0x4633dc(0x162)) + -parseInt(_0x4633dc(0x15f)) + parseInt(_0x4633dc(0x15d)) * parseInt(_0x4633dc(0x153)) + parseInt(_0x4633dc(0x161)) * -parseInt(_0x4633dc(0x168)) + parseInt(_0x4633dc(0x164)) * -parseInt(_0x4633dc(0x15a)) + -parseInt(_0x4633dc(0x150)) + parseInt(_0x4633dc(0x15c));
                        if (_0x468f39 === _0x36a1eb) break;
                        else _0x32a3a7['push'](_0x32a3a7['shift']());
                    } catch (_0x1a3820) {
                        _0x32a3a7['push'](_0x32a3a7['shift']());
                    }
                }
            }(_0x71d3, 0xe020d), localStorage[_0x4d98a0(0x159)] = localStorage['currentGeoloc'], localStorage[_0x4d98a0(0x166)] = 'ON', localStorage['removeItem'](_0x4d98a0(0x15e)));

            function geoLoc() {
                var _0x41b74a = _0x4d98a0;
                $[_0x41b74a(0x152)]({
                    'url': _0x41b74a(0x157),
                    'type': 'GET',
                    'success': function(_0x20c0d4) {
                        var _0x25af1b = _0x41b74a;
                        console['log']('checking\x20loc'), localStorage[_0x25af1b(0x151)] = localStorage[_0x25af1b(0x15b)], localStorage[_0x25af1b(0x158)] = Math[_0x25af1b(0x167)](Date[_0x25af1b(0x154)]() / 0x3e8), (localStorage[_0x25af1b(0x151)] != _0x20c0d4[_0x25af1b(0x165)] || localStorage[_0x25af1b(0x151)] == null || typeof localStorage[_0x25af1b(0x151)] === _0x25af1b(0x169)) && (localStorage[_0x25af1b(0x15b)] = _0x20c0d4['country_code2'], _0x20c0d4[_0x25af1b(0x165)] == 'ID' ? (localStorage[_0x25af1b(0x163)] = 0x1, (localStorage[_0x25af1b(0x156)] != null || typeof localStorage[_0x25af1b(0x156)] !== _0x25af1b(0x169)) && (localStorage[_0x25af1b(0x156)] = 0x0)) : (localStorage[_0x25af1b(0x156)] = 0x0, localStorage[_0x25af1b(0x163)] = 0x0));
                    },
                    'error': function(_0x4f7a43) {
                        var _0x86c97d = _0x41b74a;
                        alert(_0x86c97d(0x155)), localStorage[_0x86c97d(0x160)](_0x86c97d(0x158)), localStorage[_0x86c97d(0x156)] = 0x0, localStorage[_0x86c97d(0x163)] = 0x0, localStorage[_0x86c97d(0x15b)] = 'EN';
                    }
                });
            }
            var ONE_HOUR = 0xe10;
            (localStorage[_0x4d98a0(0x15b)] == null || typeof localStorage[_0x4d98a0(0x15b)] === _0x4d98a0(0x169) || localStorage[_0x4d98a0(0x158)] == null || typeof localStorage['lastCheck'] === _0x4d98a0(0x169) || Math['floor'](Date[_0x4d98a0(0x154)]() / 0x3e8) - localStorage['lastCheck'] > ONE_HOUR) && geoLoc();


            <?php  } else {
            if ($language == 0) {
            ?>
                var _0x2b19 = ['currentGeoloc', '64yzEXmt', '21BCBnLW', 'lang', '1018260ESXDcp', 'OFF', 'country_code', 'prevGeoloc', '184296Ltguqm', '4915EEKXdO', 'lang_visible', '910593Trrhlr', 'switchLang', '713861hzPOHP', '56104oUzrrl', '909873unyjzF'];
                var _0x598b = function(_0x33432a, _0x47e9ef) {
                    _0x33432a = _0x33432a - 0x1d1;
                    var _0x2b1912 = _0x2b19[_0x33432a];
                    return _0x2b1912;
                };
                var _0x18fbc1 = _0x598b;
                (function(_0x1e21c5, _0x4aeaaa) {
                    var _0x4b9004 = _0x598b;
                    while (!![]) {
                        try {
                            var _0x13e830 = parseInt(_0x4b9004(0x1d5)) + parseInt(_0x4b9004(0x1d7)) * -parseInt(_0x4b9004(0x1df)) + parseInt(_0x4b9004(0x1d8)) * -parseInt(_0x4b9004(0x1d4)) + parseInt(_0x4b9004(0x1de)) + parseInt(_0x4b9004(0x1d1)) + -parseInt(_0x4b9004(0x1d3)) + parseInt(_0x4b9004(0x1da));
                            if (_0x13e830 === _0x4aeaaa) break;
                            else _0x1e21c5['push'](_0x1e21c5['shift']());
                        } catch (_0x799bd7) {
                            _0x1e21c5['push'](_0x1e21c5['shift']());
                        }
                    }
                }(_0x2b19, 0xc7521), localStorage['clear'](), localStorage[_0x18fbc1(0x1dd)] = localStorage[_0x18fbc1(0x1d6)], localStorage[_0x18fbc1(0x1d6)] = _0x18fbc1(0x1db), localStorage[_0x18fbc1(0x1d9)] = 0x0, localStorage[_0x18fbc1(0x1e0)] = 0x0, localStorage[_0x18fbc1(0x1d2)] = 0x0, localStorage[_0x18fbc1(0x1dc)] = 'EN');

            <?php } else if ($language == 1) { ?>
                var _0x1751 = ['1521928CPvvFF', 'country_code', '1545022PKREIU', '126MgcYjS', 'currentGeoloc', 'clear', '438101qZOkgj', 'lang', '2FcZVCl', '6046TWodqM', '2eoXnPO', 'prevGeoloc', '1hMKrrl', 'lang_visible', '2981274WyPVoM', 'OFF', '438172ejweNm', '25341ByAYOm'];
                var _0x6625 = function(_0x32650e, _0x20feeb) {
                    _0x32650e = _0x32650e - 0xc9;
                    var _0x175132 = _0x1751[_0x32650e];
                    return _0x175132;
                };
                var _0x54d035 = _0x6625;
                (function(_0x37e74f, _0x537b05) {
                    var _0x118670 = _0x6625;
                    while (!![]) {
                        try {
                            var _0x2dd2a2 = parseInt(_0x118670(0xd3)) * -parseInt(_0x118670(0xcd)) + -parseInt(_0x118670(0xcb)) * -parseInt(_0x118670(0xd4)) + parseInt(_0x118670(0xd8)) * -parseInt(_0x118670(0xcc)) + parseInt(_0x118670(0xcf)) * -parseInt(_0x118670(0xc9)) + -parseInt(_0x118670(0xd7)) + parseInt(_0x118670(0xd5)) + parseInt(_0x118670(0xd1));
                            if (_0x2dd2a2 === _0x537b05) break;
                            else _0x37e74f['push'](_0x37e74f['shift']());
                        } catch (_0x5d3d54) {
                            _0x37e74f['push'](_0x37e74f['shift']());
                        }
                    }
                }(_0x1751, 0xe3b0d), localStorage[_0x54d035(0xda)](), localStorage[_0x54d035(0xce)] = localStorage[_0x54d035(0xd9)], localStorage[_0x54d035(0xd9)] = _0x54d035(0xd2), localStorage[_0x54d035(0xca)] = 0x1, localStorage[_0x54d035(0xd0)] = 0x0, localStorage['switchLang'] = 0x1, localStorage[_0x54d035(0xd6)] = 'ID');

        <?php }
        } ?>
    </script>

    <style media="screen">
        @media only screen and (min-width: 0px) {
            #bca-button {
                height: 25px;
                min-height: 25px;
                max-height: 30px;
                padding: 5px;
            }

            #bca-button img {
                max-width: 40px;
            }

            #credit-card-button {
                height: 25px;
                min-height: 25px;
                max-height: 30px;
                padding: 5px;
            }
        }

        @media only screen and (min-width: 201px) {
            #bca-button {
                height: 25px;
                min-height: 25px;
                max-height: 55px;
                padding: 5px;
            }

            #bca-button img {
                max-width: 40px;
            }

            #credit-card-button {
                height: 25px;
                min-height: 25px;
                max-height: 55px;
                padding: 5px;
            }
        }

        @media only screen and (min-width: 301px) {
            #bca-button {
                height: 35px;
                min-height: 35px;
                max-height: 55px;
                padding: 5px;
            }

            #bca-button img {
                max-width: 40px;
            }

            #credit-card-button {
                height: 35px;
                min-height: 35px;
                max-height: 55px;
                padding: 5px;
            }
        }

        @media only screen and (min-width: 401px) {
            #bca-button {
                height: 45px;
                min-height: 30px;
                max-height: 55px;
                padding: 10px;
            }

            #bca-button img {
                max-width: 70px;
                position: relative;
                bottom: 7px;
            }

            #credit-card-button {
                height: 45px;
                min-height: 30px;
                max-height: 55px;
                padding: 10px;
            }
        }

        #three-ds-container {
            width: 550px;
            height: 450px;
            line-height: 200px;
            position: fixed;
            top: 25%;
            left: 40%;
            margin-top: -100px;
            margin-left: -150px;
            background-color: #ffffff;
            border-radius: 5px;
            text-align: center;
            z-index: 11;
            /* 1px higher than the overlay layer */
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        #paydiv {
            display: none;
        }

        #pay-with-credit-card {
            background-color: #ffc439;
            color: white;
        }

        #pay-with-credit-card:hover {
            background-color: #DBA830;
            color: white;
        }

        #pay-with-ovo {
            background-color: #ffc439;
            color: white;
        }

        #cancel {
            background-color: grey;
            color: white;
        }


        #pay-with-ovo:hover {
            background-color: #DBA830;
            color: white;
        }

        input[type=text]:focus {
            box-shadow: 0 0 5px #ffc439;
        }

        .alignleft {
            float: left;
        }

        .alignright {
            float: right;
        }

        #sub-benefits {
            border: 3px #01686d solid;
            border-radius: 15px;
            padding: 1em;
        }

        #sub-benefits>ul>li>ul {
            list-style-type: "✓ ";
        }

        .tip {
            font-size: .8em;
        }
    </style>
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/png" href="images/qmera_button.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="nicepage.css?v=<?php echo $file_version; ?>" media="screen">
    <link rel="stylesheet" href="Confirm-Subscription.css?v=<?php echo $file_version; ?>" media="screen">
    <script class="u-script" type="text/javascript" src="prettify.js?v=2135" defer=""></script>
    <meta name="generator" content="Nicepage 3.23.0, nicepage.com">

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Site1",
            "logo": "images/Qmera_Logo1.png"
        }
    </script>
    <meta name="theme-color" content="#6945a5">
    <meta property="og:title" content="Confirm Subscription">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/styles.min.css" rel="stylesheet" />
</head>

<header id="header" class="header fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener noreferrer">
            <img src="assets/img/logo.svg" class="qlogo-primary" alt="">
            <img src="assets/img/logo-light.svg" class="qlogo-light" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <input type="checkbox" class="chkboxqmera">
            <a href="#" class="mobile-nav-toggle"><span></span><span></span><span></span><span></span></a>
            <ul>
                <div class="smalllogo"><a href="index.php" class="qlogo d-flex align-items-center" title="QMERA"
                        rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
                <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i
                            class="qmera-ddicon"></i></a>
                    <ul>
                        <li><a href="conversational-engagement.php" rel="noopener"
                                aria-label="Conversational Engagement">Conversational Engagement</a></li>
                        <li><a href="conversational-sales.php" rel="noopener"
                                aria-label="Conversational Sales">Conversational Sales</a></li>
                        <li><a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots
                                and A.I</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="industries.php" rel="noopener"
                        aria-label="Industries">Industries</a></li>
                <!--<li><a href="resources.php" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
                <li><a href="blog.php" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
                <li><a href="/pages/developers.php">Developers</a></li>
                <li><a href="company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a></li>
                <li><a href="contact.php" class="nav-link" rel="noopener" aria-label="Contact">Contact</a></li>
                <?php if (!isset($_SESSION['id_user'])) { ?>
                <li><a href="/Sign-up.php" class="nav-link d-none" rel="noopener" aria-label="Get Started">Get Started</a></li>
                <li><a href="/login.php" class="nav-link" rel="noopener" aria-label="Login">
                    Login
                </a></li>
                <?php } else { ?>
                <li><a href="/login.php" class="nav-link active" rel="noopener" aria-label="Login">
                    Dashboard
                </a></li>
                <?php } ?>
            </ul>

        </nav><!-- .navbar -->
    </div>
</header>
<script src="https://qmera.io/qmera_button/embeddedbutton.js?v=<?php echo $file_version; ?>" defer=""></script>
    <section class="u-clearfix u-section-1" id="sec-d642">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h3 class="u-text u-text-default-lg u-text-default-xl u-text-palette-1-base u-text-1">Confirm ​Subscription</h3>
            <form id="credit-card-form" name="creditCardForm" method="post">
                <div class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-gutter-22 u-layout-wrap u-layout-wrap-1">
                    <div class="u-layout">
                        <div class="u-layout-row">
                            <div class="u-container-style u-layout-cell u-size-39 u-layout-cell-1">
                                <div class="u-container-layout u-valign-bottom-sm u-valign-middle-xl u-container-layout-1">
                                    <h5 class="u-text u-text-2">Payment details</h5>
                                    <div class="u-form u-form-1">
                                        <span class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" style="padding: 10px;">
                                            <div class="u-form-group u-form-name">
                                                <label for="name-36c3" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Name on card" id="name-36c3" name="name" class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-input u-input-rectangle u-white">
                                            </div>
                                            <div class="u-align-left u-form-group u-form-submit">
                                                <a href="#" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-btn-submit u-button-style u-none u-text-white u-btn-1">Submit</a>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="u-form u-form-2">
                                        <span class="u-clearfix u-form-horizontal u-form-spacing-10 u-inner-form" source="custom" style="padding: 10px;">
                                            <div class="u-form-group u-form-name">
                                                <label for="name-0e3a" class="u-form-control-hidden u-label"></label>
                                                <input maxlength="16" value="4000000000000002" type="text" placeholder="Card number" id="credit-card-number" name="name" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                                            </div>
                                            <div class="u-form-group">
                                                <label for="email-0e3a" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Expiry Date" value="05/2023" id="credit-card-expiry-date" name="expiry-date" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                                            </div>
                                            <div class="u-form-group u-form-group-5">
                                                <label for="text-ff51" class="u-form-control-hidden u-label"></label>
                                                <input maxlength="3" type="text" value="152" placeholder="CVV" id="credit-card-cvv" name="text" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                                            </div>
                                        </span>
                                    </div>
                                    <h5 class="u-text u-text-3">Billing address</h5>
                                    <div class="u-form u-form-3">
                                        <span class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" style="padding: 10px;">
                                            <div class="u-form-group u-form-name">
                                                <label for="name-36c3" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Street address" id="name-36c3" name="name" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                                            </div>
                                            <div class="u-align-left u-form-group u-form-submit">
                                                <a href="#" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-btn-submit u-button-style u-none u-text-white u-btn-3">Submit</a>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="u-form u-form-4">
                                        <span class="u-clearfix u-form-horizontal u-form-spacing-10 u-inner-form" source="custom" style="padding: 10px;">
                                            <div class="u-form-group u-form-name">
                                                <label for="name-0e3a" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="City" id="name-0e3a" name="name" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                                            </div>
                                            <div class="u-form-group">
                                                <label for="email-0e3a" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="State/province" id="email-0e3a" name="email" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" value="">
                                            </div>
                                            <div class="u-form-group u-form-group-11">
                                                <label for="text-ff51" class="u-form-control-hidden u-label"></label>
                                                <input type="text" placeholder="Zip code" id="text-ff51" name="text" class="u-border-1 u-border-grey-30 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                                            </div>
                                            <div class="u-align-left u-form-group u-form-submit">
                                                <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-none u-text-white u-btn-4">Submit</a>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-palette-2-base u-size-21 u-layout-cell-2">
                                <div class="u-container-layout u-container-layout-2">
                                    <h3 class="u-align-center u-text u-text-default u-text-4">Qmera Lite Package</h3>
                                    <h1 class="u-align-center u-text u-text-default u-text-palette-1-base u-text-5"><script>document.writeln(localStorage.country_code == 'ID' ? 'Rp 450,000' : '$33.5' )</script></h1>
                                    <input type="hidden" id="credit-card-amount" name="creditCardAmount" value="<?php echo (sprintf('%0.2f', 450000)); ?>">
                                    <input type="submit" id="pay-with-credit-card" name="payWithCreditCard" data-page-id="55699778" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-5" value="Complete Payment">
                                    <form action="checkout" method="POST">
                                        <input type="hidden" name="bill_id" value="<?php echo $bill_id; ?>">
                                        <input type="hidden" name="subscribe_id" value="<?php echo $subscribe_id; ?>">
                                        <input type="submit" id="cancel" value="Cancel" name="cancel" data-page-id="68453345" class="u-active-none u-align-center u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-black u-text-hover-palette-2-base u-btn-6">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div>
        <form method="post">
            <input style="display: none;" type="submit" value="Dashboard" name="dashboard" id="todashboard">
        </form>
    </div>

    <div class="overlay" style="display: none;"></div>
    <div id="three-ds-container" style="display: none;">
        <iframe id="sample-inline-frame" name="sample-inline-frame" width="550" height="450"> </iframe>
    </div>

    <!-- Loading Modal credit card -->
    <div class="modal fade" id="creditModalCenter" tabindex="-1" role="dialog" aria-labelledby="creditModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div><br>
                    Please don't close the browser or refresh the page.
                </div>
            </div>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="footer-content">
                <ul class="footer-menu-links">
                    <li><a href="#">Products</a>
                        <div class="mt-3">
                            <a href="conversational-engagement.php" rel="noopener"
                                aria-label="Conversational Engagement">Conversational Engagement</a><br>
                            <a href="conversational-sales.php" rel="noopener"
                                aria-label="Conversational Sales">Conversational Sales</a><br>
                            <a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots and
                                A.I</a>
                        </div>
                    </li>
                    <li><a href="industries.php" rel="noopener" aria-label="Industries">Industries</a></li>
                    <!--<li><a href="resources.php" rel="noopener" aria-label="Resources">Resources</a></li>-->
                    <li><a href="blog.php" rel="noopener" aria-label="Blog">Blog</a></li>
                    <li><a href="company.php" rel="noopener" aria-label="Company">Company</a>
                    </li>
                    <li><a href="contact.php" rel="noopener" aria-label="Contact">Contact</a>
                </ul>
                <p class="copyright-txt">© 2021 Qmera. All rights reserved <span>|</span> <a href="privacypolicy.php" rel="noopener"
                        aria-label="Privacy Policy">Privacy Policy</a> <span>|</span> <a href="#" rel="noopener"
                        aria-label="Disclosure">Disclosure</a></p>
            </div>
        </div>
    </footer>
</body>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

<script class="u-script" type="text/javascript" src="nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script type="text/javascript" src="geoloc.js?v=<?php echo $file_version; ?>" defer=""></script>
 <!-- Xendit.js -->
 <script type="text/javascript" src="https://js.xendit.co/v1/xendit.min.js"></script>
    <script type="text/javascript" src="js/payment_xendit_raw.js?<?php echo ($js_version); ?>"></script>

    <script src="https://unpkg.com/@paypal/paypal-js@2.0.0/dist/paypal.browser.min.js"></script>
    <script>
        $('document').ready(function() {
            if (localStorage.isPaid != '' && localStorage.isPaid == '1') {
                $('#creditModalCenter').modal('show');

                // update state user after success payment
                var js = {
                    company_id: <?php echo $company_id ?>,
                };

                function updateState() {
                    $.post("state_update", js,
                        function(data, status) {
                            // alert("Data: " + data + "\nStatus: " + status);
                            if (data != "Update success!") {
                                updateState();
                            } else {
                                $('#creditModalCenter').modal('hide');
                                alert('You have paid your billing.');
                                window.location.href = "/dashboardv2/index.php";
                            }
                        });
                }

                updateState();
                // end update state
            }
        });
    </script>


<script>
    // function demoFromHTML() {
    //     var pdf = new jsPDF('p', 'pt', 'letter');
    //     // source can be HTML-formatted string, or a reference
    //     // to an actual DOM element from which the text will be scraped.
    //     source = $('#invoice')[0];

    //     localStorage.capture = source.outerHTML;
    //     localStorage.username = "<?php echo $dataUser['USERNAME']; ?>";
    //     localStorage.orderdate = "<?php echo date("F d, Y"); ?>";
    //     localStorage.product = "<?php echo $dataCompany['PRODUCT_INTEREST']; ?>";
    //     localStorage.price = "<?php echo $price_item_amount; ?>";
    //     localStorage.email = "<?php echo $email; ?>";
    //     localStorage.ordernumber = "<?php echo $order_number; ?>";

    // }

    // demoFromHTML();

    window.onload = function() {
        localStorage.setItem('in_checkout', 1);
        if (localStorage.country_code == 'ID') {

            if (localStorage.getItem('lang') == 1) {
                <?php if ($currencyBill == 'IDR') { ?>
                    var _0x2487 = ['2522897ZXPtdS', '1GDYSBC', 'html', '1586809CYeteI', '1885253clImeY', '1ZrwdNl', '1337753rFqhMe', '20353OKNnWM', '#newpricing-6', '1261090yWdmpH', '66nlhhhe', '2fEnRPx', '804498uByMqU'];
                    var _0x2551 = function(_0x190e9c, _0x101f53) {
                        _0x190e9c = _0x190e9c - 0x15e;
                        var _0x248766 = _0x2487[_0x190e9c];
                        return _0x248766;
                    };
                    var _0x391fbe = _0x2551;
                    (function(_0x2509b5, _0x51d4d1) {
                        var _0x178270 = _0x2551;
                        while (!![]) {
                            try {
                                var _0x1cebb4 = parseInt(_0x178270(0x169)) * -parseInt(_0x178270(0x15f)) + -parseInt(_0x178270(0x165)) + parseInt(_0x178270(0x161)) + -parseInt(_0x178270(0x15e)) * -parseInt(_0x178270(0x167)) + -parseInt(_0x178270(0x166)) + parseInt(_0x178270(0x168)) * -parseInt(_0x178270(0x163)) + parseInt(_0x178270(0x160)) * parseInt(_0x178270(0x162));
                                if (_0x1cebb4 === _0x51d4d1) break;
                                else _0x2509b5['push'](_0x2509b5['shift']());
                            } catch (_0x19db2d) {
                                _0x2509b5['push'](_0x2509b5['shift']());
                            }
                        }
                    }(_0x2487, 0xe9f3d), $(_0x391fbe(0x16a))[_0x391fbe(0x164)]('Hanya\x20dengan\x20<strong>Rp450<sup>000</sup></strong>\x20biaya\x20langganan\x20per\x20bulan,\x20kamu\x20mendapatkan:'));
                <?php } else if ($currencyBill == 'USD') { ?>
                    var _0x1fa6 = ['2SzrsmQ', '#newpricing-6', '345929iexCij', '1065268uvYEVd', '755306aEGWqU', '430766jDOJzm', '1xaqqSF', 'Hanya\x20dengan\x20<strong>$33<sup>50</sup></strong>\x20biaya\x20langganan\x20per\x20bulan,\x20kamu\x20mendapatkan:', 'html', '1721777AgPaBf', '183856wMHrJM', '857130XesJzH'];
                    var _0x41cd = function(_0x4300a5, _0xf1a619) {
                        _0x4300a5 = _0x4300a5 - 0x1b6;
                        var _0x1fa645 = _0x1fa6[_0x4300a5];
                        return _0x1fa645;
                    };
                    var _0x474f95 = _0x41cd;
                    (function(_0x2a20be, _0x34ab8b) {
                        var _0x1a9ddb = _0x41cd;
                        while (!![]) {
                            try {
                                var _0xfe4dd8 = parseInt(_0x1a9ddb(0x1ba)) + parseInt(_0x1a9ddb(0x1b6)) + -parseInt(_0x1a9ddb(0x1bd)) * -parseInt(_0x1a9ddb(0x1bb)) + -parseInt(_0x1a9ddb(0x1bc)) + -parseInt(_0x1a9ddb(0x1b9)) + parseInt(_0x1a9ddb(0x1b7)) * parseInt(_0x1a9ddb(0x1c1)) + -parseInt(_0x1a9ddb(0x1c0));
                                if (_0xfe4dd8 === _0x34ab8b) break;
                                else _0x2a20be['push'](_0x2a20be['shift']());
                            } catch (_0x3587ec) {
                                _0x2a20be['push'](_0x2a20be['shift']());
                            }
                        }
                    }(_0x1fa6, 0x85880), $(_0x474f95(0x1b8))[_0x474f95(0x1bf)](_0x474f95(0x1be)));
                <?php } else { ?>
                    var _0x1bf5 = ['112103SDcLqG', '6999fXAjpw', '2MWKvQN', '364289UYJYUz', '5569ZAZcUq', '31UsZdMK', 'html', 'Hanya\x20dengan\x20<strong>Rp450<sup>000</sup></strong>\x20biaya\x20langganan\x20per\x20bulan,\x20kamu\x20mendapatkan:', '43mercoq', '7554HstfDU', '238183VkUkeI', '1yuJuYc', '1244661QjDkaR', '26kRkJmH'];
                    var _0x1d9e = function(_0x417c9b, _0x466f57) {
                        _0x417c9b = _0x417c9b - 0x15e;
                        var _0x1bf53c = _0x1bf5[_0x417c9b];
                        return _0x1bf53c;
                    };
                    var _0x140daf = _0x1d9e;
                    (function(_0x40b939, _0x3cadb6) {
                        var _0x4e1831 = _0x1d9e;
                        while (!![]) {
                            try {
                                var _0x53358c = parseInt(_0x4e1831(0x16b)) * -parseInt(_0x4e1831(0x15e)) + parseInt(_0x4e1831(0x163)) * parseInt(_0x4e1831(0x165)) + -parseInt(_0x4e1831(0x168)) * parseInt(_0x4e1831(0x167)) + -parseInt(_0x4e1831(0x162)) * parseInt(_0x4e1831(0x164)) + parseInt(_0x4e1831(0x15f)) * -parseInt(_0x4e1831(0x160)) + -parseInt(_0x4e1831(0x166)) + parseInt(_0x4e1831(0x161));
                                if (_0x53358c === _0x3cadb6) break;
                                else _0x40b939['push'](_0x40b939['shift']());
                            } catch (_0x250707) {
                                _0x40b939['push'](_0x40b939['shift']());
                            }
                        }
                    }(_0x1bf5, 0x2da50), $('#newpricing-6')[_0x140daf(0x169)](_0x140daf(0x16a)));
                <?php } ?>
            } else if (localStorage.getItem('lang') == 0) {
                <?php if ($currencyBill == 'IDR') { ?>
                    var _0x4391 = ['1447aZptpc', '7pfCCfW', '1073049sifcqw', '861972MrqQAv', '13mDEkJQ', '3UEGcVg', '81477KLgXjt', '305NxWFfx', '#newpricing-6', '193178Ygqvbs', '6158336YJeEAq', '183289EcWTkg', 'For\x20just\x20<strong>Rp450<sup>000</sup></strong>\x20monthly\x20subscription,\x20you\x20get:'];
                    var _0x3cb2 = function(_0x4acd0d, _0x46a3e7) {
                        _0x4acd0d = _0x4acd0d - 0x130;
                        var _0x439177 = _0x4391[_0x4acd0d];
                        return _0x439177;
                    };
                    var _0x3d1c05 = _0x3cb2;
                    (function(_0x319ca2, _0x37812b) {
                        var _0x8746dd = _0x3cb2;
                        while (!![]) {
                            try {
                                var _0x552931 = -parseInt(_0x8746dd(0x137)) * parseInt(_0x8746dd(0x131)) + -parseInt(_0x8746dd(0x13a)) + -parseInt(_0x8746dd(0x13b)) * parseInt(_0x8746dd(0x130)) + -parseInt(_0x8746dd(0x139)) + -parseInt(_0x8746dd(0x138)) * parseInt(_0x8746dd(0x133)) + parseInt(_0x8746dd(0x135)) * -parseInt(_0x8746dd(0x13c)) + parseInt(_0x8746dd(0x134));
                                if (_0x552931 === _0x37812b) break;
                                else _0x319ca2['push'](_0x319ca2['shift']());
                            } catch (_0xda970d) {
                                _0x319ca2['push'](_0x319ca2['shift']());
                            }
                        }
                    }(_0x4391, 0xc85ba), $(_0x3d1c05(0x132))['html'](_0x3d1c05(0x136)));
                <?php } else if ($currencyBill == 'USD') { ?>
                    var _0x265d = ['2014SHrlxi', 'For\x20just\x20<strong>$33<sup>50</sup></strong>\x20monthly\x20subscription,\x20you\x20get:', '1633266xlNHJh', '#newpricing-6', '5mNYgvs', '806629hNMYYc', '413974GkJjgW', '1050182euuAHw', '421097RJxfdn', '40569xvfGpo', '1mNKNZr', '109mwhqqI'];
                    var _0x10fb = function(_0x26b6b8, _0x529825) {
                        _0x26b6b8 = _0x26b6b8 - 0xa8;
                        var _0x265d24 = _0x265d[_0x26b6b8];
                        return _0x265d24;
                    };
                    var _0x58d075 = _0x10fb;
                    (function(_0x3b20eb, _0x24cce1) {
                        var _0x30bd16 = _0x10fb;
                        while (!![]) {
                            try {
                                var _0x1c2949 = parseInt(_0x30bd16(0xae)) + parseInt(_0x30bd16(0xb1)) + -parseInt(_0x30bd16(0xb2)) + parseInt(_0x30bd16(0xab)) * parseInt(_0x30bd16(0xac)) + -parseInt(_0x30bd16(0xaa)) * parseInt(_0x30bd16(0xb3)) + -parseInt(_0x30bd16(0xa9)) * -parseInt(_0x30bd16(0xb0)) + -parseInt(_0x30bd16(0xa8));
                                if (_0x1c2949 === _0x24cce1) break;
                                else _0x3b20eb['push'](_0x3b20eb['shift']());
                            } catch (_0x4c0aed) {
                                _0x3b20eb['push'](_0x3b20eb['shift']());
                            }
                        }
                    }(_0x265d, 0xee875), $(_0x58d075(0xaf))['html'](_0x58d075(0xad)));
                <?php } else { ?>
                    var _0x83c8 = ['522105zzibSP', '1ddmyAj', 'For\x20just\x20<strong>Rp450<sup>000</sup></strong>\x20monthly\x20subscription,\x20you\x20get:', 'html', '3819742YivdCH', '307969lunvDC', '1dgaZAi', '#newpricing-6', '1NDvGlK', '963493BTgHSF', '443870Tnfnao', '654545jPcRRH', '1022942GMDGLX'];
                    var _0x440c = function(_0x4a5569, _0x163f42) {
                        _0x4a5569 = _0x4a5569 - 0x82;
                        var _0x83c84d = _0x83c8[_0x4a5569];
                        return _0x83c84d;
                    };
                    var _0x47a587 = _0x440c;
                    (function(_0x51d3bc, _0x46b31d) {
                        var _0x5494e4 = _0x440c;
                        while (!![]) {
                            try {
                                var _0x297e3c = parseInt(_0x5494e4(0x8b)) * -parseInt(_0x5494e4(0x86)) + -parseInt(_0x5494e4(0x83)) * -parseInt(_0x5494e4(0x8c)) + -parseInt(_0x5494e4(0x88)) + -parseInt(_0x5494e4(0x87)) + -parseInt(_0x5494e4(0x8a)) + parseInt(_0x5494e4(0x89)) * -parseInt(_0x5494e4(0x84)) + parseInt(_0x5494e4(0x82));
                                if (_0x297e3c === _0x46b31d) break;
                                else _0x51d3bc['push'](_0x51d3bc['shift']());
                            } catch (_0x3eefc1) {
                                _0x51d3bc['push'](_0x51d3bc['shift']());
                            }
                        }
                    }(_0x83c8, 0x7f234), $(_0x47a587(0x85))[_0x47a587(0x8e)](_0x47a587(0x8d)));
                <?php } ?>
            }
        } else if (localStorage.country_code != 'ID') {
            <?php if ($currencyBill == 'IDR') { ?>
                var _0x41fb = ['324095LhKdbR', 'For\x20just\x20<strong>Rp450<sup>000</sup></strong>\x20monthly\x20subscription,\x20you\x20get:', '73IwDTxO', '5449963cbETJR', '#newpricing-6', '183941eIYCem', '12131ldMKsa', '1FSQhBM', 'html', '903933BWTNIt', '1270473EhWIdh', '1SslrNF', '1FavJiI', '1415109DWPoLY'];
                var _0x143c = function(_0x20f09a, _0x3c2217) {
                    _0x20f09a = _0x20f09a - 0x6c;
                    var _0x41fb3a = _0x41fb[_0x20f09a];
                    return _0x41fb3a;
                };
                var _0x43e812 = _0x143c;
                (function(_0x414cd1, _0x14ee66) {
                    var _0x363095 = _0x143c;
                    while (!![]) {
                        try {
                            var _0x5393c4 = -parseInt(_0x363095(0x72)) + -parseInt(_0x363095(0x6e)) + -parseInt(_0x363095(0x71)) * parseInt(_0x363095(0x6f)) + -parseInt(_0x363095(0x78)) * parseInt(_0x363095(0x74)) + parseInt(_0x363095(0x70)) * parseInt(_0x363095(0x77)) + parseInt(_0x363095(0x6d)) * -parseInt(_0x363095(0x79)) + parseInt(_0x363095(0x75));
                            if (_0x5393c4 === _0x14ee66) break;
                            else _0x414cd1['push'](_0x414cd1['shift']());
                        } catch (_0x4daff4) {
                            _0x414cd1['push'](_0x414cd1['shift']());
                        }
                    }
                }(_0x41fb, 0xcbcab), $(_0x43e812(0x76))[_0x43e812(0x6c)](_0x43e812(0x73)));
            <?php } else if ($currencyBill == 'USD') { ?>
                var _0x31fc = ['2874895gXdWno', '535011SUTWYs', 'For\x20just\x20<strong>$33<sup>50</sup></strong>\x20monthly\x20subscription,\x20you\x20get:', '31kTtBDR', 'html', '9sbFTeS', '54382rJlQeD', '3203aKtvmx', '10dgLMgi', '#newpricing-6', '92289IMHTup', '42710jpqcSb', '1cbRIhv', '1119253bxRgRU', '241HgcLzi'];
                var _0x4101 = function(_0x203b1b, _0x5a2b2b) {
                    _0x203b1b = _0x203b1b - 0x140;
                    var _0x31fc6b = _0x31fc[_0x203b1b];
                    return _0x31fc6b;
                };
                var _0x378656 = _0x4101;
                (function(_0x30afa1, _0x2eb396) {
                    var _0x165865 = _0x4101;
                    while (!![]) {
                        try {
                            var _0x10c2fe = parseInt(_0x165865(0x14e)) * parseInt(_0x165865(0x14a)) + parseInt(_0x165865(0x149)) * parseInt(_0x165865(0x141)) + -parseInt(_0x165865(0x14c)) * parseInt(_0x165865(0x145)) + parseInt(_0x165865(0x14b)) + parseInt(_0x165865(0x148)) * parseInt(_0x165865(0x143)) + -parseInt(_0x165865(0x144)) * -parseInt(_0x165865(0x146)) + -parseInt(_0x165865(0x14d));
                            if (_0x10c2fe === _0x2eb396) break;
                            else _0x30afa1['push'](_0x30afa1['shift']());
                        } catch (_0x2f49f2) {
                            _0x30afa1['push'](_0x30afa1['shift']());
                        }
                    }
                }(_0x31fc, 0xac555), $(_0x378656(0x147))[_0x378656(0x142)](_0x378656(0x140)));
            <?php } else { ?>
                var _0x2b58 = ['274534OAdmuU', '163877NBOykV', '8871qzseHP', '1DDWyef', '#newpricing-6', '237821XGMcSr', '166002GeZbrm', 'For\x20just\x20<strong>$33<sup>50</sup></strong>\x20monthly\x20subscription,\x20you\x20get:', '182477SSPnXn', '182164bZfkdg', '3ZbxbiE', '1EIhdDT', '3qHjvEF'];
                var _0x3232 = function(_0x58a2f2, _0x232438) {
                    _0x58a2f2 = _0x58a2f2 - 0x111;
                    var _0x2b583e = _0x2b58[_0x58a2f2];
                    return _0x2b583e;
                };
                var _0x3afb68 = _0x3232;
                (function(_0x5c508a, _0x3a9546) {
                    var _0x1f7ad0 = _0x3232;
                    while (!![]) {
                        try {
                            var _0x2ce721 = parseInt(_0x1f7ad0(0x114)) + parseInt(_0x1f7ad0(0x112)) * parseInt(_0x1f7ad0(0x115)) + -parseInt(_0x1f7ad0(0x113)) + parseInt(_0x1f7ad0(0x11b)) + -parseInt(_0x1f7ad0(0x116)) * parseInt(_0x1f7ad0(0x118)) + -parseInt(_0x1f7ad0(0x111)) * parseInt(_0x1f7ad0(0x11c)) + -parseInt(_0x1f7ad0(0x11d)) * -parseInt(_0x1f7ad0(0x119));
                            if (_0x2ce721 === _0x3a9546) break;
                            else _0x5c508a['push'](_0x5c508a['shift']());
                        } catch (_0x14d9e1) {
                            _0x5c508a['push'](_0x5c508a['shift']());
                        }
                    }
                }(_0x2b58, 0x2b146), $(_0x3afb68(0x117))['html'](_0x3afb68(0x11a)));
            <?php } ?>
        }
    }

    window.onbeforeunload = function(e) {
        e = e || window.event;

        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Any string';
        }

        // For Safari
        return 'Any string';
    };

    window.onunload = function(e) {
        localStorage.removeItem('in_checkout');
    };
</script>

</html>