<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {


        $Request_Id = $_POST['Request_Id'] ?? '';
        $Status = 1;
        $UserId = $_SESSION['user_id'];

        $Update = mysqli_query($conn, "
    UPDATE request SET

    Status_Request='$Status',
    YavarId_Request='$UserId'
    WHERE Id_Request='$Request_Id'
    ");


        mysqli_close($conn);
        header("Location: List_Request");

        exit;

    } else {

        header("Location: error_500");
        exit;

    }

} else {

    header("Location: error_404");
    exit;

}