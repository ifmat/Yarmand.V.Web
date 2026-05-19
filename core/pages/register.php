<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    body {
        display: flex;
        align-items: flex-start; /* قبلاً center بود */
        justify-content: center;
        padding-top: 10vh; /* فاصله از بالا */
    }

    @keyframes gradientMove {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    .login-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        border-radius: 18px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.35);
        width: 100%;
        max-width: 420px;
        overflow: hidden;
        animation: fadeIn 1s ease forwards;
        transform: translateY(30px);
        opacity: 0;
    }
    @keyframes fadeIn {
        to { transform: translateY(0); opacity: 1; }
    }
    .login-header {
        background: linear-gradient(135deg, #00ec9d, #00b894);
        padding: 25px;
        text-align: center;
        color: #fff;
    }
    .login-header i { font-size: 45px; margin-bottom: 10px; }
    .login-header h2 { margin: 0; font-size: 22px; font-weight: 700; }
    .login-body { padding: 35px 30px; color: #fff; text-align: center; }
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        color: #fff;
        height: 45px;
        transition: 0.3s;
    }
    .form-control:focus {
        background: rgba(255, 255, 255, 0.2);
        border-color: #00ec9d;
        box-shadow: 0 0 10px rgba(0, 236, 157, 0.3);
    }
    .form-control::placeholder { color: rgba(255, 255, 255, 0.7); }
    .input-group-text {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff;
    }
    .btn-login {
        background: linear-gradient(135deg, #00ec9d, #00b894);
        border: none;
        color: #fff;
        font-weight: 600;
        width: 100%;
        border-radius: 12px;
        height: 45px;
        transition: all 0.3s ease;
        margin-top: 10px;
    }
    .btn-login:hover {
        background: linear-gradient(135deg, #00b894, #00ec9d);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 236, 157, 0.4);
    }
    .captcha-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 5px 10px;
        margin-top: 10px;
    }
    .refresh-captcha {
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
    }
    .refresh-captcha:hover {
        color: #00ec9d;
        transform: rotate(90deg);
    }
    footer {
        position: absolute;
        bottom: 10px;
        width: 100%;
        text-align: center;
        color: #ccc;
        font-size: 13px;
    }
    @media (max-width: 768px) {
        .login-body { padding: 25px 20px; }
    }
</style>

<div class="login-card">
    <div class="login-header">
        <i class="ti-lock"></i>
        <h2>ورود به سامانه</h2>
    </div>

    <div class="login-body">
        <form action="chek_user" method="post">
            <div class="input-group mb-3">
                <input name="user" id="user" type="number" class="form-control ps-15"
                       placeholder="نام کاربری" style="direction: rtl;">
                <span class="input-group-text"><i class="ti-user"></i></span>
            </div>

            <div class="input-group mb-3">
                <input id="pass" name="pass" type="password" class="form-control ps-15"
                       placeholder="رمز عبور" style="direction: rtl;">
                <span class="input-group-text toggle-password"><i class="ti-eye"></i></span>
            </div>

            <div class="captcha-box">
                <img src="captcha?rand=<?=time()?>" alt="captcha" id="captcha_image" style="height:100%; border-radius:8px;">

                <i class="ti-reload refresh-captcha"></i>
            </div>

            <input type="text" name="captcha_input" id="captcha_input"
                   class="form-control mt-2" placeholder="کد امنیتی را وارد کنید" required>

            <button type="submit" name="login" class="btn btn-login">ورود</button>
        </form>
    </div>
</div>
</body>
</html>