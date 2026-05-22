<?php
$conn = mysqli_connect('localhost', 'root', '', 'yarmand');
mysqli_set_charset($conn, "utf8mb4");

if ($conn->connect_error) {
    error_log("DB connection failed: " . $conn->connect_error);
    die("متاسفیم، اتصال به پایگاه داده امکان‌پذیر نیست.");
}