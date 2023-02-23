<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/db_conn.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/url_function.php'); ?>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/session_function.php'); ?>
<?php

$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 15;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

$dbconn = getDBConn();

if (isset($_SESSION['bill_id']) && $_SESSION['bill_id'] != '') {
  $bill_id = $_SESSION['bill_id'];
  $company_id = $_SESSION['id_company'];
  $user_id = $_SESSION['id_user'];

  $query = $dbconn->prepare("SELECT bil.* FROM BILLING as bil INNER JOIN COMPANY_INFO AS com WHERE bil.COMPANY = com.COMPANY AND bil.company = ? AND bil.ID = ?");
  $query->bind_param('si', $company_id, $bill_id);
  $query->execute();
  $bill = $query->get_result()->fetch_assoc();
  $query->close();

  $query = $dbconn->prepare("SELECT * FROM PAYMENT WHERE BILL = ? AND COMPANY = ?");
  $query->bind_param("si", $bill_id, $company_id);
  $query->execute();
  $payment = $query->get_result()->fetch_assoc();
  $payment_method = $payment['PAYMENT_METHOD'];
  $query->close();
} else {
  header("Location:" . base_url() . "dashboardv2/billpayment.php");
}

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Qmera | Billing Statement</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body style="padding: 20px;">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <img src="../assets/Q_Power_Button.png" alt="Qmera Logo" class="brand-image" style="max-width: 60px;">
            Qmera
            <small class="float-right">Date: <?php echo date('m/d/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div> -->
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div> -->
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <br>
          <b>Invoice </b>#<?php echo $bill['ORDER_NUMBER']; ?><br>
          <!-- <b>Order ID:</b> 4F3S8J<br> -->
          <b>Payment Due:</b> <?php echo date("m/d/Y", strtotime($bill['DUE_DATE'])); ?><br>
          <br>
          <!-- <b>Account:</b> 968-34567 -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <!-- <th>Qty</th> -->
                <th>Items</th>
                <!-- <th>Serial #</th> -->
                <!-- <th>Description</th> -->
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <strong>Qmera Lite Package</strong>, which includes:
                  <ul>
                    <li>
                      Customer Engagement features on your app
                      <ul>
                        <li>
                          Mobile Contact Centers,
                        </li>
                        <li>
                          Push Notifications,
                        </li>
                        <li>
                          In-app Messaging,
                        </li>
                        <li>
                          Live Video Streaming,
                        </li>
                        <li>
                          Video and VoIP Calls
                        </li>
                      </ul>
                    </li>
                    <li>
                      Customer Engagement Credit that you can use for
                      <ul>
                        <li>
                          Up to 5,000,000 Monthly Text Recipients <sup>(1)</sup>
                        </li>
                        <li>
                          Up to 50,000 Monthly Image Recipients <sup>(2)</sup>
                        </li>
                        <li>
                          Up to 5,000 Monthly Video Recipients <sup>(3)</sup>
                        </li>
                        <li>
                          Up to 3,000 Monthly Minutes Livestream Recipients <sup>(4)</sup>
                        </li>
                        <li>
                          Up to 50,000 Monthly Minutes 1-1 VoIP Calls <sup>(5)</sup>
                        </li>
                        <li>
                          Up to 500 Monthly Minutes 1-1 Video Calls <sup>(6)</sup>
                        </li>
                      </ul>
                    </li>
                    <li>
                      Customer Support via Live Chat on catchUp
                    </li>
                  </ul>
                </td>
                <td>
                  <?php echo $bill['CURRENCY'] . " " . $bill['CHARGE'] ?>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>

          <?php
          if ($payment_method == 'Credit Card / Debit Card') {
            echo '<img src="../../dist/img/credit/cards.png" alt="Credit Card / Debit Card"><br>';
            echo '( Credit Card / Debit Card )';
          } elseif ($payment_method == 'OVO E-Wallet') {
            echo '<img src="../../dist/img/credit/ovo.png" alt="OVO E-Wallet"><br>';
            echo ('( OVO E-Wallet )');
          } elseif ($payment_method == 'PAYPAL') {
            echo '<img src="../../dist/img/credit/paypal.png" alt="Paypal"><br>';
            echo ('( PAYPAL )');
          }
          ?>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Amount Due: <?php echo date("m/d/Y", strtotime($bill['DUE_DATE'])); ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>
                  <?php echo $bill['CURRENCY'] . " " . $bill['CHARGE']; ?>
                </td>
              </tr>
              <!-- <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr> -->
              <tr>
                <th>Total:</th>
                <td><strong><?php echo $bill['CURRENCY'] . " " . $bill['CHARGE']; ?></strong></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-10">
          <ol id="hint-list" style="font-size:12px; padding-left: .8em;">
            <li>
              Up to 1,000 chars for each text. For each text sent, the credit will be deducted by the number of recipients of the message. For example, you can send 5,000 texts to 1,000 recipients.
            </li>
            <li>
              Up to 250 KB for each image. For each image sent, the credit will be deducted by the number of recipients of the image; For example, you can send 50 images to 1,000 recipients.
            </li>
            <li>
              Up to 2.5 MB for each video. For each video sent, the credit will be deducted by the number of recipients of the image; For example, you can send 5 videos to 1,000 recipients.
            </li>
            <li>
              Up to 3 minutes livestream to 1,000 recipients.
            </li>
            <li>
              If you, for example, have 10 team members, they can have 5,000 (50,000/10) minutes of VoIP Calls between them.
            </li>
            <li>
              If you, for example, have 10 team members, they can have 50 (500/10) minutes of Video Calls between them.
            </li>
          </ol>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->

  <script src="jquery.min.js"></script>
  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>

</body>

</html>