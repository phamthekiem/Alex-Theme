document.addEventListener("click", function (e) {
  const btn = e.target.closest(".arrow-icon");
  if (!btn) return;

  const section = btn.closest("section.recruit-heading");
  if (!section) return;

  const wrapper = section.querySelector(".building-video .video-wrapper");
  if (!wrapper) return;

  const defaultImg = wrapper.querySelector(".default-building-img");
  const iframes = wrapper.querySelectorAll("iframe");
  if (!iframes.length) return;

  // Lấy video theo index
  const index = parseInt(btn.dataset.index || "-1", 10);
  if (index < 0 || index >= iframes.length) return;

  const target = iframes[index];

  // Ẩn ảnh mặc định
  if (defaultImg) defaultImg.style.display = "none";

  // Dừng và ẩn các video khác
  iframes.forEach((f, i) => {
    if (i === index) return;
    try {
      f.contentWindow?.postMessage(
        JSON.stringify({ event: "command", func: "stopVideo", args: [] }),
        "*"
      );
    } catch {}
    f.style.display = "none";
  });

  // Hiện video mục tiêu
  target.style.display = "block";

  // Tua đến thời điểm chỉ định
  const start = parseInt(btn.dataset.start || "0", 10);
  if (start > 0) {
    try {
      target.contentWindow?.postMessage(
        JSON.stringify({ event: "command", func: "seekTo", args: [start, true] }),
        "*"
      );
    } catch {}
  }

  // Auto play
  try {
    target.contentWindow?.postMessage(
      JSON.stringify({ event: "command", func: "playVideo", args: [] }),
      "*"
    );
  } catch {}
});
