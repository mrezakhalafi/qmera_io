if (window.Android) {
    // do nothing
} else {

    // fetch the floating button and insert required js
    fetch("https://qmera.io/qmera_button/paliobutton.html?v=5")
        .then((response) => response.text())
        .then((data) => {
            //document.body.insertAdjacentHTML('afterbegin', paliobutton);
            let body = document.querySelector(".u-body");

            if (body == null) {
                body = document.querySelector("body");
            }

            var paliobutton = data.replace(/\s*\n\s*/g, "");
            body.insertAdjacentHTML("afterbegin", paliobutton);

            var script1 = document.createElement("script");
            script1.src = "https://qmera.io/qmera_button/js/jquery.min.js?v=5";
            document.head.append(script1);

            var script2 = document.createElement("script");
            script2.src = "https://qmera.io/qmera_button/js/jquery-ui.min.js?v=5";
            script2.onload = function () {
                var $ = window.jQuery;
                $(function () {
                    $("#wrap-all").draggable({
                        containment: "window",
                    });

                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]',
                    });

                    $("#palio-button-1").click(function () {
                        $("#feature-buttons").slideToggle("slow");
                    });

                    document.getElementById("palio-button-1").addEventListener("touchstart", tapHandler);
                    var tapedTwice = false;

                    function tapHandler(event) {
                        if (!tapedTwice) {
                            tapedTwice = true;
                            setTimeout(function () {
                                tapedTwice = false;
                            }, 500);
                            return false;
                        }
                        event.preventDefault();
                        $("#feature-buttons").slideToggle("slow");
                    }

                    // prevent from being hidden when resizing
                    var dragDiv = $("#wrap-all");

                    $(window).resize(function () {
                        if ($(window).innerWidth() > $(dragDiv).width()) {
                            var oLeft = parseInt($(window).innerWidth() - $(dragDiv).width());
                            var posLeft = parseInt($(dragDiv).css("left"));
                            if (posLeft > oLeft) {
                                $(dragDiv).css("left", oLeft);
                                toPercent();
                            }
                        }

                        if ($(window).innerHeight() > $(dragDiv).height()) {
                            var oTop = parseInt($(window).innerHeight() - $(dragDiv).height());
                            var posTop = parseInt($(dragDiv).css("top"));
                            if (posTop > oTop) {
                                $(dragDiv).css("top", oTop);
                                toPercent();
                            }
                        }
                    });

                    function toPercent() {
                        $(dragDiv).css("left", parseInt($(dragDiv).css("left")) / (wrapper.innerWidth() / 100) + "%");
                        $(dragDiv).css("top", parseInt($(dragDiv).css("top")) / (wrapper.innerHeight() / 100) + "%");
                    }
                });
            };
            document.head.append(script2);

            var link = document.createElement("link");
            link.rel = "stylesheet";

            link.type = "text/css";
            link.href = "https://qmera.io/qmera_button/css/paliopay.css?v=5";
            document.head.append(link);

            var script4 = document.createElement("script");
            script4.src = "https://qmera.io/qmera_button/js/xendit.min.js?v=5";
            document.head.append(script4);

            var script3 = document.createElement("script");
            script3.src = "https://qmera.io/qmera_button/js/paliopay.js?v=5";
            document.head.append(script3);
        });
}