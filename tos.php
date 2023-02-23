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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/styles.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="tos.css?v=<?php echo time(); ?>" media="screen">

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
                            <li><a href="smartbots-and-ai.php" rel="noopener" aria-label="Smartbots and A.I">Smartbots
                                    and A.I</a></li>
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
    <div class="container mt-5">
        <div class="col-12">
            <div class="row">
                <h1 class="text-center main-title">Terms of Service</h1>
            </div>

            <!-- General -->
            <div class="row section-title">
                <h3 class="section-title">General</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        By registering for and/or using the Services in any manner, you agree that you have read, understand and accept these Terms of Use and all other Policies referenced herein, each of which may be updated from time to time.
                    </li>
                    <li class="my-2">
                        These Terms of Use apply to all users of the Website and other Services, including, without limitation, users who send or submit content, information, and other materials or services, registered or otherwise, through the Services.
                    </li>
                    <li class="my-2">
                        We may revise these Terms of Use at any time by updating this posting. You should check the Website from time to time to review the current Terms of Use, as they are binding on you. Certain provisions of these Terms of Use may be superseded by expressly designated legal notices or terms located on particular pages of the Website.
                    </li>
                    <li class="my-2">
                        No information contain in the Website shall be construed as advice and information is offered for information purposes only and is not intended for trading purposes. You and your company rely on the information contained on this website at your own risk. If you find an error or omission at this site, please let us know.
                    </li>
                    <li class="my-2">
                        Any waiver of any breach or default by either Party will not constitute a waiver of any other right or any subsequent breach or default. Failure or delay by either Party to enforce any provision of these Terms of Use will not be deemed a waiver of future enforcement of that or any other provision.
                    </li>
                </ol>
            </div>

            <!-- Services -->
            <div class="row section-title">
                <h3 class="section-title">Qmera Services</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        These Terms of Use apply to:
                        <ol type="a">
                            <li>
                                All Services described on our Website;
                            </li>
                            <li>
                                Any new Service or feature offered by us;
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        We continually improve our Services and offerings. You acknowledge that we may change our API’s from time to time.
                    </li>
                    <li class="my-2">
                        You will have a limited, non-exclusive, non-transferable, non-sublicensable right to use the applicable Services in accordance with these Terms of Use.
                    </li>
                    <li class="my-2">
                        You will not (and will not allow Service users) to:
                        <ol type="a">
                            <li>
                                Reverse engineer, decompile, copy or disassemble the Services;
                            </li>
                            <li>
                                Market, sell, sublicense, rent, lease, or otherwise distribute the Services, in whole or in part;
                            </li>
                            <li>
                                Modify, upgrade, improve, enhance or create derivative works of any portion of the Services for any purpose;
                            </li>
                            <li>
                                Or remove, obscure, or alter any identification, proprietary, copyright or other notices in the Services.
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>

            <!-- Accounts  -->
            <div class="row section-title">
                <h3 class="section-title">Accounts and Registration</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        To access some features of the Platform or Service, you must register for an account. When you register for an account, you may be required to provide us with some information about yourself, such as your name, email address, or other contact information. You agree that the information you provide to us is accurate and that you will keep it accurate and up-to-date at all times. When you register, you will be asked to provide a password.
                    </li>
                    <li class="my-2">
                        You are solely responsible for maintaining the confidentiality of your account and password, including any application programming interface (“API”) key provided to you by Qmera, and you accept responsibility for all activities that occur under your account and API key. If you believe that your account is no longer secure or that someone has used your API key without your permission, then you must immediately notify us at <a href="mailto: support@qmera.io">support@qmera.io</a>.
                    </li>
                </ol>
            </div>

            <!-- Licenses -->
            <div class="row section-title">
                <h3 class="section-title">Licenses</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        Subject to your compliance with these Terms and Qmera’s Acceptable Use policy located in our privacy policy page, Qmera grants you a limited, non-exclusive, non-sublicensable, revocable, non-transferable license to :
                        <ol type="a">
                            <li>
                                access and uses the Website and Services and
                            </li>
                            <li>
                                use the Platform in order to display, interface and implement the Service on Your Product, solely in accordance with the terms and conditions of these Terms. You may not install or use the Platform for any other purpose without Qmera’s prior written consent.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        You will not sell, transfer, assign, rent, lease, or sublicense Qmera’s code, the Platform, or the Service to anyone. Except as expressly authorized by Qmera, and except and solely to the extent such a restriction is impermissible under applicable law, you may not:
                        <ol type="a">
                            <li>
                                reproduce, distribute, publicly display, or publicly perform the Platform or Service;
                            </li>
                            <li>
                                make modifications to the Platform or Service; or
                            </li>
                            <li>
                                interfere with or circumvent any feature of the Platform or Service, including any security or access control mechanism. If you are prohibited under applicable law from using the Platform Service, you may not use it.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        To the extent any features available through the Service are provided by other third parties, Qmera will make commercially reasonable efforts to communicate any policies, requirements, or guidelines of those third parties to you. You agree to follow those policies, requirements, or guidelines. You hereby grant Qmera a limited, non-exclusive, non-transferable, non-sublicensable license to display your trade names, trademarks, servicemarks, logos, domain names and the like for the purpose of promoting or advertising that you use the Platform and the Service.
                    </li>
                    <li class="my-2">
                        If you choose to provide input and suggestions regarding problems with or proposed modifications or improvements to the Platform or Service (“Feedback”), then you hereby grant Qmera an unrestricted, perpetual, irrevocable, non-exclusive, fully-paid, royalty-free right to exploit the Feedback in any manner and for any purpose, including to improve the Platform or Service and create other products and services.
                    </li>
                </ol>
            </div>

            <!-- Integration -->
            <div class="row section-title">
                <h3 class="section-title">Integration of the service on your product</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        The Service includes branding for Qmera. You agree not to remove, obscure, or alter any branding contained in the Service or any notice of any Qmera Marks. You may not display Qmera Marks on Your Product (or otherwise) other than:
                        <ol type="a">
                            <li>
                                through the display of the Service in accordance with the Platform and Qmera’s branding guidelines and
                            </li>
                            <li>
                                solely for the purpose of disclosing that Your Product has implemented the Service in a manner that does not suggest any further relationship or endorsement of Your Product by Qmera.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        Other than through the API configuration options provided by Qmera, you may not, nor allow any third party to, alter, change or modify any user interface, feature or functionality of the Service without the express written consent of Qmera.
                    </li>
                    <li class="my-2">
                        You may not nor allow any third party to, copy, reverse engineer, decompile or disassemble Qmera’s code, the Platform, or the Service, or build alternative methods to access the Service other than as provided through the Platform (except to the limited extent such restrictions are expressly prohibited by applicable statutory law).
                    </li>
                    <li class="my-2">
                        Notwithstanding the foregoing paragraphs of this Section 5, Qmera licenses certain components of the Platform (e.g. the Qmera XML, HTML Embed) under a permissive software license. In these cases, you agree not to use any Qmera Marks, including those originally built into the code we provide, in any modified version of that code unless:
                        <ol type="a">
                            <li>
                                it follows the branding guidelines or
                            </li>
                            <li>
                                you have entered into a separate written trademark license agreement with Qmera.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        You agree to update code provided by Qmera in connection with modifications to the Service or Platform in a reasonable and timely fashion after Qmera makes them available.
                    </li>
                    <li class="my-2">
                        Qmera may update files on our servers that will automatically change the functionality of the Platform or Service, and you consent to those updates.
                    </li>
                    <li class="my-2">
                        You will not obscure or cover any graphical element of the Service or otherwise interfere with the operation of the Platform or Service.
                    </li>
                    <li class="my-2">
                        Qmera reserves the right to place volume limitations on access to the Platform or Service. Qmera reserves the right to cap concurrent video chat sessions conducted via Your Product in its discretion.
                    </li>
                </ol>
            </div>

            <!-- Free Trials -->
            <div class="row section-title">
                <h3 class="section-title">Free Trials</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        In its sole discretion, Qmera will determine whether you are eligible for a free trial subscription to the Service. You must agree to these Terms in order to be eligible for a free trial.
                    </li>
                    <li class="my-2">
                        During the free trial, you may use the Service for internal demonstration purposes only. Qmera expressly prohibits you from deploying the Service on any public or privately-facing website or mobile application for any commercial purpose (a “Live Deployment”) during the free trial including without limitation:
                        <ol type="a">
                            <li>
                                for the purpose of generating advertising revenue directly or indirectly from the Service,
                            </li>
                            <li>
                                as an inducement for downloading toolbars, plugins, or downloads of any type,
                            </li>
                            <li>
                                as part of a paid service of any kind,
                            </li>
                            <li>
                                to provide any form of paid or unpaid support to your customers or users, or
                            </li>
                            <li>
                                as part of any brand, product, or service promotion or communication activity of any kind.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        We reserve the right to limit the number of free trials per account and take actions to prevent abuse, and Qmera may change the conditions of the free trial or discontinue it entirely at any time without notice. Qmera reserves the right at any time to terminate your free trial and suspend your account or API key should it determine in its sole discretion that your free trial is a Live Deployment.
                    </li>
                    <li class="my-2">
                        Qmera is not obligated in any way to provide customer support or technical assistance to you during your free trial.
                    </li>
                </ol>
            </div>

            <!-- Ownership -->
            <div class="row section-title">
                <h3 class="section-title">Ownership; Proprietary Rights</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        The Website, Platform, and Service is owned and operated by Qmera. The visual interfaces, graphics, design, compilation, information, data, computer code (including source code or object code), products, software, services, and all other elements (“Materials”) provided by Qmera are protected by intellectual property and other laws. All Materials are the property of Qmera or its third party licensors. Except as expressly authorized by Qmera, you may not make use of the Materials. Qmera reserves all rights to the Materials not granted expressly in these Terms.
                    </li>
                    <li class="my-2">
                        You acknowledge that the Platform and the Service are protected by copyrights, trademarks, service marks, international treaties, and/or other proprietary rights and applicable law and that all ownership and intellectual property rights in the Platform and the Service, including without limitation the trademarks Qmera and all related trade names, service marks, logos, domain names and the like (“Qmera Marks”) do and shall, as between you and Qmera, belong exclusively to Qmera. Except as expressly provided herein, these Terms grant you no right, title, license, or interest in any intellectual property owned or licensed by Qmera, including (but not limited to) the Platform, the Service, or the Qmera Marks.
                    </li>
                </ol>
            </div>

            <!-- Fees -->
            <div class="row section-title">
                <h3 class="section-title">Fees</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        Certain features of the Services may require you to pay fees. Before you pay any fees, you will have an opportunity to review and accept the fees that you will be charged.
                    </li>
                    <li class="my-2">
                        Qmera reserves the right to determine pricing for the Services. Qmera will make reasonable efforts to keep pricing information published on the Website up to date. We may increase or add new fees for any existing Service or Service feature by giving you advance notice of changes before they apply. Qmera, at its sole discretion, may make promotional offers with different features and different pricing to any of Qmera’s customers. These promotional offers, unless made to you, will not apply to your offer or these Terms.
                    </li>
                    <li class="my-2">
                        To the extent the Services or any portion thereof are made available for any fee, you agree to pay all applicable fees (including any minimum subscription fees) as set forth in the pricing section of our Website. You authorize Qmera to charge all sums for the orders that you make and any level of Service you select as described in these Terms or published by Qmera, including all applicable taxes, to the payment method specified in your account. We may specify the manner in which you will pay any fees, and any such payment shall be subject to our general accounts receivable policies from time to time in effect. If you pay any fees with a credit card, Qmera may seek pre-authorization of your credit card account prior to your purchase to verify that the credit card is valid and has the necessary funds or credit available to cover your purchase.
                    </li>
                    <li class="my-2">
                        All fees payable by you are exclusive of federal, state, local and foreign taxes, duties, tariffs, levies, withholdings and similar assessments (including without limitation, sales taxes, use taxes and value added taxes) (“Additional Charges”), and you agree to bear and be responsible for the payment of all such Additional Charges, excluding taxes based upon Qmera’s net income.
                    </li>
                    <li class="my-2">
                        All amounts payable by you under this Agreement will be made without setoff or counterclaim and without deduction or withholding. If any deduction or withholding is required by applicable law, you shall notify us and shall pay such additional amounts to us as necessary to ensure that the net amount that we receive, after such deduction and withholding, equals the amount we would have received if no such deduction or withholding had been required.
                    </li>
                    <li class="my-2">
                        Should you have any dispute as to fees associated with your account, please contact us at <a href="mailto: support@qmera.io">support@qmera.io</a> within 30 days of the date of the activity that generated such dispute, and we will attempt to resolve the matter. Any and all refunds issued to resolve such a dispute shall be issued as credits to your account, but in no event shall there be any cash refunds. Disputes older than 90 days shall not be entitled to any refunds or credits.
                    </li>
                </ol>
            </div>

            <!-- Subscription -->
            <div class="row section-title">
                <h3 class="section-title">Subscription and Auto-Renewals</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        Qmera may allow you to subscribe to a plan (“Subscription Plan”) for which you will be periodically billed the amounts indicated to you at the time of your subscription, as may be updated from time to time by Qmera, on a forward-going basis, upon notice to you (the “Subscription Fee”). When you subscribe to a Subscription Plan, the Subscription Plan will be billed on a periodic basis. You hereby authorize Qmera to charge you on a going-forward basis and until cancellation of either the Subscription Plan or your account. The “Subscription Billing Date” is the day of the month when you sign up to your Subscription Plan. Your account will be charged automatically on the Subscription Billing Date all applicable fees and taxes for the next subscription period.
                    </li>
                    <li class="my-2">
                        BY PURCHASING A SUBSCRIPTION, YOU AGREE THAT YOUR SUBSCRIPTION WILL AUTOMATICALLY RENEW FOR SUCCESSIVE PERIODS UNLESS YOU CANCEL YOUR SUBSCRIPTION OR ACCOUNT AS FURTHER DESCRIBED BELOW. YOU MAY CANCEL YOUR SUBSCRIPTION PLAN AT ANY TIME, IN WHICH CASE YOUR SUBSCRIPTION WILL EXPIRE AT THE END OF THAT SUBSCRIPTION PERIOD (AND UPON WHICH EXPIRATION YOUR SUBCRIPTION WILL NO LONGER BE RENEWED OR CHARGED). YOU MAY CANCEL YOUR SUBSCRIPTION PLAN [ by emailing <a href="mailto: support@qmera.io">support@qmera.io</a> ].
                    </li>
                    <li class="my-2">
                        You must cancel your Subscription Plan at least 24 hours before it renews in order to avoid billing of the next periodic Subscription Fee to your account.
                    </li>
                </ol>
            </div>

            <!-- warranty -->
            <div class="row section-title">
                <h3 class="section-title">Warranty and Disclaimer</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        The Services and contents are provided “as-is”, “as available” and without warranty of any kind, express or implied, including, but not limited to, the implied warranties of title, non-infringement, merchantability, quality (e.g. at to latency and throughput), and fitness for a particular purpose, and any warranties implied by any course of performance or usage of trade, all of which are expressly disclaimed.
                    </li>
                    <li class="my-2">
                        We, and our suppliers, partners and licensors, and each of our and their respective officers, directors, employees, and agents, do not warrant (and hereby expressly disclaim all warranties) that:
                        <ol type="a">
                            <li>
                                the Services (or any mobile operators) will be secure or available at any particular time or location;
                            </li>
                            <li>
                                any defects or errors will be corrected;
                            </li>
                            <li>
                                any content or software available on or through the Services is free of viruses or other harmful components;
                            </li>
                            <li>
                                the content on the sites or Services (or any third Party sites or services linked thereto) is accurate, error-free, or complete; or
                            </li>
                            <li>
                                the results of using the Services will meet your requirements.
                            </li>
                        </ol>
                    </li>
                    <li class="my-2">
                        Your use of the Services is solely at your own risk. We do not warrant, endorse, guarantee, or assume responsibility for any content of, communication by, or product or service advertised or offered by, a third Party through the Services, and we will not be a Party to or in any way be responsible for monitoring any transaction between you and third-parties.
                    </li>
                    <li class="my-2">
                        You acknowledge that there are risks inherent in network connectivity that could result in the loss of your privacy, Data, Confidential Information and property. You further acknowledge that Qmera does not control networks of third parties and Qmera is not responsible for the impact on the Services by the action or inaction of such networks or third parties.
                    </li>
                    <li class="my-2">
                        Qmera shall not be responsible for and disclaims all liability for any loss, liability, damage (whether direct, indirect or consequential), personal injury or expense of any nature whatsoever which may be suffered by your or any third Party (including your company), as a result of or which may be attributable, directly or indirectly, to your access and use of the website, any information contained on the website, your or your company’s personal information or material and information transmitted over our system. In particular, neither the Website Owner nor any third Party or data or content provider shall be liable in any way to you or to any other person, firm or corporation whatsoever for any loss, liability, damage (whether direct or consequential), personal injury or expense of any nature whatsoever arising from any delays, inaccuracies, errors in, or omission of any share price information or the transmission thereof, or for any actions taken in reliance thereon or occasioned thereby or by reason of non-performance or interruption, or termination thereof.
                    </li>
                </ol>
            </div>

            <!-- termination -->
            <div class="row section-title">
                <h3 class="section-title">Termination, Cession, Suspension</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        These Terms of Use shall remain in full force and effect at all times relevant to your use of the Services.
                    </li>
                    <li class="my-2">
                        Qmera shall be entitled to cede, assign and delegate all or any of its rights and obligations in terms of any relevant terms, policies and notices to any third Party.
                    </li>
                    <li class="my-2">
                        Qmera may suspend the Services immediately upon notice for cause if:
                        <ol type="a">
                            <li>
                                You violate (or give us reason to believe you have violated) any provision of the Acceptable Policy;
                            </li>
                            <li>
                                There is an unusual spike or increase in your use of the Services for which there is reason to believe such traffic or use is fraudulent or negatively impacting the operating capability of our Services;
                            </li>
                            <li>
                                We determine, in our sole discretion, that the provision of any of our Services are prohibited by applicable law, or have become impractical or unfeasible for any legal or regulatory reason; or
                            </li>
                            <li>
                                Subject to applicable law, upon your liquidation, commencement of dissolution proceedings, disposal of your assets or change of control, a failure to continue business, assignment for the benefit of creditors, or if you become the subject of bankruptcy or similar proceeding.
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>

            <!-- Severability -->
            <div class="row section-title">
                <h3 class="section-title">Severability</h3>
            </div>
            <div class="row">
                <ol class="mx-4">
                    <li class="my-2">
                        All provisions of any relevant terms, policies and notices are, notwithstanding the manner in which they have been grouped together or linked grammatically, severable from each other.
                    </li>
                    <li class="my-2">
                        Any provision of any relevant Terms, Policies and notices, which is or becomes unenforceable in any jurisdiction, whether due to voidness, invalidity, illegality, unlawfulness or for any reason whatsoever, shall, in such jurisdiction, be treated as pro non scripto and the remaining provisions of any relevant Terms, Policies and notices shall remain in full force and effect.
                    </li>
                </ol>
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