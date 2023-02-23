<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/customize_template.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/mail_template.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/encoder.php'); ?>
<?php

$timeSec = 'v=' . time();

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 11;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

if (isset($_POST['cancel_registration'])) {
  $company_id = $_SESSION['id_company'];

  $query = $dbconn->prepare("DELETE FROM COMPANY WHERE ID = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  $query = $dbconn->prepare("DELETE FROM SUBSCRIBE WHERE COMPANY = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  $query = $dbconn->prepare("DELETE FROM USER_ACCOUNT WHERE COMPANY = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  $query = $dbconn->prepare("DELETE FROM BILLING WHERE COMPANY = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  $query = $dbconn->prepare("DELETE FROM COMPANY_INFO WHERE COMPANY = ?");
  $query->bind_param("s", $company_id);
  $query->execute();
  $query->close();

  unset($_SESSION['password']);
  unset($_SESSION['email']);
  unset($_SESSION['hash']);
  unset($_SESSION['companyname']);
  unset($_SESSION['username']);
  unset($_SESSION['price']);
  unset($_SESSION['id_company']);
  unset($_SESSION['session_token']);
  unset($_SESSION['flag']);

  echo "<script>";
  echo "alert('Your registration to Qmera has been cancelled.');";
  echo "window.location.href = '" . base_url() . "';";
  echo "</script>";
}

?>

<style>
  .btn-link {
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    color: #0000EE;
    padding: 0;
    text-decoration: underline;
    font-family: inherit;
    font-size: inherit;
  }
</style>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Qmera - Verify Email</title>
  <link rel="icon" type="image/png" href="images/qmera_button.png">
  <link rel="stylesheet" href="nicepage.css?v=<?php echo $file_version; ?>" media="screen">
  <link rel="stylesheet" href="Home.css?v=<?php echo $file_version; ?>" media="screen">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  <script class="u-script" type="text/javascript" src="jquery.js?v=<?php echo $file_version; ?>"></script>
  <script class="u-script" type="text/javascript" src="nicepage.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script class="u-script" type="text/javascript" src="prettify.js?v=<?php echo $file_version; ?>" defer=""></script>
  <script type="text/javascript" src="geoloc.js?v=<?php echo $file_version; ?>" defer=""></script>
  <meta name="generator" content="Nicepage 3.23.0, nicepage.com">

  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link href="/assets/css/styles.min.css" rel="stylesheet" />

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .container#verifyemail,
    .container#verified {
      margin-top: 8rem;
    }

    #verifyemail h5 {
      color: #6945A5;
      font-weight: 500;
    }

    #verifyemail p {
      font-size: 15px;
    }

    .btn-resend-mail {
      border: 1px solid #6945A5;
      background-color: #6945A5;
      color: white;
      border-radius: 8px 8px 0 8px;
      padding: 10px 13px;
      font-size: 14px;
      width: 100%;
    }

    .btn-cancel-reg {
      border: 1px solid #6945A5;
      background-color: white;
      color: #6945A5;
      border-radius: 8px 8px 0 8px;
      padding: 10px 25px;
      font-size: 14px;
      width: 100%;
    }

    footer.u-footer {
      position: absolute !important;
      bottom: 0;
      width: 100%;
    }
  </style>



  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Site1",
      "logo": "images/Qmera_Logo1.png"
    }
  </script>
  <script>
    localStorage.geolocSts = <?php echo $geolocSts ?>;
    localStorage.fixedLanguage = <?php echo $language ?>;
  </script>
  <meta name="theme-color" content="#6945a5">



  <!-- Custom CSS -->
  <!-- <link rel="stylesheet" href="css/custom.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="./css/api_web.css"> -->
  <!-- <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>palio_logo_round.png"> -->

  <!-- POPPINS -->
  <!-- <link rel="stylesheet" href="./fonts/poppins/style.css"> -->

  <!-- Main JS -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script> -->

  <!-- Custom JS -->
  <script src="js/custom.js?<?php echo $timeSec; ?>"></script>

  <!-- reCAPTCHA -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- resend verification -->
  <script src="verifyemail.js"></script>

  <!-- check user status -->
  <script>
    var company_id = <?= $_SESSION['id_company']; ?>;
    var _0x41e6 = ['addClass', '#verified', '#verifyemail', 'removeClass', '2YEOfYU', '280203qcYfuS', '28867usszJE', '300549YTMDHK', '65608fHBEsQ', '1858157HVoLXC', 'checkStateUser', '638121KumHNK', 'd-none', '7tgpCqy', '37834jzXDDT', '9NfIoxB'];
    var _0x4a48 = function(_0x49a84f, _0x46ca30) {
      _0x49a84f = _0x49a84f - 0x10c;
      var _0x41e6a0 = _0x41e6[_0x49a84f];
      return _0x41e6a0;
    };
    (function(_0x1f3cdf, _0x1843b6) {
      var _0x21be9e = _0x4a48;
      while (!![]) {
        try {
          var _0xf89e04 = parseInt(_0x21be9e(0x111)) + parseInt(_0x21be9e(0x10d)) * -parseInt(_0x21be9e(0x110)) + parseInt(_0x21be9e(0x10e)) + -parseInt(_0x21be9e(0x114)) + -parseInt(_0x21be9e(0x116)) * parseInt(_0x21be9e(0x10f)) + -parseInt(_0x21be9e(0x117)) * parseInt(_0x21be9e(0x118)) + parseInt(_0x21be9e(0x112));
          if (_0xf89e04 === _0x1843b6) break;
          else _0x1f3cdf['push'](_0x1f3cdf['shift']());
        } catch (_0x196a71) {
          _0x1f3cdf['push'](_0x1f3cdf['shift']());
        }
      }
    }(_0x41e6, 0x6711e));

    function checkuser() {
      var _0x3c61e6 = _0x4a48;
      $['post'](_0x3c61e6(0x113), {
        'company_id': company_id
      }, function(_0x5b32b3) {
        var _0x12e9ee = _0x3c61e6;
        if (_0x5b32b3 == 0x1) $(_0x12e9ee(0x11a))['removeClass'](_0x12e9ee(0x115)), $(_0x12e9ee(0x11b))['addClass'](_0x12e9ee(0x115));
        else _0x5b32b3 == 0x3 ? ($('#verified')[_0x12e9ee(0x10c)](_0x12e9ee(0x115)), $(_0x12e9ee(0x11b))[_0x12e9ee(0x119)](_0x12e9ee(0x115))) : setTimeout(checkuser, 0x7d0);
      });
    }
  </script>

</head>

<body>

  <header id="header" class="header fixed-top bg-white">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.html" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener noreferrer">
        <img src="/assets/img/logo.svg" class="qlogo-primary" alt="">
        <img src="/assets/img/logo-light.svg" class="qlogo-light" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <input type="checkbox" class="chkboxqmera">
        <div class="overlay"></div>
        <a href="#" class="mobile-nav-toggle"><span></span><span></span><span></span><span></span></a>
        <ul>
          <div class="smalllogo"><a href="index.html" class="qlogo d-flex align-items-center" title="QMERA" rel="noopener" aria-label="QMERA"><img src="assets/img/logo.svg" alt=""></a></div>
          <li class="dropdown"><a href="#" rel="noopener" aria-label="Products"><span>Products</span> <i class="qmera-ddicon"></i></a>
            <ul>
              <li><a href="conversational-engagement.html" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a></li>
              <li><a href="conversational-sales.html" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a></li>
              <li><a href="smartbots-and-ai.html" rel="noopener" aria-label="Smartbots and A.I">Smartbots
                  and A.I</a></li>
            </ul>
          </li>
          <li><a href="/qmera/industries.html" class="nav-link" rel="noopener" aria-label="Industries">Industries</a>
          </li>
          <!--<li><a href="resources.html" class="nav-link" rel="noopener" aria-label="Resources">Resources</a></li>-->
          <li><a href="blog.html" class="nav-link" rel="noopener" aria-label="Blog">Blog</a></li>
          <li><a href="/pages/developers.php">Developers</a></li>
          <li><a href="company.html" class="nav-link" rel="noopener" aria-label="Company">Company</a>
          </li>
          <li><a href="contact.php" class="nav-link" rel="noopener" aria-label="Contact">Contact</a></li>
          <li><a href="Sign-up.php" class="nav-link active" rel="noopener" aria-label="Contact">Get Started</a></li>
        </ul>

      </nav><!-- .navbar -->
    </div>
  </header>

  <div id="verifyemail" class="container">
    <div class="row my-3">
      <div class="col-11 col-md-7 mx-auto text-center">

        <h5 class="mb-4">Thank you for signing up. <br>Please check your email to activate your account.</h5>

        <p>
          If you do not receive the confirmation email within a few minutes of signing up, <br>please check your spam/junk mail folder just in case
          the confirmation email got delivered there instead of your inbox. If so, select the confirmation message and mark it as "Not Spam"
          which should allow future messages to get through.
        </p>



      </div>
    </div>

    <div class="row my-5 justify-content-center">
      <div class="col-10 col-md-4">
        <form onsubmit="event.preventDefault(); resend_verification();" method="post">
          <button type="submit" name="resend_mail" class="btn-resend-mail">
            Click here if you don't receive the verification mail
          </button>
        </form>
      </div>

      <div class="col-10 col-md-4">
        <form method="post">
          <button type="submit" name="cancel_registration" class="btn-cancel-reg">
            Click here if you want to cancel your registration
          </button>
        </form>
      </div>
    </div>
  </div>

  <div id="verified" class="container d-none">
    <div class="row">
      <div class="col-11 col-md-6 mx-auto text-center">
        <br><br><br>

        <h5 style="color: #6945a5;">Thank you, your email has been verified.</h5>

      </div>
    </div>
  </div>
  <footer style="position: absolute; width: 100%; bottom: 0;">
    <div class="container">
      <div class="footer-content">
        <ul class="footer-menu-links">
          <li><a href="#">Products</a>
            <div class="mt-3">
              <a href="conversational-engagement.html" rel="noopener" aria-label="Conversational Engagement">Conversational Engagement</a><br>
              <a href="conversational-sales.html" rel="noopener" aria-label="Conversational Sales">Conversational Sales</a><br>
              <a href="smartbots-and-ai.html" rel="noopener" aria-label="Smartbots and A.I">Smartbots and
                A.I</a>
            </div>
          </li>
          <li><a href="industries.html" rel="noopener" aria-label="Industries">Industries</a></li>
          <!--<li><a href="resources.html" rel="noopener" aria-label="Resources">Resources</a></li>-->
          <li><a href="blog.html" rel="noopener" aria-label="Blog">Blog</a></li>
          <li><a href="company.html" rel="noopener" aria-label="Company">Company</a>
            <!--<div class="mt-3">
                <a href="#" rel="noopener" aria-label="Executive Team">Executive Team</a><br>
                <a href="#" rel="noopener" aria-label="Board of Directors">Board of Directors</a><br>
                <a href="contact.php" rel="noopener" aria-label="Contact">Contact</a>
              </div>-->
          </li>
          <li><a href="contact.php" rel="noopener" aria-label="Contact">Contact</a>
        </ul>
        <p class="copyright-txt">© 2021 Qmera. All rights reserved <span>|</span> <a href="#" rel="noopener" aria-label="Privacy Policy">Privacy Policy</a> <span>|</span> <a href="#" rel="noopener" aria-label="Disclosure">Disclosure</a></p>
      </div>
    </div>
  </footer>
</body>

<script>
  $(document).ready(function() {
    checkuser();

    var company_id = <?php echo $_SESSION['id_company']; ?>;
    var _0x8ee6 = ['239UNvkZZ', '803879OOVzDB', '582869OxBDik', 'cancelVerify.php', '44523USXCbY', '6773zpDhtr', '38228mKVrmf', '642633FyUCSz', 'post', 'log', 'Verification\x20expired\x20in\x201\x20hour!', '465778xCaMxC'];
    var _0x40da = function(_0x535d94, _0x39e0f8) {
      _0x535d94 = _0x535d94 - 0x11f;
      var _0x8ee67a = _0x8ee6[_0x535d94];
      return _0x8ee67a;
    };
    (function(_0x4290a7, _0x48f449) {
      var _0x388b90 = _0x40da;
      while (!![]) {
        try {
          var _0x12974a = -parseInt(_0x388b90(0x124)) + -parseInt(_0x388b90(0x127)) + -parseInt(_0x388b90(0x11f)) + parseInt(_0x388b90(0x120)) + -parseInt(_0x388b90(0x126)) + parseInt(_0x388b90(0x129)) + parseInt(_0x388b90(0x12a)) * parseInt(_0x388b90(0x125));
          if (_0x12974a === _0x48f449) break;
          else _0x4290a7['push'](_0x4290a7['shift']());
        } catch (_0x402fb4) {
          _0x4290a7['push'](_0x4290a7['shift']());
        }
      }
    }(_0x8ee6, 0x655ad));

    function expiredVerify() {
      var _0x53413e = _0x40da;
      $[_0x53413e(0x121)](_0x53413e(0x128), {
        'company_id': company_id
      }, console[_0x53413e(0x122)](_0x53413e(0x123)));
    }

    expiredVerify();
  });
</script>

</html>