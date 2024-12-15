-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 10:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expensemanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpID` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `PhoneNumOffice` int(10) NOT NULL,
  `PhoneNumPersonal` int(10) NOT NULL,
  `Adderss` varchar(120) NOT NULL,
  `RegistedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ExID` varchar(10) NOT NULL,
  `ProID` varchar(10) NOT NULL,
  `FID` varchar(10) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `financeteam`
--

CREATE TABLE `financeteam` (
  `FID` varchar(10) NOT NULL,
  `EmpID` varchar(10) NOT NULL,
  `PromotedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `InID` varchar(10) NOT NULL,
  `FID` varchar(10) NOT NULL,
  `Category` int(11) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `MngID` varchar(10) NOT NULL,
  `Department` varchar(60) NOT NULL,
  `EmpID` varchar(10) NOT NULL,
  `PromotedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `possisions`
--

CREATE TABLE `possisions` (
  `id` int(10) NOT NULL,
  `value` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `possisions`
--

INSERT INTO `possisions` (`id`, `value`, `name`) VALUES
(1, 1, 'ceo'),
(2, 2, 'manager'),
(3, 3, 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `ProID` varchar(10) NOT NULL,
  `EmpID` varchar(10) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proposalmodify`
--

CREATE TABLE `proposalmodify` (
  `PM_ID` varchar(10) NOT NULL,
  `ProID` varchar(10) NOT NULL,
  `FID` varchar(10) NOT NULL,
  `DescriptionF` varchar(1500) NOT NULL,
  `DateF` date NOT NULL,
  `TimeF` time NOT NULL,
  `MngID` varchar(10) NOT NULL,
  `DescriptionM` varchar(1500) NOT NULL,
  `DateM` date NOT NULL,
  `TimeM` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `Name`) VALUES
(1, 'Lakruwan'),
(2, 'Hasan'),
(3, 'Chamara'),
(4, 'Thusari'),
(5, 'Hashini');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Possion` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `PhoneNumOffice` int(10) NOT NULL,
  `PhoneNumPersonal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `Possion`, `email`, `PhoneNumOffice`, `PhoneNumPersonal`) VALUES
(1, 'Lakruwan Jayathissa', 'ceo', 'lakruwan@gmail.cocm', 1112223, 1112223334),
(2, 'Hashini Sulakshana', 'ceo', 'hashini@gmail.com', 999888777, 778889994),
(3, 'Thusari Senavirathne', 'Manager', 'thusari@gmail.com', 1141123, 1114443334),
(4, 'chamara Dilshan', 'manager', 'chamara@gmail.com', 99888471, 7789991),
(5, 'Mohomad Hasan', 'Manager', 'hasan@gmail.com', 20112223, 1112883334),
(6, 'Pabodhani Lakmali', 'manager', 'pabodhani@gmail.com', 94488471, 2289994),
(7, 'Tharindu Malinga', 'emp', 'Tharindu@gmail.com', 1812223, 1115683334),
(8, 'Kavinda Helitha ', 'emp', 'Kavinda@gmail.com', 99118471, 771009994),
(9, 'Niwandi geethma', 'emp', 'Niwandi@gmail.com', 201141123, 1212223334),
(10, 'Lashan Sachintha', 'emp', 'Lashan@gmail.com', 129888471, 774389994),
(11, 'Kavshani Chalakshana', 'emp', 'Kavshani@gmail.com', 901112223, 1912223334),
(12, 'Kasun Sanjaya', 'emp', 'Kasun@gmail.com', 91888471, 771888999),
(14, 'Thakshila Dulanji', 'emp', 'Thakshila@gmail.com', 1323232323, 1323232323);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ExID`),
  ADD KEY `ProID` (`ProID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `financeteam`
--
ALTER TABLE `financeteam`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`InID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`MngID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `possisions`
--
ALTER TABLE `possisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`ProID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `proposalmodify`
--
ALTER TABLE `proposalmodify`
  ADD PRIMARY KEY (`PM_ID`),
  ADD KEY `ProID` (`ProID`),
  ADD KEY `FID` (`FID`),
  ADD KEY `MngID` (`MngID`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `possisions`
--
ALTER TABLE `possisions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`ProID`) REFERENCES `proposal` (`ProID`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`FID`) REFERENCES `financeteam` (`FID`);

--
-- Constraints for table `financeteam`
--
ALTER TABLE `financeteam`
  ADD CONSTRAINT `financeteam_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `financeteam` (`FID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmpID`);

--
-- Constraints for table `proposalmodify`
--
ALTER TABLE `proposalmodify`
  ADD CONSTRAINT `proposalmodify_ibfk_1` FOREIGN KEY (`ProID`) REFERENCES `proposal` (`ProID`),
  ADD CONSTRAINT `proposalmodify_ibfk_2` FOREIGN KEY (`FID`) REFERENCES `financeteam` (`FID`),
  ADD CONSTRAINT `proposalmodify_ibfk_3` FOREIGN KEY (`MngID`) REFERENCES `manager` (`MngID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
