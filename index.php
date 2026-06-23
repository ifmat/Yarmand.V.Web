<?php
require_once 'core/layout/Html/StartHtml.php';
require_once 'core/layout/Head/Head.php';
require_once 'assets/css/Main_Css.html';
?>
    <body>
    <?php
//    require_once 'core/layout/Header/Header.php';
//    require_once 'core/layout/Menu/Menu.php';
    ?>

    <!-- نوار ناوبری -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#" onclick="showSection('home')">
                <i class="fas fa-hands-holding-heart"></i> هم‌یار
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#" onclick="showSection('home')">خانه</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('about')">درباره ما</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('faq')">سوالات متداول</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('rules')">قوانین ما</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('contact')">ارتباط با ما</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary rounded-pill px-4"><a class="text-dark" href="Login">ورود</a></button>
                    <button class="btn btn-custom"><a  class="text-dark" href="Register">ثبت نام</a></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- بخش 1: خانه (لندینگ) -->
    <div id="home" class="content-section active">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-3">کمک به عزیزان، <span style="color: var(--accent-green);">ساده‌تر از همیشه</span></h1>
                    <p class="lead text-muted mb-4">
                        پلتفرمی برای اتصال جوانان دلسوز به سالمندان نیازمند. مادربزرگتان نان می‌خواهد؟ یک کلیک و یک داوطلب جوان در کنار شماست.
                    </p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-custom btn-lg"><i class="fas fa-user-plus me-2"></i>من نیازمند کمک هستم</button>
                        <button class="btn btn-outline-dark btn-lg"><i class="fas fa-hand-holding-heart me-2"></i>من داوطلب هستم</button>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="assets/images/elderly-people-helping-each-other-concept_74855-5766.jpg" alt="کمک به سالمندان" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px; object-fit: cover;">
                </div>
            </div>

            <!-- ویژگی‌ها -->
            <div class="row mt-5 text-center">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-bolt feature-icon"></i>
                        <h4>سرعت بالا</h4>
                        <p class="text-muted">درخواست‌ها در کمترین زمان به داوطلبان نزدیک ارسال می‌شوند.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-shield-alt feature-icon"></i>
                        <h4>امنیت و اعتماد</h4>
                        <p class="text-muted">داوطلبان پس از احراز هویت کامل به سیستم接入 می‌شوند.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fas fa-smile-beam feature-icon"></i>
                        <h4>همدلی واقعی</h4>
                        <p class="text-muted">ما فقط یک کار را انجام نمی‌دهیم، بلکه لبخند می‌آوریم.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش 2: درباره ما -->
    <div id="about" class="content-section">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="fw-bold mb-3">داستان ما چیست؟</h2>
                    <div style="width: 60px; height: 4px; background: var(--accent-green); margin: 0 auto;"></div>
                </div>
                <div class="col-lg-10">
                    <p class="lead text-center mb-4">
                        ما باور داریم که هیچ‌کس نباید به تنهایی با چالش‌های روزمره دست و پنجه نرم کند.
                        <strong>هم‌یار</strong> پلی است میان نسل جوان پرانرژی و سالمندان عزیز که گاهی به یک دست یاری نیاز دارند.
                    </p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm h-100 p-3">
                                <div class="card-body">
                                    <h5 class="fw-bold text-primary-dark">ماموریت ما</h5>
                                    <p class="text-muted">تسهیل دسترسی سالمندان به خدمات روزمره و ایجاد حس تعلق و حمایت در جامعه.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm h-100 p-3">
                                <div class="card-body">
                                    <h5 class="fw-bold text-primary-dark">چرا ما؟</h5>
                                    <p class="text-muted">چون ما خانواده‌ای هستیم که دور هم جمع شده‌ایم تا گرمای محبت را به خانه‌های سالمندان برسانیم.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش 3: سوالات متداول -->
    <div id="faq" class="content-section">
        <div class="container py-5">
            <h2 class="text-center fw-bold mb-5">سوالات متداول</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="accordionFaq">
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    چطور می‌توانم درخواست ثبت کنم؟
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    کافیست روی دکمه «ثبت درخواست» کلیک کنید، نوع نیاز خود (خرید نان، خرید دارو، همراهی و...) را انتخاب کنید و آدرس را وارد کنید.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    هزینه انجام درخواست چقدر است؟
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    بسیاری از خدمات توسط داوطلبان به صورت رایگان یا با هزینه‌ای بسیار ناچیز (برای هزینه حمل و نقل) انجام می‌شود.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 shadow-sm mb-3 rounded">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    آیا داوطلبان قابل اعتماد هستند؟
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    بله، تمام داوطلبان پس از بررسی مدارک هویتی و مصاحبه اولیه به سیستم接入 می‌شوند و امتیازدهی کاربران بر اعتبار آن‌ها تاثیر دارد.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش 4: قوانین ما -->
    <div id="rules" class="content-section">
        <div class="container py-5">
            <h2 class="text-center fw-bold mb-5">قوانین و مقررات</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="list-group shadow-sm">
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3 fs-4"></i>
                            <div>
                                <h5 class="mb-1">احترام متقابل</h5>
                                <small class="text-muted">رعایت ادب و احترام بین داوطلب و سالمند الزامی است.</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3 fs-4"></i>
                            <div>
                                <h5 class="mb-1">صداقت در درخواست</h5>
                                <small class="text-muted">ثبت درخواست‌های واقعی و غیرتکراری الزامی است.</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3 fs-4"></i>
                            <div>
                                <h5 class="mb-1">رعایت حریم خصوصی</h5>
                                <small class="text-muted">اشتراک‌گذاری اطلاعات شخصی سالمندان ممنوع است.</small>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3 fs-4"></i>
                            <div>
                                <h5 class="mb-1">تعهد به انجام کار</h5>
                                <small class="text-muted">داوطلبان موظفند پس از پذیرش درخواست، آن را انجام دهند.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- بخش 5: ارتباط با ما -->
    <div id="contact" class="content-section">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg p-4">
                        <h3 class="text-center fw-bold mb-4">ارتباط با ما</h3>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" placeholder="نام خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ایمیل</label>
                                <input type="email" class="form-control" placeholder="example@mail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">پیام شما</label>
                                <textarea class="form-control" rows="4" placeholder="پیام خود را بنویسید..."></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom">ارسال پیام</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <p class="text-muted">یا با ما تماس بگیرید:</p>
                            <a href="tel:02112345678" class="text-decoration-none text-dark fw-bold"><i class="fas fa-phone me-2"></i> ۰۲۱-۱۲۳۴۵۶۷۸</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- فوتر -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">هم‌یار</h5>
                    <p class="text-white-50">پلتفرم داوطلبانه برای کمک به سالمندان و تسهیل زندگی روزمره آن‌ها.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">دسترسی سریع</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" onclick="showSection('home')">خانه</a></li>
                        <li><a href="#" onclick="showSection('about')">درباره ما</a></li>
                        <li><a href="#" onclick="showSection('rules')">قوانین</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">شبکه‌های اجتماعی</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="fs-4"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="fs-4"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="fs-4"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary">
            <div class="text-center text-white-50">
                <small>© ۱۴۰۳ هم‌یار. تمامی حقوق محفوظ است.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <!-- اسکریپت ساده برای جابجایی بین صفحات -->
    <script>
        function showSection(sectionId) {
            // مخفی کردن همه بخش‌ها
            const sections = document.querySelectorAll('.content-section');
            sections.forEach(section => {
                section.classList.remove('active');
            });

            // نمایش بخش انتخاب شده
            const activeSection = document.getElementById(sectionId);
            if (activeSection) {
                activeSection.classList.add('active');
            }

            // آپدیت کردن کلاس active در منو
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('onclick').includes(sectionId)) {
                    link.classList.add('active');
                }
            });

            // اسکرول به بالا
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
    <?php
    require_once 'core/layout/Js/Js.php';
    ?>
    </body>
<?php
require_once 'core/layout/Html/EndHtml.php';
?>