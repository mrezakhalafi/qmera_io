<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 2;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Products | Smartbots and A.I</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.213" defer=""></script>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/styles.min.css" rel="stylesheet" />
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
                    <li class="dropdown"><a href="#" rel="noopener" class="nav-link active"
                            aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
                        <ul>
                            <li><a href="conversational-engagement.php" rel="noopener"
                                    aria-label="Conversational Engagement">Conversational Engagement</a></li>
                            <li><a href="conversational-sales.php" rel="noopener"
                                    aria-label="Conversational Sales">Conversational Sales</a></li>
                            <li><a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I"
                                    class="active">Smartbots and A.I</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="industries.php" rel="noopener" aria-label="Industries">Industries</a>
                    </li>
                    <!--<li><a href="resources.php" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
                    <li><a href="blog.php" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
                    <li><a href="/pages/developers.php">Developers</a></li>
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
    <section class="productbanner-section">
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-5 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <h1>Smartbots and A.I</h1>
                    <p>Empower your apps with cutting edge features and capabilities powered by A.I.</p>
                    <div class="productbanner-btnlist">
                        <div class="text-center text-lg-start">
                            <a href="contact.php"
                                class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Talk to our Expert</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="productbanner-imgwrap pbcs">
                        <ul class="pbsb-listicon">
                            <li><img src="assets/img/svg/products/sb/sbannericon1.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/sb/sbannericon2.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/sb/sbannericon3.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/sb/sbannericon4.svg" alt="" /></li>
                        </ul>
                        <img src="assets/img/webp/product-sb.webp" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pce-section">
        <div class="container">
            <p class="pce-subtitle" data-aos="zoom-in-up" data-aos-offset="350">Advancements in Artificial Intelligence
                are making previously unimaginable features possible — which when used properly, can lead to greater
                efficiency, increased market reach, and higher revenue for your business.</p>
            <div class="row gx-5 pce-mainlist">
                <div class="col-lg-6" data-aos="fade-up-right" data-aos-offset="350">
                    <div class="pce-mlimg"><img src="assets/img/png/smartbots-product1.png" alt="" /></div>
                    <div>
                        <p class="pce-mltitle">Say goodbye to repetitive, low value tasks by enabling customer
                            self-service</p>
                        <p>Qmera’s Smartbots & A.I Accelerators use Machine learning to identify and automate the
                            resolution of common or repetitive tasks — so your customers get the help every time.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up-left" data-aos-offset="350">
                    <div class="pce-mlimg"><img src="assets/img/png/smartbots-product2.png" alt="" /></div>
                    <div>
                        <p class="pce-mltitle">Save your best for when customers really need you</p>
                        <p>Quickly identify when customers need a personal touch — so you can save time and your best
                            people for when they are really needed.</p>
                    </div>
                </div>
            </div>
            <h1 class="pce-subtitle qce-title pt-4" data-aos="zoom-in-down" data-aos-offset="150">Qmera’s Smartbots and
                A.I <br />Accelerators include:</h1>
            <div class="row pce-listing" data-aos="fade-up" data-aos-offset="350">
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon1.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Smart Chatbots</p>
                                <p>Qmera chatbots are always learning about the needs of your customers to provide
                                    better responses to their queries. </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon2.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Voice Command</p>
                                <p>Control your device with spoken commands.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon3.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Expression Detection</p>
                                <p>Enhance human-computer interaction by reading and understanding people’s expressions.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon4.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Real-Time Deepfake</p>
                                <p>Change your face to someone else’s in real-time video calls.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon5.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Internet Crawler / Web Scraper</p>
                                <p>Systematically learns the required web page, so that the information can be retrieved
                                    when needed.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon6.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Text Categorization & Classification</p>
                                <p>Automatically structures and analyzes text quickly and cost effectively to automate
                                    processes and enhance data-driven decisions.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon7.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Text Summarization</p>
                                <p>Shortens long texts to create a coherent and brief summary.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon8.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Translate</p>
                                <p>Automatically translates foreign language text. </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon9.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Crowd Counting</p>
                                <p>Do instant headcounts in any crowd.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/sb/sb-icon10.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Image Classification</p>
                                <p>Analyze and automatically classify an image according to its visual content.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

    </section>
    <section class="homesignup-section mb-4">
        <div class="container">
            <div class="signupbanner row">
                <div class="col-lg-4">
                    <div class="signupbanner-img" data-aos="flip-right" data-aos-offset="350">
                        <img src="assets/img/png/explore-img1.png" alt="" />
                    </div>
                </div>
                <div class="col-lg-8">
                    <h1>Explore Qmera for FREE</h1>
                    <div class="qmera-trialresponse d-none"></div>
                    <div class="signup-btnlist">
                    <form action="/Sign-up" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control" name="emailtrial" placeholder="Email Address"
                                    aria-label="Email Address" aria-describedby="start-trial">
                                <div class="input-group-append">
                                    <span class="trial-preload"></span><button class="qbtn qbtn-orange starttrial"
                                        type="submit">Start Free Trial</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<section class="homeresources-section">
        <div class="container">
            <h1 data-aos="zoom-in-up" data-aos-offset="200">Resources</h1>
            <div class="row gx-5 resources-list">
                <div class="col-lg-4" data-aos="fade-down" data-aos-offset="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/jpg/resources/resources1.jpg" alt="" /></div>
                            <div><p class="card-text">Sed ut perspiciatis unde omnis iste natusperspiciatis unde.</p></div>
                          </div>
                          <div class="card-footer">
                            <a href="#" rel="noopener noreferrer" aria-label="Read More">Read More</a>
                          </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-offset="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/jpg/resources/resources2.jpg" alt="" /></div>
                            <div><p class="card-text">Sed ut perspiciatis unde omnis iste natusperspiciatis unde.</p></div>
                          </div>
                          <div class="card-footer">
                            <a href="#" rel="noopener noreferrer" aria-label="Read More">Read More</a>
                          </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-down" data-aos-offset="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/jpg/resources/resources3.jpg" alt="" /></div>
                            <div><p class="card-text">Sed ut perspiciatis unde omnis iste natusperspiciatis unde.</p></div>
                          </div>
                          <div class="card-footer">
                            <a href="#" rel="noopener noreferrer" aria-label="Read More">Read More</a>
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
                            <a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots and
                                A.I</a>
                        </div>
                    </li>
                    <li><a href="industries.php" rel="noopener" aria-label="Industries">Industries</a></li>
                    <li><a href="blog.php" rel="noopener" aria-label="Blog">Blog</a></li>
                    <!--<li><a href="resources.php" rel="noopener" aria-label="Resources">Resources</a></li>-->
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