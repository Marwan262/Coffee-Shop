-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 10:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `drinkOrder` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `condiments`
--

CREATE TABLE `condiments` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condiments`
--

INSERT INTO `condiments` (`id`, `Name`, `Price`) VALUES
(1, 'Caramel Syrup', 10),
(2, 'Vanilla Syrup', 10),
(3, 'Chocolate Syrup', 10),
(4, 'Whipped Cream', 5),
(5, 'Extra Shot', 10);

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `id` int(11) NOT NULL,
  `drinkName` varchar(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id`, `drinkName`, `Price`, `Description`) VALUES
(1, 'Mocha', 30, 'A café mocha, also called mocaccino, is a chocolate-flavoured variant of a café latte.'),
(2, 'Black', 15, 'Black coffee is as simple as it gets with ground coffee beans steeped in hot water, served warm. And if you want to sound fancy, you can call black coffee by its proper name: cafe noir.'),
(3, 'Latte', 25, 'As the most popular coffee drink out there, the latte is comprised of a shot of espresso and steamed milk with just a touch of foam.'),
(4, 'Espresso', 10, 'A shot of espresso.'),
(5, 'Cappuccino', 30, 'A cappuccino is an espresso-based coffee drink that originated in Italy, and is traditionally prepared with steamed milk foam.'),
(6, 'Macchiato', 30, 'The macchiato is another espresso-based drink that has a small amount of foam on top.');

-- --------------------------------------------------------

--
-- Table structure for table `drinkorder`
--

CREATE TABLE `drinkorder` (
  `id` int(11) NOT NULL,
  `Drink` int(11) NOT NULL,
  `Size` int(11) NOT NULL,
  `Condiments` int(11) NOT NULL,
  `MilkType` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `milktype`
--

CREATE TABLE `milktype` (
  `id` int(11) NOT NULL,
  `Type` varchar(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milktype`
--

INSERT INTO `milktype` (`id`, `Type`, `Price`) VALUES
(1, 'Regular-F', 0),
(2, 'Regular-H', 0),
(3, 'Regular-S', 0),
(4, 'Almond', 12),
(5, 'Soy', 10),
(6, 'Coconut', 12),
(7, 'Oat', 12);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Password` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `Email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`ID`, `Name`, `Password`, `UserType`, `Email`) VALUES
(1, 'kamal1544', 123456, 1, 'kamal23@yahoo.com'),
(2, 'youssefGG', 123456, 1, 'youssefGamal@yahoo.com'),
(3, 'MalakHesham56', 2211, 1, 'malak_Hesham00@outlook.com'),
(4, 'nadasalah', 223311, 1, 'nadasalah123@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `Size`, `Price`) VALUES
(1, 'Small', 0),
(2, 'Medium', 5),
(3, 'Large', 10);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `UserType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `UserType`) VALUES
(1, 'Customer'),
(2, 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drink` (`drinkOrder`);

--
-- Indexes for table `condiments`
--
ALTER TABLE `condiments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinkorder`
--
ALTER TABLE `drinkorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MilkType` (`MilkType`),
  ADD KEY `Condiments` (`Condiments`),
  ADD KEY `Size` (`Size`),
  ADD KEY `Drink` (`Drink`);

--
-- Indexes for table `milktype`
--
ALTER TABLE `milktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserType` (`UserType`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `condiments`
--
ALTER TABLE `condiments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `drinkorder`
--
ALTER TABLE `drinkorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milktype`
--
ALTER TABLE `milktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`drinkOrder`) REFERENCES `drinkorder` (`id`);

--
-- Constraints for table `drinkorder`
--
ALTER TABLE `drinkorder`
  ADD CONSTRAINT `drinkorder_ibfk_1` FOREIGN KEY (`Condiments`) REFERENCES `condiments` (`id`),
  ADD CONSTRAINT `drinkorder_ibfk_2` FOREIGN KEY (`MilkType`) REFERENCES `milktype` (`id`),
  ADD CONSTRAINT `drinkorder_ibfk_3` FOREIGN KEY (`Size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `drinkorder_ibfk_4` FOREIGN KEY (`Drink`) REFERENCES `drink` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`UserType`) REFERENCES `usertype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
