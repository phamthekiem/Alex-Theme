// ./js/mobile-nav.js
(function () {
  const PAGE = String(window.PAGE || '');
  const ALLOW = ['top','about','service','work','recruit','access','contact'];
  if (!ALLOW.includes(PAGE)) return;

  const ready = (fn) =>
    document.readyState === 'loading'
      ? document.addEventListener('DOMContentLoaded', fn, { once: true })
      : fn();

  ready(() => {
    const mobile   = document.getElementById('mobileNav');
    const toggleBtn= document.getElementById('menuToggle');
    // dùng body để lưu cờ đã bind
    const flagHost = document.body;

    if (!mobile || !toggleBtn) return;

    // tránh bind trùng
    if (flagHost.dataset.mobileNavBound === '1') return;
    flagHost.dataset.mobileNavBound = '1';

    function toggleMenu(force){
      const show = (force === undefined)
        ? !mobile.classList.contains('show')
        : !!force;
      mobile.classList.toggle('show', show);
      toggleBtn.setAttribute('aria-expanded', String(show));
    }

    function toggleSub(item, force){
      if (!item) return;
      const sub = item.querySelector('.mobile-submenu');
      const show = (force === undefined)
        ? !(sub && sub.classList.contains('show'))
        : !!force;
      if (sub) sub.classList.toggle('show', show);
      item.classList.toggle('open', show);
    }

    // 1) Toggle menu (KHÔNG passive vì có thể preventDefault)
    document.addEventListener('click', (e) => {
      const t = e.target.closest('#menuToggle');
      if (!t) return;

      // Nếu toggle là <a>, chặn nhảy trang
      if (t.tagName === 'A') e.preventDefault();
      toggleMenu();
    });

    // 2) Toggle từng submenu trong mobile nav
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('.mobile-toggle');
      if (!btn) return;
      const item = btn.closest('.mobile-nav-item');
      // nếu là <a>, chặn nhảy trang
      if (btn.tagName === 'A') e.preventDefault();
      toggleSub(item);
    });

    // 3) Click link trong mobile → đóng menu
    document.addEventListener('click', (e) => {
      const link = e.target.closest('#mobileNav a[href]');
      if (!link) return;
      toggleMenu(false);
    });

    // 4) Click ra ngoài → đóng menu (có thể để passive vì KHÔNG gọi preventDefault)
    document.addEventListener('click', (e) => {
      if (!mobile.classList.contains('show')) return;
      const hitToggle = e.target.closest('#menuToggle');
      const hitInside = e.target.closest('#mobileNav');
      if (!hitToggle && !hitInside) toggleMenu(false);
    }, { passive: true });
  });
})();

