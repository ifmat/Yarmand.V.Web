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

        $UserId = $_SESSION['user_id'];

        $Select = mysqli_query($conn, "
SELECT request.*,sotres.Name_Store
FROM request
LEFT JOIN sotres
ON request.UserId_Store=sotres.Id_Stores
WHERE YavarId_Request='$UserId'
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

                                        <i class="fas fa-shopping-basket me-2"></i>
                                        درخواست های من
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (mysqli_num_rows($Select) > 0) {
                                while ($row = mysqli_fetch_assoc($Select)) {
                                    ?>
                                    <div class="col-lg-6 mb-4">

                                        <div class="card custom-card shadow-sm h-100">

                                            <div class="card-header d-flex justify-content-between">

                                <span>

                                    درخواست #

                                    <?php echo $row['Id_Request']; ?>

                                </span>

                                                <span>

                                <?php

                                if ($row['Status_Request'] == 2) {

                                    echo '<span class="badge bg-primary">پذیرفته شده</span>';

                                }

                                if ($row['Status_Request'] == 3) {

                                    echo '<span class="badge bg-warning">در حال خرید</span>';

                                }

                                if ($row['Status_Request'] == 4) {

                                    echo '<span class="badge bg-success">تحویل شده</span>';

                                }

                                ?>

                                </span>

                                            </div>
                                            <div class="card-body">

                                                <div class="mb-2">

                                                    <b>فروشگاه :</b>

                                                    <?php echo $row['Name_Store']; ?>

                                                </div>

                                                <div class="mb-2">

                                                    <b>محصول :</b>

                                                    <?php echo $row['NameProduct_Request']; ?>

                                                </div>

                                                <div class="mb-2">

                                                    <b>تعداد :</b>

                                                    <?php echo $row['NumberProduct_Request']; ?>

                                                </div>

                                                <div class="mb-2">

                                                    <b>مبلغ :</b>

                                                    <?php echo $row['TotalPriceProduct_Request']; ?>

                                                    تومان

                                                </div>

                                                <div class="mb-3">

                                                    <b>توضیحات :</b>

                                                    <div class="border rounded p-2 mt-2 bg-light">

                                                        <?php

                                                        if (empty($row['Description_Request'])) {

                                                            echo "توضیحی ثبت نشده است.";

                                                        } else {

                                                            echo nl2br($row['Description_Request']);

                                                        }

                                                        ?>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="card-footer text-end">

                                                <button
                                                        class="btn btn-custom-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Status_<?php echo $row['Id_Request']; ?>">

                                                    تغییر وضعیت

                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade"
                                         id="Status_<?php echo $row['Id_Request']; ?>"
                                         tabindex="-1">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <form action="Chek_Request_Update" method="post">

                                                    <input
                                                            type="hidden"
                                                            name="Method"
                                                            value="Change_Status">

                                                    <input
                                                            type="hidden"
                                                            name="Request_Id"
                                                            value="<?php echo $row['Id_Request']; ?>">

                                                    <div class="modal-header">

                                                        <h5 class="modal-title">

                                                            تغییر وضعیت درخواست

                                                        </h5>

                                                        <button type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal"></button>

                                                    </div>

                                                    <div class="modal-body">

                                                        <label class="form-label">

                                                            وضعیت درخواست

                                                        </label>

                                                        <select
                                                                class="form-select"
                                                                name="Status_Request">

                                                            <option value="2"
                                                                    <?php if($row['Status_Request']==2){echo "selected";} ?>>

                                                                پذیرفته شده

                                                            </option>

                                                            <option value="3"
                                                                    <?php if($row['Status_Request']==3){echo "selected";} ?>>

                                                                تحویل از فروشگاه

                                                            </option>

                                                            <option value="4"
                                                                    <?php if($row['Status_Request']==4){echo "selected";} ?>>

                                                                تحویل به سالمند

                                                            </option>

                                                        </select>

                                                    </div>

                                                    <div class="modal-footer">

                                                        <button
                                                                type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">

                                                            انصراف

                                                        </button>

                                                        <button
                                                                type="submit"
                                                                class="btn btn-custom-primary">

                                                            ثبت تغییرات

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="col-12">

                                    <div class="alert alert-info">

                                        هنوز هیچ درخواستی قبول نکرده اید.

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