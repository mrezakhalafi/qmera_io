<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php

// state control
$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 14;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$email = getSession('email');
$id_company = getSession('id_company');
$id_user = getSession('id_user');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/send_email_gmail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/get_all_column.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/logic/customize_template.php';

//SELECT * TICKET
$query = $dbconn->prepare("SELECT * FROM TICKET WHERE CREATED_BY = ?");
$query->bind_param("i", $id_user);
$query->execute();
$tickets = $query->get_result();
$query->close();

//SELECT USER_NAME TICKET
$query = $dbconn->prepare("SELECT * FROM USER_ACCOUNT WHERE ID = ?");
$query->bind_param("i", $id_user);
$query->execute();
$userData = $query->get_result()->fetch_assoc();
$username = $userData['USERNAME'];
$userMail = $userData['EMAIL_ACCOUNT'];
$query->close();

if (isset($_POST['submit'])) {

    $dbconn = getDBConn();
    $summary = $_POST['summary'];
    $method = $_POST['method'];
    $detail = $_POST['detail'];

    //TICKET INSERT QUERY
    $query = $dbconn->prepare("INSERT INTO TICKET (CREATED_TIME, CREATED_BY, SUMMARY, METHOD, DETAIL) VALUES (NOW(), ?, ?, ?, ?)");
    $query->bind_param("isss", $id_user, $summary, $method, $detail);
    $query->execute();
    $ticket_number = $query->insert_id;
    $query->close();

    $mcc = (int) $_POST['mcc'];
    $pn = (int) $_POST['pn'];
    $um = (int) $_POST['um'];
    $lvs = (int) $_POST['lvs'];
    $vidcall = (int) $_POST['vidcall'];
    $voip = (int) $_POST['voip'];
    $others = (int) $_POST['others'];

    $problemArea = array();

    if ($mcc == 1) {
        array_push($problemArea, 'Mobile Contact Center');
    }

    if ($pn == 1) {
        array_push($problemArea, 'Push Notification');
    }

    if ($um == 1) {
        array_push($problemArea, 'Unified Messaging');
    }

    if ($lvs == 1) {
        array_push($problemArea, 'Live Video Streaming');
    }

    if ($vidcall == 1) {
        array_push($problemArea, 'Video Call');
    }

    if ($voip == 1) {
        array_push($problemArea, 'VoIP Call');
    }

    if ($others == 1) {
        array_push($problemArea, 'Others');
    }


    //SDK INSERT QUERY
    $query = $dbconn->prepare("INSERT INTO SDK (TICKET_NUMBER, MOBILE_CONTACT_CENTERS, PUSH_NOTIFICATIONS, UNIFIED_MESSAGING, LIVE_VIDEO_STREAMING, VIDEO_CALL, VOIP_CALL, OTHERS) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("iiiiiiii", $ticket_number, $mcc, $pn, $um, $lvs, $vidcall, $voip, $others);
    $query->execute();
    $query->close();

    $content = 'Username: ' . $username . '<br>Email: ' . $userMail . '<br>Subject: ' . $summary . '<br>Dev. Method: ' . $method . '<br>Problem Area: ' . implode(', ', $problemArea) . '<br>Detail: ' . $detail;
    $lowerCaseMail = strtolower($userMail);
    // $content = 'Username: ' . $username . '<br>Email: ' . $userMail . '<br>Subject: ' . $summary . '<br>Dev. Method: ' . $method . '<br>Detail: ' . $detail;

    $subject = "Support Ticket";

    $send_mail = send_email($userMail, '', $subject, $content);

    if ($send_mail == 'Message has been sent') {
        echo "<script>";
        echo "alert('Thank you for submitting your ticket. We will get back to you as soon as we can!');";
        echo "window.location.href='support.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Error sending support ticket. Please try again in a bit!');";
        echo "console.log(" . $send_mail . ");";
        echo "</script>";
    }

    // require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
    // require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
    // require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

    // $mail = new PHPMailer();
    // //$mail->SMTPDebug = 2;
    // $mail->isSMTP();
    // $mail->Host       = 'smtp.gmail.com';
    // $mail->SMTPAuth   = true;
    // $mail->Username   = 'support@qmera.io';
    // $mail->Password   = 'Socialcommerce23';
    // $mail->SMTPSecure = 'tls';
    // $mail->Port       = 587;

    // //Recipients
    // $mail->setFrom('support@qmera.io', 'Qmera');
    // $mail->addAddress('support@qmera.io');
    // $mail->addReplyTo('support@qmera.io');

    // $mail->isHTML(true);
    // $mail->Subject = 'Support Ticket';
    // $mail->Body = $content;

    // if (!$mail->send()) {
    //     $succMsg = "";
    //     $mail->ClearAllRecipients();
    //     $msg = 'Error Mailler: ' . $mail->ErrorInfo;
    //     echo $msg;
    //     echo "<script>console.log('" . $msg . "');</script>";
    // } else {
    //     $mail->ClearAllRecipients();
    //     $sent = true;
    //     echo "<script>";
    //     echo "alert('Thank you for submitting your ticket. We will get back to you as soon as we can!');";
    //     echo "window.location.href='support.php';";
    //     echo "</script>";
    //     //   redirect(base_url() . 'dashboardv2/support.php');
    // }
}

$version = 'v=1.76';
?>

<style>
    @media screen and (min-width:768px) {
        #search-ticket {
            float: right;
        }
    }

    @media screen and (max-width: 600px) {
        iframe[src*=youtube] {
            display: block;
            margin: 0 auto;
            height: auto;
            max-width: 100%;
            padding-bottom: 10px;
        }
    }

    .card {
        padding: 1rem;
    }

    @media (min-width: 1200px) {
        #support-wrapper>.content>.container-fluid {
            padding: 0 5rem 0 4rem;
        }
    }
</style>

<div class="content-wrapper" id="support-wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center p-1">
                <img class="mr-4" src="./assets/icons/dashboard_nav/notification-black.png" width="35px;">

                <?php if ($itemUserDetail['COMPANY_LOGO'] !=  null) { ?>
                    <img src="<?php echo base_url() . "dashboardv2/uploads/logo/{$itemUserDetail['COMPANY_LOGO']}"; ?>" class="rounded-circle" width="35px" height="35px">
                <?php } else { ?>
                    <img src="./assets/icons/dashboard_nav/ava.png" class="rounded-circle" width="35px" height="35px">
                <?php } ?>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false" style="color: black;">
                        <span class="ml-2" style="font-size: 18px;"><?php echo $itemUser['USERNAME']; ?></span>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <form method="POST" id="logoutUser" style="margin: 0;">
                            <li>
                                <button type="submit" name="submitLogout" class="dropdown-item" id="logoutButton">
                                    Sign out
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
            <hr style="margin: 0; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 0;">
                            <h4 class="card-name mb-3">Documentation</h4>
                            <a href="guide_qmeralite.php">
                                <p>QMERA LITE GUIDE</p>

                                <iframe width="640" height="360" src="https://www.youtube.com/embed/fuW5AR2-rf0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-6">
                    <div class="card" id="create-ticket">
                        <div class="card-header">
                            <h4 class="card-name">Support Ticket</h4>
                        </div>
                        <div class="card-body">
                            <form name="ticket_form" method="POST" id="submit_ticket">
                                <!-- <h4 class="text-center"><strong>Create Ticket</strong></h4> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6 class="mb-3"><strong>What is this issue about?</strong></h6>
                                        <input type="textarea" id="ticketTitle" class="form-control" name="summary" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <strong>What is your development method?</strong>
                                        <div class="row mt-3">
                                            <div class="col-md-4 mx-auto">
                                                <label class="container-check"><span>Flutter</span>
                                                    <input type="radio" name="method" value="flutter" checked>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">
                                                <label class="container-check"><span>Native Android</span>
                                                    <input type="radio" name="method" value="native">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <strong>Problem Area</strong>
                                        <div class="row mt-3">
                                            <div class="col-md-4 mx-auto">
                                                <label class="container-check"><span>Mobile Contact Center</span>
                                                    <input type="checkbox" name="mcc" value="1" checked onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">
                                                <label class="container-check"><span>Push Notification</span>
                                                    <input type="checkbox" name="pn" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">
                                                <label class="container-check"><span>Video Call</span>
                                                    <input type="checkbox" name="vidcall" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4 mx-auto">

                                                <label class="container-check"><span>Unified Messaging</span>
                                                    <input type="checkbox" name="um" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">

                                                <label class="container-check"><span>Live Video Streaming</span>
                                                    <input type="checkbox" name="lvs" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            <div class="col-md-4 mx-auto">

                                                <label class="container-check"><span>VoIP Call</span>
                                                    <input type="checkbox" name="voip" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-4">

                                                <label class="container-check"><span>Others</span>
                                                    <input type="checkbox" name="others" value="1" onchange="checkFunction(this);">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <strong>Describe your issue:</strong>
                                        <div class="detail-submit-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea id="ticketDetail" name="detail" placeholder="Description" rows="2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn mt-2 btn-export-csv pull-right" id="submit-ticket" type="submit" value="submit" name="submit">
                                                        SUBMIT
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12 text-center">
                                        <small id="forbiddenChar" style="color: red; display:none;">Please refrain from using these symbols in your support ticket: " ' ` ´ ’ ‘ ; = -</small><br>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-6">
                    <div class="card" id="recent-tickets">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-name">Recent Tickets</h4>
                                </div>
                                <div class="col-md-4 align-self-center">
                                    <!-- <input class="form-control" id="search-ticket" type="text" placeholder="Search ticket by issue..." /> -->
                                    <form class="search-bills float-right">
                                        <input id="search-ticket" type="text" placeholder="Search ticket by issue" />
                                        <img src="assets/icons/Search-(grey).png" style="height: 20px; width:auto;">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-2" id="no-tickets">
                                <div class="col-md-12 text-center" style="position:absolute; top:50%;">
                                    <p style='color:gray; font-style:italic;'>No recent tickets.</p>
                                </div>
                            </div>
                            <?php foreach ($tickets as $ticket) { ?>

                                <div class="row mt-2 mb-4 pb-2 monthly-bill">
                                    <div class="col-md-6">
                                        <span class="month-year"><strong><?php echo $ticket['TICKET_NUMBER']; ?></strong></span><br>
                                        Issue: <span class="ticket-name"><?php echo $ticket['SUMMARY']; ?></span><br>
                                        Created on: <?php echo $ticket['CREATED_TIME']; ?><br>
                                        By <?php echo $userData['USERNAME'];
                                            ?>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php if ($ticket['STATUS'] == 0) { ?>
                                            <button class="btn btn-danger" disabled>
                                                Unresolved
                                            </button>
                                        <?php } else { ?>
                                            <button class="btn btn-success" disabled>
                                                Resolved
                                            </button>
                                        <?php } ?>
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- </div> -->
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <!-- <div class="card-footer">
                            <a class="ticket-navigation" href="#tickets-carousel" role="button" data-slide="prev"><i class="fas fa-chevron-left"></i> Prev</a>
                            <a class="ticket-navigation" href="#tickets-carousel" role="button" data-slide="next" style="float:right;">Next <i class="fas fa-chevron-right"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
		<div class="row mt-5" id="copyright-footer" style="font-size: 12px;">
            <div class="col-12 col-lg-6 text-gray">
              <strong>Copyright &copy; 2021 Qmera.</strong>
              All rights reserved.
            </div>
            <div class="col-12 col-lg-6">
              <strong><span id="slogan" style="color: #6945A5;">Customer Engagement, Made Easy<span></strong>
            </div>
          </div>

        </div>
    </div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <form method="GET" action="blog_search.php"> -->
            <!-- <div class="modal-header">
            </div> -->
            <div class="modal-body">

                <input class="form-control py-2 border-right-0 border" name="qm" type="text" placeholder="Search tickets by issue..." id="example-search-input">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size:1rem;">Close</button>
                <button type="submit" class="btn btn-blog">Search</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>

<script src="js/support.js?<?php echo $version; ?>"></script>

<script>
    var _0x5949 = ['a.nav-link[href=\x22mailbox.php\x22]', '869053cGhRlA', '21730YsPQuM', '371VJiiOA', 'a.nav-link[href=\x22usage.php\x22]', '451680guHajX', 'active', '2027duTcSS', 'removeClass', '19nNedkn', 'addClass', 'a.nav-link[href=\x22index.php\x22]', '252645UCLALp', 'a.nav-link[href=\x22billpayment.php\x22]', '407220gMJjRM', '1XRjAlx', '1202032wQQrMx'];
    var _0x3be9 = function(_0x2d15dc, _0x23667b) {
        _0x2d15dc = _0x2d15dc - 0x98;
        var _0x59495d = _0x5949[_0x2d15dc];
        return _0x59495d;
    };
    var _0xeb4428 = _0x3be9;
    (function(_0x5af5ad, _0x50638f) {
        var _0x2cbd90 = _0x3be9;
        while (!![]) {
            try {
                var _0x355172 = -parseInt(_0x2cbd90(0x98)) * -parseInt(_0x2cbd90(0x9b)) + -parseInt(_0x2cbd90(0x9d)) * parseInt(_0x2cbd90(0xa1)) + -parseInt(_0x2cbd90(0x9f)) + parseInt(_0x2cbd90(0x99)) + -parseInt(_0x2cbd90(0x9c)) * parseInt(_0x2cbd90(0xa3)) + parseInt(_0x2cbd90(0xa8)) + -parseInt(_0x2cbd90(0xa6));
                if (_0x355172 === _0x50638f) break;
                else _0x5af5ad['push'](_0x5af5ad['shift']());
            } catch (_0x5ceefa) {
                _0x5af5ad['push'](_0x5af5ad['shift']());
            }
        }
    }(_0x5949, 0x94b45), $(_0xeb4428(0xa7))[_0xeb4428(0xa2)](_0xeb4428(0xa0)), $(_0xeb4428(0xa5))[_0xeb4428(0xa2)](_0xeb4428(0xa0)), $(_0xeb4428(0x9e))[_0xeb4428(0xa2)](_0xeb4428(0xa0)), $('a.nav-link[href=\x22support.php\x22]')[_0xeb4428(0xa4)](_0xeb4428(0xa0)), $(_0xeb4428(0x9a))['removeClass'](_0xeb4428(0xa0)));
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('a.nav-link[href="billpayment.php"]').removeClass('active');
        $('a.nav-link[href="index.php"]').removeClass('active');
        $('a.nav-link[href="usage.php"]').removeClass('active');
        $('a.nav-link[href="support.php"]').addClass('active');
        $('a.nav-link[href="mailbox.php"]').removeClass('active');
        $('a.nav-link[href="webappform.php"]').removeClass('active');
        $('a.nav-link[href="form_management.php"]').removeClass('active');
    }, false);
</script>