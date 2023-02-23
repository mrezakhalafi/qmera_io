<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>

<?php
// if (isset($_REQUEST['user_id'])) {
//     $user_id = $_REQUEST['user_id'];
// }
// else{
//     $user_id = "029c327a22";
// }

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// state control
$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 14;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$forms = include_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/logics/fetch_forms.php');

// $company_id = getSession('id_company');

// $fpin_query = $dbConnPalioLite->prepare("SELECT gr.CREATED_BY 
//     FROM BUSINESS_ENTITY be, GROUPS gr 
//     WHERE be.COMPANY_ID = ?
//     AND gr.BUSINESS_ENTITY = be.ID
//     AND gr.IS_ORGANIZATION = 1");
// $fpin_query->bind_param("i", (int) $company_id);
// $fpin_query->execute();
// $query_result = $fpin_query->get_result()->fetch_assoc();
// $survey_fpin = $query_result['CREATED_BY'];
// $fpin_query->close();

// setSession("survey_fpin", $survey_fpin);
?>

<!-- <!doctype html>
<html lang="en"> -->

<!-- <head> -->
<!-- <title>Timeline</title> -->
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
            <?php
            echo '<a href="edit_form.php?user_id=' . $user_id . '" role="button" class="btn btn-primary my-2">Create New Form</a>';
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($forms as $form) {
                        echo '<tr>';
                        echo '<td>' . $index . '</td>';
                        echo '<td>' . $form["TITLE"] . '</td>';
                        echo '<td>' .
                            '<a href="edit_form.php?form_id=' . $form["FORM_ID"] . '" role="button" class="mr-2 btn btn-secondary btn-edit" style="width: 25%; font-size: 12px;">EDIT</a>' .
                            '<button type="button" value="' . $form["FORM_ID"] . '" class="btn btn-danger btn-delete" style="width: 25%; font-size: 12px;">DELETE</button>' . '</td>';
                        echo '</tr>';
                        $index++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>

<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
<script>
    // var FORM_ID = "<?php //echo $form_id; 
                        ?>";
    // var USER_ID = "<?php //echo $user_id; 
                        ?>";

    document.addEventListener('DOMContentLoaded', function() {
        $('a.nav-link[href="billpayment.php"]').removeClass('active');
        $('a.nav-link[href="index.php"]').removeClass('active');
        $('a.nav-link[href="usage.php"]').removeClass('active');
        $('a.nav-link[href="support.php"]').removeClass('active');
        $('a.nav-link[href="mailbox.php"]').removeClass('active');
        $('a.nav-link[href="webappform.php"]').removeClass('active');
        $('a.nav-link[href="form_management.php"]').addClass('active');
    }, false);
</script>
<script src="assets/js/form_management.js"></script>