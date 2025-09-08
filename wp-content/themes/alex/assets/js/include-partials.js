
(function () {
  // ===== CẤU HÌNH =====
  var PARTIALS_ROOT = window.PARTIALS_ROOT || './partials';
  var PAGE = (window.PAGE || '').trim(); // ví dụ: 'top', 'about', 'recruit', ...

  // CSS/JS dùng chung cho mọi trang (header/nav/reset...)
  var COMMON_CSS = [
    "//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500",
    "./css/bootstrap.css",
    "https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css",
    "./css/fonts.css",
    "./css/site.css" // <— style dùng chung (header/nav/container…)
  ];
  var COMMON_JS = [
    "./js/script.js" // <— JS dùng chung (menu toggle v.v.)
  ];

  // CSS/JS riêng cho từng trang
  var PAGE_CSS_MAP = {
    "top": ["./css/top-page.css"],
    "about": ["./css/about-page.css"],
    "recruit": ["./css/recruit-page.css"],
    "comments-top": ["./css/comments-top-page.css"],
    "access": ["./css/access-page.css"],
    "contact": ["./css/contact-page.css"],
    "job-openings": ["./css/job-openings-page.css"],
    "production-library": ["./css/production-library-page.css"],
    "company-events": ["./css/company-events-page.css"],
    "voices": ["./css/voices-page.css"],
    "work": ["./css/work-page.css"],
    "service": ["./css/service-page.css"],
    "results": ["./css/results-page.css"]
  };
  var PAGE_JS_MAP = {
    "top": ["./js/top-page.js"],
    "about": ["./js/about-page.js"],
    "comments-top": ["./js/comments-top-page.js"],
    "access": ["./js/access-page.js"],
    "contact": ["./js/contact-page.js"],
    "job-openings": ["./js/job-openings-page.js"],
    "production-library": ["./js/production-library-page.js"],
    "company-events": ["./js/company-events-page.js"],



  };

  // Cho phép từng trang bổ sung mảng CSS/JS nếu cần
  var EXTRA_PAGE_CSS = Array.isArray(window.PAGE_CSS) ? window.PAGE_CSS : [];
  var EXTRA_PAGE_JS  = Array.isArray(window.PAGE_JS)  ? window.PAGE_JS  : [];

  // ===== TIỆN ÍCH =====
  var loadedCSS = new Set();
  var loadedJS  = new Set();

  function ensureCSS(href) {
    if (!href || loadedCSS.has(href)) return;
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = href;
    document.head.appendChild(link);
    loadedCSS.add(href);
  }

  function ensureJS(src) {
    if (!src) return Promise.resolve();
    if (loadedJS.has(src)) return Promise.resolve();
    return new Promise(function (res, rej) {
      var s = document.createElement('script');
      s.src = src;
      s.defer = true;
      s.onload = function(){ loadedJS.add(src); res(); };
      s.onerror = function(){ rej(new Error('Load JS fail: '+src)); };
      document.body.appendChild(s);
    });
  }

  function fetchHTML(url){
    return fetch(url, {cache:'no-cache'}).then(function(r){
      if(!r.ok) throw new Error('Fetch failed: '+url);
      return r.text();
    });
  }

  function injectPartial(place, file){
    var host = document.querySelector('[data-include="'+place+'"]');
    if(!host) return;
    fetchHTML(PARTIALS_ROOT + '/' + file).then(function(html){
      host.innerHTML = html;
    }).catch(console.error);
  }

  // ===== ÁP DỤNG =====

  // Thêm class page-<PAGE> lên <html> để scope CSS theo trang
  if (PAGE) document.documentElement.classList.add('page-' + PAGE);

  // (1) CSS chung + CSS trang + CSS bổ sung
  COMMON_CSS.forEach(ensureCSS);
  [].concat(PAGE_CSS_MAP[PAGE] || [], EXTRA_PAGE_CSS).forEach(ensureCSS);

  // (2) Chèn header/footer
  injectPartial('header', 'header.html');
  injectPartial('footer', 'footer.html');

  // (3) JS chung + JS trang + JS bổ sung (giữ thứ tự)
  (function loadAllJS(){
    var queue = [].concat(COMMON_JS, PAGE_JS_MAP[PAGE] || [], EXTRA_PAGE_JS);
    var p = Promise.resolve();
    queue.forEach(function(src){ p = p.then(function(){ return ensureJS(src); }); });
  })();
})();

