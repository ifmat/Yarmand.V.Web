<?php
require_once '../layout/Html/StartHtml.php';
require_once '../layout/Head/Head.php';
?>
    <body class="bg-gradient min-vh-100 d-flex align-items-start justify-content-center Register-Page">

    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-11 col-sm-8 col-md-7 col-lg-7 col-xl-6">

                <!-- کارت ثبت نام / ورود -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden Register-main">

                    <!-- هدر کارت -->
                    <div class="card-header text-center py-4 border-0"
                         style="background: linear-gradient(135deg, #00ec9d, #00b894);">
                        <i class="ti-lock display-5 text-white"></i>
                        <h2 class="text-white mt-2 mb-0 fw-bold">ورود به سامانه</h2>
                    </div>

                    <!-- بدنه کارت -->
                    <div class="card-body p-4 p-xl-5">
                        <form action="chek_user" method="post">

                            <!-- فیلد نام کاربری -->
                            <div class="input-group mb-4">
                                <input name="user" id="user" type="number"
                                       class="form-control form-control-lg rounded-3  text-dark "
                                       placeholder="نام کاربری">
                                <span class="input-group-text rounded-3 border-0">
                                <i class="fa-solid fa-user text-dark"></i>
                            </span>
                            </div>

                            <!-- فیلد رمز عبور -->
                            <div class="input-group mb-4 ">
                                <input id="pass" name="pass" type="password"
                                       class="form-control form-control-lg rounded-3 "
                                       placeholder="رمز عبور">
                                <span class="input-group-text toggle-password rounded-3 border-0">
                                <i class="fa-solid fa-eye text-dark"></i>
                            </span>
                            </div>

                            <!-- دکمه ورود -->
                            <button type="submit" name="login"
                                    class="btn w-100 py-2 fw-bold text-white border-0 rounded-3"
                                    style="">
                                ورود
                            </button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password')?.addEventListener('click', function () {
            let passInput = document.querySelector('#pass');
            let icon = this.querySelector('i');

            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    <?php
    require_once '../layout/Js/Js.php';
    ?>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>