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
                         style="">
                        <i class="ti-lock display-5 text-white"></i>
                        <h2 class="text-white mt-2 mb-0 fw-bold" Multi_Lang="Welcome_login"></h2>
                    </div>
                    <!-- بدنه کارت -->
                    <div class="card-body p-4 p-xl-5">
                        <form action="chek_user" method="post">
                            <div class="mb-3">
                                <label for="FirstName" class="form-label fw-bold" Multi_Lang="Label_Name">نام</label>
                                <div class="input-group">
                                    <input name="FirstName" id="FirstName" type="text" class="form-control form-control-lg rounded-3 text-dark">
                                    <span class="input-group-text rounded-3 border-0"><i class="fa-solid fa-user text-dark"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="LastName" class="form-label fw-bold Register-label" Multi_Lang="Label_LastName"></label>
                                <div class="input-group">
                                    <input name="LastName" id="LastName" type="text" class="form-control form-control-lg rounded-3 text-dark">
                                    <span class="input-group-text rounded-3 border-0"><i class="fa-solid fa-user text-dark"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label fw-bold" Multi_Lang="Label_Role" ></label>
                                <div class="input-group">
                                    <select name="role" id="role" class="form-control form-control-lg rounded-3 text-dark">
                                        <option value="" disabled selected Multi_Lang="Role_Choise"></option>
                                        <option value="3" Multi_Lang="Role_salmand"></option>
                                        <option value="4" Multi_Lang="Role_do"></option>
                                        <option value="5" Multi_Lang="Role_shop"></option>
                                    </select>
                                    <span class="input-group-text rounded-3 border-0"><i class="fa-solid fa-universal-access text-dark"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label fw-bold" Multi_Lang="Label_Email">ایمیل</label>
                                <div class="input-group">
                                    <input name="Email" id="Email" type="email" class="form-control form-control-lg rounded-3 text-dark">
                                    <span class="input-group-text rounded-3 border-0"><i class="fa-solid fa-envelope text-dark"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label fw-bold" Multi_Lang="Label_Password">رمز عبور</label>
                                <div class="input-group">
                                    <input id="pass" name="pass" type="password" class="form-control form-control-lg rounded-3">
                                    <span class="input-group-text toggle-password rounded-3 border-0">
            <i class="fa-solid fa-eye text-dark"></i>
        </span>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="text-muted">
                                    <span Multi_Lang="Login_Prompt" style="background: whitesmoke"></span>
                                    <a href="login" class="text-primary fw-bold" Multi_Lang="Login_Link">وارد شوید</a>
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