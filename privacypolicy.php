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
        <h1 class="text-center main-title">Privacy Policy</h1>
      </div>

      <!-- Intro -->
      <div class="row section-title">
        <h3 class="section-title">Introduction</h3>
      </div>
      <div class="row">
        <p>
          As we continue to grow and scale up our platform, our commitment to data privacy and security still stands as our key priority. Therefore, we have developed and implemented policies and practices to comply with the General Data Protection Regulation (“GDPR”).<br><br>
          The purpose of this Privacy Policy is to inform you about the information we may gather about you, how we may use that information, whether we disclose it to anyone, and the choices you have regarding our use of the information we collect.<br><br>
          We may update the Privacy Policy from time to time. Subject to your rights at law, you agree to be bound by the prevailing terms of this Privacy Policy as updated from time to time. We encourage you to check the latest version of this Privacy Policy regularly.<br><br>
          By using our services, you consent to the processing of data about you by us in the manner and for the purposes set out below.
        </p>
      </div>

      <!-- personal information -->
      <div class="row section-title">
        <h3 class="section-title">Personal Information We Collect</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          For the purpose of this Policy, “Personal Information” means any information relating to an identified or identifiable individual. We obtain Personal Information relating to you from various sources described below.<br><br>
          Where applicable, we indicate whether and why you must provide us with your Personal Information, as well as the consequences of failing to do so. If you do not provide Personal Information when requested, you may not be able to benefit from our Service if that information is necessary to provide you with the service or if we are legally required to collect it.<br>
        </p>
        <ol type="a" class="fontRobLite fsz-15 m-0">
          <li class="my-3">
            <strong>Personal Information Provided by You</strong>
            <ul type="disc">
              <li class="my-2">
                <strong>Account Registration.</strong> If you register to use the Service, then you must provide us with your name, email address, and a password in order to create an account and user profile. You may also optionally add other information, such as a photo of yourself.
              </li>
              <li class="my-2">
                <strong>Communications.</strong> We will collect any information which you provide to us through your communications e.g., when you communicate with our customer support team.
              </li>
            </ul>
          </li>
          <li class="my-3">
            <strong>Personal Information Collected via Automated Means</strong><br>
            In addition to information that you provide to us, we may collect information about you and your use of the Service via automated means, such as cookies, web beacons and similar technologies:
            <ul type="disc">
              <li class="my-2">
                <strong>Cookies and Similar Technologies.</strong> When you use the Service, we may send one or more cookies – small text files containing a string of alphanumeric characters – to your device. We may use both session cookies and persistent cookies to automatically collect certain information. A session cookie disappears after you close your browser. A persistent cookie remains after you close your browser and may be used by your browser on subsequent visits to the Service. When you use the Service, we may also automatically collect certain information from your device by using similar technologies, including “clear gifs” or “web beacons.” Please review your web browser “Help” file to learn the proper way to modify your settings with regard to such automated data collection. Please note that if you delete, or choose not to accept, such technologies from the Service, you may not be able to utilize the features of the Service to their fullest potential.<br><br>
                The automatically collected information may include your IP address or other device address or ID, web browser and/or device type, the web pages or sites that you visit just before or just after you use the Service, the pages or other content you view or otherwise interact with on the Service, and the dates and times that you visit, access, or use the Service. We also may use these technologies to collect information regarding your interaction with email messages, such as whether you opened, clicked on, or forwarded a message. This information is gathered from all users.<br><br>
                We use this information to assess how many users access or use our Service, which content, products, and features of our Service most interest our visitors, what types of offers our customers like to see, and how our service performs from a technical point of view.
              </li>
            </ul>
          </li>
        </ol>
      </div>

      <!-- how we use -->
      <div class="row section-title">
        <h3 class="section-title">How We Use Personal Information We Collect</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          We may use Personal Information we collect for the following purposes:<br>
        </p>
        <ul type="disc" class="fontRobLite fsz-15 m-0">
          <li class="my-2">
            <strong>Internal and Service-Related Usage.</strong> We use your Personal Information to operate, maintain, enhance and provide all features of the Service, to provide services and information that you request, to respond to comments and questions and otherwise to provide support to users.
          </li>
          <li class="my-2">
            <strong>Analytics and Improving the Service.</strong> We use your Personal Information to understand and analyze the usage trends and preferences of our users, to improve the Service, and to develop new products, services, feature, and functionality.
          </li>
          <li class="my-2">
            <strong>Communications.</strong> We may use your email address or other Personal Information (i) to contact you for administrative purposes such as customer service, to address intellectual property infringement, including updates on promotions, relating to products and services offered by us and by third parties we work with.
          </li>
          <li class="my-2">
            <strong>Aggregate Data.</strong> We may de-identify and aggregate information to monitor and analyze the effectiveness of Service and third-party marketing activities and to monitor aggregate site usage metrics such as total number of visitors and pages viewed.
          </li>
          <li class="my-2">
            <strong>Legal.</strong> We may use your Personal Information to enforce our End User License Agreement and Terms of Service, to defend our legal rights, to comply with our legal obligations and internal policies.
          </li>
          <li class="my-2">
            <strong>Other Purposes.</strong> We also may use your Personal Information as may be described in a notice to you at the time the information is collected, or in any other manner to which you consent.
          </li>
        </ul>
        <br>
        <p class="mt-4 fontRobLite fsz-15">
          If you are located in the European Economic Area, we only process your Personal Information based on a valid legal ground, including when:
        </p>
        <ul type="disc" class="fontRobLite fsz-15 m-0">
          <li class="my-2">
            You have consented to the use of your Personal Information;
          </li>
          <li class="my-2">
            We need your Personal Information to provide you with the Services, including for account registration and to respond to your inquiries;
          </li>
          <li class="my-2">
            We have a legal obligation to use your Personal Information;
          </li>
          <li class="my-2">
            We have a legitimate interest in using your Personal Information. In particular, we have a legitimate interest in using your Personal Information to improve the safety, security, and performance of our Services. We only rely on our legitimate interests to process your Personal Information when these interests are not overridden by your rights and interests.
          </li>
        </ul>
      </div>

      <!-- how we disclose -->
      <div class="row section-title">
        <h3 class="section-title">How We Disclose Your Personal Information</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          Except as described in this Policy or otherwise disclosed to you at the time of the collection, we will not disclose your Personal Information to third parties without your consent. We may disclose information to third parties in the following circumstances:
        </p>
        <ul type="disc" class="fontRobLite fsz-15">
          <li class="my-2">
            <strong>To Comply with Legal Obligations.</strong> We may disclose your information if required to do so by law or in the good-faith belief that such action is necessary to comply with state and federal laws (such as applicable copyright law), in response to a court order, judicial or other government subpoena or warrant, or to otherwise cooperate with law enforcement or other governmental agencies.
          </li>
          <li class="my-2">
            <strong>To Protect and Enforce Our Rights.</strong> We also reserve the right to disclose your information that we believe, in good faith, is appropriate or necessary to (i) take precautions against liability, (ii) protect ourselves or others from fraudulent, abusive, or unlawful uses or activity, (iii) investigate and defend ourselves against any third-party claims or allegations, (iv) protect the security or integrity of the Service and any facilities or equipment used to make the Service available, or (v) protect our property or other legal rights (including, but not limited to, enforcement of our agreements), or the rights, property, or safety of others.
          </li>
          <li class="my-2">
            <strong>In case of Merger, Sale, or Other Asset Transfer.</strong> Information about our users, including Personal Information, may be disclosed and otherwise transferred to an acquirer, or successor or assignee as part of any merger, acquisition, debt financing, sale of assets, or similar transaction, as well as in the event of an insolvency, bankruptcy, or receivership in which information is transferred to one or more third parties as one of our business assets.
          </li>
          <li class="my-2">
            <strong>With Your Consent.</strong> We also may disclose your Personal Information as may be described in a notice to you at the time the information is collected, or in any other manner to which you consent.
          </li>
        </ul>
      </div>

      <!-- rights and choices -->
      <div class="row section-title">
        <h3 class="section-title">Your Rights and Choices</h3>
      </div>
      <div class="row">
        <ul type="disc" class="mt-4 fontRobLite fsz-15">
          <li class="my-3">
            <strong>Account Information.</strong> You may, of course, decline to share certain Personal Information with us, in which case we may not be able to provide to you some of the features and functionality of the Service. You may update, correct, or delete your profile information and preferences at any time by accessing your account settings page on the Service. If you wish to access or amend any other Personal Information we hold about you, or to request that we delete any information about you that we have obtained from an Enterprise Customer, you may contact us at <a href="mailto: support@qmera.io">support@qmera.io</a>. Please note that while any changes you make will be reflected in active user databases instantly or within a reasonable period of time, we may retain all information you submit for backups, archiving, prevention of fraud and abuse, analytics, satisfaction of legal obligations, or where we otherwise reasonably believe that we have a legitimate reason to do so, to the extent permitted under applicable law.
          </li>
          <li class="my-3">
            <strong>Opt-Out.</strong> If you receive commercial email from us, you may unsubscribe at any time by following the instructions contained within the email. You may also opt-out from receiving commercial email from us, and any other promotional communications that we may send to you from time to time, by sending your request to us by email to <a href="mailto: support@qmera.io">support@qmera.io</a>. We may allow you to view and modify settings relating to the nature and frequency of promotional communications that you receive from us in user account functionality on the Service.<br><br>
            Please be aware that if you opt-out of receiving commercial email from us or otherwise modify the nature or frequency of promotional communications you receive from us, it may take up to ten business days for us to process your request, and you may receive promotional communications from us that you have opted-out from during that period, unless we are required by applicable law to process your request within a shorter period of time. Additionally, even after you opt-out from receiving commercial messages from us, you will continue to receive administrative messages from us regarding the Service.
          </li>
          <li class="my-3">
            <strong>Privacy Settings.</strong> Although we may allow you to adjust your privacy settings to limit access to certain Personal Information, please be aware that no security measures are perfect or impenetrable. To the fullest extent permitted under applicable law, we are not responsible for circumvention of any privacy settings or security measures on the Service. Additionally, we cannot control the actions of other users with whom you may choose to share your information. Further, even after information posted on the Service is removed, caching and archiving services may have saved that information, and other users or third parties may have copied or stored the information available on the Service. To the fullest extent permitted under applicable law, we cannot and do not guarantee that information you post on or transmit to the Service will not be viewed by unauthorized persons.
          </li>
          <li class="my-3">
            <strong>Do Not Track.</strong> Some web browsers incorporate a “Do Not Track” feature. Because there is not yet an accepted standard for how to respond to Do Not Track signals, our website does not currently respond to such signals.
          </li>
          <li class="my-3">
            <strong>Other Rights.</strong> If you are located in the European Economic Area, you may have the following additional rights:
            <ul>
              <li class="my-2">
                Request access to and receive information about the Personal Information we maintain about you, to update and correct inaccuracies in your Personal Information, to restrict or to object to the processing of your Personal Information, to have the information anonymized or deleted, as appropriate, or to exercise your right to data portability to easily transfer your Personal Information to another company. In addition, you may also have the right to lodge a complaint with a supervisory authority, including in your country of residence, place of work or where an incident took place.
              </li>
              <li class="my-2">
                Withdraw any consent you previously provided to us regarding the processing of your Personal Information, at any time and free of charge. We will apply your preferences going forward and this will not affect the lawfulness of the processing before your consent withdrawal.
                Those rights may be limited in some circumstances by local law requirements.
              </li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Third Party -->
      <div class="row section-title">
        <h3 class="section-title">Third-Party Services</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          This Privacy Policy applies only to the processing of your Personal Information by Qmera. The Service may contain features or links to Web sites and services provided by third parties. The policies and procedures described in this Privacy Policy do not apply to Third Party Sites. Any information you provide on third-party sites or services is provided directly to the operators of such services and is subject to those operators’ policies, if any, governing privacy and security, even if accessed through the Service. We are not responsible for the content or privacy and security practices and policies of third-party sites or services to which links or access are provided through the Service. We encourage you to learn about third parties’ privacy and security policies before providing them with information.
        </p>
      </div>

      <!-- children privacy -->
      <div class="row section-title">
        <h3 class="section-title">Children’s Privacy</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          Protecting the privacy of young children is especially important. Our Service is not directed to children under the age of 16, and we do not knowingly collect Personal Information from children under the age of 16 without obtaining parental consent. If you are under 16 years of age, then please do not use or access the Service at any time or in any manner. If we learn that Personal Information has been collected on the Service from persons under 16 years of age and without verifiable parental consent, then we will take the appropriate steps to delete this information. If you are a parent or guardian and discover that your child under 16 years of age has obtained an account on the Service, then you may alert us at <a href="mailto: support@qmera.io">support@qmera.io</a> and request that we delete that child’s Personal Information from our systems.
        </p>
      </div>

      <!-- data security -->
      <div class="row section-title">
        <h3 class="section-title">Data Security</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          We use certain physical, managerial, and technical safeguards that are designed to appropriately protect Personal Information against accidental or unlawful destruction, accidental loss, unauthorized alteration, unauthorized disclosure or access, misuse, and any other unlawful form of processing of the Personal Information in our possession. WE CANNOT, HOWEVER, ENSURE OR WARRANT THE SECURITY OF ANY INFORMATION YOU TRANSMIT TO US OR STORE ON THE SERVICE, AND YOU DO SO AT YOUR OWN RISK. WE ALSO CANNOT GUARANTEE THAT SUCH INFORMATION MAY NOT BE ACCESSED, DISCLOSED, ALTERED, OR DESTROYED BY BREACH OF ANY OF OUR PHYSICAL, TECHNICAL, OR MANAGERIAL SAFEGUARDS. The foregoing is subject to requirements under applicable law to ensure or warrant information security.<br><br>
          If we learn of a security systems breach, then we may attempt to notify you electronically so that you can take appropriate protective steps. We may post a notice through the Service if a security breach occurs. Depending on where you live, you may have a legal right to receive notice of a security breach in writing. To receive a free written notice of a security breach you should notify us at <a href="mailto: support@qmera.io">support@qmera.io</a>.
        </p>
      </div>

      <!-- data retention -->
      <div class="row section-title">
        <h3 class="section-title">Data Retention</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          We take measures to delete your Personal Information or keep it in a form that does not permit identifying you when this information is no longer necessary for the purposes for which we process it, unless we are required by law to keep this information for a longer period. When determining the retention period, we take into account various criteria, such as the type of products and services requested by or provided to you, the nature and length of our relationship with you, possible re-enrolment with our products or services, the impact on the services we provide to you if we delete some information from or about you, mandatory retention periods provided by law and the statute of limitations.
        </p>
      </div>

      <!-- changes and updates -->
      <div class="row section-title">
        <h3 class="section-title">Changes and Updates to this Policy</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          Please revisit this page periodically to stay aware of any changes to this Policy, which we may update from time to time. If we modify the Policy, we will make it available through the Service, and indicate the date of the latest revision. In the event that the modifications materially alter your rights or obligations hereunder, we will make reasonable efforts to notify you of the change. For example, we may send a message to your email address, if we have one on file, or generate a pop- up or similar notification when you access the Service for the first time after such material changes are made. Your continued use of the Service after the revised Policy has become effective indicates that you have read, understood and agreed to the current version of the Policy.
        </p>
      </div>

      <!-- contact us -->
      <div class="row section-title">
        <h3 class="section-title">How to Contact Us</h3>
      </div>
      <div class="row">
        <p class="mt-4 fontRobLite fsz-15">
          Qmera, Inc. is the entity responsible for the processing of your Personal Information as described in this Policy. If you have any questions or comments about this Policy, your Personal Information, our use and disclosure practices, your consent choices, or if would like to exercise your rights, please contact us by email at <a href="mailto: support@qmera.io">support@qmera.io</a>.
        </p>
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