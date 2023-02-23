<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
// include_once($_SERVER['DOCUMENT_ROOT'] . '/session_lifetime.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 1;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Home</title>
    <meta name="title" content="QMERA">
    <meta name="description"
        content="With Qmera, your online teams can engage with shoppers in real-time, answer questions, recommend products, and close sales in real-time.">
    <meta name="keywords"
        content="qmera, customer, engagement, video, chat, sales, smartbots, ai, resources, Conversational Engagement, Conversational Sales, Smartbots and AI">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.213" defer=""></script>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/styles.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="nicepage.css?v=<?php echo $file_version; ?>" media="screen">
	<link rel="stylesheet" href="forgot.css?v=<?php echo $file_version; ?>" media="screen">
	<style>
		.header-light .navbar ul li a {
			color:black !important;
		}
	</style>
    <script src="forgot.js?v=<?php echo time(); ?>"></script>
</head>

<body class="qmera-init" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <header id="header" class="header header-light fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener"
                aria-label="QMERA">
                <img src="assets/img/logo.svg" class="qlogo-primary" alt="">
                <img src="assets/img/logo-light.svg" class="qlogo-light" alt="">
            </a>
            <nav id="navbar" class="navbar">
                <input type="checkbox" class="chkboxqmera">
                <div class="overlay"></div>
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
                    <li><a class="nav-link" href="industries.php" rel="noopener" aria-label="Industries">Industries</a>
                    </li>
                    <!--<li><a href="resources.php" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
                    <li><a href="blog.php" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
                    <li><a href="pages/developers.php">Developers</a></li>
                    <li><a href="company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a></li>
                    <li><a href="contact.php" class="nav-link" rel="noopener" aria-label="Contact">Contact</a></li>
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

<section class="u-clearfix u-section-1" id="sec-31af">
		<div class="u-clearfix u-sheet u-sheet-1">
			<h4 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-1">Forgot your password?</h4>
			<p class="u-align-center u-custom-font u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-2">Enter the email associated with your account and we'll send&nbsp;<br>an email with instructions to reset your password.
			</p>
			<div class="u-form u-form-1">
				<form onsubmit="event.preventDefault(); forgot();" id="forgot-form" action="#" method="POST" class="u-clearfix u-form-spacing-49 u-inner-form" source="custom" name="form" style="padding: 10px;">
					<div class="u-form-group u-form-name">
						<label for="name-cfe5" class="u-custom-font u-label u-label-1">Email</label>
						<input type="email" placeholder="name@email.com" id="name-cfe5" name="email-address" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-10 u-white" required="" style="margin-top: 15px;">
					</div>
					<div class="u-align-center u-form-group u-form-submit">
						<input type="submit" value="Send Instructions" class="u-border-none u-btn u-btn-round u-btn-submit u-button-style u-custom-color-2 u-radius-10 u-btn-1 btn-submit-forgot">
					</div>
					<div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
					<div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
					<input type="hidden" value="" name="recaptchaResponse">
				</form>
			</div>
			<p class="u-custom-font u-text u-text-default u-text-3">
				<a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-2" href="/login.php" data-page-id="38003013">Back to Login</a>
			</p>
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
    <script src="assets/vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script src="assets/js/geoloc.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/geoloc.php'); ?>
</body>