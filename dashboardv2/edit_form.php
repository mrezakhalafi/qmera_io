<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>

<?php

$user_id = getSession('survey_fpin');

$form_id = "0";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['form_id'])) {
    echo "get exist";
    $form_id = $_GET['form_id'];
    $form = include_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/logics/fetch_form.php');
}
// if (isset($_GET['user_id'])) {
//     $user_id = $_GET['user_id'];
// }
// else{
//     $user_id = "0";
// }
?>

<!-- <!doctype html>
<html lang="en">

<head>
    <title>Edit Form</title> -->
<!-- Required meta tags -->
<!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

<!-- Bootstrap CSS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<!-- <script src="https://kit.fontawesome.com/c6d7461088.js" crossorigin="anonymous"></script> -->
<!-- </head>
<body> -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content" style="padding-left: 64px; padding-right: 64px;">
        <div class="col">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <a href="form_management.php" style="color: grey; font-size: 14px;"><i class="fas fa-chevron-left mr-1"></i>Back</a>
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
                        <div class="col-md-12">
                            <div class="card" id="inbox" style="padding: unset; min-height: 75vh;">
                                <h4 class="card-name font-medium m-0" style="padding: 1.5rem">New Form</h4>
                                <div class="container-fluid py-0" style="padding: 1.5rem;">
                                    <form id="form-editor">
                                        <input type="hidden" id="company" value="<?php echo $id_company; ?>">
                                        <div class="form-group mb-4">
                                            <label for="title" style="font-size: 14px;">TITLE*</label>
                                            <?php
                                            if ($form_id != "0") {
                                                echo '<input style="border-radius: 5px;" type="text" class="form-control" id="title" value="' . $form[0]["TITLE"] . '" required>';
                                            } else {
                                                echo '<input style="border-radius: 5px;" type="text" class="form-control" id="title" required>';
                                            }
                                            ?>
                                        </div>
                                        <button type="button" class="btn btn-success add-item-button px-4 py-1 mb-4" style="font-size: 14px; border: solid 1px #6945A5; background-color: white; color: #6945A5;">ADD ITEM</button>
                                        <p><strong>Note:</strong> You can add an asterisk (*) to the value of "Label" field to make it mandatory/required. Example: "First Name*"</p>
                                        <div id="form-items"></div>
                                        <div class="d-flex align-items-center justify-content-center mt-5" style="width: 100%;">
                                            <input type="submit" class="btn text-white px-4" style="background-color: #6945A5; font-size: 12px;" value="SUBMIT">
                                        </div>
                                    </form>
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
                                                            <?php if ($row['IS_READ'] != 1) {
                                                                echo "<b>";
                                                            } ?>
                                                            <?php
                                                            if ($row['M_ID'] == 1) echo (substr($message1, 0, 100) . "...");
                                                            else if ($row['M_ID'] == 2) echo (substr($message2, 0, 100) . "...");
                                                            else if ($row['M_ID'] == 3) echo (substr($message3, 0, 100) . "...");
                                                            else if ($row['M_ID'] == 4) echo (substr($message4, 0, 100) . "...");
                                                            else if ($row['M_ID'] == 5) echo (substr($message5, 0, 50) . "...");
                                                            else if ($row['M_ID'] == 6) echo (substr($message6, 0, 100) . "...");
                                                            ?>
                                                            <?php if ($row['IS_READ'] != 1) {
                                                                echo "</b>";
                                                            } ?>
                                                        </td>
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


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script>
    $('a.nav-link[href="billpayment.php"]').removeClass('active');
    $('a.nav-link[href="index.php"]').removeClass('active');
    $('a.nav-link[href="usage.php"]').removeClass('active');
    $('a.nav-link[href="support.php"]').removeClass('active');
    $('a.nav-link[href="mailbox.php"]').removeClass('active');
    $('a.nav-link[href="webappform.php"]').removeClass('active');
    $('a.nav-link[href="form_management.php"]').addClass('active');
    var form_id = "<?php echo $form_id; ?>";
    var user_id = "<?php echo $user_id; ?>";

    var survey_fpin = "<?php echo getSession("survey_fpin"); ?>";
</script>
<script src="assets/js/edit_form.js?v=<?php echo time(); ?>"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>