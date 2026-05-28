<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    if ($conn) {
        $Product_Name = $_POST['product_name'] ?? '';
        $Category_id = $_POST['category_id'] ?? '';
        $Price = $_POST['price'] ?? '';
        $Image_Id = $_POST['Image_Id'] ?? '';
        $Stock = $_POST['stock'] ?? '';
        $Short_Desc = $_POST['short_desc'] ?? '';
        $Full_Desc = $_POST['full_desc'] ?? '';
        $Status = $_POST['status'] ?? '';
        $Brand = $_POST['brand'] ?? '';


        $stmt = mysqli_query($conn, "INSERT INTO `product_store`(
                             `Name_Product`, `Image_Product`, `Price_Product`,
                            `NumberProduct_Store`, `Description_Product`,
                            `Status_Product`, `Brand_Product`
                            ) VALUES ('$Product_Name', '$Image_Id', '$Price', '$Stock', '$Full_Desc', '$Status', '$Brand')");


        if ($stmt) {
            header('Location: Register_product'); // مسیر صفحه موفقیت

        } else {
            header('Location: error_500');
        }

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
