<link rel="icon" type="image/x-icon" href="newAssets/fav.ico">
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/session_insert.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/api_generator_2.php'); ?>

<?php
session_start();

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 12;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbconn = getDBConn();

$company_id = $_SESSION['id_company'];
$email = $_SESSION['email'];

$price_item_amount = 0;

$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE COMPANY = ?");
$query->bind_param("s", $company_id);
$query->execute();
$dataUser = $query->get_result()->fetch_assoc();
$password = $dataUser['PASSWORD'];
$user_id = $dataUser['ID'];
$username = $dataUser['USERNAME'];
$query->close();

$query = $dbconn->prepare("SELECT * FROM COMPANY WHERE ID = ?");
$query->bind_param("s", $company_id);
$query->execute();
$company = $query->get_result()->fetch_assoc();
$apikey = $company['API_KEY'];
$query->close();

$query = $dbconn->prepare("SELECT * FROM COMPANY_INFO WHERE COMPANY = ?");
$query->bind_param("s", $company_id);
$query->execute();
$dataCompany = $query->get_result()->fetch_assoc();
$query->close();

$query = $dbconn->prepare("SELECT * FROM SUBSCRIBE WHERE COMPANY = ? AND STATUS = 3");
$query->bind_param("s", $company_id);
$query->execute();
$subscribe = $query->get_result()->fetch_assoc();
$subscribe_id = $subscribe['ID'];
$query->close();

$paycheck = 1; //TRIAL ALWAYS SUCCESS
if ($paycheck == 1) {

  // update status company
  $query = $dbconn->prepare("UPDATE COMPANY SET STATUS = 1 WHERE ID = ? AND STATUS = 0");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  //MESSAGE NEW USER INSERT QUERY
  $msg = "New User";
  $query = $dbconn->prepare("INSERT INTO MESSAGE (COMPANY, USER_ACCOUNT, M_ID, MESSAGE_DATE, MESSAGE_DESC, IS_READ) VALUES (?,?,1, NOW(), ?, NULL)");
  $query->bind_param("sis", $company_id, $user_id, $msg);
  $query->execute();
  $query->close();

  $expire_date = strtotime('+1 day') * 1000;

  // regbe
  $url = "http://192.168.1.100:8004/webrest/";
  $data = array(
    'code' => 'REGBE',
    'data' => array(
      'company_id' => $company_id,
      'name' => $dataCompany['COMPANY_NAME'],
      'api_key' => $apikey,
      'expire_date' => $expire_date,
      'private_key' => $_SESSION['password'],
      'is_trial' => 1,
    ),

  );

  $options = array(
    'http' => array(
      'header'  =>
      // "Authorization: ".$secretKey."\r\n".
      "Content-type: application/json\r\n",
      'method'  => 'POST',
      'content' => strval(json_encode($data))
    )
  );

  $stream = stream_context_create($options);
  $result = file_get_contents($url, false, $stream);
  $json_result = json_decode($result);
  // end regbe

  // BE admin pass
  $api_url = "http://192.168.1.100:8004/webrest/";
  $api_data = array(
    'code' => 'ADMPASS',
    'data' => array(
      'private_key' => $_SESSION['password'],
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
  // end BE admin pass

  $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',1, 1)");
  $queryUpdateInfo->execute();
  $queryUpdateInfo->close();

  $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',2, 1)");
  $queryUpdateInfo->execute();
  $queryUpdateInfo->close();

  $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',3, 1)");
  $queryUpdateInfo->execute();
  $queryUpdateInfo->close();

  $queryUpdateInfo = $dbconn->prepare("REPLACE INTO COMP_FEATURE (`COMPANY_ID`, `TYPE`, `VALUE`) VALUES ('$company_id',4, 1)");
  $queryUpdateInfo->execute();
  $queryUpdateInfo->close();

  // $query = $dbconn->prepare("UPDATE COMPANY SET API_KEY = ? WHERE ID = ?");
  // $query->bind_param("si", $apikey, $company_id);
  // $query->execute();
  // $query->close();

  $query = $dbconn->prepare("UPDATE USER_ACCOUNT SET STATUS = 3, STATE = 3 WHERE COMPANY = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  //update status subscribe
  $query = $dbconn->prepare("UPDATE SUBSCRIBE SET STATUS = 3 WHERE ID = ?");
  $query->bind_param("i", $subscribe_id);
  $query->execute();
  $query->close();

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

  //BILLING INSERT QUERY
  $query = $dbconn->prepare("INSERT INTO BILLING (ORDER_NUMBER, BILL_DATE, DUE_DATE, COMPANY, SUBSCRIBE, CURRENCY, CHARGE, CUT_OFF_DATE, IS_PAID) VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 1 DAY), ?, ?, NULL, ?, DATE_ADD(NOW(), INTERVAL 1 DAY), 1)");
  $query->bind_param("ssid", $order_number, $company_id, $subscribe_id, $price_item_amount);
  $query->execute();
  $bill_id = $query->insert_id;
  $query->close();

  //GET CURRENT USER_ACCOUNT
  $query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE EMAIL_ACCOUNT = ?");
  $query->bind_param("s", $email);
  $query->execute();
  $user_account = $query->get_result()->fetch_assoc();
  $query->close();

  //PAYMENT INSERT QUERY
  $query = $dbconn->prepare("INSERT INTO PAYMENT (PAYMENT_METHOD, BILL, COMPANY, USER, PAY_DATE) VALUES ('PAYPAL', ?, ?, ?, NOW())");
  $query->bind_param("isi", $bill_id, $user_account['COMPANY'], $user_account['ID']);
  $query->execute();
  $query->close();

  setSession('email', $email);
  setSession('password', $password);
  setSession('id_user', $user_id);
  setSession('id_company', $company_id);

  // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ // EMAIL ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  $email = strtolower(getSession('email'));

  function invoiceMail($name, $dashboard)
  {
    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/template/FreeTrial.htm');
    $content = str_replace('*NAME*', $name, $content);
    $content = str_replace('http://103.94.169.26:8081/', $dashboard, $content);

    $content = str_replace('cid:image002', 'https://qmera.io/template/FreeTrial_files/image002.png', $content);
    $content = str_replace('cid:image004', 'https://qmera.io/template/FreeTrial_files/image004.png', $content);
    $content = str_replace('cid:image005', 'https://qmera.io/template/FreeTrial_files/image005.png', $content);

    return $content;
  }

  $name = $user_account['USERNAME'];
  $dashboard = base_url() . 'dashboardv2/index.php';
  $content = invoiceMail($name, $dashboard);

  // require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/send_email_gmail.php';
  // require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/get_all_column.php';
  // require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/customize_template.php';

  // send_email($email, $_SESSION['full_name'], 'Trial Submission', $content);

  // sendMail($content, $email);

  // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ // END EMAIL ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

  apiGen();
  insertSession($user_id);
  redirect(base_url() . 'dashboardv2/index.php');
}

function sendMail($body, $destination)
{
  require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';
  $succMsg = "";
  $errMsg = "";

  if ($destination != "") {

    $mail = new PHPMailer();
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'support@qmera.io';
    $mail->Password   = 'Socialcommerce23';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('support@qmera.io', 'Qmera');
    $mail->addAddress($destination);
    $mail->addReplyTo('support@qmera.io');

    $mail->isHTML(true);
    $mail->Subject = 'Trial Submission';
    $mail->Body = $body;
    $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/FreeTrial_files/image002.png', 'images002', 'images002.png');
    $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/FreeTrial_files/image004.png', 'images004', 'images004.png');
    $mail->AddEmbeddedImage($_SERVER['DOCUMENT_ROOT'] . '/template/FreeTrial_files/image005.png', 'images005', 'images005.png');

    if (!$mail->send()) {
      $mail->ClearAllRecipients();
      $succMsg = $mail->ErrorInfo;
    } else {
      $mail->ClearAllRecipients();
      $succMsg = "Email has been sent successfully.";
    }
  } else {
    $errMsg = "Please fill all the form!";
  }
}

?>