jQuery(document).ready(function($) {
    $('.creation-interview-box').each(function() {
        var box = $(this);
        var overwhole = box.find('.interview-overwhole');
        var prevBtn = box.find('.overwhole-btn.prev');
        var nextBtn = box.find('.overwhole-btn.next');
        var items = overwhole.find('.overwhole-item img');
        var bigImage = box.find('.creation-interview-left img');

        var itemsPerPage = 3;
        var gap = 15;
        var itemWidth = items.first().outerWidth(true); // width + margin
        var totalItems = items.length;
        var maxOffset = Math.max(0, (totalItems - itemsPerPage) * itemWidth - gap);

        var offset = 0;

        // Thêm transition mượt cho slider
        overwhole.css("transition", "transform 0.4s ease");

        function updateSlider() {
            if (offset > maxOffset) offset = maxOffset;
            if (offset < 0) offset = 0;
            overwhole.css("transform", "translateX(-" + offset + "px)");

            // Update trạng thái nút
            prevBtn.prop('disabled', offset === 0).css('opacity', offset === 0 ? 0.3 : 1);
            nextBtn.prop('disabled', offset >= maxOffset).css('opacity', offset >= maxOffset ? 0.3 : 1);
        }

        // Click ảnh nhỏ -> đổi ảnh lớn kèm fade
        items.each(function() {
            $(this).on('click', function() {
                bigImage.addClass('fade-out');
                var src = $(this).attr('src');
                setTimeout(function() {
                    bigImage.attr('src', src).removeClass('fade-out');
                }, 400);
            });
        });

        // Click next / prev
        nextBtn.on('click', function() {
            offset += itemWidth;
            updateSlider();
        });
        prevBtn.on('click', function() {
            offset -= itemWidth;
            updateSlider();
        });

        // Khởi tạo slider
        updateSlider();
    });
});
