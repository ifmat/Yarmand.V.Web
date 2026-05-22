<?php
require_once '../layout/Html/StartHtml.php';
require_once '../layout/Head/Head.php';
?>
    <body class="bg-gradient min-vh-100 d-flex align-items-start justify-content-center Register-Page">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-11 col-sm-8 col-md-7 col-lg-7 col-xl-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden Register-main">
                    <div class="card-header text-center py-4 border-0"
                         style="">
                        <i class="ti-lock display-5 text-white"></i>
                        <h2 class="text-white mt-2 mb-0 fw-bold" Multi_Lang="Welcome_login"></h2>
                    </div>
                    <div class="card-body p-4 p-xl-5">
                        <form action="chek_user_login" method="post">
                            <div class="mb-3">
                                <label for="Email" class="form-label fw-bold" Multi_Lang="Label_Email">ایمیل</label>
                                <div class="input-group">
                                    <input name="Email" id="Email" type="email" class="form-control form-control-lg rounded-3 text-dark" required>
                                    <span class="input-group-text rounded-3 border-0"><i class="fa-solid fa-envelope text-dark"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label fw-bold" Multi_Lang="Label_Password">رمز عبور</label>
                                <div class="input-group">
                                    <input id="pass" name="pass" type="password" class="form-control form-control-lg rounded-3" required>
                                    <span class="input-group-text toggle-password rounded-3 border-0">
            <i class="fa-solid fa-eye text-dark"></i>
        </span>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-muted">
                                    <span Multi_Lang="register_Prompt" style="background: whitesmoke">آیا حساب کاربری نداری؟؟</span>
                                    <a href="register.php" class="text-primary fw-bold" Multi_Lang="register_Link">ساخت حساب جدید</a>
                                </p>
                            </div>
                            <button type="submit" name="login"
                                    class="btn w-100 py-2 fw-bold text-white border-0 rounded-3"
                                    Multi_Lang="Submit">

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