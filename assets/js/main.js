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
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openSidebarBtn');
        const closeBtn = document.getElementById('closeSidebarBtn');
        const overlay = document.createElement('div'); // ایجاد لایه تاریک

        // اضافه کردن کلاس overlay به بدنه
        overlay.classList.add('overlay');
        document.body.appendChild(overlay);

        // تابع باز کردن منو
        function openMenu() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        // تابع بستن منو
        function closeMenu() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // رویداد کلیک روی دکمه باز کردن (در هدر)
        openBtn.addEventListener('click', openMenu);

        // رویداد کلیک روی دکمه بستن (داخل منو)
        closeBtn.addEventListener('click', closeMenu);

        // رویداد کلیک روی لایه تاریک (برای بستن منو)
        overlay.addEventListener('click', closeMenu);

        // بستن منو با کلید Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('active')) {
                closeMenu();
            }
        });
    });
