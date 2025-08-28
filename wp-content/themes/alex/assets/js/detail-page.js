
  const LIBRARY = {
    gases: [
      { title:"Smoke SD", src:"videos/Ogryzek - AURA (Official Music Video).mp4", poster:"thumbs/smoke_sd.jpg" },
      { title:"Smoke HD", src:"videos/demo1.mp4", poster:"thumbs/smoke_hd.jpg" },
      { title:"Z_smoke SD", src:"videos/demo1.mp4", poster:"thumbs/z_smoke_sd.jpg" },
      { title:"Z_smoke HD", src:"videos/demo1.mp4", poster:"thumbs/z_smoke_hd.jpg" },
      { title:"Smoke_injection SD", src:"videos/demo1.mp4", poster:"thumbs/smoke_inj_sd.jpg" },
      { title:"Smoke_injection HD", src:"videos/demo1.mp4", poster:"thumbs/smoke_inj_hd.jpg" },
      { title:"Explosion_clouds SD", src:"videos/demo1.mp4", poster:"thumbs/explosion_sd.jpg" },
      { title:"Explosion_clouds HD", src:"videos/demo1.mp4", poster:"thumbs/explosion_hd.jpg" },
    ],
    solids: [
      { title:"Dust SD", src:"videos/demo2.mp4", poster:"thumbs/dust_sd.jpg" },
      { title:"Dust HD", src:"videos/demo2.mp4", poster:"thumbs/dust_hd.jpg" },
      { title:"Falling_stone SD_HD", src:"videos/demo2.mp4", poster:"thumbs/falling_stone.jpg" },
      { title:"Dosha HD", src:"videos/demo2.mp4", poster:"thumbs/dosha_hd.jpg" },
      { title:"fragment HD", src:"videos/demo2.mp4", poster:"thumbs/fragment_hd.jpg" },
      { title:"Wind HD", src:"videos/demo2.mp4", poster:"thumbs/wind_hd.jpg" },
    ],
    crush:  [{ title:"Digital Vision Video", src:"videos/demo1.mp4", poster:"thumbs/dvv.jpg" }],
    others: [
      { title:"ControlPanels", src:"videos/demo1.mp4", poster:"thumbs/controlpanels.jpg" },
      { title:"Effect SD_HD",  src:"videos/demo1.mp4", poster:"thumbs/effect_sd_hd.jpg" },
      { title:"Sky",           src:"videos/demo1.mp4", poster:"thumbs/sky.jpg" },
      { title:"promotion",     src:"videos/demo1.mp4", poster:"thumbs/promotion.jpg" },
      { title:"3D_sozai",      src:"videos/demo1.mp4", poster:"thumbs/3d_sozai.jpg" },
      { title:"Night_view",    src:"videos/demo1.mp4", poster:"thumbs/night_view.jpg" },
    ],
    alexlib: [
      { title:"えむぷり", src:"videos/demo2.mp4", poster:"thumbs/alex_emupri.jpg" },
      { title:"てぃーぷり", src:"videos/demo2.mp4", poster:"thumbs/alex_tipri.jpg" },
      { title:"はいぷり", src:"videos/demo2.mp4", poster:"thumbs/alex_haipri.jpg" },
      { title:"SGP3", src:"videos/demo2.mp4", poster:"thumbs/alex_sgp3.jpg" },
    ],
    sozailib: [],
  };

  /* ===== DOM refs & state ===== */
const ITEMS_PER_PAGE = 9; // 3x3
let currentKey  = null;
let currentPage = 1;
let totalPages  = 1;

const app         = document.getElementById('app');
const grid        = document.getElementById('grid');
const nav         = document.getElementById('navScroll');
const collapseBtn = document.getElementById('collapseBtn');
let pager       = document.getElementById('pager');

/* Nếu thiếu #pager trong HTML, tự tạo đặt trước #grid */
if (!pager) {
  pager = document.createElement('div');
  pager.id = 'pager';
  pager.className = 'pager';
  const content = document.getElementById('content') || document.body;
  content.insertBefore(pager, grid);
}

/* ===== Helpers ===== */
function getListByKey(key){ return (LIBRARY[key] || []).slice(); }

/* Grid theo trang */
function renderGridPage(list, page){
  const start = (page - 1) * ITEMS_PER_PAGE;
  const slice = list.slice(start, start + ITEMS_PER_PAGE);

  grid.innerHTML = slice.map(item => `
    <article class="video-card" data-title="${item.title}">
      <div class="video-card__title">${item.title}</div>
      <div class="video-wrapper">
        <video preload="metadata" controls poster="${item.poster || ''}">
          <source src="${item.src}" type="video/mp4" />
          Trình duyệt của bạn không hỗ trợ video.
        </video>
      </div>
    </article>
  `).join('');
}

/* Thanh phân trang */
function renderPager(page, pages){
  const nums = Array.from({length: pages}, (_,i)=>i+1);
  const prevDisabled = page === 1 ? 'is-disabled' : '';
  const nextDisabled = page === pages ? 'is-disabled' : '';
  pager.innerHTML = `
    <button class="page-btn ${prevDisabled}" data-action="prev" aria-label="Trang trước">≪</button>
    ${nums.map(n => `<button class="page-btn ${n===page?'is-active':''}" data-page="${n}">${n}</button>`).join('')}
    <button class="page-btn ${nextDisabled}" data-action="next" aria-label="Trang sau">≫</button>
  `;
}

/* Chuyển trang (CORE) */
function goToPage(page){
  const list = getListByKey(currentKey);
  totalPages = Math.max(1, Math.ceil(list.length / ITEMS_PER_PAGE));
  currentPage = Math.min(Math.max(1, page), totalPages);

  renderGridPage(list, currentPage);
  renderPager(currentPage, totalPages);
  grid.scrollIntoView({behavior:'smooth', block:'start'});
}

/* Render khi chọn thư mục */
function renderVideos(key){
  currentKey = key;
  currentPage = 1;
  goToPage(1);
}

/* Active item highlight */
function setActive(link){
  document.querySelectorAll('.tree-item.active').forEach(el=>el.classList.remove('active'));
  link.classList.add('active');
}



/* CLICK PHÂN TRANG — thiếu đoạn này nên trang 2 không chạy */
pager.addEventListener('click', (e)=>{
  const btn = e.target.closest('.page-btn');
  if(!btn || btn.classList.contains('is-disabled')) return;

  if (btn.dataset.action === 'prev')      goToPage(currentPage - 1);
  else if (btn.dataset.action === 'next') goToPage(currentPage + 1);
  else if (btn.dataset.page)              goToPage(parseInt(btn.dataset.page, 10));
});

/* Click item ở cây thư mục */
nav.addEventListener('click', (e)=>{
  const link = e.target.closest('.tree-item');
  if(!link) return;
  e.preventDefault();
  setActive(link);
  renderVideos(link.dataset.key);

  if (matchMedia('(max-width: 640px)').matches && !app.classList.contains('is-collapsed')){
    app.classList.add('is-collapsed');
  }
});

/* Thu gọn/mở rộng sidebar */
collapseBtn.addEventListener('click', () => {
  app.classList.toggle('is-collapsed');
  
  const icon = collapseBtn.firstElementChild;
  
  if (app.classList.contains('is-collapsed')) {
    icon.className = 'fas fa-angle-double-right'; // icon khi collapse
  } else {
    icon.className = 'fas fa-angle-double-left';  // icon khi expand
  }
});

/* Nút trợ giúp (nếu dùng) */
document.getElementById('helpBtn')?.addEventListener('click', ()=> {
  alert('Mở trang trợ giúp hoặc popup ở đây');
});

/* Khởi tạo: chọn thư mục đầu tiên và vào trang 1 */
window.addEventListener('DOMContentLoaded', ()=>{
  const first = document.querySelector('.tree-item');
  if(first) first.click();
});

