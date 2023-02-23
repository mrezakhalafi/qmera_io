<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/index-all.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

// if ($_SESSION['id_user'] != '') {
//     header("Location: dashboardv2/index.php");
// }

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 3;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Qmera - Developers</title>
  <link rel="icon" type="image/png" href="images/qmera_button.png">
  <link rel="stylesheet" href="../assets/css/nicepage.css?v=<?php echo $file_version; ?>" media="screen">
  <link rel="stylesheet" href="../assets/css/Developers.css?v=<?php echo $file_version; ?>" media="screen">
  <link href="../assets/css/styles.min.css" rel="stylesheet" />

  <script class="u-script" type="text/javascript" src="../assets/js/jquery.js?v=<?php echo $file_version; ?>"></script>
  <script class="u-script" type="text/javascript" src="../assets/js/prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/developers.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script type="text/javascript" src="../assets/js/geoloc.js?v=<?php echo $file_version; ?>" defer=""></script>
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
  <meta property="og:title" content="Developers">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">

  <style>
        @media (max-width: 768px){
        
            #navbar{
                margin-right: 0px;
            }

        }

        @media (min-width: 768px){
        
            #navbar{
                margin-right: -110px;
            }
        }
    </style>
    
</head>

<body onload="PR.prettyPrint()" class="u-body">
  <header id="header" class="header fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="../index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA">
        <img src="../assets/img/logo.svg" class="qlogo-primary" alt="">
        <img src="../assets/img/logo-light.svg" class="qlogo-light" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <input type="checkbox" class="chkboxqmera">
        <div class="overlay"></div>
        <a href="#" class="mobile-nav-toggle"><span></span><span></span><span></span><span></span></a>
        <ul>
          <div class="smalllogo"><a href="../index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
          <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
            <ul>
              <li><a href="../conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a></li>
              <li><a href="../conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a></li>
              <!-- <li><a href="../smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots and A.I</a></li> -->
            </ul>
          </li>
          <li><a class="nav-link" href="../industries.php" rel="noopener" aria-label="Industries">Industries</a></li>
          <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Pricing</span> <i
          class="qmera-ddicon"></i></a>
            <ul>
              <li>
                  <a href="pricing_products.php" rel="noopener" aria-label="Smartbots and A.I">Product Pricing</a>
              </li>
              <li>
                  <a href="pricing_calculator.php" rel="noopener" aria-label="Conversational Sales">Pricing Calculator</a>
              </li>
              <li>
                  <a href="bundle_pricing.php" rel="noopener" aria-label="Conversational Engagement">Plans For Everyone</a>
              </li>
            </ul>
          </li>
          <!--<li><a href="resources.php" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
          <li><a href="../blog.php" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
          <li><a href="developers.php" class="nav-link active" rel="noopener" aria-label="Developers">Developers</a></li>
          <li><a href="../company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a></li>
          <li><a href="../contact.php" class="nav-link" rel="noopener" aria-label="Contact">Contact</a></li>
                    <?php if (!isset($_SESSION['id_user'])) { ?>
                    <li><a href="/Sign-up.php" class="nav-link d-none" rel="noopener" aria-label="Get Started">Get Started</a></li>
                    <li><a href="/login.php" class="nav-link" rel="noopener" aria-label="Login">
                        Login
                    </a></li>
                    <?php } else { ?>
                    <li><a href="/login.php" class="nav-link" rel="noopener" aria-label="Login">
                        Dashboard
                    </a></li>
                    <?php } ?>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>
  <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=<?php echo $file_version; ?>" defer=""></script>
  <section class="u-clearfix u-section-1" id="sec-bff6">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h4 class="u-text u-text-custom-color-4 u-text-default u-text-1">Developers</h4>
      <h1 class="u-text u-text-default u-text-palette-1-base u-text-2" style="font-weight:500;">Simply Practical</h1>
      <p class="u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-grey-50 u-text-3">Qmera empowers developers to easily embed all features into your apps in just a few lines of code.<br>
        <span style="font-style: italic;"> You may optionally modify the layout, color, as well as disable some of the features later.</span>
        <br>
      </p>
      <a href="developers.php" style="background-image: url('../images/android.png'); background-size: 55px auto; text-indent: 25px; background-repeat: no-repeat; background-position: 10px center;" data-page-id="192341160" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-50 u-btn-1">Android<span style="font-weight: 400;"></span>
      </a>
      <a href="developers-ios.php" style="background-image: url('../images/apple.png'); background-size: 20px auto; background-repeat: no-repeat; text-indent: 25px; background-position: 50px center;border: 1px solid grey;" data-page-id="73689642" class="u-border-2 u-border-grey-70 u-border-grey-70 u-hover-palette-1-light-1 u-btn u-btn-round u-button-style u-none u-radius-50 u-btn-2">iOS</a>
      <!-- <a style="background-image: url('../images/apple.png'); background-size: 20px auto; background-repeat: no-repeat; text-indent: 25px; background-position: 50px center;border: 1px solid grey;" data-page-id="73689642" class="u-border-2 u-border-grey-70 u-border-grey-70 u-hover-palette-1-light-1 u-btn u-btn-round u-button-style u-none u-radius-50 u-btn-2 disabled">iOS</a> -->
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-26 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <p class="u-text u-text-4">Follow these simple steps below&nbsp; to embed Qmera Lite into your mobile application:</p>
                <ol class="u-spacing-20 u-text u-text-5">
                  <li>
                    <span style="font-size: 0.875rem;">Sign up for free trial or subscribe to get your Maven credentials (username &amp; password) and Qmera Account.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Create a new Android Studio Project or open an existing project in Android Studio. Please make sure to use an API version 23 or later your SDK.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your module-level build.gradle according to the instructions provided in the build.gradle(:app) tab. Don't forget to use your own Maven credentials for the username and password variables.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Synchronize your Project with the newly modified Gradle File.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your MainActivity.java file according to the instructions provided in the MainActivity.java tab. Make sure you are using your Qmera Account to connect to Qmera.io.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Build your project. If you encounter a Manifest Merger error while building your project, refer to the Notes tab.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Run the app from your Android device and allow the app the permissions it asks for.</span>
                  </li>
                </ol>
                <p class="u-text u-text-6">Note.<br>If you use a domain name in your package name, please use your own domain name. Using other company's or an invalid domain name may cause your application to be terminated or unable to run properly.
                </p>
              </div>
            </div>
            <div class="u-align-left u-container-style u-layout-cell u-size-34 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <div class="u-expanded-width u-tab-links-align-justify u-tabs u-tabs-1">
                  <ul class="u-tab-list u-unstyled" role="tablist">
                    <li class="u-tab-item" role="presentation">
                      <a class="active u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-1" id="link-tab-eea4" href="#tab-eea4" role="tab" aria-controls="tab-eea4" aria-selected="true">build.gradle(:app)</a>
                    </li>
                    <li class="u-tab-item" role="presentation">
                      <a class="u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-2" id="link-tab-5fb2" href="#tab-5fb2" role="tab" aria-controls="tab-5fb2" aria-selected="false">MainActivity.java</a>
                    </li>
                    <li class="u-tab-item" role="presentation">
                      <a class="u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-3" id="link-tab-a4a4" href="#tab-a4a4" role="tab" aria-controls="tab-a4a4" aria-selected="false">Notes</a>
                    </li>
                  </ul>
                  <div class="u-tab-content">
                    <div class="u-container-style u-tab-active u-tab-pane" id="tab-eea4" role="tabpanel" aria-labelledby="link-tab-eea4">
                      <div class="u-container-layout u-container-layout-3">
                        <pre class="prettyprint lang-java linenums">
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
    <!-- implementation 'com.google.android.material:material:1.4.0'
    implementation 'androidx.multidex:multidex:2.0.1'
    implementation 'org.jsoup:jsoup:1.14.1'
    implementation 'com.google.android.gms:play-services-vision:20.1.3'
    implementation 'com.google.android.exoplayer:exoplayer:2.15.1'

    implementation('com.google.apis:google-api-services-gmail:v1-rev98-1.25.0') {
        exclude group: 'org.apache.httpcomponents'
        transitive = true
    }
    implementation('com.github.bumptech.glide:glide:4.12.0@aar') {
        transitive = true
    }
    implementation('net.zetetic:android-database-sqlcipher:4.4.3@aar') {
        transitive = true
    } -->
                          </pre>
                      </div>
                    </div>
                    <div class="u-container-style u-tab-pane" id="tab-5fb2" role="tabpanel" aria-labelledby="link-tab-5fb2">
                      <div class="u-container-layout u-valign-middle u-container-layout-4">
                        <pre class="prettyprint lang-java linenums" id="main-activity-1">
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
                        <pre class="prettyprint linenums lang-java" id="main-activity-2">
/***********************************************************************************************************
If you are using <strong class="highlight" style="font-style:unset !important;">Flutter</strong> for your app, please follow the sample code below.

If you are using <strong class="highlight" style="font-style:unset !important;">Native Android</strong>, please refer to <strong><a href="#" role="button" class="highlight switch-main-activity to-option-1">Option-1</a></strong>.
************************************************************************************************************/
package com.example.qmeralitesamplecode;

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;
import android.widget.Toast;

import io.flutter.embedding.android.FlutterActivity;

import io.newuniverse.paliobutton.Callback;
import io.newuniverse.paliobutton.Qmera;

public class MainActivity extends FlutterActivity {

    @Override
    public void onCreate(Bundle bundle) {
        super.onCreate(bundle);
        setContentView(R.layout.activity_main);

        /*************************************
        Connect to our server with your Qmera.io Account, and implement the required Callback.
        Please Subscribe or contact us to get your Qmera.io Account.
        Do not share your Qmera.io Account or ever give it out to someone outside your organization.
        ************************************/
        /** 
        * Qmera.connect (String QmeraAccount, Activity RegisteredActivity, int QmeraButtonMode, boolean UserMayModifyUID, Callback ConnectCallback) 
        * 
        * QmeraAccount 		: Your Qmera.io Account. 
        * RegisteredActivity 	: Android's Activity class that is used to register the Qmera Button 
        * QmeraButtonMode 	: The flag that determines when the Qmera Button should appear. 
        * 		1 = Within registered Activity, (Qmera Button only appears when users are in the registered activity) 
        * 		2 = Within App (Qmera Button always appears as long as user is in the App), 
        * 		3 = Always On (Qmera Button always appears even if the application process is closed) 
        * UserMayModifyUID 	: Sets whether users are allowed to change the Qmera UserID. 
        * 		true = enabled, 
        * 		false = disabled 
        * ConnectCallback	: The callback interface to be invoked when calling the method connect. 
        * 		You need to implement onSuccess(String QmeraUserID) & onFailed(String reasonCode) to handle the RESULT. 
        * 
        */
        Qmera.connect("***REPLACE***WITH***YOUR***QMERA***ACCOUNT***", this, 2, true, new Callback() {

            @Override
            public void onSuccess(final String QmeraUserID) {
                /**************************************
                The userId parameter required by the onSuccess method, which is generated automatically, will act as 
                as a user's Qmera User ID and it can be mapped to a User ID on the application level.
                For example, the Qmera User ID (e.g. User001) can be mapped into the corresponding Application User ID (e.g. John Doe),
                so you don't have to share your Application User ID with Qmera.io while still being able to monitor your user activities.
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
                * 		2:Your trial subscription has expired. Please subscribe to continue using Qmera.io.
                * 		3:Your monthly subscription is not paid in full. Please pay your monthly subscription bill to continue using Qmera.io service.
                * 		4:Your Customer Engagement Credit has run out and your Prepaid Credit Balance is empty. Please top-up your Prepaid Credit Balance to continue using Qmera.io
                *     23:Unsupported Android version
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
        *              23:Unsupported Android version
        * 		96:Activity is null
        * 		97:Account is empty
        * 		101:Unable to access server. Check your connection and try again later
        * 		102:Duplicate username
        * 		103:Username is empty
        * 		104:Username length is too short
        * 		105:Username length is too long
        * 		106:Illegal State. Be sure to call Qmera.connect and #callback state onSuccess called
        * NewUserID	: Desired User ID
        */
        String ResponCode = Qmera.changeUsername("***REPLACE***WITH***NEW***USERID***");
    }
}
                          </pre>
                      </div>
                    </div>
                    <div class="u-container-style u-tab-pane" id="tab-a4a4" role="tabpanel" aria-labelledby="link-tab-a4a4">
                      <div class="u-container-layout u-valign-middle u-container-layout-5">
                        <pre class="prettyprint">
/**
For user satisfaction, all features provided in Qmera have been tested to meet certain performance, reliability, and availability standards. If you need to test these features (Audio Call, Video Call, Conference, Online Seminar, etc.), please download <strong><a href="https://play.google.com/store/apps/details?id=io.newuniverse.catchup">catchUp</a></strong> from Google Play Store. <strong><a href="https://play.google.com/store/apps/details?id=io.newuniverse.catchup">catchUp</a></strong> is a Social Media built entirely using Qmera.io to demonstrate Qmera's performance, reliability, and availability standards.

=====================
NOTES
=====================
For user security and privacy reasons, Qmera.io for Android will not work in the following environments:
1. Rooted Devices
2. Emulators
3. Android devices version below 6.0 (API 23). You need to set minSdkVersion 19 in your build.gradle (:app)
4. Applications that uses the backup and restore infrastructure. Please make sure you have the following 3 lines of code in your Manifest file:
android:allowBackup="false"
android:fullBackupOnly="false"
android:fullBackupContent="false"

=====================
Layout Customization
=====================
You can customize the look and layout of our live streaming, online seminar, and audio-video call features. To do so, follow these steps:
1. Download file activity layout (.xml) files dari link: <strong><a id="activity-layout" style="cursor:pointer;">res-pb.zip</a></strong>
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
                  </div>
                </div>
                <a id="download-sample" class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-50 u-text-palette-1-base u-btn-3 download-sample" style="cursor:pointer;">Download Sample Code</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
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
              <!-- <a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots and
                A.I</a> -->
            </div>
          </li>
          <li><a href="industries.php" rel="noopener" aria-label="Industries">Industries</a></li>
          <!--<li><a href="resources.php" rel="noopener" aria-label="Resources">Resources</a></li>-->
          <li><a href="blog.php" rel="noopener" aria-label="Blog">Blog</a></li>
          <li><a href="company.php" rel="noopener" aria-label="Company">Company</a>
            <!--<div class="mt-3">
            <a href="#" rel="noopener" aria-label="Executive Team">Executive Team</a><br>
            <a href="#" rel="noopener" aria-label="Board of Directors">Board of Directors</a><br>
            <a href="contact.php" rel="noopener" aria-label="Contact">Contact</a>
          </div>-->
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

<script>
  $("#download-sample").click(function() {
    <?php if (isset($_SESSION['id_company'])) { ?>
      window.location.href = '/downloads/QmeraLiteSampleCode.zip';
    <?php } else { ?>
      alert('Please sign up first before downloading the sample code!');
      window.location.href = '/login.php';
    <?php } ?>
  })
</script>

</html>