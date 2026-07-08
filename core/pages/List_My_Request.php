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
<div class="row">

    <?php
    require_once '../layout/Menu/Menu.php';
    ?>

    <div class="container col-md-12 col-sm-10 col-xl-10 col-lg-9">

        <div class="main-content">

            <div class="main-content bg-light min-vh-100 p-4">

                <div class="container-fluid">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>
                            <h2 class="fw-bold text-dark mb-1">
                                <i class="fas fa-list-alt text-success me-2"></i>
                                درخواست های من
                            </h2>

                            <small class="text-muted">
                                لیست تمامی درخواست های ثبت شده شما
                            </small>

                        </div>

                    </div>

                    <?php

                    $select = mysqli_query($conn,"
                    SELECT request.* , sotres.Name_Store
                    FROM request
                    LEFT JOIN sotres
                    ON request.UserId_Store=sotres.Id_Stores
                    WHERE UserId_Request='".$_SESSION['user_id']."'
                    ORDER BY Id_Request DESC
                    ");

                    if(mysqli_num_rows($select)>0){

                        while($row=mysqli_fetch_assoc($select)){

                            ?>

                            <div class="card custom-card shadow-sm mb-4">

                                <div class="card-header custom-card-header d-flex justify-content-between align-items-center">

                                    <div>

                                        <i class="fas fa-shopping-basket me-2"></i>

                                        درخواست شماره

                                        <strong>

                                            <?php echo $row['Id_Request']; ?>

                                        </strong>

                                    </div>

                                    <div>

                                        <?php

                                        if($row['Status_Request']==1){

                                            ?>

                                            <span class="badge bg-warning">

                                                در انتظار یاور

                                            </span>

                                            <?php

                                        }

                                        elseif($row['Status_Request']==2){

                                            ?>

                                            <span class="badge bg-primary">

                                                در حال خرید

                                            </span>

                                            <?php

                                        }

                                        elseif($row['Status_Request']==3){

                                            ?>

                                            <span class="badge bg-success">

                                                تحویل داده شد

                                            </span>

                                            <?php

                                        }

                                        else{

                                            ?>

                                            <span class="badge bg-danger">

                                                لغو شده

                                            </span>

                                            <?php

                                        }

                                        ?>

                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-bold text-secondary small">

                                                فروشگاه

                                            </label>

                                            <div>

                                                <?php echo $row['Name_Store']; ?>

                                            </div>

                                        </div>

                                        <div class="col-md-6 mb-3">

                                            <label class="fw-bold text-secondary small">

                                                محصول

                                            </label>

                                            <div>

                                                <?php echo $row['NameProduct_Request']; ?>

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label class="fw-bold text-secondary small">

                                                تعداد

                                            </label>

                                            <div>

                                                <?php echo $row['NumberProduct_Request']; ?>

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label class="fw-bold text-secondary small">

                                                مبلغ

                                            </label>

                                            <div>

                                                <?php echo $row['TotalPriceProduct_Request']; ?>

                                                تومان

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">

                                            <label class="fw-bold text-secondary small">

                                                امتیاز

                                            </label>

                                            <div>

                                                <?php echo $row['Score_Request']; ?>

                                            </div>

                                        </div>

                                        <div class="col-12">

                                            <label class="fw-bold text-secondary small">

                                                توضیحات

                                            </label>

                                            <div class="border rounded p-3 bg-light">

                                                <?php

                                                if($row['Description_Request']==""){

                                                    echo "توضیحی ثبت نشده است.";

                                                }

                                                else{

                                                    echo nl2br($row['Description_Request']);

                                                }

                                                ?>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer bg-white">

                                    <div class="text-end">

                                        <button
                                                class="btn btn-outline-primary me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Edit_Request_<?php echo $row['Id_Request']; ?>">

                                            <i class="fas fa-edit me-1"></i>

                                            ویرایش

                                        </button>

                                        <button
                                                class="btn btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Delete_Request_<?php echo $row['Id_Request']; ?>">

                                            <i class="fas fa-trash me-1"></i>

                                            حذف

                                        </button>

                                    </div>

                                </div>

                            </div>
                            <!-- Modal Edit -->
                            <?php if($row['Status_Request']==1){ ?>

                                <div class="modal fade"
                                     id="Edit_Request_<?php echo $row['Id_Request']; ?>"
                                     tabindex="-1">

                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">

                                            <form action="Chek_My_Request" method="post">

                                                <input type="hidden"
                                                       name="Method"
                                                       value="Edit">

                                                <input type="hidden"
                                                       name="Request_Id"
                                                       value="<?php echo $row['Id_Request']; ?>">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">

                                                        ویرایش درخواست

                                                    </h5>

                                                    <button type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"></button>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">

                                                        <div class="col-md-6 mb-3">

                                                            <label class="form-label">
                                                                تعداد
                                                            </label>

                                                            <input type="number"
                                                                   class="form-control"
                                                                   name="number"
                                                                   value="<?php echo $row['NumberProduct_Request']; ?>"
                                                                   required>

                                                        </div>

                                                        <div class="col-md-6 mb-3">

                                                            <label class="form-label">
                                                                مبلغ
                                                            </label>

                                                            <input type="number"
                                                                   class="form-control"
                                                                   name="price"
                                                                   value="<?php echo $row['TotalPriceProduct_Request']; ?>"
                                                                   required>

                                                        </div>

                                                        <div class="col-12">

                                                            <label class="form-label">
                                                                توضیحات
                                                            </label>

                                                            <textarea class="form-control"
                                                                      rows="5"
                                                                      name="description"><?php echo $row['Description_Request']; ?></textarea>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal">

                                                        انصراف

                                                    </button>

                                                    <button type="submit"
                                                            class="btn btn-success">

                                                        ذخیره تغییرات

                                                    </button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>                                <!-- Modal Delete -->

                                <div class="modal fade"
                                     id="Delete_Request_<?php echo $row['Id_Request']; ?>"
                                     tabindex="-1">

                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <form action="Chek_My_Request" method="post">

                                                <input type="hidden"
                                                       name="Method"
                                                       value="Delete">

                                                <input type="hidden"
                                                       name="Request_Id"
                                                       value="<?php echo $row['Id_Request']; ?>">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">

                                                        حذف درخواست

                                                    </h5>

                                                    <button type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"></button>

                                                </div>

                                                <div class="modal-body text-center">

                                                    <i class="fas fa-trash fa-3x text-danger mb-3"></i>

                                                    <h5>

                                                        آیا از حذف این درخواست مطمئن هستید؟

                                                    </h5>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal">

                                                        انصراف

                                                    </button>

                                                    <button type="submit"
                                                            class="btn btn-danger">

                                                        بله، حذف شود

                                                    </button>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            <?php } ?>

                            <?php

                        }

                    }

                    else{

                        ?>

                        <div class="card custom-card shadow-sm">

                            <div class="card-body text-center p-5">

                                <i class="fas fa-inbox fa-4x text-secondary mb-3"></i>

                                <h5>

                                    هنوز هیچ درخواستی ثبت نکرده اید.

                                </h5>

                            </div>

                        </div>

                        <?php

                    }

                    ?>

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