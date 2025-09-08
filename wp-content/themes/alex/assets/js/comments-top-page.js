(function () {
  const ready = (fn) =>
    document.readyState === 'loading'
      ? document.addEventListener('DOMContentLoaded', fn, { once: true })
      : fn();

  ready(() => {
    // ===== Slider nhân sự =====
    document.querySelectorAll('.interview-slider').forEach((slider) => {
      const scroller = slider.querySelector('.interview-stack');
      const prevBtn  = slider.querySelector('.slide-interview-btn.prev');
      const nextBtn  = slider.querySelector('.slide-interview-btn.next');
      if (!scroller || !prevBtn || !nextBtn) return;

      // ÉP là container cuộn ngang (phòng khi CSS thiếu)
      scroller.style.overflowX = 'auto';
      scroller.style.scrollBehavior = 'smooth';
      scroller.style.webkitOverflowScrolling = 'touch';

      // Bước cuộn theo kích thước thực tế
      const getStep = () => {
        const item = scroller.querySelector('.stack-item');
        if (!item) return scroller.clientWidth;
        const rect = item.getBoundingClientRect();
        const gap  = parseFloat(getComputedStyle(scroller).gap || '0');
        return rect.width + gap;
      };
      const clamp   = (v, min, max) => Math.min(Math.max(v, min), max);
      const maxLeft = () => Math.max(0, scroller.scrollWidth - scroller.clientWidth);

      const updateButtons = () => {
        const fits = scroller.scrollWidth <= scroller.clientWidth + 1;
        prevBtn.style.display = fits ? 'none' : '';
        nextBtn.style.display = fits ? 'none' : '';
        const max = maxLeft() - 1;
        prevBtn.disabled = scroller.scrollLeft <= 0;
        nextBtn.disabled = scroller.scrollLeft >= max;
        prevBtn.style.opacity = prevBtn.disabled ? 0.3 : 1;
        nextBtn.style.opacity = nextBtn.disabled ? 0.3 : 1;
      };

      // Điều hướng
      prevBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const left = clamp(scroller.scrollLeft - getStep(), 0, maxLeft());
        scroller.scrollTo({ left, behavior: 'smooth' });
      });
      nextBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const left = clamp(scroller.scrollLeft + getStep(), 0, maxLeft());
        scroller.scrollTo({ left, behavior: 'smooth' });
      });

      scroller.addEventListener('scroll', updateButtons, { passive: true });
      window.addEventListener('resize', updateButtons);
      updateButtons();

      // ===== Popup (event delegation) =====
      slider.addEventListener('click', (e) => {
        if (e.target.closest('.slide-interview-btn')) return; // bấm nút -> không mở popup
        const item = e.target.closest('.stack-item');
        if (!item || !slider.contains(item)) return;

        const sel   = item.getAttribute('data-popup');
        const popup = sel && document.querySelector(sel);
        if (!popup) return;

        document.querySelectorAll('.interview-popup-overlay')
          .forEach(p => p.classList.remove('active'));

        popup.classList.add('active');
        document.body.classList.add('popup-open');
      });
    });

    // Đóng popup khi click ngoài
    document.querySelectorAll('.interview-popup-overlay').forEach((popup) => {
      popup.addEventListener('click', (e) => {
        if (e.target === popup) {
          popup.classList.remove('active');
          document.body.classList.remove('popup-open');
        }
      });
    });
  });
})();
