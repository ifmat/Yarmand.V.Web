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
        <div class="container col-md-12 col-sm-12 col-xl-10 col-lg-9">
            <div class="main-content bg-light min-vh-100 p-4">
                <div class="container-fluid">

                    <!-- هدر صفحه -->
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3">
                        <h2 class="fw-bold text-dark mb-0">
                            <i class="fas fa-list-alt text-success me-2"></i>
                            لیست محصولات
                        </h2>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-filter me-2"></i> فیلتر
                            </button>
                            <a href="Register_product" class="btn btn-custom-primary shadow-sm">
                                <i class="fas fa-plus me-2"></i> محصول جدید
                            </a>
                        </div>
                    </div>

                    <!-- باکس جستجو -->
                    <div class="card custom-card mb-4 shadow-sm">
                        <div class="card-body p-3">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                                        <input type="text" class="form-control border-start-0 ps-0"
                                               placeholder="جستجو در محصولات...">
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                                    <span class="text-muted small">نمایش ۱ تا ۱۰ از ۵۴ محصول</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- جدول محصولات -->
                    <div class="card custom-card shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="ps-4">تصویر</th>
                                        <th>نام محصول</th>
                                        <th>دسته‌بندی</th>
                                        <th>قیمت</th>
                                        <th>موجودی</th>
                                        <th>وضعیت</th>
                                        <th class="text-center pe-4">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $products = mysqli_query($conn, "SELECT * FROM `product_store` WHERE 1");
                                    if (!empty($products)): ?>
                                        <?php foreach ($products as $product): ?>
                                            <tr>
                                                <td class="ps-4">
                                                    <!-- اگر عکس نبود، عکس پیش‌فرض نمایش داده شود -->
                                                    <?=$product['Image_Product']?>
                                                    <img src="
                                                    <?php
                                                    switch ($product['Image_Product']) {
                                                        case 1:
                                                            $product['Image_Product']= 'assets/images/hedphone_gaming.jpeg';
                                                            break;
                                                        case 2:
                                                            $product['Image_Product']=  'assets/images/falshdisk.jpeg';
                                                            break;
                                                        case 3:
                                                            $product['Image_Product']=   'assets/images/hubusb.jpeg';
                                                            break;
                                                    }
                                                    echo $product['Image_Product'];

                                                    ?>"

                                                         class="rounded" width="50" height="50"
                                                         style="object-fit: cover;">

                                                </td>
                                                <td>
                                                    <div class="fw-bold"><?= htmlspecialchars($product['Name_Product']) ?></div>
                                                    <small class="text-muted">کد:
                                                        #<?= htmlspecialchars($product['Id_Product']) ?></small>
                                                </td>
                                                <td><?= htmlspecialchars($product['Brand_Product']) ?></td>
                                                <td class="fw-bold text-success">
                                                    <?= number_format($product['Price_Product']) ?> ت
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark"><?= htmlspecialchars($product['NumberProduct_Store']) ?> عدد</span>
                                                </td>
                                                <td>
                                                    <?php
                                                    // تبدیل وضعیت به کلاس مناسب (مثلاً اگر 'active' بود سبز شود)
                                                    $statusClass = strtolower($product['Status_Product']) === 'active' || $product['Status_Product'] === 'فعال'
                                                            ? 'bg-success bg-opacity-10 text-success'
                                                            : 'bg-secondary bg-opacity-10 text-secondary';
                                                    ?>
                                                    <span class="badge <?= $statusClass ?> px-3 py-2 rounded-pill">
                                    <?= htmlspecialchars($product['Status_Product']) ?>
                                </span>
                                                </td>
                                                <td class="text-center pe-4">
                                                    <a href="#" class="btn btn-action btn-outline-primary btn-sm"><i
                                                                class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-action btn-outline-danger btn-sm"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">محصولی یافت نشد.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- فوتر جدول -->
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center py-3 px-4">
                            <div class="text-muted small">صفحه ۱ از ۶</div>
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled"><a class="page-link" href="#">قبلی</a></li>
                                    <li class="page-item active"><a class="page-link" href="#"
                                                                    style="background-color: var(--accent-green); border-color: var(--accent-green); color: var(--primary-dark);">۱</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                    <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                                </ul>
                            </nav>
                        </div>
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