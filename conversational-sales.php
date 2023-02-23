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
    <title>Qmera - Products | Conversational Sales</title>
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
                    <li class="dropdown"><a href="#" rel="noopener" class="nav-link active" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
                        <ul>
                            <li><a href="conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a></li>
                            <li><a href="conversational-sales.php" rel="noopener" aria-label="Conversational Sales" class="active">Conversational Sales</a></li>
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
                <div class="col-lg-5 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <h1>Conversational Sales</h1>
                    <p>Connect with buyers, answer questions, give demos, and close sales in real time.</p>
                    <div class="productbanner-btnlist">
                        <div class="text-center text-lg-start">
                            <a href="contact.php" class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Talk to our Expert</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-1">
                    <div class="productbanner-imgwrap pbcs">
                        <ul class="pbcs-listicon">
                            <li><img src="assets/img/svg/products/cs/bannericon1.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/cs/bannericon2.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/cs/bannericon3.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/cs/bannericon4.svg" alt="" /></li>
                            <li><img src="assets/img/svg/products/cs/bannericon5.svg" alt="" /></li>
                        </ul>
                        <img src="assets/img/webp/product-cs.webp" class="pbcs-img" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pce-section">
        <div class="container">
            <p class="pce-subtitle" data-aos="zoom-in-up" data-aos-offset="350">Your prospect’s time is precious and
                their attention is fleeting — so why drive them to some boring old form when you can converse with them
                right there on your app?</p>
            <div class="row gx-5 pce-mainlist">
                <div class="col-lg-6" data-aos="fade-up" data-aos-offset="350">
                    <div class="pce-mlimg"><img src="assets/img/png/cs-product1.png" alt="" /></div>
                    <div>
                        <p class="pce-mltitle">Close sales when customers are<br />ready to buy</p>
                        <p>Skip the forms, follow ups, and appointments and enable your sales team to close the sale
                            when customers are ready to buy — in real time, right there on your app.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-down" data-aos-offset="350">
                    <div class="pce-mlimg"><img src="assets/img/png/cs-product2.png" alt="" /></div>
                    <div>
                        <p class="pce-mltitle">Qualify leads to increase your pipeline</p>
                        <p>Use personalized content, videos, and demos to convert prospects and qualify leads so your
                            sales team can continue the conversation via chat, voice call, or video call.</p>
                    </div>
                </div>
            </div>
            <!-- <h1 class="pce-subtitle qce-title pt-4" data-aos="zoom-in-down" data-aos-offset="250">Qmera’s Conversational
                Sales<br />Toolkit includes:</h1>
            <div class="row pce-listing" data-aos="fade-up" data-aos-offset="350">
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/cs/cs1.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Screen Sharing</p>
                                <p>Enhance your demos and training, or guide your customers by allowing them to view
                                    your screen from theirs in real-time.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/cs/cs2.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Whiteboarding</p>
                                <p>Facilitate communication by allowing you to write and sketch on a shared whiteboard
                                    scape.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce1.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Audio Calls</p>
                                <p>Never lose customers again due to bad audio quality. Get crystal clear audio calls
                                    even with low bandwidth.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce2.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Video Calls</p>
                                <p>Provide personalized, face-to-face interactions with video calls.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce3.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Video Conference Calls</p>
                                <p>Provide users with a high-quality real time group audio interaction with up to 16
                                    participants.</p>
                            </div>
                        </li>
                    </ul> -->
                <!-- </div> -->
                <!-- <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce4.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Live Streaming</p>
                                <p>Engage and maintain an open relationship with your audiences via high-quality live
                                    streaming with low bandwidth and latency.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce5.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Targeted Streaming</p>
                                <p>Set your live streaming sessions to be viewable only by the relevant customer
                                    segment.</p>
                            </div>
                        </li>
                    </ul>
                </div> -->
                <!-- <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce6.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Comments</p>
                                <p>Increase interaction by getting comments, likes, responses, and feedback from your
                                    audience. </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce7.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Emojis</p>
                                <p>Provide various emojis so your audiences can express their reactions to your live
                                    video streaming.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce8.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Stickers</p>
                                <p>Provide stickers to cater to your customer’s every mood.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce9.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Instant Messaging</p>
                                <p>Easily implement various IM features in your apps such as topic groups, chat rooms,
                                    media attachments, secret messages, self-destructing messages, acknowledgements, and
                                    many more.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce10.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Omni-channel Communication</p>
                                <p>Receive or send messages using any kind of channel — including e-mail, voice mail,
                                    video messages, and chat — all within a single interface.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce11.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Attachments</p>
                                <p>Send various media attachments via the chat for simpler and hassle-free
                                    communication.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> -->
            <!-- Various Message Modes -->
            <!-- <h1 class="pce-subtitle qce-title pt-4" data-aos="zoom-in-down" data-aos-offset="250">Various Message Modes
            </h1>
            <div class="row pce-listing" data-aos="fade-up" data-aos-offset="350">
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce12.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Confirmation Message</p>
                                <p>Have your sent messages manually acknowledged by the receiver to ensure the recipient
                                    actually read the messages you sent.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce13.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Anonymous Message</p>
                                <p>Send your messages anonymously.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>
                            <div><img src="assets/img/svg/products/ce/ce14.svg" alt=""></div>
                            <div>
                                <p class="pce-title">Confidential Message</p>
                                <p>Set a timer for certain files and messages to self-destruct after they have been
                                    read.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </section> -->
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
                                <input type="text" class="form-control" name="emailtrial" placeholder="Email Address" aria-label="Email Address" aria-describedby="start-trial">
                                <div class="input-group-append">
                                    <span class="trial-preload"></span><button class="qbtn qbtn-orange starttrial" type="submit">Start Free Trial</button>
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
</body>

</html>