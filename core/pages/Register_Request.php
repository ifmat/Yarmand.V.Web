<?php
require_once '../layout/session/session.php';
require_once '../db/Connect.php';
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                            <h4 class="fw-bold text-dark">ثبت درخواست جدید</h4>
                            <p class="text-muted small">لطفاً محصول مورد نیاز خود را انتخاب کنید تا یک داوطلب جوان برای انجام آن به شما کمک کند.</p>
                        </div>
                        <div class="card-body p-4">
                            <form action="submit_request.php" method="POST">

                                <!-- انتخاب محصول -->
                                <div class="mb-4">
                                    <label for="productSelect" class="form-label fw-bold">انتخاب محصول مورد نیاز</label>
                                    <select class="form-select form-select-lg" id="productSelect" name="product_id" required>
                                        <option selected disabled value="">-- لطفاً یک محصول را انتخاب کنید --</option>
                                        <!-- اینجا باید با PHP از دیتابیس پر شود -->
                                        <option value="1">🎧 هدفون بلوتوثی</option>
                                        <option value="2">💾 فلش مموری</option>
                                        <option value="3">🔌 هاب USB</option>
                                        <option value="4">🍞 نان (خدمات خرید)</option>
                                        <option value="5">💊 دارو (خدمات خرید)</option>
                                    </select>
                                    <div class="form-text">لیست محصولات بر اساس موجودی انبار به‌روز می‌شود.</div>
                                </div>

                                <!-- توضیحات تکمیلی -->
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-bold">توضیحات تکمیلی (اختیاری)</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="مثلاً: نان سنگک می‌خواهم، یا داروی فشار خون..."></textarea>
                                </div>

                                <!-- اطلاعات تماس -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label fw-bold">نام درخواست‌دهنده</label>
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="نام و نام خانوادگی">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label fw-bold">شماره تماس</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required placeholder="0912...">
                                    </div>
                                </div>

                                <!-- آدرس -->
                                <div class="mb-4">
                                    <label for="address" class="form-label fw-bold">آدرس دقیق</label>
                                    <textarea class="form-control" id="address" name="address" rows="2" required placeholder="خیابان، کوچه، پلاک..."></textarea>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-custom btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i> ثبت درخواست
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once '../layout/Js/Js.php';
        ?>

    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>