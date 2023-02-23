<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>
<link rel="icon" type="image/x-icon" href="newAssets/fav.ico">
<?php

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 16;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

// mail id
$idM = $_GET['id'];
if ($idM == null) {
	header("Location:" . base_url() . "dashboardv2/mailbox.php");
}

$message2 = $dbconn->prepare("SELECT * FROM MESSAGE WHERE COMPANY = ? AND ID= ?");
$message2->bind_param("ii", getSession('id_company'), $idM);
$message2->execute();
$itemMessage2 = $message2->get_result()->fetch_assoc();

if ($itemMessage2 == null) {
	header("Location:" . base_url() . "dashboardv2/mailbox.php");
}

$updateMessage = $dbconn->prepare("UPDATE MESSAGE SET IS_READ = 1 WHERE COMPANY = ? AND ID= ?");
$updateMessage->bind_param("ii", getSession('id_company'), $idM);
$updateMessage->execute();
$dbconn->commit();

$billing_date = $dbconn->prepare("SELECT * FROM BILLING WHERE COMPANY = ? ORDER BY ID DESC LIMIT 1");
$billing_date->bind_param("i", getSession('id_company'));
$billing_date->execute();
$bill_date = $billing_date->get_result()->fetch_assoc();
$billing_date->close();

$welcome = "Welcome to Qmera!";
$payment = "Payment Notice";
$due_date = "Due Date Reminder";
$overdue = "Overdue Notice";
$cutoff_date = "Cut Off Date Reminder";
$terminate = "Service Termination Notice";

// $trial = "Reminder: Your trial has expired";
// $payment= "Payment Success";

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
$message6 = "Dear User...<br>
			Due Date Reminder:<br>
			To continue using our services, you have to make a repayment on " . $bill_date['DUE_DATE'] . ".
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";

//overdue notice
$message3 = "Dear User...<br>
			Overdue Reminder:<br>
			Your package has entered a grace period, make sure to finish your payment to continue using our services.
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";

//cut off date reminder
$message4 = "Dear User...<br>
			Cut Off Date Reminder:<br>
			Your package has entered a grace period, and will be terminated on " . $bill_date['DUE_DATE'] . ".
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";

//termination notice
$message5 = "Dear User...<br>
			Your package has been terminated on " . $bill_date['DUE_DATE'] . ".
			<br>
			If you are interested in using our services again,
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";

//payment notice
$message2 = "Dear User...<br>
			You haven't paid for your package, if you are interested in using our services please finish your payment.
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";
// $message3 = "Dear user...<br>
// 	Trial Reminder:<br>
// 	Your trial will end on
// 	";
// $message4 = "Dear user...<br>
// 	Payment Reminder:<br>
// 	Your services will end on
// 	";
$nextMessage34 = ". Make sure to finish your payment to continue using our services.<br>
			<br>If you have already paid your dues, please ignore this message.
			<br>
			Thank you.<br>
			Regards's<br>
			Qmera<br>";

// $message5 = "Dear user...<br>
// 	Thank you for your payment transaction on ";
$nextMessage5 = "  <br>
			Currently, you have access to all of our API services and we hope that you will be enjoying our best services. To avoid any inconveniences please pay your service bill on the due date in the future. Best of Luck.
			<br>
			<br>
			Thank you.<br>
			With Regards<br>
			Qmera<br>
			";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div class="content" style="padding-left: 64px; padding-right: 64px;">
		<div class="col">
			<div class="row">
				<div class="col-6 d-flex align-items-center">
					<a href="mailbox.php" style="color: grey; font-size: 14px;"><i class="fas fa-chevron-left mr-1"></i>Back</a>
				</div>
				<div class="col-6">
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
				</div>
			</div>
			<hr style="margin: 0; margin-bottom: 20px; margin-top: 20px;">
			<div class="row">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 mt-3">
							<div class="card" id="inbox">
								<div class="card-header">
									<div class="row">
										<div class="col-lg-6">
											<h5 class="font-medium">Qmera Team</h5>
											<p class="text-gray font-medium" style="font-size: 14px;">support@qmera.io</p>
										</div>
										<div class="col-lg-6">
											<p class="pull-right" style="font-size: 14px;"><?php echo $itemMessage2['MESSAGE_DATE']; ?></p>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col">
											<h5>
												<?php
												if ($itemMessage2['M_ID'] == 1) echo $welcome;
												else if ($itemMessage2['M_ID'] == 6) echo $due_date;
												else if ($itemMessage2['M_ID'] == 2) echo $payment;
												else if ($itemMessage2['M_ID'] == 3) echo $overdue; //substr($message3, 0, 12)."...[TRIAL]";
												else if ($itemMessage2['M_ID'] == 4) echo $cutoff_date; //substr($message4, 0, 12)."...[DUE DATE]";
												else if ($itemMessage2['M_ID'] == 5) echo $terminate; //substr($message5, 0, 12)."...[PAYMENT]";
												?>
											</h5>
										</div>
									</div>
								</div>
								<div class="card-body font-medium">
									<p>
										<?php
										$dataDesc = explode("|", $itemMessage2['MESSAGE_DESC']);
										$dataDesc2 = strtotime($dataDesc[1]);

										$dataAmount = explode("|", $itemMessage2['MESSAGE_DESC']);
										$dataDate = $itemMessage2['MESSAGE_DATE'];
										$dataDate2 = strtotime($dataDate[1]);


										if ($itemMessage2['M_ID'] == 1) echo $message1;
										else if ($itemMessage2['M_ID'] == 2) echo $message2;
										else if ($itemMessage2['M_ID'] == 3) echo $message3;
										else if ($itemMessage2['M_ID'] == 4) echo $message4;
										else if ($itemMessage2['M_ID'] == 5) echo $message5;
										else if ($itemMessage2['M_ID'] == 6) echo $message6;
										?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-5" id="copyright-footer">
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
<!-- /.content-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>

<script>
	var _0x2522 = ['a.nav-link[href=\x22billpayment.php\x22]', '1pXPPvL', '23UJSImY', 'a.nav-link[href=\x22usage.php\x22]', '99129qVGjnO', 'active', '374037sDlapl', 'a.nav-link[href=\x22index.php\x22]', '395113yOiTJN', 'removeClass', '6guKYSg', '470ERqtlz', '627409dLRBRr', 'a.nav-link[href=\x22support.php\x22]', '234994ntMDOC', '739PrUwvP', '25966YFjKSq', 'a.nav-link[href=\x22mailbox.php\x22]', 'addClass', 'ready'];
	var _0x8bc1 = function(_0x9fc769, _0x23e1f2) {
		_0x9fc769 = _0x9fc769 - 0xcf;
		var _0x252241 = _0x2522[_0x9fc769];
		return _0x252241;
	};
	var _0x193d54 = _0x8bc1;
	(function(_0x41166a, _0x356e44) {
		var _0x343f64 = _0x8bc1;
		while (!![]) {
			try {
				var _0x63ac9c = -parseInt(_0x343f64(0xdc)) + -parseInt(_0x343f64(0xd0)) * parseInt(_0x343f64(0xde)) + parseInt(_0x343f64(0xcf)) * parseInt(_0x343f64(0xd6)) + parseInt(_0x343f64(0xd4)) + parseInt(_0x343f64(0xd8)) * -parseInt(_0x343f64(0xd2)) + parseInt(_0x343f64(0xdd)) * parseInt(_0x343f64(0xd9)) + parseInt(_0x343f64(0xda));
				if (_0x63ac9c === _0x356e44) break;
				else _0x41166a['push'](_0x41166a['shift']());
			} catch (_0x3cf872) {
				_0x41166a['push'](_0x41166a['shift']());
			}
		}
	}(_0x2522, 0x4d5e7), $(document)[_0x193d54(0xe1)](function() {
		var _0x13ea3b = _0x193d54;
		$(_0x13ea3b(0xe2))['removeClass'](_0x13ea3b(0xd3)), $(_0x13ea3b(0xd5))['removeClass'](_0x13ea3b(0xd3)), $(_0x13ea3b(0xd1))[_0x13ea3b(0xd7)](_0x13ea3b(0xd3)), $(_0x13ea3b(0xdb))[_0x13ea3b(0xd7)](_0x13ea3b(0xd3)), $(_0x13ea3b(0xdf))[_0x13ea3b(0xe0)](_0x13ea3b(0xd3));
	}));
</script>