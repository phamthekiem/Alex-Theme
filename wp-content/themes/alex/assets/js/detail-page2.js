document.addEventListener("DOMContentLoaded", () => {
  const buttonMap = {
    "プロデューサー・映像ディレクター": "producer-video-director",
    "エフェクトデザイナー・コンポジター": "effects-designer-compositor",
    "2DCGデザイナー": "2DCG-designer",
    "3DCGデザイナー": "3DCG-designer",
    "プログラマー": "programmer",
    "企画設計": "planning-design",
    "出玉設計": "ball-output-design"
  };

  const buttons = document.querySelectorAll('.job-open-detail-btn');
  const sections = document.querySelectorAll('.section-job-heading');

  const activateSection = (targetId) => {
    sections.forEach(section =>
      section.classList.toggle('active', section.id === targetId)
    );
    window.scrollTo({ top: document.getElementById(targetId).offsetTop - 100, behavior: 'smooth' });
  };

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const targetId = buttonMap[btn.textContent.trim()];
      if (targetId) activateSection(targetId);
    });
  });

  // Hiển thị mặc định section đầu tiên
  activateSection("producer-video-director");
});
