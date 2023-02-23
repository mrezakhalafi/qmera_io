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
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); 
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_check.php'); 
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_delete.php'); 
?>
<?php

$version = 'v=' . time();

// language
$query = $dbconn->prepare("SELECT VALUE FROM SITE_SETTINGS WHERE PROPERTY = 'LANGUAGE'");
$query->execute();
$lang_setting = $query->get_result()->fetch_assoc();
$language = $lang_setting['VALUE'];
$query->close();

// // geoloc
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

if ($itemUser['ACTIVE'] == 0) {
  header("Location:" . base_url() . "verifyemail.php");
}

if (isset($_POST['submitLogout'])) {
  // delete session
  deleteSessionDB($user_id);
}

$ver = 'v=' . time();

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

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/qmera_button.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">


  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

  <script src="js/dashboard.js?<?php echo $version; ?>"></script>


  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="js/popper.min.js"></script>

  <script type="text/javascript" src="js/prettify.js"></script>

  <!-- Global site tag (gtag.js) - Google Ads: 689853920 -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-689853920"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-689853920');
  </script> -->
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

    aside.main-sidebar {
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
    }

    [class*="sidebar-dark-"] {
      background-color: white;
      border-right: 2px solid lightgray;
    }

    .sidebar-logo {
      width: 170px;
      height: auto;
      margin: 2rem 0 2rem 1.5rem;
    }

    [class*="sidebar-dark-"] .nav-sidebar>.nav-item>.nav-link {
      color: black;
    }

    .main-sidebar .sidebar nav ul {
      list-style-type: none;
    }

    [class*="sidebar-dark-"] .nav-sidebar>.nav-item>.nav-link:hover {
      background-color: transparent;
    }

    [class*=sidebar-dark-] .nav-sidebar>.nav-item:hover>.nav-link {
      color: unset;
    }

    .nav-pills .nav-link:not(.active):hover {
      color: unset;
    }

    .main-sidebar .sidebar nav ul .nav-link.active {
      background-color: transparent;
      font-weight: 700;
      color: #6945A5;
      border-right: 5px solid #6945A5;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #6945A5;
      box-shadow: unset;
      color: white;
      border-right: solid 5px orange;
      border-radius: 0;
    }

    .sidebar .nav-pills .nav-link {
      border-radius: 0;
      color: black;
    }

    [class*=sidebar-dark-] .sidebar a {
      color: black;
    }

    .sidebar nav ul li.nav-item {
      margin: 1.5rem 0;
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

    ol.instruction {
      padding-inline-start: 20px;
    }

    /* THEME FOR PRETTIFY/*
/* Pretty printing styles. Used with prettify.js. */
    /* Vim sunburst theme by David Leibovic */

    pre .str,
    code .str {
      color: #65B042;
    }

    /* string  - green */
    pre .kwd,
    code .kwd {
      color: #E28964;
    }

    /* keyword - dark pink */
    pre .com,
    code .com {
      color: #AEAEAE;
      font-style: italic;
    }

    /* comment - gray */
    pre .typ,
    code .typ {
      color: #89bdff;
    }

    /* type - light blue */
    pre .lit,
    code .lit {
      color: #3387CC;
    }

    /* literal - blue */
    pre .pun,
    code .pun {
      color: #fff;
    }

    /* punctuation - white */
    pre .pln,
    code .pln {
      color: #fff;
    }

    /* plaintext - white */
    pre .tag,
    code .tag {
      color: #89bdff;
    }

    /* html/xml tag    - light blue */
    pre .atn,
    code .atn {
      color: #bdb76b;
    }

    /* html/xml attribute name  - khaki */
    pre .atv,
    code .atv {
      color: #65B042;
    }

    /* html/xml attribute value - green */
    pre .dec,
    code .dec {
      color: #3387CC;
    }

    /* decimal - blue */

    pre.prettyprint,
    code.prettyprint {
      background-color: #333;
    }

    pre.prettyprint {
      width: 100%;
      margin: 0 auto;
      padding: 1em;
      white-space: pre-wrap;
    }


    /* Specify class=linenums on a pre to get line numbering */
    ol.linenums {
      margin-top: 0;
      margin-bottom: 0;
      color: #AEAEAE;
    }

    /* IE indents via margin-left */
    /*li.L0,li.L1,li.L2,li.L3,li.L5,li.L6,li.L7,li.L8 { list-style-type: none; }*/
    li.L0,
    li.L1,
    li.L2,
    li.L3,
    li.L5,
    li.L6,
    li.L7,
    li.L8 {
      list-style-type: decimal;
    }

    /* Alternate shading for lines */
    /*li.L1,li.L3,li.L5,li.L7,li.L9 { background: #eee; }*/

    @media print {

      pre .str,
      code .str {
        color: #060;
      }

      pre .kwd,
      code .kwd {
        color: #006;
        font-weight: bold;
      }

      pre .com,
      code .com {
        color: #600;
        font-style: italic;
      }

      pre .typ,
      code .typ {
        color: #404;
        font-weight: bold;
      }

      pre .lit,
      code .lit {
        color: #044;
      }

      pre .pun,
      code .pun {
        color: #440;
      }

      pre .pln,
      code .pln {
        color: #000;
      }

      pre .tag,
      code .tag {
        color: #006;
        font-weight: bold;
      }

      pre .atn,
      code .atn {
        color: #404;
      }

      pre .atv,
      code .atv {
        color: #060;
      }
    }

    @media (min-width: 1200px) {
      .content-wrapper {
        padding-left: 2.5rem;
        padding-right: 4rem;
      }
    }

    #copyright-footer {
      font-size: .85rem;
    }

    #menu-side .nav-link {
      font-size: .9rem;
    }

    table {
      font-family: 'Poppins', sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border-bottom: 1px solid black;
      text-align: left;
      padding: 1rem;
    }

    td {
      vertical-align: baseline;
    }

    table.table-desc td:first-child,
    th {
      background-color: #f7f6fb;
    }

    .card {
      padding: 2rem 2.5rem;
    }

    /* .table.table-bordered,
    .table.table-bordered th,
    .table.table-bordered tr,
    .table.table-bordered td {
        border: 1px solid #707070 !important;
    } */
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

<body class="hold-transition sidebar-mini" onload="PR.prettyPrint()" data-spy="scroll" data-target="#menu-side" style="position:relative;">
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
      <a href="<?php echo base_url(); ?>">
        <img src="assets/Qmera_Logo1.png" class="sidebar-logo" alt="Palio Logo" style="width: 170px; height: auto;">
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2" id="menu-side">
          <ul data-widget="treeview" role="menu" data-accordion="false" style="padding-left: 20px;">
            <li class="nav-item">
              <a class="nav-link" id="nusdk-link">
                Qmera Lite
              </a>
            </li>
            <ul style="padding-left: 30px;">
              <li class="nav-item">
                <a class="nav-link quickstart-link" href="#qmera-lite">
                  Quickstart guide - Android
                </a>
              </li>
            </ul>
            <li class="nav-item">
              <a class="nav-link">
                API
              </a>
            </li>
            <ul style="padding-left: 30px;">
              <li class="nav-item">
                <a class="nav-link quickstart-link" href="#api-broadcast">
                  Push Notification/Broadcast
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link quickstart-link" href="#api-email">
                  Email
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link quickstart-link" href="#api-message">
                  Message
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link quickstart-link" href="#api-call">
                  VoIP/Video Call
                </a>
              </li>
            </ul>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>



    <div class="content-wrapper">
      <div class="container-fluid">
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
      </div>

      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-sm-12 py-3">
            <pre class="prettyprint mt-3 mb-4">
/**
For user satisfaction, all features provided in Qmera have been tested to meet certain performance, reliability, and availability standards. If you need to test these features (Audio Call, Video Call, Conference, Online Seminar, etc.), please download <strong><a href="https://play.google.com/store/apps/details?id=io.newuniverse.catchup">catchUp</a></strong> from Google Play Store. <strong><a href="https://play.google.com/store/apps/details?id=io.newuniverse.catchup">catchUp</a></strong> is a Social Media built entirely using Qmera .io to demonstrate Qmera 's performance, reliability, and availability standards.

=====================
NOTES
=====================
For user security and privacy reasons, Qmera .io for Android will not work in the following environments:
1. Rooted Devices
2. Emulators
3. Android devices version below 6.0 (API 19). You need to set minSdkVersion 19 in your build.gradle (:app)
4. Applications that uses the backup and restore infrastructure. Please make sure you have the following 3 lines of code in your Manifest file:
android:allowBackup="false"
android:fullBackupOnly="false"
android:fullBackupContent="false"


=====================
Layout Customization
=====================
You can customize the look and layout of our live streaming, online seminar, and audio-video call features. To do so, follow these steps:
1. Download file activity layout (.xml) files dari link: <strong><a id="activity-layout" style="cursor:pointer;" href="downloads/res-pb.zip">res-pb.zip</a></strong>
2. Extract res-pb.zip into your project folder -> app -> src -> main.
3. Edit the gradle.properties configuration following the example below:
	android {
    		...
    
    		sourceSets {
        		main {
            			res.srcDirs = ['src/main/res', 'src/main/res-pb']
        		}
		}

	}
3. Edit the activity layouts as you need.

Notice:
Please refrain from deleting view components or altering their id's as it may cause errors in the application.

=====================
proguard-rules.pro
=====================
If you are building your app with proguard, add the lines below in your <strong>proguard-rules.pro</strong> file.
-dontwarn io.newuniverse.SDK.**
-keep class io.newuniverse.SDK.** { *;}
-keep interface io.newuniverse.SDK.** { *; }
-keep class * implements io.newuniverse.SDK.** { *;}

-keep class net.sqlcipher.** { *; } 

*/
                        </pre>
          </div>
        </div>
        <div class="row my-4" id="qmera-lite">
          <div class="col-sm-12">
            <h2>Qmera Lite</h2>
            <h6 class="mt-4 mb-3"><strong>QUICKSTART GUIDE - ANDROID</strong></h6>
            <ol class="instruction">
              <li>Create a new Android Studio Project or open an existing Project in Android Studio. Please make sure to use an API version 23 or later as your SDK.</li>
              <li>
                Modify your module-level build.gradle according to the example below. Don’t forget to use your own Maven credentials for the username and password variables.
                <pre class="prettyprint my-5 linenums:1 mt-2 mb-4">
// Please make sure you have set minSdkVersion to 23.

// Add the following lines to include the Qmera repository into your app
repositories {
    maven {
        url "https://qmera.io/artifactory/libs-release-local"
        credentials {
            username = "***REPLACE***WITH***YOUR***MAVEN***USERNAME***"
            password = "***REPLACE***WITH***YOUR***MAVEN***PASSWORD***"
        }
    }
}

dependencies {
    // *** Please make sure you have the Material library in your dependencies ***
    implementation 'androidx.appcompat:appcompat:1.4.0'
    implementation 'com.google.android.material:material:1.4.0'
    implementation 'androidx.constraintlayout:constraintlayout:2.1.2'
    implementation 'androidx.recyclerview:recyclerview:1.2.1'
    implementation 'androidx.multidex:multidex:2.0.1'
    implementation 'org.jsoup:jsoup:1.14.3'
    implementation 'com.google.android.gms:play-services-vision:20.1.3'
    implementation 'com.google.android.exoplayer:exoplayer:2.16.0'

    implementation('com.google.apis:google-api-services-gmail:v1-rev98-1.25.0') {
        exclude group: 'org.apache.httpcomponents'
        transitive = true
    }
    implementation('com.github.bumptech.glide:glide:4.12.0@aar') {
        transitive = true
    }
    implementation('net.zetetic:android-database-sqlcipher:4.5.0@aar') {
        transitive = true
    }
    // *** Add Qmera dependencies ***
    implementation 'io.qmera:qmera-lite:1.0.34'
}
                            </pre>
              </li>
              <li>
                Synchronize your Project with Gradle Files.
              </li>
              <li>
                Modify the MainActivity.java file.
                <pre class="prettyprint my-5 lang-java linenums:1" id="LS-nusdklite1">
package com.example.qmeralitesamplecode;

import android.app.Activity;
import android.os.Bundle;
import android.widget.Toast;

import io.newuniverse.qmerabutton.Callback;
import io.newuniverse.qmerabutton.Qmera;

public class MainActivity extends Activity {

    @Override
    public void onCreate(Bundle bundle) {
        super.onCreate(bundle);
        setContentView(R.layout.activity_main);

        /*************************************
         Connect to our server with your Qmera Account, and implement the required Callback.
         Please Subscribe or contact us to get your Qmera Account.
         Do not share your Qmera Account or ever give it out to someone outside your organization.
         ************************************/
        /**
         * Qmera.connect (String QmeraAccount, Activity RegisteredActivity, int QmeraButtonMode, boolean UserMayModifyUID, Callback ConnectCallback)
         *
         * QmeraAccount         : Your Qmera Account.
         * RegisteredActivity   : Android's Activity class that is used to register the Qmera Button
         * QmeraButtonMode      : The flag that determines when the Qmera Button should appear.
         * 		1 = Within registered Activity, (Qmera Button only appears when users are in the registered activity)
         * 		2 = Within App (Qmera Button always appears as long as user is in the App),
         * 		3 = Always On (Qmera Button always appears even if the application process is cloed)
         * UserMayModifyUID     : Sets whether users are allowed to change the Qmera UserID.
         * 		true = enabled,
         * 		false = disabled
         * ConnectCallback      : The callback interface to be invoked when calling the method connect.
         * 		You need to implement onSuccess(String QmeraUserID) & onFailed(String reasonCode) to handle the RESULT.
         *
         */
        Qmera.connect("***REPLACE***WITH***YOUR***QMERA***ACCOUNT***", this, 1, true, new Callback() {

            @Override
            public void onSuccess(final String QmeraUserID) {
                /**************************************
                 The userId parameter required by the onSuccess method, which is generated automatically, will act as
                 as a user's Qmera User ID and it can be mapped to a User ID on the application level.
                 For example, the Qmera User ID (e.g. User001) can be mapped into the corresponding Application User ID (e.g. John Doe),
                 so you don't have to share your Application User ID with Qmera while still being able to monitor your user activities.
                 **************************************/
                /* do something */
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(getBaseContext(), "Your Qmera User ID: " + QmeraUserID, Toast.LENGTH_LONG).show();
                    }
                });
            }

            @Override
            public void onFailed(final String reasonCode) {
                /**
                 * reasonCode 	: Returns a code based on the status of the function connect called.
                 * 		2:Your trial subscription has expired. Please subscribe to continue using Qmera.
                 * 		3:Your monthly subscription is not paid in full. Please pay your monthly subscription bill to continue using Qmera service.
                 * 		4:Your Customer Engagement Credit has run out and your Prepaid Credit Balance is empty. Please top-up your Prepaid Credit Balance to continue using Qmera
				 *		23:Unsupported Android version
                 * 		93:Missing the required overlay permission
                 * 		95:Invalid Qmera Button Mode (1,2,3)
                 * 		96:Activity is null
                 * 		97:Account is empty
                 * 		98:Your account didn't match
                 * 		99:Something went wrong
                 */
                /* do something */
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        Toast.makeText(getBaseContext(), reasonCode, Toast.LENGTH_LONG).show();
                    }
                });
            }
        });


        /**
         *
         * An OPTIONAL Method to change your Qmera User ID
         * You can call this method anytime after Qmera.connect calls onSuccess
         *
         * String ResponCode = Qmera.changeUsername(String NewUserID)
         *
         * ResponCode 	: Returns a code based on the status of the function call.
         * 		00:Success
		 *		23:Unsupported Android version
         * 		96:Activity is null
         * 		97:Account is empty
         * 		101:Unable to access server. Check your connection and try again later
         * 		102:Duplicate username
         * 		103:Username is empty
         * 		104:Username length is too short
         * 		105:Username length is too long
         * 		106:Illegal State. Be sure call Qmera.connect and #callback state onSuccess called
         * NewUserID	: Desired User ID
         */
        String ResponCode = Qmera.changeUsername("***REPLACE***WITH***NEW***USERID***");
    }
}
</pre>


          </div>
        </div>

        <!-- API -->

        <div class="row my-4" id="api-broadcast">
          <div class="col-sm-12">
            <h3>Quickstart Guide - API Broadcast</h3>
            <p>Everything about sending broadcast to single or multiple destinations.</p>
            <hr>
            <div class="card">
              <p><strong>POST</strong> Send Broadcast</p>
              <span style="background-color: #ddd; padding: 10px">https://qmera.io/api/services/broadcast</span>
            </div>
            <div class="card">
              <p><strong>You can use this endpoint to send broadcast to single or multiple target.</strong></p>
              <table>
                <tr>
                  <th><strong>PROPERTY</strong></th>
                  <th><strong>TYPE</strong></th>
                  <th><strong>REQUIRED</strong></th>
                </tr>
                <tr>
                  <td>sender</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>target_audience</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>destinations</td>
                  <td>string / file</td>
                  <td>false</td>
                </tr>
                <tr>
                  <td>broadcast_type</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>broadcast_mode</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>start_date</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>end_date</td>
                  <td>string</td>
                  <td>false</td>
                </tr>
                <tr>
                  <td>category</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>title</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>message</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>file</td>
                  <td>file</td>
                  <td>false</td>
                </tr>
                <tr>
                  <td>form_id</td>
                  <td>string</td>
                  <td>false</td>
                </tr>
              </table>
            </div>
            <div class="card">
              <p><strong>Description</strong></p>
              <table class="table-desc">
                <tr>
                  <td><b>sender</b></td>
                  <td>FPIN of the sender.</td>
                </tr>
                <tr>
                  <td><b>target_audience</b></td>
                  <td>Your broadcast audience category.<br><br>
                    1 = Customer,<br>
                    2 = Team members,<br>
                    3 = All users,<br>
                    4 = Specific group,<br>
                    5 = Specific user
                  </td>
                </tr>
                <tr>
                  <td><b>destinations</b></td>
                  <td>Your broadcast destination.<br><br>
                    If your audience category is 4/5, then you can attach your broadcast goals. Destinations are in the form of FPIN for specific users, and GROUP_ID for specific groups.<br><br>
                    Note: If there is only 1 group / user then you can directly write the FPIN / GROUP_ID in string form, but if the broadcast destination is more than 1 user / group, you must write the FPIN / GROUP_ID in a .txt file and separated by commas.<br>
                  </td>
                </tr>
                <tr>
                  <td><b>broadcast_type</b></td>
                  <td>Broadcast type.<br><br>
                    1 = Push Notifications,<br>
                    2 = In-App Notifications
                  </td>
                </tr>
                <tr>
                  <td><b>broadcast_mode</b></td>
                  <td>Broadcast period.<br><br>
                    1 = Once,<br>
                    2 = Daily,<br>
                    3 = Weekly,<br>
                    4 = Monthly
                  </td>
                </tr>
                <tr>
                  <td><b>start_date</b></td>
                  <td>Broadcast delivery date.<br><br>
                    Note: Date format is YYYY/MM/DD HH:MM:SS.
                  </td>
                </tr>
                <tr>
                  <td><b>end_date</b></td>
                  <td>Broadcast end date.<br><br>
                    Note: Date format is YYYY/MM/DD HH:MM:SS. If your broadcast period is daily, weekly or monthly, you are required to fill in this parameter.
                  </td>
                </tr>
                <tr>
                  <td><b>category</b></td>
                  <td>The type of content you send in a broadcast.<br><br>
                    0 = Text,<br>
                    1 = Image,<br>
                    2 = Videos,<br>
                    3 = Files / Documents
                  </td>
                </tr>
                <tr>
                  <td><b>title</b></td>
                  <td>Broadcast title.</td>
                </tr>
                <tr>
                  <td><b>message</b></td>
                  <td>Broadcast message.</td>
                </tr>
                <tr>
                  <td><b>file</b></td>
                  <td>Image, video, or document.</td>
                </tr>
                <tr>
                  <td><b>form_id</b></td>
                  <td>Survey content.</td>
                </tr>
              </table>
            </div>
            <div class="card">
              <p><strong>Example</strong></p>

              <pre class="prettyprint linenums:1 mt-2 mb-4">
curl --location --request POST 'https://qmera.io/api/services/broadcast' \
--form 'sender="02c093470c"' \
--form 'target_audience="5"' \
--form 'destinations="02c09347a"' \
--form 'broadcast_type="1"' \
--form 'broadcast_mode="1"' \
--form 'start_date="2021/02/12 00:00:00"' \
--form 'category="3"' \
--form 'title="title"' \
--form 'message="message"' \
--form 'file=@"/PATH/document.txt"'
                            </pre>
              <p><strong>Response</strong></p>

              <pre class="prettyprint linenums:1 mt-2 mb-4">
{"message" : "Broadcast was sent."}
                            </pre>
            </div>
          </div>
        </div>

        <div class="row my-5
        " id="api-email">
          <div class="col-sm-12">
            <h3>Quickstart Guide - API Email</h3>
            <p>Everything about sending email to single or multiple destinations.</p>
            <div class="card">
              <p><strong>POST</strong> Send Email</p>
              <p style="background-color: #ddd; padding: 10px">https://qmera.io/api/services/email</p>
            </div>
            <div class="card">
              <p><strong>You can use this endpoint to send emails to single or multiple email addresses.</strong></p>
              <table>
                <tr>
                  <th>PROPERTY</th>
                  <th>TYPE</th>
                  <th>REQUIRED</th>
                </tr>
                <tr>
                  <td>subject</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>destinations</td>
                  <td>string / file</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>body</td>
                  <td>string</td>
                  <td>true</td>
                </tr>
                <tr>
                  <td>attachments</td>
                  <td>file</td>
                  <td>false</td>
                </tr>
              </table>
            </div>
            <div class="card">
            <p><strong>Description</strong></p>
            <table class="table-desc">
              <tr>
                <td><b>subject</b></td>
                <td>Subject email.</td>
              </tr>
              <tr>
                <td><b>destinations</b></td>
                <td>If there is only 1 email destination, then you can directly write the email in string form, but if the email destination is more than 1, you must write the emails in a .txt file and separated by commas.</td>
              </tr>
              <tr>
                <td><b>body</b></td>
                <td>Email body.</td>
              </tr>
              <tr>
                <td><b>attachments</b></td>
                <td>Attachment files.</td>
              </tr>
            </table>
</div>
<div class="card">
            <p>Example</p>

            <pre class="prettyprint linenums:1 mt-2 mb-4">
curl --location --request POST 'https://qmera.io/api/services/email' \
--form 'destinations="email@domain.com"' \
--form 'subject="subject"' \
--form 'body="body"' \
--form 'attachments=@"/PATH/document.txt"'
                            </pre>
            <p><strong>Response</strong></p>

            <pre class="prettyprint linenums:1 mt-2 mb-4">
{"message" : "Email was sent."}
                            </pre>
</div>
          </div>
        </div>

        <div class="row my-5" id="api-message">
          <div class="col-sm-12">
            <h3>Quickstart Guide - API Message</h3>
            <p>Everything about sending message to user or group.</p>
            <div class="card">
            <p><strong>POST</strong> Send Message</p>
            <p style="background-color: #ddd; padding: 10px">https://qmera.io/api/services/message</p>
            </div>
            <div class="card">
            <p><strong>You can use this endpoint to send messages to user / group.</strong></p>
            <table>
              <tr>
                <th>Property</th>
                <th>type</th>
                <th>Required</th>
              </tr>
              <tr>
                <td>originator</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>destination</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>content</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>file</td>
                <td>file</td>
                <td>false</td>
              </tr>
            </table>
            </div>
            <div class="card">
            <p><strong>Description</strong></p>
            <table class="table-desc">
              <tr>
                <td><b>originator</b></td>
                <td>FPIN of the originator.</td>
              </tr>
              <tr>
                <td><b>destination</b></td>
                <td>FPIN of the destination.</td>
              </tr>
              <tr>
                <td><b>content</b></td>
                <td>Content of the message.</td>
              </tr>
              <tr>
                <td><b>file</b></td>
                <td>Attachment files.</td>
              </tr>
            </table>
            </div>
            <div class="card">
            <p><strong>Example</strong></p>

            <pre class="prettyprint linenums:1 mt-2 mb-4">
curl --location --request POST 'https://qmera.io/api/services/message' \
--form 'originator="02c093470c"' \
--form 'destination="02c093470b"' \
--form 'content="This is the message"' \
--form 'file=@"PATH/document.txt"'
                            </pre>
            <p><strong>Response</strong></p>

            <pre class="prettyprint linenums:1 mt-2 mb-4">
{"message" : "Message was sent."}
                            </pre>
            </div>
          </div>
        </div>

        <div class="row my-5" id="api-call">
          <div class="col-sm-12">
            <h3>Quickstart Guide - API VoIP / Video Call</h3>
            <p>Everything about starting VoIP or Video Call.</p>
            <div class="card">
            <p><strong>POST</strong> Start VoIP / Video Call</p>
            <p style="background-color: #ddd; padding: 10px">https://qmera.io/api/services/vcall</p>
            </div>
            <div class="card">
            <p><strong>You can use this endpoint to do VoIP or Video Call.</strong></p>
            <table>
              <tr>
                <th>PROPERTY</th>
                <th>TYPE</th>
                <th>REQUIRED</th>
              </tr>
              <tr>
                <td>api_key</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>user_id</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>room_name</td>
                <td>string</td>
                <td>true</td>
              </tr>
              <tr>
                <td>camera</td>
                <td>integer</td>
                <td>true</td>
              </tr>
            </table>
            </div>
            <div class="card">
            <p><strong>Description</strong></p>
            <table class="table-desc">
              <tr>
                <td><b>api_key</b></td>
                <td>Palio account from Palio Web Dashboard.</td>
              </tr>
              <tr>
                <td><b>user_id</b></td>
                <td>FPIN of the initiator.</td>
              </tr>
              <tr>
                <td><b>room_name</b></td>
                <td>The name of the room.</td>
              </tr>
              <tr>
                <td><b>camera</b></td>
                <td>If you are going to do voice call, set the camera to 0 and 1 for the video call.</td>
              </tr>
            </table>
            </div>
            <div class="card">
            <p>Example</p>

            <pre class="prettyprint linenums:1 mt-2 mb-4">
curl --location --request POST 'https://qmera.io/api/services/vcall' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'api_key=E8E05077943A6961E969AEA202F5AF2D3FD3961B12E13AA9066500CDFADXXXXX' \
--data-urlencode 'user_id=02c093470b' \
--data-urlencode 'room_name=Room Name' \
--data-urlencode 'camera=1'
                            </pre>
            </div>
          </div>
        </div>

      </div>
      <div class="container-fluid py-4">
        <div class="row" id="copyright-footer">
          <div class="col-12 col-lg-6">
            Copyright &copy; 2021 Qmera.
            All rights reserved.
          </div>
          <div class="col-12 col-lg-6 text-right">
            <strong><span id="slogan" style="color:#6945A5;">Customer Engagement, Made Easy.</span></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $('body').scrollspy({
    target: '#menu-side'
  });
</script>

</html>