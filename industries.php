<?php

// include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php');
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php');

$timeSec = 'v=' . time();

$version = 'v=1.68';

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 3;
include($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Industries</title>
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
                    <li><a class="nav-link active" href="industries.php" rel="noopener"
                            aria-label="Industries">Industries</a></li>
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
                <div
                    class="col-lg-5 order-lg-1 order-2 d-inline-flex flex-column justify-content-center align-self-center">
                    <h1>Qmera for Every Industry</h1>
                    <p>Deliver the rich, engaging experience that customers have come to expect from every business</p>
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
                    <div class="productbanner-imgwrap pbcs nobg">
                        <ul class="indt-listicon">
                            <li><img src="assets/img/svg/industries/indt-bannericon1.svg" alt="" /><span>Retail &amp;
                                    Ecommerce</span></li>
                            <li><img src="assets/img/svg/industries/indt-bannericon2.svg" alt="" /><span>Financial
                                    Institutions</span></li>
                            <li><img src="assets/img/svg/industries/indt-bannericon3.svg"
                                    alt="" /><span>Hospitality</span></li>
                            <li><img src="assets/img/svg/industries/indt-bannericon4.svg"
                                    alt="" /><span>Healthcare</span></li>
                            <li><img src="assets/img/svg/industries/indt-bannericon5.svg" alt="" /><span>Real
                                    Estate</span></li>
                            <li><img src="assets/img/svg/industries/indt-bannericon6.svg"
                                    alt="" /><span>Education</span></li>
                        </ul>
                        <img src="assets/img/webp/industriesbg.webp" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="industries-section">
        <div class="container">
            <div class="industries-entry">
                <p>Today’s customers expect the same excellent experience no matter what channel they use, and no matter
                    what business they are dealing with.</p>
                <p>It doesn’t matter if they are opening a bank account, shopping for clothes, exploring vacation
                    options, or looking for a healthcare provider — they want personalized attention, genuinely helpful
                    content, and all-in-one convenience.</p>
                <p>Qmera can help you deliver all of these — without the customer ever having to leave your app.</p>
            </div>
            <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Financial Institutions</h1>
                <p data-aos="zoom-in-up" data-aos-offset="150" class="indt-subtitle">Make doing business with you
                    faster, simpler, and easier</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">Onboard new clients right there on your app, answer their
                    questions, speed up claims processing, and enable anywhere-convenience — quickly and securely.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6">
                        <div class="indt-img" data-aos="fade-up-right" data-aos-offset="350"><img
                                src="assets/img/png/industries1.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up-left" data-aos-offset="350">
                        <ul>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon1.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Open Accounts Anywhere</p>
                                    <p>Easily acquire new customers by allowing them to open an account from their
                                        mobile phones. Customers can start video calls and show the required documents
                                        to the teller without having to go to the bank.</p>
                                </div>
                            </li>
                            <!-- <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon2.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Nonstop Customer Support</p>
                                    <p>Provide nonstop and instant customer service with an automated chatbot that
                                        understands each customer's needs.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon3.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Live Customer Engagement</p>
                                    <p>Easily inform customers about new policies or products through live streaming.
                                        Customers can have live interactions with the streamer via instant messaging.
                                    </p>
                                </div>
                            </li> -->
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon4.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Faster and Easier Claims</p>
                                    <p>Give your customers fast and easy ways to handle damage claims and make it
                                        possible to settle their claim via a video call. The review and the damage
                                        claims can be easily documented through video calls.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Retail & Ecommerce</h1>
                <p data-aos="zoom-in-up" data-aos-offset="150" class="indt-subtitle">Engage and delight to turn casual
                    visitors into loyal customers</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">Turn even casual visitors into loyal customers by
                    engaging them with rich, personalized content — from helping out with product suggestions, answering
                    questions, all the way to checkout and beyond.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6" data-aos="fade-up-left" data-aos-offset="350">
                        <div class="indt-img"><img src="assets/img/png/industries2.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up-right" data-aos-offset="350">
                        <ul>
                            <!-- <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon5.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Live Commerce</p>
                                    <p>Provide your customers with a new and exciting shopping experience. Livestream
                                        interactively where the sellers and the buyers can haggle and make a purchase.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon6.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Smart Search Bot</p>
                                    <p>Help your customers find the product they need. Users only need to type one word
                                        and the Bot will offer several related products.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon7.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Nonstop Customer Support</p>
                                    <p>Provide non-stop and instant customer service with an automated chatbot that
                                        understands each customer's needs.</p>
                                </div>
                            </li> -->
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon8.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Product Discussion</p>
                                    <p>Let your customers effortlessly ask and acquire information about the desired
                                        product by using VoIP, video call, and/or chat.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Education</h1>
                <p data-aos="zoom-in-up" data-aos-offset="150" class="indt-subtitle">Provide rich, multimedia learning
                    tools for learners, educators, and administrators</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">Give your students, educators, and administrators the
                    tools they need to make learning a truly enriching, engaging, and rewarding experience.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6">
                        <div class="indt-img" data-aos="fade-right" data-aos-offset="350"><img
                                src="assets/img/png/industries3.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up-left" data-aos-offset="350">
                        <ul>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon9.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Live Teaching</p>
                                    <p>Teach live classes from anywhere around the world. Educators can provide live
                                        interactive classes that allow students to discuss, ask, and present wherever
                                        they are.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon10.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">One to One Communication</p>
                                    <p>Members can communicate with other members or educators in real-time to ask or
                                        discuss class materials using VoIP, video call, or chat features.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon11.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Video Call Group Discussion</p>
                                    <p>Students and educators can easily discuss study materials in group video calls
                                        equipped with screen sharing and whiteboards to ensure difficult concepts are
                                        communicated effectively.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->

            <!-- <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Healthcare</h1>
                <p class="indt-subtitle" data-aos="zoom-in-up" data-aos-offset="150">Deliver personal, always-available
                    support wherever your customers may be</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">Stay responsive and connected to your customers needs by
                    giving them personalized 24/7 support regardless of their device or location.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6" data-aos="fade-left" data-aos-offset="350">
                        <div class="indt-img"><img src="assets/img/png/industries4.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-offset="350">
                        <ul>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon12.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Real-time Consultation</p>
                                    <p>Connect with your patients from anywhere in real time. VoIP/Video calls and IMs
                                        enable you to communicate instantly with your patients.</p>
                                </div>
                            </li>
                            <!-- <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon13.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Smart Search Bot</p>
                                    <p>Help your customers find the product they need. Users only need to type one word
                                        and the bot will offer several related products.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon14.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Live Coaching</p>
                                    <p>Provide healthcare workers with the tools to conduct health training or coaching
                                        sessions for their patients through live streaming. Viewers can interact with
                                        the streamer via the chat features available during the livestream.</p>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div> -->

            <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Hospitality</h1>
                <p class="indt-subtitle" data-aos="zoom-in-up" data-aos-offset="150">Give your guests the personalized,
                    extraordinary experiences they desire</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">In the hospitality industry, customer service is king.
                    Every interaction has the power to boost customer experience, reviews, and referrals. Give your
                    guests responsive and personalized experiences that go beyond their expectations and watch your
                    business reap the benefits.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-offset="350">
                        <div class="indt-img"><img src="assets/img/png/industries5.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-offset="350">
                        <ul>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon15.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Integrated Booking</p>
                                    <p>Keep all calls and communication within the app, discouraging users from
                                        arranging bookings outside the booking system, which are often significant
                                        sources of revenue leak.</p>
                                </div>
                            </li>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon16.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">White-glove Service</p>
                                    <p>Pay attention to details when serving your customers. Automatically alert
                                        customers to gate or room changes. Use in-app messaging and calling features to
                                        help customers reorganize their itinerary should there be unexpected issues on
                                        your end. Grant your customers the power to send inquiries and questions to
                                        their agents or hotel management and stay on top of their reservations and
                                        itineraries.</p>
                                </div>
                            </li>
                            <!-- <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon17.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Nonstop Customer Support</p>
                                    <p>Provide nonstop and instant customer service in different ways; via VoIPs, video
                                        calls, chats, or even an automated chatbot that understands each customer's
                                        needs.</p>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="industries-widget">
                <h1 data-aos="zoom-in-up" data-aos-offset="150">Qmera for Real Estate</h1>
                <p class="indt-subtitle" data-aos="zoom-in-up" data-aos-offset="150">Close more sales using rich tools
                    to captivate buyers and enable your agents</p>
                <p data-aos="zoom-in-up" data-aos-offset="150">Whether on the field or on their devices, deliver a rich
                    and unified experience for your customers and agents to improve their experience so you can close
                    more sales and increase turnover.</p>

                <div class="row industries-listing gx-5">
                    <div class="col-lg-6" data-aos="fade-up-right" data-aos-offset="350">
                        <div class="indt-img"><img src="assets/img/png/industries6.png" alt=""></div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up-left" data-aos-offset="350">
                        <ul>
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon18.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Real Time Engagement</p>
                                    <p>Provide your customers with new and exciting experiences. In-app messaging
                                        further simplifies the process for potential buyers by connecting clients
                                        directly to real estate agents in real time.</p>
                                </div>
                            </li>
                            <!-- <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon19.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Smart Search Bot</p>
                                    <p>Help your customers find the product they need. Users only need to type one word
                                        and the Bot will offer several related products.</p>
                                </div>
                            </li> -->
                            <li>
                                <div><img src="assets/img/svg/industries/indt-widgeticon20.svg" alt=""></div>
                                <div>
                                    <p class="pce-title">Virtual Home Tours</p>
                                    <p>Enable real estate agents to guide prospective buyers using livestreaming or
                                        static videos hosted on online platforms. Attending from a screen is easier than
                                        making time for an in-person visit, which opens the property to a broader
                                        selection of visitors.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="industries-sub-section">
        <div class="container">
            <h1 data-aos="zoom-in-up" data-aos-offset="350">Take your business to the next level using <br />Qmera’s
                smart conversational toolkits:</h1>
            <div class="row gx-5 pt-5">
                <div class="col-lg-6" data-aos="fade-down-right" data-aos-offset="200">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/png/industries-conv-toolkit1.png" alt=""></div>
                            <div>
                                <p class="card-txttitle">Conversational Engagement</p>
                                <p class="card-text">Increase conversion rates by captivating your customers with
                                    personalized content.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="conversational-engagement.php"
                                class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up-right" data-aos-offset="200">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/png/industries-conv-toolkit2.png" alt=""></div>
                            <div>
                                <p class="card-txttitle">Conversational Sales</p>
                                <p class="card-text">Connect with buyers, answer questions, give demos, and close sales
                                    in real time.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="conversational-sales.php"
                                class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4" data-aos="fade-down-left" data-aos-offset="200">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-img"><img src="assets/img/png/industries-conv-toolkit3.png" alt=""></div>
                            <div>
                                <p class="card-txttitle">Smartbots and AI</p>
                                <p class="card-text">Empower your apps with cutting edge features and capabilities
                                    powered by AI.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="smartbots-and-ai.php"
                                class="qbtn qbtn-orange d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Learn More</span>
                            </a>
                        </div>
                    </div>
                </div> -->
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