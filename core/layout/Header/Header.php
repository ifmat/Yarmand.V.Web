<header class="main-header">
    <div class="header-right">
        <button class="toggle-sidebar-btn" id="openSidebarBtn">
            <i class="fas fa-bars"></i>
        </button>
        <span class="page-title">داشبورد</span>
    </div>

    <div class="header-left">
        <!-- باکس جستجو -->
        <div class="search-box">
            <input type="text" class="form-control" placeholder="جستجو...">
            <i class="fas fa-search"></i>
        </div>

        <!-- بخش پروفایل و زبان -->
        <div class="header-actions">
            <!-- دکمه‌های تغییر زبان -->
            <div class="lang-switch">
                <button id="btn-fa" class="lang-btn active">فا</button>
                <button id="btn-en" class="lang-btn">En</button>
            </div>

            <!-- پروفایل کاربر (با استفاده از Dropdown بوت‌استرپ) -->
            <div class="dropdown user-profile-wrapper">
                <!-- دکمه اصلی که کلیک میشه -->
                <button class="btn btn-link dropdown-toggle d-flex align-items-center text-decoration-none p-0"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                    <img src="assets/images/avatar.png" alt="User" class="avatar rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                    <span class="user-name-header fw-bold">ماتین</span>
                    <i class="fas fa-chevron-down ms-2 small"></i>
                </button>

                <!-- منوی بازشونده (Dropdown Menu) -->
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 180px;">
                    <li>
                        <h6 class="dropdown-header text-muted small">خوش آمدید، ماتین</h6>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/profile">
                            <i class="fas fa-user me-2 text-primary"></i>
                            <span>پروفایل من</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center text-danger" href="/logout">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            <span>خروج از حساب</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
