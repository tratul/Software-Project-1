-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 01:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carebookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `PhoneNo` varchar(14) COLLATE utf32_unicode_ci NOT NULL,
  `DoB` date NOT NULL,
  `Address` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `NIDNo` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `PassportNo` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `BirthCirtificate` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `BMDC` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `NIDNo` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Role` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `Status` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Name` varchar(200) COLLATE utf32_unicode_ci NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `Nationality` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `PhoneNo` varchar(14) COLLATE utf32_unicode_ci NOT NULL,
  `NID` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `BirthCertificate` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `PassportNo` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `Image` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `FingerPrint` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `PrescriptionID` int(20) NOT NULL,
  `PatientEmail` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `OldPDF` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `PDF` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `DoctorEmail` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `Test` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `Email` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `CenterNo` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Type` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_data`
--

CREATE TABLE `test_data` (
  `Document_Id` int(100) NOT NULL,
  `Test_Id` int(100) NOT NULL,
  `Prescription_Id` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Document` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `Id` int(100) NOT NULL,
  `Name` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `PhoneNo` (`PhoneNo`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNo` (`PhoneNo`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PrescriptionID`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `test_data`
--
ALTER TABLE `test_data`
  ADD PRIMARY KEY (`Document_Id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `PrescriptionID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `Document_Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
