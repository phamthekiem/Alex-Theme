jQuery(document).ready(function($) {
    $(document).on('click', '.arrow-icon', function(e) {
        var icon = $(this);
        var section = icon.closest('section.recruit-heading');
        if (!section.length) return;

        var wrapper = section.find('.building-video .video-wrapper');
        if (!wrapper.length) return;

        var img = wrapper.find('.default-building-img');
        var iframe = wrapper.find('iframe');
        if (!iframe.length || !img.length) return;

        var videoId = icon.data('video');
        if (!videoId) return;

        var start = parseInt(icon.data('start') || 0, 10);
        var url = "https://www.youtube.com/embed/" + videoId + "?rel=0&autoplay=1" + (start ? "&start=" + start : "");

        // Ẩn ảnh, hiện video
        img.hide();
        iframe.show();

        if (iframe.attr('src') !== url) {
            iframe.attr('src', url);
        }
    });
});
