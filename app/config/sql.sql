
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 07:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appointment_Id` int(11) NOT NULL,
  `booked_Date` date NOT NULL DEFAULT current_timestamp(),
  `appointment_date` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `slot_Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Reason_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- status 1 canceled, 0 active
-- 

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_Id` int(11) NOT NULL,
  `Estimated_Value` decimal(10,2) NOT NULL,
  `Karatage` int(2) NOT NULL,
  `Weight` decimal(4,3) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Karatage_Price` decimal(10,2) NOT NULL,
  `Rate_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `CID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Description` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Deliver_Id` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `Date` date NOT NULL,
  `added_Date` date NOT NULL DEFAULT current_timestamp(),
  `Allocate_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- status 0 not deliverd , 1 deliverd



--
-- Table structure for table `gold_rate`
--

CREATE TABLE `gold_rate` (
  `Rate_Id` int(11) NOT NULL,
  `Karatage` int(2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Last_Edit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gold_rate`
--

INSERT INTO `gold_rate` (`Rate_Id`, `Karatage`, `Price`, `Last_Edit`) VALUES
(1, 18, '72000.00', '2022-12-13'),
(2, 19, '77000.00', '2022-12-13'),
(3, 20, '80000.00', '2022-12-13'),
(4, 21, '83000.00', '2022-12-13'),
(5, 22, '87000.00', '2022-12-13'),
(6, 24, '100000.00', '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_ID` int(11) NOT NULL,
  `Interest_Rate` decimal(5,2) NOT NULL,
  `Duration` int(2) NOT NULL,
  `Last_Edit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_ID`, `Interest_Rate`, `Duration`, `Last_Edit`) VALUES
(1, '27.00', 12, '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `Loan_Id` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Interest` decimal(5,2) NOT NULL,
  `Repay_Method` int(11) NOT NULL,
  `Pawn_Id` int(11) NOT NULL,
  `interest_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- payment method ????
--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `lockerNo` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `No_of_Articles` int(1) NOT NULL,
  `Key_Status` int(1) NOT NULL,
  `Key_release_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- status 0 not allocated, 1 allocated
-- key status 0 not deliverd, 1 deliverd
--
-- Table structure for table `pawn`
--

CREATE TABLE `pawn` (
  `Pawn_Id` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `Pawn_Date` date NOT NULL DEFAULT current_timestamp(),
  `Retrieved_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Article_Id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Appraiser_Id` int(11) NOT NULL,
  `Officer_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- pawn status 0 pending, 1 renewed, 2  added to auction
--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PID` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Type` int(1) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Description` varchar(255) NOT NULL,
  `Pawn_Id` int(11) DEFAULT NULL,
  `allocate_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- type 0 pawn , 1 locker
--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `userID` int(11) NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`userID`, `Phone`) VALUES
(5, 779232261);

-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `Reason_ID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`Reason_ID`, `description`) VALUES
(1, 'pawn Article'),
(2, 'make payment'),
(3, 'reserve Locker'),
(4, 'renew pawning'),
(5, 'Retrieve article');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `Allocate_Id` int(11) NOT NULL,
  `Article_Id` int(11) NOT NULL,
  `lockerNo` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Retrieve_Date` date NOT NULL,
  `Keeper_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `slot_ID` int(2) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_ID`, `time`) VALUES
(1, '08:30 AM - 09:00 AM'),
(2, '09:00 AM - 09:30 AM'),
(3, '09:30 AM - 10:00 AM'),
(4, '10:00 AM - 10:30 AM'),
(5, '10:30 AM - 11:00 AM'),
(6, '11:00 AM - 11:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `verification_status` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `Line1` varchar(255) DEFAULT NULL,
  `Line2` varchar(255) DEFAULT NULL,
  `Line3` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Last_Seen` date NOT NULL DEFAULT current_timestamp(),
  `Created_date` date NOT NULL DEFAULT current_timestamp(),
  `Created_By` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `email`, `password`, `type`, `verification_status`, `First_Name`, `Last_Name`, `NIC`, `Gender`, `DOB`, `Line1`, `Line2`, `Line3`, `Status`, `Last_Seen`, `Created_date`, `Created_By`) VALUES
(5, 'schamexo2017@gmail.com', '$2y$10$YaDklEysKUOnD4o/O/OHNOiSFcjUhwWh.6.oLAOnz2nD.wPzT/m6u', 1, 0, 'jayasekara', 'chamari', '200064703151', 'male', '2022-12-22', '', 'Welladeniya, Midigama, Ahangama', '', 1, '2022-12-13', '2022-12-13', 5),
(6, '2@gmail.com', '$2y$10$YaDklEysKUOnD4o/O/OHNOiSFcjUhwWh.6.oLAOnz2nD.wPzT/m6u', 2, 0, '2', '2', '123456789', 'male', '2022-12-16', '2', '2', '2', 1, '0000-00-00', '2022-12-13', 5);

-- TYPE
-- case 1:'Customer/
-- case 2:Admin
-- case 3:'Manager
-- case 4:GoldAppraiser
-- case 5:'VaultKeeper
-- case 6:PawnOfficer
-- case 7:Owner
--
-- verification stTUS 0, not verified, 1 verified

-- STATUS 0 active, 1 blocked






-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appointment_Id`),
  ADD KEY `slot_Id` (`slot_Id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Reason_ID` (`Reason_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_Id`),
  ADD KEY `Rate_Id` (`Rate_Id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`CID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Deliver_Id`),
  ADD KEY `Allocate_Id` (`Allocate_Id`);

--
-- Indexes for table `gold_rate`
--
ALTER TABLE `gold_rate`
  ADD PRIMARY KEY (`Rate_Id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_ID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Loan_Id`),
  ADD KEY `interest_ID` (`interest_ID`),
  ADD KEY `Pawn_Id` (`Pawn_Id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`lockerNo`);

--
-- Indexes for table `pawn`
--
ALTER TABLE `pawn`
  ADD PRIMARY KEY (`Pawn_Id`),
  ADD KEY `Appraiser_Id` (`Appraiser_Id`),
  ADD KEY `Article_Id` (`Article_Id`),
  ADD KEY `Officer_Id` (`Officer_Id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `allocate_Id` (`allocate_Id`),

  ADD KEY `Pawn_Id` (`Pawn_Id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`userID`,`Phone`);

--
-- Indexes for table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`Reason_ID`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`Allocate_Id`),
  ADD KEY `Article_Id` (`Article_Id`),
  ADD KEY `Keeper_Id` (`Keeper_Id`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `lockerNo` (`lockerNo`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`slot_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appointment_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `Deliver_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gold_rate`
--
ALTER TABLE `gold_rate`
  MODIFY `Rate_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `Loan_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locker`
--
ALTER TABLE `locker`
  MODIFY `lockerNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pawn`
--
ALTER TABLE `pawn`
  MODIFY `Pawn_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reason`
--
ALTER TABLE `reason`
  MODIFY `Reason_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `Allocate_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `slot_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`slot_Id`) REFERENCES `time_slot` (`slot_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`Reason_ID`) REFERENCES `reason` (`Reason_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`Rate_Id`) REFERENCES `gold_rate` (`Rate_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`Allocate_Id`) REFERENCES `reserves` (`Allocate_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`interest_ID`) REFERENCES `interest` (`interest_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`Pawn_Id`) REFERENCES `pawn` (`Pawn_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pawn`
--
ALTER TABLE `pawn`
  ADD CONSTRAINT `pawn_ibfk_1` FOREIGN KEY (`Appraiser_Id`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pawn_ibfk_2` FOREIGN KEY (`Article_Id`) REFERENCES `article` (`Article_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pawn_ibfk_3` FOREIGN KEY (`Officer_Id`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pawn_ibfk_4` FOREIGN KEY (`userid`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`allocate_Id`) REFERENCES `article` (`Article_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Pawn_Id`) REFERENCES `pawn` (`Pawn_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`Article_Id`) REFERENCES `article` (`Article_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`Keeper_Id`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserves_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserves_ibfk_4` FOREIGN KEY (`lockerNo`) REFERENCES `locker` (`lockerNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

