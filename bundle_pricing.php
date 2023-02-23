<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Pricing | Conversational Engagement</title>
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
        h1 {
            font-size: 35px;
            font-style: normal;
            font-weight: 600;
            line-height: 53px;
            margin: 0;
            padding: 10px 0px;
            margin-top: 10px;
            color: #6945A5;
        }

        .button_buy{
            background-color: #6945A5;
            border: 1px solid #6945A5;
            border-radius: 20px;
            padding: 5px;
            color: #FFFFFF;
            width: 100%;
            height: 40px;
        }

        .button_question{
            background-color: #FFA03E;
            border: 1px solid #FFA03E;
            border-radius: 20px;
            padding: 5px;
            color: #FFFFFF;
            width: 100%;
            height: 40px;
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

        .tooltip-inner{
            max-width: 200px;
            padding: 0.25rem 0.5rem;
            color: #333333;
            text-align: center;
            background-color: #ffffff;
            border-radius: 0.25rem;
            border: 1px solid #c5c5c5;
            box-shadow: 0px 0px 5px #666666;
            font-family: "Poppins", sans-serif;
        }

        .bs-tooltip-end .tooltip-arrow::before{
            border-right-color: #c5c5c5;
        }

        .bs-tooltip-top .tooltip-arrow::before{
            border-top-color: #c5c5c5;
        }

        .bs-tooltip-start .tooltip-arrow::before{
            border-left-color: #c5c5c5;
        }

        .bs-tooltip-bottom .tooltip-arrow::before{
            border-bottom-color: #c5c5c5;
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
                    <li class="dropdown"><a href="#" rel="noopener" class="nav-link" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
                        <ul>
                            <li><a href="conversational-engagement.php" rel="noopener" aria-label="Conversational Engagement" class="active">Conversational Engagement</a>
                            </li>
                            <li><a href="conversational-sales.php" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="industries.php" rel="noopener" aria-label="Industries">Industries</a>
                    </li>
                    <!--<li><a href="resources.php" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
                    <li class="dropdown"><a href="#" rel="noopener" class="nav-link active" aria-label="Products"><span>Pricing</span> <i class="qmera-ddicon"></i></a>
                        <ul>
                            <li>
                                <a href="pricing_products.php" rel="noopener" aria-label="Smartbots and A.I">Product Pricing</a>
                            </li>
                            <li>
                                <a href="pricing_calculator.php" rel="noopener" aria-label="Conversational Sales">Pricing Calculator</a>
                            </li>
                            <li>
                                <a href="bundle_pricing.php" rel="noopener" aria-label="Conversational Engagement" class="active">Plans For Everyone</a>
                            </li>
                        </ul>
                    </li>
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
    <section class="plan-section">
        <div class="row mt-5 pt-5">
            <div class="col-12 text-center">
                <h1>Plans For Everyone</h1>
                <h5>CHOOSE THE PERFECT PLAN FOR YOUR BUSINESS</h5>
            </div>
            <div class="row">
                <div class="col-2 col-md-2 col-lg-3">
                    <!-- Empty -->
                </div>
                <div class="col-10 col-md-10 col-lg-6 m-5 m-lg-3">
                    <div class="pricing-bundle-active mt-5 shadow" style="border: 2px solid #6945A5; padding: 40px; border-radius: 0px 40px 0px 40px">
                        <div class="bundle-top" style="margin-bottom: 20px">
                            <span style="font-size: 22px; margin-right: 20px">Standard</span><span style="background-color: #6945A5; font-size: 12px; color: #FFFFFF; padding: 6px; padding-left: 15px; padding-right: 15px; border-radius: 20px">Popular</span>
                        </div>
                        <h2><span style="font-size: 17px; color: #66616C; margin-top: 10px; margin-right: 10px; position: absolute">$</span><span style="font-size: 52px; margin-left: 20px">49.5</span><span style="font-size: 20px; padding-left: 10px">/month</span></h2>
                        <div class="section-desc" style="border-top: 1px solid #bab6bf; padding-top: 40px; font-size: 14px">
                                <h6>Costumer Engagement features on your app</h6>
                                <ul>
                                    <li>Push Notification</li>
                                    <li>Mobile Contact Center</li>
                                </ul>
                                <h6>Costumer Engagement Credit that you can use for</h6>
                                <ul>
                                    <li>Up to 5,000,000 Monthly Text Recipients <a href="#" style="color: #1a73e8" onmouseenter="showQuestionText()" onmouseleave="hideQuestionText()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Up to 1,000 chars for each text. For each text sent, the credit will be deducted by the number of recipients of the message. For example, you can send 5,000 texts to 1,000 recipients.">(?)</a>, or</li>
                                    <li>Up to 50,000 Monthly Document & Image Recipients <a href="#" style="color: #1a73e8" onmouseenter="showQuestionImage()" onmouseleave="hideQuestionImage()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Up to 250 KB for each image. For each image sent, the credit will be deducted by the number of recipients of the image; For example, you can send 50 images to 1,000 recipients.">(?)</a>, or</li>
                                    <li>Up to 5,000 Monthly Video Recipients <a href="#" style="color: #1a73e8" onmouseenter="showQuestionVideo()" onmouseleave="hideQuestionVideo()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Up to 2.5 MB for each video. For each video sent, the credit will be deducted by the number of recipients of the image; For example, you can send 5 videos to 1,000 recipients.">(?)</a>, or</li>
                                    <li>Up to 3,000 Monthly Minutes Livestream Recipients <a href="#" style="color: #1a73e8" onmouseenter="showQuestionLs()" onmouseleave="hideQuestionLs()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Up to 3 minutes livestream to 1,000 recipients.">(?)</a>, or</li>
                                    <li>Up to 50,000 Monthly Minutes 1-1 VoIP Calls <a href="#" style="color: #1a73e8" onmouseenter="showQuestionVoip()" onmouseleave="hideQuestionVoip()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="If you, for example, have 10 team members, they can have 5,000 (50,000/10) minutes of VoIP Calls between them.">(?)</a>, or</li>
                                    <li>Up to 500 Monthly Minutes 1-1 Video Calls <a href="#" style="color: #1a73e8" onmouseenter="showQuestionVc()" onmouseleave="hideQuestionVc()" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="If you, for example, have 10 team members, they can have 50 (500/10) minutes of Video Calls between them.">(?)</a></li>
                                </ul>
                        </div>
                        <button class="button_buy mt-5 mb-4" onClick="goToLogin()">Buy Now</button>
                    </div>
                </div>
                <div class="col-2 col-md-2 col-lg-3">
                    <!-- Empty -->
                </div>
            </div>
        </div>
    </section>
    <div class="question-section mb-5">
        <div class="row">
            <div class="col-3 col-md-3 col-lg-5">
                <!-- Empty -->
            </div>
            <div class="col-6 col-md-6 col-lg-2 text-center ">
                <h5>Have question about pricing?</h5>
                <a href="contact.php"><button class="button_question mt-4 mb-3">Talk to an Expert</button></a>
            </div>
            <div class="col-3 col-md-3 col-lg-5">
                <!-- Empty -->
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="assets/vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/geoloc.js"></script>

    <script type="text/javascript">
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
        function goToLogin(){
            if (window.confirm("Please sign in first before you purchase!")) {
                window.location.href = "login.php"
            }
        }
    </script>

<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/geoloc.php'); ?>
</body>

</html>