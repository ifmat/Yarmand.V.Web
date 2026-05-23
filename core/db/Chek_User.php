<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {
        $FirstName = $_POST['FirstName'] ?? '';
        $LastName  = $_POST['LastName'] ?? '';
        $Role      = (int)($_POST['role'] ?? 1);
        $Email     = $_POST['Email'] ?? '';
        $Password  = $_POST['pass'] ?? '';
        $Status    = 1;

        $Access = $Role;
        $stmt = $conn->prepare("INSERT INTO `users`
    (`FirstName_User`,
     `Lastname_User`,
     `Role_User`,
     `AccessLevel_User`,
     `Email_User`,
     `Password_User`,
     `Status_User`) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "ssssssi",
            $FirstName, $LastName, $Role, $Access, $Email,
            $Password, $Status
        );

        if ($stmt->execute()) {
            header('Location: P_U'); // مسیر صفحه موفقیت
            $_SESSION['level']=$Role;
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
