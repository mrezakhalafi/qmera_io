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
  <link rel="stylesheet" href="../assets/css/developers.css?v=<?php echo $file_version; ?>" media="screen">
  <!-- <link rel="stylesheet" href="developers-ios.css?v=<?php echo $file_version; ?>" media="screen"> -->
  <link href="../assets/css/styles.min.css" rel="stylesheet" />
  <script class="u-script" type="text/javascript" src="../assets/js/prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/jquery.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/developers.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="../assets/js/developers-ios.js?v=<?php echo $file_version; ?>" defer=""></script>
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

  <meta name="theme-color" content="#11524a">
  <meta property="og:title" content="developers-ios">
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
      <a href="../index.html" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA">
        <img src="../assets/img/logo.svg" class="qlogo-primary" alt="">
        <img src="../assets/img/logo-light.svg" class="qlogo-light" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <input type="checkbox" class="chkboxqmera">
        <div class="overlay"></div>
        <a href="#" class="mobile-nav-toggle"><span></span><span></span><span></span><span></span></a>
        <ul>
          <div class="smalllogo"><a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
          <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
            <ul>
              <li><a href="../conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a></li>
              <li><a href="../conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a></li>
            </ul>
          </li>
          <li><a href="../industries.php" class="nav-link" rel="noopener" aria-label="Industries">Industries</a></li>
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
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header>
  <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.213" defer=""></script>
  <section class="u-clearfix u-section-1" id="sec-bff6">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h4 class="u-text u-text-custom-color-4 u-text-default u-text-1">Developers</h4>
      <h1 class="u-text u-text-default u-text-palette-1-base u-text-2" style="font-weight:500;">Simply Practical</h1>
      <p class="u-text u-text-default u-text-grey-50 u-text-3">Qmera empowers developers to easily embed all features into your apps in just a few lines of code.<br>
        <span style="font-style: italic;"> You may optionally modify the layout, color, as well as disable some of the features later.</span>
        <br>
      </p>
      <a href="developers.php" style="background-image: url('../images/android_r.png'); background-size: 55px auto; text-indent: 25px; background-repeat: no-repeat; background-position: 10px center; border: 1px solid grey;" data-page-id="192341160" class="u-btn u-btn-round u-button-style u-border-grey-70 u-hover-palette-1-light-1 u-radius-50 u-btn-1">Android<span style="font-weight: 400;"></span>
      </a>
      <a href="developers-ios.php" style="background-image: url('../images/apple_r.png'); background-size: 20px auto; background-repeat: no-repeat; text-indent: 25px; background-position: 50px center;" data-page-id="73689642" class="u-border-2 u-btn u-btn-round u-button-style u-none u-radius-50 u-btn-2 u-hover-palette-1-light-1 u-palette-1-base">iOS</a>
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-26 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <p class="u-text u-text-4">Follow these simple steps below&nbsp; to embed Qmera Lite into your mobile application:</p>
                <ol class="u-spacing-20 u-text u-text-5">
                  <li>
                    <span style="font-size: 0.875rem;">Sign up for free trial or subscribe to get your Qmera Account.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Create a new Xcode Project with interface Storyboard. Please make sure to use an iOS 14.5 or later.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Open terminal window, and <span style="background-color: #333; color: #FFFFFF">$ cd</span> into your project directory.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Make sure your system already <a href="https://guides.cocoapods.org/using/getting-started.html"><b>Install</b></a> Cocoapods.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Create Podfile by running command <span style="background-color: #333; color: #FFFFFF">$ pod init</span> .</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your Podfile according to the instructions provided in the Podfile tab.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Run <span style="background-color: #333; color: #FFFFFF">$ pod install</span> .</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Open the *.xcworkspace that was created.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your AppDelegate.swift file according to the instructions provided in the AppDelegate.swift tab. Make sure you are using your Qmera Account to connect to Qmera.io.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your ViewController.swift file according to the instructions provided in the ViewController.swift tab.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Modify your Info.plist file according to the instructions provided in the Info.plist tab.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Build your project.</span>
                  </li>
                  <li>
                    <span style="font-size: 14px;">Run the app from your iPhone device and allow the app the permissions it asks for.</span>
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
                      <a class="active u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-1" id="link-tab-eea4" href="#tab-eea4" role="tab" aria-controls="tab-eea4" aria-selected="true">AppDelegate.swift</a>
                    </li>
                    <li class="u-tab-item" role="presentation">
                      <a class="u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-2" id="link-tab-5fb2" href="#tab-5fb2" role="tab" aria-controls="tab-5fb2" aria-selected="false">ViewController.swift</a>
                    </li>
                    <li class="u-tab-item" role="presentation">
                      <a class="u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-2" id="link-tab-a5a5" href="#tab-a5a5" role="tab" aria-controls="tab-5fb2" aria-selected="false">Info.plist</a>
                    </li>
                    <li class="u-tab-item" role="presentation">
                      <a class="u-active-palette-1-base u-button-style u-palette-2-base u-tab-link u-tab-link-3" id="link-tab-a4a4" href="#tab-a4a4" role="tab" aria-controls="tab-a4a4" aria-selected="false">Podfile</a>
                    </li>
                  </ul>
                  <div class="u-tab-content">
                    <div class="u-container-style u-tab-active u-tab-pane" id="tab-eea4" role="tabpanel" aria-labelledby="link-tab-eea4">
                      <div class="u-container-layout u-container-layout-3">
                        <pre class="prettyprint lang-java linenums">
import UIKit
import QmeraLite

@main
class AppDelegate: UIResponder, UIApplicationDelegate {

    /*************************************
    Connect to our server with your Qmera.io Account, and implement the required Callback.
    Please Subscribe or contact us to get your Qmera.io Account.
    Do not share your Qmera.io Account or ever give it out to someone outside your organization.
    ************************************/
    /** 
    * Qmera.connect (String QmeraAccount, Activity RegisteredActivity, int QmeraButtonMode, boolean UserMayModifyUID, Callback ConnectCallback) 
    * 
    * ConnectCallback	: The callback interface to be invoked when calling the method connect. 
    * 		You need to implement onSuccess(String QmeraUserID) & onFailed(String reasonCode) to handle the RESULT. 
    */

    func application(_ application: UIApplication, didFinishLaunchingWithOptions launchOptions: [UIApplication.LaunchOptionsKey: Any]?) -> Bool {
        // Override point for customization after application launch.
        Qmera.connect(apiKey: "***REPLACE***WITH***YOUR***QMERA***ACCOUNT***", delegate: self)
        return true
    }

    // MARK: UISceneSession Lifecycle

    func application(_ application: UIApplication, configurationForConnecting connectingSceneSession: UISceneSession, options: UIScene.ConnectionOptions) -> UISceneConfiguration {
        // Called when a new scene session is being created.
        // Use this method to select a configuration to create the new scene with.
        return UISceneConfiguration(name: "Default Configuration", sessionRole: connectingSceneSession.role)
    }

    func application(_ application: UIApplication, didDiscardSceneSessions sceneSessions: Set<UISceneSession>) {
        // Called when the user discards a scene session.
        // If any sessions were discarded while the application was not running, this will be called shortly after application:didFinishLaunchingWithOptions.
        // Use this method to release any resources that were specific to the discarded scenes, as they will not return.
    }

}

extension AppDelegate: ConnectDelegate {
    
    func onSuccess(userId: String) {
        print(#function, "userId: \(userId)")
    }
    
    func onFailed(error: String) {
        print(#function, "error: \(error)")
    }
    
}
                          </pre>
                      </div>
                    </div>
                    <div class="u-container-style u-tab-pane" id="tab-5fb2" role="tabpanel" aria-labelledby="link-tab-5fb2">
                      <div class="u-container-layout u-valign-middle u-container-layout-4">
                        <pre class="prettyprint lang-java linenums" id="main-activity-1">
import UIKit
import QmeraLite

class ViewController: UIViewController {
    
    lazy var floatingButton: FloatingButton = {
        let button = FloatingButton()
        button.frame = CGRect(x: 50, y: 50, width: 50, height: 50)
        return button
    }()

    override func viewDidLoad() {
        super.viewDidLoad()
        
        view.addSubview(floatingButton)
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
                    <div class="u-container-style u-tab-pane" id="tab-a5a5" role="tabpanel" aria-labelledby="link-tab-a5a5">
                      <div class="u-container-layout u-valign-middle u-container-layout-5">
                        <pre class="prettyprint javalang linenums"><?php echo htmlentities('<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
  <key>CFBundleDevelopmentRegion</key>
  <string>$(DEVELOPMENT_LANGUAGE)</string>
  <key>CFBundleExecutable</key>
  <string>$(EXECUTABLE_NAME)</string>
  <key>CFBundleIdentifier</key>
  <string>$(PRODUCT_BUNDLE_IDENTIFIER)</string>
  <key>CFBundleInfoDictionaryVersion</key>
  <string>6.0</string>
  <key>CFBundleName</key>
  <string>$(PRODUCT_NAME)</string>
  <key>CFBundlePackageType</key>
  <string>$(PRODUCT_BUNDLE_PACKAGE_TYPE)</string>
  <key>CFBundleShortVersionString</key>
  <string>1.0</string>
  <key>CFBundleVersion</key>
  <string>1</string>
  <key>LSRequiresIPhoneOS</key>
  <true/>
  <key>UIApplicationSceneManifest</key>
  <dict>
    <key>UIApplicationSupportsMultipleScenes</key>
    <false/>
    <key>UISceneConfigurations</key>
    <dict>
      <key>UIWindowSceneSessionRoleApplication</key>
      <array>
        <dict>
          <key>UISceneConfigurationName</key>
          <string>Default Configuration</string>
          <key>UISceneDelegateClassName</key>
          <string>$(PRODUCT_MODULE_NAME).SceneDelegate</string>
          <key>UISceneStoryboardFile</key>
          <string>Main</string>
        </dict>
      </array>
    </dict>
  </dict>
  <key>UIApplicationSupportsIndirectInputEvents</key>
  <true/>'); ?>
<div style="width: 200%; background-color: #11524a">
<?php echo htmlentities('
  <key>NSCameraUsageDescription</key>
  <string>Video Call, Conference Room, Content Creation and Live Streaming.</string>
  <key>NSContactsUsageDescription</key>
  <string>Get File Contact from Local Dictionary for Send Message.</string>
  <key>NSDocumentsFolderUsageDescription</key>
  <string>Get File from Local Dictionary for Send Message.</string>
  <key>NSMicrophoneUsageDescription</key>
  <string>VoIP Call, Video Call, Conference Room, and Live Streaming.</string>
  <key>NSMotionUsageDescription</key>
  <string>Service nuSDK.</string>
  <key>NSPhotoLibraryAddUsageDescription</key>
  <string>Get File Photos from Local Dictionary for Send Message and Content Creation.</string>
  <key>NSPhotoLibraryUsageDescription</key>
  <string>Get File Photos from Local Dictionary for Send Message and Content Creation.</string>
  <key>NSSpeechRecognitionUsageDescription</key>
  <string>Service nuSDK.</string>
  <key>UIBackgroundModes</key>
  <array>
    <string>fetch</string>
    <string>location</string>
    <string>processing</string>
    <string>remote-notification</string>
    <string>voip</string>
  </array>') ?>
</div>
  <?php echo htmlentities('
  <key>UILaunchStoryboardName</key>
  <string>LaunchScreen</string>
  <key>UIMainStoryboardFile</key>
  <string>Main</string>
  <key>UIRequiredDeviceCapabilities</key>
  <array>
    <string>armv7</string>
  </array>
  <key>UISupportedInterfaceOrientations</key>
  <array>
    <string>UIInterfaceOrientationPortrait</string>
    <string>UIInterfaceOrientationLandscapeLeft</string>
    <string>UIInterfaceOrientationLandscapeRight</string>
  </array>
  <key>UISupportedInterfaceOrientations~ipad</key>
  <array>
    <string>UIInterfaceOrientationPortrait</string>
    <string>UIInterfaceOrientationPortraitUpsideDown</string>
    <string>UIInterfaceOrientationLandscapeLeft</string>
    <string>UIInterfaceOrientationLandscapeRight</string>
  </array>
</dict>
</plist>
') ?>
                        </pre>
                      </div>
                    </div>
                    <div class="u-container-style u-tab-pane" id="tab-a4a4" role="tabpanel" aria-labelledby="link-tab-a4a4">
                      <div class="u-container-layout u-valign-middle u-container-layout-5">
                        <pre class="prettyprint linenums">
# Uncomment the next line to define a global platform for your project
# platform :ios, '9.0'

target 'TestQmeraLite' do
  # Comment the next line if you don't want to use dynamic frameworks
  use_frameworks!

<div style="background-color: #11524a">  pod 'QmeraLite', '~> 1.0.2'</div>

  # Pods for TestQmeraLite

  target 'TestQmeraLiteTests' do
    inherit! :search_paths
    # Pods for testing
  end

  target 'TestQmeraLiteUITests' do
    # Pods for testing
  end
  
  post_install do |installer|
    installer.pods_project.targets.each do |target|
      target.build_configurations.each do |config|
        config.build_settings['BUILD_LIBRARY_FOR_DISTRIBUTION'] = 'YES'
      end
    end
  end

end

                        </pre>
                      </div>
                    </div>
                  </div>
                </div>
                <a id="download-sample" z class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-50 u-text-palette-1-base u-btn-3 download-sample" style="cursor:pointer;">Download Sample Code</a>
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
              <a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots and
                A.I</a>
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

  <script>
    document.getElementById('dev-nav').classList.add('active');
  </script>

</body>

</html>