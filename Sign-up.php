<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/customize_template.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mail_template.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/encoder.php');


if ($_SESSION['flag'] == 1 && $_SESSION['password_show'] != null) {
    unset($_SESSION['flag']);
}

if (isset($_SESSION['id_company']) && isset($_SESSION['id_user'])) {
    header("Location: dashboardv2/index.php");
}

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 10;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$version = 'v=1.68';

if (isset($_POST['emailtrial'])) {
    $inputEmail = $_POST['emailtrial'];
} else {
    $inputEmail = "";
}

$file_version = '1.3434';

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Qmera - Sign Up</title>
    <link rel="icon" type="image/png" href="images/qmera_button.png">
    <link rel="stylesheet" href="nicepage.css?v=<?php echo $file_version; ?>" media="screen">
    <link rel="stylesheet" href="Sign-up.css?v=<?php echo $file_version; ?>" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js?v=<?php echo $file_version; ?>" defer=""></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

    <script class="u-script" type="text/javascript" src="nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script class="u-script" type="text/javascript" src="prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
    <script type="text/javascript" src="geoloc.js?v=<?php echo $file_version; ?>" defer=""></script>

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
    <meta property="og:title" content="Sign up">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <link href="/assets/css/styles.min.css" rel="stylesheet" />

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
                    <li><a href="industries.php" class="nav-link" rel="noopener" aria-label="Industries">Industries</a>
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
    <section class="u-clearfix u-section-1" id="sec-f101">
        <div class="u-clearfix u-sheet u-sheet-1">
            <p class="u-small-text u-text u-text-default u-text-grey-40 u-text-variant u-text-1">START FOR FREE</p>
            <h4 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-2">Set up your Qmera account</h4>
            <div class="u-form u-form-1">
                <form onsubmit="event.preventDefault(); signup();" id="signup-form" action="#" method="POST" class="u-clearfix u-form-spacing-35 u-inner-form" source="custom" name="form-1" style="padding: 10px;">
                    <div class="u-form-group u-form-name form-margin">
                        <label for="name-6974" class="u-custom-font u-label u-label-1">Full name</label>
                        <input type="text" autocomplete="new-password" placeholder="Full name" id="name-6974" name="name" class="u-border-1 u-border-grey-30 u-custom-font u-input u-input-rectangle u-radius-10 u-white u-input-1" required="required" style="margin-top: 15px;">
                    </div>
                    <div class="u-form-email u-form-group form-margin">
                        <label for="email-6974" class="u-custom-font u-label u-label-2">Email</label>
                        <input onblur="validate_email(this.value)" type="email" autocomplete="new-password" placeholder="name@email.com" id="email-6974" name="emailAddr" value="<?php echo $inputEmail; ?>" class="u-border-1 u-border-grey-30 u-custom-font u-input u-input-rectangle u-radius-10 u-white u-input-2" required="required" style="margin-top: 15px;">
                    </div>
                    <div class="u-form-group form-margin">
                        <label for="message-6974" class="u-custom-font u-label u-label-3">Password</label>
                        <input onblur="validatepass();" placeholder="at least 8 characters" autocomplete="new-password" rows="4" cols="50" id="message-6974" name="pass" class="u-border-1 u-border-grey-30 u-custom-font u-input u-input-rectangle u-radius-10 u-white u-input-3" required="required" type="password" style="margin-top: 15px;">
                        <script>
                            
                            const validatepass = () => {
                                let pass = document.getElementById("message-6974").value.length;
                                if (pass < 8) {
                                    alert('Password must at least 8 characters.');
                                }
                            };
                            
                        </script>
                    </div>
                    <div class="u-form-checkbox u-form-group u-form-group-4 form-margin">
                        <input class="larger-box" type="checkbox" id="checkbox-f75e" name="checkbox" value="On" required="required">
                        <label for="checkbox-f75e" class="u-custom-font u-label u-label-4">
                            <span style="font-weight: normal;">By creating an account you agree to the <a href="tos.php">terms of use</a> and our <a href="privacypolicy.php">privacy policy.</a></span>
                        </label>
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#creditModalCenter" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-radius-10 u-btn-1 btn-create">Create account</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                    <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                </form>
            </div>
            <h6 class="u-text u-text-default u-text-3">Already have an account? <a href="login.php" class="u-active-none u-border-none u-btn u-button-link u-button-style u-custom-font u-hover-none u-none u-text-custom-color-2 u-btn-2">Log in</a>
            </h6>
        </div>
    </section>

    <div class="modal">
        <!-- Place at bottom of page -->
    </div>


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
                <p class="copyright-txt">© 2021 Qmera. All rights reserved <span>|</span> <a href="privacypolicy.php" rel="noopener" aria-label="Privacy Policy">Privacy Policy</a> <span>|</span> <a href="#" rel="noopener" aria-label="Disclosure">Disclosure</a></p>
            </div>
        </div>
    </footer>

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


</body>

<script src="Sign-up.js?v=<?php echo $file_version; ?>" defer=""></script>

</html>