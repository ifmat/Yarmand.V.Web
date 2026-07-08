<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {

        $Method = $_POST['Method'] ?? '';

        if ($Method == "Edit_Profile") {

            $UserId = $_SESSION['user_id'];

            $FirstName = $_POST['firstname'] ?? '';
            $LastName = $_POST['lastname'] ?? '';
            $Email = $_POST['email'] ?? '';
            $Phone = $_POST['phone'] ?? '';
            $Address = $_POST['address'] ?? '';

            $UpdateUser = mysqli_query($conn, "
            UPDATE users SET

            FirstName_User='$FirstName',
            Lastname_User='$LastName',
            Email_User='$Email',
            PhoneNumber_User='$Phone'

            WHERE Id_user='$UserId'
            ");

            $CheckAddress = mysqli_query($conn, "
            SELECT *
            FROM address_user
            WHERE UserId_Address='$UserId'
            ");

            if (mysqli_num_rows($CheckAddress) > 0) {

                mysqli_query($conn, "
                UPDATE address_user SET

                Full_Location='$Address'

                WHERE UserId_Address='$UserId'
                ");

            } else {

                mysqli_query($conn, "
                INSERT INTO address_user
                (
                    UserId_Address,
                    Full_Location
                )

                VALUES

                (
                    '$UserId',
                    '$Address'
                )
                ");

            }

            if ($UpdateUser) {

                header("Location: Profile");

            } else {

                header("Location: error_500");

            }

            mysqli_close($conn);
            exit;

        } else {

            header("Location: error_404");
            exit;

        }

    } else {

        header("Location: error_500");
        exit;

    }

} else {

    header("Location: error_404");
    exit;

}