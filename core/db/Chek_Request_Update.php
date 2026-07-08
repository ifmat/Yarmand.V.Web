<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {


        $Request_Id = $_POST['Request_Id'] ?? '';
        $Status_Request = $_POST['Status_Request'] ?? '';
        $UserId = $_SESSION['user_id'];

        if (
            $Status_Request == "2" ||
            $Status_Request == "3" ||
            $Status_Request == "4"
        ) {

            $Update = mysqli_query($conn, "
        UPDATE request SET

        Status_Request='$Status_Request'

        WHERE Id_Request='$Request_Id'
        AND YavarId_Request='$UserId'
        ");


            if ($Update) {

                header("Location: List_FollowUp_Request");

            } else {

                header("Location: error_500");

            }

        } else {

            header("Location: error_404");

        }

        mysqli_close($conn);
        exit;

    }
}
?>