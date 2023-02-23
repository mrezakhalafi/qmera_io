<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>
<?php

// state control
$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 14;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$id_company = getSession('id_company');

$message = $dbconn->prepare("SELECT * FROM MESSAGE WHERE COMPANY = ? order by ID DESC");
$message->bind_param("s", $id_company);
$message->execute();
$itemMessage = $message->get_result();

$welcome = "Welcome to Qmera!";
$payment = "Payment Notice";
$due_date = "Due Date Reminder";
$overdue = "Overdue Notice";
$cutoff_date = "Cut Off Date Reminder";
$terminate = "Service Termination Notice";

//welcome
$message1 = "Hey there, <br>
			Welcome!<br><br>
			Qmera helps companies to embed Contact Center,

			Livestreaming, Push Notifications, Instant Messaging, Video and VoIP Calling Features <br> into their mobile apps so that they could stay connected with their applications users.<br>
			<br>
			Here are some resources to help get you started: <a href='../guide_qmeralite.php'>Quickstart guides</a>
			<br>
			We can’t wait to see what you've build!
			<br>
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";

//due date reminder
$message6 = "Dear User...
		Due Date Reminder:
		To continue using our services, you have to make a repayment on .

		Thank you.
		With Regards
		Qmera<br>
		";

//overdue notice
$message3 = "Dear User...
		Overdue Reminder:
		Your package has entered a grace period, make sure to finish your payment to continue using our services.

		Thank you.
		With Regards
		Qmera
		";

//cut off date reminder
$message4 = "Dear User...
		Cut Off Date Reminder:
		Your package has entered a grace period, and will be terminated on .

		Thank you.
		With Regards
		Qmera<br>
		";

//termination notice
$message5 = "Dear User...
		Your package has been terminated on .

		If you are interested in using our services again,

		Thank you.
		With Regards
		Qmera<br>
		";

//payment notice
$message2 = "Dear User...
		You haven't paid for your package, if you are interested in using our services please finish your payment.

		Thank you.
		With Regards
		Qmera<br>
		";

$nextMessage34 = ". Make sure to finish your payment to continue using our services.<br>
		<br>If you have already paid your dues, please ignore this message.
		<br>
		Thank you.<br>
		Regards's<br>
		Qmera<br>";

$nextMessage5 = "  <br>
		Currently, you have access to all of our API services and we hope that you will be enjoying our best services. To avoid any inconveniences please pay your service bill on the due date in the future. Best of Luck.
		<br>
		<br>
		Thank you.<br>
		With Regards<br>
		Qmera<br>
		";
?>

<div class="content-wrapper" id="mailbox">
  <div class="content" style="padding-left: 64px; padding-right: 64px;">
    <div class="col">
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card" id="inbox" style="padding: unset; min-height: 75vh;">
                <h4 class="card-name font-medium m-0" style="padding: 1.5rem">Mailbox</h4>
                <div class="card-header pt-0 pb-4">
                  <div class="col d-flex justify-content-end align-items-center">
                    <input class="form-control" id="search-msg" type="text" placeholder="Search messages" style="max-width: 300px; border-radius: 10px; position: absolute;" />
                    <i class="fas fa-search pr-3" style="color: lightgrey; position: relative;"></i>
                  </div>
                </div>
                <div class="card-body" style="padding: unset;">
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                        <?php $number = 0;
                        while ($row = $itemMessage->fetch_assoc()) { ?>
                          <tr style="background-color: <?= $row['IS_READ'] != 1 ? '#f7f6fb' : 'unset'; ?>"" class=" msgs" data-href='read-mail.php?id=<?php echo $row['ID']; ?>'>
                            <td></td>
                            <td><input type="checkbox" id="scales" name="scales"></td>
                            <td class="mailbox-name font-medium">Qmera Team
                              <?php if ($row['IS_READ'] != 1) {
                                echo "<span style='color: #FFA500;''>*</span>";
                              } ?>
                            </td>
                            <td class="mailbox-subject mail-title font-medium">
                              <?php
                              if ($row['M_ID'] == 1) echo $welcome;
                              else if ($row['M_ID'] == 6) echo $due_date;
                              else if ($row['M_ID'] == 2) echo $payment;
                              else if ($row['M_ID'] == 3) echo $overdue; //substr($message3, 0, 12)."...[TRIAL]";
                              else if ($row['M_ID'] == 4) echo $cutoff_date; //substr($message4, 0, 12)."...[DUE DATE]";
                              else if ($row['M_ID'] == 5) echo $terminate; //substr($message5, 0, 12)."...[PAYMENT]";
                              ?>
                            </td>
                            <td class="mailbox-subject">
                              <?php
                              if ($row['M_ID'] == 1) echo (substr($message1, 0, 100) . "...");
                              else if ($row['M_ID'] == 2) echo (substr($message2, 0, 100) . "...");
                              else if ($row['M_ID'] == 3) echo (substr($message3, 0, 100) . "...");
                              else if ($row['M_ID'] == 4) echo (substr($message4, 0, 100) . "...");
                              else if ($row['M_ID'] == 5) echo (substr($message5, 0, 50) . "...");
                              else if ($row['M_ID'] == 6) echo (substr($message6, 0, 100) . "...");
                              ?>                            </td>
                            <td class="mailbox-date"><?php echo $row['MESSAGE_DATE']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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

  </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>

<script>
  var _0x49f8 = ['removeClass', 'location', '258101fRdRIy', '.msgs', 'addClass', 'a.nav-link[href=\x22support.php\x22]', '326055TAjupb', 'a.nav-link[href=\x22usage.php\x22]', 'a.nav-link[href=\x22mailbox.php\x22]', '729119JSSAZv', 'text', '^(?=.*\x5cb', 'split', 'active', ').*$', 'a.nav-link[href=\x22index.php\x22]', '353351OEMgjI', 'replace', '5mvnzuz', 'a.nav-link[href=\x22billpayment.php\x22]', '863614NteqFV', 'show', 'join', 'val', '10681jrqyuz', 'keyup', 'hide', 'trim', '1007293kgMgxR', 'test', 'data', '#search-msg', 'filter'];
  var _0x43b2 = function(_0x1ef7e4, _0x19351c) {
    _0x1ef7e4 = _0x1ef7e4 - 0x1ef;
    var _0x49f8e1 = _0x49f8[_0x1ef7e4];
    return _0x49f8e1;
  };
  var _0x2a89aa = _0x43b2;
  (function(_0x3a031e, _0x175397) {
    var _0x521c72 = _0x43b2;
    while (!![]) {
      try {
        var _0x44abf0 = parseInt(_0x521c72(0x206)) + -parseInt(_0x521c72(0x1f4)) + -parseInt(_0x521c72(0x1f0)) * -parseInt(_0x521c72(0x200)) + -parseInt(_0x521c72(0x202)) + parseInt(_0x521c72(0x20a)) + parseInt(_0x521c72(0x1fe)) + -parseInt(_0x521c72(0x1f7));
        if (_0x44abf0 === _0x175397) break;
        else _0x3a031e['push'](_0x3a031e['shift']());
      } catch (_0x4fb5c0) {
        _0x3a031e['push'](_0x3a031e['shift']());
      }
    }
  }(_0x49f8, 0xb5682), $(_0x2a89aa(0x1f1))['click'](function() {
    var _0x2a13a6 = _0x2a89aa;
    window[_0x2a13a6(0x1ef)] = $(this)[_0x2a13a6(0x20c)]('href');
  }), $(_0x2a89aa(0x201))[_0x2a89aa(0x20f)](_0x2a89aa(0x1fb)), $(_0x2a89aa(0x1fd))[_0x2a89aa(0x20f)](_0x2a89aa(0x1fb)), $(_0x2a89aa(0x1f5))['removeClass']('active'), $(_0x2a89aa(0x1f3))[_0x2a89aa(0x20f)]('active'), $(_0x2a89aa(0x1f6))[_0x2a89aa(0x1f2)](_0x2a89aa(0x1fb)));
  var $rows = $(_0x2a89aa(0x1f1));
  $(_0x2a89aa(0x20d))[_0x2a89aa(0x207)](function() {
    var _0x4e7159 = _0x2a89aa,
      _0x2efe5f = _0x4e7159(0x1f9) + $[_0x4e7159(0x209)]($(this)[_0x4e7159(0x205)]())[_0x4e7159(0x1fa)](/\s+/)[_0x4e7159(0x204)]('\x5cb)(?=.*\x5cb') + _0x4e7159(0x1fc),
      _0x3497a1 = RegExp(_0x2efe5f, 'i'),
      _0x522331;
    $rows[_0x4e7159(0x203)]()[_0x4e7159(0x20e)](function() {
      var _0x7f2b9a = _0x4e7159;
      return _0x522331 = $(this)[_0x7f2b9a(0x1f8)]()[_0x7f2b9a(0x1ff)](/\s+/g, '\x20'), !_0x3497a1[_0x7f2b9a(0x20b)](_0x522331);
    })[_0x4e7159(0x208)]();
  });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('a.nav-link[href="billpayment.php"]').removeClass('active');
        $('a.nav-link[href="index.php"]').removeClass('active');
        $('a.nav-link[href="usage.php"]').removeClass('active');
        $('a.nav-link[href="support.php"]').removeClass('active');
        $('a.nav-link[href="mailbox.php"]').addClass('active');
        $('a.nav-link[href="webappform.php"]').removeClass('active');
        $('a.nav-link[href="form_management.php"]').removeClass('active');
    }, false);
</script>