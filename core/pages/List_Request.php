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

        $Select = mysqli_query($conn,"
    SELECT request.*,sotres.Name_Store
    FROM request
    LEFT JOIN sotres
    ON request.UserId_Store=sotres.Id_Stores
    WHERE Status_Request='0'
    ORDER BY Id_Request DESC
    ");

        ?>

        <div class="container col-md-12 col-sm-10 col-xl-10 col-lg-9">

            <div class="main-content">

                <div class="main-content bg-light min-vh-100 p-4">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-12 mb-4">

                                <div class="card custom-card shadow-sm">

                                    <div class="card-header custom-card-header">

                                        <i class="fas fa-clipboard-list me-2"></i>

                                        برد درخواست‌های یارجویان

                                    </div>

                                </div>

                            </div>

                            <?php

                            if(mysqli_num_rows($Select)>0){

                                while($row=mysqli_fetch_assoc($Select)){

                                    ?>

                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-4">

                                        <div class="card custom-card shadow-sm h-100">

                                            <div class="card-header d-flex justify-content-between">

                                    <span>

                                        درخواست شماره

                                        #<?php echo $row['Id_Request']; ?>

                                    </span>

                                                <span class="badge bg-warning">

                                        در انتظار

                                    </span>

                                            </div>

                                            <div class="card-body">

                                                <div class="row">

                                                    <div class="col-6 mb-3">

                                                        <strong>

                                                            فروشگاه

                                                        </strong>

                                                        <br>

                                                        <?php echo $row['Name_Store']; ?>

                                                    </div>

                                                    <div class="col-6 mb-3">

                                                        <strong>

                                                            محصول

                                                        </strong>

                                                        <br>

                                                        <?php echo $row['NameProduct_Request']; ?>

                                                    </div>

                                                    <div class="col-6 mb-3">

                                                        <strong>

                                                            تعداد

                                                        </strong>

                                                        <br>

                                                        <?php echo $row['NumberProduct_Request']; ?>

                                                    </div>

                                                    <div class="col-6 mb-3">

                                                        <strong>

                                                            مبلغ

                                                        </strong>

                                                        <br>

                                                        <?php echo $row['TotalPriceProduct_Request']; ?>

                                                        تومان

                                                    </div>

                                                    <div class="col-12">

                                                        <strong>

                                                            توضیحات

                                                        </strong>

                                                        <div class="border rounded p-2 mt-2 bg-light">

                                                            <?php

                                                            if(empty($row['Description_Request'])){

                                                                echo "توضیحی ثبت نشده است.";

                                                            }else{

                                                                echo nl2br($row['Description_Request']);

                                                            }

                                                            ?>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="card-footer text-end">

                                                <button
                                                    class="btn btn-custom-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Accept_Request_<?php echo $row['Id_Request']; ?>">

                                                    <i class="fas fa-handshake me-2"></i>

                                                    قبول درخواست

                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Modal -->

                                    <div class="modal fade"
                                         id="Accept_Request_<?php echo $row['Id_Request']; ?>"
                                         tabindex="-1">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <form action="Chek_Request" method="post">

                                                    <input type="hidden"
                                                           name="Method"
                                                           value="Accept">

                                                    <input type="hidden"
                                                           name="Request_Id"
                                                           value="<?php echo $row['Id_Request']; ?>">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title">

                                                            قبول درخواست

                                                        </h5>

                                                        <button type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal"></button>

                                                    </div>

                                                    <div class="modal-body text-center">

                                                        <i class="fas fa-handshake fa-3x text-success mb-3"></i>

                                                        <h5>

                                                            آیا از قبول این درخواست مطمئن هستید؟

                                                        </h5>

                                                        <p class="text-muted">

                                                            پس از قبول، این درخواست به لیست درخواست‌های شما منتقل خواهد شد.

                                                        </p>

                                                    </div>

                                                    <div class="modal-footer">

                                                        <button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">

                                                            انصراف

                                                        </button>

                                                        <button type="submit"
                                                                class="btn btn-success">

                                                            قبول درخواست

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                    <?php

                                }

                            }else{

                                ?>

                                <div class="col-12">

                                    <div class="card custom-card shadow-sm">

                                        <div class="card-body text-center py-5">

                                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>

                                            <h5>

                                                در حال حاضر هیچ درخواستی وجود ندارد.

                                            </h5>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                        </div>

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