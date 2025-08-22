jQuery(document).ready(function($) {
    // ===== Menu toggle mobile =====
    // var menuToggle = $("#menuToggle");
    // var mobileNav = $("#mobileNav");

    // menuToggle.on("click", function() {
    //     mobileNav.toggleClass("show");

    //     // Đổi icon giữa ☰ và ✕
    //     if (mobileNav.hasClass("show")) {
    //         menuToggle.html('&times;'); // ✕
    //     } else {
    //         menuToggle.html('&#9776;'); // ☰
    //     }
    // });

    // // ===== Submenu accordion =====
    // $(".mobile-toggle").on("click", function() {
    //     var button = $(this);
    //     var parent = button.closest(".mobile-nav-item");
    //     var submenu = parent.find(".mobile-submenu");
    //     var icon = button.find(".toggle-icon");

    //     // Close all other submenus
    //     $(".mobile-nav-item").not(parent).each(function() {
    //         $(this).removeClass("open").find(".mobile-submenu").removeClass("show");
    //         $(this).find(".toggle-icon").text("＋");
    //     });

    //     // Toggle current submenu
    //     if (parent.hasClass("open")) {
    //         parent.removeClass("open");
    //         submenu.removeClass("show");
    //         icon.text("＋");
    //     } else {
    //         parent.addClass("open");
    //         submenu.addClass("show");
    //         icon.text("−");
    //     }
    // });

    // ===== Scrollable news list =====
    var list = $("#newsList");
    if (list.length) {
        list.css("overflow-y", "hidden");

        var items = [];
        var tops = [];
        var COUNT = 2;

        function measure() {
            items = list.find(".news-item").toArray();
            tops = items.map(function(el){ return $(el).position().top; });

            // chiều cao viewport = tổng 2 item đầu
            if (items.length >= 2) {
                var h = $(items[0]).outerHeight(true) + $(items[1]).outerHeight(true);
                list.css("max-height", h + "px");
            }
            updateButtons();
        }

        function headIndex() {
            var st = list.scrollTop();
            var l = 0, r = tops.length - 1, ans = 0;
            while(l <= r) {
                var m = (l + r) >> 1;
                if(tops[m] <= st + 1){ ans = m; l = m + 1; }
                else r = m - 1;
            }
            return ans;
        }

        function scrollToHead(i, smooth = true) {
            if (!tops.length) return;
            var maxHead = Math.max(0, items.length - COUNT);
            i = Math.max(0, Math.min(i, maxHead));
            list.stop().animate({scrollTop: tops[i]}, smooth ? 400 : 0);
            setTimeout(updateButtons, 200);
        }

        // API cho nút ▲ / ▼
        window.scrollNews = function(dir) {
            var i = headIndex();
            scrollToHead(i + (dir > 0 ? 1 : -1), true);
        };

        function updateButtons() {
            var upBtn = $(".scroll-btn.up");
            var downBtn = $(".scroll-btn.down");
            if (!upBtn.length || !downBtn.length) return;
            var i = headIndex();
            var maxHead = Math.max(0, items.length - COUNT);
            upBtn.prop("disabled", i <= 0);
            downBtn.prop("disabled", i >= maxHead);
        }

        list.on("scroll", function(){ updateButtons(); });
        var rt = null;
        $(window).on("resize", function(){
            clearTimeout(rt);
            rt = setTimeout(measure, 120);
        });

        measure();
    }
});
