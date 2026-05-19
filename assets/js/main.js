    (function () {
    const sidebar = document.querySelector("aside.sidebar");
    if (!sidebar) return;

    // دکمه سه‌نقطه را بساز
    let btn = document.getElementById("sidebarToggleBtn");
    if (!btn) {
    btn = document.createElement("button");
    btn.id = "sidebarToggleBtn";
    btn.type = "button";
    btn.innerHTML = '<i class="fa-solid fa-ellipsis-vertical"></i>';
    document.body.appendChild(btn);
}

    // برای اینکه روی دسکتاپ همیشه باز باشد
    function syncByScreen() {
    const isDesktop = window.matchMedia("(min-width: 992px)").matches;

    if (isDesktop) {
    sidebar.classList.remove("closed");
    sidebar.classList.add("open"); // باز
    btn.style.display = "none";
} else {
    // روی موبایل: اول جمع
    btn.style.display = "inline-flex";
    // اگر کاربر قبلا باز کرده بود، اینجا نگه می‌داریم
    // ولی برای حالت اولیه بهتره:
    // اگر کلاس open هست، نگه دار؛ اگر نه جمع.
    // بنابراین:
    if (!sidebar.classList.contains("open")) {
    sidebar.classList.remove("open");
}
}
}

    // مقدار اولیه
    syncByScreen();

    // کلیک روی دکمه باز/بسته
    btn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
});

    // وقتی بیرون از سایدبار کلیک شد (فقط روی موبایل) بسته شود
    document.addEventListener("click", (e) => {
    const isMobile = !window.matchMedia("(min-width: 992px)").matches;
    if (!isMobile) return;

    const clickedInsideSidebar = sidebar.contains(e.target);
    const clickedOnBtn = btn.contains(e.target);

    if (!clickedInsideSidebar && !clickedOnBtn) {
    sidebar.classList.remove("open");
}
});

    // با تغییر سایز صفحه هماهنگ کن
    window.addEventListener("resize", syncByScreen);
})();
