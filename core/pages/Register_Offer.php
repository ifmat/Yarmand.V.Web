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
            <div class=" main-content">
                <div class="main-content bg-light min-vh-100 p-4">
                    <div class="container-fluid">

                        <!-- هدر صفحه -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h2 class="fw-bold text-dark mb-1">
                                    <i class="fas fa-plus-circle text-success me-2"></i>
                                    ثبت محصول جدید
                                </h2>

                            </div>
                        </div>

                        <form enctype="multipart/form-data" action="add_product" method="post">
                            <div class="row g-4">

                                <!-- ستون سمت راست: اطلاعات اصلی (عرض بیشتر) -->
                                <div class="col-lg-8">
                                    <div class="card custom-card h-100 shadow-sm">
                                        <div class="card-header custom-card-header d-flex justify-content-between align-items-center">
                                            <span><i class="fas fa-box-open me-2"></i> اطلاعات پایه محصول</span>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">نام
                                                        محصول</label>
                                                    <input type="text" name="product_name"
                                                           class="form-control form-control-lg"
                                                           placeholder="مثلاً: کفش ورزشی" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">دسته‌بندی</label>
                                                    <select name="category_id" class="form-select form-select-lg"
                                                            required>
                                                        <option value="" selected disabled>انتخاب کنید...</option>
                                                        <option value="1">پوشاک</option>
                                                        <option value="2">الکترونیک</option>
                                                        <option value="3">لوازم خانگی</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">قیمت
                                                        (تومان)</label>
                                                    <div class="input-group">
                                                        <input type="number" name="price"
                                                               class="form-control form-control-lg" placeholder="0"
                                                               required>
                                                        <span class="input-group-text bg-light">تومان</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold text-secondary small">تعداد
                                                        موجودی</label>
                                                    <input type="number" name="stock"
                                                           class="form-control form-control-lg" placeholder="0"
                                                           required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-secondary small">توضیحات
                                                        کوتاه</label>
                                                    <textarea name="short_desc" class="form-control" rows="3"
                                                              placeholder="یک توضیح مختصر..."></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-secondary small">توضیحات
                                                        کامل</label>
                                                    <textarea name="full_desc" class="form-control" rows="5"
                                                              placeholder="جزئیات کامل محصول..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ستون سمت چپ: تصویر و ویژگی‌ها (عرض کمتر) -->
                                <div class="col-lg-4">
                                    <!-- کارت آپلود تصویر -->
                                    <div class="card custom-card mb-4 shadow-sm">
                                        <div class="card-header custom-card-header">
                                            <i class="fas fa-image me-2"></i> تصویر محصول
                                        </div>
                                        <div class="card-body text-center p-4">
                                            <div class="mb-3">
                                                <img src="assets/images/placeholder.png" id="previewImage"
                                                     class="img-fluid rounded border bg-light"
                                                     style="max-height: 180px; object-fit: cover;">
                                            </div>
                                            <label class="btn btn-outline-primary w-100 btn-lg">
                                                <i class="fas fa-cloud-upload-alt me-2"></i> انتخاب تصویر
                                                <input type="file" name="product_image" class="d-none" accept="image/*"
                                                       onchange="previewImg(this)">
                                            </label>
                                        </div>
                                    </div>

                                    <!-- کارت ویژگی‌ها -->
                                    <div class="card custom-card shadow-sm">
                                        <div class="card-header custom-card-header">
                                            <i class="fas fa-tags me-2"></i> ویژگی‌ها
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold text-secondary small">برند</label>
                                                <input type="text" name="brand" class="form-control"
                                                       placeholder="نام برند">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold text-secondary small">وضعیت</label>
                                                <select name="status" class="form-select">
                                                    <option value="active">فعال</option>
                                                    <option value="inactive">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- دکمه ثبت -->
                            <div class="row mt-4">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-custom-primary btn-lg px-5 shadow-sm">
                                        <i class="fas fa-save me-2"></i> ثبت محصول
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            require_once '../layout/Js/Js.php';
            ?>
        </div>
    </div>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>