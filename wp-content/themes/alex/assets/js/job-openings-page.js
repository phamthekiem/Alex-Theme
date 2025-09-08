
(function () {
  if (window.PAGE !== 'job-openings') return;

  // Chuẩn hoá chuỗi để map từ text button -> id
  function norm(s){ return (s || '').replace(/\s+/g,'').trim(); }

  // Bản đồ nút -> id section
  const map = {
    'プロデューサー・映像ディレクター': 'producer-video-director',
    'エフェクトデザイナー・コンポジター': 'effects-designer-compositor',
    '2DCGデザイナー': '2DCG-designer',
    '3DCGデザイナー': '3DCG-designer',
    'プログラマー': 'programmer',
    '企画設計': 'planning-design',
    '出玉設計': 'ball-output-design',
  };
  const mapNorm = {};
  Object.keys(map).forEach(k => mapNorm[norm(k)] = map[k]);

  // Offset nếu header là fixed/sticky
  function headerOffset() {
    const header = document.querySelector('.header-wrapper');
    if (!header) return 0;
    const pos = getComputedStyle(header).position;
    return (pos === 'fixed' || pos === 'sticky') ? header.getBoundingClientRect().height : 0;
  }

  // Kích hoạt section + scroll + set active cho nút
  function activate(targetId, updateHash) {
    const sections = document.querySelectorAll('.section-job-heading');
    sections.forEach(sec => sec.classList.toggle('active', sec.id === targetId));

    const buttons = document.querySelectorAll('.job-open-detail-btn');
    buttons.forEach(b => {
      const t = b.dataset.target || mapNorm[norm(b.textContent)];
      b.classList.toggle('active', t === targetId);
    });

    const el = document.getElementById(targetId);
    if (el) {
      const top = window.scrollY + el.getBoundingClientRect().top - headerOffset() - 12;
      window.scrollTo({ top: Math.max(0, top), behavior: 'smooth' });
      if (updateHash) {
        if (history.replaceState) history.replaceState(null, '', '#' + encodeURIComponent(targetId));
        else location.hash = targetId;
      }
    }
  }

  // Click nút tab
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.job-open-detail-btn');
    if (!btn) return;
    e.preventDefault();
    const targetId = btn.dataset.target || mapNorm[norm(btn.textContent)];
    if (targetId) activate(targetId, true);
  });

  // Khởi tạo: ưu tiên hash, sau đó data-target của nút đầu, cuối cùng id mặc định
  window.addEventListener('load', function () {
    const hash = location.hash ? decodeURIComponent(location.hash.slice(1)) : '';
    const firstBtnTarget = document.querySelector('.job-open-detail-btn')?.dataset.target;
    const initial = hash || firstBtnTarget || 'producer-video-director';
    activate(initial, !!hash);
  });
})();

