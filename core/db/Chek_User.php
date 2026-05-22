<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once '../Maay@db@Maay/Maay@Connect@Maay.php';
    require_once '../Maay@db@Maay/Maay@config@Maay.php';
    require_once '../Maay@db@Maay/Maay@security_hader@Maay.php';

    if ($conn) {
        // گرفتن و پاکسازی ورودی‌ها
        $name_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('name_stdu'));
        $lname_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('lname_stdu'));
        $number_phone_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('number_phone_stdu'));
        $birthday_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('birthday_stdu'));
        $cod_meli_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('cod_meli_stdu'));
        $student_code_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('student_code_stdu'));
        $major_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('major_stdu'));
        $class_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('cals_stdu'));
        $address_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('address_stdu'));

        //اطلاعات عموعی دانش اموز
        $date = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('date'));
        $sick_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('sick_stdu'));
        $skill_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('skill_stdu'));
        $number_phone_home_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('number_phone_home_stdu'));
        $special_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('special_stdu'));
        $number_SMS_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('number_SMS_stdu'));
        $discipline_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('discipline_stdu'));
        $place_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('place_stdu'));
        $activity_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('activity_stdu'));
        $death_stdu = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('death_stdu'));

        // اطلاعات پدر
        $father_name = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_name'));
        $father_phone = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_phone'));
        $father_education = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_education'));
        $father_job = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_job'));
        $father_job_phone = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_job_phone'));
        $father_job_aaress = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('father_job_aaress'));

        // اطلاعات مادر
        $mother_name = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_name'));
        $mother_phone = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_phone'));
        $mother_education = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_education'));
        $mother_job = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_job'));
        $mother_job_phone = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_job_phone'));
        $mother_job_address = InputMaay::CheckInputAdministratorsMaay(InputMaay::GetInputMaay('mother_job_aaress'));

        // رمز عبور
        $pass_plain = InputMaay::GetInputMaay('pass_stdu');
        $pass_hashed = password_hash($pass_plain, PASSWORD_DEFAULT);

        // سطح دسترسی (0 = دانش‌آموز)
        $level = 1;

        // آپلود عکس
        $img_name = '';
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['image/jpeg', 'image/png'];
            if (in_array($_FILES['img']['type'], $allowed_types)) {
                $uploadDir = '../../Maay@assets@Maay/images/img_p/';
                $img_name = uniqid() . '_' . basename($_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $img_name);
            }
        }
        $status='1';
        // آماده‌سازی و اجرای کوئری
        $stmt = $conn->prepare("INSERT INTO `maay@student@maay@s.1` (
            `maay@student_fname@maay@s.1.2`, `maay@student_lname@maay@s.1.3`, 
            `maay@student_phone_number@maay@s.1.7`, `maay@birthday@maay@s.1.14`, 
            `maay@student_meli_code@maay@s.1.9`, `maay@student_code@maay@s.1.10`,
            `maay@student_major_id@maay@s.1.11`, `maay@student_class_id@maay@s.1.5`,
            `maay@adderss@maay@s.1.25`, `maay@name_father@maay@s.1.13`, 
            `maay@number_father@maay@s.1.8`, `maay@education_father@maay@s.1.17`,
            `maay@job_father@maay@s.1.16`, `maay@name_mother@maay@s.1.19`,
            `maay@number_mother@maay@s.1.18`, `maay@education_mother@maay@s.1.23`,
            `maay@job_mother@maay@s.1.21`, `maay@number_job_mother@maay@s.1.29`,
            `maay@number_job_father@maay@s.1.30`,`maay@address_job_father@maay@s.1.32`,
            `maay@address_job_mother@maay@s.1.33`, `maay@student_password@maay@s.1.12`,
            `Maay@level@Maay@A.0`, `maay@img@maay@s.1.31`,`maay@death@maay@s.1.4`,
            `maay@activity@maay@s.1.6`,`maay@place@maay@s.1.15`,`maay@discipline_lastyar@maay@s.1.20`,
            `maay@number_SMS@maay@s.1.22`,`maay@special@maay@s.1.24`,`maay@number_home@maay@s.1.26`,
            `maay@skill@maay@s.1.27`,`maay@sick@maay@s.1.28`,`maay@crate_date@maay@s.1.34`,`maay@status@maay@s.1.37`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "sssssssissssssssssssssissssssssssss",
            $name_stdu, $lname_stdu, $number_phone_stdu, $birthday_stdu, $cod_meli_stdu,
            $student_code_stdu, $major_stdu, $class_stdu, $address_stdu, $father_name,
            $father_phone, $father_education, $father_job, $mother_name, $mother_phone,
            $mother_education, $mother_job, $mother_job_phone, $father_job_phone,$father_job_aaress,
            $mother_job_address, $pass_hashed, $level, $img_name,$death_stdu,$activity_stdu,
            $place_stdu,$discipline_stdu,$number_SMS_stdu,$special_stdu,$number_phone_home_stdu,
            $skill_stdu,$sick_stdu,$date,$status
        );

        if ($stmt->execute()) {
            header('Location: addstdu'); // مسیر صفحه موفقیت
        } else {
            header('Location: error_500');
        }

        $stmt->close();
        mysqli_close($conn);
        exit;
    } else {
        header('Location: error_500');
        exit;
    }
} else {
    header('Location: error_404');
    exit;
}
