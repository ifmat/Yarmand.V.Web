    <?php
    require_once '../layout/session/session.php';
    require_once '../layout/Html/StartHtml.php';
    require_once '../layout/Head/Head.php';
    require_once '../db/Connect.php';

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
        <div class="row g-4">
            <?php
            require_once '../layout/Menu/Menu.php';
            ?>
            <!-- اطلاعات درخواست -->
            <div class="col-lg-8">
                <div class="card custom-card h-100 shadow-sm">
                    <div class="card-header custom-card-header">
                        <i class="fas fa-shopping-basket me-2"></i>
                        اطلاعات درخواست
                    </div>

                    <div class="card-body p-4">
                        <form action="Chek_Register_Request" method="post">
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary small">
                                    انتخاب فروشگاه
                                </label>

                                <select name="store_id" id="storeSelect"
                                        class="form-select"
                                        onchange="filterProducts()" required>

                                    <option value="" selected disabled>
                                        انتخاب فروشگاه
                                    </option>

                                    <?php
                                    $select = mysqli_query($conn,"SELECT * FROM sotres WHERE Status_Store='1'");

                                    while($row=mysqli_fetch_assoc($select)){
                                        ?>

                                        <option value="<?= $row['Id_Stores']; ?>">
                                            <?= $row['Name_Store']; ?>
                                        </option>

                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-bold text-secondary small">
                                    انتخاب محصول
                                </label>

                                <select name="product_id"
                                        id="productSelect"
                                        class="form-select"
                                        required>

                                    <option selected disabled>
                                        ابتدا فروشگاه را انتخاب کنید
                                    </option>

                                </select>

                                <?php

                                $product=mysqli_query($conn,"SELECT * FROM product_store");

                                $all_products=[];

                                while($row=mysqli_fetch_assoc($product)){
                                    $all_products[]=$row;
                                }

                                ?>

                                <script>

                                    var allProducts=<?= json_encode($all_products); ?>;

                                </script>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-bold text-secondary small">
                                    تعداد
                                </label>

                                <input type="number"
                                       class="form-control"
                                       name="number"
                                       id="numberProduct"
                                       value="1"
                                       min="1">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-bold text-secondary small">
                                    مبلغ کل
                                </label>

                                <div class="input-group">

                                    <input type="number"
                                           class="form-control"
                                           name="price"
                                           id="totalPrice"
                                           readonly>

                                    <span class="input-group-text">
                                تومان
                            </span>

                                </div>

                            </div>

                            <div class="col-12">

                                <label class="form-label fw-bold text-secondary small">
                                    توضیحات
                                </label>

                                <textarea
                                        name="description"
                                        rows="5"
                                        class="form-control"
                                        placeholder="در صورت نیاز توضیحی برای یاور بنویسید..."></textarea>

                            </div>

                            <div class="row mt-4">
                                <div class="col-12 text-end">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-custom-primary btn-lg px-5">
                                            <i class="fas fa-save me-2"></i>
                                            ثبت درخواست
                                        </button>
                                    </div>
                                </div>
                            </div>                        </form>
                            <div class="col-lg-4">

                                <div class="card custom-card shadow-sm">

                                    <div class="card-header custom-card-header">

                                        <i class="fas fa-info-circle me-2"></i>

                                        اطلاعات درخواست

                                    </div>

                                    <div class="card-body">

                                        <div class="mb-3">

                                            <label class="form-label fw-bold text-secondary small">
                                                وضعیت
                                            </label>

                                            <select name="status"
                                                    class="form-select">

                                                <option value="1">
                                                    در انتظار یاور
                                                </option>

                                            </select>

                                        </div>

                                        <div class="alert alert-light">

                                            پس از ثبت درخواست، یاورها می‌توانند آن را مشاهده و قبول کنند.

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- اطلاعات جانبی -->
        </div>
        <?php
        require_once '../layout/Js/Js.php';
        ?>
        <script>

            function filterProducts() {
                var storeId = document.getElementById('storeSelect').value;
                var productSelect = document.getElementById('productSelect');

                // فیلتر محصولات
                var filtered = allProducts.filter(p => p.SotreId_Product == storeId);

                // ساخت گزینه‌ها
                var options = '<option value="" selected disabled>' +
                    (storeId ? 'انتخاب کنید...' : 'ابتدا فروشگاه را انتخاب کنید...') +
                    '</option>';

                if (storeId && filtered.length === 0) {
                    options += '<option value="" disabled>هیچ محصولی موجود نیست</option>';
                }

                filtered.forEach(function (p) {
                    options += '<option value="' + p.Id_Product + '">' +
                        p.Name_Product + ' - ' + p.Price_Product + ' تومان</option>';
                });

                productSelect.innerHTML = options;
            }
            // وقتی محصول انتخاب شد
            document.getElementById('productSelect').addEventListener('change', function() {
                var selectedProductId = this.value;
                var priceInput = document.querySelector('input[name="price"]');
                var stockInput = document.querySelector('input[name="stock"]');

                if (selectedProductId) {
                    // پیدا کردن محصول انتخاب شده
                    var selectedProduct = allProducts.find(p => p.Id_Product == selectedProductId);
                    if (selectedProduct) {
                        // ذخیره قیمت پایه به عنوان data attribute
                        priceInput.dataset.basePrice = selectedProduct.Price_Product;
                        // محاسبه قیمت بر اساس تعداد فعلی
                        var quantity = parseInt(stockInput.value) || 1;
                        priceInput.value = selectedProduct.Price_Product * quantity;
                    }
                } else {
                    priceInput.value = '';
                    delete priceInput.dataset.basePrice;
                }
            });

            // وقتی تعداد تغییر کرد
            document.querySelector('input[name="stock"]').addEventListener('input', function() {
                var priceInput = document.querySelector('input[name="price"]');
                var basePrice = priceInput.dataset.basePrice;

                if (basePrice) {
                    var quantity = parseInt(this.value) || 0;
                    priceInput.value = basePrice * quantity;
                }
            });

            // اجرا در شروع
            document.addEventListener('DOMContentLoaded', filterProducts);</script>
        </body>
    <?php
    require_once '../layout/Html/EndHtml.php';
    ?>