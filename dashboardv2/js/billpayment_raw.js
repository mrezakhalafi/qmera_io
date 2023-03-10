
    $('#exportCSV').click(function() {
        if (!$('.monthly-bill')[0]) {
            alert('No data present!');
        } else {
            xport.toCSV('bills-csv');
        }
    });

var xport = {
    _fallbacktoCSV: true,
    toCSV: function(tableId, filename) {
        this._filename = (typeof filename === 'undefined') ? tableId : filename;
        // Generate our CSV string from out HTML Table
        var csv = this._tableToCSV(document.getElementById(tableId));
        // Create a CSV Blob
        var blob = new Blob([csv], {
            type: "text/csv"
        });

        // Determine which approach to take for the download
        if (navigator.msSaveOrOpenBlob) {
            // Works for Internet Explorer and Microsoft Edge
            navigator.msSaveOrOpenBlob(blob, this._filename + ".csv");
        } else {
            this._downloadAnchor(URL.createObjectURL(blob), 'csv');
        }
    },
    _getMsieVersion: function() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf("MSIE ");
        if (msie > 0) {
            // IE 10 or older => return version number
            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
        }

        var trident = ua.indexOf("Trident/");
        if (trident > 0) {
            // IE 11 => return version number
            var rv = ua.indexOf("rv:");
            return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
        }

        var edge = ua.indexOf("Edge/");
        if (edge > 0) {
            // Edge (IE 12+) => return version number
            return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);
        }

        // other browser
        return false;
    },
    _isFirefox: function() {
        if (navigator.userAgent.indexOf("Firefox") > 0) {
            return 1;
        }

        return 0;
    },
    _downloadAnchor: function(content, ext) {
        var anchor = document.createElement("a");
        anchor.style = "display:none !important";
        anchor.id = "downloadanchor";
        document.body.appendChild(anchor);

        // If the [download] attribute is supported, try to use it

        if ("download" in anchor) {
            anchor.download = this._filename + "." + ext;
        }
        anchor.href = content;
        anchor.click();
        anchor.remove();
    },
    _tableToCSV: function(table) {
        // We'll be co-opting `slice` to create arrays
        var slice = Array.prototype.slice;

        return slice
            .call(table.rows)
            .map(function(row) {
                return slice
                    .call(row.cells)
                    .map(function(cell) {
                        return '"t"'.replace("t", cell.textContent);
                    })
                    .join(",");
            })
            .join("\r\n");
    }
};

// function dl_invoice() {
//     $("#submit").click();
// };

// $('#show-more').click(function() {
//     $(this).css('display', 'none');
//     $('#bills .bills-more').css('display', 'block');
// });

// $('#show-less').click(function() {
//     $('#bills .bills-more').css('display', 'none');
//     $('#bills .show-more, .show-more #show-more').css('display', 'block');
// });

// $('a.nav-link[href="billpayment.php"]').addClass('active');
// $('a.nav-link[href="index.php"]').removeClass('active');
// $('a.nav-link[href="usage.php"]').removeClass('active');
// $('a.nav-link[href="support.php"]').removeClass('active');
// $('a.nav-link[href="mailbox.php"]').removeClass('active');

// window.onload = function() {
//     <?php if ($billing['CURRENCY'] == 'IDR') { ?>
//         $('.billAmount').each(function(i, obj) {
//             //test
//             $(this).text(parseFloat($(this).text()).toLocaleString('id', {
//                 minimumFractionDigits: 2,
//                 maximumFractionDigits: 2,
//             }));
//         });
//     <?php } else if ($billing['CURRENCY'] == 'USD') { ?>
//         $('.billAmount').each(function(i, obj) {
//             //test
//             $(this).text(parseFloat($(this).text()).toLocaleString('en-US', {
//                 minimumFractionDigits: 2,
//                 maximumFractionDigits: 2,
//             }));
//         });
//     <?php } else { ?>
//         if (localStorage.country_code == 'ID') {
//             $('.billAmount').each(function(i, obj) {
//                 //test
//                 $(this).text(parseFloat($(this).text()).toLocaleString('id', {
//                     minimumFractionDigits: 2,
//                     maximumFractionDigits: 2,
//                 }));
//             });
//         } else if (localStorage.country_code != 'ID') {
//             $('.billAmount').each(function(i, obj) {
//                 //test
//                 $(this).text(parseFloat($(this).text()).toLocaleString('en-US', {
//                     minimumFractionDigits: 2,
//                     maximumFractionDigits: 2,
//                 }));
//             });
//         }
//     <?php } ?>
// }