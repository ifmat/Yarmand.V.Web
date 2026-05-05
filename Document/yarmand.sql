-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2026 at 04:57 PM
-- Server version: 8.4.3
-- PHP Version: 8.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yarmand`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_user`
--

CREATE TABLE `address_user` (
  `Id_Address` int NOT NULL,
  `Full_Location` text COLLATE utf8mb4_persian_ci NOT NULL,
  `Time` varchar(100) COLLATE utf8mb4_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_store`
--

CREATE TABLE `product_store` (
  `Id_Product` int NOT NULL,
  `Name_Product` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `Image_Product` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `Price_Product` varchar(400) COLLATE utf8mb4_persian_ci NOT NULL,
  `NumberProduct_Store` varchar(10) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Id_Request` int NOT NULL,
  `UserId_Request` int NOT NULL,
  `UserId_Store` int NOT NULL,
  `Status_Request` enum('1','2','3','4') COLLATE utf8mb4_persian_ci NOT NULL,
  `NameProduct_Request` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `NumberProduct_Request` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `TotalPriceProduct_Request` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `Score_Request` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sotres`
--

CREATE TABLE `sotres` (
  `Id_Stores` int NOT NULL,
  `Name_Store` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `UserId_Store` int NOT NULL,
  `Location_Store` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `Ragin_Store` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `Time_store` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `Status_Store` enum('1','0') COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id_user` int NOT NULL COMMENT 'Id Users',
  `FirstName_User` varchar(150) COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'First Name User',
  `Lastname_User` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Last Name User',
  `Role_User` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Role User {\r\n0 : Super Admin\r\n1 : Admin\r\n2 : Support Tame\r\n3 : Old body\r\n4 : S\r\n5 : Store\r\n5 : Other',
  `AccessLevel_User` enum('1','2','3','4','5') COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Access Level User {\r\n0 : Super Admin = full\r\n1 : Admin = full -\r\n2 : Support Tame = full --\r\n3 : Old body = He Pages\r\n4 : S = He Pages\r\n5 : Store = He Pages\r\n5 : Other ',
  `Email_User` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Email User ',
  `Password_User` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Password User (Hash)',
  `PhoneNumber_User` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL COMMENT 'Phone Number User',
  `Status_User` enum('1','0') COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `Id_Wallet` int NOT NULL,
  `UserId_Wallet` int NOT NULL,
  `Total_Wallet` varchar(500) COLLATE utf8mb4_persian_ci NOT NULL,
  `Status_Wallet` enum('1','0') COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_user`
--
ALTER TABLE `address_user`
  ADD PRIMARY KEY (`Id_Address`);

--
-- Indexes for table `product_store`
--
ALTER TABLE `product_store`
  ADD PRIMARY KEY (`Id_Product`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD KEY `UserId_Request` (`UserId_Request`),
  ADD KEY `UserId_Store` (`UserId_Store`);

--
-- Indexes for table `sotres`
--
ALTER TABLE `sotres`
  ADD PRIMARY KEY (`Id_Stores`),
  ADD KEY `UserId_store` (`UserId_Store`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_user`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`Id_Wallet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_user`
--
ALTER TABLE `address_user`
  MODIFY `Id_Address` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_store`
--
ALTER TABLE `product_store`
  MODIFY `Id_Product` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sotres`
--
ALTER TABLE `sotres`
  MODIFY `Id_Stores` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id_user` int NOT NULL AUTO_INCREMENT COMMENT 'Id Users';

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `Id_Wallet` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`UserId_Request`) REFERENCES `users` (`Id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`UserId_Store`) REFERENCES `sotres` (`Id_Stores`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sotres`
--
ALTER TABLE `sotres`
  ADD CONSTRAINT `sotres_ibfk_1` FOREIGN KEY (`UserId_Store`) REFERENCES `users` (`Id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
