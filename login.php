<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

if ($_SESSION['id_user'] != '') {
    header("Location: dashboardv2/index.php");
}

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 9;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Qmera - Login</title>
    <link rel="icon" type="image/png" href="images/qmera_button.png">
    <link rel="stylesheet" href="nicepage.css?v=<?php echo $file_version; ?>" media="screen">
    <link rel="stylesheet" href="login.css?v=<?php echo $file_version; ?>" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script class="u-script" type="text/javascript" src="prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script type="text/javascript" src="geoloc.js?v=<?php echo $file_version; ?>" defer=""></script>
    <meta name="generator" content="Nicepage 3.23.0, nicepage.com">

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <script src="js/login.js?v=<?php echo $file_version; ?>"></script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Site1",
            "logo": "images/Qmera_Logo1.png"
        }
    </script>
    <style>
        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #5e5e5e;
            opacity: 1;
            /* Firefox */
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #5e5e5e;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: #5e5e5e;
        }

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
    <meta name="theme-color" content="#6945a5">
    <meta property="og:title" content="login">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <link href="/assets/css/styles.min.css" rel="stylesheet" />
</head>

<body class="u-body">
    <header id="header" class="header fixed-top bg-white">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener noreferrer">
                <img src="/assets/img/logo.svg" class="qlogo-primary" alt="">
                <img src="/assets/img/logo-light.svg" class="qlogo-light" alt="">
            </a>
            <nav id="navbar" class="navbar">
                <input type="checkbox" class="chkboxqmera">
                <div class="overlay"></div>
                <a href="#" class="mobile-nav-toggle"><span></span><span></span><span></span><span></span></a>
                <ul>
                    <div class="smalllogo"><a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
                    <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
                        <ul>
                            <li><a href="conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a></li>
                            <li><a href="conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a></li>
                        </ul>
                    </li>
                    <li><a href="/qmera/industries.php" class="nav-link" rel="noopener" aria-label="Industries">Industries</a>
                    </li>
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
                    <li><a href="blog.php" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
                    <li><a href="/pages/developers.php">Developers</a></li>
                    <li><a href="company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a>
                    </li>
                    <li><a href="contact.php" class="nav-link" rel="noopener" aria-label="Contact">Contact</a></li>
                    <li><a href="Sign-up.php" class="nav-link active" rel="noopener" aria-label="Contact">Get Started</a></li>
                </ul>

            </nav><!-- .navbar -->
        </div>
    </header>
    <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.220" defer=""></script>
    <section class="u-clearfix u-section-1" id="sec-a37c">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h4 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-1">Welcome Back</h4>
            <div class="u-form u-form-1">
                <form onsubmit="event.preventDefault(); login();" id="login-form" action="logic/log_in.php" method="POST" class="u-clearfix u-form-spacing-29 u-inner-form" source="custom" name="form" style="padding: 10px;">
                    <div class="u-form-group u-form-name form-margin">
                        <label for="name-cfe5" class="u-custom-font u-label u-label-1">Email</label>
                        <input type="email" autocomplete="new-password" placeholder="name@email.com" id="name-cfe5" name="email-address" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10 u-white" style="margin-top: 15px;" required="required">
                    </div>
                    <div class="u-form-group u-form-group-2 form-margin">
                        <label for="text-551f" class="u-custom-font u-label u-label-2">Password &nbsp;<a class="forgot-link" href="forgot.php">Forgot?</a></label>
                        <!-- <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-5-light-1 u-btn-2" href="forgot.php">Forgot?</a> -->
                        <input type="password" autocomplete="new-password" placeholder="" id="text-551f" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10 u-white" style="margin-top: 15px;">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-radius-10 u-btn-1">Log In</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                    <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                </form>
                <h6 class="u-text u-text-default u-text-3 mx-auto">Don't have an account? <a href="Sign-up.php" class="u-active-none u-border-none u-btn u-button-link u-button-style u-custom-font u-hover-none u-none u-text-custom-color-2 u-btn-2"><strong>Sign up now</strong></a>
                </h6>
            </div>
            <!-- <p class="u-custom-font u-text u-text-default u-text-palette-5-light-1 u-text-2">
          
        </p> -->
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="footer-content">
                <ul class="footer-menu-links">
                    <li><a href="#">Products</a>
                        <div class="mt-3">
                            <a href="conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a><br>
                            <a href="conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a><br>
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
                <p class="copyright-txt">© 2021 Qmera. All rights reserved <span>|</span> <a href="#" rel="noopener" aria-label="Privacy Policy">Privacy Policy</a> <span>|</span> <a href="#" rel="noopener" aria-label="Disclosure">Disclosure</a></p>
            </div>
        </div>
    </footer>
</body>

</html>