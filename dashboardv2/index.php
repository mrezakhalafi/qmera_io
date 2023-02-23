<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>
<?php

date_default_timezone_set('Asia/Bangkok');

// state control
$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 14;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$version = 'v=1.71';

$dbConnPalioLite = dbConnPalioLite();

unset($_SESSION['bill']);

$company_id = getSession('id_company');
$user_id = getSession('id_user');

$query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? order by DUE_DATE desc limit 1");
$query->bind_param("s", $company_id);
$query->execute();
$bill2 = $query->get_result()->fetch_assoc();
$bill_start_date = $bill2['BILL_DATE'];
$due_date = $bill2["DUE_DATE"];
$currency = $bill2['CURRENCY'];
$_SESSION['charge'] = $bill2['CHARGE'];
$query->close();

//company info product interest
$query = $dbconn->prepare("SELECT * FROM COMPANY_INFO WHERE COMPANY = ? order by CREATED_DATE desc limit 1");
$query->bind_param("s", $company_id);
$query->execute();
$info = $query->get_result()->fetch_assoc();
$interest = $info["PRODUCT_INTEREST"];
$each_service = explode(',', $interest);
$query->close();

// USER CREDIT
$query = $dbconn->prepare("SELECT * FROM CREDIT WHERE USER_ID = ?");
$query->bind_param("i", $_SESSION['id_user']);
$query->execute();
$credit = $query->get_result()->fetch_assoc();
$query->close();


//check due date
$today = date("Y-m-d H:i:s");
include '../new_billing.php';
if ($today > $due_date || $bill2['IS_PAID'] == 0) {
    newBilling();
}

//um
$query = $dbconn->prepare("SELECT * FROM COMP_FEATURE WHERE COMPANY_ID = ?");
$query->bind_param("s", $company_id);
$query->execute();
$enabled = $query->get_result();
$query->close();

if ($enabled) {
    foreach ($enabled as $en) {
        if ($en['TYPE'] == 1) {
            $um_enabled = $en['VALUE'];
        } else if ($en['TYPE'] == 2) {
            $voip_enabled = $en['VALUE'];
        } else if ($en['TYPE'] == 3) {
            $ls_enabled = $en['VALUE'];
        } else if ($en['TYPE'] == 4) {
            $web_enabled = $en['VALUE'];
        }
    }
}

$query = $dbconn->prepare("SELECT us.COMPANY_ID, SUM(TEXT_RECIPIENT) AS TEXT, SUM(IMG_RECIPIENT) AS DOC, SUM(VIDEO_RECIPIENT) AS VIDEO, SUM(LS_MINUTES) AS LS, SUM(VOIP_MINUTES) AS VOIP, SUM(VC_MINUTES) AS VIDCALL, b.BILL_DATE, b.DUE_DATE, b.CUT_OFF_DATE
FROM USAGE_SUMMARY us, BILLING b 
WHERE us.COMPANY_ID = ? AND b.IS_PAID = 1 AND b.COMPANY = us.COMPANY_ID AND (us.CREATED_AT BETWEEN DATE(b.BILL_DATE) AND DATE(b.CUT_OFF_DATE))
AND (CURDATE() BETWEEN DATE(b.BILL_DATE) AND DATE(b.CUT_OFF_DATE))");
$query->bind_param("i", $_SESSION['id_company']);
$query->execute();
$usage_data = $query->get_result()->fetch_assoc();
$query->close();

//TOTAL UNPAID BILL
$query = $dbconn->prepare("SELECT SUM(CHARGE) AS TOTAL FROM BILLING WHERE COMPANY = ? AND IS_PAID = 0");
$query->bind_param("s", $company_id);
$query->execute();
$total_bill = $query->get_result()->fetch_assoc(); //GET COLUMNS
$query->close();

$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE ID = ?");
$query->bind_param("i", $user_id);
$query->execute();
$userID = $query->get_result()->fetch_assoc();
$query->close();

//update company logo
if (isset($_POST['changeCompanyLogo'])) {

    $logo_filename = $_FILES['company-logo']['name'];

    try {

        $targetbase64 = '';

        if (isset($_FILES['company-logo']) && $_FILES['company-logo']['name'] != '') {
            $check = getimagesize($_FILES["company-logo"]["tmp_name"]);
            if ($check !== false) {
                $name = $_FILES["company-logo"]["name"];
                $target_dir = getcwd() . '/uploads/logo/';
                $target_file = $target_dir . $_FILES["company-logo"]["name"];
                // $targetbase64 = $target_file;

                // Select file type
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array("jpg", "jpeg", "png", "gif", "webp");

                // Check extension
                if (in_array($imageFileType, $extensions_arr)) {
                    // Upload file
                    move_uploaded_file($_FILES['company-logo']['tmp_name'], $target_dir . $name);
                }
            }


            //   update logo path
            $queryUpdateCompanyLogo = $dbconn->prepare("UPDATE COMPANY_INFO SET COMPANY_LOGO = ? WHERE COMPANY = ?");
            $queryUpdateCompanyLogo->bind_param("ss", $name, $id_company);
            $queryUpdateCompanyLogo->execute();
            $queryUpdateCompanyLogo->close();

            // copy to pmall
            $hexFileName = bin2hex($logo_filename);
            $hexNameFull = substr($hexFileName, 0, 15) . '.' . $imageFileType;

            // copy($target_file, $_SERVER["DOCUMENT_ROOT"] . '/qiosk_web/images/' . $hexNameFull);
            $connection = ssh2_connect('192.168.1.100', 2309);
            $ssh_local_file = '/var/www/html/qmera/dashboardv2/assets/uploads/logo/' . $_FILES["company-logo"]["name"];
            ssh2_auth_password($connection, 'easysoft', '5z2mQ6r+$74LJXa*');
            ssh2_scp_send($connection, $ssh_local_file, '/var/www/html/palio.io/qiosk_web/images/' . $from . '-' . $hex . '.' . $fileType, 0777);

            // update shop logo
            $updateShopName = $dbConnPalioLite->prepare("UPDATE SHOP s SET s.THUMB_ID = ? WHERE s.PALIO_ID = ?");
            $updateShopName->bind_param("ss", $hexNameFull, $id_company);
            $updateShopName->execute();
            $updateShopName->close();

            // get image path string
            $fname = $target_file;

            // quality
            $per = 0.6;

            // get extension type
            $type = pathinfo($fname, PATHINFO_EXTENSION);

            //Generate new size parameters
            list($width, $height) = getimagesize($fname);
            $new_w = $width * $per;
            $new_h = $height * $per;

            // Load image
            $output = imagecreatetruecolor($new_w, $new_h);

            // handle transparency
            imagealphablending($output, false);
            imagesavealpha($output, true);
            $transparent = imagecolorallocatealpha($output, 255, 255, 255, 127);
            imagefilledrectangle($output, 0, 0, $new_w, $new_h, $transparent);

            // create image resource
            if ($type == 'jpg' || $type == 'jpeg') {
                $source = imagecreatefromjpeg($fname);
            } else if ($type == 'png') {
                $source = imagecreatefrompng($fname);
            } else if ($type == 'gif') {
                $source = imagecreatefromgif($fname);
            }

            // Resize the source image to new size
            imagecopyresampled($output, $source, 0, 0, 0, 0, $new_w, $new_h, $width, $height);

            // get base64 from image resource
            if ($type == 'jpg' || $type == 'jpeg') {
                ob_start();
                imagejpeg($output);
                $contents = base64_encode(ob_get_clean());
            } else if ($type == 'png') {
                ob_start();
                imagepng($output);
                $contents = base64_encode(ob_get_clean());
            } else if ($type == 'gif') {
                ob_start();
                imagegif($output);
                $contents = base64_encode(ob_get_clean());
            }

            // echo "<script>
            // console.log('" . $contents . "');
            // </script>";

            // insert company logo to nusdk server
            $company_id = $id_company;
            $api_url = "http://192.168.1.100:8004/webrest/";
            $api_data = array(
                'code' => 'UPLLG',
                'data' => array(
                    'company_id' => $company_id,
                    'filename' => $name,
                    'data' => $contents,
                ),
            );

            $api_options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => strval(json_encode($api_data))
                )
            );

            $api_stream = stream_context_create($api_options);
            $api_result = file_get_contents($api_url, false, $api_stream);
            $api_json_result = json_decode($api_result);

            if (http_response_code() != 200) {
                throw new Exception('Company logo update failed, please try again!');
            }
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

//update company name
if (isset($_POST['changeCompanyName'])) {

    $company_name = $_POST['inputCompanyName'];

    try {

        if (isset($_POST['inputCompanyName']) && $_POST['inputCompanyName'] != '') {
            // update user info
            $queryUpdateInfo = $dbconn->prepare("UPDATE COMPANY_INFO SET COMPANY_NAME = ? WHERE COMPANY = ?");
            $queryUpdateInfo->bind_param("ss", $company_name,  $id_company);
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();

            // $shopPalioId = strval($id_company);
            // update shop name
            $updateShopName = $dbConnPalioLite->prepare("UPDATE SHOP s SET s.NAME = ? WHERE s.PALIO_ID = ?");
            $updateShopName->bind_param("ss", $company_name, $id_company);
            $updateShopName->execute();
            $updateShopName->close();

            $company_id = $id_company;
            $api_url = "http://192.168.1.100:8004/webrest/";
            $api_data = array(
                'code' => 'UPTNM',
                'data' => array(
                    'company_id' => $company_id,
                    'name' => $company_name
                ),

            );

            $api_options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => strval(json_encode($api_data))
                )
            );

            $api_stream = stream_context_create($api_options);
            $api_result = file_get_contents($api_url, false, $api_stream);
            $api_json_result = json_decode($api_result);

            if (http_response_code() != 200) {
                throw new Exception('Password update failed, please try again!');
            }
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

//update user name
if (isset($_POST['changeUserName'])) {

    $newUser = $_POST['inputUserName'];

    try {

        if ($newUser != '') {
            $queryUpdateCompany = $dbconn->prepare("UPDATE USER_ACCOUNT SET USERNAME = ? WHERE ID = ?");
            $queryUpdateCompany->bind_param("si", $newUser, getSession('id_user'));
            $queryUpdateCompany->execute();
            $queryUpdateCompany->close();
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

// update adm pass
if (isset($_POST['changeAdmPass'])) {

    $adminPass = $_POST['adminPass'];

    try {

        if ($adminPass != '') {

            //update user email
            $queryUpdateCompany = $dbconn->prepare("UPDATE USER_ACCOUNT SET PASSWORD = ? WHERE ID = ?");
            $queryUpdateCompany->bind_param("si", MD5($adminPass), getSession('id_user'));
            $queryUpdateCompany->execute();
            $queryUpdateCompany->close();

            // setSession('password', MD5($adminPass));
            // setSession('password_show', $adminPass);

            // insert priv key to nusdk server
            $company_id = $id_company;
            $api_url = "http://192.168.1.100:8004/webrest/";
            $api_data = array(
                'code' => 'ADMPASS',
                'data' => array(
                    'private_key' => md5($adminPass),
                    'company_id' => $company_id,
                ),

            );

            $api_options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => strval(json_encode($api_data))
                )
            );

            $api_stream = stream_context_create($api_options);
            $api_result = file_get_contents($api_url, false, $api_stream);
            $api_json_result = json_decode($api_result);

            if (http_response_code() != 200) {
                throw new Exception('Password update failed, please try again!');
            } else {
                setSession('password', MD5($adminPass));
                setSession('password_show', $adminPass);
            }
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

// update internal pass
if (isset($_POST['changeIntPass'])) {

    $new_password_priv = $_POST['inputPass_priv'];

    try {

        if ($new_password_priv != '') {

            //update user email
            $queryUpdateCompany = $dbconn->prepare("UPDATE COMPANY_INFO SET PRIVATE_PASSWORD = ? WHERE COMPANY = ?");
            $queryUpdateCompany->bind_param("ss", $new_password_priv, $id_company);
            $queryUpdateCompany->execute();
            $queryUpdateCompany->close();

            // insert priv key to nusdk server
            $company_id = $id_company;
            $api_url = "http://192.168.1.100:8004/webrest/";
            $api_data = array(
                'code' => 'INTPASS',
                'data' => array(
                    'company_id' => $company_id,
                    'private_key' => md5($new_password_priv),
                ),

            );

            $api_options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => strval(json_encode($api_data))
                )
            );

            $api_stream = stream_context_create($api_options);
            $api_result = file_get_contents($api_url, false, $api_stream);
            $api_json_result = json_decode($api_result);

            if (http_response_code() != 200) {
                throw new Exception('Internal password update failed, please try again!');
            }
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

// update support email
if (isset($_POST['changeSuppEmail'])) {

    $new_supp_email = $_POST['new_supp_email'];

    try {

        if ($new_supp_email != '') {

            $queryUpdateInfo = $dbconn->prepare("UPDATE COMPANY_INFO SET SUPPORT_EMAIL = ? WHERE COMPANY = ?");
            $queryUpdateInfo->bind_param("ss", $new_supp_email,  $id_company);
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();

            // insert priv key to nusdk server
            $company_id = $id_company;
            $api_url = "http://192.168.1.100:8004/webrest/";
            $api_data = array(
                'code' => 'EMLSUP',
                'data' => array(
                    'company_id' => $company_id,
                    'email' => $new_supp_email,
                ),

            );

            $api_options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => strval(json_encode($api_data))
                )
            );

            $api_stream = stream_context_create($api_options);
            $api_result = file_get_contents($api_url, false, $api_stream);
            $api_json_result = json_decode($api_result);

            if (http_response_code() != 200) {
                throw new Exception('Support email update failed, please try again!');
            }
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }

    if (!isset($ex)) {
        echo "<script>";
        echo "window.location.href='index.php';";
        echo "</script>";
    }
}

if (isset($_POST['feature_update'])) {

    $company_id = $id_company;

    $messaging = (int) $_POST['um'];
    $vcall = (int) $_POST['voip-vcall'];
    $livestream = (int) $_POST['ls-os'];
    $web_access = (int) $_POST['web-access'];

    $complete = true;

    try {

        // $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES (" . $company_id . ",1 ," . $messaging . ")");
        // $queryUpdateInfo->execute();
        // $queryUpdateInfo->close();

        // $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES (" . $company_id . ",2 ," . $vcall . ")");
        // $queryUpdateInfo->execute();
        // $queryUpdateInfo->close();

        // $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES (" . $company_id . ",3 ," . $livestream . ")");
        // $queryUpdateInfo->execute();
        // $queryUpdateInfo->close();

        // //um
        $api_url = "http://192.168.1.100:8004/webrest/";
        $api_data = array(
            'code' => 'FTRACC',
            'data' => array(
                'company_id' => $company_id,
                'user_type' => 0,
                'type' => '1',
                'value' => $messaging,
            ),
        );

        $api_options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => strval(json_encode($api_data))
            )
        );

        $api_stream = stream_context_create($api_options);
        $api_result = file_get_contents($api_url, false, $api_stream);
        $api_json_result = json_decode($api_result);

        if (http_response_code() != 200) {
            throw new Exception('Feature settings update failed, please try again.');
            $complete = false;
        } else {
            $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',1 ," . $messaging . ")");
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();
        }

        //vcall
        $api_url = "http://192.168.1.100:8004/webrest/";
        $api_data = array(
            'code' => 'FTRACC',
            'data' => array(

                'company_id' => $company_id,
                'user_type' => 0,
                'type' => '2',
                'value' => $vcall,
            ),
        );

        $api_options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => strval(json_encode($api_data))
            )
        );

        $api_stream = stream_context_create($api_options);
        $api_result = file_get_contents($api_url, false, $api_stream);
        $api_json_result = json_decode($api_result);

        if (http_response_code() != 200) {
            throw new Exception('Feature settings update failed, please try again.');
            $complete = false;
        } else {
            $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',2 ," . $vcall . ")");
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();
        }

        //ls-os
        $api_url = "http://192.168.1.100:8004/webrest/";
        $api_data = array(
            'code' => 'FTRACC',
            'data' => array(
                'company_id' => $company_id,
                'user_type' => 0,
                'type' => '3',
                'value' => $livestream,
            ),
        );

        $api_options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => strval(json_encode($api_data))
            )
        );

        $api_stream = stream_context_create($api_options);
        $api_result = file_get_contents($api_url, false, $api_stream);
        $api_json_result = json_decode($api_result);

        if (http_response_code() != 200) {
            throw new Exception('Feature settings update failed, please try again.');
            $complete = false;
        } else {
            $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',3 ," . $livestream . ")");
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();
        }

        // web-access
        $api_url = "http://192.168.1.100:8004/webrest/";
        $api_data = array(
            'code' => 'FTRACC',
            'data' => array(
                'company_id' => $company_id,
                'user_type' => 0,
                'type' => '4',
                'value' => $web_access,
            ),
        );

        $api_options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => strval(json_encode($api_data))
            )
        );

        $api_stream = stream_context_create($api_options);
        $api_result = file_get_contents($api_url, false, $api_stream);
        $api_json_result = json_decode($api_result);

        if (http_response_code() != 200) {
            throw new Exception('Feature settings update failed, please try again.');
            $complete = false;
        } else {
            $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',4," . $web_access . ")");
            $queryUpdateInfo->execute();
            $queryUpdateInfo->close();
        }
    } catch (Exception $ex) {
        echo "<script language='javascript'>";
        echo "alert('" . $ex->getMessage() . "');";
        echo "window.location.href='index.php';";
        echo "</script>";
    }


    if ($complete && !isset($ex)) {
        redirect(base_url() . "dashboardv2/index.php");
    }
}

?>

<style media="screen">
    a {
        color: #007A87;
    }

    @media (max-width:1366px) {
        #docs-title {
            font-size: 18px;
        }

        .docs-section {
            font-size: 13px;
        }
    }

    #service-info li {
        padding: 0.5rem 0 !important;
    }

    @media (min-width: 768px) {
        .row.row-eq-height {
            display: flex;
            flex-wrap: wrap;
        }
    }

    .border-70 {
        border: 1px solid #707070;
        border-radius: 7px;
    }

    .docs-section .form-control {
        border: 1px solid #707070;
        border-radius: 7px;
    }

    .docs-section .input-group .form-control {
        border: unset;
        font-size: 14px;
    }

    .save-settings {
        color: white;
        /* float: right; */
        vertical-align: middle;
        padding: 4px 10px;
    }

    #passwarn,
    #passwarn2 {
        display: none;
    }

    .content-wrapper>.content {
        padding: 0 4rem !important;
    }

    .card {
        padding-top: 2rem;
        padding-bottom: 2rem;
        padding-left: 6rem;
        padding-right: 2rem
    }

    .container-check input:checked~.checkmark {
        background-color: #FFA03E;
    }

    .container-check {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        /* font-size: 22px; */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container-check input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="col">
            <div class="row d-flex justify-content-end align-items-center p-1">
                <img class="mr-4" src="./assets/icons/dashboard_nav/notification-black.png" width="35px;">

                <?php if ($itemUserDetail['COMPANY_LOGO'] !=  null) { ?>
                    <img src="<?php echo base_url() . "dashboardv2/uploads/logo/{$itemUserDetail['COMPANY_LOGO']}"; ?>" class="rounded-circle" width="35px" height="35px">
                <?php } else { ?>
                    <img src="./assets/icons/dashboard_nav/ava.png" class="rounded-circle" width="35px" height="35px">
                <?php } ?>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" style="color: black;">
                        <span class="ml-2" style="font-size: 18px;"><?php echo $itemUser['USERNAME']; ?></span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <form method="POST" id="logoutUser" style="margin: 0;">
                            <li>
                                <button type="submit" name="submitLogout" class="dropdown-item" id="logoutButton">
                                    Sign out
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
            <hr style="margin: 0; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row row-eq-height">
                                <div class="col-xl-9 col-lg-12">
                                    <div class="card rounded-0" id="account">
                                        <div class="row">
                                            <h2 class="card-name font-medium text-dark">Account Overview</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 justify-content-center" style="font-size: 14px;">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row mb-3 justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <?php if ($itemUser['COMPANY_LOGO'] !=  null) { ?>
                                                                <img class="profile-pic img-responsive mx-auto" id="logo-preview" src="<?php echo base_url(); ?>dashboardv2/uploads/logo/<?php echo $itemUser['COMPANY_LOGO']; ?>">
                                                            <?php } else { ?>
                                                                <img class="profile-pic img-responsive mx-auto" id="logo-preview" src="assets/logomark_regular_small-new.png">
                                                            <?php } ?>
                                                            <div class="form-group mb-0">
                                                                <div class="input-group border-70">
                                                                    <input type="file" accept="image/*" class="form-control px-1" id="company-logo" name="company-logo" style="overflow: hidden; font-size: 14px;">
                                                                    <div class="input-group-append">
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeCompanyLogo" id="uploadLogo">
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <small style="color: red;">Please limit logo file size to a maximum of 2 MB.</small>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <div class="form-group">
                                                                <label for="companyname">Company Name</label>
                                                                <div class="input-group border-70">
                                                                    <input type="text" class="form-control" id="companyname" name="inputCompanyName" value="<?php echo $itemUserDetail['COMPANY_NAME']; ?>">
                                                                    <div class="input-group-append">
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeCompanyName" id="submitCompName">
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <small id="compNameWarning" style="color: red; display:none;">You may only use underscore for a special character/symbol.</small>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <div class="form-group">
                                                                <label for="username">User Name</label>
                                                                <div class="input-group border-70">
                                                                    <input type="text" class="form-control border-70" id="username" name="inputUserName" value="<?php echo $userID['USERNAME']; ?>">
                                                                    <div class="input-group-append">
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeUserName" id="submitUserName">
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <small id="userNameWarning" style="color: red;  display:none;">You may only use underscore for a special character/symbol.</small>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <div class="form-group">
                                                                <label for="adminPass">Admin Password</label>
                                                                <div class="input-group border-70">
                                                                    <input type="password" class="form-control" id="adminPass" name="adminPass" value="<?php echo $_SESSION['password_show']; ?>">
                                                                    <div class="input-group-append">
                                                                        <button type="button" class="btn p-0" onclick="showHide();">
                                                                            <i class="far fa-eye-slash" id="showHide" style="color: #FFA03E"></i>
                                                                        </button>
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeAdmPass" id="submitAdmPass" disabled>
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <span id="progresslabel" class="fontRobReg"></span>
                                                                <small data-translate="signup-8" id="passwarn" style="color: red;">Password must be 6 characters long consisting at least a lowercase and uppercase letter, a number, and a special character ( @ $ ! % * # ? & )</small>
                                                                <small data-translate="signup-14" id="passForbiddenChar" style="color: red; display:none;">Please refrain from using these symbols in your password: " ' ` ´ ’ ‘ ; = -</small>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <div class="form-group">
                                                                <label for="newpass_priv">Internal Password</label>
                                                                <div class="input-group border-70">
                                                                    <input type="password" class="form-control" id="newpass_priv" name="inputPass_priv" value="<?php echo $itemUserDetail['PRIVATE_PASSWORD']; ?>">
                                                                    <div class="input-group-append">
                                                                        <button type="button" class="btn p-0" onclick="showHide2();">
                                                                            <i class="far fa-eye-slash fs-20" id="showHide2" style="color: #FFA03E"></i>
                                                                        </button>
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeIntPass" id="submitIntPass" disabled>
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <span id="progresslabel2" class="fontRobReg"></span>
                                                                <small data-translate="signup-8" id="passwarn2" style="color: red;">Password must be 6 characters long consisting at least a lowercase and uppercase letter, a number, and a special character ( @ $ ! % * # ? & )</small>
                                                                <small data-translate="signup-14" id="passForbiddenChar2" style="color: red; display:none;">Please refrain from using these symbols in your password: " ' ` ´ ’ ‘ ; = -</small>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="row justify-content-center">
                                                        <div class="col-10 col-md-12 col-xl-12 my-auto docs-section">
                                                            <div class="form-group">
                                                                <label for="new_supp_email">Email account for Support</label>
                                                                <div class="input-group border-70">
                                                                    <?php if ($itemUserDetail['SUPPORT_EMAIL'] != null) { ?>
                                                                        <input type="email" class="form-control" id="new_supp_email" name="new_supp_email" value="<?php echo $itemUserDetail['SUPPORT_EMAIL']; ?>"><br>
                                                                    <?php } else { ?>
                                                                        <input type="email" class="form-control" id="new_supp_email" name="new_supp_email" placeholder="Currently You don't have any email account for customer support"><br>
                                                                    <?php } ?>
                                                                    <div class="input-group-append">
                                                                        <button class="btn pull-left save-settings" type="submit" name="changeSuppEmail" id="submitSuppEmail">
                                                                            <img src="./assets/icons/dashboard_nav/save.png" width="30px">
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <small id="emailWarning" style="color: red; display:none;">Please input a valid email address.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- <button type="submit" name="update_company_settings" class="btn btn-yellow text-center">Save Changes</button> -->
                                                <!-- </form> -->
                                                <!-- <span class="josefin-sans text-center" id="overview-email"><strong><?php echo $itemUser['EMAIL_ACCOUNT']; ?></strong></span> -->
                                            </div>
                                            <div class="col-md-7 pl-5" style="font-size: 14px;">
                                                <ul class="josefin-sans mx-auto" id="service-info">
                                                    <li>
                                                        <strong>Qmera Account: <img class="credit-hint ml-2" id="qmera-acc" src="./assets/icons/dashboard_nav/support-orange.png" width="20px"></strong><br>
                                                        <span class="pull-left"><?php echo (str_repeat('*', strlen($itemUser['API_KEY']))); ?></span>
                                                        <span class="pull-left d-none" id="apikey"><?php echo $itemUser['API_KEY']; ?></span>
                                                        <button class="btn pull-left py-0 px-2" onclick="copyElementText()" type="button" name="button">
                                                            <img src="./assets/icons/dashboard_nav/copy.png" width="20px">
                                                        </button>
                                                        <span id="copied-acc" class="text-success" style="display:none;">Copied!</span>
                                                    </li>
                                                    <li>
                                                        <strong>Maven Username <img class="credit-hint ml-2" id="maven-uname" src="./assets/icons/dashboard_nav/support-orange.png" width="20px"></strong><br>
                                                        <span class="pull-left">
                                                            <?php if ($user['STATUS'] == 3) {
                                                                echo (str_repeat('*', strlen("qmera-client")));
                                                            } else {
                                                                echo (str_repeat('*', strlen("qmera-client")));
                                                            } ?>
                                                        </span>
                                                        <span class="pull-left d-none" id="maven_username">
                                                            <?php if ($user['STATUS'] == 3) { ?>
                                                                qmera-client
                                                            <?php } else { ?>
                                                                qmera-client
                                                            <?php } ?>
                                                        </span>
                                                        <button class="btn pull-left" onclick="copyElementText3()" type="button" name="button">
                                                            <img src="./assets/icons/dashboard_nav/copy.png" width="20px">
                                                        </button>
                                                        <span id="copied-maven-uname" class="text-success" style="display:none;">Copied!</span>
                                                    </li>
                                                    <li>
                                                        <strong>Maven Password <img class="credit-hint ml-2" id="maven-pass" src="./assets/icons/dashboard_nav/support-orange.png" width="20px"></strong><br>
                                                        <span class="pull-left">
                                                            <?php if ($user['STATUS'] == 3) {
                                                                echo (str_repeat('*', strlen("AP2CSuA9bsdCpY9DSMg5yA8XpbTcX386rk1Dqy")));
                                                            } else {
                                                                echo (str_repeat('*', strlen("AP3mBqYr9jGRcR9pyk9TmWK8E5mAXNdTayuXSm")));
                                                            } ?>
                                                        </span>
                                                        <span class="pull-left d-none" id="maven_password">
                                                            <?php if ($user['STATUS'] == 3) { ?>
                                                                AP9dEGjiBY1kQCg9u3o1DBVdDi4
                                                            <?php } else { ?>
                                                                AP9dEGjiBY1kQCg9u3o1DBVdDi4
                                                            <?php } ?>
                                                        </span>
                                                        <button class="btn pull-left py-0 px-2" onclick="copyElementText4()" type="button" name="button">
                                                            <img src="./assets/icons/dashboard_nav/copy.png" width="20px">
                                                        </button>
                                                        <span id="copied-maven-pass" class="text-success" style="display:none;">Copied!</span>
                                                    </li>
                                                    <li>
                                                        <strong>Qmera Lite Sample Code</strong>
                                                        <br>
                                                        <a href="<?php echo base_url(); ?>downloads/QmeraLiteSampleCode.zip" class="btn pull-left" style="font-size: 12px; background-color: #6945A5; color: white; padding-top: 0; padding-bottom: 0;">Download</a>
                                                    </li>
                                                    <li>
                                                        <strong>Selected Service(s):</strong><br>

                                                        Mobile Contact Centers,
                                                        Push Notifications,
                                                        In-app Messaging,
                                                        Live Video Streaming,
                                                        Video & VoIP Calls

                                                    </li>
                                                    <li>
                                                        <?php if ($today > $due_date) { ?>
                                                            <?php

                                                            echo "Your subscription is over.";
                                                            ?>
                                                            <a href="billpayment.php" class="btn pull-left" type="button" name="button" style="background-color: #ffa03e; color: white; padding-top: 0; padding-bottom: 0;">
                                                                SUBSCRIBE
                                                            </a>
                                                        <?php } else { ?>
                                                            <form method="post">
                                                                <strong>Subscription Status:</strong><br>
                                                                <?php
                                                                if ($user['STATUS'] == 3) {
                                                                    echo "<span id='trialprice'></span>";
                                                                    echo ("<a href='" . base_url() . "checkout.php' id='toCheckout' class='btn pull-left ml-2' type='button' name='button' style='font-size: 12px; background-color: #6945A5; color: white; padding-top: 0; padding-bottom: 0;'>SUBSCRIBE</a>");
                                                                } else {
                                                                    echo "[ACTIVE] [Package: " . ($bill2['CURRENCY'] == 'USD' ? "$" : "Rp") . "<span id='packagePrice'>" . $bill2['CHARGE'] . "</span>]";
                                                                    // echo ("<a href='billpayment.php' class='btn pull-left' type='button' name='button' style='background-color: #ffa03e; color: white; padding-top: 0; padding-bottom: 0;'>SUBSCRIBE</a>");
                                                                }
                                                                ?>
                                                            </form>
                                                            <strong><small style="color: red;">Expiry Date : <?php echo date("l, d F Y", strtotime($bill2['DUE_DATE'])) . ', ' . date("H:i A", strtotime($bill2['DUE_DATE'])); ?> </small></strong>
                                                            <?php if ($user['STATUS'] == 3) { ?>

                                                                <small style="font-style:italic;">
                                                                    <p>
                                                                        The trial account is meant to show you how quick and easy it is to embed Qmera's features to your applications,
                                                                        making 24 hours more than enough.
                                                                    </p>
                                                                    <p>
                                                                        If you need to evaluate the features and performance of Qmera, you can download <a href="https://play.google.com/store/apps/details?id=io.newuniverse.catchup" target="_blank">catchUp</a>
                                                                        and use all of its features for free. catchUp is a unified social media with Live Streaming, Video Conference, Unified Messaging features built entirely using Qmera.
                                                                    </p>
                                                                </small>

                                                            <?php } else { ?>

                                                                <small style="font-style:italic;">
                                                                    <p style="margin-bottom: 0px !important;">
                                                                        We will charge
                                                                        <?php if ($currency == 'USD') { ?>
                                                                            $0.000265 per KB
                                                                        <?php } else if ($currency != 'USD') { ?>
                                                                            Rp 3975 per MB
                                                                        <?php } ?>


                                                                        for any excess traffic once your Customer Engagement Credit runs out, and
                                                                        the amount will be deducted from your Prepaid Credit balance. Your Prepaid Credit balance will only be used
                                                                        when your Customer Engagement Credit runs out. <br> <br>

                                                                        You may topup your Prepaid Credit balance anytime, and it has no expiry date.
                                                                    </p>
                                                                </small>

                                                            <?php } ?>
                                                        <?php } ?>
                                                    </li>
                                                    <?php if ($user['STATUS'] == 3) { ?>
                                                        <li class="d-none">
                                                        <?php } else { ?>
                                                        <li>
                                                        <?php } ?>
                                                        <strong>Your Prepaid Credit Balance:</strong><br>

                                                        <?php echo (($credit['CURRENCY'] == 'USD' ? "$" : "Rp") . ' <span id="topupAmt">' . sprintf('%0.2f', $credit['CREDIT']) . '</span>'); ?>
                                                        <a href='../topup.php' class='btn pull-left' type='button' name='button' style='background-color: #ffa03e; color: white; padding-top: 0; padding-bottom: 0;'>TOP UP</a><br>

                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-12 my-auto docs-section">
                                                                    <form method="POST" id="feature_enable">
                                                                        <div class="form-group">
                                                                            <label>Services/Features</label>
                                                                            <label class="container-check font-regular">Unified Messaging
                                                                                <input id="um_check" type="checkbox" name="um" value="<?php echo $um_enabled; ?>">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <label class="container-check font-regular">VoIP & Video Call
                                                                                <input id="voip_check" type="checkbox" name="voip-vcall" value="<?php echo $voip_enabled; ?>">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <label class="container-check font-regular">Live Streaming & Webinar
                                                                                <input id="ls_check" type="checkbox" name="ls-os" value="<?php echo $ls_enabled; ?>">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <label class="container-check font-regular">Web Access
                                                                                <input id="web_check" type="checkbox" name="web-access" value="<?php echo $web_enabled; ?>">
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                        </div>
                                                                        <button type="submit" name="feature_update" class="btn btn-yellow text-center">Save Settings</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->
                                <div class="col-xl-3 col-lg-12" style="height:100%;">
                                    <div class="card rounded-0" id="billing" style="padding: 2rem 3rem">
                                        <div class="row">
                                            <h2 class="card-name font-medium text-dark">Billing</h2>
                                        </div>
                                        <div style="height: 100%;" class="row d-flex align-items-center justify-content-center text-gray">
                                            <em>
                                                <?php
                                                if ($total_bill['TOTAL'] == '') {
                                                    echo "No unpaid bills";
                                                } else {
                                                    echo "$" . $total_bill['TOTAL'];
                                                }
                                                ?>
                                            </em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-info rounded-0" id="recent-usage" style="padding: 2rem 3rem;">
                                        <div class="row">
                                            <h2 class="card-name font-medium text-dark">Recent Usage</h2><br>
                                        </div>
                                        <div class="row">
                                            <small class="chart-info text-gray">Subscription period: <small class="usage-period text-gray"><?php echo date('Y-m-d', strtotime($bill2['BILL_DATE'])) . " - " . date('Y-m-d', strtotime($bill2['DUE_DATE'])); ?></small></small>
                                        </div>
                                        <div class="card-body">
                                            <!-- <canvas id="myUsage"></canvas> -->
                                            <div class="chart-container" style="position: relative; min-height:50vh;">
                                                <canvas id="myUsage"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row mt-5" id="copyright-footer">
                                <div class="col-12 col-lg-6 text-gray">
                                    <strong>Copyright &copy; 2021 Qmera.</strong>
                                    All rights reserved.
                                </div>
                                <div class="col-12 col-lg-6">
                                    <strong><span id="slogan" style="color: #6945A5;">Customer Engagement, Made Easy<span></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.row -->
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<div class="modal hide fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Oops, we're sorry!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img onclick="subsClick();" alt="Under Maintenane" src="<?php echo base_url(); ?>newAssets/under-maintenance.png" /><br>
                Sorry we cannot process your payment now. Meanwhile, you can use the trial version of Qmera Lite.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>


<!-- ./wrapper -->

<script src="js/dashboard.js?<?php echo $version; ?>"></script>

<script>
    <?php if ($usage_data != null) { ?>
        let text = [];
        let image = [];
        let video = [];
        let ls_min = [];
        let voip_min = [];
        let vc_min = [];
        let created_at = [];
        text.push(<?php echo $usage_data['TEXT']; ?>);
        image.push(<?php echo $usage_data['DOC']; ?>);
        video.push(<?php echo $usage_data['VIDEO']; ?>);
        ls_min.push(<?php echo $usage_data['LS']; ?>);
        voip_min.push(<?php echo $usage_data['VOIP']; ?>);
        vc_min.push(<?php echo $usage_data['VIDCALL']; ?>);
        created_at.push($(".usage-period").text());
    <?php } else { ?>
        let text = [0];
        let image = [0];
        let video = [0];
        let ls_min = [0];
        let voip_min = [0];
        let vc_min = [0];
        let created_at = [];
        created_at.push($(".usage-period").text());
    <?php } ?>

    var _0x54bb = ['1JmdehV', 'Documents\x20&\x20Images\x20Recipient', '#F6D55C', 'Month', '#173F5F', '1099177PuiMch', 'nearest', 'index', 'myUsage', '#20639B', 'getElementById', '1mCGLQb', '141473VQNROl', '4299HFteLW', '1HSCJAD', 'Usage', '#ED553B', '1286389gkvhOj', '#9966FF', 'Text\x20Recipient', '#3CAEA3', 'Livestream\x20Minutes', '1460631SCSxLW', '339WeNkTG', '159952RwDgXJ', '1778801aCHVwV'];
    var _0x5f13 = function(_0x434f95, _0x51c9a6) {
        _0x434f95 = _0x434f95 - 0xe5;
        var _0x54bb0c = _0x54bb[_0x434f95];
        return _0x54bb0c;
    };
    var _0x484487 = _0x5f13;
    (function(_0x3c09cd, _0x15edbe) {
        var _0x3efea1 = _0x5f13;
        while (!![]) {
            try {
                var _0x5ce487 = -parseInt(_0x3efea1(0xef)) + parseInt(_0x3efea1(0xe8)) * parseInt(_0x3efea1(0xf1)) + -parseInt(_0x3efea1(0xf0)) * -parseInt(_0x3efea1(0xe5)) + parseInt(_0x3efea1(0xf6)) + -parseInt(_0x3efea1(0xfd)) + -parseInt(_0x3efea1(0xfc)) * parseInt(_0x3efea1(0xed)) + -parseInt(_0x3efea1(0xee)) * parseInt(_0x3efea1(0xfe));
                if (_0x5ce487 === _0x15edbe) break;
                else _0x3c09cd['push'](_0x3c09cd['shift']());
            } catch (_0x3bfd8b) {
                _0x3c09cd['push'](_0x3c09cd['shift']());
            }
        }
    }(_0x54bb, 0xe6b36));
    var ctx = document[_0x484487(0xfb)](_0x484487(0xf9)),
        myChart = new Chart(ctx, {
            'type': 'bar',
            'data': {
                'labels': [''],
                'datasets': [{
                    'label': _0x484487(0xea),
                    'backgroundColor': _0x484487(0xe7),
                    'borderColor': '#ED553B',
                    'data': text,
                    'fill': ![]
                }, {
                    'label': _0x484487(0xf2),
                    'backgroundColor': _0x484487(0xf3),
                    'borderColor': _0x484487(0xf3),
                    'data': image,
                    'fill': ![]
                }, {
                    'label': 'Video\x20Recipient',
                    'backgroundColor': _0x484487(0xeb),
                    'borderColor': _0x484487(0xeb),
                    'data': video,
                    'fill': ![]
                }, {
                    'label': _0x484487(0xec),
                    'backgroundColor': _0x484487(0xfa),
                    'borderColor': _0x484487(0xfa),
                    'data': ls_min,
                    'fill': ![]
                }, {
                    'label': 'VoIP\x20Calls\x20Minutes',
                    'backgroundColor': _0x484487(0xf5),
                    'borderColor': '#173F5F',
                    'data': voip_min,
                    'fill': ![]
                }, {
                    'label': 'Video\x20Calls\x20Minutes',
                    'backgroundColor': _0x484487(0xe9),
                    'borderColor': '#9966FF',
                    'data': vc_min,
                    'fill': ![]
                }]
            },
            'options': {
                'maintainAspectRatio': ![],
                'responsive': !![],
                'title': {
                    'display': ![],
                    'text': 'Chart.js\x20Line\x20Chart'
                },
                'tooltips': {
                    'mode': _0x484487(0xf8),
                    'intersect': ![]
                },
                'hover': {
                    'mode': _0x484487(0xf7),
                    'intersect': !![]
                },
                'scales': {
                    'xAxes': [{
                        'display': !![],
                        'scaleLabel': {
                            'display': ![],
                            'labelString': _0x484487(0xf4)
                        }
                    }],
                    'yAxes': [{
                        'display': !![],
                        'scaleLabel': {
                            'display': !![],
                            'labelString': _0x484487(0xe6)
                        },
                        'ticks': {
                            'suggestedMin': 0x0
                        }
                    }]
                }
            }
        });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('a.nav-link[href="billpayment.php"]').removeClass('active');
        $('a.nav-link[href="index.php"]').addClass('active');
        $('a.nav-link[href="usage.php"]').removeClass('active');
        $('a.nav-link[href="support.php"]').removeClass('active');
        $('a.nav-link[href="mailbox.php"]').removeClass('active');
        $('a.nav-link[href="webappform.php"]').removeClass('active');
        $('a.nav-link[href="form_management.php"]').removeClass('active');
    }, false);
</script>

<!-- OPTIONAL SCRIPTS -->
</body>

</html>