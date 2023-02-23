<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 4;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Company</title>
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
                    <div class="smalllogo"><a href="index.php" class="qlogo d-flex align-items-center" title="QMERA"
                            rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
                    <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i
                                class="qmera-ddicon"></i></a>
                        <ul>
                            <li><a href="conversational-engagement.php" rel="noopener"
                                    aria-label="Conversational Engagement">Conversational Engagement</a></li>
                            <li><a href="conversational-sales.php" rel="noopener"
                                    aria-label="Conversational Sales">Conversational Sales</a></li>
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
                    <li><a href="company.php" class="nav-link active" rel="noopener" aria-label="Company">Company</a>
                    </li>
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
    <section class="generic-section">
        <div class="container">
            <div class="row company-banner">
                <div
                    class="col-lg-12 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <p class="company-subheader">COMPANY</p>
                    <h1 class="company-headertitle">We like making things easy.</h1>
                    <p class="company-subtxt">Today’s customers expect ease and convenience — no matter what touchpoint
                        they are using, no matter what business they are dealing with, and no matter what product or
                        service they are buying.</p>
                    <p class="company-subtxt">And here at Qmera, we believe in making things easy for businesses to give
                        customers what they want.</p>

                </div>
            </div>
            <h2>Qmera makes it easy for businesses to:</h2>
            <!--<div class="timeline-widget">
                <div class="timeline-block">
                    <div class="marker m1"></div>
                    <div class="timeline-content">
                       <p>Connect with customers by adding video, call and chat directly on their app.</p>
                    </div>
                 </div>
                 <div class="timeline-block">
                    <div class="marker m2"></div>
                    <div class="timeline-content">
                       <p>Engage with audiences through livestreaming, push notifications, instant messaging, and video calls.</p>
                    </div>
                 </div>
                 <div class="timeline-block">
                    <div class="marker"></div>
                    <div class="timeline-content">
                       <p>Convert by answering buyer questions, giving demos, and closing sales in real time</p>
                    </div>
                 </div>
                 <div class="timeline-block">
                    <div class="marker m3"></div>
                    <div class="timeline-content">
                       <p>Empower their apps with cutting edge features and capabilities powered by AI</p>
                    </div>
                 </div>
            </div>-->
            <div class="row meb-wrap">
                <div class="col-md-6">
                    <div class="meb-card">
                        <div class="meb-img"><img src="assets/img/png/meb1.png" alt="" /></div>
                        <div class="meb-content">
                            <p>Connect with customers by adding video, call and chat directly on their app.</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="meb-card">
                        <div class="meb-img"><img src="assets/img/png/meb2.png" alt="" /></div>
                        <div class="meb-content">
                            <p>Engage with audiences through livestreaming, push notifications, instant messaging, and
                                video calls.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="meb-card">
                        <div class="meb-img"><img src="assets/img/png/meb3.png" alt="" /></div>
                        <div class="meb-content">
                            <p>Empower their apps with cutting edge features and capabilities powered by AI</p>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="meb-card">
                        <div class="meb-img"><img src="assets/img/png/meb4.png" alt="" /></div>
                        <div class="meb-content">
                            <p>Convert by answering buyer questions, giving demos, and closing sales in real time</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3>So what are you waiting for?<br />
                Contact us today and let us show you how easy it is to do all these things.</h3>
            <div class="text-center meb-btnlist"><a href="Sign-up.php" class="qbtn qbtn-orange radius-50">Start Free
                    Trial</a></div>
        </div>
    </section>
    <!--<section class="career-section" data-aos="flip-up" data-aos-offset="350">
        <div class="container">
            <div class="career-entry">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="career-ctxt">
                            <h1>Careers at Qmera</h1>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto .</p>
                            <a href="#" class="qbtn qbtn-plain">Join Qmera</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="career-mdf">
                            <div class="career-img"><img src="assets/img/jpg/careerbg.jpg" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--<section class="executive-section">
        <div class="container">
            <div class="executive-mlist">
            <div class="executive-m1">
            <div class="row executive-list">
                <div class="col-lg-4" data-aos="fade-down" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive1.png" alt="" /></div>
                        <h1>Quis Autem</h1>
                        <p>Vero eos et, accusamus et ius</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive2.png" alt="" /></div>
                        <h1>Harum Quidem</h1>
                        <p>Eo dolors et, accusamus </p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-down" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive3.png" alt="" /></div>
                        <h1>Temporibus Autem</h1>
                        <p>Blanditiis, praesentium</p>
                    </div>
                </div>
            </div>
            </div>
            <div class="executive-m2">
            <h1 class="headtxt" data-aos="zoom-in-up" data-aos-offset="200">Executive Team</h1>
            <p class="subtxt" data-aos="zoom-in-up" data-aos-offset="200">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
            </div>
            <div class="executive-m3">
            <div class="row executive-list alter">
                <div class="col-lg-4" data-aos="fade-up" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive4.png" alt="" /></div>
                        <h1>Et Harum Quidem</h1>
                        <p>Eos et, accusamus et ius</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-down" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive5.png" alt="" /></div>
                        <h1>Nam Tempore</h1>
                        <p>Dolors et, accusamus </p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-offset="350">
                    <div class="executive-wrap">
                        <div class="executive-img"><img src="assets/img/png/executive/executive6.png" alt="" /></div>
                        <h1>Libero Qutem</h1>
                        <p>Quis autem vel </p>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>-->


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
    <script src="assets/vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script src="assets/js/geoloc.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/geoloc.php'); ?>
</body>

</html>