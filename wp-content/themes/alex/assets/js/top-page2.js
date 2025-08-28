jQuery(document).ready(function($) {
    // ===== Slider staff =====
    var stack = $('.interview-stack');
    var prevBtn = $('.slide-interview-btn.prev');
    var nextBtn = $('.slide-interview-btn.next');
    var items = stack.find('.stack-item');
    var gap = 15;
    var offset = 0;

    function getItemWidth() {
        return items.first().outerWidth(true); // width + margin
    }

    function getItemsPerPage() {
        var w = $(window).width();
        if (w <= 768)  return 2;
        if (w <= 1200) return 3;
        if (w <= 1600) return 4;
        return 5;
    }

    function getMaxOffset() {
        var itemWidth = getItemWidth();
        var itemsPerPage = getItemsPerPage();
        var totalItems = items.length;
        if (totalItems <= itemsPerPage) return 0;

        var totalWidth = totalItems * itemWidth - gap;
        var containerWidth = stack.parent().width();
        return Math.max(0, totalWidth - containerWidth);
    }

    function updateSliderStaff() {
        var containerWidth = stack.parent().width();
        var totalItems = items.length;
        var itemWidth = getItemWidth();
        var totalWidth = totalItems * itemWidth - gap;
        var maxOffset = getMaxOffset();

        if (totalWidth <= containerWidth) {
            var gapCenter = (containerWidth - totalWidth) / 2;
            stack.css({
                transform: "translateX(" + gapCenter + "px)",
                transition: "transform 0.4s ease"
            });
            prevBtn.hide();
            nextBtn.hide();
            return;
        }

        offset = Math.max(0, Math.min(offset, maxOffset));

        stack.css({
            transform: "translateX(-" + offset + "px)",
            transition: "transform 0.4s ease"
        });

        prevBtn.show().prop('disabled', offset === 0).css('opacity', offset === 0 ? 0.3 : 1);
        nextBtn.show().prop('disabled', offset >= maxOffset).css('opacity', offset >= maxOffset ? 0.3 : 1);
    }

    nextBtn.on('click', function(){ offset += getItemWidth(); updateSliderStaff(); });
    prevBtn.on('click', function(){ offset -= getItemWidth(); updateSliderStaff(); });
    $(window).on('resize', function(){ offset = 0; updateSliderStaff(); });

    updateSliderStaff();

    // ===== Popup click =====
    $('.stack-item').on('click', function(){
        var item = $(this);
        var popupSelector = item.data('popup');
        var popup = $(popupSelector);

        // Ẩn tất cả popup
        $('.interview-popup-overlay').removeClass('active');

        // Hiện popup tương ứng
        popup.addClass('active');

        $('body').addClass('popup-open');
    });

    // Đóng popup khi click ra ngoài
    $('.interview-popup-overlay').on('click', function(e){
        if (e.target === this) {
            $(this).removeClass('active');
            $('body').removeClass('popup-open');
        }
    });
});
