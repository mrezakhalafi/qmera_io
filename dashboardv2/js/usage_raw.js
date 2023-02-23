$('a.nav-link[href="usage.php"]').addClass('active');
    $('a.nav-link[href="index.php"]').removeClass('active');
    $('a.nav-link[href="billpayment.php"]').removeClass('active');

    $('a.nav-link[href="support.php"]').removeClass('active');
    $('a.nav-link[href="mailbox.php"]').removeClass('active');

    
    // var comp_data;
    var result = [];
    var jsonarr;

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: 'dataTables_populate.php?company_id=' + comp_id,
            dataType: 'json',
            success: function(obj, textstatus) {
                // console.log(obj);
                var table = $('#table_id').DataTable({
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
                    columnDefs: [
                        {
                            "targets": [ 5 ],
                            "visible": false,
                        }
                    ]
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

        $('#closeDeets').click(function() {
            $('#table_id_detail').DataTable().clear().destroy();
            $('#usage_breakdown').hide();
        });

        function getUsageDetail(type, content_id, hidden_content_id) {
            $.ajax({
                type: "GET",
                url: 'dataTables_populate_1.php?company_id='+ comp_id +'&content_id=' + hidden_content_id + '&content_type=' + type,
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