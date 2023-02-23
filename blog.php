<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 6;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Blog</title>
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
                    <li><a href="blog.php" class="nav-link active" rel="noopener" aria-label="Blog">Blog</a></li>
                    <li><a href="/pages/developers.php">Developers</a></li>
                    <li><a href="company.php" class="nav-link" rel="noopener" aria-label="Company">Company</a>
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
    <section class="generic-section blog">
        <div class="container">
            <div class="row company-banner">
                <div
                    class="col-lg-12 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <h1>Blog</h1>
                    <p>Get the latest scoop on sales, marketing, and technology trends that can impact the way you do
                        business.</p>

                </div>
            </div>


            <div class="row equal-cols blog-wrap gx-5">
                <div class="col-md-4">
                    <div class="blog-card card">
                        <div class="card-body">
                            <div class="blog-img"><img src="assets/img/blog/blog1_lg.png" alt="" /></div>
                            <div class="blog-content">
                                <h5>How Better Conversation Leads to Better Conversion</h5>
                                <p>We live in an always-on world where an answer is just a click away.</p>
                            </div>
                        </div>
                        <div class="card-footer"><a href="blog-inside.php" class="readmore-btn">Read More</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-card card">
                        <div class="card-body">
                            <div class="blog-img"><img src="assets/img/blog/blog2_lg.png" alt="" /></div>
                            <div class="blog-content">
                                <h5>What Is Conversational Engagement?</h5>
                                <p>Let’s jump right in. Conversational engagement refers to how brands connect with
                                    customers via messaging channels.</p>
                            </div>
                        </div>
                        <div class="card-footer"><a href="blog-inside.php" class="readmore-btn">Read More</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-card card">
                        <div class="card-body">
                            <div class="blog-img"><img src="assets/img/blog/blog3_lg.png" alt="" /></div>
                            <div class="blog-content">
                                <h5>How To Close Sales When Customers Are Ready To Buy</h5>
                                <p>According to Think with Google, more than half of shoppers do research first before
                                    buying a product to ensure they make “the best possible choice.”</p>
                            </div>
                        </div>
                        <div class="card-footer"><a href="blog-inside.php" class="readmore-btn">Read More</a></div>
                    </div>
                </div>

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