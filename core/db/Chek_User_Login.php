<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {
        $Email = $_POST['Email'] ?? '';
        $Password = $_POST['pass'] ?? '';

        // استفاده از mysqli_query و اجرای مستقیم کوئری
        $stmt = mysqli_query($conn, "SELECT
            `Id_user`, `FirstName_User`, `Lastname_User`, `Role_User`,
            `AccessLevel_User`, `Email_User`, `Password_User`, 
            `PhoneNumber_User`, `Status_User` 
        FROM `users` WHERE  `Email_User` = '$Email' AND `Password_User` = '$Password'");

        if ($stmt && mysqli_num_rows($stmt) > 0) {
            $row = mysqli_fetch_assoc($stmt);

            if ($Password == $row["Password_User"]) {
                 $_SESSION['user_id'] = $row['Id_user'];
                 $_SESSION['level'] = $row['Role_User'];

                header('Location: P_U'); // مسیر صفحه موفقیت
                mysqli_free_result($stmt); // آزاد کردن حافظه نتیجه کوئری
                mysqli_close($conn);
                exit;
            } else {
                header('Location: error_500');
                exit;
            }
        } else {
            // اگر کوئری نتیجه‌ای نداشت (کاربر با این ایمیل و پسورد پیدا نشد)
            header('Location: error_500');
            exit;
        }

        if ($stmt) {
            mysqli_free_result($stmt);
        }
        mysqli_close($conn);

    } else {
        header('Location: error_404'); // خطای اتصال به دیتابیس
        exit;
    }
}
?>
