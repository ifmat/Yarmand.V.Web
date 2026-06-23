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
                                                    <img src="
                                                    <?php
                                                    switch ($product['Image_Product']) {
                                                        case 1:
                                                            $product['Image_Product'] = 'assets/images/hedphone_gaming.jpeg';
                                                            break;
                                                        case 2:
                                                            $product['Image_Product'] = 'assets/images/falshdisk.jpeg';
                                                            break;
                                                        case 3:
                                                            $product['Image_Product'] = 'assets/images/hubusb.jpeg';
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
                                                    <!-- دکمه ویرایش با ویژگی‌های مدال -->
                                                    <button type="button"
                                                            class="btn btn-outline-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            data-id="<?= $product['Id_Product'] ?>"
                                                            data-name="<?= htmlspecialchars($product['Name_Product']) ?>"
                                                            data-brand="<?= htmlspecialchars($product['Brand_Product']) ?>"
                                                            data-price="<?= $product['Price_Product'] ?>"
                                                            data-stock="<?= $product['NumberProduct_Store'] ?>"
                                                            data-status="<?= $product['Status_Product'] ?>"
                                                            data-image="<?= htmlspecialchars($product['Image_Product']) ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-danger btn-sm ms-1">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
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
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">ویرایش محصول</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editProductForm">
                                    <!-- فیلد ID (مخفی) -->
                                    <input type="hidden" id="edit_id">

                                    <div class="mb-3">
                                        <label for="edit_name" class="form-label">نام محصول</label>
                                        <input type="text" class="form-control" id="edit_name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_brand" class="form-label">برند / دسته‌بندی</label>
                                        <input type="text" class="form-control" id="edit_brand" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_price" class="form-label">قیمت (تومان)</label>
                                            <input type="number" class="form-control" id="edit_price" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="edit_stock" class="form-label">موجودی</label>
                                            <input type="number" class="form-control" id="edit_stock" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_status" class="form-label">وضعیت</label>
                                        <select class="form-select" id="edit_status">
                                            <option value="فعال">فعال</option>
                                            <option value="غیرفعال">غیرفعال</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="edit_image" class="form-label">لینک تصویر</label>
                                        <input type="text" class="form-control" id="edit_image">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                                <button type="button" class="btn btn-success">ذخیره تغییرات</button>
                            </div>
                            <script>
                                // وقتی مدال باز می‌شود، اطلاعات را از دکمه‌ای که کلیک شده بگیر و در فرم قرار بده
                                var editModal = document.getElementById('editModal');
                                editModal.addEventListener('show.bs.modal', function (event) {
                                    // دکمه‌ای که مدال را باز کرده
                                    var button = event.relatedTarget;

                                    // گرفتن داده‌ها از ویژگی‌های data-*
                                    var id = button.getAttribute('data-id');
                                    var name = button.getAttribute('data-name');
                                    var brand = button.getAttribute('data-brand');
                                    var price = button.getAttribute('data-price');
                                    var stock = button.getAttribute('data-stock');
                                    var status = button.getAttribute('data-status');
                                    var image = button.getAttribute('data-image');

                                    // قرار دادن داده‌ها در فیلدهای مدال
                                    var modalId = editModal.querySelector('#edit_id');
                                    var modalName = editModal.querySelector('#edit_name');
                                    var modalBrand = editModal.querySelector('#edit_brand');
                                    var modalPrice = editModal.querySelector('#edit_price');
                                    var modalStock = editModal.querySelector('#edit_stock');
                                    var modalStatus = editModal.querySelector('#edit_status');
                                    var modalImage = editModal.querySelector('#edit_image');

                                    modalId.value = id;
                                    modalName.value = name;
                                    modalBrand.value = brand;
                                    modalPrice.value = price;
                                    modalStock.value = stock;
                                    modalStatus.value = status;
                                    modalImage.value = image;
                                });
                            </script>
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