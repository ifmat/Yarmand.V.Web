<?php
require_once '../layout/session/session.php';
require_once '../layout/Html/StartHtml.php';
require_once '../layout/Head/Head.php';
$denied = [2, 6];
if (in_array($_SESSION['level'], $denied)) {
    header("Location: error_404");
    if ($_SESSION['level'] == 6) {
        header("Location: error_maintenance");

    }
    exit;
}
?>
    <body>
    <?php
    require_once '../layout/Header/Header.php';
    ?>
    <div class="row">

        <?php
        require_once '../layout/Menu/Menu.php';
        ?>
        <div class="container col-md-12 col-sm-10 col-xl-10 col-lg-9">
            <div class="col-md-9 col-lg-10 main-content bg-light min-vh-100 p-4">

                <!-- هدر صفحه -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-1">
                            <i class="fas fa-store text-success me-2"></i>
                            تنظیمات فروشگاه
                        </h2>

                    </div>
                </div>

                <form action="update_store" method="post" enctype="multipart/form-data">
                    <div class="row g-4">

                        <!-- ستون سمت راست: اطلاعات اصلی -->
                        <div class="col-lg-8">
                            <div class="card custom-card shadow-sm mb-4">
                                <div class="card-header custom-card-header">
                                    <i class="fas fa-info-circle me-2"></i> اطلاعات عمومی
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-secondary small">نام فروشگاه</label>
                                            <input type="text" name="store_name" class="form-control form-control-lg" placeholder="نام فروشگاه شما" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-secondary small">توضیحات فروشگاه</label>
                                            <textarea name="store_desc" class="form-control" rows="4" placeholder="درباره فروشگاه خود بنویسید..."></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-secondary small">ایمیل تماس</label>
                                            <input type="email" name="email" class="form-control" placeholder="info@store.com">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-secondary small">تلفن تماس</label>
                                            <input type="tel" name="phone" class="form-control" placeholder="021-12345678">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card custom-card shadow-sm">
                                <div class="card-header custom-card-header">
                                    <i class="fas fa-map-marker-alt me-2"></i> آدرس و موقعیت
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label fw-bold text-secondary small">آدرس کامل</label>
                                            <textarea name="address" class="form-control" rows="3" placeholder="آدرس دقیق فروشگاه..."></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-secondary small">شهر</label>
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-secondary small">استان</label>
                                            <input type="text" name="province" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-bold text-secondary small">کد پستی</label>
                                            <input type="text" name="postal_code" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ستون سمت چپ: لوگو و شبکه‌های اجتماعی -->
                        <div class="col-lg-4">
                            <!-- آپلود لوگو -->
                            <div class="card custom-card shadow-sm mb-4">
                                <div class="card-header custom-card-header">
                                    <i class="fas fa-image me-2"></i> لوگوی فروشگاه
                                </div>
                                <div class="card-body text-center p-4">
                                    <div class="mb-3">
                                        <img src="assets/images/store-logo-placeholder.png" id="logoPreview" class="img-fluid rounded border bg-light" style="max-height: 100px; object-fit: contain;">
                                    </div>
                                    <label class="btn btn-outline-primary w-100">
                                        <i class="fas fa-cloud-upload-alt me-2"></i> تغییر لوگو
                                        <input type="file" name="store_logo" class="d-none" accept="image/*" onchange="previewLogo(this)">
                                    </label>
                                    <small class="text-muted d-block mt-2">فرمت‌های مجاز: JPG, PNG (حداکثر 2 مگابایت)</small>
                                </div>
                            </div>

                            <!-- شبکه‌های اجتماعی -->
                            <div class="card custom-card shadow-sm">
                                <div class="card-header custom-card-header">
                                    <i class="fas fa-share-alt me-2"></i> شبکه‌های اجتماعی
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-secondary small d-flex align-items-center gap-2">
                                            <i class="fab fa-instagram text-danger"></i> اینستاگرام
                                        </label>
                                        <input type="url" name="instagram" class="form-control" placeholder="https://instagram.com/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-secondary small d-flex align-items-center gap-2">
                                            <i class="fab fa-telegram text-info"></i> تلگرام
                                        </label>
                                        <input type="url" name="telegram" class="form-control" placeholder="https://t.me/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-secondary small d-flex align-items-center gap-2">
                                            <i class="fab fa-whatsapp text-success"></i> واتساپ
                                        </label>
                                        <input type="url" name="whatsapp" class="form-control" placeholder="https://wa.me/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-secondary small d-flex align-items-center gap-2">
                                            <i class="fas fa-globe text-secondary"></i> وب‌سایت
                                        </label>
                                        <input type="url" name="website" class="form-control" placeholder="https://...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- دکمه ذخیره -->
                    <div class="row mt-4">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-custom-primary btn-lg px-5 shadow-sm">
                                <i class="fas fa-save me-2"></i> ذخیره تغییرات
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- اسکریپت پیش‌نمایش لوگو -->
    <script>
        function previewLogo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <?php
    require_once '../layout/Js/Js.php';
    ?>
    </div>
    </div>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>