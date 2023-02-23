<?php

    // KONEKSI

    // include_once($_SERVER['DOCUMENT_ROOT'] . '/qmera/logic/chat_dbconn.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/logic/chat_dbconn.php');
    $dbconn = newnus();
    session_start();

    // SELECT USER

    $query = $dbconn->prepare("SELECT * FROM PRICING");
    $query->execute();
    $pricing = $query->get_result();
    $query->close();
    
    $arrayPrice = [];

    foreach ($pricing as $p){
        array_push($arrayPrice, $p['PRICE']);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qmera - Products | Conversational Engagement</title>
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
    <script src="main.js"></script>

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

        .button_calculate{
            background-color: #6945a5;
            border: 1px solid #6945a5;
            padding: 5px;
            color: #FFFFFF;
            width: 100%;
            height: 40px;
        }

        .field{
            margin-top: 50px;
            border: 1px solid #c2c2c2;
            border-radius: 10px;
            /* width: 84%; */
            height: 95%;
        }

        .content{
            border: 1px solid #c2c2c2;
            /* margin-top: 70px; */
            align-items: center;
            width: 100%;
            height: auto;
            margin-bottom: 15px;
            /* padding-top: 13px; */
        }

        .content-image-video{
            border: 1px solid;
            margin-top: 10px;
            align-items: center;
            width: 100%;
            height: 50px;
            padding-top: 13px;
        }

        .estimated{
            margin-top: 10px;
            margin-left: 20px;
            float: left;
        }

        @media (max-width: 768px){
        
            p{
                font-size: 14px;
            }

                    
            h4{
                font-size: 16px;
                margin-top: 6px;
            }

            .product-list {
                margin-left: 15px;
            }

            .hide-minute{
                display: none;
            }

            .min{
                font-size: 14px;
            }

            .add{
                font-size: 14px;
            }

            .border-bottom{
                border-bottom: 1px solid #c2c2c2;
                text-align: center;
            }

            #totalPrice{
                font-size: 17px;
                margin-top: 6px;
            }

            .monthly_estimation_pc{
                display: none;
            }

            /* .monthly_estimation_phone{
                display: block;
            } */

            .estimated-mc-pc{
                display: none;
            }

            .estimated{
                margin-left: 0px;
                padding: 7px;
            }

        }

        @media (min-width: 768px){
        
            p{
                font-size: 16px;
            }

            h4{
                font-size: 24px;
            }

            .product-list {
                margin-left: 45px;
            }

            .min{
                font-size: 22px;
            }

            .add{
                font-size: 22px;
            }
/* 
            .monthly_estimation_pc{
                display: block;
            } */

            .monthly_estimation_phone{
                display: none;
            }

            .estimated-mc-phone{
                display: none;
            }

        }

        .border-width{
            width: 120px;
            height: 48px;
            text-align: center;
        }

        .calculate{
            height: 49px;
            margin-top: -14px;
            margin-left: -452px;
        }

        .calculate-bar{
            height: 49px;
            text-align: center;
            /* pointer-events: auto; */
        }

        .min{
            /* margin-left: 20px; */
            height: auto;
            border: none;
            /* width: 50px; */
            pointer-events: auto;
            color: #878787;
        }

        .add{
            /* margin-left: 0px; */
            height: auto;
            border: none;
            /* width: 50px; */
            pointer-events: auto;
            color: #878787;
        }

        .calculate-product{
            margin-top: 80px;
            background-color: #f7f7f7;
            border-top: 1px solid #c2c2c2;
            border-bottom: 1px solid #c2c2c2;
        }

        .product-list{
            margin-top: 25px;
            margin-bottom: 25px;
            color: #666666;
        }

        .table-purchase{
            margin-top: 70px;
            border: 1px solid #c2c2c2;
            background-color: #d5d5d5;
        }

        .table-purchase-2{
            margin-top: -25px;
            border: 1px solid #c2c2c2;
        }

        .btn-topup{
            background-color: #6945a5;
            border: 1px solid #6945a5;
            border-radius: 20px;
            padding: 5px;
            color: #FFFFFF;
            width: 200px;
            height: 40px;
            float: right;
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
    

        /* LAPTOP */
        /* @media (min-width: 768px){
            .total-price{
                margin-left: 125px !important;
            }
        } */


        /* PC DIO */
        /* @media (min-width: 480px) and (max-width: 768px){ */
            /* .total-price{
                margin-left: 65px !important;
            } */

            /* .monthly{
                margin-left: -5px;
            } */
        /* } */

        @media (min-width: 850px){
            /* .total-price{
                margin-left: 65px !important;
            } */

            /* .monthly{
                margin-left: -5px;
            } */
        }

        /* PC REZA */
        @media (min-width: 1800px){
            /* .total-price{
                margin-left: 220px !important;
            } */

            .monthly{
                margin-left: -3px !important;
            }
        }

        input{
            border-top: 1px solid #c2c2c2;
            border-left: 1px solid #c2c2c2;
            border-bottom: none;
            border-right: none;
            font-weight: bold;
            height: auto;
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
                                <a href="pricing_calculator.php" rel="noopener" aria-label="Conversational Sales" class="active">Pricing Calculator</a>
                            </li>
                            <li>
                                <a href="bundle_pricing.php" rel="noopener" aria-label="Conversational Engagement">Plans For Everyone</a>
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
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <h1>Pricing Calculator</h1>
                <h5>Use this pricing calculator (on desktop web browser) to estimate how much your Qmera session will cost bades on the product, types of users, and minute usage.</h5>
            </div>
            <div class="col-2"></div>
            <div class="row gx-0">
                <div class="col-2 col-md-2 col-lg-2">
                    <!-- EMPTY -->
                </div>
                <div class="col-8 col-md-8 col-lg-8 field" style="padding:40px">
                    <h3 class="mt-3 mb-4">Broadcast Messaging</h3>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of messages sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minOne()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputOne" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusOne()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of image attachment sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minTwo()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputTwo" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusTwo()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of video attachment sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minThree()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputThree" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusThree()">+</button>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 50px; margin-bottom: 50px">
                    <h3 class="mt-3 mb-4">Contact Center</h3>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of messages sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minFour()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputFour" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusFour()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of image attachment sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minFive()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputFive" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusFive()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated number of video attachment sent</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minSix()">-</button>
                                <input type="text" class="col-8 calculate-bar" id="inputSix" readonly value="10000" style="border-top: none">
                                <button class="col-2 add" onclick="plusSix()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated duration of voice call</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minSeven()">-</button>
                                <input type="text" class="col-8 col-md-4 calculate-bar" id="inputSeven" readonly value="10000" style="border-top: none">
                                <div class="col-4 hide-minute text-center" style="margin-top: 14px; color: #adb5bd">
                                    <p style="margin-top: -2px; padding-left: 4px; font-size: 14px">minutes</p>
                                </div>
                                <button class="col-2 add" onclick="plusSeven()">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row gx-0">
                            <div class="col-12 col-md-8 border-bottom">
                                <p class="estimated">Estimated duration of video call</p>
                            </div>
                            <div class="col-12 col-md-4 d-flex justify-content-end">
                                <button class="col-2 min" onclick="minEight()">-</button>
                                <input type="text" class="col-8 col-md-4 calculate-bar" id="inputEight" readonly value="10000" style="border-top: none">
                                <div class="col-4 hide-minute text-center" style="margin-top: 14px; color: #adb5bd; border-top: none">
                                    <p style="margin-top: -2px; padding-left: 4px; font-size: 14px">minutes</p>
                                </div>
                                <button class="col-2 add" onclick="plusEight()">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-1 col-md-3 col-lg-5">
                        <!-- Empty -->
                    </div>
                    <div class="col-10 col-md-6 col-lg-2 text-center">
                        <button class="button_calculate mt-5 mb-3" id="btnCalculate">Calculate</button>
                    </div>
                    <div class="col-1 col-md-3 col-lg-5">
                        <!-- Empty -->
                    </div>
                </div>
                </div>
                <div class="col-2 col-md-2 col-lg-2">
                    <!-- EMPTY -->
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5 gx-0">
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
            </div>
            <div class="col-6 col-md-6 col-lg-6">
                <h4 class="col-12 header estimated-mc-pc">Estimated Monthly Cost</h4>
                <h4 class="col-12 header estimated-mc-phone">Estimated Monthly<br>Cost</h4>
                <div class="calculate-product">
                    <div class="product-list">
                        <!-- <p>Instant Messaging</p> -->
                        <p>Broadcast Messaging</p>
                        <p>Contact Center</p>
                        <!-- <p>Voice Messaging</p> -->
                        <!-- <p>Video Messaging</p> -->
                        <p>Platform Fee</p>
                    </div>
                </div>
            </div>
            <div class="col-2 col-md-2 col-lg-2">
                <div class="total-price d-flex justify-content-end">
                    <h3 class="header" style="color:#6945a5; margin-right: 40px" id="totalPrice">$0</h3>
                    <img src="Button-dropdown.png" style="position: absolute; width:30px; height: 30px; margin-top: 15px; margin-left: 5px; border-radius: 100px; border: 2px solid #c2c2c2; padding: 3px; z-index: 5000" id="showPrice">
                </div>
                <div class="calculate-product">
                    <div class="product-list text-end" style="padding-right: 20px">
                        <p id="totalBM">$0</p>
                        <p id="totalCC">$0</p>
                        <p id="totalFee">$0</p>
                    </div>
                </div>
            </div>
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
                    </div>
        </div>

        <!-- PC -->
        <div class="row mt-3 gx-0 monthly_estimation_pc">
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
            </div>
            <div class="col-8 col-md-8 col-lg-8">
                <h5 class="col-12 header monthly">Monthly Estimation</h5>
                <div class="row">
                    <div class="col-6 table-purchase">
                        <br>
                    </div>
                    <div class="col-2 p-3 table-purchase">
                        Min<br><span style="color: #464444; font-size: 12px">50% of total usage</span>
                    </div>
                    <div class="col-2 p-3 table-purchase">
                        Med<br><span style="color: #464444; font-size: 12px">75% of total usage</span>
                    </div>
                    <div class="col-2 p-3 table-purchase">
                        Max<br><span style="color: #464444; font-size: 12px">100% of total usage</span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6 p-4 table-purchase-2">
                        <div>Qmera Monthly Bill</div>
                    </div>
                    <div class="col-2 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-min">$0</div>
                    </div>
                    <div class="col-2 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-med">$0</div>
                    </div>
                    <div class="col-2 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-max">$0</div>
                    </div>
                </div>
                <br>
                <button class="btn-topup mt-4 mb-3" onClick="showAlert()">Top Up Your Balance</button>
            </div>
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
            </div>
        </div>

        <!-- PHONE -->
        <div class="row mt-3 gx-0 monthly_estimation_phone">
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
            </div>
            <div class="col-8 col-md-8 col-lg-8">
                <h5 class="col-12 header monthly">Monthly Estimation</h5>
                <div class="row">
                    <div class="col-12 table-purchase text-center p-3" style="background-color: #FFFFFF">
                        <div>Qmera Monthly Bill</div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-4 p-4 table-purchase" style="margin-top: 0px">
                        Min<br><span style="color: #464444; font-size: 12px">50% of total usage</span>
                    </div>
                    <div class="col-4 p-4 table-purchase" style="margin-top: 0px">
                        Med<br><span style="color: #464444; font-size: 12px">75% of total usage</span>
                    </div>
                    <div class="col-4 p-4 table-purchase" style="margin-top: 0px">
                        Max<br><span style="color: #464444; font-size: 12px">100% of total usage</span>
                    </div>
                </div>
                <br>
                <div class="row text-center">
                    <div class="col-4 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-min2">$0</div>
                    </div>
                    <div class="col-4 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-med2">$0</div>
                    </div>
                    <div class="col-4 p-4 table-purchase-2">
                        <div style="color:#6945a5" id="monthly-max2">$0</div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn-topup mt-4 mb-3" style="float:none" onClick="showAlertBox()">Top Up Your Balance</button>
                </div>
            </div>
            <div class="col-2 col-md-2 col-lg-2">
                <!-- EMPTY -->
            </div>
        </div>
        
        <div class="question-section mb-5 pt-5 pb-5 bg-light" style="margin-top: 70px">
            <div class="row">
                <div class="col-3 col-md-3 col-lg-5">
                    <!-- Empty -->
                </div>
                <div class="col-6 col-md-6 col-lg-2 text-center ">
                    <h5>Looking for costum pricing?</h5>
                    <a href="contact.php"><button class="button_question mt-4 mb-3">Talk to an Expert</button></a>
                </div>
                <div class="col-3 col-md-3 col-lg-5">
                    <!-- Empty -->
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
    <script src="assets/vendor/bootstrap5/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>

    <script>     
        $("#showPrice").click(function(){
            $(".calculate-product").slideToggle();
        });

        function showAlert(){
            if (window.confirm("Please sign in first before you top up!")) {
            window.location.href = "login.php"
            }
        }

        function showAlertBox(){
            if (window.confirm("Please sign in first before you top up!")) {
            window.location.href = "login.php"
            }
        }

        function minOne(){
            var number = parseInt($('#inputOne').val());

            if (number > 0){
                number = number - 10000;
            }

            $('#inputOne').val(number);
        }

        function plusOne(){
            var number = parseInt($('#inputOne').val());
            number = number + 10000;
            $('#inputOne').val(number);
        }

        function minTwo(){
            var number = parseInt($('#inputTwo').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputTwo').val(number);
        }

        function plusTwo(){
            var number = parseInt($('#inputTwo').val());
            number = number + 10000;
            $('#inputTwo').val(number);
        }

        function minThree(){
            var number = parseInt($('#inputThree').val());
          
            if (number > 0){
                number = number - 10000;
            }

            $('#inputThree').val(number);
        }

        function plusThree(){
            var number = parseInt($('#inputThree').val());
            number = number + 10000;
            $('#inputThree').val(number);
        }

        function minFour(){
            var number = parseInt($('#inputFour').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputFour').val(number);
        }

        function plusFour(){
            var number = parseInt($('#inputFour').val());
            number = number + 10000;
            $('#inputFour').val(number);
        }

        function minFive(){
            var number = parseInt($('#inputFive').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputFive').val(number);
        }

        function plusFive(){
            var number = parseInt($('#inputFive').val());
            number = number + 10000;
            $('#inputFive').val(number);
        }

        function minSix(){
            var number = parseInt($('#inputSix').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputSix').val(number);
        }

        function plusSix(){
            var number = parseInt($('#inputSix').val());
            number = number + 10000;
            $('#inputSix').val(number);
        }

        function minSeven(){
            var number = parseInt($('#inputSeven').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputSeven').val(number);
        }

        function plusSeven(){
            var number = parseInt($('#inputSeven').val());
            number = number + 10000;
            $('#inputSeven').val(number);
        }

        function minEight(){
            var number = parseInt($('#inputEight').val());
            
            if (number > 0){
                number = number - 10000;
            }

            $('#inputEight').val(number);
        }

        function plusEight(){
            var number = parseInt($('#inputEight').val());
            number = number + 10000;
            $('#inputEight').val(number);
        }

        $( "#btnCalculate" ).click(function() {
            var inputOne = parseInt($('#inputOne').val()/10000);
            var inputTwo = parseInt($('#inputTwo').val()/10000);
            var inputThree = parseInt($('#inputThree').val()/10000);
            var inputFour = parseInt($('#inputFour').val()/10000);
            var inputFive = parseInt($('#inputFive').val()/10000);
            var inputSix = parseInt($('#inputSix').val()/10000);
            var inputSeven = parseInt($('#inputSeven').val()/10000);
            var inputEight = parseInt($('#inputEight').val()/10000);

            var ratingOne = <?= $arrayPrice[0] ?>;
            var ratingTwo = <?= $arrayPrice[1] ?>;
            var ratingThree = <?= $arrayPrice[2] ?>;
            var ratingFour = <?= $arrayPrice[3] ?>;
            var ratingFive = <?= $arrayPrice[4] ?>;
            var ratingSix = <?= $arrayPrice[5] ?>;
            var ratingSeven = <?= $arrayPrice[6] ?>;
            var ratingEight = <?= $arrayPrice[7] ?>;

            var totalInputOne = inputOne * ratingOne;
            var totalInputTwo = inputTwo * ratingTwo;
            var totalInputThree = inputThree * ratingThree;
            var totalInputFour = inputFour * ratingFour;
            var totalInputFive = inputFive * ratingFive;
            var totalInputSix = inputSix *ratingSix;
            var totalInputSeven = inputSeven * ratingSeven;
            var totalInputEight = inputEight * ratingEight;

            var totalFee = 20;

            var totalAll = (totalInputOne + totalInputTwo + totalInputThree + totalInputFour + totalInputFive + totalInputSix +totalInputSeven + totalInputEight + totalFee);
            var totalBM = (totalInputOne + totalInputTwo + totalInputThree);
            var totalCC = (totalInputFour + totalInputFive + totalInputSix +totalInputSeven + totalInputEight);


            $('#totalPrice').text("$"+totalAll);
            $('#totalBM').text("$"+totalBM);
            $('#totalCC').text("$"+totalCC);
            $('#totalFee').text("$"+totalFee);

            var monthlyMin = (totalAll - (totalAll/2));
            var monthlyMed = (totalAll - (totalAll/4));

            $('#monthly-min').text("$"+monthlyMin);
            $('#monthly-med').text("$"+monthlyMed);
            $('#monthly-max').text("$"+totalAll);
            $('#monthly-min2').text("$"+monthlyMin);
            $('#monthly-med2').text("$"+monthlyMed);
            $('#monthly-max2').text("$"+totalAll);

        });

    </script>
    
    <script src="assets/js/geoloc.js"></script>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/geoloc.php'); ?>
</body>

</html>