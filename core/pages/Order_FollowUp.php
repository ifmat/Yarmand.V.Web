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

        $RequestId = $_GET['id']??'2';
//        $RequestId = $_SESSION['user_id'];

        $select = mysqli_query($conn,"
    SELECT request.*,sotres.Name_Store
    FROM request
    LEFT JOIN sotres
    ON request.UserId_Store=sotres.Id_Stores
    WHERE Id_Request='$RequestId'
    ");

        $row = mysqli_fetch_assoc($select);

        ?>

        <div class="container col-md-12 col-sm-10 col-xl-10 col-lg-9">

            <div class="main-content">

                <div class="main-content bg-light min-vh-100 p-4">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12 mb-4">

                                <div class="card custom-card shadow-sm">

                                    <div class="card-header custom-card-header d-flex justify-content-between align-items-center">

                                        <div>

                                            <i class="fas fa-map-marker-alt me-2"></i>

                                            پیگیری درخواست

                                        </div>

                                        <div>

                                            <?php

                                            if($row['Status_Request']==1){

                                                echo '<span class="badge bg-warning">در انتظار یاور</span>';

                                            }elseif($row['Status_Request']==2){

                                                echo '<span class="badge bg-primary">در حال خرید</span>';

                                            }elseif($row['Status_Request']==3){

                                                echo '<span class="badge bg-success">تحویل داده شد</span>';

                                            }else{

                                                echo '<span class="badge bg-danger">لغو شده</span>';

                                            }

                                            ?>

                                        </div>

                                    </div>

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    شماره درخواست

                                                </label>

                                                <div>

                                                    #<?php echo $row['Id_Request']; ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    فروشگاه

                                                </label>

                                                <div>

                                                    <?php echo $row['Name_Store']; ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    محصول

                                                </label>

                                                <div>

                                                    <?php echo $row['NameProduct_Request']; ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    تعداد

                                                </label>

                                                <div>

                                                    <?php echo $row['NumberProduct_Request']; ?>

                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    مبلغ

                                                </label>

                                                <div>

                                                    <?php echo $row['TotalPriceProduct_Request']; ?>

                                                    تومان

                                                </div>

                                            </div>

                                            <div class="col-md-6 mb-3">

                                                <label class="fw-bold text-secondary">

                                                    امتیاز

                                                </label>

                                                <div>

                                                    <?php echo $row['Score_Request']; ?>

                                                </div>

                                            </div>

                                            <div class="col-12">

                                                <label class="fw-bold text-secondary">

                                                    توضیحات

                                                </label>

                                                <div class="border rounded p-3 bg-light">

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

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="card custom-card shadow-sm">

                                    <div class="card-header custom-card-header">

                                        <i class="fas fa-route me-2"></i>

                                        روند درخواست

                                    </div>

                                    <div class="card-body">

                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">

                                                ✅ درخواست توسط یارجو ثبت شد.

                                            </li>

                                            <li class="list-group-item">

                                                <?php

                                                if($row['Status_Request']>=2){

                                                    echo "✅";

                                                }else{

                                                    echo "⏳";

                                                }

                                                ?>

                                                یاور درخواست را قبول کرده است.

                                            </li>

                                            <li class="list-group-item">

                                                <?php

                                                if($row['Status_Request']>=2){

                                                    echo "✅";

                                                }else{

                                                    echo "⏳";

                                                }

                                                ?>

                                                یاور در حال خرید محصولات می‌باشد.

                                            </li>

                                            <li class="list-group-item">

                                                <?php

                                                if($row['Status_Request']==3){

                                                    echo "✅";

                                                }else{

                                                    echo "⏳";

                                                }

                                                ?>

                                                سفارش تحویل داده شده است.

                                            </li>

                                        </ul>

                                    </div>

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
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>