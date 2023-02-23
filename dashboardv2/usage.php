<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_header.php'); ?>
<?php

// state control
$_SESSION['previous_page'] = $_SESSION['current_page'];
$_SESSION['current_page'] = 14;
require_once($_SERVER['DOCUMENT_ROOT'] . '/state_control.php');

unset($_SESSION['bill']);

$company_id = getSession('id_company');
echo "<script>base_url = '" . base_url() . "';</script>";

$query = $dbconn->prepare("SELECT a.* FROM USAGE_DETAIL a, USAGE_SUMMARY b WHERE a.USAGE_SUMMARY = b.ID AND b.COMPANY_ID = ?");
$query->bind_param("s", $company_id);
$query->execute();
$result = $query->get_result();

?>

<style>
    @media (min-width: 1200px) {
        .content-wrapper>.content>.container-fluid {
            padding: 0 5rem 0 3.5rem;
        }
    }

    table.dataTable.stripe tbody tr.odd,
    table.dataTable.display tbody tr.odd {
        background-color: white;
    }

    table.dataTable tbody td {
        padding: 23px 10px;
    }

    .dataTables_wrapper * {
        font-size: 12px;
        font-weight: 500;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 15px 10px;
        border: 0;
        background-color: #f1f1f1;
    }

    table.dataTable.display tbody tr.even>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.even>.sorting_1,
    table.dataTable.display tbody tr.odd>.sorting_1,
    table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
        background-color: white;
    }

    .dataTables_length#table_id_length {
        width: 100%;
    }

    .dataTables_info#table_id_info {
        color: gray;
    }

    .dataTables_length#table_id_length>label {
        display: flex;
        align-items: baseline;
        color: gray;
    }

    .dataTables_wrapper .dataTables_length select {
        width: fit-content;
        padding: 0 20px;
        margin-left: 20px;
    }

    .card {
        padding: 2.25rem;
    }

    .card-body {
        padding: 0;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #ddd;
    }

    .dataTables_wrapper .dataTables_paginate {
        margin-top: 1.5rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: none;
        border: none;
        color: black !important;
        margin: 0 .85rem !important;
        padding: .1rem .5rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
        border: none;
        background: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        border: none;
        color: black !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        background: none;
        border: none;
        color: black !important;
        box-shadow: none;
    }

    .paginate_button#table_id_previous {
        border-right: 1px solid lightgrey;
    }

    .paginate_button#table_id_next {
        border-left: 1px solid lightgray;
    }

    input.paginate_input {
        border: 1px solid lightgray;
        border-radius: 5px;
        padding: 0.1rem 0.4rem;
        margin-right: 5px;
    }
</style>


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

            <hr style="margin: 0; margin-bottom: 40px; margin-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-6 col-md-10">
                                <h4 class="card-name">Usage Record</h4>
                            </div>
                            <div class="col-6 col-md-2">
                                <div class="search-bills">
                                    <input id="search-table" type="text" placeholder="Search" />
                                    <img src="assets/icons/Search-(grey).png" style="height: 20px; width:auto;">
                                </div>
                                <!-- <input class="form-control" id="search-bill" type="text" placeholder="Search by period" /> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="display" width="100%"></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card usg-breakdown" id="usage_breakdown" style="display:none;">
                        <div class="card-header" style="border-bottom: 0;">
                            <h5><i class="fa fa-times" id="closeDeets" style="float:right;"></i></h5>
                        </div>
                        <div class="card-body">
                            <strong>
                                <h4>Details for content ID '<span id='selectContentId'></span>'</h4>
                            </strong>
                        </div>
                        <table id="table_id_detail" class="display table-detail" width="100%"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" charset="utf8" src="DataTables/datatables.min.js" defer></script>

<script src="DataTables/input.js" defer></script>

<script>
    var comp_id = <?php echo $company_id ?>;

    // var comp_data;
    var result = [];
    var jsonarr;
    let table;

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: 'dataTables_populate.php?company_id=' + comp_id,
            dataType: 'json',
            success: function(obj, textstatus) {
                // console.log(obj);
                table = $('#table_id').DataTable({
                    responsive: true,
                    data: obj,
                    columns: [{
                            data: "SERVICE_TYPE",
                            title: "SERVICE TYPE"
                        },
                        {
                            data: "FROM",
                            title: "FROM"
                        },
                        {
                            data: "TO",
                            title: "TO"
                        },
                        {
                            data: "RECIPIENTS",
                            title: "RECIPIENTS"
                        },
                        {
                            data: "CONTENT_ID",
                            title: "CONTENT ID"
                        },
                        {
                            data: "HIDDEN_CONTENT_ID",
                            title: "HIDDEN CONTENT ID"
                        },
                        {
                            data: "CREATED_AT",
                            title: "CREATED AT"
                        },
                        {
                            data: "DURATION",
                            title: "DURATION (MINS)"
                        },
                        {
                            data: "RATE_AMOUNT",
                            title: "RATE"
                        },
                    ],
                    pagingType: 'input',
                    language: {
                        oPaginate: {
                            sNext: 'NEXT <span style="margin:0 10px; color:orange;">&gt;</span>',
                            sPrevious: '<span style="margin:0 10px; color:orange;">&lt;</span> PREVIOUS',
                            sFirst: '',
                            sLast: ''
                        }
                    },
                    columnDefs: [{
                        "targets": [5],
                        "visible": false,
                    }],
                    dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'i>>" +
                        "<'row'<'col-sm-12't>>" +
                        "<'row'<'col-sm-12 col-md-5'><'col-sm-12 col-md-7'p>>"
                });
                $('#table_id tbody').on('click', 'tr', function() {
                    var rowdata = table.row(this).data();
                    if ($('#table_id_detail').hasClass('dataTable')) {
                        $('#table_id_detail').DataTable().clear().destroy();
                    }
                    // console.log('TYPE: ' + rowdata.SERVICE_TYPE);
                    if (rowdata.SERVICE_TYPE === 'LIVE STREAMING' || rowdata.SERVICE_TYPE === 'VIDEO CALL' || rowdata.SERVICE_TYPE === 'VOIP CALL') {
                        var raw_ID = rowdata.HIDDEN_CONTENT_ID;
                        var encode_plus = btoa(raw_ID);
                        // console.log('base64 content ID: ' + encode_plus);
                        getUsageDetail('1', rowdata.CONTENT_ID, encode_plus);
                    } else {
                        getUsageDetail('0', rowdata.CONTENT_ID, rowdata.CONTENT_ID);
                    }

                });
            },
            error: function(obj, textstatus) {
                alert(obj.msg);
            }
        });

        $('#table_id').on('draw.dt', function() {
            $('#table_id_length label').contents().filter(function() {
                return this.nodeType == Node.TEXT_NODE;
            }).each(function() {
                this.textContent = this.textContent.replace('Show'.trim(), 'Results per page: ');
                this.textContent = this.textContent.replace('entries'.trim(), '');
            });

            $('#table_id_paginate span').contents().filter(function() {
                return this.nodeType == Node.TEXT_NODE;
            }).each(function() {
                this.textContent = this.textContent.replace('Page'.trim(), '');
                // this.textContent = this.textContent.replace('of'.trim(), ' out of ');
            });

            $('input.paginate_input').attr('size', 5);

            $('#search-table').on('keyup', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    // Do something                    
                    table.search($(this).val()).draw();
                    return false;
                }
            });
        })

        $('#closeDeets').click(function() {
            $('#table_id_detail').DataTable().clear().destroy();
            $('#usage_breakdown').hide();
        });

        function getUsageDetail(type, content_id, hidden_content_id) {
            $.ajax({
                type: "GET",
                url: 'dataTables_populate_1.php?company_id=' + comp_id + '&content_id=' + hidden_content_id + '&content_type=' + type,
                dataType: 'json',
                success: function(obj, textstatus) {
                    $('#usage_breakdown').show();
                    $('#selectContentId').html(content_id);
                    var table_detail = $('#table_id_detail').DataTable({
                        searching: false,
                        paging: false,
                        responsive: true,
                        data: obj,
                        columns: [{
                                data: "SERVICE_TYPE",
                                title: "SERVICE TYPE"
                            },
                            {
                                data: "FROM",
                                title: "FROM"
                            },
                            {
                                data: "TO",
                                title: "TO"
                            },
                            {
                                data: "CONTENT_ID",
                                title: "CONTENT ID"
                            },
                            {
                                data: "CREATED_AT",
                                title: "CREATED AT"
                            },
                            {
                                data: "DURATION",
                                title: "DURATION (MINS)"
                            },
                        ]
                    });
                },
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('a.nav-link[href="billpayment.php"]').removeClass('active');
        $('a.nav-link[href="index.php"]').removeClass('active');
        $('a.nav-link[href="usage.php"]').addClass('active');
        $('a.nav-link[href="support.php"]').removeClass('active');
        $('a.nav-link[href="mailbox.php"]').removeClass('active');
        $('a.nav-link[href="webappform.php"]').removeClass('active');
        $('a.nav-link[href="form_management.php"]').removeClass('active');
    }, false);
</script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/dashboardv2/dashboard_footer.php'); ?>



</body>

</html>