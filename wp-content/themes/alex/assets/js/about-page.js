jQuery(document).ready(function($) {
    $('nav.submenu-tabs a[href^="#"]').on('click', function(e) {
        e.preventDefault();

        var targetID = $(this).attr('href').substring(1);
        var targetEl = $('#' + targetID);

        if (targetEl.length) {
            var yOffset = -100; // khoảng cách bù trừ cho header fixed
            var y = targetEl.offset().top + yOffset;

            $('html, body').animate({ scrollTop: y }, 600); // 600ms để scroll mượt
        }
    });
});
