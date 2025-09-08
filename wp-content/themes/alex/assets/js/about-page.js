(function () {
  const PAGE = String(window.PAGE || '');
  if (!['about', 'access'].includes(PAGE)) return;

  document.addEventListener('DOMContentLoaded', () => {
    const navs = document.querySelectorAll('nav.submenu-tabs');
    if (!navs.length) return;

    const header = document.querySelector('.header-wrapper');
    const headerOffset = header ? header.offsetHeight : 0;

    function scrollToId(id, push = true) {
      const el = document.getElementById(id);
      if (!el) return;

      const y = window.scrollY + el.getBoundingClientRect().top - headerOffset - 12;
      window.scrollTo({ top: Math.max(0, y), behavior: 'smooth' });

      // active link
      navs.forEach(nav => {
        nav.querySelectorAll('a[href^="#"]').forEach(a => {
          const targetId = decodeURIComponent(a.getAttribute('href').slice(1));
          a.classList.toggle('active', targetId === id);
        });
      });

      if (push) {
        try { history.replaceState(null, '', '#' + encodeURIComponent(id)); } catch {}
      }
    }

    navs.forEach(nav => {
      nav.addEventListener('click', e => {
        const a = e.target.closest('a[href^="#"]');
        if (!a) return;
        e.preventDefault();
        const id = decodeURIComponent(a.getAttribute('href').slice(1));
        if (id) scrollToId(id, true);
      });
    });

    // scroll khi có hash sẵn
    const hash = decodeURIComponent(location.hash || '').replace(/^#/, '');
    if (hash) setTimeout(() => scrollToId(hash, false), 100);
  });
})();
