// ./js/top-news-scroll.js
(function () {
  if (window.PAGE !== 'top') return;

  function init() {
    const list = document.getElementById('newsList');
    if (!list) return;

    // phần nút trong cùng wrapper để không ảnh hưởng nơi khác
    const wrapper = list.closest('.news-scroll-wrapper') || document;
    const upBtn   = wrapper.querySelector('.scroll-btn.up');
    const downBtn = wrapper.querySelector('.scroll-btn.down');

    // gỡ onclick inline nếu có
    [upBtn, downBtn].forEach(b => b && b.removeAttribute('onclick'));

    list.style.overflowY = 'hidden';

    let items = [];
    let tops  = [];
    const COUNT = 2; // cửa sổ luôn thấy 2 item, bước nhảy = 1

    function measure() {
      items = Array.from(list.querySelectorAll('.news-item'));
      tops  = items.map(el => el.offsetTop);

      // đặt chiều cao viewport = tổng chiều cao 2 item đầu
      if (items.length >= 2) {
        const h = items[0].offsetHeight + items[1].offsetHeight;
        list.style.maxHeight = h + 'px';
      } else if (items.length === 1) {
        list.style.maxHeight = items[0].offsetHeight + 'px';
      }
      updateButtons();
    }

    // tìm index item ở đỉnh cửa sổ (gần nhất với scrollTop)
    function headIndex() {
      const st = list.scrollTop;
      let l = 0, r = tops.length - 1, ans = 0;
      while (l <= r) {
        const m = (l + r) >> 1;
        if (tops[m] <= st + 1) { ans = m; l = m + 1; }
        else r = m - 1;
      }
      return ans;
    }

    // cuộn sao cho item index i nằm ở đỉnh
    function scrollToHead(i, smooth = true) {
      if (!tops.length) return;
      const maxHead = Math.max(0, items.length - COUNT);
      i = Math.max(0, Math.min(i, maxHead));
      list.scrollTo({ top: tops[i], behavior: smooth ? 'smooth' : 'auto' });
      setTimeout(updateButtons, 200);
    }

    // cập nhật trạng thái nút khi chạm biên
    function updateButtons() {
      if (!upBtn || !downBtn) return;
      const i = headIndex();
      const maxHead = Math.max(0, items.length - COUNT);
      upBtn.disabled   = (i <= 0);
      downBtn.disabled = (i >= maxHead);
    }

    // gán sự kiện cho nút ▲ / ▼ (dịch đúng 1 item)
    upBtn  && upBtn.addEventListener('click',  () => scrollToHead(headIndex() - 1, true));
    downBtn&& downBtn.addEventListener('click',() => scrollToHead(headIndex() + 1, true));

    // cập nhật nút khi người dùng tự cuộn
    list.addEventListener('scroll', updateButtons, { passive: true });

    // re-measure khi resize (debounce)
    let rt = null;
    window.addEventListener('resize', () => {
      clearTimeout(rt);
      rt = setTimeout(measure, 120);
    });

    // nếu trong danh sách có ảnh load chậm, đo lại sau khi ảnh tải
    const imgs = list.querySelectorAll('img');
    imgs.forEach(img => {
      if (!img.complete) img.addEventListener('load', measure, { once: true });
    });

    measure();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
