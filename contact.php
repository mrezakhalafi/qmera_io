<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 7;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Contact</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.220" defer=""></script>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/styles.min.css" rel="stylesheet" />

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

<body class="qmera-init">
    <header id="header" class="header fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener noreferrer">
                <img src="assets/img/logo.svg" class="qlogo-primary" alt="">
                <img src="assets/img/logo-light.svg" class="qlogo-light" alt="">
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
                            <!-- <li><a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots
                                    and A.I</a></li> -->
                        </ul>
                    </li>
                    <li><a class="nav-link" href="industries.php" rel="noopener" aria-label="Industries">Industries</a>
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
                    <li><a href="company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a></li>
                    <li><a href="contact.php" class="nav-link active" rel="noopener" aria-label="Contact">Contact</a>
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
                </li>
                </ul>

            </nav><!-- .navbar -->
        </div>
    </header>
    <section class="generic-section">
        <div class="container">
            <div class="row resources-banner">
                <div class="col-lg-12 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <h1>Contact Qmera</h1>
                    <p class="contact-subtxt">We'd love to learn more about you and share how we can help you connect
                        and engage with your customers. </p>
                </div>
            </div>
            <section class="contact-section">
                <div class="container">
                    <div class="contact-viewform">
                        <div class="row">
                            <div class="col-lg-4">
                                <h1>Headquarters</h1>
                                <p>Theodore Lowe<br />
                                    Ap #867-859 Sit Rd.<br />
                                    Azusa New York 39531</p>
                                <p class="contact-title">Email Address</p>
                                <p>support@qmera.io</p>
                                <p class="contact-title">Telephone</p>
                                <p>+19 1234 567 890</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="qmera-contactfield">
                                    <div class="msgsent-text"></div>
                                    <form class="contact-form row" id="qmera-contactform">
                                        <div class="col-lg-6">
                                            <input class="form-control" id="first-name" required type="text" name="firstname" placeholder="First Name*">
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" id="last-name" required type="text" name="lastname" placeholder="Last Name*">
                                        </div>
                                        <div class="col-lg-12">
                                            <input class="form-control" id="email" required type="email" name="emailadd" placeholder="Company Email*">
                                            <p class="text-danger mt-2 d-none" id="alertEmail">Please use a valid email address.</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" id="message" required name="message" placeholder="Inquiry"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <div><span class="send-preload"></span> <button class="qbtn qbtn-orange" id="submit" type="button" onclick="sendJSON();">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


    <!-- <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body pb-5">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row justify-content-center m-0">
                        <p data-translate="contactus-4" class="text-center font-weight-bold fontRobReg mb-0 mt-5 fs-20 pl-lg-4">Thanks for filling out our form!</p>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <p data-translate="contactus-5" class="fontRobReg mb-0 fs-15 text-center">Your inquiry has been submitted!<br>We will contact you by email to provide more information.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h6 class="modal-title text-center mb-3" id="exampleModalLabel"><strong>Thanks for filling out our form!</strong></h6>
                <p data-translate="contactus-5" class="fontRobReg mb-0 fs-15 text-center">Your inquiry has been submitted!<br>We will contact you by email to provide more information.</p>
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
                            <a href="conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a><br>
                            <a href="conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a><br>
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
                <p class="copyright-txt">© 2021 Qmera. All rights reserved <span>|</span> <a href="privacypolicy.php" rel="noopener" aria-label="Privacy Policy">Privacy Policy</a> <span>|</span> <a href="#" rel="noopener" aria-label="Disclosure">Disclosure</a></p>
            </div>
        </div>
    </footer>
    <script src="assets/vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script src="assets/js/geoloc.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/geoloc.php'); ?>
    <script src="assets/js/contact.js?v=<?php echo time(); ?>"></script>
</body>

</html>