<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    require_once 'Connect.php';
    require_once '../layout/session/session.php';

    $UserId=$_SESSION['user_id'];

    $StoreId=$_POST['store_id'];

    $ProductId=$_POST['product_id'];

    $Number=$_POST['number'];

    $Price=$_POST['price'];

    $Description=$_POST['description'];

    $Status=1;

    $Score=0;

    $Product=mysqli_query($conn,"SELECT Name_Product FROM product_store WHERE Id_Product='$ProductId'");

    $row=mysqli_fetch_assoc($Product);

    $ProductName=$row['Name_Product'];

    $insert=mysqli_query($conn,"INSERT INTO request
    (
        UserId_Request,
        UserId_Store,
        Status_Request,
        NameProduct_Request,
        NumberProduct_Request,
        TotalPriceProduct_Request,
        Description_Request,
        Score_Request
    )

    VALUES

    (
        '$UserId',
        '$StoreId',
        '$Status',
        '$ProductName',
        '$Number',
        '$Price',
        '$Description',
        '$Score'
    )");

    if($insert){

        header("Location:Register_Request");

    }else{

        header("Location:error_500");

    }

}else{

    header("Location:error_404");

}