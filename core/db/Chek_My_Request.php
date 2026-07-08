<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {

        $Method = $_POST['Method'] ?? '';

        // -----------------------------
        // حذف درخواست
        // -----------------------------

        if ($Method == "Delete") {

            $Request_Id = $_POST['Request_Id'];

            $Delete = mysqli_query($conn,"
            DELETE FROM request
            WHERE Id_Request='$Request_Id'
            ");

            if ($Delete) {

                header("Location: List_My_Request");

            } else {

                header("Location: error_500");

            }

        }

        // -----------------------------
        // ویرایش درخواست
        // -----------------------------

        elseif ($Method == "Edit") {

            $Request_Id = $_POST['Request_Id'];

            $Number = $_POST['number'];

            $Price = $_POST['price'];

            $Description = $_POST['description'];

            $Update = mysqli_query($conn,"
            UPDATE request SET

            NumberProduct_Request='$Number',
            TotalPriceProduct_Request='$Price',
            Description_Request='$Description'

            WHERE Id_Request='$Request_Id'
            ");

            if ($Update) {

                header("Location: List_My_Request");

            } else {

                header("Location: error_500");

            }

        }
        elseif ($Method == "Change_Status") {

            $Request_Id = $_POST['Request_Id'] ?? '';
            $Status = $_POST['status'] ?? '';
            $UserId = $_SESSION['user_id'];

            $Update = mysqli_query($conn,"
    UPDATE request SET

    Status_Request='$Status'

    WHERE Id_Request='$Request_Id'
    AND YavarId_Request='$UserId'
    ");

            if($Update){

                header("Location: My_Request");

            }else{

                header("Location: error_500");

            }

        }

        else {

            header("Location: error_404");

        }

        mysqli_close($conn);
        exit;

    } else {

        header("Location: error_500");
        exit;

    }

} else {

    header("Location: error_404");
    exit;

}