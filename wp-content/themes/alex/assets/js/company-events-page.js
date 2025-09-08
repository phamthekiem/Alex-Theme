// document.querySelectorAll('.creation-interview-box').forEach(box => {
//   const scroller = box.querySelector('.interview-overwhole');
//   const prevBtn  = box.querySelector('.overwhole-btn.prev');
//   const nextBtn  = box.querySelector('.overwhole-btn.next');
//   const thumbs   = box.querySelectorAll('.overwhole-item img');
//   const bigImage = box.querySelector('.creation-interview-left img');
//   if (!scroller || !prevBtn || !nextBtn) return;


//   const getStep = () => {
//     const item = scroller.querySelector('.overwhole-item');
//     if (!item) return scroller.clientWidth;
//     const rect = item.getBoundingClientRect();
//     const gap  = parseFloat(getComputedStyle(scroller).gap || 0);
//     return rect.width + gap; 
//   };

//   const clamp = (v, min, max) => Math.min(Math.max(v, min), max);
//   const maxLeft = () => Math.max(0, scroller.scrollWidth - scroller.clientWidth);

//   const updateButtons = () => {
//     const max = maxLeft() - 1; 
//     prevBtn.disabled = scroller.scrollLeft <= 0;
//     nextBtn.disabled = scroller.scrollLeft >= max;
//     prevBtn.style.opacity = prevBtn.disabled ? 0.3 : 1;
//     nextBtn.style.opacity = nextBtn.disabled ? 0.3 : 1;
//   };


//   prevBtn.addEventListener('click', () => {
//     const left = clamp(scroller.scrollLeft - getStep(), 0, maxLeft());
//     scroller.scrollTo({ left, behavior: 'smooth' });
//   });
//   nextBtn.addEventListener('click', () => {
//     const left = clamp(scroller.scrollLeft + getStep(), 0, maxLeft());
//     scroller.scrollTo({ left, behavior: 'smooth' });
//   });

//   scroller.addEventListener('scroll', updateButtons, { passive: true });
//   window.addEventListener('resize', updateButtons);


//   thumbs.forEach(img => {
//     img.addEventListener('click', () => {
//       if (!bigImage) return; 

//       const src = img.currentSrc || img.src || img.getAttribute('src');
//       if (!src) return;

//       bigImage.classList.add('fade-out');
//       setTimeout(() => {
//         bigImage.src = src;
//         bigImage.classList.remove('fade-out');
//       }, 200);

//       thumbs.forEach(t => t.classList.remove('active'));
//       img.classList.add('active');
//     });
//     console.log('Current Big Image:', bigImage);
//     console.log('New Source:', src);
//   });



//   updateButtons();
// });


// JQuery
jQuery(document).ready(function ($) {
  $('.creation-interview-box').each(function () {
    const $box = $(this);
    const $scroller = $box.find('.interview-overwhole');
    const $prevBtn = $box.find('.overwhole-btn.prev');
    const $nextBtn = $box.find('.overwhole-btn.next');
    const $thumbs = $box.find('.overwhole-item img');
    const $bigImage = $box.find('.image-frame-popper img');

    if (!$scroller.length || !$bigImage.length) return;

    const scrollStep = 150;

    // Scroll buttons
    $prevBtn.on('click', function () {
      $scroller.animate({ scrollLeft: $scroller.scrollLeft() - scrollStep }, 300);
    });

    $nextBtn.on('click', function () {
      $scroller.animate({ scrollLeft: $scroller.scrollLeft() + scrollStep }, 300);
    });

    // Click thumbnail
    $thumbs.on('click', function () {
      const $thumb = $(this);
      const newSrc = $thumb.attr('src');
      const newSrcset = $thumb.attr('srcset') || '';
      const newSizes = $thumb.attr('sizes') || '';

      $bigImage.fadeOut(150, function () {
        // ✅ Đổi cả src, srcset, sizes
        $bigImage
          .attr('src', newSrc)
          .attr('srcset', newSrcset)
          .attr('sizes', newSizes)
          .fadeIn(150);
      });

      // Highlight ảnh đang active
      $thumbs.removeClass('active');
      $thumb.addClass('active');
    });

    // Set ảnh đầu tiên nếu chưa có .active
    if (!$thumbs.filter('.active').length) {
      $thumbs.first().addClass('active');
    }
  });
});

