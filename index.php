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
// include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

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
    <script src="https://qmera.io/qmera_button/embeddedbutton.js?v=1.230" defer=""></script>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
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
                            <!-- <li><a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots
                                    and A.I</a></li> -->
                        </ul>
                    </li>
                    <li><a class="nav-link" href="industries.php" rel="noopener" aria-label="Industries">Industries</a>
                    </li>
                    <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Pricing</span> <i class="qmera-ddicon"></i></a>
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
    <section id="hero" class="hero carousel carousel-dark slide vertical" data-bs-ride="carousel">
        <div class="container">
            <!-- <div class="bg-hero"></div>-->
            <div class="bg-hero2 bgitem1 active" style="background:url('assets/img/jpg/bghero.jpg') no-repeat;"></div>
            <div class="bg-hero2 bgitem2" style="background:url('assets/img/jpg/bghero2.jpg') no-repeat;"></div>
            <div class="bg-hero2 bgitem3" style="background:url('assets/img/jpg/bghero3.jpg') no-repeat;"></div>

            <div class="carousel-inner">
                <!-- item 1 -->
                <!-- <div class="carousel-item active" data-bs-interval="8000" data-bs-pause="hover">

                    <div class="row bg-herocontent">
                        <div class="col-lg-7 d-flex flex-column">
                            <div class="text-animation">
                                <h1>In-app engagement. Easy-peasy.</h1>
                                <p>Embed live chat, video streaming, or screen-sharing to engage with your customers in
                                    real-time.</p>
                                <div class="hero-btnlist">
                                    <div class="text-center text-lg-start">
                                        <a href="conversational-engagement.php" rel="noopener" aria-label="Learn More"
                                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Learn More</span>
                                        </a>
                                        <a href="contact.php" rel="noopener" aria-label="Talk to our Expert"
                                            class="qbtn qbtn-purple d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Talk to our Expert</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- item 2 -->
                <div class="carousel-item active" data-bs-interval="8000" data-bs-pause="hover">

                    <div class="row bg-herocontent">
                        <div class="col-lg-7 d-flex flex-column">
                            <div class="text-animation">
                                <h1>Close sales where customers shop.</h1>
                                <p>With Qmera, your online teams can engage with shoppers in real-time, answer
                                    questions, recommend products, and close sales in real-time.</p>
                                <div class="hero-btnlist">
                                    <div class="text-center text-lg-start">
                                        <a href="conversational-sales.php" rel="noopener" aria-label="Learn More"
                                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Learn More</span>
                                        </a>
                                        <a href="contact.php" rel="noopener" aria-label="Talk to our Expert"
                                            class="qbtn qbtn-purple d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Talk to our Expert</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- item 3 -->
                <div class="carousel-item" data-bs-interval="8000" data-bs-pause="hover">
                    <div class="row bg-herocontent">
                        <div class="col-lg-7 d-flex flex-column">
                            <div class="text-animation">
                                <h1>No-hold Customer Support.</h1>
                                <p>Take customers off long hold queues, and resolve issues in real-time.</p>
                                <div class="hero-btnlist">
                                    <div class="text-center text-lg-start">
                                        <a href="smartbots-and-ai.php" rel="noopener" aria-label="Learn More"
                                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Learn More</span>
                                        </a>
                                        <a href="contact.php" rel="noopener" aria-label="Talk to our Expert"
                                            class="qbtn qbtn-purple d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Talk to our Expert</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators">
                <!-- <button type="button" data-bs-target="#hero" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button> -->
                <button type="button" data-bs-target="#hero" data-bs-slide-to="0" class="active" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero" data-bs-slide-to="1" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>
    <section class="homewidget-section">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6">
                    <div class="homewidget-bg">
                        <span data-aos="fade-up" data-aos-offset="200"><img src="assets/img/webp/widget-woman.webp"
                                alt="" /></span>
                        <div class="soundwave-wrap" data-aos="fade-down" data-aos-offset="200">
                            <div class="soundwave">
                                <div class='sound-icon'>
                                    <div class='sound-wave'>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                        <i class='bar'></i> <i class='bar'></i> <i class='bar'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li data-aos="fade-left" data-aos-offset="100"><img src="assets/img/svg/widget/widget1.svg"
                                    alt="" /></li>
                            <li data-aos="fade-up" data-aos-offset="200"><img src="assets/img/svg/widget/widget2.svg"
                                    alt="" /></li>
                            <li data-aos="fade-down" data-aos-offset="300"><img src="assets/img/svg/widget/widget3.svg"
                                    alt="" /></li>
                            <li data-aos="fade-right" data-aos-offset="300"><img src="assets/img/svg/widget/widget4.svg"
                                    alt="" /></li>
                            <li data-aos="fade-down-left" data-aos-offset="300"><img
                                    src="assets/img/svg/widget/widget5.svg" alt="" /></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center align-self-center" data-aos="fade-left"
                    data-aos-offset="200">
                    <h1><span class="bt-title">The</span> Easiest Customer<br />
                        Engagement. <span>Ever</span>.</h1>
                    <p>Easy to connect with your customers by adding video, call<br />and chat to your app.</p>
                    <div class="widget-btnlist">
                        <div class="text-center text-lg-start">
                            <a href="#exploreproducts" rel="noopener" aria-label="Explore our products"
                                class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Explore our products</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="homeproduct-section" id="exploreproducts">
        <div class="container">
            <h1 data-aos="zoom-in-up" data-aos-offset="150">Products</h1>
            <p data-aos="zoom-in-up" data-aos-offset="150">Embed Contact Center into your mobile app within minutes.</p>
            <!-- <p data-aos="zoom-in-up" data-aos-offset="150">Embed Contact Center, Livestreaming, Push Notifications,
            Instant Messaging, Video and VoIP Calls into your mobile app within minutes.</p> -->
            <!-- Customer Engagement -->

            <div class="row qproductlist">
                <div class="col-lg-7" data-aos="fade-left" data-aos-offset="400">
                    <div class="qproduct-img"><img src="assets/img/png/home-product1.png" alt="" /></div>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center align-self-center" data-aos="fade-up"
                    data-aos-offset="100">
                    <div class="qproduct-description">
                        <h1>Conversational Engagement</h1>
                        <p>Increase conversion rates by captivating your customers with personalized content.</p>
                        <a href="conversational-engagement.php" rel="noopener" aria-label="Learn More"
                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row qproductlist alter">
                <div class="col-lg-5 d-flex flex-column justify-content-center align-self-center order-2 order-lg-1"
                    data-aos="fade-up" data-aos-offset="100">
                    <div class="qproduct-description">
                        <h1>Conversational Sales</h1>
                        <p>Connect with buyers, answer questions, give demos, and close sales in real time.</p>
                        <a href="conversational-sales.php" rel="noopener" aria-label="Learn More"
                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-2" data-aos="fade-right" data-aos-offset="400">
                    <div class="qproduct-img"><img src="assets/img/png/home-product2.png" alt="" /></div>
                </div>
            </div>

            <!-- <div class="row qproductlist">
                <div class="col-lg-7" data-aos="fade-left" data-aos-offset="400">
                    <div class="qproduct-img"><img src="assets/img/png/home-product3.png" alt="" /></div>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center align-self-center" data-aos="fade-up"
                    data-aos-offset="100">
                    <div class="qproduct-description">
                        <h1>Smartbots and AI </h1>
                        <p>Empower your apps with cutting edge features and capabilities powered by AI.</p>
                        <a href="smartbots-and-ai.php" rel="noopener" aria-label="Learn More"
                            class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>
            </div> -->

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