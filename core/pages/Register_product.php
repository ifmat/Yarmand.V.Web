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
    require_once '../layout/Menu/Menu.php';
    ?>
    <main class="main-content">
        <div class="container-fluid">
            <div class="card">
                <div class="wrapper">
                    <div id="loader"></div>
                    <div class="content-wrapper">
                        <div class="container-fluid p-4 ">
                            <section class="content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-sm border-0">
                                            <div class="card-header bg-dark text-white">
                                                <h4 class="card-title mb-0" Multi_Lang="register_new_student">ثبت هنرجو جدید</h4>
                                            </div>
                                            <div class="card-body">
                                                <form enctype="multipart/form-data" action="add_stdu" method="post" id="frmFileUpload">
                                                    <div class="row g-4">
                                                        <!-- بخش اطلاعات دانش‌آموز -->
                                                        <div class="col-12">
                                                            <div class="card border">
                                                                <div class="card-header bg-secondary text-white">
                                                                    <h5 class="mb-0" Multi_Lang="student_info">اطلاعات دانش‌آموز</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row g-3">
                                                                        <div class="col-md-4">
                                                                            <label class="fw-bold" Multi_Lang="name">نام</label>
                                                                            <input required type="text" name="name_stdu" class="form-control" placeholder="نام">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="fw-bold" Multi_Lang="family">نام خانوادگی</label>
                                                                            <label>
                                                                                <input required type="text" name="lname_stdu" class="form-control" placeholder="فامیلی">
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="fw-bold" Multi_Lang="phone">شماره تلفن</label>
                                                                            <input required type="text" name="number_phone_stdu" class="form-control" placeholder="تلفن">
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label class="fw-bold" Multi_Lang="birthday">تاریخ تولد</label>
                                                                            <input data-jdp required type="text" name="birthday_stdu" class="form-control" placeholder="تاریخ تولد">
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label class="fw-bold" Multi_Lang="national_code">کد ملی</label>
                                                                            <input required type="number" name="cod_meli_stdu" class="form-control" placeholder="کدملی">
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label class="fw-bold" Multi_Lang="address">آدرس منزل</label>
                                                                            <textarea name="address_stdu" rows="2" class="form-control" placeholder="آدرس خانه"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- بخش اطلاعات والدین -->
                                                        <div class="col-md-6">
                                                            <div class="card border">
                                                                <div class="card-header bg-secondary text-white">
                                                                    <h6 class="mb-0" Multi_Lang="father_info">اطلاعات پدر</h6>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="row g-2">
                                                                        <div class="col-sm-6"><input type="text" name="father_name" class="form-control" placeholder="نام پدر"></div>
                                                                        <div class="col-sm-6"><input type="text" name="father_phone" class="form-control" placeholder="شماره پدر"></div>
                                                                        <div class="col-sm-6"><input type="text" name="father_education" class="form-control" placeholder="تحصیلات"></div>
                                                                        <div class="col-sm-6"><input type="text" name="father_job" class="form-control" placeholder="شغل"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card border">
                                                                <div class="card-header bg-secondary text-white">
                                                                    <h6 class="mb-0" Multi_Lang="mother_info">اطلاعات مادر</h6>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="row g-2">
                                                                        <div class="col-sm-6"><input type="text" name="mother_name" class="form-control" placeholder="نام مادر"></div>
                                                                        <div class="col-sm-6"><input type="text" name="mother_phone" class="form-control" placeholder="شماره مادر"></div>
                                                                        <div class="col-sm-6"><input type="text" name="mother_education" class="form-control" placeholder="تحصیلات"></div>
                                                                        <div class="col-sm-6"><input type="text" name="mother_job" class="form-control" placeholder="شغل"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 text-center mt-3">
                                                            <button type="submit" class="btn btn-success btn-lg px-5">
                                                                <i class="ti-save-alt"></i> <span Multi_Lang="submit_btn">ثبت هنرجو</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <!-- محتوای بیشتر اینجا قرار می‌گیرد -->
        </div>
    </main>

    <?php
    require_once '../layout/Js/Js.php';
    ?>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>