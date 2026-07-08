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
        <?php

        $UserId = $_SESSION['user_id'];

        $Wallet = mysqli_query($conn,"
    SELECT *
    FROM wallet
    WHERE UserId_Wallet='$UserId'
    ");

        $wallet = mysqli_fetch_assoc($Wallet);

        ?>

        <div class="container col-md-12 col-sm-10 col-xl-10 col-lg-9">

            <div class="main-content">

                <div class="main-content bg-light min-vh-100 p-4">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <div class="card custom-card shadow-sm">

                                    <div class="card-header custom-card-header">

                                        <i class="fas fa-wallet me-2"></i>

                                        کیف پول

                                    </div>

                                    <div class="card-body text-center py-5">

                                        <i class="fas fa-wallet fa-4x text-success mb-4"></i>

                                        <h6 class="text-muted">

                                            موجودی کیف پول

                                        </h6>

                                        <h2 class="fw-bold mt-3 mb-4">

                                            <?php

                                            if(mysqli_num_rows($Wallet)>0){

                                                echo number_format($wallet['Total_Wallet']);

                                            }else{

                                                echo "0";

                                            }

                                            ?>

                                            تومان

                                        </h2>

                                        <span class="badge bg-success">

                                        فعال

                                    </span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 mb-4">

                                <div class="card custom-card shadow-sm h-100">

                                    <div class="card-header custom-card-header">

                                        اطلاعات کیف پول

                                    </div>

                                    <div class="card-body">

                                        <table class="table table-borderless">

                                            <tr>

                                                <td>

                                                    وضعیت

                                                </td>

                                                <td class="text-end">

                                                    فعال

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                    موجودی

                                                </td>

                                                <td class="text-end">

                                                    <?php

                                                    if(mysqli_num_rows($Wallet)>0){

                                                        echo number_format($wallet['Total_Wallet']);

                                                    }else{

                                                        echo "0";

                                                    }

                                                    ?>

                                                    تومان

                                                </td>

                                            </tr>

                                            <tr>

                                                <td>

                                                    آخرین بروزرسانی

                                                </td>

                                                <td class="text-end">

                                                    امروز

                                                </td>

                                            </tr>

                                        </table>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 mb-4">

                                <div class="card custom-card shadow-sm h-100">

                                    <div class="card-header custom-card-header">

                                        راهنما

                                    </div>

                                    <div class="card-body">

                                        <p>

                                            موجودی کیف پول جهت پرداخت سفارش‌ها استفاده می‌شود.

                                        </p>

                                        <hr>

                                        <p>

                                            در حال حاضر امکان شارژ آنلاین کیف پول فعال نیست.

                                        </p>

                                        <hr>

                                        <p class="mb-0">

                                            در نسخه‌های آینده تاریخچه تراکنش‌ها نیز نمایش داده خواهد شد.

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <?php
        require_once '../layout/Js/Js.php';
        ?>
    </div>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>