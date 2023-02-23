if (window.Android) {
    // do nothing
} else {

    // fetch the floating button and insert required js
    fetch("https://qmera.io/qmera_button/paliobutton.html?v=238990")
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
                let open = true; // floating button initial pos: open
                var $ = window.jQuery;

                

                $(function () {
                    // $("#wrap-all").draggable({
                    //     containment: "window",
                    //     appendTo: "body"
                    // });
                    var $elements = [$('#feature-buttons'), $('#palio-button-1')];
                    $("#feature-buttons, #palio-button-1").draggable({
                        containment: "window",
                        start: function (ev, ui) {
                            var $elem
                            for (var i in $elements) {
                                $elem = $elements[i];
                                if ($elem[0] != this) {
                                    $elem.data('dragStart', $elem.offset());
                                }
                            }
                        },
                        drag: function (ev, ui) {
                            var xPos, $elem,
                            deltaX = ui.position.left - ui.originalPosition.left;
                            deltaY = ui.position.top - ui.originalPosition.top;
                            for (var i in $elements) {
                                $elem = $elements[i];
                                if ($elem[0] != this) {
                                    $elem.offset({
                                        top: $elem.data('dragStart').top + deltaY,
                                        left: $elem.data('dragStart').left + deltaX
                                    });
                    
                                }
                            }
                        }
                    })

                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]',
                    });

                    $("#palio-button-1").click(function () {
                        if (open) {
                            // $("#feature-buttons").css('visibility', 'hidden');
                            $("#qbutton-1").animate({opacity: 0}, 150);
                            $("#qbutton-2").delay(150).animate({opacity: 0}, 150);
                            $("#qbutton-3").delay(300).animate({opacity: 0}, 150);
                            // $("#qbutton-4").delay(450).animate({opacity: 0}, 150);
                            $("#qbutton-4").delay(450).animate({
                                opacity: 0}, 
                                {
                                    duration: 150,
                                    complete: function() {
                                        $("#feature-buttons").css('visibility', 'hidden');
                                    }
                                });
                            
                                open = false;
                        } else {
                            
                            // $("#feature-buttons").css('visibility', 'unset');
                            $("#qbutton-4").animate({opacity: 1}, 150);
                            $("#qbutton-3").delay(150).animate({opacity: 1}, 150);
                            $("#qbutton-2").delay(300).animate({opacity: 1}, 150);
                            // $("#qbutton-1").delay(450).animate({opacity: 1}, 150);
                            $("#qbutton-1").delay(450).animate({
                                opacity: 1}, 
                                {
                                    duration: 150,
                                    complete: function() {
                                        $("#feature-buttons").css('visibility', 'visible');
                                    }
                                });
                            open = true;
                        }
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
                        if (open) {
                            // $("#feature-buttons").css('visibility', 'hidden');
                            $("#qbutton-1").animate({opacity: 0}, 150);
                            $("#qbutton-2").delay(150).animate({opacity: 0}, 150);
                            $("#qbutton-3").delay(300).animate({opacity: 0}, 150);
                            $("#qbutton-4").delay(450).animate({opacity: 0}, 150);
                            open = false;
                        } else {
                            // $("#feature-buttons").css('visibility', 'unset');
                            $("#qbutton-4").animate({opacity: 1}, 150);
                            $("#qbutton-3").delay(150).animate({opacity: 1}, 150);
                            $("#qbutton-2").delay(300).animate({opacity: 1}, 150);
                            $("#qbutton-1").delay(450).animate({opacity: 1}, 150);
                            open = true;
                        }
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