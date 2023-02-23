<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php
$secure = true; // if you only want to receive the cookie over HTTPS
$httponly = true; // prevent JavaScript access to session cookie
$samesite = 'lax';
$maxlifetime = time() + 900;

if (PHP_VERSION_ID < 70300) {
  session_set_cookie_params($maxlifetime, '/; samesite=' . $samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
} else {
  session_set_cookie_params([
    'lifetime' => $maxlifetime,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => $secure,
    'httponly' => $httponly,
    'samesite' => $samesite
  ]);
}
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_check.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_delete.php'); ?>
<?php

$version = 'v=1.69';

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

if (!isset($_SESSION['id_company'])) {
  header("Location:" . base_url() . "login.php");
}

$dbconn = getDBConn();
$dialogMsg = "";
$id_company = getSession('id_company');
$user_id = getSession('id_user');

$query = $dbconn->prepare("SELECT a.*, b.*, c.* FROM USER_ACCOUNT a, COMPANY_INFO b, COMPANY c WHERE a.COMPANY = b.COMPANY AND b.COMPANY = c.ID AND a.COMPANY = ?");
$query->bind_param("s", $id_company);
$query->execute();
$itemUser = $query->get_result()->fetch_assoc();
$query->close();

if ($itemUser['STATE'] == 0) {
  header("Location:" . base_url() . "paycheckout.php");
}

$query2 = $dbconn->prepare("SELECT * FROM SUBSCRIBE WHERE COMPANY = ?");
$query2->bind_param("s", $id_company);
$query2->execute();
$itemUser2 = $query2->get_result()->fetch_assoc();
$query2->close();

$query = $dbconn->prepare("SELECT * FROM COMPANY where ID = ?");
$query->bind_param("s", $id_company);
$query->execute();
$itemCompany = $query->get_result()->fetch_assoc();
$query->close();

$query = $dbconn->prepare("SELECT * FROM COMPANY_INFO where company = ? ");
$query->bind_param("s", $id_company);
$query->execute();
$itemUserDetail = $query->get_result()->fetch_assoc();
$query->close();

//all message
$message = $dbconn->prepare("SELECT * FROM MESSAGE WHERE COMPANY = ? ORDER BY ID DESC");
$message->bind_param("s", $id_company);
$message->execute();
$itemMessage = $message->get_result();
$rows = $itemMessage->num_rows;
$message->close();

//unread message
$messagenull = $dbconn->prepare("SELECT * FROM MESSAGE WHERE COMPANY = ? AND IS_READ IS NULL ORDER BY ID DESC");
$messagenull->bind_param("s", $id_company);
$messagenull->execute();
$itemMessageNull = $messagenull->get_result();
$rowsnull = $itemMessageNull->num_rows;
$messagenull->close();

$tempID = array();
$tempIsRead = array();
$tempMID = array();

while ($row = $itemMessage->fetch_assoc()) {
  array_push($tempID, $row['ID']);
  array_push($tempIsRead, $row['IS_READ']);
  array_push($tempMID, $row['M_ID']);
};

//unpaid bill CHARGE
$query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? AND IS_PAID = 0");
$query->bind_param("s", $id_company);
$query->execute();
$bills = $query->get_result();
$billsrow = $bills->num_rows;
$query->close();

//USER
$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE COMPANY = ?");
$query->bind_param("s", $id_company);
$query->execute();
$user = $query->get_result()->fetch_assoc();
$query->close();

//USERNAME
$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE ID = ?");
$query->bind_param("i", $user_id);
$query->execute();
$userID = $query->get_result()->fetch_assoc();
$query->close();

$query = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? order by DUE_DATE desc limit 1");
$query->bind_param("s", $id_company);
$query->execute();
$bill2 = $query->get_result()->fetch_assoc();
$query->close();

if ($user['ACTIVE'] == 0) {
  header("Location:" . base_url() . "verifyemail.php");
}

if (isset($_POST['submitLogout'])) {
  // delete session
  deleteSessionDB($user_id);
}

$ver = 'v=1.03';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Qmera - Dashboard</title>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/qmera_button.png"> -->
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- custom css -->
  <link rel="stylesheet" href="css/custom.css?v=<?php echo time(); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Google Font: Work Sans + Josefin Sans -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,500,500i,600,600i,700,700i|Work+Sans:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

  <script src="js/dashboard.js?<?php echo time(); ?>" defer=""></script>

  <!-- Global site tag (gtag.js) - Google Ads: 689853920 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-689853920"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-689853920');
  </script>
  <style>
    .navbar-icon {
      width: 25px;
      height: auto;
      margin-right: 10px;
    }

    body {
      font-family: 'Poppins';
    }

    .sidebar {
      font-size: 18px;
      padding: 0;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #6945A5;
      box-shadow: unset;
      color: white;
      border-right: solid 5px orange;
      border-radius: 0;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active>p {
      font-weight: 600 !important;
    }

    .font-light {
      font-weight: 300 !important;
    }

    .font-regular {
      font-weight: 400 !important;
    }

    .font-medium {
      font-weight: 500 !important;
    }

    .font-semibold {
      font-weight: 600 !important;
    }

    .text-purple {
      color: #6945A5;
    }

    .nav-sidebar>.nav-item {
      margin-bottom: 20px;
    }

    .content-wrapper>.content {
      padding: 0 4 rem !important;
    }

    @media (min-width: 1200px) {
      ul.navbar-nav {
        visibility: hidden;
      }
    }
  </style>
  <!-- <script src="/embeddedbutton.js"></script> -->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="<?php echo base_url(); ?>" class="p-0 brand-link d-flex align-items-center justify-content-center">
        <img src="./assets/icons/Qmera-Logo.png" alt="Palio Logo" style="height: 170px; width: auto;">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="padding-left: 20px;">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/overview.png" class="navbar-icon">
                <p class="font-light">
                  Overview
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="usage.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/usage.png" class="navbar-icon">
                <p class="font-light">
                  Usage
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="billpayment.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/bill.png" class="navbar-icon">
                <p class="font-light">
                  Bill & Payment
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="mailbox.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/mailbox.png" class="navbar-icon">
                <p class="font-light">
                  Mailbox
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="support.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/support.png" class="navbar-icon">
                <p class="font-light">
                  Support
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="webappform.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/urlform.png" class="navbar-icon">
                <p class="font-light">
                  URL Form
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="form_management.php" class="nav-link">
                <img src="./assets/icons/dashboard_nav/digiform.png" class="navbar-icon">
                <p class="font-light" style="white-space: initial;">
                  Digital Form Management
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <script>
      <?php if (isset($_SESSION['id_user'])) { ?>
        var inactivityTime = function() {
          var time;
          window.onload = resetTimer;
          // DOM Events
          document.onload = resetTimer;
          document.onmousemove = resetTimer;
          document.onmousedown = resetTimer; // touchscreen presses
          document.ontouchstart = resetTimer;
          document.onclick = resetTimer; // touchpad clicks
          document.onkeydown = resetTimer; // onkeypress is deprectaed
          document.addEventListener('scroll', resetTimer, true); // improved; see comments

          function logout() {
            alert("You are now logged out.");
            $('#logoutButton').click();
          }

          function resetTimer() {
            clearTimeout(time);
            // console.log('timer jalan');
            time = setTimeout(logout, 300000); // 5 minutes
            // 1000 milliseconds = 1 second
          }
        };

        window.onload = function() {
          inactivityTime();

          <?php if ($bill2['CURRENCY'] == 'IDR' && $user['STATUS'] != 3) { ?>
            document.getElementById('packagePrice').innerHTML = parseFloat(document.getElementById('packagePrice').innerHTML).toLocaleString('id', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2,
            });
            document.getElementById('topupAmt').innerHTML = parseFloat(document.getElementById('topupAmt').innerHTML).toLocaleString('id', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2,
            });
          <?php } else if ($bill2['CURRENCY'] == 'USD' && $user['STATUS'] != 3) { ?>
            document.getElementById('packagePrice').innerHTML = parseFloat(document.getElementById('packagePrice').innerHTML).toLocaleString('en-US', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2,
            });
            document.getElementById('topupAmt').innerHTML = parseFloat(document.getElementById('topupAmt').innerHTML).toLocaleString('en-US', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2,
            });
          <?php } else if ($user['STATUS'] != 3) { ?>
            if (localStorage.country_code == 'ID') {
              document.getElementById('packagePrice').innerHTML = parseFloat(document.getElementById('packagePrice').innerHTML).toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });
              document.getElementById('topupAmt').innerHTML = parseFloat(document.getElementById('topupAmt').innerHTML).toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });
            } else if (localStorage.country_code != 'ID') {
              document.getElementById('packagePrice').innerHTML = parseFloat(document.getElementById('packagePrice').innerHTML).toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });
              document.getElementById('topupAmt').innerHTML = parseFloat(document.getElementById('topupAmt').innerHTML).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
              });
            }
          <?php } ?>
        }
      <?php } ?>




      <?php if ($geolocSts == 1) { ?>
        console.log('geoloc ON');

        localStorage.prevGeoloc = localStorage.currentGeoloc;
        localStorage.currentGeoloc = 'ON';

        localStorage.removeItem('switchLang');

        var ONE_HOUR = 3600; //second

        if (localStorage.country_code == null || typeof localStorage.country_code === 'undefined' || localStorage.lastCheck == null || typeof localStorage.lastCheck === 'undefined' || (Math.floor(Date.now() / 1000) - localStorage.lastCheck) > ONE_HOUR) {
          geoLoc();
        }

        <?php  } else {
        if ($language == 0) {
        ?>
          localStorage.clear();
          localStorage.prevGeoloc = localStorage.currentGeoloc;
          localStorage.currentGeoloc = 'OFF';

          console.log('geoloc OFF, EN only');
          localStorage.lang = 0;
          localStorage.lang_visible = 0;
          localStorage.switchLang = 0;
          localStorage.country_code = 'EN';

        <?php } else if ($language == 1) { ?>
          localStorage.clear();
          localStorage.prevGeoloc = localStorage.currentGeoloc;
          localStorage.currentGeoloc = 'OFF';

          console.log('geoloc OFF, ID only');
          localStorage.lang = 1;
          localStorage.lang_visible = 0;
          localStorage.switchLang = 1;
          localStorage.country_code = 'ID';

      <?php }
      } ?>
    </script>